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
            // Calcular total de la venta
            $total_venta = 0;
            foreach ($cart_items as $item) {
                $total_venta += (float)$item['subtotal'];
            }
            
            $fecha_actual = date('Y-m-d H:i:s');
            $estado_venta = 'Completada';
            $id_usuario_session = $_SESSION['id_Usuario']; // Extraer ID usuario del administrador activo
            
            // 1. Insertar cabecera de venta
            $stmtV = $conn->prepare("INSERT INTO venta (id_Cliente, fecha_Venta, subtotal, descuento, total, metodo_Pago, estado, id_Usuario) VALUES (?, ?, ?, 0, ?, ?, ?, ?)");
            $stmtV->bind_param("isddssi", $id_cliente, $fecha_actual, $total_venta, $total_venta, $metodo_pago, $estado_venta, $id_usuario_session);
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

// 4. Créditos (Fiados) Activos (Suma de los saldos pendientes de deudas)
$resDeuda = $conn->query("SELECT SUM(saldo_Pendiente) as total FROM deuda WHERE estado = 'Pendiente'");
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
    <link rel="stylesheet" href="admi.css/ventas_admi.css?v=3">
    
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

            <!-- Header Section -->
            <header class="content-header">
                <div class="welcome-header-text">
                    <h1 style="font-size: 56px; font-weight: 800; color: #000000; margin: 0;">Ventas</h1>
                </div>
            </header>

            <!-- Stats Row (4 Cards) -->
            <section class="inventory-stats-row" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px;">
                <!-- Total Facturado -->
                <div class="stat-box-card" style="background-color: var(--card-bg); border: var(--border-style); border-radius: 20px; padding: 15px 20px; display: flex; align-items: center; gap: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.02);">
                    <div class="stat-box-icon-circle" style="background-color: #ffd6ff; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-money-bill-wave" style="color: #f72585; font-size: 26px;"></i>
                    </div>
                    <div class="stat-box-details" style="display: flex; flex-direction: column;">
                        <span class="stat-name" style="font-size: 13px; font-weight: 700; color: var(--text-dark);">Total Facturado</span>
                        <span class="stat-number" style="font-size: 24px; font-weight: 800; color: #000000; margin: 2px 0;">$<?= number_format($totalFacturado, 0, ',', '.'); ?></span>
                        <span class="stat-desc" style="font-size: 10px; color: var(--text-muted); font-weight: 600;">Ventas completadas</span>
                    </div>
                </div>

                <!-- Cantidad Ventas -->
                <div class="stat-box-card" style="background-color: var(--card-bg); border: var(--border-style); border-radius: 20px; padding: 15px 20px; display: flex; align-items: center; gap: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.02);">
                    <div class="stat-box-icon-circle" style="background-color: #e2e2ff; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-cart-arrow-down" style="color: #3f37c9; font-size: 26px;"></i>
                    </div>
                    <div class="stat-box-details" style="display: flex; flex-direction: column;">
                        <span class="stat-name" style="font-size: 13px; font-weight: 700; color: var(--text-dark);">Ventas Realizadas</span>
                        <span class="stat-number" style="font-size: 24px; font-weight: 800; color: #000000; margin: 2px 0;"><?= $totalVentas; ?></span>
                        <span class="stat-desc" style="font-size: 10px; color: var(--text-muted); font-weight: 600;">Transacciones totales</span>
                    </div>
                </div>

                <!-- Pago Preferido -->
                <div class="stat-box-card" style="background-color: var(--card-bg); border: var(--border-style); border-radius: 20px; padding: 15px 20px; display: flex; align-items: center; gap: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.02);">
                    <div class="stat-box-icon-circle" style="background-color: #e0f2f1; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-credit-card" style="color: #009688; font-size: 26px;"></i>
                    </div>
                    <div class="stat-box-details" style="display: flex; flex-direction: column;">
                        <span class="stat-name" style="font-size: 13px; font-weight: 700; color: var(--text-dark);">Pago Preferido</span>
                        <span class="stat-number" style="font-size: 24px; font-weight: 800; color: #000000; margin: 2px 0;"><?= htmlspecialchars($metodoPreferido); ?></span>
                        <span class="stat-desc" style="font-size: 10px; color: var(--text-muted); font-weight: 600;">Método más utilizado</span>
                    </div>
                </div>

                <!-- Deudas Activas -->
                <div class="stat-box-card" style="background-color: var(--card-bg); border: var(--border-style); border-radius: 20px; padding: 15px 20px; display: flex; align-items: center; gap: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.02);">
                    <div class="stat-box-icon-circle" style="background-color: #fcdfe5; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-receipt" style="color: #ec4899; font-size: 26px;"></i>
                    </div>
                    <div class="stat-box-details" style="display: flex; flex-direction: column;">
                        <span class="stat-name" style="font-size: 13px; font-weight: 700; color: var(--text-dark);">Fiados Totales</span>
                        <span class="stat-number" style="font-size: 24px; font-weight: 800; color: #000000; margin: 2px 0;">$<?= number_format($totalDeudaActiva, 0, ',', '.'); ?></span>
                        <span class="stat-desc" style="font-size: 10px; color: var(--text-muted); font-weight: 600;">Créditos pendientes</span>
                    </div>
                </div>
            </section>

            <!-- Sales Interactive Workspace (Two Columns) -->
            <section class="sales-grid-layout">
                <!-- Column Left: Select and Add Products + Cart List -->
                <div class="sales-left-column">
                    <!-- Add Product to Cart Card -->
                    <div class="sales-card-box">
                        <h2>Agregar Productos a la Venta</h2>
                        <div class="add-product-row">
                            <!-- Product Selector -->
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
                            <!-- Quantity -->
                            <div class="form-group-item">
                                <label>Cantidad</label>
                                <input type="number" id="productQty" value="1" min="1">
                            </div>
                            <!-- Add Button -->
                            <button type="button" class="btn-add-to-cart" id="addToCartBtn">
                                <i class="fa-solid fa-plus"></i> Agregar
                            </button>
                        </div>
                    </div>

                    <!-- Cart Items Table Card -->
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

                <!-- Column Right: Select Client, Payment Method and Finalize -->
                <div class="sales-right-column">
                    <form action="" method="POST" id="checkoutForm">
                        <input type="hidden" name="action" value="registrar_venta">
                        <!-- Data serialized for POST -->
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

                            <!-- Payment Method Selector -->
                            <div class="form-group-item" style="margin-bottom: 20px;">
                                <label>Método de Pago</label>
                                <select name="metodo_pago" required>
                                    <option value="Efectivo" selected>Efectivo</option>
                                    <option value="Nequi">Nequi / Transferencia</option>
                                    <option value="Tarjeta">Tarjeta de Crédito/Débito</option>
                                    <option value="Crédito">Crédito (Fiado)</option>
                                </select>
                            </div>

                            <!-- Totals Box -->
                            <div class="totals-breakdown">
                                <div class="totals-breakdown-row">
                                    <span>Subtotal:</span>
                                    <span id="subtotalLabel">$0</span>
                                </div>
                                <div class="totals-breakdown-row">
                                    <span>Descuento / IVA:</span>
                                    <span>$0</span>
                                </div>
                                <div class="totals-breakdown-row total-grand">
                                    <span>Total:</span>
                                    <span id="totalLabel">$0</span>
                                </div>
                            </div>

                            <!-- Checkout button -->
                            <button type="submit" class="btn-process-sale" id="processSaleBtn">
                                <i class="fa-solid fa-cash-register"></i> Registrar Venta
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
        const subtotalLabel = document.getElementById('subtotalLabel');
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
                    confirmButtonColor: '#6f2dbd'
                });
                return;
            }

            const id_producto = parseInt(selectedOpt.value);
            const nombre = selectedOpt.text.split('(')[0].trim();
            const precio = parseFloat(selectedOpt.dataset.precio);
            const stock = parseInt(selectedOpt.dataset.stock);
            const codigo = selectedOpt.dataset.codigo;
            const cantidad = parseInt(productQty.value);

            if (isNaN(cantidad) || cantidad <= 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Cantidad inválida',
                    text: 'Por favor ingresa una cantidad mayor que cero.',
                    confirmButtonColor: '#6f2dbd'
                });
                return;
            }

            // Validar stock disponible
            // Buscar si ya existe en el carrito
            const existingItem = cart.find(item => item.id_producto === id_producto);
            const totalQty = existingItem ? (existingItem.cantidad + cantidad) : cantidad;

            if (totalQty > stock) {
                Swal.fire({
                    icon: 'error',
                    title: 'Stock Insuficiente',
                    text: `No hay suficientes unidades de ${nombre}. Stock actual: ${stock}.`,
                    confirmButtonColor: '#6f2dbd'
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
        function deleteCartItem(id_producto) {
            cart = cart.filter(item => item.id_producto !== id_producto);
            updateCartUI();
        }

        // Format money helper
        function formatMoney(amount) {
            return '$' + amount.toLocaleString('es-CO', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
        }

        // Update Cart UI, calculate totals and serialize data
        function updateCartUI() {
            // Remove previous items except headers
            cartTableBody.querySelectorAll('.cart-row-item').forEach(el => el.remove());

            if (cart.length === 0) {
                cartEmptyRow.style.display = '';
                subtotalLabel.textContent = '$0';
                totalLabel.textContent = '$0';
                productosDataInput.value = '[]';
                return;
            }

            cartEmptyRow.style.display = 'none';

            let grandTotal = 0;

            cart.forEach(item => {
                grandTotal += item.subtotal;

                const tr = document.createElement('tr');
                tr.className = 'cart-row-item';
                tr.innerHTML = `
                    <td style="font-weight: 600; color: var(--color-purple);">Cod ${item.codigo}</td>
                    <td><strong>${item.nombre}</strong></td>
                    <td>${item.cantidad}</td>
                    <td>${formatMoney(item.precio)}</td>
                    <td style="font-weight: 700; color: var(--color-purple);">${formatMoney(item.subtotal)}</td>
                    <td class="text-center">
                        <button type="button" class="btn-delete-cart-item" onclick="deleteCartItem(${item.id_producto})">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </td>
                `;
                cartTableBody.appendChild(tr);
            });

            subtotalLabel.textContent = formatMoney(grandTotal);
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
                    confirmButtonColor: '#6f2dbd'
                });
            }
        });
    </script>

    <!-- SweetAlert2 Action Feedback & Print Receipt Prompt -->
    <?php if (!empty($mensaje_exito)): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Venta Registrada!',
                text: '¿Deseas imprimir el comprobante de venta ahora?',
                showCancelButton: true,
                confirmButtonText: 'Sí, imprimir',
                cancelButtonText: 'No, después',
                confirmButtonColor: '#6f2dbd',
                cancelButtonColor: '#ec4899'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open('comprobante.php?id=<?= $venta_id_reciente; ?>', '_blank');
                }
                window.location.href = 'ventas.php';
            });
        </script>
    <?php endif; ?>

</body>

</html>
