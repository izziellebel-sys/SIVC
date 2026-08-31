<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/load_config.php';
$id_usuario = $_SESSION['id_Usuario'] ?? 0;

// Cargar perfil del vendedor
$sellerEmail = "vendedor@sivc.com";
$nombreCompleto = $_SESSION['usuario'] ?? 'Vendedor';
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

// OBTENER ESTADÍSTICAS DEL INVENTARIO GENERAL
// 1. Total Productos
$resTotal = $conn->query("SELECT COUNT(*) as total FROM producto");
$totalProductos = $resTotal ? (int)$resTotal->fetch_assoc()['total'] : 0;

// 2. Total Categorías (unidad_Medida)
$resCat = $conn->query("SELECT COUNT(DISTINCT unidad_Medida) as total FROM producto");
$totalCategorias = $resCat ? (int)$resCat->fetch_assoc()['total'] : 0;

// 3. Stock Disponible (stock_Actual > stock_Minimo)
$resDisp = $conn->query("SELECT COUNT(*) as total FROM producto WHERE stock_Actual > stock_Minimo");
$stockDisponible = $resDisp ? (int)$resDisp->fetch_assoc()['total'] : 0;

// 4. Stock Bajo (stock_Actual <= stock_Minimo)
$resBajo = $conn->query("SELECT COUNT(*) as total FROM producto WHERE stock_Actual <= stock_Minimo");
$stockBajo = $resBajo ? (int)$resBajo->fetch_assoc()['total'] : 0;

// FILTROS Y BÚSQUEDA
$buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
$categoriaFiltro = isset($_GET['categoria']) ? trim($_GET['categoria']) : 'Todos';
$estadoFiltro = isset($_GET['estado']) ? trim($_GET['estado']) : 'Todos';

$whereClauses = [];
$params = [];
$types = "";

if ($buscar !== '') {
    $whereClauses[] = "(nombre LIKE ? OR codigo_Producto LIKE ?)";
    $searchWildcard = "%" . $buscar . "%";
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
    $types .= "ss";
}

if ($categoriaFiltro !== 'Todos') {
    $whereClauses[] = "unidad_Medida = ?";
    $params[] = $categoriaFiltro;
    $types .= "s";
}

if ($estadoFiltro !== 'Todos') {
    if ($estadoFiltro === 'Disponible') {
        $whereClauses[] = "stock_Actual > stock_Minimo";
    } elseif ($estadoFiltro === 'Stock Bajo') {
        $whereClauses[] = "stock_Actual <= stock_Minimo AND stock_Actual > 0";
    } elseif ($estadoFiltro === 'Sin Stock') {
        $whereClauses[] = "stock_Actual = 0";
    }
}

$whereSql = "";
if (!empty($whereClauses)) {
    $whereSql = "WHERE " . implode(" AND ", $whereClauses);
}

// PAGINACIÓN
$limite = 5;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;

// Contar total de registros filtrados
$countQuery = "SELECT COUNT(*) as total FROM producto $whereSql";
$stmtCount = $conn->prepare($countQuery);
if ($stmtCount) {
    if (!empty($params)) {
        $stmtCount->bind_param($types, ...$params);
    }
    $stmtCount->execute();
    $totalFiltrados = $stmtCount->get_result()->fetch_assoc()['total'];
    $stmtCount->close();
} else {
    $totalFiltrados = 0;
}

$totalPaginas = ceil($totalFiltrados / $limite);
if ($totalPaginas < 1) $totalPaginas = 1;
if ($pagina > $totalPaginas) $pagina = $totalPaginas;
$offset = ($pagina - 1) * $limite;

// CONSULTAR PRODUCTOS
$query = "SELECT * FROM producto $whereSql ORDER BY nombre ASC LIMIT ?, ?";
$stmt = $conn->prepare($query);

$execParams = $params;
$execTypes = $types;
$execParams[] = $offset;
$execParams[] = $limite;
$execTypes .= "ii";

$productos = [];
if ($stmt) {
    $stmt->bind_param($execTypes, ...$execParams);
    $stmt->execute();
    $resProductos = $stmt->get_result();
    while ($row = $resProductos->fetch_assoc()) {
        $productos[] = $row;
    }
    $stmt->close();
}

// Obtener categorías para dropdown
$resCategorias = $conn->query("SELECT DISTINCT unidad_Medida FROM producto ORDER BY unidad_Medida ASC");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario | SIVC</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS general -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- CSS Dashboard & Inventario (reutilizados) -->
    <link rel="stylesheet" href="../administrador/admi.css/dashboard_admi.css?v=5">
    <link rel="stylesheet" href="css/inventario.css?v=5">
    
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
                </a>

                <a href="inventario.php" class="sidebar-link-card active">
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
            <!-- Mobile Toggle drawer button -->
            <button class="mobile-toggle-btn" id="mobileMenu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Header Section -->
            <header class="content-header">
                <div class="header-left">
                    <span class="welcome-label" style="font-size: 11px; font-weight: 700; color: var(--color-green); letter-spacing: 1px; text-transform: uppercase;">Módulo de Inventario</span>
                    <h1 style="margin: 0; font-size: 32px; font-weight: 800; color: var(--text-dark);">Stock de Inventario</h1>
                    <p style="margin: 4px 0 0 0; font-size: 14px; color: var(--text-muted); font-weight: 500;">Administra los niveles de stock físico disponibles en el local.</p>
                </div>
                
                <div class="header-widgets">
                    <!-- Widget Calendario -->
                    <div class="datetime-badge">
                        <i class="fa-regular fa-calendar-days"></i>
                        <div class="datetime-details">
                            <strong><?= $fechaString; ?></strong>
                            <span><?= $horaString; ?></span>
                        </div>
                    </div>
                    <!-- Widget Perfil Vendedor -->
                    <div class="user-profile-badge">
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
                <!-- Total Productos -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #ffd6ff;">
                        <i class="fa-solid fa-boxes-stacked" style="color: var(--color-pink);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Total Productos</span>
                        <span class="stat-number"><?= $totalProductos; ?></span>
                        <span class="stat-desc">Artículos registrados</span>
                    </div>
                </div>

                <!-- Total Categorías -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #ffd8eb;">
                        <i class="fa-solid fa-tags" style="color: var(--color-magenta);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Categorías</span>
                        <span class="stat-number"><?= $totalCategorias; ?></span>
                        <span class="stat-desc">Clasificaciones</span>
                    </div>
                </div>

                <!-- Stock Disponible -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #e2e2ff;">
                        <i class="fa-solid fa-circle-check" style="color: var(--color-blue);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Stock Disponible</span>
                        <span class="stat-number"><?= $stockDisponible; ?></span>
                        <span class="stat-desc">Nivel de stock óptimo</span>
                    </div>
                </div>

                <!-- Stock Bajo -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #fcdfe5;">
                        <i class="fa-solid fa-triangle-exclamation" style="color: var(--color-pink);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Stock Bajo / Crítico</span>
                        <span class="stat-number" style="color: #ec4899;"><?= $stockBajo; ?></span>
                        <span class="stat-desc">Requiere reabastecer</span>
                    </div>
                </div>
            </section>

            <!-- Filters Bar -->
            <section class="filter-section">
                <form action="inventario.php" method="GET" class="filter-bar-form">
                    <div class="filter-input-group">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" name="buscar" placeholder="Buscar Producto..." value="<?= htmlspecialchars($buscar); ?>">
                    </div>

                    <!-- Category Filter -->
                    <div class="filter-select-group">
                        <label for="filterCategoria">Categoría</label>
                        <select name="categoria" id="filterCategoria" onchange="this.form.submit()">
                            <option value="Todos" <?= $categoriaFiltro === 'Todos' ? 'selected' : ''; ?>>Todos</option>
                            <?php if ($resCategorias): ?>
                                <?php while ($cat = $resCategorias->fetch_assoc()): ?>
                                    <?php $cName = $cat['unidad_Medida'] ? $cat['unidad_Medida'] : 'Otros'; ?>
                                    <option value="<?= htmlspecialchars($cat['unidad_Medida']); ?>" <?= $categoriaFiltro === $cat['unidad_Medida'] ? 'selected' : ''; ?>>
                                        <?= htmlspecialchars($cName); ?>
                                    </option>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div class="filter-select-group">
                        <label for="filterEstado">Estado</label>
                        <select name="estado" id="filterEstado" onchange="this.form.submit()">
                            <option value="Todos" <?= $estadoFiltro === 'Todos' ? 'selected' : ''; ?>>Todos</option>
                            <option value="Disponible" <?= $estadoFiltro === 'Disponible' ? 'selected' : ''; ?>>Disponible</option>
                            <option value="Stock Bajo" <?= $estadoFiltro === 'Stock Bajo' ? 'selected' : ''; ?>>Stock Bajo</option>
                            <option value="Sin Stock" <?= $estadoFiltro === 'Sin Stock' ? 'selected' : ''; ?>>Sin Stock</option>
                        </select>
                    </div>

                    <?php if ($buscar !== '' || $categoriaFiltro !== 'Todos' || $estadoFiltro !== 'Todos'): ?>
                        <button type="button" class="btn-clear-filters" onclick="window.location.href='inventario.php'">
                            <i class="fa-solid fa-rotate-left"></i> Limpiar Filtros
                        </button>
                    <?php endif; ?>
                </form>
            </section>

            <!-- Stock Table -->
            <section class="inventory-table-container">
                <table class="inventory-table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Código</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Precio Venta</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($productos) > 0): ?>
                            <?php foreach ($productos as $p): ?>
                                <?php 
                                    $stock = (int)$p['stock_Actual'];
                                    $min = (int)$p['stock_Minimo'];
                                    
                                    // Determinar estados y badges
                                    if ($stock === 0) {
                                        $stockClass = "empty";
                                        $badgeClass = "sin-stock";
                                        $badgeText = "Sin Stock";
                                    } elseif ($stock <= $min) {
                                        $stockClass = "low";
                                        $badgeClass = "stock-bajo";
                                        $badgeText = "Stock Bajo";
                                    } else {
                                        $stockClass = "available";
                                        $badgeClass = "disponible";
                                        $badgeText = "Disponible";
                                    }
                                    
                                    $img_src = !empty($p['imagen']) ? "../../public/img/" . htmlspecialchars($p['imagen']) : "../../public/img/caja.png";
                                ?>
                                <tr>
                                    <td>
                                        <div class="product-cell">
                                            <img src="<?= $img_src; ?>" alt="Img" class="product-cell-img" onerror="this.src='../../public/img/caja.png'">
                                            <div class="product-cell-info">
                                                <strong><?= htmlspecialchars($p['nombre']); ?></strong>
                                                <span>SIVC-P-<?= str_pad($p['id_Producto'], 4, '0', STR_PAD_LEFT); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="font-weight: 700;"><?= htmlspecialchars($p['codigo_Producto']); ?></td>
                                    <td>
                                        <span class="category-badge">
                                            <?= htmlspecialchars($p['unidad_Medida'] ? $p['unidad_Medida'] : 'Otros'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="stock-text <?= $stockClass; ?>">
                                            <?= $stock; ?> unidades
                                        </span>
                                    </td>
                                    <td style="font-weight: 800; font-size:15px;">$<?= number_format($p['precio_Venta'], 0, ',', '.'); ?></td>
                                    <td>
                                        <span class="status-badge <?= $badgeClass; ?>">
                                            <?= $badgeText; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 25px;">
                                    No se encontraron productos en el inventario.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!-- Pagination footer -->
                <div style="padding: 15px 24px; border-top: 1px solid #ebd0f0; display:flex; justify-content: flex-end; align-items:center;">
                    <div class="pagination-controls">
                        <div class="pagination-links">
                            <a href="inventario.php?buscar=<?= urlencode($buscar); ?>&categoria=<?= urlencode($categoriaFiltro); ?>&estado=<?= urlencode($estadoFiltro); ?>&pagina=<?= $pagina - 1; ?>" 
                               class="page-btn <?= $pagina <= 1 ? 'disabled' : ''; ?>"><</a>
                            
                            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                <a href="inventario.php?buscar=<?= urlencode($buscar); ?>&categoria=<?= urlencode($categoriaFiltro); ?>&estado=<?= urlencode($estadoFiltro); ?>&pagina=<?= $i; ?>" 
                                   class="page-btn <?= $pagina == $i ? 'active' : ''; ?>"><?= $i; ?></a>
                            <?php endfor; ?>

                            <a href="inventario.php?buscar=<?= urlencode($buscar); ?>&categoria=<?= urlencode($categoriaFiltro); ?>&estado=<?= urlencode($estadoFiltro); ?>&pagina=<?= $pagina + 1; ?>" 
                               class="page-btn <?= $pagina >= $totalPaginas ? 'disabled' : ''; ?>">></a>
                        </div>
                        <span class="pagination-info">
                            Mostrando <?= count($productos); ?> de <?= $totalFiltrados; ?> productos
                        </span>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- JS Mobile Toggle drawer -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebarClose = document.getElementById('sidebarClose');

        mobileMenu.addEventListener('click', () => sidebar.classList.add('open'));
        sidebarClose.addEventListener('click', () => sidebar.classList.remove('open'));
    </script>
</body>

</html>
