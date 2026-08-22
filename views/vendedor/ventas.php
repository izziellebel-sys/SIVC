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

// OBTENER VENTAS RECIENTES DEL VENDEDOR ACTIVO (Últimas 5)
$ventasRecientes = $conn->query("SELECT v.*, u.nombre as cliente_nombre, u.apellido as cliente_apellido 
                                FROM venta v 
                                LEFT JOIN cliente c ON v.id_Cliente = c.id_Cliente 
                                LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento 
                                WHERE v.id_Usuario = $id_usuario
                                ORDER BY v.id_Venta DESC LIMIT 5");

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

    <!-- CSS Dashboard (reutilizado) -->
    <link rel="stylesheet" href="../administrador/admi.css/dashboard_admi.css?v=5">
    <link rel="stylesheet" href="css/ventas.css?v=5">
    
    
    <!-- Estilo local para alinear y redimensionar la ilustración del encabezado -->
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
    </style>
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
                <a href="dashboard_vendedor.php" class="sidebar-link-card">
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

                <a href="ventas.php" class="sidebar-link-card active">
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
            <!-- Mobile Toggle Menu Drawer -->
            <button class="mobile-toggle-btn" id="mobileMenu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Header Section -->
            <header class="header-with-illustration">
                <div class="welcome-header-text">
                    <h1 style="font-size: 56px; font-weight: 800; color: #000000; margin: 0;">Ventas (POS)</h1>
                </div>
                <div class="header-illustration">
                    <img src="../../public/img/store_shelves_illustration.jpg" alt="Illustration" class="header-illustration-img">
                </div>
            </header>

            <!-- Stats Row (4 Cards) -->
            <section class="inventory-stats-row" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px;">
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
                                    <span>Descuento / IVA</span>
                                    <span>$0</span>
                                </div>
                                <div class="totals-breakdown-row total-grand">
                                    <span>Total</span>
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

            <!-- Historial de Ventas Recientes -->
            <section class="sales-history-card">
                <div class="card-header">
                    <h2>Mis Ventas Recientes</h2>
                </div>
                <div style="overflow-x: auto;">
                    <table class="sales-history-table">
                        <thead>
                            <tr>
                                <th>Venta ID</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total Venta</th>
                                <th>Método Pago</th>
                                <th>Estado</th>
                                <th>Acciones</th>
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
                                        <td><?= htmlspecialchars($cliente_nom); ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($row['fecha_Venta'])); ?></td>
                                        <td style="font-weight: 700;">$<?= number_format($row['total'], 0, ',', '.'); ?></td>
                                        <td><?= htmlspecialchars($row['metodo_Pago']); ?></td>
                                        <td>
                                            <span style="background-color:#d4edda; color:#155724; padding: 4px 8px; border-radius: 8px; font-size:11px; font-weight:700;">
                                                <?= htmlspecialchars($row['estado']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn-action" title="Imprimir Comprobante" onclick="imprimirComprobante(<?= $row['id_Venta']; ?>)">
                                                <i class="fa-solid fa-print"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 20px;">
                                        No has registrado ventas recientemente.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
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

            labelSubtotal.innerText = '$' + grandTotal.toLocaleString('es-CO');
            labelTotal.innerText = '$' + grandTotal.toLocaleString('es-CO');
            productosDataInput.value = JSON.stringify(cart);
        }

        // Validar envío
        checkoutForm.addEventListener('submit', (e) => {
            if (cart.length === 0) {
                e.preventDefault();
                Swal.fire('Carrito vacío', 'Agrega productos a la compra antes de registrarla.', 'warning');
            }
        });

        // Imprimir Comprobante
        function imprimirComprobante(id) {
            const url = `../administrador/comprobante.php?id=${id}`;
            const win = window.open(url, '_blank');
            win.focus();
        }

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
                <?php endif; ?>
                // Limpiar query string
                window.location.href = 'ventas.php';
            });
        <?php endif; ?>
    </script>
</body>

</html>
