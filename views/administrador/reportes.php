<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/database.php';

// OBTENER RANGO DE FECHAS
$ano_actual = date('Y');
$fecha_inicio_default = "$ano_actual-01-01";
$fecha_fin_default = date('Y-m-d');

$fecha_inicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : $fecha_inicio_default;
$fecha_fin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : $fecha_fin_default;

$datetime_inicio = $fecha_inicio . " 00:00:00";
$datetime_fin = $fecha_fin . " 23:59:59";

// OBTENER TABA ACTUAL
$tab = isset($_GET['tab']) ? $_GET['tab'] : 'general';
$valid_tabs = ['general', 'ventas', 'productos', 'clientes', 'inventario'];
if (!in_array($tab, $valid_tabs)) {
    $tab = 'general';
}

// OBTENER FECHA ACTUAL EN ESPAÑOL
$dias = [
    1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 4 => 'Jueves',
    5 => 'Viernes', 6 => 'Sábado', 7 => 'Domingo'
];
$meses = [
    1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril',
    5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto',
    9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
];
$diaSemana = date('N');
$mes = date('n');
$fechaString = $dias[$diaSemana] . ' ' . date('d') . ' de ' . $meses[$mes];
$horaString = date('h:i a');

// EJECUTAR CONSULTAS EN FUNCIÓN DE LA PESTAÑA SELECCIONADA
$stat1_name = $stat1_value = $stat1_desc = $stat1_icon = $stat1_bg = "";
$stat2_name = $stat2_value = $stat2_desc = $stat2_icon = $stat2_bg = "";
$stat3_name = $stat3_value = $stat3_desc = $stat3_icon = $stat3_bg = "";

$colorPalette = ['#6f2dbd', '#f72585', '#3f37c9', '#b5179e', '#009688', '#fd7e14'];

if ($tab === 'general') {
    // -------------------------------------------------------------
    // PESTAÑA: RESUMEN GENERAL
    // -------------------------------------------------------------
    
    // 1. Ventas Totales
    $stmtV = $conn->prepare("SELECT SUM(total) as total FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ?");
    $stmtV->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtV->execute();
    $resV = $stmtV->get_result()->fetch_assoc();
    $ventasTotales = (float)($resV['total'] ?? 0.00);
    $stmtV->close();

    // 2. Productos Vendidos
    $stmtP = $conn->prepare("SELECT SUM(dv.cantidad) as total FROM detalle_venta dv JOIN venta v ON dv.id_Venta = v.id_Venta WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?");
    $stmtP->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtP->execute();
    $resP = $stmtP->get_result()->fetch_assoc();
    $productosVendidos = (int)($resP['total'] ?? 0);
    $stmtP->close();

    // 3. Clientes Atendidos
    $stmtC = $conn->prepare("SELECT COUNT(DISTINCT v.id_Cliente) as total FROM venta v WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?");
    $stmtC->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtC->execute();
    $resC = $stmtC->get_result()->fetch_assoc();
    $clientesAtendidos = (int)($resC['total'] ?? 0);
    $stmtC->close();

    // Métricas para las Tarjetas
    $stat1_name = "Ventas Totales";
    $stat1_value = "$" . number_format($ventasTotales, 0, ',', '.');
    $stat1_desc = "Ventas Completadas";
    $stat1_icon = "fa-solid fa-bag-shopping";
    $stat1_bg = "#ffd6ff";

    $stat2_name = "Productos Vendidos";
    $stat2_value = number_format($productosVendidos, 0, ',', '.');
    $stat2_desc = "Unidades Vendidas";
    $stat2_icon = "fa-solid fa-box";
    $stat2_bg = "#ffd8eb";

    $stat3_name = "Clientes Atendidos";
    $stat3_value = number_format($clientesAtendidos, 0, ',', '.');
    $stat3_desc = "Clientes Registrados";
    $stat3_icon = "fa-solid fa-user";
    $stat3_bg = "#e2e2ff";

    // Gráfico de Línea: Ventas diarias
    $stmtLine = $conn->prepare("SELECT DATE(fecha_Venta) as fecha, SUM(total) as total_dia FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ? GROUP BY DATE(fecha_Venta) ORDER BY fecha ASC");
    $stmtLine->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtLine->execute();
    $resLine = $stmtLine->get_result();

    $diasArray = [];
    $ventasDiaArray = [];
    $diasSemanaES = ['Sun'=>'Dom', 'Mon'=>'Lun', 'Tue'=>'Mar', 'Wed'=>'Mié', 'Thu'=>'Jue', 'Fri'=>'Vie', 'Sat'=>'Sáb'];

    while ($row = $resLine->fetch_assoc()) {
        $fechaObj = strtotime($row['fecha']);
        $diaES = $diasSemanaES[date('D', $fechaObj)] ?? date('D', $fechaObj);
        $diasArray[] = $diaES . ' ' . date('d', $fechaObj);
        $ventasDiaArray[] = (float)$row['total_dia'];
    }
    $stmtLine->close();
    if (empty($diasArray)) {
        $diasArray = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];
        $ventasDiaArray = [0, 0, 0, 0, 0, 0, 0];
    }

    // Gráfico de Dona: Ventas por categoría
    $stmtDonut = $conn->prepare("
        SELECT p.unidad_Medida as categoria, SUM(dv.subtotal) as total_ventas
        FROM detalle_venta dv
        JOIN producto p ON dv.id_Producto = p.id_Producto
        JOIN venta v ON dv.id_Venta = v.id_Venta
        WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
        GROUP BY p.unidad_Medida
        ORDER BY total_ventas DESC
    ");
    $stmtDonut->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtDonut->execute();
    $resDonut = $stmtDonut->get_result();

    $categoriasArray = [];
    $totalesCatArray = [];
    $totalVentasGeneral = 0;

    while ($row = $resDonut->fetch_assoc()) {
        $cat = $row['categoria'] ? $row['categoria'] : 'Otros';
        $total_cat = (float)$row['total_ventas'];
        $categoriasArray[] = $cat;
        $totalesCatArray[] = $total_cat;
        $totalVentasGeneral += $total_cat;
    }
    $stmtDonut->close();

    $leyendas = [];
    foreach ($categoriasArray as $i => $cat) {
        $total_cat = $totalesCatArray[$i];
        $pct = $totalVentasGeneral > 0 ? round(($total_cat / $totalVentasGeneral) * 100) : 0;
        $leyendas[] = [
            'categoria' => $cat,
            'total' => $total_cat,
            'porcentaje' => $pct,
            'color' => $colorPalette[$i % count($colorPalette)]
        ];
    }

} elseif ($tab === 'ventas') {
    // -------------------------------------------------------------
    // PESTAÑA: VENTAS
    // -------------------------------------------------------------

    // 1. Ventas Realizadas (Conteo)
    $stmtCount = $conn->prepare("SELECT COUNT(*) as total_cant, AVG(total) as avg_t FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ?");
    $stmtCount->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtCount->execute();
    $resCount = $stmtCount->get_result()->fetch_assoc();
    $ventasCant = (int)($resCount['total_cant'] ?? 0);
    $ticketPromedio = (float)($resCount['avg_t'] ?? 0.00);
    $stmtCount->close();

    // 2. Método preferido
    $stmtMetodo = $conn->prepare("SELECT metodo_Pago, COUNT(*) as count FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ? GROUP BY metodo_Pago ORDER BY count DESC LIMIT 1");
    $stmtMetodo->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtMetodo->execute();
    $resMetodo = $stmtMetodo->get_result()->fetch_assoc();
    $metodoPreferido = $resMetodo ? $resMetodo['metodo_Pago'] : 'Efectivo';
    $stmtMetodo->close();

    // Métricas Tarjetas
    $stat1_name = "Ventas Realizadas";
    $stat1_value = number_format($ventasCant, 0, ',', '.');
    $stat1_desc = "Transacciones en el periodo";
    $stat1_icon = "fa-solid fa-cart-shopping";
    $stat1_bg = "#e2e2ff";

    $stat2_name = "Ticket Promedio";
    $stat2_value = "$" . number_format($ticketPromedio, 0, ',', '.');
    $stat2_desc = "Gasto promedio por cliente";
    $stat2_icon = "fa-solid fa-calculator";
    $stat2_bg = "#ffd6ff";

    $stat3_name = "Método Preferido";
    $stat3_value = htmlspecialchars($metodoPreferido);
    $stat3_desc = "Método de pago principal";
    $stat3_icon = "fa-solid fa-credit-card";
    $stat3_bg = "#ffd8eb";

    // Gráfico de Línea: Ventas diarias
    $stmtLine = $conn->prepare("SELECT DATE(fecha_Venta) as fecha, SUM(total) as total_dia FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ? GROUP BY DATE(fecha_Venta) ORDER BY fecha ASC");
    $stmtLine->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtLine->execute();
    $resLine = $stmtLine->get_result();

    $diasArray = [];
    $ventasDiaArray = [];
    $diasSemanaES = ['Sun'=>'Dom', 'Mon'=>'Lun', 'Tue'=>'Mar', 'Wed'=>'Mié', 'Thu'=>'Jue', 'Fri'=>'Vie', 'Sat'=>'Sáb'];

    while ($row = $resLine->fetch_assoc()) {
        $fechaObj = strtotime($row['fecha']);
        $diaES = $diasSemanaES[date('D', $fechaObj)] ?? date('D', $fechaObj);
        $diasArray[] = $diaES . ' ' . date('d', $fechaObj);
        $ventasDiaArray[] = (float)$row['total_dia'];
    }
    $stmtLine->close();
    if (empty($diasArray)) {
        $diasArray = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];
        $ventasDiaArray = [0, 0, 0, 0, 0, 0, 0];
    }

    // Gráfico de Dona: Ventas por Método de Pago
    $stmtMetodos = $conn->prepare("SELECT metodo_Pago, SUM(total) as total_metodo FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ? GROUP BY metodo_Pago");
    $stmtMetodos->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtMetodos->execute();
    $resMetodos = $stmtMetodos->get_result();

    $metodosArray = [];
    $totalesMetodoArray = [];
    $totalVentasMetodo = 0;

    while ($row = $resMetodos->fetch_assoc()) {
        $metodosArray[] = $row['metodo_Pago'];
        $total_m = (float)$row['total_metodo'];
        $totalesMetodoArray[] = $total_m;
        $totalVentasMetodo += $total_m;
    }
    $stmtMetodos->close();

    $leyendasMetodo = [];
    foreach ($metodosArray as $i => $metodo) {
        $total_m = $totalesMetodoArray[$i];
        $pct = $totalVentasMetodo > 0 ? round(($total_m / $totalVentasMetodo) * 100) : 0;
        $leyendasMetodo[] = [
            'metodo' => $metodo,
            'total' => $total_m,
            'porcentaje' => $pct,
            'color' => $colorPalette[$i % count($colorPalette)]
        ];
    }

    // Tabla: Últimas Ventas
    $stmtLastV = $conn->prepare("
        SELECT v.*, c.nombre, c.apellido 
        FROM venta v 
        LEFT JOIN cliente c ON v.id_Cliente = c.id_Cliente 
        WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ? 
        ORDER BY v.fecha_Venta DESC 
        LIMIT 5
    ");
    $stmtLastV->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtLastV->execute();
    $resLastV = $stmtLastV->get_result();
    $ultimasVentas = [];
    while ($row = $resLastV->fetch_assoc()) {
        $row['cliente_nombre'] = $row['nombre'] ? $row['nombre'] . ' ' . $row['apellido'] : 'General / Anónimo';
        $ultimasVentas[] = $row;
    }
    $stmtLastV->close();

} elseif ($tab === 'productos') {
    // -------------------------------------------------------------
    // PESTAÑA: PRODUCTOS
    // -------------------------------------------------------------

    // 1. Unidades vendidas y total ingresos
    $stmtIngresos = $conn->prepare("
        SELECT SUM(dv.cantidad) as total_qty, SUM(dv.subtotal) as total_rev 
        FROM detalle_venta dv 
        JOIN venta v ON dv.id_Venta = v.id_Venta 
        WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
    ");
    $stmtIngresos->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtIngresos->execute();
    $resIngresos = $stmtIngresos->get_result()->fetch_assoc();
    $unidadesVendidas = (int)($resIngresos['total_qty'] ?? 0);
    $ingresosProductos = (float)($resIngresos['total_rev'] ?? 0.00);
    $stmtIngresos->close();

    // 2. Producto estrella
    $stmtEstrella = $conn->prepare("
        SELECT p.nombre, SUM(dv.cantidad) as total_qty 
        FROM detalle_venta dv 
        JOIN producto p ON dv.id_Producto = p.id_Producto 
        JOIN venta v ON dv.id_Venta = v.id_Venta 
        WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
        GROUP BY dv.id_Producto 
        ORDER BY total_qty DESC 
        LIMIT 1
    ");
    $stmtEstrella->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtEstrella->execute();
    $resEstrella = $stmtEstrella->get_result()->fetch_assoc();
    $productoEstrella = $resEstrella ? $resEstrella['nombre'] : 'Ninguno';
    $stmtEstrella->close();

    // Métricas Tarjetas
    $stat1_name = "Unidades Vendidas";
    $stat1_value = number_format($unidadesVendidas, 0, ',', '.');
    $stat1_desc = "Productos despachados";
    $stat1_icon = "fa-solid fa-boxes-stacked";
    $stat1_bg = "#ffd8eb";

    $stat2_name = "Producto Estrella";
    $stat2_value = htmlspecialchars($productoEstrella);
    $stat2_desc = "Producto con mayor demanda";
    $stat2_icon = "fa-solid fa-star";
    $stat2_bg = "#ffd6ff";

    $stat3_name = "Ingresos Generados";
    $stat3_value = "$" . number_format($ingresosProductos, 0, ',', '.');
    $stat3_desc = "Facturación total de productos";
    $stat3_icon = "fa-solid fa-sack-dollar";
    $stat3_bg = "#e2e2ff";

    // Gráfico de Barras: Top 5 Productos más vendidos
    $stmtTopProd = $conn->prepare("
        SELECT p.nombre, SUM(dv.cantidad) as total_qty 
        FROM detalle_venta dv 
        JOIN producto p ON dv.id_Producto = p.id_Producto 
        JOIN venta v ON dv.id_Venta = v.id_Venta 
        WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
        GROUP BY dv.id_Producto 
        ORDER BY total_qty DESC 
        LIMIT 5
    ");
    $stmtTopProd->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtTopProd->execute();
    $resTopProd = $stmtTopProd->get_result();

    $prodNombresArray = [];
    $prodCantidadesArray = [];
    while ($row = $resTopProd->fetch_assoc()) {
        $prodNombresArray[] = $row['nombre'];
        $prodCantidadesArray[] = (int)$row['total_qty'];
    }
    $stmtTopProd->close();

    if (empty($prodNombresArray)) {
        $prodNombresArray = ['Sin datos'];
        $prodCantidadesArray = [0];
    }

    // Tabla: Rendimiento de Productos (Top 5)
    $stmtRend = $conn->prepare("
        SELECT p.nombre, p.codigo_Producto, p.unidad_Medida, SUM(dv.cantidad) as total_qty, SUM(dv.subtotal) as total_revenue
        FROM detalle_venta dv
        JOIN producto p ON dv.id_Producto = p.id_Producto
        JOIN venta v ON dv.id_Venta = v.id_Venta
        WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
        GROUP BY dv.id_Producto
        ORDER BY total_qty DESC
        LIMIT 5
    ");
    $stmtRend->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtRend->execute();
    $resRend = $stmtRend->get_result();
    $rendimientoProductos = [];
    while ($row = $resRend->fetch_assoc()) {
        $rendimientoProductos[] = $row;
    }
    $stmtRend->close();

} elseif ($tab === 'clientes') {
    // -------------------------------------------------------------
    // PESTAÑA: CLIENTES
    // -------------------------------------------------------------

    // 1. Clientes Atendidos
    $stmtClientes = $conn->prepare("SELECT COUNT(DISTINCT v.id_Cliente) as total FROM venta v WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?");
    $stmtClientes->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtClientes->execute();
    $resClientes = $stmtClientes->get_result()->fetch_assoc();
    $clientesAtendidos = (int)($resClientes['total'] ?? 0);
    $stmtClientes->close();

    // 2. Cliente VIP (Mayor Gasto)
    $stmtVIP = $conn->prepare("
        SELECT c.nombre, c.apellido, SUM(v.total) as total_spent 
        FROM venta v 
        JOIN cliente c ON v.id_Cliente = c.id_Cliente 
        WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
        GROUP BY v.id_Cliente 
        ORDER BY total_spent DESC 
        LIMIT 1
    ");
    $stmtVIP->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtVIP->execute();
    $resVIP = $stmtVIP->get_result()->fetch_assoc();
    $clienteVIP = $resVIP ? $resVIP['nombre'] . ' ' . $resVIP['apellido'] : 'Ninguno';
    $clienteVIPGasto = $resVIP ? (float)$resVIP['total_spent'] : 0.00;
    $stmtVIP->close();

    // 3. Gasto Promedio por Cliente
    $stmtProm = $conn->prepare("
        SELECT SUM(total) / COUNT(DISTINCT id_Cliente) as avg_spent 
        FROM venta 
        WHERE estado = 'Completada' AND id_Cliente IS NOT NULL AND fecha_Venta BETWEEN ? AND ?
    ");
    $stmtProm->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtProm->execute();
    $resProm = $stmtProm->get_result()->fetch_assoc();
    $gastoPromedio = (float)($resProm['avg_spent'] ?? 0.00);
    $stmtProm->close();

    // Métricas Tarjetas
    $stat1_name = "Clientes Atendidos";
    $stat1_value = number_format($clientesAtendidos, 0, ',', '.');
    $stat1_desc = "Han comprado en el periodo";
    $stat1_icon = "fa-solid fa-users";
    $stat1_bg = "#e2e2ff";

    $stat2_name = "Cliente VIP";
    $stat2_value = htmlspecialchars($clienteVIP);
    $stat2_desc = "Mayor comprador ($" . number_format($clienteVIPGasto, 0, ',', '.') . ")";
    $stat2_icon = "fa-solid fa-crown";
    $stat2_bg = "#ffd8eb";

    $stat3_name = "Gasto Promedio";
    $stat3_value = "$" . number_format($gastoPromedio, 0, ',', '.');
    $stat3_desc = "Gasto promedio por cliente";
    $stat3_icon = "fa-solid fa-scale-balanced";
    $stat3_bg = "#ffd6ff";

    // Gráfico de Barras: Top 5 Clientes con Mayor Gasto
    $stmtTopC = $conn->prepare("
        SELECT CONCAT(c.nombre, ' ', c.apellido) as cliente_nombre, SUM(v.total) as total_spent 
        FROM venta v 
        JOIN cliente c ON v.id_Cliente = c.id_Cliente 
        WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
        GROUP BY v.id_Cliente 
        ORDER BY total_spent DESC 
        LIMIT 5
    ");
    $stmtTopC->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtTopC->execute();
    $resTopC = $stmtTopC->get_result();

    $clientesNombresArray = [];
    $clientesMontosArray = [];
    while ($row = $resTopC->fetch_assoc()) {
        $clientesNombresArray[] = $row['cliente_nombre'];
        $clientesMontosArray[] = (float)$row['total_spent'];
    }
    $stmtTopC->close();

    if (empty($clientesNombresArray)) {
        $clientesNombresArray = ['Sin datos'];
        $clientesMontosArray = [0];
    }

    // Tabla: Ranking de Clientes (Top 5)
    $stmtRank = $conn->prepare("
        SELECT CONCAT(c.nombre, ' ', c.apellido) as cliente_nombre, COUNT(v.id_Venta) as compras_cant, SUM(v.total) as total_spent
        FROM cliente c
        LEFT JOIN venta v ON c.id_Cliente = v.id_Cliente AND v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
        GROUP BY c.id_Cliente
        ORDER BY total_spent DESC
        LIMIT 5
    ");
    $stmtRank->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtRank->execute();
    $resRank = $stmtRank->get_result();
    $rankingClientes = [];
    while ($row = $resRank->fetch_assoc()) {
        // Consultar deuda pendiente por cliente de forma paralela por rendimiento
        $idC = $row['total_spent'] ? 1 : 0; // Solo para validar que tenga compras
        $stmtDeuda = $conn->query("SELECT SUM(saldo_Pendiente) as deuda_p FROM deuda WHERE id_Cliente = (SELECT id_Cliente FROM cliente WHERE CONCAT(nombre, ' ', apellido) = '" . $conn->real_escape_string($row['cliente_nombre']) . "') AND estado != 'Pagada'");
        $deudaP = ($stmtDeuda && $deudaRow = $stmtDeuda->fetch_assoc()) ? (float)$deudaRow['deuda_p'] : 0.00;
        
        $row['total_spent'] = $row['total_spent'] ?? 0.00;
        $row['deuda_pendiente'] = $deudaP;
        $rankingClientes[] = $row;
    }
    $stmtRank->close();

} elseif ($tab === 'inventario') {
    // -------------------------------------------------------------
    // PESTAÑA: INVENTARIO (Datos actuales en stock)
    // -------------------------------------------------------------

    // 1. Valor compra e ingresos venta esperados
    $resVal = $conn->query("SELECT SUM(stock_Actual * precio_Compra) as total_compra, SUM(stock_Actual * precio_Venta) as total_venta FROM producto");
    $vVals = $resVal ? $resVal->fetch_assoc() : ['total_compra' => 0.00, 'total_venta' => 0.00];
    
    $inventarioValorCompra = (float)($vVals['total_compra'] ?? 0.00);
    $inventarioValorVenta = (float)($vVals['total_venta'] ?? 0.00);
    $margenPesos = $inventarioValorVenta - $inventarioValorCompra;
    $margenPct = $inventarioValorVenta > 0 ? round(($margenPesos / $inventarioValorVenta) * 100) : 0;

    // Métricas Tarjetas
    $stat1_name = "Valor de Compra";
    $stat1_value = "$" . number_format($inventarioValorCompra, 0, ',', '.');
    $stat1_desc = "Inversión actual en stock";
    $stat1_icon = "fa-solid fa-hand-holding-dollar";
    $stat1_bg = "#ffd6ff";

    $stat2_name = "Valor de Venta";
    $stat2_value = "$" . number_format($inventarioValorVenta, 0, ',', '.');
    $stat2_desc = "Valor de venta estimado";
    $stat2_icon = "fa-solid fa-store";
    $stat2_bg = "#e2e2ff";

    $stat3_name = "Margen Estimado";
    $stat3_value = "$" . number_format($margenPesos, 0, ',', '.') . " (" . $margenPct . "%)";
    $stat3_desc = "Ganancia proyectada en stock";
    $stat3_icon = "fa-solid fa-chart-line";
    $stat3_bg = "#ffd8eb";

    // Gráfico de Barras: Stock por Categoría (unidad_Medida)
    $resStockCat = $conn->query("SELECT unidad_Medida as categoria, SUM(stock_Actual) as total_stock FROM producto GROUP BY unidad_Medida ORDER BY total_stock DESC");
    $stockCategoriasArray = [];
    $stockTotalesArray = [];
    if ($resStockCat) {
        while ($row = $resStockCat->fetch_assoc()) {
            $stockCategoriasArray[] = $row['categoria'] ? $row['categoria'] : 'Otros';
            $stockTotalesArray[] = (int)$row['total_stock'];
        }
    }
    if (empty($stockCategoriasArray)) {
        $stockCategoriasArray = ['Sin Stock'];
        $stockTotalesArray = [0];
    }

    // Tabla: Productos con Stock Crítico (stock_Actual <= stock_Minimo)
    $resCritico = $conn->query("SELECT nombre, codigo_Producto, stock_Actual, stock_Minimo FROM producto WHERE stock_Actual <= stock_Minimo ORDER BY stock_Actual ASC LIMIT 5");
    $stockCritico = [];
    if ($resCritico) {
        while ($row = $resCritico->fetch_assoc()) {
            $stockCritico[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes | SIVC</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- CSS general -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- CSS Dashboard & Reportes Local (Cache Busted) -->
    <link rel="stylesheet" href="admi.css/dashboard_admi.css?v=5">
    <link rel="stylesheet" href="admi.css/reportes_admi.css?v=5">
    
    <style>
        /* Estilos de impresión */
        @media print {
            body * {
                visibility: hidden;
            }
            .main-content, .main-content * {
                visibility: visible;
            }
            .main-content {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .sidebar, .mobile-toggle-btn, .report-tabs-bar, .date-selector-row {
                display: none !important;
            }
        }
    </style>
    <?php 
    require_once __DIR__ . '/../../configuration/load_config.php';
    aplicarConfiguracionEstilos();
    ?>
</head>

<body>

    <div class="dashboard-container">

        <!-- ==========================================
             SIDEBAR (BARRA LATERAL)
        =========================================== -->
        <aside class="sidebar" id="sidebar">
            <button class="sidebar-toggle-btn" id="sidebarClose">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Store Logo -->
            <div class="sidebar-logo-section">
                <img src="../../public/img/tienda.png" alt="Doña Marina Logo" class="brand-logo-img">
                <h2 class="brand-title">DOÑA MARINA</h2>
                <span class="brand-subtitle">TIENDA DE BARRIO</span>
            </div>

            <!-- Navigation Links -->
            <nav class="sidebar-navigation">
                <a href="dashboar_admi.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-house"></i>
                        <span>Inicio</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>

                <a href="inventario.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-basket-shopping"></i>
                        <span>Inventario</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>

                <a href="ventas.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Ventas</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>

                <a href="clientes.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-users"></i>
                        <span>Clientes</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>

                <a href="vendedores.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-user-tie"></i>
                        <span>Vendedores</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>

                <a href="reportes.php" class="sidebar-link-card active">
                    <div class="link-left">
                        <i class="fa-solid fa-chart-simple"></i>
                        <span>Reportes</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>

                <a href="configuracion.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-gear"></i>
                        <span>Configuracion</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>
            </nav>

            <!-- Logout -->
            <div class="sidebar-footer-section">
                <a href="../../controllers/logout.php" class="sidebar-logout-btn">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Cerrar sesion</span>
                </a>
            </div>
        </aside>

        <!-- ==========================================
             MAIN CONTENT
        =========================================== -->
        <main class="main-content">
            <!-- Mobile Toggle Menu -->
            <button class="mobile-toggle-btn" id="mobileMenu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Header Section -->
            <header class="header-with-illustration">
                <div class="welcome-header-text">
                    <h1 style="font-size: 56px; font-weight: 800; color: #000000; margin: 0;">Reportes</h1>
                </div>
                <div class="header-illustration">
                    <img src="../../public/img/store_shelves_illustration.jpg" alt="Illustration" class="header-illustration-img">
                </div>
            </header>

            <!-- Report Tabs -->
            <section class="tabs-section">
                <div class="report-tabs-bar">
                    <div class="tabs-left">
                        <a href="reportes.php?tab=general" class="tab-pill <?= $tab === 'general' ? 'active' : ''; ?>">Resumen General</a>
                        <a href="reportes.php?tab=ventas" class="tab-pill <?= $tab === 'ventas' ? 'active' : ''; ?>">Ventas</a>
                        <a href="reportes.php?tab=productos" class="tab-pill <?= $tab === 'productos' ? 'active' : ''; ?>">Productos</a>
                        <a href="reportes.php?tab=clientes" class="tab-pill <?= $tab === 'clientes' ? 'active' : ''; ?>">Clientes</a>
                        <a href="reportes.php?tab=inventario" class="tab-pill <?= $tab === 'inventario' ? 'active' : ''; ?>">Inventario</a>
                    </div>
                    <button class="btn-export" onclick="window.print()">
                        <i class="fa-solid fa-download"></i> Exportar
                    </button>
                </div>
            </section>

            <!-- Date Selector (Omitir para Inventario ya que es tiempo real) -->
            <?php if ($tab !== 'inventario'): ?>
                <section class="date-selector-row">
                    <form action="reportes.php" method="GET" class="date-range-badge" id="dateForm">
                        <input type="hidden" name="tab" value="<?= htmlspecialchars($tab); ?>">
                        <i class="fa-regular fa-calendar-days"></i>
                        <input type="date" name="fecha_inicio" value="<?= $fecha_inicio; ?>" onchange="this.form.submit();" style="border:none; outline:none; font-family:inherit; font-weight:700; color:var(--text-dark); cursor:pointer;">
                        <span>al</span>
                        <input type="date" name="fecha_fin" value="<?= $fecha_fin; ?>" onchange="this.form.submit();" style="border:none; outline:none; font-family:inherit; font-weight:700; color:var(--text-dark); cursor:pointer;">
                    </form>
                </section>
            <?php endif; ?>

            <!-- Stat Cards Row -->
            <section class="report-stats-row">
                <!-- Card 1 -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: <?= $stat1_bg; ?>;">
                        <i class="<?= $stat1_icon; ?>" style="color: var(--color-pink);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name"><?= $stat1_name; ?></span>
                        <span class="stat-number"><?= $stat1_value; ?></span>
                        <span class="stat-desc"><?= $stat1_desc; ?></span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: <?= $stat2_bg; ?>;">
                        <i class="<?= $stat2_icon; ?>" style="color: var(--color-magenta);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name"><?= $stat2_name; ?></span>
                        <span class="stat-number"><?= $stat2_value; ?></span>
                        <span class="stat-desc"><?= $stat2_desc; ?></span>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: <?= $stat3_bg; ?>;">
                        <i class="<?= $stat3_icon; ?>" style="color: var(--color-blue);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name"><?= $stat3_name; ?></span>
                        <span class="stat-number"><?= $stat3_value; ?></span>
                        <span class="stat-desc"><?= $stat3_desc; ?></span>
                    </div>
                </div>
            </section>

            <!-- Conditionally Rendered Content -->
            <section class="charts-section">
                
                <?php if ($tab === 'general'): ?>
                    <!-- PESTAÑA RESUMEN GENERAL -->
                    <div class="charts-grid-row">
                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Ventas por día</h3>
                                <select class="chart-header-control" id="lineChartType" onchange="cambiarTipoGrafico(this.value)">
                                    <option value="line">Gráfico de líneas</option>
                                    <option value="bar">Gráfico de barras</option>
                                </select>
                            </div>
                            <div style="flex: 1; position: relative; min-height: 260px;">
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>

                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Ventas por categoría</h3>
                            </div>
                            <div class="donut-chart-container">
                                <div class="donut-canvas-wrapper">
                                    <canvas id="donutChart"></canvas>
                                </div>
                                <div class="category-legend-list">
                                    <?php foreach ($leyendas as $item): ?>
                                        <div class="legend-item">
                                            <div class="legend-item-left">
                                                <div class="legend-color-dot" style="background-color: <?= $item['color']; ?>;"></div>
                                                <span><?= htmlspecialchars($item['categoria']); ?></span>
                                            </div>
                                            <div class="legend-item-right">
                                                <strong><?= $item['porcentaje']; ?>%</strong>
                                                <span>$<?= number_format($item['total'], 0, ',', '.'); ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="chart-panel-footer">
                                <a href="inventario.php" class="btn-detail-link">Ver detalle <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                <?php elseif ($tab === 'ventas'): ?>
                    <!-- PESTAÑA VENTAS -->
                    <div class="charts-grid-row">
                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Ventas por día</h3>
                            </div>
                            <div style="flex: 1; position: relative; min-height: 280px;">
                                <canvas id="salesLineChart"></canvas>
                            </div>
                        </div>

                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Métodos de Pago</h3>
                            </div>
                            <div class="donut-chart-container" style="margin-bottom: 20px;">
                                <div class="donut-canvas-wrapper" style="width:130px; height:130px;">
                                    <canvas id="paymentDonutChart"></canvas>
                                </div>
                                <div class="category-legend-list">
                                    <?php foreach ($leyendasMetodo as $lm): ?>
                                        <div class="legend-item">
                                            <div class="legend-item-left">
                                                <div class="legend-color-dot" style="background-color: <?= $lm['color']; ?>;"></div>
                                                <span><?= htmlspecialchars($lm['metodo']); ?></span>
                                            </div>
                                            <div class="legend-item-right">
                                                <strong><?= $lm['porcentaje']; ?>%</strong>
                                                <span>$<?= number_format($lm['total'], 0, ',', '.'); ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            
                            <!-- Tabla de Últimas Ventas -->
                            <div class="chart-panel-header" style="margin-top:15px; margin-bottom:10px;">
                                <h3 style="font-size:13px;">Últimas ventas registradas</h3>
                            </div>
                            <div class="report-table-wrapper">
                                <table class="report-table">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Cliente</th>
                                            <th>Método</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ultimasVentas as $uv): ?>
                                            <tr>
                                                <td><?= date('d/m/H:i', strtotime($uv['fecha_Venta'])); ?></td>
                                                <td><?= htmlspecialchars($uv['cliente_nombre']); ?></td>
                                                <td><?= htmlspecialchars($uv['metodo_Pago']); ?></td>
                                                <td style="font-weight:700;">$<?= number_format($uv['total'], 0, ',', '.'); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php elseif ($tab === 'productos'): ?>
                    <!-- PESTAÑA PRODUCTOS -->
                    <div class="charts-grid-row">
                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Top 5 Productos más vendidos</h3>
                            </div>
                            <div style="flex: 1; position: relative; min-height: 280px;">
                                <canvas id="productsBarChart"></canvas>
                            </div>
                        </div>

                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Rendimiento de Productos</h3>
                            </div>
                            <div class="report-table-wrapper">
                                <table class="report-table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Categoría</th>
                                            <th>Cant.</th>
                                            <th>Ingresos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rendimientoProductos as $rp): ?>
                                            <tr>
                                                <td style="font-weight:700;"><?= htmlspecialchars($rp['nombre']); ?></td>
                                                <td><span class="category-badge" style="background-color:#f3e6f8; color:#6f2dbd; padding:3px 8px; border-radius:6px; font-size:11px; font-weight:700;"><?= htmlspecialchars($rp['unidad_Medida']); ?></span></td>
                                                <td><?= $rp['total_qty']; ?></td>
                                                <td style="font-weight:700;">$<?= number_format($rp['total_revenue'], 0, ',', '.'); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="chart-panel-footer">
                                <a href="inventario.php" class="btn-detail-link">Gestionar inventario <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                <?php elseif ($tab === 'clientes'): ?>
                    <!-- PESTAÑA CLIENTES -->
                    <div class="charts-grid-row">
                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Top 5 Clientes con mayor gasto</h3>
                            </div>
                            <div style="flex: 1; position: relative; min-height: 280px;">
                                <canvas id="clientsBarChart"></canvas>
                            </div>
                        </div>

                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Ranking de Compras</h3>
                            </div>
                            <div class="report-table-wrapper">
                                <table class="report-table">
                                    <thead>
                                        <tr>
                                            <th>Cliente</th>
                                            <th>Compras</th>
                                            <th>Total Gasto</th>
                                            <th>Deuda Pend.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rankingClientes as $rc): ?>
                                            <tr>
                                                <td style="font-weight:700;"><?= htmlspecialchars($rc['cliente_nombre']); ?></td>
                                                <td><?= $rc['compras_cant']; ?></td>
                                                <td style="font-weight:700;">$<?= number_format($rc['total_spent'], 0, ',', '.'); ?></td>
                                                <td style="color:#f72585; font-weight:700;">$<?= number_format($rc['deuda_pendiente'], 0, ',', '.'); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="chart-panel-footer">
                                <a href="clientes.php" class="btn-detail-link">Ver clientes <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                <?php elseif ($tab === 'inventario'): ?>
                    <!-- PESTAÑA INVENTARIO -->
                    <div class="charts-grid-row">
                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Distribución de Stock por Categoría</h3>
                            </div>
                            <div style="flex: 1; position: relative; min-height: 280px;">
                                <canvas id="inventoryBarChart"></canvas>
                            </div>
                        </div>

                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Productos con Stock Crítico</h3>
                            </div>
                            <div class="report-table-wrapper">
                                <table class="report-table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Stock Act.</th>
                                            <th>Mínimo</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($stockCritico) > 0): ?>
                                            <?php foreach ($stockCritico as $sc): ?>
                                                <?php 
                                                    $stock = (int)$sc['stock_Actual'];
                                                    $statusText = $stock === 0 ? "Sin Stock" : "Stock Bajo";
                                                    $statusStyle = $stock === 0 ? "background-color:#f8d7da; color:#721c24;" : "background-color:#fff3cd; color:#856404;";
                                                ?>
                                                <tr>
                                                    <td style="font-weight:700;"><?= htmlspecialchars($sc['nombre']); ?></td>
                                                    <td><?= $stock; ?></td>
                                                    <td><?= $sc['stock_Minimo']; ?></td>
                                                    <td>
                                                        <span style="padding: 4px 8px; border-radius: 8px; font-size:11px; font-weight:700; <?= $statusStyle; ?>">
                                                            <?= $statusText; ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 20px;">
                                                    Todo en orden. No hay stock crítico.
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="chart-panel-footer">
                                <a href="inventario.php" class="btn-detail-link">Ajustar inventario <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>
            </section>
        </main>
    </div>

    <!-- SCRIPT DE INICIALIZACIÓN DE GRÁFICOS DINÁMICOS -->
    <script>
        // CONFIGURACIÓN GLOBAL DE FUENTES Y ESTILOS CHART.JS
        Chart.defaults.font.family = 'Montserrat';
        Chart.defaults.font.weight = '600';
        Chart.defaults.color = '#120e24';

        <?php if ($tab === 'general'): ?>
            // -----------------------------------------------------------
            // CHART GENERAL
            // -----------------------------------------------------------
            const lineCtx = document.getElementById('lineChart').getContext('2d');
            const lineLabels = <?= json_encode($diasArray); ?>;
            const lineData = <?= json_encode($ventasDiaArray); ?>;

            let chartDiario = new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: lineLabels,
                    datasets: [{
                        label: 'Ventas ($)',
                        data: lineData,
                        borderColor: '#9b5de5',
                        backgroundColor: 'rgba(155, 93, 229, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.3,
                        pointBackgroundColor: '#f72585',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: context => 'Ventas: $' + context.raw.toLocaleString('es-CO')
                            }
                        }
                    },
                    scales: {
                        x: { grid: { display: false } },
                        y: {
                            beginAtZero: true,
                            grid: { color: '#f2e7fc' },
                            ticks: { callback: val => '$' + val.toLocaleString('es-CO') }
                        }
                    }
                }
            });

            function cambiarTipoGrafico(type) {
                chartDiario.destroy();
                chartDiario = new Chart(lineCtx, {
                    type: type,
                    data: {
                        labels: lineLabels,
                        datasets: [{
                            label: 'Ventas ($)',
                            data: lineData,
                            borderColor: '#9b5de5',
                            backgroundColor: type === 'bar' ? 'rgba(155, 93, 229, 0.7)' : 'rgba(155, 93, 229, 0.1)',
                            borderWidth: type === 'bar' ? 0 : 3,
                            fill: true,
                            borderRadius: type === 'bar' ? 6 : 0,
                            tension: 0.3,
                            pointBackgroundColor: '#f72585',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: type === 'bar' ? 0 : 5
                        }]
                    },
                    options: chartDiario.options
                });
            }

            // Dona
            const donutCtx = document.getElementById('donutChart').getContext('2d');
            const donutLabels = <?= json_encode($categoriasArray); ?>;
            const donutData = <?= json_encode($totalesCatArray); ?>;
            const donutColors = <?= json_encode($colorPalette); ?>;

            new Chart(donutCtx, {
                type: 'doughnut',
                data: {
                    labels: donutLabels,
                    datasets: [{
                        data: donutData,
                        backgroundColor: donutColors.slice(0, donutData.length),
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '60%',
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: context => context.label + ': $' + context.raw.toLocaleString('es-CO')
                            }
                        }
                    }
                }
            });

        <?php elseif ($tab === 'ventas'): ?>
            // -----------------------------------------------------------
            // CHART VENTAS
            // -----------------------------------------------------------
            const salesCtx = document.getElementById('salesLineChart').getContext('2d');
            new Chart(salesCtx, {
                type: 'line',
                data: {
                    labels: <?= json_encode($diasArray); ?>,
                    datasets: [{
                        label: 'Ventas ($)',
                        data: <?= json_encode($ventasDiaArray); ?>,
                        borderColor: '#3f37c9',
                        backgroundColor: 'rgba(63, 55, 201, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.3,
                        pointBackgroundColor: '#b5179e',
                        pointBorderColor: '#ffffff',
                        pointRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { grid: { display: false } },
                        y: {
                            beginAtZero: true,
                            grid: { color: '#ebd0f0' },
                            ticks: { callback: val => '$' + val.toLocaleString('es-CO') }
                        }
                    }
                }
            });

            // Metodo Pago Donut
            const paymentCtx = document.getElementById('paymentDonutChart').getContext('2d');
            new Chart(paymentCtx, {
                type: 'doughnut',
                data: {
                    labels: <?= json_encode($metodosArray); ?>,
                    datasets: [{
                        data: <?= json_encode($totalesMetodoArray); ?>,
                        backgroundColor: ['#6f2dbd', '#f72585', '#3f37c9']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '60%',
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: context => context.label + ': $' + context.raw.toLocaleString('es-CO')
                            }
                        }
                    }
                }
            });

        <?php elseif ($tab === 'productos'): ?>
            // -----------------------------------------------------------
            // CHART PRODUCTOS (Top 5 más vendidos)
            // -----------------------------------------------------------
            const prodCtx = document.getElementById('productsBarChart').getContext('2d');
            new Chart(prodCtx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($prodNombresArray); ?>,
                    datasets: [{
                        label: 'Unidades Vendidas',
                        data: <?= json_encode($prodCantidadesArray); ?>,
                        backgroundColor: 'rgba(247, 37, 133, 0.8)',
                        borderRadius: 8,
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { grid: { display: false } },
                        y: {
                            beginAtZero: true,
                            grid: { color: '#ebd0f0' },
                            ticks: { stepSize: 5 }
                        }
                    }
                }
            });

        <?php elseif ($tab === 'clientes'): ?>
            // -----------------------------------------------------------
            // CHART CLIENTES (Top 5 mayor gasto)
            // -----------------------------------------------------------
            const cliCtx = document.getElementById('clientsBarChart').getContext('2d');
            new Chart(cliCtx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($clientesNombresArray); ?>,
                    datasets: [{
                        label: 'Gasto Total ($)',
                        data: <?= json_encode($clientesMontosArray); ?>,
                        backgroundColor: 'rgba(63, 55, 201, 0.8)',
                        borderRadius: 8,
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { grid: { display: false } },
                        y: {
                            beginAtZero: true,
                            grid: { color: '#ebd0f0' },
                            ticks: { callback: val => '$' + val.toLocaleString('es-CO') }
                        }
                    }
                }
            });

        <?php elseif ($tab === 'inventario'): ?>
            // -----------------------------------------------------------
            // CHART INVENTARIO (Stock por categoría)
            // -----------------------------------------------------------
            const invCtx = document.getElementById('inventoryBarChart').getContext('2d');
            new Chart(invCtx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($stockCategoriasArray); ?>,
                    datasets: [{
                        label: 'Stock en unidades',
                        data: <?= json_encode($stockTotalesArray); ?>,
                        backgroundColor: 'rgba(111, 45, 189, 0.8)',
                        borderRadius: 8,
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { grid: { display: false } },
                        y: {
                            beginAtZero: true,
                            grid: { color: '#ebd0f0' },
                            ticks: { stepSize: 10 }
                        }
                    }
                }
            });
        <?php endif; ?>
    </script>
</body>

</html>
