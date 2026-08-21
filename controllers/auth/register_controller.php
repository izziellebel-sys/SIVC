<?php
session_start();

require_once __DIR__ . '/../../models/usuario_model.php';

function alerta($icono, $titulo, $mensaje, $ruta)
{
    echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <style>
            body {
                font-family: 'Montserrat', sans-serif;
                background-color: #f7dbe4;
            }
        </style>
    </head>
    <body>
        <script>
            Swal.fire({
                icon: '$icono',
                title: '$titulo',
                text: '$mensaje',
                confirmButtonColor: '#6f2dbd'
            }).then(() => {
                window.location.href = '$ruta';
            });
        </script>
    </body>
    </html>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"] ?? '');
    $apellido = trim($_POST["apellido"] ?? '');
    $documento = trim($_POST["documento"] ?? '');
    $telefono = trim($_POST["telefono"] ?? '');
    $usuario_input = trim($_POST["usuario"] ?? '');
    $correo = trim($_POST["correo"] ?? '');
    $password = $_POST["password"] ?? '';
    $confirmar = $_POST["confirmar"] ?? '';

    // Validar que todos los campos requeridos estén completos
    if (empty($nombre) || empty($apellido) || empty($documento) || empty($usuario_input) || empty($correo) || empty($password) || empty($confirmar)) {
        alerta(
            "warning",
            "Campos incompletos",
            "Por favor completa todos los campos del formulario.",
            "../../views/register.php"
        );
    }

    // Validar contraseñas coincidentes
    if ($password !== $confirmar) {
        alerta(
            "error",
            "Contraseñas no coinciden",
            "La contraseña y su confirmación deben ser idénticas.",
            "../../views/register.php"
        );
    }

    $usuarioModel = new Usuario();

    // Validar que el nombre de usuario no exista
    if ($usuarioModel->usuarioExiste($usuario_input)) {
        alerta(
            "error",
            "Usuario ya registrado",
            "El nombre de usuario '$usuario_input' ya se encuentra registrado.",
            "../../views/register.php"
        );
    }

    // Validar que el correo no exista
    if ($usuarioModel->correoExiste($correo)) {
        alerta(
            "error",
            "Correo ya registrado",
            "El correo electrónico '$correo' ya se encuentra registrado.",
            "../../views/register.php"
        );
    }

    // Preparar datos para registro
    $datos = [
        "nombre" => $nombre,
        "apellido" => $apellido,
        "documento" => $documento,
        "telefono" => $telefono,
        "usuario" => $usuario_input,
        "correo" => $correo,
        "password" => $password,
        "rol" => "Cliente", // Rol inicial predeterminado
        "estado" => "Activo"
    ];

    if ($usuarioModel->registrar($datos)) {
        alerta(
            "success",
            "¡Registro Exitoso!",
            "Tu cuenta ha sido creada con éxito. Ahora puedes iniciar sesión.",
            "../../views/login.php"
        );
    } else {
        alerta(
            "error",
            "Error de registro",
            "Hubo un problema al procesar el registro en la base de datos. Inténtalo de nuevo.",
            "../../views/register.php"
        );
    }
} else {
    header("Location: ../../views/register.php");
    exit();
}
?>
