<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/database.php';

// AUTO-POBLAR PROVEEDORES Y PRODUCTOS SI ESTÁN VACÍOS
$checkProv = $conn->query("SELECT COUNT(*) as total FROM proveedor");
if ($checkProv && $checkProv->fetch_assoc()['total'] == 0) {
    // Insertar un proveedor de prueba
    $conn->query("INSERT INTO proveedor (id_Proveedor, nombre, telefono, correo, direccion) VALUES 
        (1, 'Distribuidora Central', '3001234567', 'ventas@districentral.com', 'Calle 10 # 5-20')");
}

$checkProd = $conn->query("SELECT COUNT(*) as total FROM producto");
if ($checkProd && $checkProd->fetch_assoc()['total'] == 0) {
    // Insertar productos de prueba en la tabla real 'producto'
    $conn->query("INSERT INTO producto (codigo_Producto, nombre, id_Proveedor, descripcion, precio_Compra, precio_Venta, stock_Actual, stock_Minimo, unidad_Medida, estado) VALUES 
        ('101', 'Arroz', 1, 'Arroz premium en bolsa de 1kg', 2000.00, 3000.00, 45, 5, 'Granos', 'Activo'),
        ('102', 'Tuna / Atún', 1, 'Atún enlatado en agua 160g', 3800.00, 5000.00, 20, 5, 'Pez', 'Activo'),
        ('103', 'Cereal', 1, 'Cereal hojuelas de maíz azucarado', 2500.00, 3500.00, 0, 5, 'Cereales', 'Activo')");
}

// OBTENER ESTADÍSTICAS REALES DESDE LA BASE DE DATOS
// 1. Total productos
$resTotal = $conn->query("SELECT COUNT(*) as total FROM producto");
$totalProductos = $resTotal ? $resTotal->fetch_assoc()['total'] : 0;

// 2. Stock Disponible (Suma de todas las unidades)
$resStockTotal = $conn->query("SELECT SUM(stock_Actual) as total_stock FROM producto");
$stockDisponible = $resStockTotal ? $resStockTotal->fetch_assoc()['total_stock'] : 0;
if (is_null($stockDisponible)) $stockDisponible = 0;

// 3. Stock Bajo (stock_Actual > 0 y stock_Actual <= 15)
$resStockBajo = $conn->query("SELECT COUNT(*) as total_bajo FROM producto WHERE stock_Actual > 0 AND stock_Actual <= 15");
$stockBajo = $resStockBajo ? $resStockBajo->fetch_assoc()['total_bajo'] : 0;

// 4. Sin Stock (stock_Actual = 0)
$resSinStock = $conn->query("SELECT COUNT(*) as total_sin FROM producto WHERE stock_Actual = 0");
$sinStock = $resSinStock ? $resSinStock->fetch_assoc()['total_sin'] : 0;

// RECUPERAR FILTROS Y PARÁMETROS DE BÚSQUEDA
$buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
$categoriaFiltro = isset($_GET['categoria']) ? trim($_GET['categoria']) : 'Todas';
$estadoFiltro = isset($_GET['estado']) ? trim($_GET['estado']) : 'Todos';

// CONSTRUIR CONSULTA SQL DINÁMICA CON FILTROS
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

if ($categoriaFiltro !== 'Todas') {
    $whereClauses[] = "unidad_Medida = ?";
    $params[] = $categoriaFiltro;
    $types .= "s";
}

if ($estadoFiltro !== 'Todos') {
    if ($estadoFiltro === 'Disponible') {
        $whereClauses[] = "stock_Actual > 15";
    } elseif ($estadoFiltro === 'Stock Bajo') {
        $whereClauses[] = "stock_Actual > 0 AND stock_Actual <= 15";
    } elseif ($estadoFiltro === 'Sin Stock') {
        $whereClauses[] = "stock_Actual = 0";
    }
}

$whereSql = "";
if (count($whereClauses) > 0) {
    $whereSql = "WHERE " . implode(" AND ", $whereClauses);
}

// Paginación
$limite = 3; // Mostrar 3 productos por página como en la imagen
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;

// Contar productos filtrados para paginación
$countQuery = "SELECT COUNT(*) as total FROM producto $whereSql";
$stmtCount = $conn->prepare($countQuery);
if ($stmtCount) {
    if (count($params) > 0) {
        $stmtCount->bind_param($types, ...$params);
    }
    $stmtCount->execute();
    $totalFiltrado = $stmtCount->get_result()->fetch_assoc()['total'];
    $stmtCount->close();
} else {
    $totalFiltrado = 0;
}

$totalPaginas = ceil($totalFiltrado / $limite);
if ($totalPaginas < 1) $totalPaginas = 1;
if ($pagina > $totalPaginas) $pagina = $totalPaginas;
$offset = ($pagina - 1) * $limite;

// Consultar productos paginados
$query = "SELECT * FROM producto $whereSql LIMIT ?, ?";
$stmt = $conn->prepare($query);

// Copiar params de búsqueda para añadir paginación
$execParams = $params;
$execTypes = $types;

$execParams[] = $offset;
$execParams[] = $limite;
$execTypes .= "ii";

if ($stmt) {
    $stmt->bind_param($execTypes, ...$execParams);
    $stmt->execute();
    $productosResult = $stmt->get_result();
}

// Obtener todas las categorías (representadas por unidad_Medida) para llenar el filtro dropdown
$categoriesResult = $conn->query("SELECT DISTINCT unidad_Medida FROM producto WHERE unidad_Medida IS NOT NULL AND unidad_Medida != ''");
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

    <!-- CSS Dashboard & Inventario Local (Cache Busted) -->
    <link rel="stylesheet" href="css/dashboard_admi.css?v=2">
    <link rel="stylesheet" href="../css/inventario.css?v=3">
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

            <!-- Navigation Links (Inventario marcado como activo) -->
            <nav class="sidebar-navigation">
                <a href="dashboar_admi.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-house"></i>
                        <span>Inicio</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>

                <a href="inventario.php" class="sidebar-link-card active">
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

                <a href="reportes.php" class="sidebar-link-card">
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

            <!-- Logout Link -->
            <div class="sidebar-footer-section">
                <a href="../../controllers/logout.php" class="sidebar-logout-btn">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Cerrar sesion</span>
                </a>
            </div>
        </aside>

        <!-- ==========================================
             MAIN CONTENT (CONTENIDO PRINCIPAL)
        =========================================== -->
        <main class="main-content">
            <!-- Mobile Toggle Menu Button -->
            <button class="mobile-toggle-btn" id="mobileMenu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Header Section with Shelves Illustration -->
            <header class="header-with-illustration">
                <div class="welcome-header-text">
                    <h1 style="font-size: 56px; font-weight: 800; color: #000000; margin: 0;">Inventario</h1>
                </div>
                <div class="header-illustration">
                    <img src="../../public/img/store_shelves_illustration.jpg" alt="Store Shelves Illustration" class="header-illustration-img">
                </div>
            </header>

            <!-- Stats Row (4 Cards) -->
            <section class="inventory-stats-row">
                <!-- Total Productos -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #ffd6ff;">
                        <i class="fa-solid fa-basket-shopping" style="color: #f72585;"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Total productos</span>
                        <span class="stat-number"><?= $totalProductos; ?></span>
                        <span class="stat-desc">Productos Registrados</span>
                    </div>
                </div>

                <!-- Stock Disponible -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #e2e2ff;">
                        <i class="fa-solid fa-box" style="color: #3f37c9;"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Stock Disponible</span>
                        <span class="stat-number"><?= $stockDisponible; ?></span>
                        <span class="stat-desc">Unidades Disponibles</span>
                    </div>
                </div>

                <!-- Stock Bajo -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #fff8e1;">
                        <i class="fa-solid fa-triangle-exclamation" style="color: #ffb300;"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Stock Disponible</span>
                        <span class="stat-number"><?= $stockBajo; ?></span>
                        <span class="stat-desc">Productos registrados</span>
                    </div>
                </div>

                <!-- Sin Stock -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #fcdfe5;">
                        <i class="fa-solid fa-eye" style="color: #ec4899;"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Sin Stock</span>
                        <span class="stat-number"><?= $sinStock; ?></span>
                        <span class="stat-desc">Productos agotados</span>
                    </div>
                </div>
            </section>

            <!-- Filters Bar (Search, Category, State, Clear) -->
            <section class="filters-section">
                <form action="inventario.php" method="GET" class="filter-bar-form" id="filtersForm">
                    <!-- Search Input -->
                    <div class="filter-input-group">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" name="buscar" value="<?= htmlspecialchars($buscar); ?>" placeholder="Buscar Productos..." onchange="this.form.submit();">
                    </div>

                    <!-- Category Filter -->
                    <div class="filter-select-group">
                        <label>Categoria</label>
                        <select name="categoria" onchange="this.form.submit();">
                            <option value="Todas" <?= $categoriaFiltro === 'Todas' ? 'selected' : ''; ?>>Todas</option>
                            <?php if ($categoriesResult): ?>
                                <?php while ($cat = $categoriesResult->fetch_assoc()): ?>
                                    <option value="<?= htmlspecialchars($cat['unidad_Medida']); ?>" <?= $categoriaFiltro === $cat['unidad_Medida'] ? 'selected' : ''; ?>>
                                        <?= htmlspecialchars($cat['unidad_Medida']); ?>
                                    </option>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <!-- State Filter -->
                    <div class="filter-select-group">
                        <label>Estado</label>
                        <select name="estado" onchange="this.form.submit();">
                            <option value="Todos" <?= $estadoFiltro === 'Todos' ? 'selected' : ''; ?>>Todos</option>
                            <option value="Disponible" <?= $estadoFiltro === 'Disponible' ? 'selected' : ''; ?>>Disponible</option>
                            <option value="Stock Bajo" <?= $estadoFiltro === 'Stock Bajo' ? 'selected' : ''; ?>>Stock Bajo</option>
                            <option value="Sin Stock" <?= $estadoFiltro === 'Sin Stock' ? 'selected' : ''; ?>>Sin Stock</option>
                        </select>
                    </div>

                    <!-- Clear Filters Link -->
                    <a href="inventario.php" class="btn-clear-filters">
                        <i class="fa-solid fa-rotate-left"></i> Limpiar Filtros
                    </a>
                </form>
            </section>

            <!-- Products Table Container -->
            <section class="table-section">
                <div class="inventory-table-container">
                    <table class="inventory-table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>stock</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($productosResult && $productosResult->num_rows > 0): ?>
                                <?php while ($prod = $productosResult->fetch_assoc()): ?>
                                    <?php 
                                        // Determinar clase de stock y estado badge
                                        $stock = (int)$prod['stock_Actual'];
                                        if ($stock === 0) {
                                            $stockClass = "empty";
                                            $statusText = "Sin Stock";
                                            $statusClass = "sin-stock";
                                        } elseif ($stock <= 15) {
                                            $stockClass = "low";
                                            $statusText = "Stock Bajo";
                                            $statusClass = "stock-bajo";
                                        } else {
                                            $stockClass = "available";
                                            $statusText = "Disponible";
                                            $statusClass = "disponible";
                                        }

                                        // Fallback de imagen
                                        $imgPath = (isset($prod['imagen']) && !is_null($prod['imagen'])) ? htmlspecialchars($prod['imagen']) : '';
                                        if (empty($imgPath)) {
                                            $imgPath = "../../public/img/tienda.png";
                                        }
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="product-cell">
                                                <img src="<?= $imgPath; ?>" alt="<?= htmlspecialchars($prod['nombre']); ?>" class="product-cell-img">
                                                <div class="product-cell-info">
                                                    <strong><?= htmlspecialchars($prod['nombre']); ?></strong>
                                                    <span>Codigo <?= htmlspecialchars($prod['codigo_Producto']); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="category-badge"><?= htmlspecialchars($prod['unidad_Medida']); ?></span>
                                        </td>
                                        <td style="font-weight: 600;">
                                            $<?= number_format($prod['precio_Venta'], 0, ',', '.'); ?>
                                        </td>
                                        <td>
                                            <span class="stock-text <?= $stockClass; ?>"><?= $stock; ?></span>
                                        </td>
                                        <td>
                                            <span class="status-badge <?= $statusClass; ?>"><?= $statusText; ?></span>
                                        </td>
                                        <td>
                                            <div class="actions-cell">
                                                <a href="#" class="action-icon-btn view" title="Ver Detalle">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="#" class="action-icon-btn edit" title="Editar Producto">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>
                                                <a href="#" class="action-icon-btn delete" title="Eliminar Producto">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 30px; color: var(--text-muted);">
                                        No se encontraron productos registrados con los filtros seleccionados.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Table Footer: Add Product & Pagination controls -->
            <section class="inventory-footer-section">
                <!-- Add Product Button -->
                <a href="#" class="btn-add-product">
                    <i class="fa-solid fa-plus"></i> Agregar Producto
                </a>

                <!-- Pagination Links -->
                <div class="pagination-controls">
                    <div class="pagination-links">
                        <!-- Anterior Button -->
                        <a href="?buscar=<?= urlencode($buscar); ?>&categoria=<?= urlencode($categoriaFiltro); ?>&estado=<?= urlencode($estadoFiltro); ?>&pagina=<?= $pagina - 1; ?>" 
                           class="page-btn <?= $pagina <= 1 ? 'disabled' : ''; ?>">
                           <
                        </a>

                        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                            <a href="?buscar=<?= urlencode($buscar); ?>&categoria=<?= urlencode($categoriaFiltro); ?>&estado=<?= urlencode($estadoFiltro); ?>&pagina=<?= $i; ?>" 
                               class="page-btn <?= $pagina === $i ? 'active' : ''; ?>">
                               <?= $i; ?>
                            </a>
                        <?php endfor; ?>

                        <!-- Siguiente Button -->
                        <a href="?buscar=<?= urlencode($buscar); ?>&categoria=<?= urlencode($categoriaFiltro); ?>&estado=<?= urlencode($estadoFiltro); ?>&pagina=<?= $pagina + 1; ?>" 
                           class="page-btn <?= $pagina >= $totalPaginas ? 'disabled' : ''; ?>">
                           >
                        </a>
                    </div>
                    <div class="pagination-info">
                        Mostrando <?= $productosResult ? $productosResult->num_rows : 0; ?> productos de <?= $totalFiltrado; ?>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Mobile Drawer JS Controller -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebarClose = document.getElementById('sidebarClose');

        function openSidebar() {
            sidebar.classList.add('open');
        }

        function closeSidebar() {
            sidebar.classList.remove('open');
        }

        mobileMenu.addEventListener('click', openSidebar);
        sidebarClose.addEventListener('click', closeSidebar);
    </script>
</body>

</html>
