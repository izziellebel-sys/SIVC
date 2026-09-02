<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/database.php';

// Obtener info del administrador logueado
$id_admin_logueado = $_SESSION['id_Usuario'] ?? 0;
$resAdminLogueado = $conn->query("SELECT * FROM usuarios WHERE id_Usuario = $id_admin_logueado");
$adminLogueadoInfo = $resAdminLogueado ? $resAdminLogueado->fetch_assoc() : null;

$adminEmail = $adminLogueadoInfo['correo'] ?? 'admin@sivc.com';
$nombreUsuario = trim(($adminLogueadoInfo['nombre'] ?? '') . ' ' . ($adminLogueadoInfo['apellido'] ?? ''));
if (empty($nombreUsuario)) {
    $nombreUsuario = $_SESSION['usuario'] ?? 'Administrador';
}

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
$fechaString = $dias[$diaSemana] . ', ' . date('d') . ' de ' . $meses[$mes] . ' de ' . date('Y');
$horaString = date('h:i a');

// EJECUTAR CONSULTAS EN FUNCIÓN DE LA PESTAÑA SELECCIONADA
$stat1_name = $stat1_value = $stat1_desc = $stat1_icon = $stat1_bg = "";
$stat2_name = $stat2_value = $stat2_desc = $stat2_icon = $stat2_bg = "";
$stat3_name = $stat3_value = $stat3_desc = $stat3_icon = $stat3_bg = "";

$colorPalette = ['#10b981', '#a855f7', '#3b82f6', '#f97316', '#0d9488', '#ec4899'];

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

    // 4. Ganancia Estimada (precio_venta - precio_compra de los productos vendidos)
    $stmtG = $conn->prepare("
        SELECT SUM(dv.cantidad * (p.precio_Venta - p.precio_Compra)) as ganancia 
        FROM detalle_venta dv 
        JOIN producto p ON dv.id_Producto = p.id_Producto 
        JOIN venta v ON dv.id_Venta = v.id_Venta 
        WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
    ");
    $stmtG->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtG->execute();
    $resG = $stmtG->get_result()->fetch_assoc();
    $gananciaEstimada = (float)($resG['ganancia'] ?? 0.00);
    $stmtG->close();

    // 5. Número de ventas completadas
    $stmtCantV = $conn->prepare("SELECT COUNT(*) as total FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ?");
    $stmtCantV->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtCantV->execute();
    $resCantV = $stmtCantV->get_result()->fetch_assoc();
    $numeroVentas = (int)($resCantV['total'] ?? 0);
    $stmtCantV->close();

    // 6. Producto más vendido
    $stmtBest = $conn->prepare("
        SELECT p.nombre, SUM(dv.cantidad) as total_qty 
        FROM detalle_venta dv 
        JOIN producto p ON dv.id_Producto = p.id_Producto 
        JOIN venta v ON dv.id_Venta = v.id_Venta 
        WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
        GROUP BY dv.id_Producto 
        ORDER BY total_qty DESC 
        LIMIT 1
    ");
    $stmtBest->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtBest->execute();
    $resBest = $stmtBest->get_result()->fetch_assoc();
    $productoMasVendido = $resBest ? $resBest['nombre'] . ' (' . $resBest['total_qty'] . ' uds)' : 'Ninguno';
    $stmtBest->close();

    // 7. Estado general del inventario
    $resInvStats = $conn->query("
        SELECT 
            COUNT(*) as total_productos,
            SUM(stock_Actual) as stock_total,
            SUM(CASE WHEN stock_Actual = 0 THEN 1 ELSE 0 END) as agotados,
            SUM(CASE WHEN stock_Actual <= stock_Minimo AND stock_Actual > 0 THEN 1 ELSE 0 END) as stock_bajo,
            SUM(stock_Actual * precio_Compra) as valor_compra,
            SUM(stock_Actual * precio_Venta) as valor_venta
        FROM producto
    ");
    $invStats = $resInvStats ? $resInvStats->fetch_assoc() : [
        'total_productos' => 0, 'stock_total' => 0, 'agotados' => 0, 'stock_bajo' => 0, 'valor_compra' => 0.0, 'valor_venta' => 0.0
    ];

    // Métricas para las Tarjetas
    $stat1_name = "Ventas totales";
    $stat1_value = "$" . number_format($ventasTotales, 0, ',', '.');
    $stat1_desc = "";
    $stat1_icon = "fa-solid fa-bag-shopping";
    $stat1_bg = "#e6f7f0";
    $stat1_icon_color = "#10b981";
    $stat1_trend = "12.5%";

    $stat2_name = "Productos vendidos";
    $stat2_value = number_format($productosVendidos, 0, ',', '.');
    $stat2_desc = "";
    $stat2_icon = "fa-solid fa-box";
    $stat2_bg = "#f5ebfa";
    $stat2_icon_color = "#a855f7";
    $stat2_trend = "8.3%";

    $stat3_name = "Clientes atendidos";
    $stat3_value = number_format($clientesAtendidos, 0, ',', '.');
    $stat3_desc = "";
    $stat3_icon = "fa-solid fa-users";
    $stat3_bg = "#eef2ff";
    $stat3_icon_color = "#3b82f6";
    $stat3_trend = "15.2%";

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
    $stmtCount = $conn->prepare("SELECT COUNT(*) as total_cant, AVG(total) as avg_t, SUM(total) as sum_t FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ?");
    $stmtCount->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtCount->execute();
    $resCount = $stmtCount->get_result()->fetch_assoc();
    $ventasCant = (int)($resCount['total_cant'] ?? 0);
    $ticketPromedio = (float)($resCount['avg_t'] ?? 0.00);
    $ventasTotales = (float)($resCount['sum_t'] ?? 0.00);
    $stmtCount->close();

    // 2. Método preferido
    $stmtMetodo = $conn->prepare("SELECT metodo_Pago, COUNT(*) as count FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ? GROUP BY metodo_Pago ORDER BY count DESC LIMIT 1");
    $stmtMetodo->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtMetodo->execute();
    $resMetodo = $stmtMetodo->get_result()->fetch_assoc();
    $metodoPreferido = $resMetodo ? $resMetodo['metodo_Pago'] : 'Efectivo';
    $stmtMetodo->close();

    // Métricas Tarjetas
    $stat1_name = "Ventas realizadas";
    $stat1_value = number_format($ventasCant, 0, ',', '.');
    $stat1_desc = "Transacciones";
    $stat1_icon = "fa-solid fa-cart-shopping";
    $stat1_bg = "#e6f7f0";
    $stat1_icon_color = "#10b981";
    $stat1_trend = "";

    $stat2_name = "Ventas totales";
    $stat2_value = "$" . number_format($ventasTotales, 0, ',', '.');
    $stat2_desc = "";
    $stat2_icon = "fa-solid fa-wallet";
    $stat2_bg = "#f5ebfa";
    $stat2_icon_color = "#a855f7";
    $stat2_trend = "12.5%";

    $stat3_name = "Ticket promedio";
    $stat3_value = "$" . number_format($ticketPromedio, 0, ',', '.');
    $stat3_desc = "";
    $stat3_icon = "fa-solid fa-calculator";
    $stat3_bg = "#fff0e6";
    $stat3_icon_color = "#f97316";
    $stat3_trend = "8.3%";

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

    // Ventas de contado vs fiadas (conteo y total)
    $stmtContado = $conn->prepare("SELECT COUNT(*) as cant, SUM(total) as sum FROM venta WHERE estado = 'Completada' AND metodo_Pago != 'Crédito' AND fecha_Venta BETWEEN ? AND ?");
    $stmtContado->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtContado->execute();
    $resContado = $stmtContado->get_result()->fetch_assoc();
    $cantContado = (int)($resContado['cant'] ?? 0);
    $sumContado = (float)($resContado['sum'] ?? 0.00);
    $stmtContado->close();

    $stmtFiado = $conn->prepare("SELECT COUNT(*) as cant, SUM(total) as sum FROM venta WHERE estado = 'Completada' AND metodo_Pago = 'Crédito' AND fecha_Venta BETWEEN ? AND ?");
    $stmtFiado->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtFiado->execute();
    $resFiado = $stmtFiado->get_result()->fetch_assoc();
    $cantFiado = (int)($resFiado['cant'] ?? 0);
    $sumFiado = (float)($resFiado['sum'] ?? 0.00);
    $stmtFiado->close();

    // Tabla de Ventas Detallada
    $stmtVentasDetalle = $conn->prepare("
        SELECT 
            v.id_Venta,
            v.fecha_Venta,
            COALESCE(CONCAT(c.nombre, ' ', c.apellido), 'General / Anónimo') as cliente_nombre,
            COALESCE(CONCAT(u.nombre, ' ', u.apellido), 'Administrador') as vendedor_nombre,
            v.metodo_Pago,
            v.descuento,
            v.total
        FROM venta v
        LEFT JOIN cliente c ON v.id_Cliente = c.id_Cliente
        LEFT JOIN usuarios u ON v.id_Usuario = u.id_Usuario
        WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
        ORDER BY v.fecha_Venta DESC
    ");
    $stmtVentasDetalle->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtVentasDetalle->execute();
    $resVentasDetalle = $stmtVentasDetalle->get_result();
    $ventasDetalleArray = [];
    while ($row = $resVentasDetalle->fetch_assoc()) {
        // Query products for this sale
        $stmtP = $conn->prepare("
            SELECT p.nombre, dv.cantidad 
            FROM detalle_venta dv 
            JOIN producto p ON dv.id_Producto = p.id_Producto 
            WHERE dv.id_Venta = ?
        ");
        $stmtP->bind_param("i", $row['id_Venta']);
        $stmtP->execute();
        $resP = $stmtP->get_result();
        $prodList = [];
        while ($pRow = $resP->fetch_assoc()) {
            $prodList[] = htmlspecialchars($pRow['nombre']) . ' (x' . $pRow['cantidad'] . ')';
        }
        $row['productos_comprados'] = implode(', ', $prodList);
        $row['tipo_venta'] = ($row['metodo_Pago'] === 'Crédito') ? 'Fiada' : 'Contado';
        $ventasDetalleArray[] = $row;
        $stmtP->close();
    }
    $stmtVentasDetalle->close();

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
    $stat1_name = "Unidades vendidas";
    $stat1_value = number_format($unidadesVendidas, 0, ',', '.');
    $stat1_desc = "Productos despachados";
    $stat1_icon = "fa-solid fa-box";
    $stat1_bg = "#eef2ff";
    $stat1_icon_color = "#3b82f6";
    $stat1_trend = "";

    $stat2_name = "Producto estrella";
    $stat2_value = htmlspecialchars($productoEstrella);
    $stat2_desc = "Mayor demanda";
    $stat2_icon = "fa-solid fa-star";
    $stat2_bg = "#fdf2f8";
    $stat2_icon_color = "#ec4899";
    $stat2_trend = "";

    $stat3_name = "Ingresos por productos";
    $stat3_value = "$" . number_format($ingresosProductos, 0, ',', '.');
    $stat3_desc = "Facturación total";
    $stat3_icon = "fa-solid fa-hand-holding-dollar";
    $stat3_bg = "#e6f7f0";
    $stat3_icon_color = "#10b981";
    $stat3_trend = "";

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

    // Rendimiento de todos los productos (para el reporte detallado)
    $stmtProdAll = $conn->prepare("
        SELECT 
            p.nombre,
            p.unidad_Medida as categoria,
            p.precio_Venta,
            COALESCE(SUM(dv.cantidad), 0) as unidades_vendidas,
            COALESCE(SUM(dv.subtotal), 0) as ingresos_generados
        FROM producto p
        LEFT JOIN detalle_venta dv ON p.id_Producto = dv.id_Producto
        LEFT JOIN venta v ON dv.id_Venta = v.id_Venta AND v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
        GROUP BY p.id_Producto
        ORDER BY unidades_vendidas DESC
    ");
    $stmtProdAll->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtProdAll->execute();
    $resProdAll = $stmtProdAll->get_result();
    $todosProductosReporte = [];
    while ($row = $resProdAll->fetch_assoc()) {
        $todosProductosReporte[] = $row;
    }
    $stmtProdAll->close();

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

    // Consultas para Resumen de Clientes
    $resTotalC = $conn->query("SELECT COUNT(*) as total FROM cliente");
    $totalClientesGeneral = $resTotalC ? (int)$resTotalC->fetch_assoc()['total'] : 0;

    $resActivosC = $conn->query("SELECT COUNT(*) as total FROM cliente WHERE estado = 'Activo'");
    $clientesActivosReal = $resActivosC ? (int)$resActivosC->fetch_assoc()['total'] : 0;

    $resNuevosC = $conn->query("SELECT COUNT(*) as total FROM cliente WHERE MONTH(fecha_Registro) = MONTH(CURRENT_DATE()) AND YEAR(fecha_Registro) = YEAR(CURRENT_DATE())");
    $clientesNuevosMes = $resNuevosC ? (int)$resNuevosC->fetch_assoc()['total'] : 0;

    $resConCompras = $conn->query("SELECT COUNT(DISTINCT id_Cliente) as total FROM venta WHERE id_Cliente IS NOT NULL AND estado = 'Completada'");
    $clientesConCompras = $resConCompras ? (int)$resConCompras->fetch_assoc()['total'] : 0;

    $clientesSinCompras = max(0, $totalClientesGeneral - $clientesConCompras);

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
    $stat1_name = "Clientes atendidos";
    $stat1_value = number_format($clientesAtendidos, 0, ',', '.');
    $stat1_desc = "Han comprado";
    $stat1_icon = "fa-solid fa-users";
    $stat1_bg = "#eef2ff";
    $stat1_icon_color = "#3b82f6";
    $stat1_trend = "";

    $stat2_name = "Cliente con mayor gasto";
    $stat2_value = htmlspecialchars($clienteVIP);
    $stat2_desc = "$" . number_format($clienteVIPGasto, 0, ',', '.');
    $stat2_icon = "fa-solid fa-crown";
    $stat2_bg = "#fdf2f8";
    $stat2_icon_color = "#ec4899";
    $stat2_trend = "";

    $stat3_name = "Gasto promedio por cliente";
    $stat3_value = "$" . number_format($gastoPromedio, 0, ',', '.');
    $stat3_desc = "En el periodo";
    $stat3_icon = "fa-solid fa-wallet";
    $stat3_bg = "#e6f7f0";
    $stat3_icon_color = "#10b981";
    $stat3_trend = "";

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

    // Detalle completo de clientes (para el reporte detallado)
    $stmtCliRep = $conn->prepare("
        SELECT 
            c.id_Cliente,
            CONCAT(c.nombre, ' ', c.apellido) as cliente_nombre,
            COUNT(DISTINCT v.id_Venta) as compras_cant,
            SUM(v.total) as total_spent,
            MAX(v.fecha_Venta) as ultima_compra_fecha
        FROM cliente c
        JOIN venta v ON c.id_Cliente = v.id_Cliente
        WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
        GROUP BY c.id_Cliente
        ORDER BY total_spent DESC
    ");
    $stmtCliRep->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtCliRep->execute();
    $resCliRep = $stmtCliRep->get_result();
    $clientesReporteArray = [];
    while ($row = $resCliRep->fetch_assoc()) {
        // Query products purchased by this client in the period
        $stmtP = $conn->prepare("
            SELECT DISTINCT p.nombre 
            FROM detalle_venta dv
            JOIN producto p ON dv.id_Producto = p.id_Producto
            JOIN venta v ON dv.id_Venta = v.id_Venta
            WHERE v.id_Cliente = ? AND v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
        ");
        $stmtP->bind_param("iss", $row['id_Cliente'], $datetime_inicio, $datetime_fin);
        $stmtP->execute();
        $resP = $stmtP->get_result();
        $prodList = [];
        while ($pRow = $resP->fetch_assoc()) {
            $prodList[] = htmlspecialchars($pRow['nombre']);
        }
        $row['productos_comprados'] = implode(', ', $prodList);
        
        // Query pending debt for this client
        $stmtDeuda = $conn->prepare("SELECT SUM(saldo_Pendiente) as deuda_p FROM deuda WHERE id_Cliente = ? AND estado != 'Pagada'");
        $stmtDeuda->bind_param("i", $row['id_Cliente']);
        $stmtDeuda->execute();
        $deudaP = (float)($stmtDeuda->get_result()->fetch_assoc()['deuda_p'] ?? 0.00);
        $row['deuda_pendiente'] = $deudaP;
        
        $clientesReporteArray[] = $row;
        $stmtP->close();
        $stmtDeuda->close();
    }
    $stmtCliRep->close();

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
    $resBajo = $conn->query("SELECT COUNT(*) as total FROM producto WHERE stock_Actual <= stock_Minimo");
    $cantStockBajo = $resBajo ? (int)$resBajo->fetch_assoc()['total'] : 0;

    $stat1_name = "Valor de inventario";
    $stat1_value = "$" . number_format($inventarioValorVenta, 0, ',', '.');
    $stat1_desc = "Valor actual del stock";
    $stat1_icon = "fa-solid fa-box";
    $stat1_bg = "#f5ebfa";
    $stat1_icon_color = "#a855f7";
    $stat1_trend = "";

    $stat2_name = "Margen estimado";
    $stat2_value = "$" . number_format($margenPesos, 0, ',', '.') . " (" . $margenPct . "%)";
    $stat2_desc = "Ganancia proyectada";
    $stat2_icon = "fa-solid fa-chart-line";
    $stat2_bg = "#fff0e6";
    $stat2_icon_color = "#f97316";
    $stat2_trend = "";

    $stat3_name = "Productos con stock bajo";
    $stat3_value = $cantStockBajo;
    $stat3_desc = "Requieren atención";
    $stat3_icon = "fa-solid fa-triangle-exclamation";
    $stat3_bg = "#fdf2f8";
    $stat3_icon_color = "#ec4899";
    $stat3_trend = "";

    // Gráfico de Dona: Stock por Categoría (unidad_Medida)
    $resStockCat = $conn->query("SELECT unidad_Medida as categoria, SUM(stock_Actual) as total_stock, SUM(stock_Actual * precio_Venta) as total_valor FROM producto GROUP BY unidad_Medida ORDER BY total_stock DESC");
    $stockCategoriasArray = [];
    $stockTotalesArray = [];
    $stockValoresArray = [];
    $totalStockGeneral = 0;

    if ($resStockCat) {
        while ($row = $resStockCat->fetch_assoc()) {
            $cat = $row['categoria'] ? $row['categoria'] : 'Otros';
            $stockCategoriasArray[] = $cat;
            $stockTotalesArray[] = (int)$row['total_stock'];
            $total_val = (float)$row['total_valor'];
            $stockValoresArray[] = $total_val;
            $totalStockGeneral += (int)$row['total_stock'];
        }
    }
    if (empty($stockCategoriasArray)) {
        $stockCategoriasArray = ['Sin Stock'];
        $stockTotalesArray = [0];
        $stockValoresArray = [0.0];
    }

    $leyendasInventario = [];
    foreach ($stockCategoriasArray as $i => $cat) {
        $cant = $stockTotalesArray[$i];
        $total_val = $stockValoresArray[$i];
        $pct = $totalStockGeneral > 0 ? round(($cant / $totalStockGeneral) * 100) : 0;
        $leyendasInventario[] = [
            'categoria' => $cat,
            'total_stock' => $cant,
            'total_valor' => $total_val,
            'porcentaje' => $pct,
            'color' => $colorPalette[$i % count($colorPalette)]
        ];
    }

    // Tabla: Productos con Stock Crítico (stock_Actual <= stock_Minimo)
    $resCritico = $conn->query("SELECT nombre, codigo_Producto, stock_Actual, stock_Minimo FROM producto WHERE stock_Actual <= stock_Minimo ORDER BY stock_Actual ASC LIMIT 5");
    $stockCritico = [];
    if ($resCritico) {
        while ($row = $resCritico->fetch_assoc()) {
            $stockCritico[] = $row;
        }
    }

    // 1. Productos agotados (stock_Actual = 0)
    $resAgotados = $conn->query("SELECT nombre, codigo_Producto, stock_Minimo FROM producto WHERE stock_Actual = 0 ORDER BY nombre ASC");
    $productosAgotados = [];
    if ($resAgotados) {
        while ($row = $resAgotados->fetch_assoc()) {
            $productosAgotados[] = $row;
        }
    }

    // 2. Entradas y salidas de inventario (movimiento_inventario)
    $stmtMovs = $conn->prepare("
        SELECT 
            m.fecha_Movimiento,
            m.tipo_Movimiento,
            m.cantidad,
            m.motivo,
            p.nombre as producto_nombre
        FROM movimiento_inventario m
        JOIN producto p ON m.id_Producto = p.id_Producto
        WHERE m.fecha_Movimiento BETWEEN ? AND ?
        ORDER BY m.fecha_Movimiento DESC
    ");
    $stmtMovs->bind_param("ss", $datetime_inicio, $datetime_fin);
    $stmtMovs->execute();
    $resMovs = $stmtMovs->get_result();
    $movimientosInventario = [];
    while ($row = $resMovs->fetch_assoc()) {
        $movimientosInventario[] = $row;
    }
    $stmtMovs->close();

    // 3. Productos con mayor cantidad disponible (top stock)
    $resTopStock = $conn->query("SELECT nombre, stock_Actual, unidad_Medida as categoria FROM producto ORDER BY stock_Actual DESC LIMIT 5");
    $productosMayorStock = [];
    if ($resTopStock) {
        while ($row = $resTopStock->fetch_assoc()) {
            $productosMayorStock[] = $row;
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
    <link rel="stylesheet" href="admi.css/dashboard_admi.css?v=<?= time() ?>">
    <link rel="stylesheet" href="admi.css/reportes_admi.css?v=<?= time() ?>">
    
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
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- Store Logo Section -->
            <div class="sidebar-logo-section">
                <i class="fa-solid fa-store brand-icon"></i>
                <div class="logo-text-details">
                    <h2 class="brand-title">SIVC</h2>
                    <span class="brand-subtitle">Sistema de Inventario<br>y Ventas para Comercios</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="sidebar-navigation">
                <a href="dashboar_admi.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-house"></i>
                        <span>Dashboard</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>

                <a href="inventario.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-box"></i>
                        <span>Inventario</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>

                <a href="ventas.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Ventas</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>

                <a href="clientes.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-users"></i>
                        <span>Clientes</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>

                <a href="vendedores.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-user-tie"></i>
                        <span>Vendedores</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>

                <a href="reportes.php" class="sidebar-link-card active">
                    <div class="link-left">
                        <i class="fa-solid fa-chart-simple"></i>
                        <span>Reportes</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <div class="sidebar-submenu" style="display: block;">
                    <a href="reportes.php?tab=general" class="submenu-link <?= $tab === 'general' ? 'active' : ''; ?>">
                        <?php if ($tab === 'general'): ?>
                            <span class="active-dot"></span>
                        <?php endif; ?>
                        <span>Resumen general</span>
                    </a>
                    <a href="reportes.php?tab=ventas" class="submenu-link <?= $tab === 'ventas' ? 'active' : ''; ?>">
                        <?php if ($tab === 'ventas'): ?>
                            <span class="active-dot"></span>
                        <?php endif; ?>
                        <span>Ventas</span>
                    </a>
                    <a href="reportes.php?tab=productos" class="submenu-link <?= $tab === 'productos' ? 'active' : ''; ?>">
                        <?php if ($tab === 'productos'): ?>
                            <span class="active-dot"></span>
                        <?php endif; ?>
                        <span>Productos</span>
                    </a>
                    <a href="reportes.php?tab=clientes" class="submenu-link <?= $tab === 'clientes' ? 'active' : ''; ?>">
                        <?php if ($tab === 'clientes'): ?>
                            <span class="active-dot"></span>
                        <?php endif; ?>
                        <span>Clientes</span>
                    </a>
                    <a href="reportes.php?tab=inventario" class="submenu-link <?= $tab === 'inventario' ? 'active' : ''; ?>">
                        <?php if ($tab === 'inventario'): ?>
                            <span class="active-dot"></span>
                        <?php endif; ?>
                        <span>Inventario</span>
                    </a>
                </div>

                <a href="configuracion.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-gear"></i>
                        <span>Configuración</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
            </nav>

            <!-- Logout Link -->
            <div class="sidebar-footer-section">
                <a href="../../controllers/logout.php" class="sidebar-logout-btn">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Cerrar sesión</span>
                </a>
            </div>
        </aside>

        <!-- ==========================================
             MAIN CONTENT (CONTENIDO PRINCIPAL)
        =========================================== -->
        <main class="main-content">
            <!-- Mobile Toggle Menu -->
            <button class="mobile-toggle-btn" id="mobileMenu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Content Header -->
            <header class="content-header">
                <div class="welcome-header-text">
                    <?php if ($tab === 'general'): ?>
                        <h1>Reportes</h1>
                        <p>Consulta y analiza el rendimiento de tu negocio.</p>
                    <?php elseif ($tab === 'ventas'): ?>
                        <h1>Reportes / Ventas</h1>
                        <p>Consulta el rendimiento de tus ventas en el período seleccionado.</p>
                    <?php elseif ($tab === 'productos'): ?>
                        <h1>Reportes / Productos</h1>
                        <p>Consulta el rendimiento de tus ventas en el período seleccionado.</p>
                    <?php elseif ($tab === 'clientes'): ?>
                        <h1>Reportes / Clientes</h1>
                        <p>Consulta el rendimiento de tus ventas en el período seleccionado.</p>
                    <?php elseif ($tab === 'inventario'): ?>
                        <h1>Reportes / Inventario</h1>
                        <p>Consulta el rendimiento de tus ventas en el período seleccionado.</p>
                    <?php endif; ?>
                </div>

                <div class="header-right-widgets">
                    <!-- Date Widget -->
                    <div class="datetime-card">
                        <i class="fa-regular fa-calendar"></i>
                        <div class="datetime-details">
                            <strong><?= htmlspecialchars($fechaString); ?></strong>
                            <span><?= htmlspecialchars($horaString); ?></span>
                        </div>
                    </div>

                    <!-- User Profile Dropdown -->
                    <div class="profile-card">
                        <div class="profile-avatar">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="profile-info">
                            <strong><?= htmlspecialchars($nombreUsuario); ?></strong>
                            <span><?= htmlspecialchars($adminEmail); ?></span>
                        </div>
                        <i class="fa-solid fa-chevron-down profile-chevron"></i>
                    </div>
                </div>
            </header>

            <!-- Report Tabs -->
            <section class="tabs-section">
                <div class="report-tabs-bar">
                    <div class="tabs-left">
                        <a href="reportes.php?tab=general" class="tab-pill <?= $tab === 'general' ? 'active' : ''; ?>">Resumen general</a>
                        <a href="reportes.php?tab=ventas" class="tab-pill <?= $tab === 'ventas' ? 'active' : ''; ?>">Ventas</a>
                        <a href="reportes.php?tab=productos" class="tab-pill <?= $tab === 'productos' ? 'active' : ''; ?>">Productos</a>
                        <a href="reportes.php?tab=clientes" class="tab-pill <?= $tab === 'clientes' ? 'active' : ''; ?>">Clientes</a>
                        <a href="reportes.php?tab=inventario" class="tab-pill <?= $tab === 'inventario' ? 'active' : ''; ?>">Inventario</a>
                    </div>
                    <button class="btn-export" onclick="window.print()">
                        <i class="fa-solid fa-download"></i> Exportar reporte
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
                    <div class="stat-box-icon-circle" style="background-color: <?= $stat1_bg; ?>; color: <?= $stat1_icon_color; ?>;">
                        <i class="<?= $stat1_icon; ?>"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name"><?= $stat1_name; ?></span>
                        <span class="stat-number"><?= $stat1_value; ?></span>
                        <?php if (!empty($stat1_trend)): ?>
                            <span class="stat-desc" style="color: #10b981; font-weight: 600; display: inline-flex; align-items: center; gap: 4px;"><i class="fa-solid fa-arrow-up" style="font-size: 11px;"></i> <?= $stat1_trend; ?> <span style="color: var(--text-muted); font-weight: 500;">vs. periodo anterior</span></span>
                        <?php else: ?>
                            <span class="stat-desc"><?= $stat1_desc; ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: <?= $stat2_bg; ?>; color: <?= $stat2_icon_color; ?>;">
                        <i class="<?= $stat2_icon; ?>"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name"><?= $stat2_name; ?></span>
                        <span class="stat-number"><?= $stat2_value; ?></span>
                        <?php if (!empty($stat2_trend)): ?>
                            <span class="stat-desc" style="color: #10b981; font-weight: 600; display: inline-flex; align-items: center; gap: 4px;"><i class="fa-solid fa-arrow-up" style="font-size: 11px;"></i> <?= $stat2_trend; ?> <span style="color: var(--text-muted); font-weight: 500;">vs. periodo anterior</span></span>
                        <?php else: ?>
                            <span class="stat-desc"><?= $stat2_desc; ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: <?= $stat3_bg; ?>; color: <?= $stat3_icon_color; ?>;">
                        <i class="<?= $stat3_icon; ?>"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name"><?= $stat3_name; ?></span>
                        <span class="stat-number"><?= $stat3_value; ?></span>
                        <?php if (!empty($stat3_trend)): ?>
                            <span class="stat-desc" style="color: #10b981; font-weight: 600; display: inline-flex; align-items: center; gap: 4px;"><i class="fa-solid fa-arrow-up" style="font-size: 11px;"></i> <?= $stat3_trend; ?> <span style="color: var(--text-muted); font-weight: 500;">vs. periodo anterior</span></span>
                        <?php else: ?>
                            <span class="stat-desc"><?= $stat3_desc; ?></span>
                        <?php endif; ?>
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

                        <!-- Detalle completo del reporte (Visible en pantalla y en impresión) -->
                        <div class="chart-panel-card" style="grid-column: span 2; margin-top: 25px;">
                            <div class="chart-panel-header" style="border-bottom: 2px solid var(--color-green); padding-bottom: 10px; margin-bottom: 15px;">
                                <h3 style="display: flex; align-items: center; gap: 8px;"><i class="fa-solid fa-file-invoice-dollar" style="color: var(--color-green);"></i> Detalle de auditoría y balance general</h3>
                            </div>
                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
                                <div>
                                    <h4 style="font-size: 13px; color: var(--color-green); margin-bottom: 10px; text-transform: uppercase;">Balance Financiero</h4>
                                    <table class="report-table" style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: 600;">Ventas / Ingresos totales:</td>
                                                <td style="text-align: right; font-weight: 700; color: #10b981;">$<?= number_format($ventasTotales, 0, ',', '.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Ganancia estimada (Margen):</td>
                                                <td style="text-align: right; font-weight: 700; color: #10b981;">$<?= number_format($gananciaEstimada, 0, ',', '.'); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <h4 style="font-size: 13px; color: var(--color-green); margin-bottom: 10px; text-transform: uppercase;">Operación Comercial</h4>
                                    <table class="report-table" style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: 600;">Número de ventas completadas:</td>
                                                <td style="text-align: right; font-weight: 700;"><?= $numeroVentas; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Clientes que compraron:</td>
                                                <td style="text-align: right; font-weight: 700;"><?= $clientesAtendidos; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Producto más vendido:</td>
                                                <td style="text-align: right; font-weight: 700;"><?= htmlspecialchars($productoMasVendido); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <h4 style="font-size: 13px; color: var(--color-green); margin-bottom: 10px; text-transform: uppercase;">Estado de Inventario</h4>
                                    <table class="report-table" style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: 600;">Valor del inventario (venta):</td>
                                                <td style="text-align: right; font-weight: 700;">$<?= number_format((float)$invStats['valor_venta'], 0, ',', '.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Valor del inventario (compra):</td>
                                                <td style="text-align: right; font-weight: 700;">$<?= number_format((float)$invStats['valor_compra'], 0, ',', '.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Productos con stock bajo / agotados:</td>
                                                <td style="text-align: right; font-weight: 700;"><span style="color: #ef4444;"><?= $invStats['stock_bajo']; ?></span> / <span style="color: #ef4444; font-weight: 800;"><?= $invStats['agotados']; ?></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php elseif ($tab === 'ventas'): ?>
                    <!-- PESTAÑA VENTAS -->
                    <div class="charts-grid-row">
                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Evolución de ventas</h3>
                            </div>
                            <div style="flex: 1; position: relative; min-height: 280px;">
                                <canvas id="salesLineChart"></canvas>
                            </div>
                        </div>

                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Ventas por método de pago</h3>
                            </div>
                            <div class="donut-chart-container" style="margin-bottom: 20px; flex: 1; display: flex; align-items: center; justify-content: center;">
                                <div class="donut-canvas-wrapper" style="width:170px; height:170px;">
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
                            
                            <div class="chart-panel-footer" style="border-top: 1px solid #f1f5f9; padding-top: 15px; margin-top: 20px; display: flex; justify-content: space-between; align-items: center; font-weight: 700; color: var(--text-dark);">
                                <span>Total</span>
                                <span>$<?= number_format($ventasTotales, 0, ',', '.'); ?></span>
                            </div>
                        </div>

                        <!-- Detalle completo de ventas (Visible en pantalla y en impresión) -->
                        <div class="chart-panel-card" style="grid-column: span 2; margin-top: 25px;">
                            <div class="chart-panel-header" style="border-bottom: 2px solid var(--color-green); padding-bottom: 10px; margin-bottom: 15px;">
                                <h3 style="display: flex; align-items: center; gap: 8px;"><i class="fa-solid fa-list-check" style="color: var(--color-green);"></i> Detalle de transacciones para exportación</h3>
                            </div>
                            <div class="report-table-wrapper">
                                <table class="report-table">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Cliente</th>
                                            <th>Vendedor</th>
                                            <th>Método</th>
                                            <th>Tipo</th>
                                            <th>Descuento</th>
                                            <th>Productos comprados</th>
                                            <th style="text-align: right;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($ventasDetalleArray) > 0): ?>
                                            <?php foreach ($ventasDetalleArray as $vd): ?>
                                                <tr>
                                                    <td><?= date('d/m/Y H:i', strtotime($vd['fecha_Venta'])); ?></td>
                                                    <td><?= htmlspecialchars($vd['cliente_nombre']); ?></td>
                                                    <td><?= htmlspecialchars($vd['vendedor_nombre']); ?></td>
                                                    <td><?= htmlspecialchars($vd['metodo_Pago']); ?></td>
                                                    <td>
                                                        <span style="font-weight: 600; color: <?= ($vd['tipo_venta'] === 'Contado') ? '#10b981' : '#d97706'; ?>;">
                                                            <?= $vd['tipo_venta']; ?>
                                                        </span>
                                                    </td>
                                                    <td>$<?= number_format($vd['descuento'], 0, ',', '.'); ?></td>
                                                    <td style="font-size: 11px; max-width: 250px; white-space: normal; line-height: 1.3; color: var(--text-muted);">
                                                        <?= $vd['productos_comprados']; ?>
                                                    </td>
                                                    <td style="font-weight: 700; text-align: right;">$<?= number_format($vd['total'], 0, ',', '.'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8" style="text-align: center; color: var(--text-muted); padding: 20px;">
                                                    No se registraron ventas en este periodo.
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Resumen de Contado vs Fiado -->
                            <div style="display: flex; gap: 20px; margin-top: 15px; background: #f9fafb; padding: 12px; border-radius: 8px; border: 1px solid #e5e7eb; font-size: 13px;">
                                <div><strong>Ventas de contado:</strong> <?= $cantContado; ?> transacciones ($<?= number_format($sumContado, 0, ',', '.'); ?>)</div>
                                <div><strong>Ventas fiadas (créditos):</strong> <?= $cantFiado; ?> transacciones ($<?= number_format($sumFiado, 0, ',', '.'); ?>)</div>
                                <div style="margin-left: auto;"><strong>Ticket promedio del periodo:</strong> $<?= number_format($ticketPromedio, 0, ',', '.'); ?></div>
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
                                <h3>Rendimiento de productos</h3>
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
                                                <td><span class="category-badge" style="background-color:#f3f4f6; color:#4b5563; padding:3px 8px; border-radius:6px; font-size:11px; font-weight:700;"><?= htmlspecialchars($rp['unidad_Medida']); ?></span></td>
                                                <td><?= $rp['total_qty']; ?></td>
                                                <td style="font-weight:700;">$<?= number_format($rp['total_revenue'], 0, ',', '.'); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="chart-panel-footer">
                                <a href="inventario.php" class="btn-detail-link">Ver todos los productos <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>

                        <!-- Detalle completo de productos (Visible en pantalla y en impresión) -->
                        <div class="chart-panel-card" style="grid-column: span 2; margin-top: 25px;">
                            <div class="chart-panel-header" style="border-bottom: 2px solid var(--color-green); padding-bottom: 10px; margin-bottom: 15px;">
                                <h3 style="display: flex; align-items: center; gap: 8px;"><i class="fa-solid fa-warehouse" style="color: var(--color-green);"></i> Comportamiento de ventas por producto</h3>
                            </div>
                            <div class="report-table-wrapper">
                                <table class="report-table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Categoría</th>
                                            <th style="text-align: right;">Precio de Venta</th>
                                            <th style="text-align: right;">Unidades vendidas</th>
                                            <th style="text-align: right;">Ingresos generados</th>
                                            <th>Desempeño / Comportamiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($todosProductosReporte) > 0): ?>
                                            <?php foreach ($todosProductosReporte as $idx => $tpr): ?>
                                                <?php 
                                                    $salesRank = $idx + 1;
                                                    if ($salesRank <= 3 && $tpr['unidades_vendidas'] > 0) {
                                                        $desempeño = "Más vendido ★";
                                                        $desStyle = "background-color: #e6f7f0; color: #10b981;";
                                                    } elseif ($tpr['unidades_vendidas'] == 0) {
                                                        $desempeño = "Sin ventas";
                                                        $desStyle = "background-color: #f3f4f6; color: #9ca3af;";
                                                    } else {
                                                        $desempeño = "Rendimiento normal";
                                                        $desStyle = "background-color: #eef2ff; color: #3b82f6;";
                                                    }
                                                ?>
                                                <tr>
                                                    <td style="font-weight: 700;"><?= htmlspecialchars($tpr['nombre']); ?></td>
                                                    <td><span class="category-badge" style="background-color:#f3f4f6; color:#4b5563; padding:3px 8px; border-radius:6px; font-size:11px; font-weight:700;"><?= htmlspecialchars($tpr['categoria']); ?></span></td>
                                                    <td style="text-align: right;">$<?= number_format($tpr['precio_Venta'], 0, ',', '.'); ?></td>
                                                    <td style="font-weight: 700; text-align: right;"><?= $tpr['unidades_vendidas']; ?></td>
                                                    <td style="font-weight: 700; text-align: right; color: #10b981;">$<?= number_format($tpr['ingresos_generados'], 0, ',', '.'); ?></td>
                                                    <td>
                                                        <span style="padding: 4px 8px; border-radius: 8px; font-size:11px; font-weight:700; <?= $desStyle; ?>">
                                                            <?= $desempeño; ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 20px;">
                                                    No se encontraron productos en la base de datos.
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
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
                                <h3>Resumen de clientes</h3>
                            </div>
                            <div style="flex: 1; display: flex; flex-direction: column; justify-content: center; gap: 15px; margin-bottom: 10px;">
                                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;">
                                    <span style="font-size: 13px; font-weight: 600; color: var(--text-muted);">Total de clientes</span>
                                    <span style="font-size: 14px; font-weight: 700; color: var(--text-dark);"><?= $totalClientesGeneral; ?></span>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;">
                                    <span style="font-size: 13px; font-weight: 600; color: var(--text-muted);">Clientes activos</span>
                                    <span style="font-size: 14px; font-weight: 700; color: var(--text-dark);"><?= $clientesActivosReal; ?></span>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;">
                                    <span style="font-size: 13px; font-weight: 600; color: var(--text-muted);">Nuevos este mes</span>
                                    <span style="font-size: 14px; font-weight: 700; color: var(--text-dark);"><?= $clientesNuevosMes; ?></span>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;">
                                    <span style="font-size: 13px; font-weight: 600; color: var(--text-muted);">Clientes con compras</span>
                                    <span style="font-size: 14px; font-weight: 700; color: var(--text-dark);"><?= $clientesConCompras; ?></span>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 8px;">
                                    <span style="font-size: 13px; font-weight: 600; color: var(--text-muted);">Clientes sin compras</span>
                                    <span style="font-size: 14px; font-weight: 700; color: var(--text-dark);"><?= $clientesSinCompras; ?></span>
                                </div>
                            </div>
                            <div class="chart-panel-footer">
                                <a href="clientes.php" class="btn-detail-link">Ver lista de clientes <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>

                        <!-- Detalle completo de clientes (Visible en pantalla y en impresión) -->
                        <div class="chart-panel-card" style="grid-column: span 2; margin-top: 25px;">
                            <div class="chart-panel-header" style="border-bottom: 2px solid var(--color-green); padding-bottom: 10px; margin-bottom: 15px;">
                                <h3 style="display: flex; align-items: center; gap: 8px;"><i class="fa-solid fa-users-viewfinder" style="color: var(--color-green);"></i> Historial de consumo y deudas de clientes</h3>
                            </div>
                            <div class="report-table-wrapper">
                                <table class="report-table">
                                    <thead>
                                        <tr>
                                            <th>Cliente</th>
                                            <th style="text-align: right;">Compras realizadas</th>
                                            <th style="text-align: right;">Total gastado</th>
                                            <th>Última compra</th>
                                            <th>Productos adquiridos</th>
                                            <th style="text-align: right;">Deuda pendiente</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($clientesReporteArray) > 0): ?>
                                            <?php foreach ($clientesReporteArray as $cra): ?>
                                                <tr>
                                                    <td style="font-weight: 700;"><?= htmlspecialchars($cra['cliente_nombre']); ?></td>
                                                    <td style="text-align: right;"><?= $cra['compras_cant']; ?></td>
                                                    <td style="font-weight: 700; text-align: right; color: #10b981;">$<?= number_format($cra['total_spent'], 0, ',', '.'); ?></td>
                                                    <td><?= $cra['ultima_compra_fecha'] ? date('d/m/Y H:i', strtotime($cra['ultima_compra_fecha'])) : 'N/A'; ?></td>
                                                    <td style="font-size: 11px; max-width: 250px; white-space: normal; line-height: 1.3; color: var(--text-muted);">
                                                        <?= htmlspecialchars($cra['productos_comprados']); ?>
                                                    </td>
                                                    <td style="font-weight: 700; text-align: right; color: <?= ($cra['deuda_pendiente'] > 0) ? '#ef4444' : 'var(--text-muted)'; ?>;">
                                                        $<?= number_format($cra['deuda_pendiente'], 0, ',', '.'); ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 20px;">
                                                    No se encontraron clientes con compras en este periodo.
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php elseif ($tab === 'inventario'): ?>
                    <!-- PESTAÑA INVENTARIO -->
                    <div class="charts-grid-row">
                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Distribución de stock por categoría</h3>
                            </div>
                            <div class="donut-chart-container" style="flex: 1; display: flex; align-items: center; justify-content: center;">
                                <div class="donut-canvas-wrapper" style="width:170px; height:170px;">
                                    <canvas id="inventoryDonutChart"></canvas>
                                </div>
                                <div class="category-legend-list">
                                    <?php foreach ($leyendasInventario as $li): ?>
                                        <div class="legend-item">
                                            <div class="legend-item-left">
                                                <div class="legend-color-dot" style="background-color: <?= $li['color']; ?>;"></div>
                                                <span><?= htmlspecialchars($li['categoria']); ?></span>
                                            </div>
                                            <div class="legend-item-right">
                                                <strong><?= $li['porcentaje']; ?>%</strong>
                                                <span>$<?= number_format($li['total_valor'], 0, ',', '.'); ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="chart-panel-card">
                            <div class="chart-panel-header">
                                <h3>Productos con stock crítico</h3>
                            </div>
                            <div class="report-table-wrapper">
                                <table class="report-table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Stock actual</th>
                                            <th>Mínimo</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($stockCritico) > 0): ?>
                                            <?php foreach ($stockCritico as $sc): ?>
                                                <?php 
                                                    $stock = (int)$sc['stock_Actual'];
                                                    $min = (int)$sc['stock_Minimo'];
                                                    if ($stock === 0) {
                                                        $statusText = "Sin stock";
                                                        $statusStyle = "background-color:#fee2e2; color:#ef4444;";
                                                    } elseif ($stock <= $min * 0.5) {
                                                        $statusText = "Crítico";
                                                        $statusStyle = "background-color:#fee2e2; color:#ef4444;";
                                                    } else {
                                                        $statusText = "Bajo";
                                                        $statusStyle = "background-color:#fef3c7; color:#d97706;";
                                                    }
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
                                <a href="inventario.php" class="btn-detail-link">Ver inventario completo <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>

                        <!-- Detalle completo de inventario (Visible en pantalla y en impresión) -->
                        <div class="chart-panel-card" style="grid-column: span 2; margin-top: 25px;">
                            <div class="chart-panel-header" style="border-bottom: 2px solid var(--color-green); padding-bottom: 10px; margin-bottom: 15px;">
                                <h3 style="display: flex; align-items: center; gap: 8px;"><i class="fa-solid fa-boxes-stacked" style="color: var(--color-green);"></i> Historial de movimientos y estado de stock</h3>
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                                <!-- Movimientos de Inventario (Entradas/Salidas) -->
                                <div class="report-table-wrapper" style="grid-column: span 2;">
                                    <h4 style="font-size: 13px; color: var(--color-green); margin-bottom: 10px; text-transform: uppercase;">Entradas y Salidas de Inventario (Periodo)</h4>
                                    <table class="report-table">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Producto</th>
                                                <th>Tipo</th>
                                                <th>Cantidad</th>
                                                <th>Motivo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($movimientosInventario) > 0): ?>
                                                <?php foreach ($movimientosInventario as $mov): ?>
                                                    <tr>
                                                        <td><?= date('d/m/Y H:i', strtotime($mov['fecha_Movimiento'])); ?></td>
                                                        <td style="font-weight: 700;"><?= htmlspecialchars($mov['producto_nombre']); ?></td>
                                                        <td>
                                                            <span style="padding: 3px 8px; border-radius: 6px; font-size:11px; font-weight:700; background-color: <?= ($mov['tipo_Movimiento'] === 'Entrada') ? '#e6f7f0; color:#10b981;' : '#fee2e2; color:#ef4444;'; ?>">
                                                                <?= $mov['tipo_Movimiento']; ?>
                                                            </span>
                                                        </td>
                                                        <td style="font-weight: 700;"><?= $mov['cantidad']; ?> uds</td>
                                                        <td style="color: var(--text-muted); font-size: 12px;"><?= htmlspecialchars($mov['motivo']); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 15px;">
                                                        No se registraron movimientos en este periodo.
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <!-- Productos Agotados -->
                                <div class="report-table-wrapper">
                                    <h4 style="font-size: 13px; color: #ef4444; margin-bottom: 10px; text-transform: uppercase;">Productos Agotados (Stock 0)</h4>
                                    <table class="report-table">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Producto</th>
                                                <th>Mínimo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($productosAgotados) > 0): ?>
                                                <?php foreach ($productosAgotados as $pa): ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($pa['codigo_Producto']); ?></td>
                                                        <td style="font-weight: 700; color: #ef4444;"><?= htmlspecialchars($pa['nombre']); ?></td>
                                                        <td><?= $pa['stock_Minimo']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="3" style="text-align: center; color: var(--text-muted); padding: 15px;">
                                                        No hay productos agotados. ¡Excelente!
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Productos con Mayor Stock -->
                                <div class="report-table-wrapper">
                                    <h4 style="font-size: 13px; color: var(--color-green); margin-bottom: 10px; text-transform: uppercase;">Mayor Disponibilidad (Stock Alto)</h4>
                                    <table class="report-table">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Categoría</th>
                                                <th style="text-align: right;">Stock actual</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($productosMayorStock) > 0): ?>
                                                <?php foreach ($productosMayorStock as $pms): ?>
                                                    <tr>
                                                        <td style="font-weight: 700;"><?= htmlspecialchars($pms['nombre']); ?></td>
                                                        <td><span class="category-badge" style="background-color:#f3f4f6; color:#4b5563; padding:3px 8px; border-radius:6px; font-size:11px; font-weight:700;"><?= htmlspecialchars($pms['categoria']); ?></span></td>
                                                        <td style="text-align: right; font-weight: 700;"><?= $pms['stock_Actual']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="3" style="text-align: center; color: var(--text-muted); padding: 15px;">
                                                        No se encontraron productos.
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
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
        Chart.defaults.color = '#374151';

        <?php if ($tab === 'general'): ?>
            // -----------------------------------------------------------
            // CHART GENERAL
            // -----------------------------------------------------------
            const lineCtx = document.getElementById('lineChart').getContext('2d');
            const lineLabels = <?= json_encode($diasArray); ?>;
            const lineData = <?= json_encode($ventasDiaArray); ?>;

            // Gradient fill for line chart
            const gradientFill = lineCtx.createLinearGradient(0, 0, 0, 260);
            gradientFill.addColorStop(0, 'rgba(16, 185, 129, 0.25)');
            gradientFill.addColorStop(1, 'rgba(16, 185, 129, 0.0)');

            let chartDiario = new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: lineLabels,
                    datasets: [{
                        label: 'Ventas ($)',
                        data: lineData,
                        borderColor: '#10b981',
                        backgroundColor: gradientFill,
                        borderWidth: 3,
                        fill: true,
                        tension: 0.3,
                        pointBackgroundColor: '#10b981',
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
                            grid: { color: '#e5e7eb' },
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
                            borderColor: '#10b981',
                            backgroundColor: type === 'bar' ? '#014235' : gradientFill,
                            borderWidth: type === 'bar' ? 0 : 3,
                            fill: true,
                            borderRadius: type === 'bar' ? 6 : 0,
                            tension: 0.3,
                            pointBackgroundColor: '#10b981',
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
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.3,
                        pointBackgroundColor: '#10b981',
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
                            grid: { color: '#e5e7eb' },
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
                        backgroundColor: ['#10b981', '#a855f7', '#3b82f6']
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
                        backgroundColor: 'rgba(16, 185, 129, 0.8)',
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
                            grid: { color: '#e5e7eb' },
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
                        backgroundColor: 'rgba(59, 130, 246, 0.8)',
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
                            grid: { color: '#e5e7eb' },
                            ticks: { callback: val => '$' + val.toLocaleString('es-CO') }
                        }
                    }
                }
            });

        <?php elseif ($tab === 'inventario'): ?>
            // -----------------------------------------------------------
            // CHART INVENTARIO (Stock por categoría - Dona)
            // -----------------------------------------------------------
            const invCtx = document.getElementById('inventoryDonutChart').getContext('2d');
            const invColors = <?= json_encode($colorPalette); ?>;
            const invData = <?= json_encode($stockTotalesArray); ?>;
            new Chart(invCtx, {
                type: 'doughnut',
                data: {
                    labels: <?= json_encode($stockCategoriasArray); ?>,
                    datasets: [{
                        data: invData,
                        backgroundColor: invColors.slice(0, invData.length),
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
                                label: context => context.label + ': ' + context.raw.toLocaleString('es-CO') + ' unidades'
                            }
                        }
                    }
                }
            });
        <?php endif; ?>
    </script>
</body>

</html>
