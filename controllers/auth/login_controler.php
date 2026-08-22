<?php
session_start();

require_once __DIR__ . '/../../models/usuario_model.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../../views/login.php');
    exit();
}

$usuario = trim($_POST['usuario'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($usuario) || empty($password)) {
    header('Location: ../../views/login.php?error=campos');
    exit();
}

$modelo = new Usuario();
$datos = $modelo->buscarPorUsuario($usuario);

if (!$datos || !password_verify($password, $datos['contraseña'])) {
    header('Location: ../../views/login.php?error=credenciales');
    exit();
}

if ($datos['estado'] != 'Activo') {
    header('Location: ../../views/login.php?error=inactivo');
    exit();
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