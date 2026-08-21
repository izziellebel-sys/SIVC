<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {
    header("Location: ../views/login.php");
    exit();
}

require_once __DIR__ . '/../models/vendedor_model.php';
$model = new VendedorModel();
$id_usuario = $_SESSION['id_Usuario'] ?? 0;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $id_usuario > 0) {
    $action = $_POST['action'] ?? '';

    if ($action === 'registrar_venta') {
        $id_cliente = (int)($_POST['id_cliente'] ?? 0);
        $metodo_pago = trim($_POST['metodo_pago'] ?? 'Efectivo');
        $productos_json = $_POST['productos_data'] ?? '[]';
        
        $cart_items = json_decode($productos_json, true);

        if ($id_cliente > 0 && !empty($cart_items)) {
            $id_venta = $model->registrarVenta($id_cliente, $metodo_pago, $cart_items, $id_usuario);
            
            if ($id_venta) {
                header("Location: ../views/vendedor/ventas.php?success=1&venta_id=" . $id_venta);
            } else {
                header("Location: ../views/vendedor/ventas.php?error=1");
            }
        } else {
            header("Location: ../views/vendedor/ventas.php?warning=1");
        }
        exit();
    } elseif ($action === 'registrar_deuda') {
        $id_cliente = (int)($_POST['id_cliente'] ?? 0);
        $concepto = trim($_POST['concepto'] ?? '');
        $valor = (float)($_POST['valor'] ?? 0.00);

        if ($id_cliente > 0 && $concepto !== '' && $valor > 0) {
            $success = $model->registrarDeuda($id_cliente, $concepto, $valor, $id_usuario);
            if ($success) {
                header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&deuda_success=1");
            } else {
                header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&deuda_error=1");
            }
        } else {
            header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&deuda_warning=1");
        }
        exit();
    } elseif ($action === 'registrar_abono') {
        $id_cliente = (int)($_POST['id_cliente'] ?? 0);
        $id_deuda = (int)($_POST['id_deuda'] ?? 0);
        $monto = (float)($_POST['monto'] ?? 0.00);
        $concepto = trim($_POST['concepto'] ?? 'Abono Parcial');

        if ($id_cliente > 0 && $id_deuda > 0 && $monto > 0) {
            $success = $model->registrarAbono($id_deuda, $monto, $concepto, $id_usuario, $id_cliente);
            if ($success) {
                header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&abono_success=1");
            } else {
                header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&abono_error=1");
            }
        } else {
            header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&abono_warning=1");
        }
        exit();
    }
}

header("Location: ../views/vendedor/dashboard_vendedor.php");
exit();
?>
