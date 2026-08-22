<?php
session_start();

require_once __DIR__ . '/../../models/usuario_model.php';

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
        header('Location: ../../views/register.php?error=campos');
        exit();
    }

    // Validar contraseñas coincidentes
    if ($password !== $confirmar) {
        header('Location: ../../views/register.php?error=password');
        exit();
    }

    $usuarioModel = new Usuario();

    // Validar que el nombre de usuario no exista
    if ($usuarioModel->usuarioExiste($usuario_input)) {
        header('Location: ../../views/register.php?error=usuario');
        exit();
    }

    // Validar que el correo no exista
    if ($usuarioModel->correoExiste($correo)) {
        header('Location: ../../views/register.php?error=correo');
        exit();
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
        header('Location: ../../views/login.php?registro=exito');
        exit();
    } else {
        header('Location: ../../views/register.php?error=db');
        exit();
    }
} else {
    header("Location: ../../views/register.php");
    exit();
}
?>
