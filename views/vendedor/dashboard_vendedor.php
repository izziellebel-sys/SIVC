<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/load_config.php';
require_once __DIR__ . '/../../models/vendedor_model.php';

$nombreUsuario = $_SESSION['usuario'] ?? 'Vendedor';
$rolUsuario = $_SESSION['rol'] ?? 'Vendedor';
$id_usuario = $_SESSION['id_Usuario'] ?? 0;

// Cargar estadísticas dinámica usando el modelo
$model = new VendedorModel();
$stats = $model->obtenerEstadisticasDashboard($id_usuario);

$ventasHoy = $stats['ventas_hoy'];
$productos = $stats['productos_activos'];
$clientes = $stats['clientes_registrados'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Vendedor | SIVC</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS general -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- CSS Dashboard & Sidebar -->
    <link rel="stylesheet" href="../administrador/admi.css/dashboard_admi.css?v=5">
    
    
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
                <a href="dashboard_vendedor.php" class="sidebar-link-card active">
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
            <!-- Mobile Toggle menu drawer -->
            <button class="mobile-toggle-btn" id="mobileMenu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Header Section -->
            <header class="header-with-illustration">
                <div class="welcome-header-text">
                    <span class="welcome-label">PANEL DE VENTA</span>
                    <h1 style="font-size: 56px; font-weight: 800; color: #000000; margin: 0;">Hola, <?= htmlspecialchars($nombreUsuario); ?></h1>
                    <p style="font-size: 16px; color: #555555; font-weight: 500; margin-top: 5px;">Aquí tienes un resumen rápido de las operaciones del negocio.</p>
                </div>
                <div class="header-illustration">
                    <img src="../../public/img/store_shelves_illustration.jpg" alt="Illustration" class="header-illustration-img">
                </div>
            </header>

            <!-- Stats Cards Grid -->
            <section class="dashboard-stats-row" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-bottom: 30px;">
                <!-- MIS VENTAS HOY -->
                <div class="stat-box-card" style="background-color: var(--card-bg); border: var(--border-style); border-radius: 20px; padding: 22px; display: flex; align-items: center; gap: 20px; box-shadow: 0 4px 12px rgba(111,45,189,0.02);">
                    <div class="stat-box-icon-circle" style="background-color: #ffd6ff; width: 52px; height: 52px; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 22px;">
                        <i class="fa-solid fa-chart-line" style="color: var(--color-pink);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name" style="font-size: 13px; font-weight: 700; color: var(--text-muted); margin-bottom: 4px;">Mis ventas hoy</span>
                        <span class="stat-number" style="font-size: 26px; font-weight: 800; color: var(--text-dark); line-height: 1; margin-bottom: 4px;">$<?= number_format($ventasHoy, 0, ',', '.'); ?></span>
                        <span class="stat-desc" style="font-size: 11px; font-weight: 600; color: var(--text-muted);">Ventas completadas</span>
                    </div>
                </div>

                <!-- PRODUCTOS -->
                <div class="stat-box-card" style="background-color: var(--card-bg); border: var(--border-style); border-radius: 20px; padding: 22px; display: flex; align-items: center; gap: 20px; box-shadow: 0 4px 12px rgba(111,45,189,0.02);">
                    <div class="stat-box-icon-circle" style="background-color: #ffd8eb; width: 52px; height: 52px; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 22px;">
                        <i class="fa-solid fa-boxes-stacked" style="color: var(--color-magenta);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name" style="font-size: 13px; font-weight: 700; color: var(--text-muted); margin-bottom: 4px;">Productos activos</span>
                        <span class="stat-number" style="font-size: 26px; font-weight: 800; color: var(--text-dark); line-height: 1; margin-bottom: 4px;"><?= $productos; ?></span>
                        <span class="stat-desc" style="font-size: 11px; font-weight: 600; color: var(--text-muted);">Stock de inventario</span>
                    </div>
                </div>

                <!-- CLIENTES -->
                <div class="stat-box-card" style="background-color: var(--card-bg); border: var(--border-style); border-radius: 20px; padding: 22px; display: flex; align-items: center; gap: 20px; box-shadow: 0 4px 12px rgba(111,45,189,0.02);">
                    <div class="stat-box-icon-circle" style="background-color: #e2e2ff; width: 52px; height: 52px; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 22px;">
                        <i class="fa-solid fa-users" style="color: var(--color-blue);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name" style="font-size: 13px; font-weight: 700; color: var(--text-muted); margin-bottom: 4px;">Clientes</span>
                        <span class="stat-number" style="font-size: 26px; font-weight: 800; color: var(--text-dark); line-height: 1; margin-bottom: 4px;"><?= $clientes; ?></span>
                        <span class="stat-desc" style="font-size: 11px; font-weight: 600; color: var(--text-muted);">Cartera registrada</span>
                    </div>
                </div>
            </section>

            <!-- ACCIONES RÁPIDAS -->
            <section class="quick-actions-section" style="background-color: var(--card-bg); border: var(--border-style); border-radius: 20px; padding: 25px; box-shadow: 0 4px 12px rgba(111,45,189,0.02);">
                <h2 style="font-size: 18px; font-weight: 800; color: var(--color-purple); margin-bottom: 20px; border-bottom: 2px dashed #ebd0f0; padding-bottom: 10px;">ACCIONES RÁPIDAS</h2>
                
                <div class="quick-actions-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
                    <!-- Nueva Venta -->
                    <a href="ventas.php" class="quick-action-link" style="display: flex; align-items: center; justify-content: space-between; padding: 22px; border: 2px solid #ebd0f0; border-radius: 16px; text-decoration: none; color: inherit; transition: var(--transition);">
                        <div style="display: flex; align-items: center; gap: 20px;">
                            <div style="width: 44px; height: 44px; border-radius: 12px; background-color: #ffd8eb; color: var(--color-pink); display: flex; align-items: center; justify-content: center; font-size: 20px;">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                            <div>
                                <strong style="font-size: 15px; color: var(--text-dark);">Registrar Venta</strong><br>
                                <span style="font-size: 11px; color: var(--text-muted); font-weight:600;">Ingresar un cobro nuevo</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-chevron-right" style="color: var(--color-purple);"></i>
                    </a>

                    <!-- Consultar Stock -->
                    <a href="inventario.php" class="quick-action-link" style="display: flex; align-items: center; justify-content: space-between; padding: 22px; border: 2px solid #ebd0f0; border-radius: 16px; text-decoration: none; color: inherit; transition: var(--transition);">
                        <div style="display: flex; align-items: center; gap: 20px;">
                            <div style="width: 44px; height: 44px; border-radius: 12px; background-color: #ffd6ff; color: var(--color-purple); display: flex; align-items: center; justify-content: center; font-size: 20px;">
                                <i class="fa-solid fa-basket-shopping"></i>
                            </div>
                            <div>
                                <strong style="font-size: 15px; color: var(--text-dark);">Consultar Stock</strong><br>
                                <span style="font-size: 11px; color: var(--text-muted); font-weight:600;">Revisar disponibilidad</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-chevron-right" style="color: var(--color-purple);"></i>
                    </a>

                    <!-- Clientes & Fiados -->
                    <a href="clientes.php" class="quick-action-link" style="display: flex; align-items: center; justify-content: space-between; padding: 22px; border: 2px solid #ebd0f0; border-radius: 16px; text-decoration: none; color: inherit; transition: var(--transition);">
                        <div style="display: flex; align-items: center; gap: 20px;">
                            <div style="width: 44px; height: 44px; border-radius: 12px; background-color: #e2e2ff; color: var(--color-blue); display: flex; align-items: center; justify-content: center; font-size: 20px;">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div>
                                <strong style="font-size: 15px; color: var(--text-dark);">Clientes & Fiados</strong><br>
                                <span style="font-size: 11px; color: var(--text-muted); font-weight:600;">Registrar abonos y deudas</span>
                            </div>
                        </div>
                        <i class="fa-solid fa-chevron-right" style="color: var(--color-purple);"></i>
                    </a>
                </div>
            </section>
        </main>
    </div>

    <!-- JS Mobile Toggle Drawerhjcc -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebarClose = document.getElementById('sidebarClose');

        mobileMenu.addEventListener('click', () => sidebar.classList.add('open'));
        sidebarClose.addEventListener('click', () => sidebar.classList.remove('open'));
    </script>
</body>

</html>
