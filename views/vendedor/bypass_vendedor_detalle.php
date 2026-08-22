<?php
session_start();
$_SESSION['usuario'] = 'Vendedor de Prueba';
$_SESSION['rol'] = 'Vendedor';
$_SESSION['id_Usuario'] = 2; // general seller ID
header("Location: cliente_detalle.php?id=1");
exit();
