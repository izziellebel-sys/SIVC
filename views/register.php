<?php
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta | SIVC</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="./css/register.css?v=<?php echo time(); ?>">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
    <!-- Google Fonts (Inter & Pacifico) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    <!-- BACKGROUND WRAPPER -->
    <div class="register-wrapper">
        
        <!-- HEADER -->
        <header class="register-header">
            <div class="header-logo">
                <i class="fa-solid fa-basket-shopping logo-icon"></i>
                <span class="logo-text">SIVC</span>
                <div class="divider"></div>
                <span class="logo-tagline">Sistema Integral de Ventas y Control de Inventario</span>
            </div>
        </header>

        <!-- MAIN LAYOUT -->
        <main class="register-main">
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
                <div class="register-card">
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
                        <h3>Crear cuenta</h3>
                        <p class="subtitle">Completa el formulario para registrarte en el sistema</p>

                        <form action="../controllers/auth/register_controller.php" method="POST" id="registerForm">
                            <div class="form-grid">
                                <!-- Nombre -->
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <div class="input-container">
                                        <i class="fa-regular fa-user field-icon"></i>
                                        <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" required>
                                    </div>
                                </div>

                                <!-- Apellido -->
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <div class="input-container">
                                        <i class="fa-regular fa-user field-icon"></i>
                                        <input type="text" name="apellido" id="apellido" placeholder="Ingresa tu apellido" required>
                                    </div>
                                </div>

                                <!-- Número de Documento -->
                                <div class="form-group">
                                    <label for="documento">Número de Documento</label>
                                    <div class="input-container">
                                        <i class="fa-regular fa-address-card field-icon"></i>
                                        <input type="text" name="documento" id="documento" placeholder="Ej: 1098765432" required>
                                    </div>
                                </div>

                                <!-- Teléfono -->
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <div class="input-container">
                                        <i class="fa-solid fa-phone field-icon"></i>
                                        <input type="text" name="telefono" id="telefono" placeholder="Ej: 3001234567">
                                    </div>
                                </div>

                                <!-- Nombre de Usuario -->
                                <div class="form-group">
                                    <label for="usuario">Nombre de Usuario</label>
                                    <div class="input-container">
                                        <i class="fa-regular fa-user field-icon"></i>
                                        <input type="text" name="usuario" id="usuario" placeholder="Ej: ruben123" required>
                                    </div>
                                </div>

                                <!-- Correo electrónico -->
                                <div class="form-group">
                                    <label for="correo">Correo electrónico</label>
                                    <div class="input-container">
                                        <i class="fa-regular fa-envelope field-icon"></i>
                                        <input type="email" name="correo" id="correo" placeholder="ejemplo@gmail.com" required>
                                    </div>
                                </div>

                                <!-- Contraseña -->
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <div class="input-container">
                                        <i class="fa-solid fa-lock field-icon"></i>
                                        <input type="password" name="password" id="password" placeholder="********" required>
                                        <i class="fa-regular fa-eye-slash toggle-password" id="togglePassword"></i>
                                    </div>
                                </div>

                                <!-- Confirmar contraseña -->
                                <div class="form-group">
                                    <label for="confirmPassword">Confirmar contraseña</label>
                                    <div class="input-container">
                                        <i class="fa-solid fa-lock field-icon"></i>
                                        <input type="password" name="confirmar" id="confirmPassword" placeholder="********" required>
                                        <i class="fa-regular fa-eye-slash toggle-password" id="toggleConfirmPassword"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Password Requirements Box -->
                            <div class="requirements-box">
                                <div class="req-icon-container">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                                <div class="req-content">
                                    <span class="req-title">Tu contraseña debe tener:</span>
                                    <ul class="requirements-list">
                                        <li id="req-length" class="requirement-item">
                                            <i class="fa-solid fa-circle-check check-icon"></i>
                                            <span>Mínimo 8 caracteres</span>
                                        </li>
                                        <li id="req-uppercase" class="requirement-item">
                                            <i class="fa-solid fa-circle-check check-icon"></i>
                                            <span>Al menos una mayúscula</span>
                                        </li>
                                        <li id="req-number" class="requirement-item">
                                            <i class="fa-solid fa-circle-check check-icon"></i>
                                            <span>Al menos un número</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn-submit">
                                Crear cuenta
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </form>

                        <!-- Footer Link -->
                        <div class="auth-footer-link">
                            <span>¿Ya tienes una cuenta?</span>
                            <a href="login.php">Inicia sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- FOOTER -->
        <footer class="register-footer">
            <div class="footer-left">
                <i class="fa-solid fa-shield-halved footer-icon"></i>
                <span>Tus datos están protegidos con altos estándares de seguridad.</span>
            </div>
            <div class="footer-right">
                <span>&copy; <?php echo date("Y"); ?> SIVC. Todos los derechos reservados.</span>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script>
        // Toggle password visibility
        function setupPasswordToggle(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            icon.addEventListener("click", () => {
                if (input.type === "password") {
                    input.type = "text";
                    icon.classList.replace("fa-eye-slash", "fa-eye");
                } else {
                    input.type = "password";
                    icon.classList.replace("fa-eye", "fa-eye-slash");
                }
            });
        }
        setupPasswordToggle("password", "togglePassword");
        setupPasswordToggle("confirmPassword", "toggleConfirmPassword");

        // Password requirements real-time checking
        const passwordInput = document.getElementById('password');
        const reqLength = document.getElementById('req-length');
        const reqUppercase = document.getElementById('req-uppercase');
        const reqNumber = document.getElementById('req-number');

        passwordInput.addEventListener('input', () => {
            const val = passwordInput.value;
            
            // Check length (>= 8 characters)
            if (val.length >= 8) {
                reqLength.classList.add('valid');
            } else {
                reqLength.classList.remove('valid');
            }
            
            // Check uppercase (At least one uppercase letter)
            if (/[A-Z]/.test(val)) {
                reqUppercase.classList.add('valid');
            } else {
                reqUppercase.classList.remove('valid');
            }
            
            // Check number (At least one number)
            if (/[0-9]/.test(val)) {
                reqNumber.classList.add('valid');
            } else {
                reqNumber.classList.remove('valid');
            }
        });
    </script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php if ($error === 'campos'): ?>
            Swal.fire({
                icon: 'warning',
                title: 'Campos incompletos',
                text: 'Por favor completa todos los campos del formulario.',
                confirmButtonColor: '#004832'
            });
        <?php elseif ($error === 'password'): ?>
            Swal.fire({
                icon: 'error',
                title: 'Contraseñas no coinciden',
                text: 'La contraseña y su confirmación deben ser idénticas.',
                confirmButtonColor: '#004832'
            });
        <?php elseif ($error === 'usuario'): ?>
            Swal.fire({
                icon: 'error',
                title: 'Usuario ya registrado',
                text: 'El nombre de usuario ya se encuentra registrado.',
                confirmButtonColor: '#004832'
            });
        <?php elseif ($error === 'correo'): ?>
            Swal.fire({
                icon: 'error',
                title: 'Correo ya registrado',
                text: 'El correo electrónico ya se encuentra registrado.',
                confirmButtonColor: '#004832'
            });
        <?php elseif ($error === 'db'): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error de registro',
                text: 'Hubo un problema al procesar el registro en la base de datos. Inténtalo de nuevo.',
                confirmButtonColor: '#004832'
            });
        <?php endif; ?>
    </script>
</body>
</html>