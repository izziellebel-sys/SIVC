<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIVC | Sistema de Inventario y Ventas</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    <!-- HEADER -->
    <header class="header">
        <div class="logo-area">
            <div class="logo-icon"><i class="fa-solid fa-basket-shopping"></i></div>
            <div class="logo-name">SIVC</div>
            <div class="header-line"></div>
            <div class="logo-description">Sistema de Inventario y Ventas para Comercios</div>
        </div>

        <nav class="navbar">
            <a href="#inicio" class="nav-link active">Inicio</a>
            <a href="#caracteristicas" class="nav-link">Características</a>
            <a href="#beneficios" class="nav-link">Beneficios</a>
            <a href="#acerca" class="nav-link">Acerca de</a>
            <a href="#contacto" class="nav-link">Contacto</a>
        </nav>

        <a href="../views/login.php" class="login-header-btn"><i class="fa-regular fa-user"></i> Iniciar sesión</a>
    </header>

    <main>
        <!-- HERO SECTION -->
        <section class="hero" id="inicio">
            <div class="hero-content">
                <h1>Controla tu tienda.</h1>
                <h2 class="accent-text">Impulsa tu negocio.</h2>

                <p class="hero-description">
                    SIVC es la solución completa para gestionar tu inventario, controlar tus ventas y hacer crecer tu comercio cada día.
                </p>

                <div class="hero-buttons">
                    <a href="../views/login.php" class="btn btn-primary"><i class="fa-solid fa-store"></i> Iniciar sesión</a>
                    <a href="../views/register.php" class="btn btn-secondary"><i class="fa-solid fa-user-plus"></i> Crear cuenta</a>
                </div>

                <div class="hero-benefits">
                    <span><i class="fa-solid fa-circle-check"></i> Fácil de usar</span>
                    <span><i class="fa-solid fa-cloud"></i> 100% en la nube</span>
                    <span><i class="fa-solid fa-shield-halved"></i> Seguro y confiable</span>
                </div>
            </div>

            <div class="hero-image">
                <img src="img/hero_pos_mockup.jpg?v=<?php echo file_exists(__DIR__ . '/img/hero_pos_mockup.jpg') ? filemtime(__DIR__ . '/img/hero_pos_mockup.jpg') : time(); ?>" 
                     alt="Sistema SIVC en mostrador de tienda de barrio"
                     loading="eager"
                     decoding="async"
                     onerror="if (!this.dataset.step) { this.dataset.step = '1'; this.src = './img/hero_pos_mockup.jpg'; } else if (this.dataset.step === '1') { this.dataset.step = '2'; this.src = 'public/img/hero_pos_mockup.jpg'; } else if (this.dataset.step === '2') { this.dataset.step = '3'; this.src = 'https://cdn.jsdelivr.net/gh/izziellebel-sys/SIVC@main/public/img/hero_pos_mockup.jpg'; } else if (this.dataset.step === '3') { this.dataset.step = '4'; this.src = 'img/store_shelves_illustration.jpg'; }">
            </div>
        </section>

        <!-- CARACTERÍSTICAS -->
        <section class="features" id="caracteristicas">
            <div class="section-title">
                <h2>Todo lo que tu tienda necesita</h2>
                <div class="title-line"></div>
            </div>

            <div class="features-grid">
                <!-- Card 1: Control de Inventario -->
                <article class="feature-card">
                    <div class="feature-icon green"><i class="fa-solid fa-box-open"></i></div>
                    <h3>Control de Inventario</h3>
                    <p>Lleva el control de tus productos en tiempo real y evita quedarte sin stock.</p>
                </article>

                <!-- Card 2: Ventas Rápidas -->
                <article class="feature-card">
                    <div class="feature-icon blue"><i class="fa-solid fa-cart-shopping"></i></div>
                    <h3>Ventas Rápidas</h3>
                    <p>Registra tus ventas de forma ágil y sencilla. Ideal para el día a día de tu negocio.</p>
                </article>

                <!-- Card 3: Reportes Inteligentes -->
                <article class="feature-card">
                    <div class="feature-icon orange"><i class="fa-solid fa-chart-column"></i></div>
                    <h3>Reportes Inteligentes</h3>
                    <p>Consulta tus ganancias, productos más vendidos y mucho más para tomar mejores decisiones.</p>
                </article>

                <!-- Card 4: Clientes -->
                <article class="feature-card">
                    <div class="feature-icon purple"><i class="fa-solid fa-user-group"></i></div>
                    <h3>Clientes</h3>
                    <p>Administra tus clientes y sus compras para brindar un mejor servicio.</p>
                </article>

                <!-- Card 5: Seguro y Confiable -->
                <article class="feature-card">
                    <div class="feature-icon secure-green"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3>Seguro y Confiable</h3>
                    <p>Tu información siempre protegida con los más altos estándares de seguridad.</p>
                </article>
            </div>
        </section>

        <!-- BANNER BENEFICIOS / ACERCA DE -->
        <section class="extra-banner-section" id="beneficios">
            <div class="dark-banner-container">
                <div class="banner-left">
                    <div class="banner-store-icon">
                        <!-- Custom SVG for a small store/shop vector matching the mockup illustration -->
                        <svg class="store-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <!-- Store Roof / Awning -->
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <path d="M9 22V12h6v10"></path>
                            <!-- Roof stripes / details -->
                            <path d="M3 9h18"></path>
                            <path d="M9 9V5a3 3 0 0 1 6 0v4"></path>
                        </svg>
                    </div>
                    <div class="banner-text">
                        <h2>Pensado para comercios pequeños como el tuyo</h2>
                        <p>SIVC facilita las tareas diarias de tu tienda, permitiéndote administrar la información de tu negocio de manera clara, rápida y organizada.</p>
                    </div>
                </div>

                <div class="banner-right">
                    <div class="banner-feature">
                        <div class="b-feat-icon"><i class="fa-regular fa-clock"></i></div>
                        <div class="b-feat-text">
                            <h4>Ahorra tiempo</h4>
                            <p>Automatiza procesos y enfócate en lo que realmente importa.</p>
                        </div>
                    </div>
                    <div class="banner-feature">
                        <div class="b-feat-icon"><i class="fa-solid fa-dollar-sign"></i></div>
                        <div class="b-feat-text">
                            <h4>Reduce pérdidas</h4>
                            <p>Controla tu inventario y evita faltantes o productos vencidos.</p>
                        </div>
                    </div>
                    <div class="banner-feature">
                        <div class="b-feat-icon"><i class="fa-solid fa-chart-line"></i></div>
                        <div class="b-feat-text">
                            <h4>Toma mejores decisiones</h4>
                            <p>Información clara y actualizada para hacer crecer tu negocio.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-brand">
            <div class="footer-icon"><i class="fa-solid fa-basket-shopping"></i></div>
            <div>
                <strong>SIVC - Sistema de Inventario y Ventas para Comercios</strong>
                <p>Hecho para tiendas de barrio, pensado en ti.</p>
            </div>
        </div>

        <div class="footer-copy">
            &copy; <?php echo date("Y"); ?> SIVC. Todos los derechos reservados.
        </div>
    </footer>
</body>
</html>