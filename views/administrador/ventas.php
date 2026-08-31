<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/database.php';

$mensaje_exito = "";
$venta_id_reciente = 0;

// REGISTRAR VENTA POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'registrar_venta') {
    $id_cliente = (int)($_POST['id_cliente'] ?? 0);
    $metodo_pago = trim($_POST['metodo_pago'] ?? 'Efectivo');
    $productos_json = $_POST['productos_data'] ?? '[]';
    
    $cart_items = json_decode($productos_json, true);
    
    if ($id_cliente > 0 && !empty($cart_items)) {
        // Iniciar transacción
        $conn->begin_transaction();
        try {
            // Calcular subtotal de la venta
            $subtotal_venta = 0;
            foreach ($cart_items as $item) {
                $subtotal_venta += (float)$item['subtotal'];
            }
            // Calcular IVA (19%) y Total
            $iva_venta = $subtotal_venta * 0.19;
            $total_venta = $subtotal_venta + $iva_venta;
            
            $fecha_actual = date('Y-m-d H:i:s');
            $estado_venta = 'Completada';
            $id_usuario_session = $_SESSION['id_Usuario']; // Extraer ID usuario del administrador activo
            
            // 1. Insertar cabecera de venta (subtotal = $subtotal_venta, total = $total_venta)
            $stmtV = $conn->prepare("INSERT INTO venta (id_Cliente, fecha_Venta, subtotal, descuento, total, metodo_Pago, estado, id_Usuario) VALUES (?, ?, ?, 0, ?, ?, ?, ?)");
            $stmtV->bind_param("isddssi", $id_cliente, $fecha_actual, $subtotal_venta, $total_venta, $metodo_pago, $estado_venta, $id_usuario_session);
            $stmtV->execute();
            $id_venta = $conn->insert_id;
            $stmtV->close();
            
            // 2. Insertar detalles y actualizar stock
            $stmtD = $conn->prepare("INSERT INTO detalle_venta (id_Venta, id_Producto, cantidad, precio_Unitario, subtotal) VALUES (?, ?, ?, ?, ?)");
            $stmtS = $conn->prepare("UPDATE producto SET stock_Actual = stock_Actual - ? WHERE id_Producto = ?");
            
            foreach ($cart_items as $item) {
                $id_prod = (int)$item['id_producto'];
                $cant = (int)$item['cantidad'];
                $precio_u = (float)$item['precio'];
                $sub = (float)$item['subtotal'];
                
                // Insertar detalle
                $stmtD->bind_param("iiidd", $id_venta, $id_prod, $cant, $precio_u, $sub);
                $stmtD->execute();
                
                // Actualizar stock
                $stmtS->bind_param("ii", $cant, $id_prod);
                $stmtS->execute();
            }
            $stmtD->close();
            $stmtS->close();
            
            // 3. Si es Crédito (Fiado), registrar la deuda
            if ($metodo_pago === 'Crédito') {
                $estado_deuda = 'Pendiente';
                $stmtDeuda = $conn->prepare("INSERT INTO deuda (fecha_Registro, valor_Inicial, saldo_Pendiente, estado, id_Usuario, id_Cliente) VALUES (?, ?, ?, ?, ?, ?)");
                $stmtDeuda->bind_param("sddsii", $fecha_actual, $total_venta, $total_venta, $estado_deuda, $id_usuario_session, $id_cliente);
                $stmtDeuda->execute();
                $stmtDeuda->close();
            }
            
            // Confirmar transacción
            $conn->commit();
            
            $mensaje_exito = "Venta registrada con éxito.";
            $venta_id_reciente = $id_venta;
        } catch (Exception $e) {
            $conn->rollback();
            $mensaje_error = "Error al procesar la venta: " . $e->getMessage();
        }
    }
}

// OBTENER ESTADÍSTICAS REALES
// 1. Total Facturado
$resTotal = $conn->query("SELECT SUM(total) as total FROM venta WHERE estado = 'Completada'");
$totalFacturado = $resTotal ? (float)$resTotal->fetch_assoc()['total'] : 0.0;

// 2. Ventas Realizadas
$resCount = $conn->query("SELECT COUNT(*) as total FROM venta");
$totalVentas = $resCount ? (int)$resCount->fetch_assoc()['total'] : 0;

// 3. Metodo de Pago Preferido
$resMetodo = $conn->query("SELECT metodo_Pago, COUNT(*) as cant FROM venta GROUP BY metodo_Pago ORDER BY cant DESC LIMIT 1");
$metodoPreferido = ($resMetodo && $row = $resMetodo->fetch_assoc()) ? $row['metodo_Pago'] : 'Efectivo';

$resDeuda = $conn->query("SELECT SUM(saldo_Pendiente) as total FROM deuda WHERE estado = 'Pendiente'");
$totalDeudaActiva = $resDeuda ? (float)$resDeuda->fetch_assoc()['total'] : 0.0;

// 5. Obtener fecha y hora actual en español
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

// 6. Información del Administrador logueado
$id_admin = $_SESSION['id_Usuario'] ?? 0;
$adminEmail = 'admin@sivc.com';
$nombreUsuario = 'Administrador';
if ($id_admin > 0) {
    $resAdmin = $conn->query("SELECT correo, nombre, apellido FROM usuarios WHERE id_Usuario = $id_admin");
    if ($resAdmin && $rowAdmin = $resAdmin->fetch_assoc()) {
        $adminEmail = $rowAdmin['correo'] ?? 'admin@sivc.com';
        $nombreUsuario = trim(($rowAdmin['nombre'] ?? '') . ' ' . ($rowAdmin['apellido'] ?? ''));
        if (empty($nombreUsuario)) {
            $nombreUsuario = $_SESSION['usuario'] ?? 'Administrador';
        }
    }
}

// OBTENER CLIENTES Y PRODUCTOS
$clientesResult = $conn->query("SELECT c.id_Cliente, u.nombre, u.apellido FROM cliente c JOIN usuarios u ON c.numero_Documento = u.numero_Documento WHERE u.estado = 'Activo'");

$productosResult = $conn->query("SELECT id_Producto, nombre, codigo_Producto, precio_Venta, stock_Actual, unidad_Medida FROM producto WHERE estado = 'Activo' AND stock_Actual > 0");
$productosArr = [];
if ($productosResult) {
    while ($row = $productosResult->fetch_assoc()) {
        $productosArr[] = $row;
    }
}

// OBTENER VENTAS RECIENTES (Historial de 5 registros)
$ventasRecientes = $conn->query("SELECT v.*, u.nombre as cliente_nombre, u.apellido as cliente_apellido 
                                FROM venta v 
                                LEFT JOIN cliente c ON v.id_Cliente = c.id_Cliente 
                                LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento 
                                ORDER BY v.id_Venta DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas | SIVC</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS general -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- CSS Dashboard & Ventas Local (Cache Busted) -->
    <link rel="stylesheet" href="admi.css/dashboard_admi.css?v=2">
    <link rel="stylesheet" href="admi.css/ventas_admi.css?v=4">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

            <!-- Store Logo Section (Matches SIVC mockup) -->
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

                <a href="vendedores.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-user-tie"></i>
                        <span>Vendedores</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>

                <a href="reportes.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-chart-simple"></i>
                        <span>Reportes</span>
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
            <!-- Mobile Toggle Menu Button -->
            <button class="mobile-toggle-btn" id="mobileMenu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Content Header -->
            <header class="content-header">
                <div class="welcome-header-text">
                    <h1>Ventas</h1>
                    <p>Registra y administra las ventas de tu negocio.</p>
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

            <!-- Stats Row (4 Cards) -->
            <section class="inventory-stats-row">
                <!-- Total Facturado -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle circle-green">
                        <i class="fa-solid fa-money-bill-wave"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Total facturado hoy</span>
                        <span class="stat-number">$<?= number_format($totalFacturado, 0, ',', '.'); ?></span>
                        <span class="stat-desc">Ventas completadas</span>
                    </div>
                </div>

                <!-- Cantidad Ventas -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle circle-blue">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Ventas realizadas hoy</span>
                        <span class="stat-number"><?= $totalVentas; ?></span>
                        <span class="stat-desc">Transacciones</span>
                    </div>
                </div>

                <!-- Pago Preferido -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle circle-teal">
                        <i class="fa-solid fa-credit-card"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Método preferido</span>
                        <span class="stat-number"><?= htmlspecialchars($metodoPreferido); ?></span>
                        <span class="stat-desc">Más utilizado</span>
                    </div>
                </div>

                <!-- Deudas Activas -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle circle-red">
                        <i class="fa-solid fa-receipt"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Créditos pendientes</span>
                        <span class="stat-number">$<?= number_format($totalDeudaActiva, 0, ',', '.'); ?></span>
                        <span class="stat-desc">Fiados por cobrar</span>
                    </div>
                </div>
            </section>

            <!-- Sales Interactive Workspace (Two Columns) -->
            <section class="sales-grid-layout">
                <!-- Column Left: Select and Add Products + Cart List -->
                <div class="sales-left-column">
                    <!-- Add Product to Cart Card -->
                    <div class="sales-card-box">
                        <h2>Agregar productos a la venta</h2>
                        <div class="add-product-row">
                            <!-- Product Selector -->
                            <div class="form-group-item">
                                <label>Producto</label>
                                <div class="select-wrapper">
                                    <select id="productSelect">
                                        <option value="" disabled selected>Buscar o seleccionar producto...</option>
                                        <?php foreach ($productosArr as $p): ?>
                                            <?php 
                                                // Fallback de imagen
                                                $imgP = (isset($p['imagen']) && !is_null($p['imagen'])) ? htmlspecialchars($p['imagen']) : '';
                                                if (empty($imgP)) {
                                                    $imgP = "../../public/img/tienda.png";
                                                }
                                            ?>
                                            <option value="<?= $p['id_Producto']; ?>" 
                                                    data-precio="<?= $p['precio_Venta']; ?>" 
                                                    data-stock="<?= $p['stock_Actual']; ?>" 
                                                    data-codigo="<?= $p['codigo_Producto']; ?>"
                                                    data-imagen="<?= $imgP; ?>">
                                                <?= htmlspecialchars($p['nombre']); ?> (Stock: <?= $p['stock_Actual']; ?>) - $<?= number_format($p['precio_Venta'], 0, ',', '.'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <i class="fa-solid fa-chevron-down select-chevron"></i>
                                </div>
                            </div>
                            <!-- Quantity -->
                            <div class="form-group-item qty-field">
                                <label>Cantidad</label>
                                <input type="number" id="productQty" value="1" min="1">
                            </div>
                            <!-- Add Button -->
                            <button type="button" class="btn-add-to-cart-new" id="addToCartBtn">
                                <i class="fa-solid fa-plus"></i> Agregar
                            </button>
                        </div>

                        <!-- Cart Items Table Card (Inline in Card 1) -->
                        <div class="cart-table-wrapper">
                            <table class="cart-table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio unitario</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                        <th style="width: 50px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="cartTableBody">
                                    <tr id="cartEmptyRow">
                                        <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 30px; font-weight: 500;">
                                            No se han agregado productos a esta venta aún.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Cart Preview Card (Card 2) -->
                    <div class="sales-card-box">
                        <h2>Detalle de la compra actual</h2>
                        
                        <!-- Empty Basket State -->
                        <div id="cartEmptyState" class="empty-cart-state">
                            <i class="fa-solid fa-basket-shopping basket-icon"></i>
                            <strong>El carrito está vacío</strong>
                            <p>Agrega productos para comenzar la venta</p>
                        </div>

                        <!-- Read-only Preview Table -->
                        <div id="previewTableWrapper" class="cart-table-wrapper" style="display: none;">
                            <table class="preview-table">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio unit.</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="previewTableBody">
                                    <!-- Read-only rows rendered by JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Column Right: Select Client, Payment Method and Finalize -->
                <div class="sales-right-column">
                    <form action="" method="POST" id="checkoutForm">
                        <input type="hidden" name="action" value="registrar_venta">
                        <!-- Data serialized for POST -->
                        <input type="hidden" name="productos_data" id="productosDataInput" value="[]">

                        <div class="sales-card-box">
                            <h2>Datos y cierre de venta</h2>

                            <!-- Client Selector with user-plus inline button -->
                            <div class="form-group-item" style="margin-bottom: 20px;">
                                <label>Cliente</label>
                                <div style="display: flex; gap: 8px; width: 100%;">
                                    <div class="select-wrapper" style="flex: 1;">
                                        <select name="id_cliente" required>
                                            <option value="" disabled selected>Seleccionar cliente...</option>
                                            <?php if ($clientesResult): ?>
                                                <?php while ($c = $clientesResult->fetch_assoc()): ?>
                                                    <option value="<?= $c['id_Cliente']; ?>">
                                                        <?= htmlspecialchars($c['nombre'] . ' ' . $c['apellido']); ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </select>
                                        <i class="fa-solid fa-chevron-down select-chevron"></i>
                                    </div>
                                    <a href="clientes.php" class="btn-add-client-new" title="Crear Cliente">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Payment Method Selector -->
                            <div class="form-group-item" style="margin-bottom: 20px;">
                                <label>Método de pago</label>
                                <div class="select-wrapper">
                                    <select name="metodo_pago" required>
                                        <option value="Efectivo" selected>Efectivo</option>
                                        <option value="Nequi">Nequi / Transferencia</option>
                                        <option value="Tarjeta">Tarjeta de Crédito/Débito</option>
                                        <option value="Crédito">Crédito (Fiado)</option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down select-chevron"></i>
                                </div>
                            </div>

                            <!-- Totals Box -->
                            <div class="totals-breakdown">
                                <div class="totals-breakdown-row">
                                    <span>Subtotal</span>
                                    <span id="subtotalLabel">$0</span>
                                </div>
                                <div class="totals-breakdown-row">
                                    <span>Descuento</span>
                                    <span>$0</span>
                                </div>
                                <div class="totals-breakdown-row">
                                    <span>IVA (19%)</span>
                                    <span id="ivaLabel">$0</span>
                                </div>
                                <div class="totals-breakdown-row total-grand">
                                    <span>Total a pagar</span>
                                    <span id="totalLabel">$0</span>
                                </div>
                            </div>

                            <!-- Checkout button -->
                            <button type="submit" class="btn-process-sale-new" id="processSaleBtn">
                                <i class="fa-solid fa-cash-register"></i> Registrar venta
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- Sales History Section (Recent 5 Sales) -->
            <section class="table-section">
                <div class="sales-history-card">
                    <div class="card-header">
                        <h2>Historial de Ventas Recientes</h2>
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
                                    <th style="width: 100px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($ventasRecientes && $ventasRecientes->num_rows > 0): ?>
                                    <?php while ($v = $ventasRecientes->fetch_assoc()): ?>
                                        <tr>
                                            <td style="font-weight: 700; color: var(--color-purple);">
                                                #SIVC-<?= str_pad($v['id_Venta'], 5, '0', STR_PAD_LEFT); ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars(($v['cliente_nombre'] ?? 'General') . ' ' . ($v['cliente_apellido'] ?? '')); ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($v['fecha_Venta']); ?>
                                            </td>
                                            <td style="font-weight: 600;">
                                                $<?= number_format($v['total'], 0, ',', '.'); ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($v['metodo_Pago']); ?>
                                            </td>
                                            <td>
                                                <span class="status-badge disponible" style="padding: 4px 10px; border-radius: 12px; font-size: 11px;">
                                                    <?= htmlspecialchars($v['estado']); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="comprobante.php?id=<?= $v['id_Venta']; ?>" target="_blank" class="action-icon-btn view" title="Imprimir Comprobante">
                                                    <i class="fa-solid fa-print"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" style="text-align: center; padding: 30px; color: var(--text-muted);">
                                            No se han registrado ventas aún.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Active Link Script & Cart JS Logic -->
    <script>
        // Hamburger Drawer Control
        const sidebar = document.getElementById('sidebar');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebarClose = document.getElementById('sidebarClose');
 
        if (mobileMenu) {
            mobileMenu.addEventListener('click', () => sidebar.classList.add('open'));
        }
        if (sidebarClose) {
            sidebarClose.addEventListener('click', () => sidebar.classList.remove('open'));
        }
 
        // Highlight Active Link card
        const currentPath = window.location.pathname.split('/').pop();
        const navLinks = document.querySelectorAll('.sidebar-link-card');
 
        navLinks.forEach(link => {
            const linkPath = link.getAttribute('href');
            if (currentPath === linkPath) {
                link.classList.add('active');
            }
        });
 
        // ----------------------------------------------------
        // INTERACTIVE SHOPPING CART JS LOGIC
        // ----------------------------------------------------
        const productSelect = document.getElementById('productSelect');
        const productQty = document.getElementById('productQty');
        const addToCartBtn = document.getElementById('addToCartBtn');
        const cartTableBody = document.getElementById('cartTableBody');
        const cartEmptyRow = document.getElementById('cartEmptyRow');
        const cartEmptyState = document.getElementById('cartEmptyState');
        const previewTableWrapper = document.getElementById('previewTableWrapper');
        const previewTableBody = document.getElementById('previewTableBody');
        const subtotalLabel = document.getElementById('subtotalLabel');
        const ivaLabel = document.getElementById('ivaLabel');
        const totalLabel = document.getElementById('totalLabel');
        const productosDataInput = document.getElementById('productosDataInput');
        const checkoutForm = document.getElementById('checkoutForm');
 
        let cart = [];
 
        // Add Product to Cart Action
        addToCartBtn.addEventListener('click', () => {
            const selectedOpt = productSelect.options[productSelect.selectedIndex];
            
            if (!selectedOpt.value) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Selecciona un producto',
                    text: 'Debes elegir un producto para agregarlo a la venta.',
                    confirmButtonColor: '#014235'
                });
                return;
            }
 
            const id_producto = parseInt(selectedOpt.value);
            const nombre = selectedOpt.text.split('(')[0].trim();
            const precio = parseFloat(selectedOpt.dataset.precio);
            const stock = parseInt(selectedOpt.dataset.stock);
            const codigo = selectedOpt.dataset.codigo;
            const imagen = selectedOpt.dataset.imagen;
            const cantidad = parseInt(productQty.value);
 
            if (isNaN(cantidad) || cantidad <= 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Cantidad inválida',
                    text: 'Por favor ingresa una cantidad mayor que cero.',
                    confirmButtonColor: '#014235'
                });
                return;
            }
 
            // Validar stock disponible
            const existingItem = cart.find(item => item.id_producto === id_producto);
            const totalQty = existingItem ? (existingItem.cantidad + cantidad) : cantidad;
 
            if (totalQty > stock) {
                Swal.fire({
                    icon: 'error',
                    title: 'Stock Insuficiente',
                    text: `No hay suficientes unidades de ${nombre}. Stock actual: ${stock}.`,
                    confirmButtonColor: '#014235'
                });
                return;
            }
 
            if (existingItem) {
                existingItem.cantidad += cantidad;
                existingItem.subtotal = existingItem.cantidad * existingItem.precio;
            } else {
                cart.push({
                    id_producto,
                    codigo,
                    nombre,
                    imagen,
                    cantidad,
                    precio,
                    subtotal: cantidad * precio
                });
            }
 
            // Reset input values
            productSelect.selectedIndex = 0;
            productQty.value = 1;
 
            updateCartUI();
        });
 
        // Delete item from cart
        window.deleteCartItem = function(id_producto) {
            cart = cart.filter(item => item.id_producto !== id_producto);
            updateCartUI();
        };

        // Increment / Decrement quantity
        window.changeQty = function(id_producto, delta) {
            const item = cart.find(i => i.id_producto === id_producto);
            if (item) {
                const newQty = item.cantidad + delta;
                if (newQty < 1) return;

                // Validar stock
                const opt = Array.from(productSelect.options).find(o => parseInt(o.value) === id_producto);
                if (opt) {
                    const stock = parseInt(opt.dataset.stock);
                    if (newQty > stock) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Stock Insuficiente',
                            text: `No hay suficientes unidades. Stock disponible: ${stock}.`,
                            confirmButtonColor: '#014235'
                        });
                        return;
                    }
                }

                item.cantidad = newQty;
                item.subtotal = item.cantidad * item.precio;
                updateCartUI();
            }
        };
 
        // Format money helper
        function formatMoney(amount) {
            return '$' + amount.toLocaleString('es-CO', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
        }
 
        // Update Cart UI, calculate totals and serialize data
        function updateCartUI() {
            // Remove previous items except headers
            cartTableBody.querySelectorAll('.cart-row-item').forEach(el => el.remove());
            previewTableBody.querySelectorAll('.preview-row-item').forEach(el => el.remove());
 
            if (cart.length === 0) {
                cartEmptyRow.style.display = '';
                cartEmptyState.style.display = '';
                previewTableWrapper.style.display = 'none';
                subtotalLabel.textContent = '$0';
                ivaLabel.textContent = '$0';
                totalLabel.textContent = '$0';
                productosDataInput.value = '[]';
                return;
            }
 
            cartEmptyRow.style.display = 'none';
            cartEmptyState.style.display = 'none';
            previewTableWrapper.style.display = '';
 
            let subtotalTotal = 0;
 
            cart.forEach(item => {
                subtotalTotal += item.subtotal;
 
                // Render Interactive Row (Card 1)
                const tr = document.createElement('tr');
                tr.className = 'cart-row-item';
                tr.innerHTML = `
                    <td>
                        <div class="product-cell">
                            <img src="${item.imagen}" class="product-cell-img">
                            <div class="product-cell-info">
                                <strong>${item.nombre}</strong>
                                <span>SKU: ${item.codigo}</span>
                            </div>
                        </div>
                    </td>
                    <td style="font-weight: 500;">${formatMoney(item.precio)}</td>
                    <td>
                        <div class="qty-control-wrapper">
                            <button type="button" class="qty-btn" onclick="changeQty(${item.id_producto}, -1)">-</button>
                            <span class="qty-val">${item.cantidad}</span>
                            <button type="button" class="qty-btn" onclick="changeQty(${item.id_producto}, 1)">+</button>
                        </div>
                    </td>
                    <td style="font-weight: 600; color: #111827;">${formatMoney(item.subtotal)}</td>
                    <td>
                        <button type="button" class="action-icon-btn delete-new" onclick="deleteCartItem(${item.id_producto})">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </td>
                `;
                cartTableBody.appendChild(tr);

                // Render Read-Only Preview Row (Card 2)
                const trPreview = document.createElement('tr');
                trPreview.className = 'preview-row-item';
                trPreview.innerHTML = `
                    <td style="font-weight: 600; color: #4b5563;">Cod ${item.codigo}</td>
                    <td><strong>${item.nombre}</strong></td>
                    <td>${item.cantidad}</td>
                    <td>${formatMoney(item.precio)}</td>
                    <td style="font-weight: 600; color: #111827;">${formatMoney(item.subtotal)}</td>
                `;
                previewTableBody.appendChild(trPreview);
            });
 
            const ivaVal = subtotalTotal * 0.19;
            const grandTotal = subtotalTotal + ivaVal;

            subtotalLabel.textContent = formatMoney(subtotalTotal);
            ivaLabel.textContent = formatMoney(ivaVal);
            totalLabel.textContent = formatMoney(grandTotal);
 
            // Serialize cart to input
            productosDataInput.value = JSON.stringify(cart);
        }
 
        // Validate Checkout Form
        checkoutForm.addEventListener('submit', (e) => {
            if (cart.length === 0) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Carrito Vacío',
                    text: 'Debes agregar al menos un producto para registrar la venta.',
                    confirmButtonColor: '#014235'
                });
            }
        });
    </script>

    <!-- Direct Auto Download via Hidden Iframe -->
    <?php if (!empty($mensaje_exito)): ?>
        <iframe id="print_frame" src="comprobante.php?id=<?= $venta_id_reciente; ?>" style="display:none;"></iframe>
        <script>
            // Escuchar el mensaje del iframe indicando que el PDF ha sido descargado
            window.addEventListener('message', (event) => {
                if (event.data === 'pdf_downloaded') {
                    window.location.href = 'ventas.php';
                }
            });

            // Fallback por si hay algún problema con la red o CDN y el script del iframe no responde
            window.addEventListener('load', () => {
                setTimeout(() => {
                    window.location.href = 'ventas.php';
                }, 8000);
            });
        </script>
    <?php endif; ?>

</body>

</html>
