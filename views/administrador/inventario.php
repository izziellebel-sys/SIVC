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
    $conn->query("INSERT INTO producto (codigo_Producto, nombre, id_Proveedor, descripcion, precio_Compra, precio_Venta, stock_Actual, stock_Minimo, unidad_Medida, estado, imagen) VALUES 
        ('101', 'Arroz', 1, 'Arroz premium en bolsa de 1kg', 2000.00, 3000.00, 45, 5, 'Granos', 'Activo', '../../public/img/arroz.jpg'),
        ('102', 'Tuna / Atún', 1, 'Atún enlatado en agua 160g', 3800.00, 5000.00, 20, 5, 'Pez', 'Activo', '../../public/img/tuna.jpg'),
        ('103', 'Cereal', 1, 'Cereal hojuelas de maíz azucarado', 2500.00, 3500.00, 0, 5, 'Cereales', 'Activo', '../../public/img/cereal.jpg')");
} else {
    // Actualizar imágenes si están vacías para mejorar la presentación inicial
    $conn->query("UPDATE producto SET imagen = '../../public/img/arroz.jpg' WHERE codigo_Producto = '101' AND (imagen IS NULL OR imagen = '')");
    $conn->query("UPDATE producto SET imagen = '../../public/img/tuna.jpg' WHERE codigo_Producto = '102' AND (imagen IS NULL OR imagen = '')");
    $conn->query("UPDATE producto SET imagen = '../../public/img/cereal.jpg' WHERE codigo_Producto = '103' AND (imagen IS NULL OR imagen = '')");
}

$mensaje = "";
$tipo_alerta = "";
$titulo_alerta = "";

// PROCESAR POST ACCIONES
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'] ?? '';

    if ($action === 'editar') {
        $id_producto = (int)($_POST['id_Producto'] ?? 0);
        $codigo = trim($_POST['codigo_Producto'] ?? '');
        $nombre = trim($_POST['nombre'] ?? '');
        $id_proveedor = (int)($_POST['id_Proveedor'] ?? 0);
        $descripcion = trim($_POST['descripcion'] ?? '');
        $precio_compra = (float)($_POST['precio_Compra'] ?? 0);
        $precio_venta = (float)($_POST['precio_Venta'] ?? 0);
        $stock_actual = (int)($_POST['stock_Actual'] ?? 0);
        $stock_minimo = (int)($_POST['stock_Minimo'] ?? 0);
        $unidad_medida = trim($_POST['unidad_Medida'] ?? '');
        $estado = $_POST['estado'] ?? 'Activo';
        $imagen_actual = $_POST['imagen_actual'] ?? '';

        if ($id_producto > 0 && $codigo && $nombre && $id_proveedor > 0) {
            // Verificar duplicado de código excluyendo el actual
            $stmtCheck = $conn->prepare("SELECT id_Producto FROM producto WHERE codigo_Producto = ? AND id_Producto != ?");
            $stmtCheck->bind_param("si", $codigo, $id_producto);
            $stmtCheck->execute();
            $resCheck = $stmtCheck->get_result();

            if ($resCheck->num_rows > 0) {
                $mensaje = "El código de producto pertenece a otro registro.";
                $tipo_alerta = "error";
                $titulo_alerta = "Duplicado";
            } else {
                $db_image_path = $imagen_actual;
                // Subir nueva imagen si se seleccionó
                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
                    $tmpName = $_FILES['imagen']['tmp_name'];
                    $fileName = basename($_FILES['imagen']['name']);
                    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $allowedExts = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

                    if (in_array($fileExt, $allowedExts)) {
                        $newFileName = time() . '_' . uniqid() . '.' . $fileExt;
                        $uploadDir = __DIR__ . '/../../public/uploads/productos/';
                        if (!is_dir($uploadDir)) {
                            mkdir($uploadDir, 0777, true);
                        }
                        if (move_uploaded_file($tmpName, $uploadDir . $newFileName)) {
                            $db_image_path = '../../public/uploads/productos/' . $newFileName;
                            // Eliminar imagen anterior si existía y no es la de tienda.png
                            if ($imagen_actual && strpos($imagen_actual, 'tienda.png') === false) {
                                $oldFilePath = __DIR__ . '/../../' . str_replace('../../', '', $imagen_actual);
                                if (file_exists($oldFilePath)) {
                                    @unlink($oldFilePath);
                                }
                            }
                        }
                    }
                }

                $stmtUpdate = $conn->prepare("UPDATE producto SET codigo_Producto = ?, nombre = ?, id_Proveedor = ?, descripcion = ?, precio_Compra = ?, precio_Venta = ?, stock_Actual = ?, stock_Minimo = ?, unidad_Medida = ?, estado = ?, imagen = ? WHERE id_Producto = ?");
                if ($stmtUpdate) {
                    $stmtUpdate->bind_param("ssisddiisssi", $codigo, $nombre, $id_proveedor, $descripcion, $precio_compra, $precio_venta, $stock_actual, $stock_minimo, $unidad_medida, $estado, $db_image_path, $id_producto);
                    if ($stmtUpdate->execute()) {
                        $mensaje = "La información del producto ha sido actualizada.";
                        $tipo_alerta = "success";
                        $titulo_alerta = "¡Éxito!";
                    } else {
                        $mensaje = "Error al actualizar la base de datos.";
                        $tipo_alerta = "error";
                        $titulo_alerta = "Error";
                    }
                    $stmtUpdate->close();
                }
            }
            $stmtCheck->close();
        }
    } elseif ($action === 'eliminar') {
        $id_producto = (int)($_POST['id_Producto'] ?? 0);
        $imagen_actual = $_POST['imagen_actual'] ?? '';

        if ($id_producto > 0) {
            try {
                $stmtDel = $conn->prepare("DELETE FROM producto WHERE id_Producto = ?");
                if ($stmtDel) {
                    $stmtDel->bind_param("i", $id_producto);
                    if ($stmtDel->execute()) {
                        // Eliminar imagen física
                        if ($imagen_actual && strpos($imagen_actual, 'tienda.png') === false) {
                            $oldFilePath = __DIR__ . '/../../' . str_replace('../../', '', $imagen_actual);
                            if (file_exists($oldFilePath)) {
                                @unlink($oldFilePath);
                            }
                        }
                        $mensaje = "El producto ha sido eliminado del inventario.";
                        $tipo_alerta = "success";
                        $titulo_alerta = "¡Eliminado!";
                    } else {
                        $mensaje = "No se pudo eliminar el producto.";
                        $tipo_alerta = "error";
                        $titulo_alerta = "Error";
                    }
                    $stmtDel->close();
                }
            } catch (mysqli_sql_exception $e) {
                // Si falla por llaves foráneas, cambiar estado a Inactivo
                $stmtInact = $conn->prepare("UPDATE producto SET estado = 'Inactivo' WHERE id_Producto = ?");
                if ($stmtInact) {
                    $stmtInact->bind_param("i", $id_producto);
                    if ($stmtInact->execute()) {
                        $mensaje = "El producto tiene transacciones o relaciones y no puede ser eliminado. Su estado ha sido cambiado a 'Inactivo'.";
                        $tipo_alerta = "warning";
                        $titulo_alerta = "Producto Desactivado";
                    } else {
                        $mensaje = "Error al intentar desactivar el producto.";
                        $tipo_alerta = "error";
                        $titulo_alerta = "Error";
                    }
                    $stmtInact->close();
                }
            }
        }
    }
}

// Obtener lista de proveedores
$proveedores = [];
$resProv = $conn->query("SELECT id_Proveedor, nombre FROM proveedor");
if ($resProv) {
    while ($p = $resProv->fetch_assoc()) {
        $proveedores[] = $p;
    }
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
    <link rel="stylesheet" href="admi.css/dashboard_admi.css?v=2">
    <link rel="stylesheet" href="admi.css/inventario_admi.css?v=3">
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
                        <span class="stat-name">Stock Bajo</span>
                        <span class="stat-number"><?= $stockBajo; ?></span>
                        <span class="stat-desc">Productos con bajo stock</span>
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
                                <?php while ($producto = $productosResult->fetch_assoc()): ?>
                                    <?php 
                                        // Determinar clase de stock y estado badge
                                        $stock = (int)$producto['stock_Actual'];
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
                                        $imgPath = (isset($producto['imagen']) && !is_null($producto['imagen'])) ? htmlspecialchars($producto['imagen']) : '';
                                        if (empty($imgPath)) {
                                            $imgPath = "../../public/img/tienda.png";
                                        }
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="product-cell">
                                                <img src="<?= $imgPath; ?>" alt="<?= htmlspecialchars($producto['nombre']); ?>" class="product-cell-img">
                                                <div class="product-cell-info">
                                                    <strong><?= htmlspecialchars($producto['nombre']); ?></strong>
                                                    <span>Codigo <?= htmlspecialchars($producto['codigo_Producto']); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="category-badge"><?= htmlspecialchars($producto['unidad_Medida']); ?></span>
                                        </td>
                                        <td style="font-weight: 600;">
                                            $<?= number_format($producto['precio_Venta'], 0, ',', '.'); ?>
                                        </td>
                                        <td>
                                            <span class="stock-text <?= $stockClass; ?>"><?= $stock; ?></span>
                                        </td>
                                        <td>
                                            <span class="status-badge <?= $statusClass; ?>"><?= $statusText; ?></span>
                                        </td>
                                        <td>
                                            <div class="actions-cell">
                                                <button type="button" class="action-icon-btn view" title="Ver Detalle"
                                                        data-id="<?= $producto['id_Producto']; ?>"
                                                        data-codigo="<?= htmlspecialchars($producto['codigo_Producto']); ?>"
                                                        data-nombre="<?= htmlspecialchars($producto['nombre']); ?>"
                                                        data-proveedor="<?= $producto['id_Proveedor']; ?>"
                                                        data-descripcion="<?= htmlspecialchars($producto['descripcion'] ?? ''); ?>"
                                                        data-compra="<?= $producto['precio_Compra']; ?>"
                                                        data-venta="<?= $producto['precio_Venta']; ?>"
                                                        data-stock="<?= $producto['stock_Actual']; ?>"
                                                        data-minimo="<?= $producto['stock_Minimo']; ?>"
                                                        data-categoria="<?= htmlspecialchars($producto['unidad_Medida'] ?? ''); ?>"
                                                        data-estado="<?= htmlspecialchars($producto['estado']); ?>"
                                                        data-imagen="<?= $imgPath; ?>"
                                                        onclick="abrirModalDetalle(this)"
                                                        style="border:none; cursor:pointer;">
                                                    <i class="fa-regular fa-eye"></i>
                                                </button>
                                                <button type="button" class="action-icon-btn edit" title="Editar Producto"
                                                        data-id="<?= $producto['id_Producto']; ?>"
                                                        data-codigo="<?= htmlspecialchars($producto['codigo_Producto']); ?>"
                                                        data-nombre="<?= htmlspecialchars($producto['nombre']); ?>"
                                                        data-proveedor="<?= $producto['id_Proveedor']; ?>"
                                                        data-descripcion="<?= htmlspecialchars($producto['descripcion'] ?? ''); ?>"
                                                        data-compra="<?= $producto['precio_Compra']; ?>"
                                                        data-venta="<?= $producto['precio_Venta']; ?>"
                                                        data-stock="<?= $producto['stock_Actual']; ?>"
                                                        data-minimo="<?= $producto['stock_Minimo']; ?>"
                                                        data-categoria="<?= htmlspecialchars($producto['unidad_Medida'] ?? ''); ?>"
                                                        data-estado="<?= htmlspecialchars($producto['estado']); ?>"
                                                        data-imagen="<?= $imgPath; ?>"
                                                        onclick="abrirModalEditar(this)"
                                                        style="border:none; cursor:pointer;">
                                                    <i class="fa-solid fa-pencil"></i>x
                                                </button>
                                                <button type="button" class="action-icon-btn delete" title="Eliminar Producto"
                                                        onclick="confirmarEliminar(<?= $producto ['id_Producto']; ?>, '<?= addslashes($producto['nombre']); ?>', '<?= $imgPath; ?>')"
                                                        style="border:none; cursor:pointer;">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
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
                <a href="agregar_producto.php" class="btn-add-product">
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

    <!-- ==========================================
         MODALES DE OPERACIÓN
    =========================================== -->



    <!-- 2. MODAL: EDITAR PRODUCTO -->
    <div class="modal" id="modalEditar">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Editar Producto</h2>
                <button class="modal-close-btn" onclick="cerrarModalEditar()">&times;</button>
            </div>
            <div class="modal-body">
                <form action="inventario.php" method="POST" enctype="multipart/form-data" id="formEditar">
                    <input type="hidden" name="action" value="editar">
                    <input type="hidden" name="id_Producto" id="editId">
                    <input type="hidden" name="imagen_actual" id="editImagenActual">
                    
                    <div class="modal-grid-form">
                        <div class="form-field-group">
                            <label for="editCodigo">Código del Producto *</label>
                            <input type="text" name="codigo_Producto" id="editCodigo" required>
                        </div>
                        <div class="form-field-group">
                            <label for="editNombre">Nombre del Producto *</label>
                            <input type="text" name="nombre" id="editNombre" required>
                        </div>
                        <div class="form-field-group">
                            <label for="editCategoria">Categoría *</label>
                            <input type="text" name="unidad_Medida" id="editCategoria" required>
                        </div>
                        <div class="form-field-group">
                            <label for="editProveedor">Proveedor *</label>
                            <select name="id_Proveedor" id="editProveedor" required>
                                <?php foreach ($proveedores as $prov): ?>
                                    <option value="<?= $prov['id_Proveedor']; ?>"><?= htmlspecialchars($prov['nombre']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-field-group">
                            <label for="editPrecioCompra">Precio Compra *</label>
                            <input type="number" step="0.01" name="precio_Compra" id="editPrecioCompra" required>
                        </div>
                        <div class="form-field-group">
                            <label for="editPrecioVenta">Precio Venta *</label>
                            <input type="number" step="0.01" name="precio_Venta" id="editPrecioVenta" required>
                        </div>
                        <div class="form-field-group">
                            <label for="editStock">Cantidad / Stock Actual *</label>
                            <input type="number" name="stock_Actual" id="editStock" required>
                        </div>
                        <div class="form-field-group">
                            <label for="editStockMinimo">Stock Mínimo *</label>
                            <input type="number" name="stock_Minimo" id="editStockMinimo" required>
                        </div>
                        <div class="form-field-group">
                            <label for="editEstado">Estado *</label>
                            <select name="estado" id="editEstado" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-field-group">
                            <label for="editImagen">Subir Foto</label>
                            <input type="file" name="imagen" id="editImagen" accept="image/*" onchange="previewImage(this, 'editPreview')">
                        </div>
                        <div class="form-field-group form-full-row">
                            <div class="image-preview-container">
                                <span style="font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Vista Previa de Imagen</span>
                                <div class="image-preview-box">
                                    <img id="editPreview" src="../../public/img/tienda.png" alt="Vista previa">
                                </div>
                            </div>
                        </div>
                        <div class="form-field-group form-full-row">
                            <label for="editDescripcion">Descripción</label>
                            <textarea name="descripcion" id="editDescripcion"></textarea>
                        </div>
                    </div>

                    <div class="form-actions-row">
                        <button type="button" class="btn-modal-cancel" onclick="cerrarModalEditar()">Cancelar</button>
                        <button type="submit" class="btn-modal-submit">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 3. MODAL: DETALLE DEL PRODUCTO -->
    <div class="modal" id="modalDetalle">
        <div class="modal-content" style="max-width: 550px;">
            <div class="modal-header">
                <h2>Detalle del Producto</h2>
                <button class="modal-close-btn" onclick="cerrarModalDetalle()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="product-profile-card">
                    <img id="detImagen" src="../../public/img/tienda.png" alt="Imagen del producto" class="product-avatar-img">
                    <h3 id="detNombre">Nombre Producto</h3>
                    <span id="detEstadoBadge" class="status-badge">Disponible</span>
                </div>

                <div class="details-grid">
                    <div class="detail-item">
                        <strong>Código</strong>
                        <span id="detCodigo">101</span>
                    </div>
                    <div class="detail-item">
                        <strong>Categoría</strong>
                        <span id="detCategoria">Granos</span>
                    </div>
                    <div class="detail-item">
                        <strong>Precio Compra</strong>
                        <span id="detPrecioCompra">$0.00</span>
                    </div>
                    <div class="detail-item">
                        <strong>Precio Venta</strong>
                        <span id="detPrecioVenta">$0.00</span>
                    </div>
                    <div class="detail-item">
                        <strong>Stock Actual</strong>
                        <span id="detStockActual">0</span>
                    </div>
                    <div class="detail-item">
                        <strong>Stock Mínimo</strong>
                        <span id="detStockMinimo">5</span>
                    </div>
                    <div class="detail-item form-full-row">
                        <strong>Proveedor</strong>
                        <span id="detProveedor">Proveedor Central</span>
                    </div>
                    <div class="detail-item form-full-row">
                        <strong>Descripción</strong>
                        <span id="detDescripcion" style="font-weight: 500; white-space: pre-wrap;">Sin descripción</span>
                    </div>
                </div>

                <div class="form-actions-row" style="margin-top: 20px;">
                    <button type="button" class="btn-modal-submit" onclick="cerrarModalDetalle()" style="width: 100px;">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FORMULARIO ELIMINACIÓN OCULTO -->
    <form action="inventario.php" method="POST" id="formDelete" style="display:none;">
        <input type="hidden" name="action" value="eliminar">
        <input type="hidden" name="id_Producto" id="deleteId">
        <input type="hidden" name="imagen_actual" id="deleteImagenActual">
    </form>

    <!-- SweetAlert2 library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JS Mobile Toggle & Modal Actions -->
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

        // Modales de Operación
        const modalEditar = document.getElementById('modalEditar');
        const modalDetalle = document.getElementById('modalDetalle');

        // Mapeo de proveedores en frontend
        const suppliersMap = {
            <?php foreach($proveedores as $p) { echo $p['id_Proveedor'] . ': "' . addslashes($p['nombre']) . '",'; } ?>
        };

        // Previsualización de imágenes
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "../../public/img/tienda.png";
            }
        }



        // Editar Producto
        function abrirModalEditar(btn) {
            document.getElementById('editId').value = btn.getAttribute('data-id');
            document.getElementById('editCodigo').value = btn.getAttribute('data-codigo');
            document.getElementById('editNombre').value = btn.getAttribute('data-nombre');
            document.getElementById('editCategoria').value = btn.getAttribute('data-categoria');
            document.getElementById('editProveedor').value = btn.getAttribute('data-proveedor');
            document.getElementById('editPrecioCompra').value = btn.getAttribute('data-compra');
            document.getElementById('editPrecioVenta').value = btn.getAttribute('data-venta');
            document.getElementById('editStock').value = btn.getAttribute('data-stock');
            document.getElementById('editStockMinimo').value = btn.getAttribute('data-minimo');
            document.getElementById('editEstado').value = btn.getAttribute('data-estado');
            
            const imgPath = btn.getAttribute('data-imagen');
            document.getElementById('editImagenActual').value = imgPath;
            document.getElementById('editPreview').src = imgPath ? imgPath : "../../public/img/tienda.png";

            document.getElementById('editDescripcion').value = btn.getAttribute('data-descripcion');

            modalEditar.classList.add('open');
        }
        function cerrarModalEditar() {
            modalEditar.classList.remove('open');
            document.getElementById('formEditar').reset();
        }

        // Detalle del Producto
        function abrirModalDetalle(btn) {
            const imgPath = btn.getAttribute('data-imagen');
            document.getElementById('detImagen').src = imgPath ? imgPath : "../../public/img/tienda.png";
            document.getElementById('detNombre').innerText = btn.getAttribute('data-nombre');
            
            // Estado Badge
            const stock = parseInt(btn.getAttribute('data-stock'));
            const badg = document.getElementById('detEstadoBadge');
            if (stock === 0) {
                badg.innerText = "Sin Stock";
                badg.className = "status-badge sin-stock";
            } else if (stock <= 15) {
                badg.innerText = "Stock Bajo";
                badg.className = "status-badge stock-bajo";
            } else {
                badg.innerText = "Disponible";
                badg.className = "status-badge disponible";
            }

            document.getElementById('detCodigo').innerText = btn.getAttribute('data-codigo');
            document.getElementById('detCategoria').innerText = btn.getAttribute('data-categoria') || 'N/A';
            
            // Precios formateados
            const precioCompra = parseFloat(btn.getAttribute('data-compra'));
            const precioVenta = parseFloat(btn.getAttribute('data-venta'));
            
            document.getElementById('detPrecioCompra').innerText = '$' + precioCompra.toLocaleString('es-CO', {minimumFractionDigits: 0, maximumFractionDigits: 2});
            document.getElementById('detPrecioVenta').innerText = '$' + precioVenta.toLocaleString('es-CO', {minimumFractionDigits: 0, maximumFractionDigits: 2});
            
            document.getElementById('detStockActual').innerText = btn.getAttribute('data-stock');
            document.getElementById('detStockMinimo').innerText = btn.getAttribute('data-minimo');
            
            const provId = btn.getAttribute('data-proveedor');
            document.getElementById('detProveedor').innerText = suppliersMap[provId] || 'N/A';
            
            const desc = btn.getAttribute('data-descripcion');
            document.getElementById('detDescripcion').innerText = desc ? desc : "Sin descripción";

            modalDetalle.classList.add('open');
        }
        function cerrarModalDetalle() {
            modalDetalle.classList.remove('open');
        }

        // Confirmar Eliminación
        function confirmarEliminar(id, name, imgPath) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Se eliminará el producto '" + name + "' del sistema.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6f2dbd',
                cancelButtonColor: '#ffd8eb',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteId').value = id;
                    document.getElementById('deleteImagenActual').value = imgPath;
                    document.getElementById('formDelete').submit();
                }
            });
        }

        // Cerrar modales al hacer clic fuera del contenido
        window.onclick = function(event) {
            if (event.target == modalEditar) cerrarModalEditar();
            if (event.target == modalDetalle) cerrarModalDetalle();
        }

        // Mostrar SweetAlert si hay un mensaje
        <?php if ($mensaje !== ''): ?>
            Swal.fire({
                icon: '<?= $tipo_alerta; ?>',
                title: '<?= $titulo_alerta; ?>',
                text: '<?= $mensaje; ?>',
                confirmButtonColor: '#6f2dbd'
            });
        <?php endif; ?>
    </script>
</body>

</html>
