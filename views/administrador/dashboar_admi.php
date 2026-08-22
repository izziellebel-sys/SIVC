<?php
session_start();

// Protección básica de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') { //Sirve para verificar que el usuario este logueado y tenga rol de administrador
    header("Location: ../login.php"); //sirve para redirigir al usuario a la pagina de inicio de sesion
    exit(); //sirve para detener la ejecucion del archivo
}

$nombreUsuario = $_SESSION['usuario'] ?? 'Administrador'; //Sirve para obtener el nombre de usuario
$rolUsuario = $_SESSION['rol'] ?? 'Administrador'; //Sirve para obtener el rol del usuario

// Obtener fecha actual en español
$dias = [
    1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 4 => 'Jueves', //Sirve para obtener el dia de la semana
    5 => 'Viernes', 6 => 'Sábado', 7 => 'Domingo'
];
$meses = [
    1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril', //Sirve para obtener el mes
    5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto', //Sirve para obtener el mes
    9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre' //Sirve para obtener el mes
];
$diaSemana = date('N'); //Sirve para obtener el dia de la semana
$mes = date('n'); //Sirve para obtener el mes
$fechaString = $dias[$diaSemana] . ' ' . date('d') . ' de ' . $meses[$mes]; //Sirve para obtener la fecha actual en español
$horaString = date('h:i a'); //Sirve para obtener la hora actual
?>

<!DOCTYPE html> <!-- Indica que el documento es un documento HTML5 -->
<html lang="es"> <!-- Sirve para especificar el idioma del documento -->

<head>
    <meta charset="UTF-8"> <!-- Sirve para especificar el conjunto de caracteres a utilizar -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Sirve para especificar el viewport -->
    <title>Dashboard Administrador | SIVC</title> <!-- Sirve para especificar el titulo del documento -->

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Sirve para especificar la fuente a utilizar -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <!-- Sirve para especificar la fuente a utilizar -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> <!-- Sirve para especificar la fuente a utilizar -->

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"> <!-- Sirve para especificar los iconos a utilizar -->

    <!-- CSS general -->
    <link rel="stylesheet" href="../css/style.css"> <!-- Sirve para especificar el CSS general -->

    <!-- CSS Dashboard (Cache Busted) -->
    <link rel="stylesheet" href="admi.css/dashboard_admi.css?v=2"> <!-- Sirve para especificar el CSS del dashboard -->
    <?php 
    require_once __DIR__ . '/../../configuration/load_config.php'; //Sirve para incluir el archivo load_config.php
    aplicarConfiguracionEstilos(); //Sirve para aplicar la configuracion de estilos
    ?>
</head> 

<body>

    <div class="dashboard-container"> <!-- Sirve para contener el contenido principal del dashboard -->

        <!-- ==========================================
             SIDEBAR (BARRA LATERAL)
        =========================================== -->
        <aside class="sidebar" id="sidebar"> <!-- Sirve para contener la barra lateral -->
            <!-- Hamburger Menu (Mobile/Aesthetic) -->
            <button class="sidebar-toggle-btn" id="sidebarClose"> <!-- Sirve para abrir y cerrar la barra lateral -->
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Store Logo Section -->
            <div class="sidebar-logo-section"> <!-- Sirve para contener el logo de la tienda -->
                <img src="../../public/img/tienda.png" alt="Doña Marina Logo" class="brand-logo-img">
                <h2 class="brand-title">DOÑA MARINA</h2> <!-- Sirve para mostrar el titulo de la tienda -->
                <span class="brand-subtitle">TIENDA DE BARRIO</span> <!-- Sirve para mostrar el subtitulo de la tienda -->
            </div>

            <!-- Navigation Links -->
            <nav class="sidebar-navigation"> <!-- Sirve para contener los enlaces de navegacion -->
                <a href="inventario.php" class="sidebar-link-card"> <!-- Sirve para redirigir al usuario a la pagina de inventario -->
                    <div class="link-left"> <!-- Sirve para contener el icono y el texto de inventario -->
                        <i class="fa-solid fa-basket-shopping"></i> <!-- Sirve para mostrar el icono de inventario -->
                        <span>Inventario</span> <!-- Sirve para mostrar el texto Inventario -->
                    </div>
                    <span class="link-arrow">></span> <!-- Sirve para mostrar la flecha de navegacion -->
                </a>

                <a href="ventas.php" class="sidebar-link-card"> <!-- Sirve para redirigir al usuario a la pagina de ventas -->
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

            <!-- Sidebar Logout Button -->
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
            <!-- Overlay Mobile Toggle -->
            <button class="mobile-toggle-btn" id="mobileMenu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Top Header & Date Section -->
            <header class="content-header">
                <div class="welcome-header-text">
                    <h1>Bienvenido!</h1>
                    <p>Administra tu tienda de forma fácil y práctica</p>
                </div>

                <div class="datetime-card">
                    <i class="fa-regular fa-calendar-days"></i>
                    <div class="datetime-details">
                        <strong><?= htmlspecialchars($fechaString); ?></strong>
                        <span><?= htmlspecialchars($horaString); ?></span>
                    </div>
                </div>
            </header>

            <!-- Welcome/Promo Organized Banner -->
            <section class="banner-section">
                <div class="welcome-banner">
                    <div class="banner-text">
                        <h2>Tu tienda,<br>siempre <strong>organizada</strong></h2>
                        <p>Controla tu inventario, registra ventas y conoce el crecimiento de tu negocio</p>
                    </div>
                    <div class="banner-image-right">
                        <img src="../../public/img/groceries_basket_banner.jpg" alt="Organized Groceries Basket">
                    </div>
                </div>
            </section>

            <!-- Action Modules Grid (5 Cards) -->
            <section class="actions-grid-section">
                <div class="admin-modules-grid">
                    <!-- INVENTARIO -->
                    <div class="module-card">
                        <div class="module-icon-circle bg-purple">
                            <i class="fa-solid fa-basket-shopping color-purple"></i>
                        </div>
                        <h3>Inventario</h3>
                        <p>Administra tus productos y controla el stock disponible</p>
                        <a href="inventario.php" class="module-action-btn btn-gradient-purple">Ir al Inventario</a>
                    </div>

                    <!-- VENTAS -->
                    <div class="module-card">
                        <div class="module-icon-circle bg-pink">
                            <i class="fa-solid fa-cart-shopping color-pink"></i>
                        </div>
                        <h3>Ventas</h3>
                        <p>Administra tus ventas y lleva el control de tus transacciones</p>
                        <a href="ventas.php" class="module-action-btn btn-gradient-pink">Ir a ventas</a>
                    </div>

                    <!-- CLIENTES -->
                    <div class="module-card">
                        <div class="module-icon-circle bg-blue">
                            <i class="fa-solid fa-users color-blue"></i>
                        </div>
                        <h3>Clientes</h3>
                        <p>Gestiona la informacion de tus clientes y su historial de compras</p>
                        <a href="clientes.php" class="module-action-btn btn-gradient-blue">Ir a clientes</a>
                    </div>

                    <!-- REPORTES -->
                    <div class="module-card">
                        <div class="module-icon-circle bg-magenta">
                            <i class="fa-solid fa-chart-simple color-magenta"></i>
                        </div>
                        <h3>Reportes</h3>
                        <p>consulta reportes y estadisticas para tomar mejores desiciones</p>
                        <a href="reportes.php" class="module-action-btn btn-gradient-magenta">Ir a reportes</a>
                    </div>

                    <!-- CONFIGURACIÓN -->
                    <div class="module-card">
                        <div class="module-icon-circle bg-teal">
                            <i class="fa-solid fa-gear color-teal"></i>
                        </div>
                        <h3>Configuracion</h3>
                        <p>Administra tus productos y controla el stock disponible</p>
                        <a href="configuracion.php" class="module-action-btn btn-gradient-teal">Configurar</a>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Mobile Navigation Drawer Controller JS -->
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

        // ==========================================
        // Highlight Active Sidebar Link
        // ==========================================
        const currentPath = window.location.pathname.split('/').pop();
        const navLinks = document.querySelectorAll('.sidebar-link-card');

        navLinks.forEach(link => {
            const linkPath = link.getAttribute('href');
            if (currentPath === linkPath) {
                link.classList.add('active');
            }
        });
    </script>
</body>

</html>