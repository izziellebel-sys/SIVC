<?php
$error = $_GET['error'] ?? '';
$registro = $_GET['registro'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión | SIVC</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="./css/login.css?v=<?php echo time(); ?>">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
    <!-- Google Fonts (Inter & Pacifico) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    <!-- BACKGROUND WRAPPER -->
    <div class="login-wrapper">
        
        <!-- HEADER -->
        <header class="login-header">
            <div class="header-logo">
                <i class="fa-solid fa-basket-shopping logo-icon"></i>
                <span class="logo-text">SIVC</span>
                <div class="divider"></div>
                <span class="logo-tagline">Sistema Integral de Ventas y Control de Inventario</span>
            </div>
        </header>

        <!-- MAIN LAYOUT -->
        <main class="login-main">
            <!-- Left Info Panel -->
            <div class="info-section">
                <h1 class="info-title">
                    Tu tienda,<br>
                    <span class="accent-text">bajo control.</span>
                </h1>
                <p class="info-desc">
                    Con SIVC administra tu inventario, controla tus ventas y haz crecer tu negocio cada día.
                </p>
                <div class="feature-badges">
                    <div class="badge">
                        <i class="fa-solid fa-shield-halved badge-icon"></i>
                        <span>Seguro</span>
                    </div>
                    <div class="badge">
                        <i class="fa-regular fa-clock badge-icon"></i>
                        <span>Rápido</span>
                    </div>
                    <div class="badge">
                        <i class="fa-solid fa-chart-column badge-icon"></i>
                        <span>Eficiente</span>
                    </div>
                </div>
            </div>

            <!-- Right Card Panel -->
            <div class="card-section">
                <div class="login-card">
                    <!-- Card Header -->
                    <div class="card-header">
                        <div class="card-logo-badge">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </div>
                        <div class="card-header-text">
                            <h2>SIVC</h2>
                            <p>Sistema Integral de Ventas y Control de Inventario</p>
                        </div>
                    </div>
                    
                    <div class="accent-line"></div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <h3>¡Qué bueno verte de nuevo!</h3>
                        <p class="subtitle">Ingresa a tu cuenta para continuar.</p>

                        <form action="../controllers/auth/login_controler.php" method="POST">
                            <div class="form-group">
                                <label for="usuario">Usuario o correo electrónico</label>
                                <div class="input-container">
                                    <i class="fa-regular fa-user field-icon"></i>
                                    <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu usuario o correo" required autocomplete="username">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <div class="input-container">
                                    <i class="fa-solid fa-lock field-icon"></i>
                                    <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña" required autocomplete="current-password">
                                    <i class="fa-regular fa-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="form-options">
                                <label class="checkbox-container">
                                    <input type="checkbox" name="remember" id="remember">
                                    <span class="checkmark"></span>
                                    <span class="label-text">Recordarme</span>
                                </label>
                                <a href="#" class="forgot-link">¿Olvidaste tu contraseña?</a>
                            </div>

                            <button type="submit" class="btn-submit">
                                Iniciar sesión
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </form>

                        <div class="separator">
                            <span class="separator-line"></span>
                            <span class="separator-text">o</span>
                            <span class="separator-line"></span>
                        </div>

                        <button class="btn-google">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google logo" class="google-icon">
                            Continuar con Google
                        </button>

                        <div class="card-footer">
                            <span>¿Aún no tienes una cuenta?</span>
                            <a href="register.php" class="register-link">Crear cuenta</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- FOOTER -->
        <footer class="login-footer">
            <div class="footer-left">
                <i class="fa-solid fa-shield-halved footer-icon"></i>
                <span>Tus datos están protegidos con altos estándares de seguridad.</span>
            </div>
            <div class="footer-right">
                <span>&copy; <?php echo date("Y"); ?> SIVC. Todos los derechos reservados.</span>
            </div>
        </footer>

    </div>

    <!-- SCRIPTS -->
    <script>
        const password = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");

        togglePassword.addEventListener("click", () => {
            if (password.type === "password") {
                password.type = "text";
                togglePassword.classList.remove("fa-eye-slash");
                togglePassword.classList.add("fa-eye");
            } else {
                password.type = "password";
                togglePassword.classList.remove("fa-eye");
                togglePassword.classList.add("fa-eye-slash");
            }
        });
    </script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php if ($registro === 'exito'): ?>
            Swal.fire({
                icon: 'success',
                title: '¡Registro Exitoso!',
                text: 'Tu cuenta ha sido creada con éxito. Ahora puedes iniciar sesión.',
                confirmButtonColor: '#0f7643'
            });
        <?php elseif ($error === 'credenciales'): ?>
            Swal.fire({
                icon: 'error',
                title: 'Datos incorrectos',
                text: 'El usuario o la contraseña no son correctos.',
                confirmButtonColor: '#0f7643'
            });
        <?php elseif ($error === 'inactivo'): ?>
            Swal.fire({
                icon: 'warning',
                title: 'Usuario inactivo',
                text: 'Tu cuenta se encuentra inactiva.',
                confirmButtonColor: '#0f7643'
            });
        <?php elseif ($error === 'campos'): ?>
            Swal.fire({
                icon: 'warning',
                title: 'Campos incompletos',
                text: 'Ingresa tu usuario y contraseña.',
                confirmButtonColor: '#0f7643'
            });
        <?php endif; ?>
    </script>
</body>
</html>