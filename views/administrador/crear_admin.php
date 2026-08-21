<?php
// Incluir la base de datos
require_once __DIR__ . '/../../configuration/database.php';

$mensaje = "";
$tipo_alerta = "";
$titulo_alerta = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"] ?? '');
    $apellido = trim($_POST["apellido"] ?? '');
    $documento = trim($_POST["documento"] ?? '');
    $telefono = trim($_POST["telefono"] ?? '');
    $usuario = trim($_POST["usuario"] ?? '');
    $correo = trim($_POST["correo"] ?? '');
    $password = $_POST["password"] ?? '';
    $confirmar = $_POST["confirmar"] ?? '';

    // Validar campos obligatorios
    if (empty($nombre) || empty($apellido) || empty($documento) || empty($usuario) || empty($correo) || empty($password) || empty($confirmar)) {
        $mensaje = "Por favor, complete todos los campos requeridos.";
        $tipo_alerta = "warning";
        $titulo_alerta = "Campos incompletos";
    }
    // Validar contraseñas
    elseif ($password !== $confirmar) {
        $mensaje = "Las contraseñas ingresadas no coinciden.";
        $tipo_alerta = "error";
        $titulo_alerta = "Contraseñas no coinciden";
    } else {
        // Verificar si el usuario o correo ya existen en la base de datos
        $stmtCheck = $conn->prepare("SELECT id_Usuario FROM usuarios WHERE nombre_Usuario = ? OR correo = ?");
        if ($stmtCheck) {
            $stmtCheck->bind_param("ss", $usuario, $correo);
            $stmtCheck->execute();
            $stmtCheck->store_result();
            $exists = $stmtCheck->num_rows > 0;
            $stmtCheck->close();

            if ($exists) {
                $mensaje = "El nombre de usuario o correo electrónico ya se encuentra registrado.";
                $tipo_alerta = "error";
                $titulo_alerta = "Usuario existente";
            } else {
                // Registrar el nuevo administrador
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $id_rol = '1'; // Rol 1 = Administrador
                $estado = 'Activo';

                $stmtInsert = $conn->prepare("INSERT INTO usuarios (nombre, apellido, numero_Documento, id_Rol, telefono, correo, nombre_Usuario, contraseña, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                if ($stmtInsert) {
                    $stmtInsert->bind_param("sssssssss", 
                        $nombre, 
                        $apellido, 
                        $documento, 
                        $id_rol, 
                        $telefono, 
                        $correo, 
                        $usuario, 
                        $hashed_password, 
                        $estado
                    );
                    
                    if ($stmtInsert->execute()) {
                        $mensaje = "El administrador ha sido creado correctamente en el sistema.";
                        $tipo_alerta = "success";
                        $titulo_alerta = "¡Registro Exitoso!";
                    } else {
                        $mensaje = "Error al intentar registrar en la base de datos.";
                        $tipo_alerta = "error";
                        $titulo_alerta = "Error de inserción";
                    }
                    $stmtInsert->close();
                } else {
                    $mensaje = "Error de preparación de la consulta.";
                    $tipo_alerta = "error";
                    $titulo_alerta = "Error Interno";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración Administrador | SIVC</title>
    
    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Montserrat", sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #1e1b2e, #3a1c5c, #120f1d);
            padding: 20px;
        }

        .admin-container {
            width: 900px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 30px;
            padding: 50px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
            border: 2px solid #d4af37;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h1 {
            color: #d4af37;
            font-size: 42px;
            font-weight: 800;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .form-header h3 {
            color: #555;
            font-weight: 500;
            font-size: 15px;
            margin-top: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 18px;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-box {
            display: flex;
            align-items: center;
            padding: 14px 18px;
            border-radius: 30px;
            background: #f3f3f3;
            border: 1px solid transparent;
            transition: 0.3s;
        }

        .input-box:focus-within {
            border-color: #d4af37;
            box-shadow: 0 0 10px rgba(212, 175, 55, 0.2);
            background: #ffffff;
        }

        .input-box i {
            color: #777;
            margin-right: 12px;
            font-size: 16px;
        }

        .input-box input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            font-family: inherit;
            font-size: 14px;
            color: #222;
        }

        .toggle-icon {
            cursor: pointer;
            margin-left: 10px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 18px;
            border: none;
            border-radius: 35px;
            margin-top: 25px;
            font-family: inherit;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
            background: linear-gradient(90deg, #d4af37, #b8860b);
            color: white;
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
            transition: 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        button[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.5);
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #6f2dbd;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: 0.3s;
        }

        .back-link a:hover {
            color: #b8860b;
        }

        @media (max-width: 768px) {
            .admin-container {
                width: 100%;
                padding: 30px 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="admin-container">
        <div class="form-header">
            <h1>SIVC</h1>
            <h3>Registrar Administrador del Sistema</h3>
        </div>

        <form action="" method="POST">
            <div class="form-grid">
                <div class="form-group">
                    <label>Nombre</label>
                    <div class="input-box">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="nombre" placeholder="Nombre del administrador" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Apellido</label>
                    <div class="input-box">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="apellido" placeholder="Apellido del administrador" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Documento de Identidad</label>
                    <div class="input-box">
                        <i class="fa-solid fa-id-card"></i>
                        <input type="text" name="documento" placeholder="Número de C.C. / D.N.I." required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Teléfono</label>
                    <div class="input-box">
                        <i class="fa-solid fa-phone"></i>
                        <input type="text" name="telefono" placeholder="Número de celular">
                    </div>
                </div>

                <div class="form-group">
                    <label>Nombre de Usuario</label>
                    <div class="input-box">
                        <i class="fa-solid fa-user-tag"></i>
                        <input type="text" name="usuario" placeholder="Ej: admin_central" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Correo Electrónico</label>
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
                        <i class="fa-regular fa-eye-slash toggle-icon" id="togglePassword"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label>Confirmar Contraseña</label>
                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="confirmar" id="confirmPassword" placeholder="********" required>
                        <i class="fa-regular fa-eye-slash toggle-icon" id="toggleConfirmPassword"></i>
                    </div>
                </div>
            </div>

            <button type="submit">Crear Administrador</button>
        </form>

        <div class="back-link">
            <a href="../login.php"><i class="fa-solid fa-arrow-left"></i> Volver al Inicio de Sesión</a>
        </div>
    </div>

    <!-- Toggle Password Visibility JS -->
    <script>
        function setupToggle(inputId, iconId) {
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
        setupToggle("password", "togglePassword");
        setupToggle("confirmPassword", "toggleConfirmPassword");
    </script>

    <!-- SweetAlert2 Action Feedback -->
    <?php if (!empty($mensaje)): ?>
        <script>
            Swal.fire({
                icon: '<?= $tipo_alerta; ?>',
                title: '<?= $titulo_alerta; ?>',
                text: '<?= $mensaje; ?>',
                confirmButtonColor: '#d4af37'
            }).then(() => {
                <?php if ($tipo_alerta === 'success'): ?>
                    window.location.href = '../login.php';
                <?php endif; ?>
            });
        </script>
    <?php endif; ?>

</body>

</html>
