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
    </head>
    <body>
        <script>
            Swal.fire({
                icon: '$icono',
                title: '$titulo',
                text: '$mensaje',
                confirmButtonColor: '#198754'
            }).then(() => {
                window.location.href = '$ruta';
            });
        </script>
    </body>
    </html>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../../views/login.php');
    exit();
}

$usuario = trim($_POST['usuario'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($usuario) || empty($password)) {
    alerta(
        'warning',
        'Campos incompletos',
        'Ingresa tu usuario y contraseña.',
        '../../views/login.php'
    );
}

$modelo = new Usuario();
$datos = $modelo->buscarPorUsuario($usuario);

if (!$datos || !password_verify($password, $datos['contraseña'])) {
    alerta(
        'error',
        'Datos incorrectos',
        'El usuario o la contraseña no son correctos.',
        '../../views/login.php'
    );
}

if ($datos['estado'] != 'Activo') {
    alerta(
        'warning',
        'Usuario inactivo',
        'Tu cuenta se encuentra inactiva.',
        '../../views/login.php'
    );
}

$_SESSION['id_Usuario'] = $datos['id_Usuario'];
$_SESSION['usuario'] = $datos['nombre_Usuario'];
$_SESSION['nombre'] = $datos['nombre'];
$_SESSION['rol'] = $datos['rol'];

$modelo->actualizarAcceso($datos['id_Usuario']);

if ($datos['rol'] == 'Administrador') {
    header('Location: ../../views/administrador/dashboar_admi.php');
} elseif ($datos['rol'] == 'Vendedor') {
    header('Location: ../../views/vendedor/dashboard_vendedor.php');
} elseif ($datos['rol'] == 'Cliente') {
    header('Location: ../../views/cliente/dashboard_cliente.php');
} else {
    header('Location: ../../views/login.php');
}

exit();
?>