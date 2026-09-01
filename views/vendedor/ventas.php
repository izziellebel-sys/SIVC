<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/load_config.php';
require_once __DIR__ . '/../../models/vendedor_model.php';

$id_usuario = $_SESSION['id_Usuario'] ?? 0;
$nombreUsuario = $_SESSION['usuario'] ?? 'Vendedor';

// Cargar perfil del vendedor
$sellerEmail = "vendedor@sivc.com";
$nombreCompleto = $nombreUsuario;
$resSeller = $conn->query("SELECT correo, nombre, apellido FROM usuarios WHERE id_Usuario = $id_usuario");
if ($resSeller && $sRow = $resSeller->fetch_assoc()) {
    $sellerEmail = $sRow['correo'];
    $nombreCompleto = $sRow['nombre'] . ' ' . $sRow['apellido'];
}

// Obtener fecha actual en español
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

$model = new VendedorModel();

// OBTENER ESTADÍSTICAS DEL VENDEDOR ACTIVO
// 1. Total Facturado por este vendedor
$resTotal = $conn->query("SELECT SUM(total) as total FROM venta WHERE id_Usuario = $id_usuario AND estado = 'Completada'");
$totalFacturado = $resTotal ? (float)$resTotal->fetch_assoc()['total'] : 0.0;

// 2. Ventas Realizadas por este vendedor
$resCount = $conn->query("SELECT COUNT(*) as total FROM venta WHERE id_Usuario = $id_usuario");
$totalVentas = $resCount ? (int)$resCount->fetch_assoc()['total'] : 0;

// 3. Metodo de Pago Preferido por este vendedor
$resMetodo = $conn->query("SELECT metodo_Pago, COUNT(*) as cant FROM venta WHERE id_Usuario = $id_usuario GROUP BY metodo_Pago ORDER BY cant DESC LIMIT 1");
$metodoPreferido = ($resMetodo && $row = $resMetodo->fetch_assoc()) ? $row['metodo_Pago'] : 'Efectivo';

// 4. Créditos (Fiados) del vendedor
$resDeuda = $conn->query("SELECT SUM(saldo_Pendiente) as total FROM deuda WHERE id_Usuario = $id_usuario AND estado = 'Pendiente'");
$totalDeudaActiva = $resDeuda ? (float)$resDeuda->fetch_assoc()['total'] : 0.0;

// OBTENER CLIENTES Y PRODUCTOS
$clientesResult = $conn->query("SELECT c.id_Cliente, u.nombre, u.apellido FROM cliente c JOIN usuarios u ON c.numero_Documento = u.numero_Documento WHERE u.estado = 'Activo'");

$productosResult = $conn->query("SELECT id_Producto, nombre, codigo_Producto, precio_Venta, stock_Actual, unidad_Medida FROM producto WHERE estado = 'Activo' AND stock_Actual > 0");
$productosArr = [];
if ($productosResult) {
    while ($row = $productosResult->fetch_assoc()) {
        $productosArr[] = $row;
    }
}

// Obtener todos los productos para el filtro
$todosProductosResult = $conn->query("SELECT id_Producto, nombre, codigo_Producto FROM producto ORDER BY nombre ASC");
$listaProductosFiltro = [];
if ($todosProductosResult) {
    while ($p = $todosProductosResult->fetch_assoc()) {
        $listaProductosFiltro[] = $p;
    }
}

// RECUPERAR FILTROS Y PARÁMETROS DE HISTORIAL DE VENTAS
$filtro_producto = isset($_GET['filtro_producto']) ? (int)$_GET['filtro_producto'] : 0;
$filtro_fecha = isset($_GET['filtro_fecha']) ? trim($_GET['filtro_fecha']) : '';
$filtro_busqueda = isset($_GET['filtro_busqueda']) ? trim($_GET['filtro_busqueda']) : '';
$pagina_ventas = isset($_GET['pagina_ventas']) ? max(1, (int)$_GET['pagina_ventas']) : 1;
$limite_ventas = 5;

// CONSTRUIR CONSULTA SQL DINÁMICA CON FILTROS (RESTRINGIDO AL VENDEDOR LOGUEADO)
$whereVentas = ["v.id_Usuario = ?"];
$paramsVentas = [$id_usuario];
$typesVentas = "i";

if ($filtro_producto > 0) {
    $whereVentas[] = "v.id_Venta IN (SELECT id_Venta FROM detalle_venta WHERE id_Producto = ?)";
    $paramsVentas[] = $filtro_producto;
    $typesVentas .= "i";
}

if ($filtro_fecha !== '') {
    $whereVentas[] = "DATE(v.fecha_Venta) = ?";
    $paramsVentas[] = $filtro_fecha;
    $typesVentas .= "s";
}

if ($filtro_busqueda !== '') {
    $whereVentas[] = "(u.nombre LIKE ? OR u.apellido LIKE ? OR v.id_Venta LIKE ?)";
    $termBusqueda = "%" . $filtro_busqueda . "%";
    $paramsVentas[] = $termBusqueda;
    $paramsVentas[] = $termBusqueda;
    $paramsVentas[] = $termBusqueda;
    $typesVentas .= "sss";
}

$whereVentasSql = "WHERE " . implode(" AND ", $whereVentas);

// Contar total de ventas filtradas
$countQueryVentas = "SELECT COUNT(*) as total 
                     FROM venta v 
                     LEFT JOIN cliente c ON v.id_Cliente = c.id_Cliente 
                     LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento 
                     $whereVentasSql";
$stmtCountV = $conn->prepare($countQueryVentas);
if ($stmtCountV) {
    $stmtCountV->bind_param($typesVentas, ...$paramsVentas);
    $stmtCountV->execute();
    $totalVentasFiltradas = (int)$stmtCountV->get_result()->fetch_assoc()['total'];
    $stmtCountV->close();
} else {
    $totalVentasFiltradas = 0;
}

$totalPaginasVentas = max(1, (int)ceil($totalVentasFiltradas / $limite_ventas));
if ($pagina_ventas > $totalPaginasVentas) {
    $pagina_ventas = $totalPaginasVentas;
}
$offset_ventas = ($pagina_ventas - 1) * $limite_ventas;

// Consultar ventas paginadas
$sqlVentas = "SELECT v.*, u.nombre as cliente_nombre, u.apellido as cliente_apellido 
              FROM venta v 
              LEFT JOIN cliente c ON v.id_Cliente = c.id_Cliente 
              LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento 
              $whereVentasSql 
              ORDER BY v.id_Venta DESC 
              LIMIT ?, ?";

$stmtVentas = $conn->prepare($sqlVentas);
$ventasRecientes = false;
if ($stmtVentas) {
    $execParamsVentas = $paramsVentas;
    $execTypesVentas = $typesVentas . "ii";
    $execParamsVentas[] = $offset_ventas;
    $execParamsVentas[] = $limite_ventas;
    
    $stmtVentas->bind_param($execTypesVentas, ...$execParamsVentas);
    $stmtVentas->execute();
    $ventasRecientes = $stmtVentas->get_result();
    $stmtVentas->close();
}

// Alertas de redirección
$alerta_msg = "";
$alerta_tipo = "";
$alerta_titulo = "";
$venta_imprimir_id = 0;

if (isset($_GET['success']) && $_GET['success'] == '1') {
    $alerta_msg = "La venta ha sido registrada con éxito.";
    $alerta_tipo = "success";
    $alerta_titulo = "¡Venta Registrada!";
    $venta_imprimir_id = isset($_GET['venta_id']) ? (int)$_GET['venta_id'] : 0;
} elseif (isset($_GET['error'])) {
    $alerta_msg = "Error al procesar la venta en la base de datos.";
    $alerta_tipo = "error";
    $alerta_titulo = "Error";
} elseif (isset($_GET['warning'])) {
    $alerta_msg = "Por favor selecciona un cliente y agrega productos al carrito.";
    $alerta_tipo = "warning";
    $alerta_titulo = "Datos incompletos";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Ventas | SIVC</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CSS general -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- CSS Dashboard & Ventas -->
    <link rel="stylesheet" href="../administrador/admi.css/dashboard_admi.css?v=8">
    <link rel="stylesheet" href="css/ventas.css?v=8">
    
    <!-- Estilo local para filtros, tabla y paginación -->
    <style>
        .header-with-illustration {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        .header-illustration-img {
            width: 170px;
            height: auto;
            border-radius: 12px;
        }

        /* HISTORIAL DE VENTAS RECIENTES - CARD & FILTROS */
        .sales-history-card {
            background-color: var(--card-bg, #ffffff);
            border: 1px solid var(--border-color, #e2e8f0);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
            margin-bottom: 35px;
        }

        .card-header-with-filters {
            padding: 18px 24px;
            border-bottom: 1px solid var(--border-color, #e2e8f0);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--card-bg, #ffffff);
            flex-wrap: wrap;
            gap: 16px;
        }

        .header-title-group h2 {
            font-size: 16px;
            font-weight: 800;
            color: var(--text-dark, #0f172a);
            margin: 0;
            letter-spacing: -0.2px;
            text-transform: uppercase;
        }

        .header-title-group .header-subtitle {
            font-size: 13px;
            color: var(--text-muted, #64748b);
            font-weight: 500;
            display: block;
            margin-top: 2px;
        }

        .sales-filters-form {
            display: flex;
            align-items: flex-end;
            gap: 12px;
            flex-wrap: wrap;
        }

        .sales-filter-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .sales-filter-item label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text-muted, #475569);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .sales-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            height: 38px;
            box-sizing: border-box;
        }

        .sales-input-wrapper .input-icon-left {
            position: absolute;
            left: 12px;
            font-size: 13px;
            color: var(--text-muted, #64748b);
            pointer-events: none;
            z-index: 1;
        }

        .sales-input-wrapper select,
        .sales-input-wrapper input[type="date"],
        .sales-input-wrapper input[type="text"] {
            width: 100%;
            height: 100%;
            border: 1.5px solid #cbd5e1;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 500;
            background-color: #ffffff;
            outline: none;
            color: #1e293b;
            transition: all 0.2s ease;
            font-family: inherit;
            box-sizing: border-box;
        }

        .sales-input-wrapper select {
            padding: 0 30px 0 34px;
            appearance: none;
            -webkit-appearance: none;
            cursor: pointer;
        }

        .sales-input-wrapper input[type="date"] {
            padding: 0 10px 0 34px;
            cursor: pointer;
        }

        .sales-input-wrapper input[type="text"] {
            padding: 0 12px 0 34px;
        }

        .sales-input-wrapper select:focus,
        .sales-input-wrapper input:focus {
            border-color: var(--sidebar-active-bg, #006b54);
            box-shadow: 0 0 0 3px rgba(0, 107, 84, 0.1);
        }

        .sales-input-wrapper .select-chevron-custom {
            position: absolute;
            right: 12px;
            font-size: 11px;
            color: var(--text-muted, #64748b);
            pointer-events: none;
        }

        .btn-clear-sales-filters {
            height: 38px;
            padding: 0 14px;
            background-color: #fef2f2;
            color: #dc2626;
            border: 1.5px solid #fecaca;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
            box-sizing: border-box;
        }

        .btn-clear-sales-filters:hover {
            background-color: #fee2e2;
            border-color: #f87171;
            transform: translateY(-1px);
        }

        /* TABLA DE VENTAS */
        .table-responsive {
            overflow-x: auto;
            width: 100%;
        }

        .sales-history-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .sales-history-table th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 700;
            padding: 12px 18px;
            text-align: left;
            border-bottom: 1.5px solid #e2e8f0;
            font-size: 11.5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .sales-history-table td {
            padding: 13px 18px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            color: #334155;
            font-size: 13px;
            white-space: nowrap;
        }

        .sales-history-table tr:last-child td {
            border-bottom: none;
        }

        .sales-history-table tr:hover {
            background-color: #f8fafc;
        }

        /* PAGINACIÓN */
        .sales-pagination-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 22px;
            background-color: #ffffff;
            border-top: 1px solid #e2e8f0;
            flex-wrap: wrap;
            gap: 10px;
        }

        .sales-pagination-wrapper .pagination-info {
            font-size: 13px;
            color: var(--text-muted, #64748b);
            font-weight: 500;
        }

        .sales-pagination-wrapper .pagination-links {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .sales-pagination-wrapper .page-btn {
            min-width: 32px;
            height: 32px;
            padding: 0 8px;
            border-radius: 8px;
            background-color: #ffffff;
            border: 1.5px solid #cbd5e1;
            color: #334155;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.15s ease;
        }

        .sales-pagination-wrapper .page-btn:hover {
            border-color: var(--sidebar-active-bg, #006b54);
            color: var(--sidebar-active-bg, #006b54);
            background-color: #f0fdf4;
        }

        .sales-pagination-wrapper .page-btn.active {
            background-color: var(--sidebar-active-bg, #006b54);
            color: #ffffff;
            border-color: var(--sidebar-active-bg, #006b54);
            font-weight: 700;
        }

        .sales-pagination-wrapper .page-btn.disabled {
            opacity: 0.35;
            pointer-events: none;
        }

        .empty-table-cell {
            text-align: center;
            padding: 35px 20px;
            color: #94a3b8;
        }

        .empty-table-cell i {
            font-size: 28px;
            color: #cbd5e1;
            margin-bottom: 6px;
        }

        .empty-table-cell p {
            margin: 0;
            font-size: 14px;
            font-weight: 500;
        }
    </style>
    <!-- Cargar configuración de base de datos -->
    <?php aplicarConfiguracionEstilos(); ?>
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
                <a href="dashboard_vendedor.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-house"></i>
                        <span>Inicio</span>
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

                <a href="ventas.php" class="sidebar-link-card active">
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

                <a href="configuracion.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-gear"></i>
                        <span>Configuración</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
            </nav>

            <!-- Logout -->
            <div class="sidebar-footer-section">
                <a href="../../controllers/logout.php" class="sidebar-logout-btn">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Cerrar sesión</span>
                </a>
            </div>
        </aside>

        <!-- ==========================================
             MAIN CONTENT
        =========================================== -->
        <main class="main-content">
            <!-- Mobile Toggle Menu Drawer -->
            <button class="mobile-toggle-btn" id="mobileMenu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Header Section -->
            <header class="content-header">
                <div class="welcome-header-text">
                    <span class="welcome-label" style="font-size: 11px; font-weight: 700; color: var(--color-green); letter-spacing: 1px; text-transform: uppercase; display: block; margin-bottom: 2px;">Punto de Venta</span>
                    <h1>Registrar Ventas (POS)</h1>
                    <p>Genera nuevas boletas de venta, consulta productos y procesa pagos.</p>
                </div>
                
                <div class="header-right-widgets">
                    <!-- Widget Calendario -->
                    <div class="datetime-card">
                        <i class="fa-regular fa-calendar-days"></i>
                        <div class="datetime-details">
                            <strong><?= $fechaString; ?></strong>
                            <span><?= $horaString; ?></span>
                        </div>
                    </div>
                    <!-- Widget Perfil Vendedor -->
                    <div class="profile-card">
                        <div class="profile-avatar">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="profile-info">
                            <strong><?= htmlspecialchars($nombreCompleto); ?></strong>
                            <span><?= htmlspecialchars($sellerEmail); ?></span>
                        </div>
                        <i class="fa-solid fa-chevron-down profile-chevron"></i>
                    </div>
                </div>
            </header>

            <!-- Stats Row (4 Cards) -->
            <section class="inventory-stats-row">
                <!-- Total Facturado -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #ffd6ff;">
                        <i class="fa-solid fa-money-bill-wave" style="color: var(--color-pink);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Total Facturado</span>
                        <span class="stat-number">$<?= number_format($totalFacturado, 0, ',', '.'); ?></span>
                        <span class="stat-desc">Mis ventas completadas</span>
                    </div>
                </div>

                <!-- Cantidad Ventas -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #e2e2ff;">
                        <i class="fa-solid fa-cart-arrow-down" style="color: var(--color-blue);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Ventas Realizadas</span>
                        <span class="stat-number"><?= $totalVentas; ?></span>
                        <span class="stat-desc">Transacciones totales</span>
                    </div>
                </div>

                <!-- Pago Preferido -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #e0f2f1;">
                        <i class="fa-solid fa-credit-card" style="color: var(--color-teal);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Pago Preferido</span>
                        <span class="stat-number"><?= htmlspecialchars($metodoPreferido); ?></span>
                        <span class="stat-desc">Método más utilizado</span>
                    </div>
                </div>

                <!-- Deudas Activas -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #fcdfe5;">
                        <i class="fa-solid fa-receipt" style="color: var(--color-pink);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Fiados Totales</span>
                        <span class="stat-number">$<?= number_format($totalDeudaActiva, 0, ',', '.'); ?></span>
                        <span class="stat-desc">Créditos pendientes</span>
                    </div>
                </div>
            </section>

            <!-- POS Interactive Workspace -->
            <section class="sales-grid-layout">
                
                <!-- Column Left: Cart & Add Products -->
                <div class="sales-left-column">
                    <!-- Add Product Card -->
                    <div class="sales-card-box">
                        <h2>Agregar Productos a la Venta</h2>
                        <div class="add-product-row">
                            <div class="form-group-item">
                                <label>Selecciona Producto</label>
                                <select id="productSelect">
                                    <option value="" disabled selected>-- Elige un artículo --</option>
                                    <?php foreach ($productosArr as $p): ?>
                                        <option value="<?= $p['id_Producto']; ?>" 
                                                data-precio="<?= $p['precio_Venta']; ?>" 
                                                data-stock="<?= $p['stock_Actual']; ?>" 
                                                data-codigo="<?= $p['codigo_Producto']; ?>">
                                            <?= htmlspecialchars($p['nombre']); ?> (Stock: <?= $p['stock_Actual']; ?>) - $<?= number_format($p['precio_Venta'], 0, ',', '.'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group-item">
                                <label>Cantidad</label>
                                <input type="number" id="productQty" value="1" min="1">
                            </div>
                            <button type="button" class="btn-add-to-cart" id="addToCartBtn">
                                <i class="fa-solid fa-plus"></i> Agregar
                            </button>
                        </div>
                    </div>

                    <!-- Cart Details Table Card -->
                    <div class="sales-card-box">
                        <h2>Detalle de la Compra Actual</h2>
                        <div class="cart-table-wrapper">
                            <table class="cart-table">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Producto</th>
                                        <th>Cant.</th>
                                        <th>Precio Unit.</th>
                                        <th>Subtotal</th>
                                        <th style="width: 50px;"></th>
                                    </tr>
                                </thead>
                                <tbody id="cartTableBody">
                                    <tr id="cartEmptyRow">
                                        <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 30px;">
                                            No se han agregado productos a esta venta aún.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Column Right: Checkout Details -->
                <div class="sales-right-column">
                    <form action="../../controllers/vendedor_controller.php" method="POST" id="checkoutForm">
                        <input type="hidden" name="action" value="registrar_venta">
                        <input type="hidden" name="productos_data" id="productosDataInput" value="[]">

                        <div class="sales-card-box">
                            <h2>Datos y Cierre de Venta</h2>

                            <!-- Client Selector -->
                            <div class="form-group-item" style="margin-bottom: 20px;">
                                <label>Cliente</label>
                                <select name="id_cliente" required>
                                    <option value="" disabled selected>-- Asignar cliente --</option>
                                    <?php if ($clientesResult): ?>
                                        <?php while ($c = $clientesResult->fetch_assoc()): ?>
                                            <option value="<?= $c['id_Cliente']; ?>">
                                                <?= htmlspecialchars($c['nombre'] . ' ' . $c['apellido']); ?>
                                            </option>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <!-- Payment Method -->
                            <div class="form-group-item" style="margin-bottom: 20px;">
                                <label>Método de Pago</label>
                                <select name="metodo_pago" required>
                                    <option value="Efectivo" selected>Efectivo</option>
                                    <option value="Nequi">Nequi / Transferencia</option>
                                    <option value="Tarjeta">Tarjeta de Crédito/Débito</option>
                                    <option value="Crédito">Crédito (Fiado)</option>
                                </select>
                            </div>

                            <!-- Breakdown -->
                            <div class="totals-breakdown">
                                <div class="totals-breakdown-row">
                                    <span>Subtotal</span>
                                    <span id="labelSubtotal">$0</span>
                                </div>
                                <div class="totals-breakdown-row">
                                    <span>Descuento</span>
                                    <span>$0</span>
                                </div>
                                <div class="totals-breakdown-row">
                                    <span>IVA (19%)</span>
                                    <span id="labelIva">$0</span>
                                </div>
                                <div class="totals-breakdown-row total-grand">
                                    <span>Total a pagar</span>
                                    <span id="labelTotal">$0</span>
                                </div>
                            </div>

                            <button type="submit" class="btn-process-sale" id="processSaleBtn">
                                <i class="fa-solid fa-basket-shopping"></i> Registrar Venta
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- Historial de Ventas Recientes con Filtros y Paginación -->
            <section class="sales-history-card" id="historial-ventas">
                <div class="card-header-with-filters">
                    <div class="header-title-group">
                        <h2>Mis Ventas Recientes</h2>
                        <span class="header-subtitle">Listado y facturas emitidas por ti</span>
                    </div>

                    <!-- Formulario de Filtros Estilizado -->
                    <form action="ventas.php" method="GET" class="sales-filters-form" id="salesFiltersForm">
                        <!-- Búsqueda por Cliente o ID -->
                        <div class="sales-filter-item">
                            <label for="filtro_busqueda">Buscar</label>
                            <div class="sales-input-wrapper" style="min-width: 170px;">
                                <i class="fa-solid fa-magnifying-glass input-icon-left"></i>
                                <input type="text" name="filtro_busqueda" id="filtro_busqueda" placeholder="Cliente o #ID..." value="<?= htmlspecialchars($filtro_busqueda); ?>">
                            </div>
                        </div>

                        <!-- Filtro Producto Vendido -->
                        <div class="sales-filter-item">
                            <label for="filtro_producto">Producto</label>
                            <div class="sales-input-wrapper" style="min-width: 200px;">
                                <i class="fa-solid fa-box input-icon-left"></i>
                                <select name="filtro_producto" id="filtro_producto" onchange="this.form.submit()">
                                    <option value="0">Todos los productos</option>
                                    <?php foreach ($listaProductosFiltro as $prod): ?>
                                        <option value="<?= $prod['id_Producto']; ?>" <?= $filtro_producto === (int)$prod['id_Producto'] ? 'selected' : ''; ?>>
                                            <?= htmlspecialchars($prod['nombre']); ?> (SKU: <?= htmlspecialchars($prod['codigo_Producto']); ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <i class="fa-solid fa-chevron-down select-chevron-custom"></i>
                            </div>
                        </div>

                        <!-- Filtro Fecha -->
                        <div class="sales-filter-item">
                            <label for="filtro_fecha">Fecha</label>
                            <div class="sales-input-wrapper" style="min-width: 160px;">
                                <i class="fa-regular fa-calendar input-icon-left"></i>
                                <input type="date" name="filtro_fecha" id="filtro_fecha" value="<?= htmlspecialchars($filtro_fecha); ?>" onchange="this.form.submit()">
                            </div>
                        </div>

                        <!-- Botón Limpiar Filtros -->
                        <?php if ($filtro_producto > 0 || $filtro_fecha !== '' || $filtro_busqueda !== ''): ?>
                            <a href="ventas.php#historial-ventas" class="btn-clear-sales-filters" title="Restablecer filtros">
                                <i class="fa-solid fa-rotate-left"></i> Limpiar
                            </a>
                        <?php endif; ?>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="sales-history-table">
                        <thead>
                            <tr>
                                <th>Venta ID</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total Venta</th>
                                <th>Método Pago</th>
                                <th>Estado</th>
                                <th style="width: 70px; text-align: center;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($ventasRecientes && $ventasRecientes->num_rows > 0): ?>
                                <?php while ($row = $ventasRecientes->fetch_assoc()): ?>
                                    <?php 
                                        $cliente_nom = $row['cliente_nombre'] ? $row['cliente_nombre'] . ' ' . $row['cliente_apellido'] : 'General / Anónimo';
                                        $venta_formatted_id = "#SIVC-" . str_pad($row['id_Venta'], 5, '0', STR_PAD_LEFT);
                                    ?>
                                    <tr>
                                        <td style="font-weight: 700; color: var(--color-purple);"><?= $venta_formatted_id; ?></td>
                                        <td style="font-weight: 600;"><?= htmlspecialchars($cliente_nom); ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($row['fecha_Venta'])); ?></td>
                                        <td style="font-weight: 700;">$<?= number_format($row['total'], 0, ',', '.'); ?></td>
                                        <td>
                                            <span style="background-color: #f1f5f9; color: #334155; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600; display: inline-block;">
                                                <?= htmlspecialchars($row['metodo_Pago']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span style="background-color:#d4edda; color:#155724; padding: 4px 8px; border-radius: 8px; font-size:11px; font-weight:700; display: inline-block;">
                                                <?= htmlspecialchars($row['estado']); ?>
                                            </span>
                                        </td>
                                        <td style="text-align: center;">
                                            <button type="button" class="btn-action" title="Imprimir Comprobante" onclick="imprimirComprobante(<?= $row['id_Venta']; ?>)" style="cursor: pointer; background: white; border: 1.5px solid #cbd5e1; width: 32px; height: 32px; border-radius: 8px; color: var(--color-purple); transition: all 0.2s;">
                                                <i class="fa-solid fa-print"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="empty-table-cell">
                                        <i class="fa-regular fa-folder-open"></i>
                                        <p>No se encontraron ventas con los filtros seleccionados.</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Paginación de Ventas (5 por página) -->
                <div class="sales-pagination-wrapper">
                    <div class="pagination-info">
                        Mostrando <?= ($totalVentasFiltradas > 0) ? ($offset_ventas + 1) : 0; ?> a <?= min($offset_ventas + $limite_ventas, $totalVentasFiltradas); ?> de <?= $totalVentasFiltradas; ?> ventas
                    </div>

                    <div class="pagination-links">
                        <!-- Anterior Button -->
                        <a href="?filtro_producto=<?= $filtro_producto; ?>&filtro_fecha=<?= urlencode($filtro_fecha); ?>&filtro_busqueda=<?= urlencode($filtro_busqueda); ?>&pagina_ventas=<?= $pagina_ventas - 1; ?>#historial-ventas" 
                           class="page-btn <?= $pagina_ventas <= 1 ? 'disabled' : ''; ?>" title="Página Anterior">
                           <i class="fa-solid fa-chevron-left"></i>
                        </a>

                        <?php for ($i = 1; $i <= $totalPaginasVentas; $i++): ?>
                            <a href="?filtro_producto=<?= $filtro_producto; ?>&filtro_fecha=<?= urlencode($filtro_fecha); ?>&filtro_busqueda=<?= urlencode($filtro_busqueda); ?>&pagina_ventas=<?= $i; ?>#historial-ventas" 
                               class="page-btn <?= $pagina_ventas === $i ? 'active' : ''; ?>">
                               <?= $i; ?>
                            </a>
                        <?php endfor; ?>

                        <!-- Siguiente Button -->
                        <a href="?filtro_producto=<?= $filtro_producto; ?>&filtro_fecha=<?= urlencode($filtro_fecha); ?>&filtro_busqueda=<?= urlencode($filtro_busqueda); ?>&pagina_ventas=<?= $pagina_ventas + 1; ?>#historial-ventas" 
                           class="page-btn <?= $pagina_ventas >= $totalPaginasVentas ? 'disabled' : ''; ?>" title="Página Siguiente">
                           <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- JAVASCRIPT CONTROLLERS -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebarClose = document.getElementById('sidebarClose');

        mobileMenu.addEventListener('click', () => sidebar.classList.add('open'));
        sidebarClose.addEventListener('click', () => sidebar.classList.remove('open'));

        // LÓGICA DE CARRITO (JS CLIENT-SIDE)
        let cart = [];

        const productSelect = document.getElementById('productSelect');
        const productQty = document.getElementById('productQty');
        const addToCartBtn = document.getElementById('addToCartBtn');
        const cartTableBody = document.getElementById('cartTableBody');
        const cartEmptyRow = document.getElementById('cartEmptyRow');
        const labelSubtotal = document.getElementById('labelSubtotal');
        const labelIva = document.getElementById('labelIva');
        const labelTotal = document.getElementById('labelTotal');
        const productosDataInput = document.getElementById('productosDataInput');
        const checkoutForm = document.getElementById('checkoutForm');

        addToCartBtn.addEventListener('click', () => {
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            if (!selectedOption.value) {
                Swal.fire('Atención', 'Por favor selecciona un producto válido.', 'warning');
                return;
            }

            const id_prod = parseInt(selectedOption.value);
            const nombre = selectedOption.text.split(' (Stock:')[0];
            const precio = parseFloat(selectedOption.getAttribute('data-precio'));
            const stock = parseInt(selectedOption.getAttribute('data-stock'));
            const codigo = selectedOption.getAttribute('data-codigo');
            const cantidad = parseInt(productQty.value);

            if (cantidad < 1) {
                Swal.fire('Cantidad incorrecta', 'Ingresa un valor mayor o igual a 1.', 'warning');
                return;
            }

            if (cantidad > stock) {
                Swal.fire('Stock insuficiente', `Solo quedan ${stock} unidades disponibles en inventario.`, 'warning');
                return;
            }

            // Validar si el producto ya existe en el carrito
            const existingIndex = cart.findIndex(item => item.id_producto === id_prod);
            if (existingIndex > -1) {
                const nuevaCant = cart[existingIndex].cantidad + cantidad;
                if (nuevaCant > stock) {
                    Swal.fire('Stock insuficiente', `No puedes agregar más de ${stock} unidades en total al carrito.`, 'warning');
                    return;
                }
                cart[existingIndex].cantidad = nuevaCant;
                cart[existingIndex].subtotal = nuevaCant * precio;
            } else {
                cart.push({
                    id_producto: id_prod,
                    codigo: codigo,
                    nombre: nombre,
                    cantidad: cantidad,
                    precio: precio,
                    subtotal: cantidad * precio
                });
            }

            actualizarCarritoDOM();
            productSelect.selectedIndex = 0;
            productQty.value = 1;
        });

        function eliminarItem(index) {
            cart.splice(index, 1);
            actualizarCarritoDOM();
        }

        function actualizarCarritoDOM() {
            // Limpiar tabla exceptuando cabecera y el empty row
            const rows = cartTableBody.querySelectorAll('tr:not(#cartEmptyRow)');
            rows.forEach(r => r.remove());

            if (cart.length === 0) {
                cartEmptyRow.style.display = '';
                labelSubtotal.innerText = '$0';
                labelIva.innerText = '$0';
                labelTotal.innerText = '$0';
                productosDataInput.value = '[]';
                return;
            }

            cartEmptyRow.style.display = 'none';
            let grandTotal = 0;

            cart.forEach((item, index) => {
                grandTotal += item.subtotal;
                
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="font-weight: 600;">${item.codigo}</td>
                    <td style="font-weight: 700; color: var(--color-purple);">${item.nombre}</td>
                    <td>${item.cantidad}</td>
                    <td>$${item.precio.toLocaleString('es-CO')}</td>
                    <td style="font-weight: 700;">$${item.subtotal.toLocaleString('es-CO')}</td>
                    <td>
                        <button type="button" class="btn-delete-cart-item" onclick="eliminarItem(${index})">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </td>
                `;
                cartTableBody.appendChild(tr);
            });

            const iva = grandTotal * 0.19;
            const total = grandTotal + iva;

            labelSubtotal.innerText = '$' + grandTotal.toLocaleString('es-CO', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
            labelIva.innerText = '$' + iva.toLocaleString('es-CO', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
            labelTotal.innerText = '$' + total.toLocaleString('es-CO', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
            productosDataInput.value = JSON.stringify(cart);
        }

        // Validar envío
        checkoutForm.addEventListener('submit', (e) => {
            if (cart.length === 0) {
                e.preventDefault();
                Swal.fire('Carrito vacío', 'Agrega productos a la compra antes de registrarla.', 'warning');
            }
        });

        // Imprimir Comprobante usando iframe fuera de pantalla (con dimensiones de render para html2pdf)
        function imprimirComprobante(id) {
            const iframe = document.createElement('iframe');
            iframe.src = `../administrador/comprobante.php?id=${id}&auto=1`;
            iframe.style.position = 'fixed';
            iframe.style.left = '-9999px';
            iframe.style.top = '0';
            iframe.style.width = '750px';
            iframe.style.height = '1050px';
            iframe.style.opacity = '0';
            iframe.style.pointerEvents = 'none';
            iframe.style.border = '0';
            document.body.appendChild(iframe);
        }

        // Escuchar el mensaje del iframe indicando que el PDF ha sido descargado
        window.addEventListener('message', (event) => {
            if (event.data === 'pdf_downloaded') {
                console.log('Comprobante descargado correctamente.');
            }
        });

        // SweetAlert de alertas GET
        <?php if ($alerta_msg !== ''): ?>
            Swal.fire({
                icon: '<?= $alerta_tipo; ?>',
                title: '<?= $alerta_titulo; ?>',
                text: '<?= $alerta_msg; ?>',
                confirmButtonColor: '#6f2dbd'
            }).then(() => {
                <?php if ($venta_imprimir_id > 0): ?>
                    imprimirComprobante(<?= $venta_imprimir_id; ?>);
                    // Fallback de redirección
                    setTimeout(() => {
                        window.location.href = 'ventas.php';
                    }, 8000);
                <?php else: ?>
                    window.location.href = 'ventas.php';
                <?php endif; ?>
            });
        <?php endif; ?>
    </script>
</body>

</html>
