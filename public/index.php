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
            <a href="#inicio" class="nav-link active"><i class="fa-solid fa-house"></i>Inicio</a>
            <a href="#caracteristicas" class="nav-link"><i class="fa-solid fa-star"></i>Características</a>
            <a href="#beneficios" class="nav-link"><i class="fa-regular fa-circle-check"></i>Beneficios</a>
            <a href="#acerca" class="nav-link"><i class="fa-solid fa-circle-info"></i>Acerca de</a>
        </nav>

        <a href="../views/login.php" class="login-header"><i class="fa-solid fa-right-to-bracket"></i>Iniciar Sesión</a>
    </header>



    <!-- =========================
         HERO / INICIO
    ========================== -->

    <main>

        <section class="hero" id="inicio">

            <!-- LADO IZQUIERDO -->

            <div class="hero-content">

                <span class="welcome">BIENVENIDO A</span>
                <h1>SIVC</h1>
                <h2>Sistema de Inventario y Ventas para</h2>
                <h3>Tiendas de Barrio</h3>

                <p class="hero-description">
                    Lleva el control de tu inventario, administra tus ventas
                    y haz crecer tu negocio de forma simple y eficiente.
                </p>


                <div class="hero-buttons">
                    <a href="../views/login.php" class="btn btn-primary"><i class="fa-solid fa-store"></i>Iniciar Sesión</a>
                    <a href="../views/register.php" class="btn btn-secondary"><i class="fa-solid fa-user-plus"></i>Registrarse</a>
                </div>

                <div class="hero-benefits">
                    <span><i class="fa-solid fa-circle-check"></i>Fácil de usar</span>
                    <span class="dot">•</span>
                    <span>Rápido</span>
                    <span class="dot">•</span>
                    <span>Hecho para tu negocio</span>
                </div>
            </div>

            <!-- IMAGEN DERECHA -->
            <div class="hero-image">
                <img src="img/store_shelves_illustration.jpg" alt="Sistema SIVC utilizado en una tienda de barrio">
            </div>
        </section>



        <!-- CARACTERÍSTICAS -->
        <section class="features" id="caracteristicas">
            <div class="section-title">
                <h2>Todo lo que tu tienda necesita</h2>
                <div class="title-line"></div>
            </div>


            <div class="features-grid">

                <!-- TARJETA 1 -->
                <article class="feature-card">
                    <div class="feature-icon green"><i class="fa-solid fa-box-open"></i></div>
                    <h3>Control de Inventario</h3>

                    <p>
                        Lleva el control de tus productos
                        en tiempo real y evita quedarte
                        sin stock.
                    </p>
                </article>



                <!-- TARJETA 2 -->
                <article class="feature-card">
                    <div class="feature-icon blue"><i class="fa-solid fa-cart-shopping"></i></div>

                    <h3>Ventas Rápidas</h3>

                    <p>
                        Registra tus ventas de forma
                        ágil y sencilla. Ideal para el día
                        a día de tu negocio.
                    </p>
                </article>

                <!-- TARJETA 3 -->
                <article class="feature-card">
                    <div class="feature-icon orange"><i class="fa-solid fa-chart-column"></i></div>

                    <h3>Reportes Útiles</h3>

                    <p>
                        Consulta tus ganancias, productos
                        más vendidos y mucho más para
                        tomar mejores decisiones.
                    </p>
                </article>



                <!-- TARJETA 4 -->
                <article class="feature-card">
                    <div class="feature-icon purple"><i class="fa-solid fa-user-group"></i></div>

                    <h3>Clientes</h3>

                    <p>
                        Administra tus clientes y sus
                        compras para brindar un mejor
                        servicio.
                    </p>
                </article>



                <!-- TARJETA 5 -->
                <article class="feature-card">
                    <div class="feature-icon turquoise"><i class="fa-solid fa-shield-halved"></i></div>

                    <h3>Seguro y Confiable</h3>

                    <p>
                        Tu información siempre protegida
                        para que te enfoques en lo más
                        importante: tu negocio.
                    </p>

                </article>
            </div>
        </section>



        <!-- BENEFICIOS -->

        <section class="extra-section" id="beneficios">
            <div class="extra-content">
                <span>SIVC</span>
                <h2>Controla tu negocio de manera sencilla</h2>

                <p>
                    Organiza productos, registra ventas, consulta información
                    de tus clientes y mantén el control de tu tienda desde
                    un solo sistema.
                </p>
            </div>
        </section>


        <!-- ACERCA DE -->
        <section class="about-section" id="acerca">
            <div>
                <h2>Pensado para comercios pequeños</h2>

                <p>
                    SIVC facilita las tareas diarias de una tienda,
                    permitiendo administrar la información del negocio
                    de manera clara, rápida y organizada.
                </p>

            </div>
        </section>
    </main>



    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-brand">
            <div class="footer-icon"><i class="fa-solid fa-store"></i></div>

            <div>
                <strong>SIVC - Sistema de Inventario y Ventas para Comercios</strong>
                <p>Hecho para tiendas de barrio, pensado en ti.</p>
            </div>
        </div>

        <div class="footer-copy">
            © <?php echo date("Y"); ?> SIVC. Todos los derechos reservados.
        </div>
    </footer>
</body>
</html>