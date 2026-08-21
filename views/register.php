<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta | SIVC</title>
    <link rel="stylesheet" href="./css/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

    <div class="register-container">

        <div class="form-section">
            <h1>REGÍSTRATE</h1>     
            <h3>CREA TU CUENTA PARA CONTINUAR</h3>

            <form action="../controllers/auth/register_controller.php" method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nombre</label>
                        <div class="input-box">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="nombre" placeholder="Ingresa tu nombre" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Apellido</label>
                        <div class="input-box">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="apellido" placeholder="Ingresa tu apellido" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Número de Documento</label>
                        <div class="input-box">
                            <i class="fa-solid fa-id-card"></i>
                            <input type="text" name="documento" placeholder="Ej: 1098765432" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Teléfono</label>
                        <div class="input-box">
                            <i class="fa-solid fa-phone"></i>
                            <input type="text" name="telefono" placeholder="Ej: 3001234567">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nombre de Usuario</label>
                        <div class="input-box">
                            <i class="fa-solid fa-user-tag"></i>
                            <input type="text" name="usuario" placeholder="Ej: ruben123" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Correo electrónico</label>
                        <div class="input-box">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="email" name="correo" placeholder="ejemplo@gmail.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Contraseña</label>
                        <div class="input-box">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="password" id="password" placeholder="********" required>
                            <i class="fa-regular fa-eye-slash" id="togglePassword"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Confirmar contraseña</label>
                        <div class="input-box">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="confirmar" id="confirmPassword" placeholder="********" required>
                            <i class="fa-regular fa-eye-slash" id="toggleConfirmPassword"></i>
                        </div>
                    </div>
                </div>

                <button type="submit">REGISTRARME</button>
            </form>

            <div class="login-link">
                <span>¿Ya tienes una cuenta?</span>
                <a href="login.php">Inicia sesión</a>
            </div>

        </div>

        <div class="image-section">
            <img src="../public/img/tienda.png"alt="Tienda">
            <p>SISTEMA DE INVENTARIO</p>
        </div>
    </div>

    <script>
        function toggle(inputId, iconId) {
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
        toggle("password", "togglePassword");
        toggle("confirmPassword", "toggleConfirmPassword");

    </script>
</body>

</html>