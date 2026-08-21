<?php
require_once __DIR__ . '/../configuration/database.php';

class VendedorModel {
    private $db;

    public function __construct() {
        global $conn;
        $this->db = $conn;
    }

    // 1. Obtener estadísticas para el dashboard del vendedor
    public function obtenerEstadisticasDashboard($id_usuario) {
        $stats = [
            'ventas_hoy' => 0.00,
            'productos_activos' => 0,
            'clientes_registrados' => 0
        ];

        // Ventas de hoy realizadas por este vendedor
        $stmtV = $this->db->prepare("SELECT SUM(total) as total FROM venta WHERE id_Usuario = ? AND DATE(fecha_Venta) = CURRENT_DATE() AND estado = 'Completada'");
        if ($stmtV) {
            $stmtV->bind_param("i", $id_usuario);
            $stmtV->execute();
            $res = $stmtV->get_result()->fetch_assoc();
            $stats['ventas_hoy'] = (float)($res['total'] ?? 0.00);
            $stmtV->close();
        }

        // Cantidad de productos activos en stock
        $resP = $this->db->query("SELECT COUNT(*) as total FROM producto WHERE estado = 'Activo'");
        if ($resP) {
            $stats['productos_activos'] = (int)$resP->fetch_assoc()['total'];
        }

        // Cantidad de clientes registrados
        $resC = $this->db->query("SELECT COUNT(*) as total FROM cliente");
        if ($resC) {
            $stats['clientes_registrados'] = (int)$resC->fetch_assoc()['total'];
        }

        return $stats;
    }

    // 2. Consultar productos disponibles
    public function consultarProductos($buscar = '') {
        $productos = [];
        $query = "SELECT * FROM producto WHERE estado = 'Activo'";
        
        if ($buscar !== '') {
            $query .= " AND (nombre LIKE ? OR codigo_Producto LIKE ? OR unidad_Medida LIKE ?)";
            $stmt = $this->db->prepare($query);
            $term = "%" . $buscar . "%";
            $stmt->bind_param("sss", $term, $term, $term);
            $stmt->execute();
            $res = $stmt->get_result();
            while ($row = $res->fetch_assoc()) {
                $productos[] = $row;
            }
            $stmt->close();
        } else {
            $res = $this->db->query($query);
            if ($res) {
                while ($row = $res->fetch_assoc()) {
                    $productos[] = $row;
                }
            }
        }
        return $productos;
    }

    // 3. Registrar Venta Transaccional
    public function registrarVenta($id_cliente, $metodo_pago, $cart_items, $id_usuario) {
        if (empty($cart_items) || $id_cliente <= 0) {
            return false;
        }

        $this->db->begin_transaction();

        try {
            // Calcular total de la venta
            $total_venta = 0.00;
            foreach ($cart_items as $item) {
                $total_venta += (float)$item['subtotal'];
            }

            $fecha_actual = date('Y-m-d H:i:s');
            $estado_venta = 'Completada';

            // 1. Insertar Cabecera de Venta
            $stmtV = $this->db->prepare("INSERT INTO venta (id_Cliente, fecha_Venta, subtotal, descuento, total, metodo_Pago, estado, id_Usuario) VALUES (?, ?, ?, 0.00, ?, ?, ?, ?)");
            $stmtV->bind_param("isddssi", $id_cliente, $fecha_actual, $total_venta, $total_venta, $metodo_pago, $estado_venta, $id_usuario);
            $stmtV->execute();
            $id_venta = $this->db->insert_id;
            $stmtV->close();

            // 2. Insertar Detalles de Venta y actualizar stock de productos
            $stmtD = $this->db->prepare("INSERT INTO detalle_venta (id_Venta, id_Producto, cantidad, precio_Unitario, subtotal) VALUES (?, ?, ?, ?, ?)");
            $stmtS = $this->db->prepare("UPDATE producto SET stock_Actual = stock_Actual - ? WHERE id_Producto = ?");

            foreach ($cart_items as $item) {
                $id_prod = (int)$item['id_producto'];
                $cant = (int)$item['cantidad'];
                $precio_u = (float)$item['precio'];
                $sub = (float)$item['subtotal'];

                // Insertar Detalle
                $stmtD->bind_param("iiidd", $id_venta, $id_prod, $cant, $precio_u, $sub);
                $stmtD->execute();

                // Actualizar Stock
                $stmtS->bind_param("ii", $cant, $id_prod);
                $stmtS->execute();
            }
            $stmtD->close();
            $stmtS->close();

            // 3. Si el método de pago es Crédito, registrar la deuda
            if ($metodo_pago === 'Crédito') {
                $estado_deuda = 'Pendiente';
                $concepto = "Venta #" . str_pad($id_venta, 5, '0', STR_PAD_LEFT);
                $stmtDeuda = $this->db->prepare("INSERT INTO deuda (fecha_Registro, valor_Inicial, saldo_Pendiente, estado, concepto, id_Usuario, id_Cliente) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmtDeuda->bind_param("sddssii", $fecha_actual, $total_venta, $total_venta, $estado_deuda, $concepto, $id_usuario, $id_cliente);
                $stmtDeuda->execute();
                $stmtDeuda->close();
            }

            $this->db->commit();
            return $id_venta;

        } catch (Exception $e) {
            $this->db->rollback();
            return false;
        }
    }

    // 4. Registrar Deuda (Fiado)
    public function registrarDeuda($id_cliente, $concepto, $valor, $id_usuario) {
        $fecha_actual = date('Y-m-d H:i:s');
        $estado = 'Pendiente';
        $stmt = $this->db->prepare("INSERT INTO deuda (fecha_Registro, valor_Inicial, saldo_Pendiente, estado, concepto, id_Usuario, id_Cliente) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sddssii", $fecha_actual, $valor, $valor, $estado, $concepto, $id_usuario, $id_cliente);
            $success = $stmt->execute();
            $stmt->close();
            return $success;
        }
        return false;
    }

    // 5. Registrar Abono
    public function registrarAbono($id_deuda, $monto, $concepto, $id_usuario, $id_cliente) {
        $this->db->begin_transaction();
        try {
            $fecha_actual = date('Y-m-d H:i:s');
            
            // 1. Insertar registro de abono
            $stmtA = $this->db->prepare("INSERT INTO abono (fecha_Registro, monto, concepto, id_Deuda, id_Usuario) VALUES (?, ?, ?, ?, ?)");
            $stmtA->bind_param("sdsii", $fecha_actual, $monto, $concepto, $id_deuda, $id_usuario);
            $stmtA->execute();
            $stmtA->close();

            // 2. Consultar saldo pendiente actual de la deuda
            $stmtD = $this->db->prepare("SELECT saldo_Pendiente, valor_Inicial FROM deuda WHERE id_Deuda = ?");
            $stmtD->bind_param("i", $id_deuda);
            $stmtD->execute();
            $resD = $stmtD->get_result()->fetch_assoc();
            $stmtD->close();

            if (!$resD) {
                throw new Exception("Deuda no encontrada");
            }

            $nuevo_saldo = (float)$resD['saldo_Pendiente'] - (float)$monto;
            if ($nuevo_saldo < 0) $nuevo_saldo = 0.00;

            // Determinar nuevo estado de deuda
            if ($nuevo_saldo == 0) {
                $nuevo_estado = 'Pagada';
            } else {
                $nuevo_estado = 'Abonada';
            }

            // 3. Actualizar tabla deuda
            $stmtU = $this->db->prepare("UPDATE deuda SET saldo_Pendiente = ?, estado = ? WHERE id_Deuda = ?");
            $stmtU->bind_param("dsi", $nuevo_saldo, $nuevo_estado, $id_deuda);
            $stmtU->execute();
            $stmtU->close();

            $this->db->commit();
            return true;

        } catch (Exception $e) {
            $this->db->rollback();
            return false;
        }
    }
}
?>
