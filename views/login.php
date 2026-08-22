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
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

    <div class="background">
        <div class="login-container">
            <div class="form-section">
                <h1>BIENVENIDO</h1>
                <h3>INICIE SESIÓN PARA CONTINUAR</h3>

                <form action="../controllers/auth/login_controler.php" method="POST">
                    <label>Usuario o Correo electrónico</label>
                    <div class="input-box">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="text" name="usuario" placeholder="Ingresa tu usuario o correo" required>
                    </div>

                    <label>Contraseña</label>

                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="********************" required>
                        <i class="fa-regular fa-eye-slash" id="togglePassword"></i>
                    </div>

                    <button type="submit">ENTRA</button>
                </form>
                <p class="social-text">O inicia sesión con</p>

                <div class="social-icons">
                    <i class="fa-brands fa-google"></i>
                    <i class="fa-brands fa-facebook"></i>
                </div>

                <div class="register">
                    <span>No tienes una cuenta?</span>
                    <a href="register.php">Crea una</a>
                </div>

            </div>

            <div class="image-section">
                <img src="../public/img/tienda.png"alt="Tienda">
                <p>TIENDA DE BARRIO</p>
            </div>

        </div>

    </div>

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
                confirmButtonColor: '#6f2dbd'
            });
        <?php elseif ($error === 'credenciales'): ?>
            Swal.fire({
                icon: 'error',
                title: 'Datos incorrectos',
                text: 'El usuario o la contraseña no son correctos.',
                confirmButtonColor: '#198754'
            });
        <?php elseif ($error === 'inactivo'): ?>
            Swal.fire({
                icon: 'warning',
                title: 'Usuario inactivo',
                text: 'Tu cuenta se encuentra inactiva.',
                confirmButtonColor: '#198754'
            });
        <?php elseif ($error === 'campos'): ?>
            Swal.fire({
                icon: 'warning',
                title: 'Campos incompletos',
                text: 'Ingresa tu usuario y contraseña.',
                confirmButtonColor: '#198754'
            });
        <?php endif; ?>
    </script>
</body>
</html>