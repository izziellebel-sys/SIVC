<?php
session_start();

// Protección básica de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Cliente') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/load_config.php';

$nombreUsuario = $_SESSION['usuario'] ?? 'Cliente';
$rolUsuario = $_SESSION['rol'] ?? 'Cliente';
$nombreCompleto = $_SESSION['nombre'] ?? 'Cliente SIVC';
$id_Usuario = $_SESSION['id_Usuario'];

// 1. Obtener el número de documento de la tabla usuarios
$stmt = $conn->prepare("SELECT numero_Documento FROM usuarios WHERE id_Usuario = ?");
$stmt->bind_param("i", $id_Usuario);
$stmt->execute();
$res = $stmt->get_result();
$userRow = $res->fetch_assoc();
$stmt->close();

$documento = $userRow['numero_Documento'] ?? '';

// 2. Obtener el id_Cliente de la tabla cliente
$id_Cliente = null;
if (!empty($documento)) {
    $stmt = $conn->prepare("SELECT id_Cliente, nombre, apellido FROM cliente WHERE numero_Documento = ?");
    $stmt->bind_param("s", $documento);
    $stmt->execute();
    $res = $stmt->get_result();
    $clientRow = $res->fetch_assoc();
    $stmt->close();
    if ($clientRow) {
        $id_Cliente = $clientRow['id_Cliente'];
        $nombreCompleto = $clientRow['nombre'] . ' ' . $clientRow['apellido'];
    }
}

// Inicializar variables de datos
$compras = [];
$deudas = [];
$abonos = [];
$total_compras_realizadas = 0;
$total_monto_compras = 0.0;
$total_deuda_pendiente = 0.0;

if ($id_Cliente) {
    // 3. Consultar Historial de Compras
    $query = "SELECT id_Venta, fecha_Venta, subtotal, descuento, total, metodo_Pago, estado FROM venta WHERE id_Cliente = ? ORDER BY fecha_Venta DESC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_Cliente);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc()) {
        $compras[] = $row;
    }
    $stmt->close();

    // 4. Consultar Total de Deuda
    $query = "SELECT id_Deuda, fecha_Registro, valor_Inicial, saldo_Pendiente, estado FROM deuda WHERE id_Cliente = ? ORDER BY fecha_Registro DESC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_Cliente);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc()) {
        $deudas[] = $row;
        if ($row['estado'] !== 'Pagado') {
            $total_deuda_pendiente += floatval($row['saldo_Pendiente']);
        }
    }
    $stmt->close();

    // 5. Historial de Abonos
    $query = "SELECT a.fecha_Abono, a.valor_Abonado, d.id_Deuda, d.valor_Inicial 
              FROM abono a 
              JOIN deuda d ON a.id_Deuda = d.id_Deuda 
              WHERE d.id_Cliente = ? 
              ORDER BY a.fecha_Abono DESC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_Cliente);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc()) {
        $abonos[] = $row;
    }
    $stmt->close();

    // 6. Consultas (Estadísticas globales)
    $total_compras_realizadas = count($compras);
    foreach ($compras as $c) {
        $total_monto_compras += floatval($c['total']);
    }
}

// Determinar la sección activa
$section = $_GET['section'] ?? 'dashboard';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Cliente | SIVC</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS general -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- CSS Dashboard -->
    <link rel="stylesheet" href="css/dashboard_cliente.css">
    
    <!-- Cargar configuración de base de datos -->
    <?php aplicarConfiguracionEstilos(); ?>
</head>

<body>

    <div class="dashboard-container">

        <!-- ==========================================
             SIDEBAR
        =========================================== -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="dashboard_cliente.php" class="brand">
                    <div class="brand-icon">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <div class="brand-text">
                        <span class="brand-name">SIVC</span>
                        <span class="brand-subtitle">Módulo Cliente</span>
                    </div>
                </a>
                <button class="sidebar-close" id="sidebarClose">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- PERFIL -->
            <div class="user-profile">
                <div class="user-avatar"><?= strtoupper(substr($nombreUsuario, 0, 1)); ?></div>
                <div class="user-info">
                    <strong><?= htmlspecialchars($nombreUsuario); ?></strong>
                    <span><?= htmlspecialchars($rolUsuario); ?></span>
                </div>
            </div>

            <!-- NAVEGACIÓN -->
            <nav class="sidebar-nav">
                <p class="nav-title">MENÚ PRINCIPAL</p>

                <a href="dashboard_cliente.php?section=dashboard" class="nav-item <?= $section === 'dashboard' ? 'active' : ''; ?>">
                    <span class="nav-icon"><i class="fa-solid fa-chart-pie"></i></span>
                    <span>Dashboard Cliente</span>
                </a>

                <a href="dashboard_cliente.php?section=compras" class="nav-item <?= $section === 'compras' ? 'active' : ''; ?>">
                    <span class="nav-icon"><i class="fa-solid fa-bag-shopping"></i></span>
                    <span>Mis Compras</span>
                </a>

                <a href="dashboard_cliente.php?section=deudas" class="nav-item <?= $section === 'deudas' ? 'active' : ''; ?>">
                    <span class="nav-icon"><i class="fa-solid fa-hand-holding-dollar"></i></span>
                    <span>Mis Deudas</span>
                </a>

                <a href="dashboard_cliente.php?section=consultas" class="nav-item <?= $section === 'consultas' ? 'active' : ''; ?>">
                    <span class="nav-icon"><i class="fa-solid fa-magnifying-glass-chart"></i></span>
                    <span>Consultas</span>
                </a>
            </nav>

            <!-- SIDEBAR FOOTER -->
            <div class="sidebar-footer">
                <a href="../../controllers/logout.php" class="logout-link">
                    <span class="nav-icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                    <span>Cerrar sesión</span>
                </a>
            </div>
        </aside>

        <!-- ==========================================
             CONTENIDO PRINCIPAL
        =========================================== -->
        <main class="main-content">

            <!-- TOPBAR -->
            <header class="topbar">
                <button class="mobile-menu" id="mobileMenu">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="breadcrumb">
                    <span>SIVC</span>
                    <i class="fa-solid fa-chevron-right"></i>
                    <strong>
                        <?php
                        if ($section === 'compras') echo "Mis Compras";
                        elseif ($section === 'deudas') echo "Mis Deudas";
                        elseif ($section === 'consultas') echo "Consultas";
                        else echo "Dashboard Cliente";
                        ?>
                    </strong>
                </div>

                <div class="topbar-actions">
                    <div class="topbar-user">
                        <div class="topbar-avatar">
                            <?= strtoupper(substr($nombreUsuario, 0, 1)); ?>
                        </div>
                        <div class="topbar-user-info">
                            <strong><?= htmlspecialchars($nombreCompleto); ?></strong>
                            <span><?= htmlspecialchars($rolUsuario); ?></span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- CONTENIDO PRINCIPAL SEGÚN LA SECCIÓN -->
            <section class="dashboard-content">

                <!-- 1. SECCIÓN: DASHBOARD GENERAL -->
                <?php if ($section === 'dashboard'): ?>
                    <div class="welcome-section">
                        <div>
                            <span class="welcome-label">PORTAL DE CLIENTES SIVC</span>
                            <h1>¡Hola de nuevo, <?= htmlspecialchars($nombreCompleto); ?>!</h1>
                            <p>Aquí tienes un resumen de tus movimientos, compras y saldos en nuestro sistema.</p>
                        </div>
                        <div class="current-date">
                            <i class="fa-regular fa-calendar"></i>
                            <span><?= date('d/m/Y'); ?></span>
                        </div>
                    </div>

                    <div class="stats-grid">
                        <!-- TOTAL COMPRAS -->
                        <div class="stat-card" onclick="location.href='dashboard_cliente.php?section=compras'" style="cursor: pointer;">
                            <div class="stat-card-top">
                                <div class="stat-icon sales-icon">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </div>
                                <span class="stat-label">Mis compras realizadas</span>
                            </div>
                            <div class="stat-value"><?= $total_compras_realizadas; ?></div>
                            <div class="stat-footer">
                                <span>Ver historial detallado</span>
                            </div>
                        </div>

                        <!-- TOTAL DEUDA -->
                        <div class="stat-card" onclick="location.href='dashboard_cliente.php?section=deudas'" style="cursor: pointer;">
                            <div class="stat-card-top">
                                <div class="stat-icon products-icon" style="background-color: #ffebee; color: #f44336;">
                                    <i class="fa-solid fa-hand-holding-dollar"></i>
                                </div>
                                <span class="stat-label">Deuda total pendiente</span>
                            </div>
                            <div class="stat-value" style="color: #f44336;">$<?= number_format($total_deuda_pendiente, 0, ',', '.'); ?></div>
                            <div class="stat-footer">
                                <span>Ver historial de abonos</span>
                            </div>
                        </div>

                        <!-- TOTAL GASTADO -->
                        <div class="stat-card" onclick="location.href='dashboard_cliente.php?section=consultas'" style="cursor: pointer;">
                            <div class="stat-card-top">
                                <div class="stat-icon clients-icon" style="background-color: #e8f5e9; color: #4caf50;">
                                    <i class="fa-solid fa-wallet"></i>
                                </div>
                                <span class="stat-label">Total compras en dinero</span>
                            </div>
                            <div class="stat-value" style="color: #4caf50;">$<?= number_format($total_monto_compras, 0, ',', '.'); ?></div>
                            <div class="stat-footer">
                                <span>Ver estadísticas de compras</span>
                            </div>
                        </div>
                    </div>

                    <!-- RESUMEN RECIENTE -->
                    <div class="dashboard-grid" style="grid-template-columns: 1fr; margin-top: 30px;">
                        <div class="recent-sales-card">
                            <div class="card-header">
                                <h2>Últimas Compras Realizadas</h2>
                                <a href="dashboard_cliente.php?section=compras" class="btn-view-all">Ver todo</a>
                            </div>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID Venta</th>
                                            <th>Fecha</th>
                                            <th>Método de Pago</th>
                                            <th>Estado</th>
                                            <th class="text-right">Total</th>
                                            <th class="text-center">Comprobante</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($compras)): ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center; color: #777; padding: 25px;">
                                                    Aún no tienes compras registradas en el sistema.
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <?php
                                            $recent_compras = array_slice($compras, 0, 3);
                                            foreach ($recent_compras as $compra):
                                            ?>
                                                <tr>
                                                    <td><strong>#<?= htmlspecialchars($compra['id_Venta']); ?></strong></td>
                                                    <td><?= date('d/m/Y h:i A', strtotime($compra['fecha_Venta'])); ?></td>
                                                    <td><?= htmlspecialchars($compra['metodo_Pago']); ?></td>
                                                    <td>
                                                        <span class="status-badge status-<?= strtolower($compra['estado']) === 'completado' ? 'paid' : 'pending'; ?>">
                                                            <?= htmlspecialchars($compra['estado']); ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-right"><strong>$<?= number_format($compra['total'], 0, ',', '.'); ?></strong></td>
                                                    <td class="text-center">
                                                        <a href="comprobante.php?id=<?= $compra['id_Venta']; ?>" target="_blank" class="btn-action-icon" style="color: var(--primary-color); font-size: 18px;" title="Ver Comprobante">
                                                            <i class="fa-solid fa-file-pdf"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                <!-- 2. SECCIÓN: MIS COMPRAS -->
                <?php elseif ($section === 'compras'): ?>
                    <div class="welcome-section">
                        <div>
                            <span class="welcome-label">HISTORIAL DE TRANSACCIONES</span>
                            <h1>Mis Compras Realizadas</h1>
                            <p>Consulta el historial completo de tus compras y descarga los comprobantes correspondientes.</p>
                        </div>
                    </div>

                    <div class="dashboard-grid" style="grid-template-columns: 1fr;">
                        <div class="recent-sales-card">
                            <div class="card-header">
                                <h2>Historial Completo de Compras</h2>
                            </div>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID Venta</th>
                                            <th>Fecha y Hora</th>
                                            <th>Subtotal</th>
                                            <th>Descuento</th>
                                            <th>Total</th>
                                            <th>Método de Pago</th>
                                            <th>Estado</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($compras)): ?>
                                            <tr>
                                                <td colspan="8" style="text-align: center; color: #777; padding: 40px;">
                                                    <i class="fa-solid fa-receipt" style="font-size: 40px; color: #ccc; display: block; margin-bottom: 10px;"></i>
                                                    No se encontraron compras registradas a tu nombre.
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($compras as $compra): ?>
                                                <tr>
                                                    <td><strong>#<?= htmlspecialchars($compra['id_Venta']); ?></strong></td>
                                                    <td><?= date('d/m/Y h:i A', strtotime($compra['fecha_Venta'])); ?></td>
                                                    <td>$<?= number_format($compra['subtotal'], 0, ',', '.'); ?></td>
                                                    <td>-$<?= number_format($compra['descuento'], 0, ',', '.'); ?></td>
                                                    <td><strong>$<?= number_format($compra['total'], 0, ',', '.'); ?></strong></td>
                                                    <td><?= htmlspecialchars($compra['metodo_Pago']); ?></td>
                                                    <td>
                                                        <span class="status-badge status-<?= strtolower($compra['estado']) === 'completado' ? 'paid' : 'pending'; ?>">
                                                            <?= htmlspecialchars($compra['estado']); ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                         <a href="comprobante.php?id=<?= $compra['id_Venta']; ?>" target="_blank" class="btn-action-view" style="display: inline-flex; align-items: center; gap: 5px; padding: 6px 15px; border-radius: 20px; background: var(--primary-light); color: var(--primary-color); text-decoration: none; font-size: 13px; font-weight: 600;">
                                                            <i class="fa-solid fa-download"></i> Comprobante
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                <!-- 3. SECCIÓN: MIS DEUDAS -->
                <?php elseif ($section === 'deudas'): ?>
                    <div class="welcome-section">
                        <div>
                            <span class="welcome-label">ESTADO DE CARTERA</span>
                            <h1>Mis Deudas y Abonos</h1>
                            <p>Consulta el total de tu saldo pendiente e historial de abonos realizados.</p>
                        </div>
                    </div>

                    <div class="stats-grid" style="grid-template-columns: 1fr; margin-bottom: 25px;">
                        <div class="stat-card" style="max-width: 400px;">
                            <div class="stat-card-top">
                                <div class="stat-icon products-icon" style="background-color: #ffebee; color: #f44336;">
                                    <i class="fa-solid fa-hand-holding-dollar"></i>
                                </div>
                                <span class="stat-label">Saldo de Deuda Pendiente</span>
                            </div>
                            <div class="stat-value" style="color: #f44336;">$<?= number_format($total_deuda_pendiente, 0, ',', '.'); ?></div>
                            <div class="stat-footer">
                                <span>Por favor, ponte en contacto con la tienda para realizar abonos.</span>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-grid" style="grid-template-columns: 1fr 1fr; gap: 20px; align-items: start;">
                        <!-- LISTA DE DEUDAS -->
                        <div class="recent-sales-card">
                            <div class="card-header">
                                <h2>Mis Cuentas Pendientes (Deudas)</h2>
                            </div>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Fecha Registro</th>
                                            <th class="text-right">Valor Inicial</th>
                                            <th class="text-right">Saldo Pendiente</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($deudas)): ?>
                                            <tr>
                                                <td colspan="4" style="text-align: center; color: #777; padding: 25px;">
                                                    No tienes deudas registradas en el sistema.
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($deudas as $deuda): ?>
                                                <tr>
                                                    <td><?= date('d/m/Y', strtotime($deuda['fecha_Registro'])); ?></td>
                                                    <td class="text-right">$<?= number_format($deuda['valor_Inicial'], 0, ',', '.'); ?></td>
                                                    <td class="text-right" style="color: #f44336; font-weight: 700;">$<?= number_format($deuda['saldo_Pendiente'], 0, ',', '.'); ?></td>
                                                    <td>
                                                        <span class="status-badge status-<?= $deuda['estado'] === 'Pagado' ? 'paid' : 'pending'; ?>">
                                                            <?= htmlspecialchars($deuda['estado']); ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- HISTORIAL DE ABONOS -->
                        <div class="recent-sales-card">
                            <div class="card-header">
                                <h2>Historial de Abonos Realizados</h2>
                            </div>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Fecha Abono</th>
                                            <th>Deuda Referencia</th>
                                            <th class="text-right">Valor Abonado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($abonos)): ?>
                                            <tr>
                                                <td colspan="3" style="text-align: center; color: #777; padding: 25px;">
                                                    Aún no has realizado abonos en el sistema.
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($abonos as $abono): ?>
                                                <tr>
                                                    <td><?= date('d/m/Y h:i A', strtotime($abono['fecha_Abono'])); ?></td>
                                                    <td>Cuenta por $<?= number_format($abono['valor_Inicial'], 0, ',', '.'); ?></td>
                                                    <td class="text-right" style="color: #4caf50; font-weight: 700;">+$<?= number_format($abono['valor_Abonado'], 0, ',', '.'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                <!-- 4. SECCIÓN: CONSULTAS -->
                <?php elseif ($section === 'consultas'): ?>
                    <div class="welcome-section">
                        <div>
                            <span class="welcome-label">MIS ESTADÍSTICAS</span>
                            <h1>Consultas y Estadísticas</h1>
                            <p>Consulta el consolidado general de tus transacciones y valores acumulados.</p>
                        </div>
                    </div>

                    <div class="dashboard-grid" style="grid-template-columns: 1fr;">
                        <div class="recent-sales-card">
                            <div class="card-header">
                                <h2>Consolidado General de Consumos</h2>
                            </div>
                            <div style="padding: 30px;">
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; text-align: center;">
                                    <div style="background-color: #f9f9f9; padding: 25px; border-radius: 15px; border: 1px solid #eee;">
                                        <i class="fa-solid fa-receipt" style="font-size: 32px; color: var(--primary-color); margin-bottom: 10px;"></i>
                                        <h3 style="margin: 0; color: #555; font-size: 14px; font-weight: 500;">Compras Realizadas</h3>
                                        <div style="font-size: 28px; font-weight: 700; color: var(--primary-color); margin-top: 5px;"><?= $total_compras_realizadas; ?></div>
                                    </div>

                                    <div style="background-color: #f9f9f9; padding: 25px; border-radius: 15px; border: 1px solid #eee;">
                                        <i class="fa-solid fa-wallet" style="font-size: 32px; color: #4caf50; margin-bottom: 10px;"></i>
                                        <h3 style="margin: 0; color: #555; font-size: 14px; font-weight: 500;">Monto Total Facturado</h3>
                                        <div style="font-size: 28px; font-weight: 700; color: #4caf50; margin-top: 5px;">$<?= number_format($total_monto_compras, 0, ',', '.'); ?></div>
                                    </div>

                                    <div style="background-color: #f9f9f9; padding: 25px; border-radius: 15px; border: 1px solid #eee;">
                                        <i class="fa-solid fa-calculator" style="font-size: 32px; color: #0288d1; margin-bottom: 10px;"></i>
                                        <h3 style="margin: 0; color: #555; font-size: 14px; font-weight: 500;">Promedio por Compra</h3>
                                        <div style="font-size: 28px; font-weight: 700; color: #0288d1; margin-top: 5px;">
                                            $<?= $total_compras_realizadas > 0 ? number_format($total_monto_compras / $total_compras_realizadas, 0, ',', '.') : 0; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </section>

            <!-- FOOTER -->
            <footer class="dashboard-footer">
                <span>© <?= date('Y'); ?> SIVC</span>
                <span>Sistema Integral de Ventas y Control</span>
            </footer>
        </main>
    </div>

    <!-- OVERLAY MOBILE -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- JAVASCRIPT -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebarClose = document.getElementById('sidebarClose');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.add('open');
            sidebarOverlay.classList.add('active');
        }

        function closeSidebar() {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.remove('active');
        }

        mobileMenu.addEventListener('click', openSidebar);
        sidebarClose.addEventListener('click', closeSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);
    </script>
</body>

</html>
