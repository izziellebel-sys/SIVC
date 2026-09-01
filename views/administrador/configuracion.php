<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/load_config.php';
$id_usuario = $_SESSION['id_Usuario'] ?? 0;

$mensaje = "";
$tipo_alerta = "";
$titulo_alerta = "";

// ==========================================================================
// FUNCIONES AUXILIARES PARA ARCHIVOS JSON Y RESPALDO SQL
// ==========================================================================

function obtenerConfiguracionEmpresa() {
    $path = __DIR__ . '/../../configuration/empresa_config.json';
    if (file_exists($path)) {
        $json = file_get_contents($path);
        return json_decode($json, true) ?? [];
    }
    return [
        'nombre' => 'SIVC - Doña Marina',
        'nit' => '123456789-0',
        'telefono' => '123-456-7890',
        'correo' => 'info@donamarina.com',
        'direccion' => 'Calle de Barrio #123',
        'moneda' => '$',
        'iva' => '19'
    ];
}

function guardarConfiguracionEmpresa($data) {
    $path = __DIR__ . '/../../configuration/empresa_config.json';
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function obtenerConfiguracionNotificaciones() {
    $path = __DIR__ . '/../../configuration/notificaciones_config.json';
    if (file_exists($path)) {
        $json = file_get_contents($path);
        return json_decode($json, true) ?? [];
    }
    return [
        'stock_bajo_limite' => 5,
        'alerta_correo' => 'admin@sivc.com',
        'enviar_alertas' => 0
    ];
}

function guardarConfiguracionNotificaciones($data) {
    $path = __DIR__ . '/../../configuration/notificaciones_config.json';
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function generarRespaldoBaseDatos() {
    global $conn;
    
    $sql = "-- Respaldo de Base de Datos SIVC\n";
    $sql .= "-- Generado el: " . date('Y-m-d H:i:s') . "\n\n";
    $sql .= "SET FOREIGN_KEY_CHECKS=0;\n\n";
    
    // Obtener tablas
    $tables = [];
    $result = $conn->query("SHOW TABLES");
    while ($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }
    
    foreach ($tables as $table) {
        // Create Table
        $resCreate = $conn->query("SHOW CREATE TABLE `$table`")->fetch_row();
        $sql .= "DROP TABLE IF EXISTS `$table`;\n";
        $sql .= $resCreate[1] . ";\n\n";
        
        // Insert rows
        $resRows = $conn->query("SELECT * FROM `$table`");
        while ($row = $resRows->fetch_assoc()) {
            $cols = array_keys($row);
            $vals = [];
            foreach ($row as $val) {
                if ($val === null) {
                    $vals[] = "NULL";
                } else {
                    $vals[] = "'" . $conn->real_escape_string($val) . "'";
                }
            }
            $sql .= "INSERT INTO `$table` (`" . implode("`, `", $cols) . "`) VALUES (" . implode(", ", $vals) . ");\n";
        }
        $sql .= "\n";
    }
    
    $sql .= "SET FOREIGN_KEY_CHECKS=1;\n";
    
    // Servir para descarga
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="respaldo_sivc_' . date('Ymd_His') . '.sql"');
    echo $sql;
    exit();
}

// Disparador de descarga de respaldo
if (isset($_GET['download_backup']) && $_GET['download_backup'] === '1') {
    generarRespaldoBaseDatos();
}

// ==========================================================================
// PROCESAR POST ACCIONES
// ==========================================================================
$section = $_GET['section'] ?? 'apariencia';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $id_usuario > 0) {
    $action = $_POST['action'] ?? '';

    if ($action === 'guardar_apariencia') {
        $tema = $_POST['tema'] ?? 'dark_green';
        $tipografia = $_POST['tipografia'] ?? 'Segoe UI';
        $tamanho_fuente = $_POST['tamanho_fuente'] ?? '14px';
        $modo_oscuro = 0;

        // Validar tamaño de fuente seguro
        $font_sizes_valid = ['12px', '14px', '16px', '18px', '20px'];
        if (!in_array($tamanho_fuente, $font_sizes_valid)) {
            $tamanho_fuente = '14px';
        }

        // Actualizar base de datos
        $stmtUpdate = $conn->prepare("UPDATE configuracion SET tema = ?, tipografia = ?, tamaño_Fuente = ?, modo_Oscuro = ? WHERE id_Usuario = ?");
        if ($stmtUpdate) {
            $stmtUpdate->bind_param("sssii", $tema, $tipografia, $tamanho_fuente, $modo_oscuro, $id_usuario);
            if ($stmtUpdate->execute()) {
                $mensaje = "Configuración de apariencia guardada con éxito.";
                $tipo_alerta = "success";
                $titulo_alerta = "¡Éxito!";
            } else {
                $mensaje = "Error al actualizar la apariencia.";
                $tipo_alerta = "error";
                $titulo_alerta = "Error";
            }
            $stmtUpdate->close();
        }
    } elseif ($action === 'restablecer_apariencia') {
        // Restablecer valores de fábrica
        $stmtReset = $conn->prepare("UPDATE configuracion SET tema = 'dark_green', tipografia = 'Segoe UI', tamaño_Fuente = '14px', modo_Oscuro = 0 WHERE id_Usuario = ?");
        if ($stmtReset) {
            $stmtReset->bind_param("i", $id_usuario);
            if ($stmtReset->execute()) {
                $mensaje = "Se han restablecido los valores de apariencia por defecto.";
                $tipo_alerta = "success";
                $titulo_alerta = "¡Restablecido!";
            } else {
                $mensaje = "Error al restablecer la apariencia.";
                $tipo_alerta = "error";
                $titulo_alerta = "Error";
            }
            $stmtReset->close();
        }
    } elseif ($action === 'guardar_empresa') {
        $empData = [
            'nombre' => $_POST['nombre'] ?? '',
            'nit' => $_POST['nit'] ?? '',
            'telefono' => $_POST['telefono'] ?? '',
            'correo' => $_POST['correo'] ?? '',
            'direccion' => $_POST['direccion'] ?? '',
            'moneda' => $_POST['moneda'] ?? '$',
            'iva' => $_POST['iva'] ?? '0'
        ];
        guardarConfiguracionEmpresa($empData);
        $mensaje = "Datos de la empresa guardados con éxito.";
        $tipo_alerta = "success";
        $titulo_alerta = "¡Éxito!";
        
    } elseif ($action === 'guardar_notificaciones') {
        $notData = [
            'stock_bajo_limite' => (int)($_POST['stock_bajo_limite'] ?? 5),
            'alerta_correo' => $_POST['alerta_correo'] ?? '',
            'enviar_alertas' => isset($_POST['enviar_alertas']) ? 1 : 0
        ];
        guardarConfiguracionNotificaciones($notData);
        $mensaje = "Parámetros de notificación guardados con éxito.";
        $tipo_alerta = "success";
        $titulo_alerta = "¡Éxito!";
        
    } elseif ($action === 'guardar_usuario') {
        $id_u = (int)($_POST['id_Usuario'] ?? 0);
        $nombre = $_POST['nombre'] ?? '';
        $apellido = $_POST['apellido'] ?? '';
        $doc = $_POST['numero_Documento'] ?? '';
        $rol = (int)($_POST['id_Rol'] ?? 2);
        $tel = $_POST['telefono'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $user = $_POST['nombre_Usuario'] ?? '';
        $pass = $_POST['contraseña'] ?? '';
        $estado = $_POST['estado'] ?? 'Activo';

        if ($id_u > 0) {
            // Editar usuario
            if (!empty($pass)) {
                $hashed = password_hash($pass, PASSWORD_BCRYPT);
                $stmt = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, numero_Documento = ?, id_Rol = ?, telefono = ?, correo = ?, nombre_Usuario = ?, contraseña = ?, estado = ? WHERE id_Usuario = ?");
                $stmt->bind_param("sssisssssi", $nombre, $apellido, $doc, $rol, $tel, $correo, $user, $hashed, $estado, $id_u);
            } else {
                $stmt = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, numero_Documento = ?, id_Rol = ?, telefono = ?, correo = ?, nombre_Usuario = ?, estado = ? WHERE id_Usuario = ?");
                $stmt->bind_param("sssissssi", $nombre, $apellido, $doc, $rol, $tel, $correo, $user, $estado, $id_u);
            }
            if ($stmt->execute()) {
                $mensaje = "Usuario actualizado con éxito.";
                $tipo_alerta = "success";
                $titulo_alerta = "¡Éxito!";
            } else {
                $mensaje = "Error al actualizar el usuario.";
                $tipo_alerta = "error";
                $titulo_alerta = "Error";
            }
            $stmt->close();
        } else {
            // Registrar nuevo usuario
            $hashed = password_hash($pass, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, numero_Documento, id_Rol, telefono, correo, nombre_Usuario, contraseña, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssisssss", $nombre, $apellido, $doc, $rol, $tel, $correo, $user, $hashed, $estado);
            if ($stmt->execute()) {
                $mensaje = "Usuario registrado con éxito.";
                $tipo_alerta = "success";
                $titulo_alerta = "¡Éxito!";
            } else {
                $mensaje = "Error al registrar el usuario.";
                $tipo_alerta = "error";
                $titulo_alerta = "Error";
            }
            $stmt->close();
        }
    } elseif ($action === 'eliminar_usuario') {
        $id_u = (int)($_POST['id_Usuario'] ?? 0);
        if ($id_u > 0 && $id_u !== $id_usuario) {
            $stmt = $conn->prepare("DELETE FROM usuarios WHERE id_Usuario = ?");
            $stmt->bind_param("i", $id_u);
            if ($stmt->execute()) {
                $mensaje = "Usuario eliminado con éxito.";
                $tipo_alerta = "success";
                $titulo_alerta = "¡Éxito!";
            } else {
                $mensaje = "Error al eliminar el usuario.";
                $tipo_alerta = "error";
                $titulo_alerta = "Error";
            }
            $stmt->close();
        } elseif ($id_u === $id_usuario) {
            $mensaje = "No puedes eliminar tu propio usuario de la sesión activa.";
            $tipo_alerta = "warning";
            $titulo_alerta = "Operación Denegada";
        }
    }
}

// ==========================================================================
// CARGAR DATOS Y CONFIGURACIONES
// ==========================================================================

$config = obtenerConfiguracionUsuario();
$empresa = obtenerConfiguracionEmpresa();
$notif = obtenerConfiguracionNotificaciones();

// Datos del Administrador Logueado
$resAdminLogueado = $conn->query("SELECT * FROM usuarios WHERE id_Usuario = $id_usuario");
$nombreUsuario = "Administrador";
$adminEmail = "admin@sivc.com";
if ($resAdminLogueado && $adminRow = $resAdminLogueado->fetch_assoc()) {
    $nombreUsuario = $adminRow['nombre'] . ' ' . $adminRow['apellido'];
    $adminEmail = $adminRow['correo'];
}

// Si la sección es usuarios, cargar listado
$todosUsuarios = [];
if ($section === 'usuarios') {
    $resU = $conn->query("
        SELECT u.*, 
               CASE u.id_Rol 
                   WHEN 1 THEN 'Administrador' 
                   WHEN 2 THEN 'Vendedor' 
                   WHEN 3 THEN 'Cliente' 
               END as rol_nombre
        FROM usuarios u
        WHERE u.id_Rol IN (1, 2)
        ORDER BY u.id_Usuario ASC
    ");
    if ($resU) {
        while ($row = $resU->fetch_assoc()) {
            $todosUsuarios[] = $row;
        }
    }
}

// OBTENER FECHA ACTUAL EN ESPAÑOL
$dias = [
    1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 4 => 'Jueves',
    5 => 'Viernes', 6 => 'Sábado', 7 => 'Domingo'
];
$meses = [
    1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril',
    5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto',
    9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
];
$diaSemana = date('N');
$mes = date('n');
$fechaString = $dias[$diaSemana] . ', ' . date('d') . ' de ' . $meses[$mes] . ' de ' . date('Y');
$horaString = date('h:i a');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración | SIVC</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CSS general -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- CSS Configuración & Dashboard -->
    <link rel="stylesheet" href="admi.css/dashboard_admi.css?v=7">
    <link rel="stylesheet" href="admi.css/configuracion_admi.css?v=8">
    
    <!-- Inyectar estilos cargados de la base de datos -->
    <?php aplicarConfiguracionEstilos(); ?>
</head>

<body>

    <div class="dashboard-container">

        <!-- ==========================================
             SIDEBAR (BARRA LATERAL)
        =========================================== -->
        <aside class="sidebar" id="sidebar">
            <button class="sidebar-toggle-btn" id="sidebarClose">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Store Logo Section -->
            <div class="sidebar-logo-section">
                <i class="fa-solid fa-store brand-icon"></i>
                <div class="logo-text-details">
                    <h2 class="brand-title">SIVC</h2>
                    <span class="brand-subtitle">Sistema de Inventario<br>y Ventas para Comercios</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="sidebar-navigation">
                <a href="dashboar_admi.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-house"></i>
                        <span>Dashboard</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>

                <a href="inventario.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-box"></i>
                        <span>Inventario</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>

                <a href="ventas.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Ventas</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>

                <a href="clientes.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-users"></i>
                        <span>Clientes</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>

                <a href="vendedores.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-user-tie"></i>
                        <span>Vendedores</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>

                <a href="reportes.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-chart-simple"></i>
                        <span>Reportes</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>

                <!-- Configuración Dropdown Active Submenu matching mockup -->
                <div class="sidebar-menu-dropdown-wrapper active">
                    <a href="configuracion.php?section=apariencia" class="sidebar-link-card active">
                        <div class="link-left">
                            <i class="fa-solid fa-gear"></i>
                            <span>Configuracion</span>
                        </div>
                        <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                    </a>
                    <div class="sidebar-submenu" style="display: block;">
                        <a href="configuracion.php?section=apariencia" class="submenu-link <?= $section === 'apariencia' ? 'active' : ''; ?>">
                            <?php if ($section === 'apariencia'): ?><span class="active-dot"></span><?php endif; ?>
                            <span>Apariencia</span>
                        </a>
                        <a href="configuracion.php?section=usuarios" class="submenu-link <?= $section === 'usuarios' ? 'active' : ''; ?>">
                            <?php if ($section === 'usuarios'): ?><span class="active-dot"></span><?php endif; ?>
                            <span>Usuarios</span>
                        </a>
                        <a href="configuracion.php?section=empresa" class="submenu-link <?= $section === 'empresa' ? 'active' : ''; ?>">
                            <?php if ($section === 'empresa'): ?><span class="active-dot"></span><?php endif; ?>
                            <span>Empresa</span>
                        </a>
                        <a href="configuracion.php?section=respaldos" class="submenu-link <?= $section === 'respaldos' ? 'active' : ''; ?>">
                            <?php if ($section === 'respaldos'): ?><span class="active-dot"></span><?php endif; ?>
                            <span>Respaldos</span>
                        </a>
                        <a href="configuracion.php?section=notificaciones" class="submenu-link <?= $section === 'notificaciones' ? 'active' : ''; ?>">
                            <?php if ($section === 'notificaciones'): ?><span class="active-dot"></span><?php endif; ?>
                            <span>Notificaciones</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Logout -->
            <div class="sidebar-footer-section">
                <a href="../../controllers/logout.php" class="sidebar-logout-btn">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Cerrar sesion</span>
                </a>
            </div>
        </aside>

        <!-- ==========================================
             MAIN CONTENT
        =========================================== -->
        <main class="main-content">
            <!-- Mobile Toggle Menu Button -->
            <button class="mobile-toggle-btn" id="mobileMenu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Header Section (Format layout unified with other modules) -->
            <header class="content-header">
                <div class="welcome-header-text">
                    <h1>Configuración</h1>
                    <p>Personaliza la apariencia y el comportamiento del sistema.</p>
                </div>
                
                <div class="header-right-widgets">
                    <!-- Widget Calendario -->
                    <div class="datetime-card">
                        <i class="fa-regular fa-calendar-days"></i>
                        <div class="datetime-details">
                            <strong><?= $fechaString; ?></strong>
                            <span><?= $horaString; ?></span>
                        </div>
                    </div>
                    <!-- Widget Perfil Administrador -->
                    <div class="profile-card">
                        <div class="profile-avatar">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="profile-info">
                            <strong><?= htmlspecialchars($nombreUsuario); ?></strong>
                            <span><?= htmlspecialchars($adminEmail); ?></span>
                        </div>
                        <i class="fa-solid fa-chevron-down profile-chevron"></i>
                    </div>
                </div>
            </header>

            <!-- ==========================================
                 SECCIÓN: APARIENCIA
            =========================================== -->
            <?php if ($section === 'apariencia'): ?>
                <form action="configuracion.php?section=apariencia" method="POST" id="configForm">
                    <input type="hidden" name="action" id="formAction" value="guardar_apariencia">
                    
                    <!-- Inputs Ocultos para capturar estados dinámicos -->
                    <input type="hidden" name="tema" id="selectedTema" value="<?= htmlspecialchars($config['tema']); ?>">
                    <input type="hidden" name="tipografia" id="selectedTipografia" value="<?= htmlspecialchars($config['tipografia']); ?>">

                    <section class="config-options-list">
                        
                        <!-- 1. Color de Fondo / Tema del Sistema -->
                        <div class="config-card">
                            <div style="display: flex; align-items: center; gap: 20px; flex: 1;">
                                <div class="config-icon-circle">
                                    <i class="fa-solid fa-palette"></i>
                                </div>
                                <div class="config-info">
                                    <h3>Color de fondo</h3>
                                    <p>Selecciona el color principal que se utilizará en toda la aplicación.</p>
                                </div>
                            </div>
                            <div class="config-control-panel">
                                <span class="control-label">Elige un color</span>
                                <div class="color-palette-group">
                                    <!-- 1. Azul (Blue) -->
                                    <button type="button" class="color-option-btn <?= $config['tema'] === 'blue' ? 'selected' : ''; ?>" 
                                            style="background-color: #2563eb;" onclick="seleccionarTema('blue', this)" title="Azul">
                                        <?php if ($config['tema'] === 'blue'): ?><i class="fa-solid fa-check" style="color: #ffffff; font-size: 14px;"></i><?php endif; ?>
                                    </button>
                                    <!-- 2. Morado (Purple) -->
                                    <button type="button" class="color-option-btn <?= ($config['tema'] === 'purple' || $config['tema'] === 'dusty_purple' || $config['tema'] === 'lavender') ? 'selected' : ''; ?>" 
                                            style="background-color: #7c3aed;" onclick="seleccionarTema('purple', this)" title="Morado">
                                        <?php if ($config['tema'] === 'purple' || $config['tema'] === 'dusty_purple' || $config['tema'] === 'lavender'): ?><i class="fa-solid fa-check" style="color: #ffffff; font-size: 14px;"></i><?php endif; ?>
                                    </button>
                                    <!-- 3. Verde Agua Marina (Aquamarine / Teal) -->
                                    <button type="button" class="color-option-btn <?= ($config['tema'] === 'teal_green' || $config['tema'] === 'aquamarine') ? 'selected' : ''; ?>" 
                                            style="background-color: #0d9488;" onclick="seleccionarTema('teal_green', this)" title="Verde Agua Marina">
                                        <?php if ($config['tema'] === 'teal_green' || $config['tema'] === 'aquamarine'): ?><i class="fa-solid fa-check" style="color: #ffffff; font-size: 14px;"></i><?php endif; ?>
                                    </button>
                                    <!-- 4. Verde más oscurito (Dark Green) -->
                                    <button type="button" class="color-option-btn <?= $config['tema'] === 'dark_green' ? 'selected' : ''; ?>" 
                                            style="background-color: #014235;" onclick="seleccionarTema('dark_green', this)" title="Verde Oscuro">
                                        <?php if ($config['tema'] === 'dark_green'): ?><i class="fa-solid fa-check" style="color: #ffffff; font-size: 14px;"></i><?php endif; ?>
                                    </button>
                                    <!-- 5. Azul más oscuro (Navy Blue) -->
                                    <button type="button" class="color-option-btn <?= ($config['tema'] === 'navy_blue' || $config['tema'] === 'slate_grey') ? 'selected' : ''; ?>" 
                                            style="background-color: #0f172a;" onclick="seleccionarTema('navy_blue', this)" title="Azul Marino Oscuro">
                                        <?php if ($config['tema'] === 'navy_blue' || $config['tema'] === 'slate_grey'): ?><i class="fa-solid fa-check" style="color: #ffffff; font-size: 14px;"></i><?php endif; ?>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Tipografía Segmentada -->
                        <div class="config-card">
                            <div style="display: flex; align-items: center; gap: 20px; flex: 1;">
                                <div class="config-icon-circle">TT</div>
                                <div class="config-info">
                                    <h3>Tipografía</h3>
                                    <p>Elige el tipo de letra que prefieres para la interfaz del sistema.</p>
                                </div>
                            </div>
                            <div class="config-control-panel">
                                <span class="control-label">Selecciona una tipografía</span>
                                <div class="font-buttons-group">
                                    <button type="button" class="font-option-btn <?= $config['tipografia'] === 'Segoe UI' ? 'selected' : ''; ?>" onclick="seleccionarFont('Segoe UI', this)">
                                        <?php if ($config['tipografia'] === 'Segoe UI'): ?><i class="fa-solid fa-check" style="color: inherit; font-size: 12px; margin-right: 4px;"></i><?php endif; ?> Segoe UI
                                    </button>
                                    <button type="button" class="font-option-btn <?= $config['tipografia'] === 'Inter' ? 'selected' : ''; ?>" onclick="seleccionarFont('Inter', this)">
                                        <?php if ($config['tipografia'] === 'Inter'): ?><i class="fa-solid fa-check" style="color: inherit; font-size: 12px; margin-right: 4px;"></i><?php endif; ?> Inter
                                    </button>
                                    <button type="button" class="font-option-btn <?= $config['tipografia'] === 'Poppins' ? 'selected' : ''; ?>" onclick="seleccionarFont('Poppins', this)">
                                        <?php if ($config['tipografia'] === 'Poppins'): ?><i class="fa-solid fa-check" style="color: inherit; font-size: 12px; margin-right: 4px;"></i><?php endif; ?> Poppins
                                    </button>
                                    <button type="button" class="font-option-btn <?= $config['tipografia'] === 'Roboto' ? 'selected' : ''; ?>" onclick="seleccionarFont('Roboto', this)">
                                        <?php if ($config['tipografia'] === 'Roboto'): ?><i class="fa-solid fa-check" style="color: inherit; font-size: 12px; margin-right: 4px;"></i><?php endif; ?> Roboto
                                    </button>
                                    <button type="button" class="font-option-btn <?= $config['tipografia'] === 'Nunito' ? 'selected' : ''; ?>" onclick="seleccionarFont('Nunito', this)">
                                        <?php if ($config['tipografia'] === 'Nunito'): ?><i class="fa-solid fa-check" style="color: inherit; font-size: 12px; margin-right: 4px;"></i><?php endif; ?> Nunito
                                    </button>
                                    <button type="button" class="font-option-btn <?= $config['tipografia'] === 'Open Sans' ? 'selected' : ''; ?>" onclick="seleccionarFont('Open Sans', this)">
                                        <?php if ($config['tipografia'] === 'Open Sans'): ?><i class="fa-solid fa-check" style="color: inherit; font-size: 12px; margin-right: 4px;"></i><?php endif; ?> Open Sans
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Tamaño de la fuente Slider -->
                        <div class="config-card">
                            <div style="display: flex; align-items: center; gap: 20px; flex: 1;">
                                <div class="config-icon-circle">Aa</div>
                                <div class="config-info">
                                    <h3>Tamaño de la fuente</h3>
                                    <p>Ajusta el tamaño de la fuente para mejorar la legibilidad en menús, paneles y tablas.</p>
                                </div>
                            </div>
                            <div class="config-control-panel">
                                <?php
                                    $sizeMapToVal = ['12px' => 1, '14px' => 2, '16px' => 3, '18px' => 4, '20px' => 5];
                                    $sizeLabels = [1 => 'Pequeño', 2 => 'Mediano', 3 => 'Grande', 4 => 'Muy Grande', 5 => 'Gigante'];
                                    $slider_val = $sizeMapToVal[$config['tamaño_Fuente']] ?? 2;
                                    $currentLabel = $sizeLabels[$slider_val] ?? 'Mediano';
                                ?>
                                <span class="control-label">Tamaño actual: <span id="currentSizeText" style="font-weight:700; color: var(--color-green);"><?= $currentLabel; ?></span></span>
                                <div class="font-size-slider-wrapper">
                                    <span class="slider-label-a small">A</span>
                                    
                                    <input type="range" min="1" max="5" step="1" value="<?= $slider_val; ?>" 
                                           class="font-size-range-input" id="fontSizeRange" oninput="actualizarLabelSize(this.value)">
                                    <input type="hidden" name="tamanho_fuente" id="selectedFontSize" value="<?= htmlspecialchars($config['tamaño_Fuente']); ?>">
                                    
                                    <span class="slider-label-a large">A</span>
                                </div>
                            </div>
                        </div>

                    </section>

                    <!-- Botones Acciones -->
                    <div class="config-footer-actions">
                        <button type="button" class="btn-config-reset" onclick="confirmarRestablecer()">
                            <i class="fa-solid fa-rotate-left"></i> Restablecer valores
                        </button>
                        <button type="submit" class="btn-config-save">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar cambios
                        </button>
                    </div>
                </form>

            <!-- ==========================================
                 SECCIÓN: USUARIOS (Gestión de Personal)
            =========================================== -->
            <?php elseif ($section === 'usuarios'): ?>
                <div class="config-section-card">
                    <div class="config-section-header">
                        <div>
                            <h2><i class="fa-solid fa-user-gear" style="color: var(--color-green);"></i> Gestión de Usuarios</h2>
                            <p>Controla quién accede al panel del negocio (Administradores y Vendedores).</p>
                        </div>
                    </div>

                    <div class="users-table-actions">
                        <button type="button" class="btn-add-user" onclick="abrirModalUsuario()">
                            <i class="fa-solid fa-user-plus"></i> + Agregar usuario
                        </button>
                    </div>

                    <div class="inventory-table-container">
                        <table class="inventory-table">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Documento</th>
                                    <th>Rol</th>
                                    <th>Correo Electrónico</th>
                                    <th>Teléfono</th>
                                    <th>Estado</th>
                                    <th style="text-align: center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($todosUsuarios) > 0): ?>
                                    <?php foreach ($todosUsuarios as $u): ?>
                                        <tr>
                                            <td style="font-weight: 700;">
                                                <?= htmlspecialchars($u['nombre'] . ' ' . $u['apellido']); ?>
                                                <div style="font-size: 11px; color: var(--text-muted); font-weight: normal;">@<?= htmlspecialchars($u['nombre_Usuario']); ?></div>
                                            </td>
                                            <td><?= htmlspecialchars($u['numero_Documento']); ?></td>
                                            <td>
                                                <span style="font-weight: 600; color: <?= ($u['id_Rol'] === 1) ? '#ec4899' : '#3b82f6'; ?>;">
                                                    <?= $u['rol_nombre']; ?>
                                                </span>
                                            </td>
                                            <td><?= htmlspecialchars($u['correo']); ?></td>
                                            <td><?= htmlspecialchars($u['telefono'] ? $u['telefono'] : '-'); ?></td>
                                            <td>
                                                <span class="status-badge" style="background-color: <?= ($u['estado'] === 'Activo') ? '#e6f7f0; color:#10b981;' : '#fee2e2; color:#ef4444;'; ?>; padding: 4px 8px; border-radius: 8px; font-size:11px; font-weight:700;">
                                                    <?= htmlspecialchars($u['estado']); ?>
                                                </span>
                                            </td>
                                            <td style="text-align: center;">
                                                <div style="display: flex; gap: 6px; justify-content: center;">
                                                    <button class="action-btn-circle" 
                                                            data-id="<?= $u['id_Usuario']; ?>"
                                                            data-nombre="<?= htmlspecialchars($u['nombre']); ?>"
                                                            data-apellido="<?= htmlspecialchars($u['apellido']); ?>"
                                                            data-doc="<?= htmlspecialchars($u['numero_Documento']); ?>"
                                                            data-rol="<?= $u['id_Rol']; ?>"
                                                            data-tel="<?= htmlspecialchars($u['telefono']); ?>"
                                                            data-correo="<?= htmlspecialchars($u['correo']); ?>"
                                                            data-user="<?= htmlspecialchars($u['nombre_Usuario']); ?>"
                                                            data-estado="<?= htmlspecialchars($u['estado']); ?>"
                                                            onclick="abrirModalUsuario(this)" title="Editar">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </button>
                                                    <?php if ($u['id_Usuario'] !== $id_usuario): ?>
                                                        <button class="action-btn-circle delete" onclick="confirmarEliminarUsuario(<?= $u['id_Usuario']; ?>, '<?= htmlspecialchars($u['nombre'] . ' ' . $u['apellido']); ?>')" title="Eliminar">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 25px;">
                                            No se encontraron usuarios configurados.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            <!-- ==========================================
                 SECCIÓN: DATOS DE LA EMPRESA
            =========================================== -->
            <?php elseif ($section === 'empresa'): ?>
                <div class="config-section-card">
                    <div class="config-section-header">
                        <div>
                            <h2><i class="fa-solid fa-building" style="color: var(--color-green);"></i> Datos de la Empresa</h2>
                            <p>Actualiza la información comercial que aparecerá en tus comprobantes y reportes.</p>
                        </div>
                    </div>

                    <form action="configuracion.php?section=empresa" method="POST">
                        <input type="hidden" name="action" value="guardar_empresa">
                        
                        <div class="config-form-grid">
                            <div class="config-form-group">
                                <label for="empNombre">Nombre Comercial</label>
                                <input type="text" name="nombre" id="empNombre" class="config-form-input" 
                                       value="<?= htmlspecialchars($empresa['nombre'] ?? ''); ?>" required>
                            </div>
                            
                            <div class="config-form-group">
                                <label for="empNit">RUC / NIT / Identificación</label>
                                <input type="text" name="nit" id="empNit" class="config-form-input" 
                                       value="<?= htmlspecialchars($empresa['nit'] ?? ''); ?>" required>
                            </div>

                            <div class="config-form-group">
                                <label for="empTel">Teléfono de contacto</label>
                                <input type="text" name="telefono" id="empTel" class="config-form-input" 
                                       value="<?= htmlspecialchars($empresa['telefono'] ?? ''); ?>">
                            </div>

                            <div class="config-form-group">
                                <label for="empCorreo">Correo electrónico</label>
                                <input type="email" name="correo" id="empCorreo" class="config-form-input" 
                                       value="<?= htmlspecialchars($empresa['correo'] ?? ''); ?>">
                            </div>

                            <div class="config-form-group form-group-full">
                                <label for="empDir">Dirección Comercial</label>
                                <input type="text" name="direccion" id="empDir" class="config-form-input" 
                                       value="<?= htmlspecialchars($empresa['direccion'] ?? ''); ?>">
                            </div>

                            <div class="config-form-group">
                                <label for="empMoneda">Símbolo de Moneda</label>
                                <input type="text" name="moneda" id="empMoneda" class="config-form-input" 
                                       value="<?= htmlspecialchars($empresa['moneda'] ?? '$'); ?>" maxlength="3" required>
                            </div>

                            <div class="config-form-group">
                                <label for="empIva">Tasa de Impuesto / IVA (%)</label>
                                <input type="number" name="iva" id="empIva" class="config-form-input" min="0" max="100" 
                                       value="<?= htmlspecialchars($empresa['iva'] ?? '0'); ?>" required>
                            </div>
                        </div>

                        <div class="config-footer-actions">
                            <button type="submit" class="btn-config-save">
                                <i class="fa-solid fa-floppy-disk"></i> Guardar datos de empresa
                            </button>
                        </div>
                    </form>
                </div>

            <!-- ==========================================
                 SECCIÓN: COPIAS DE SEGURIDAD / RESPALDOS
            =========================================== -->
            <?php elseif ($section === 'respaldos'): ?>
                <div class="config-section-card">
                    <div class="config-section-header">
                        <div>
                            <h2><i class="fa-solid fa-database" style="color: var(--color-green);"></i> Respaldos de Base de Datos</h2>
                            <p>Mantén copias de seguridad locales del inventario, ventas y clientes de tu negocio.</p>
                        </div>
                    </div>

                    <div class="backup-option-box">
                        <div class="backup-details">
                            <div class="backup-icon-wrapper">
                                <i class="fa-solid fa-file-arrow-down" style="color:#014235;"></i>
                            </div>
                            <div class="backup-text">
                                <h4>Descargar Respaldo Completo (.sql)</h4>
                                <p>Copia de seguridad en formato SQL lista para importar en caso de emergencia.</p>
                            </div>
                        </div>
                        <a href="configuracion.php?section=respaldos&download_backup=1" class="btn-backup-download">
                            <i class="fa-solid fa-download"></i> Descargar SQL
                        </a>
                    </div>
                </div>

            <!-- ==========================================
                 SECCIÓN: NOTIFICACIONES / UMBRALES
            =========================================== -->
            <?php elseif ($section === 'notificaciones'): ?>
                <div class="config-section-card">
                    <div class="config-section-header">
                        <div>
                            <h2><i class="fa-solid fa-bell" style="color: var(--color-green);"></i> Alertas y Notificaciones</h2>
                            <p>Configura los límites para los avisos del sistema (ej. stock bajo).</p>
                        </div>
                    </div>

                    <form action="configuracion.php?section=notificaciones" method="POST">
                        <input type="hidden" name="action" value="guardar_notificaciones">
                        
                        <div class="config-form-grid">
                            <div class="config-form-group">
                                <label for="stockLimite">Límite de Stock Mínimo General</label>
                                <input type="number" name="stock_bajo_limite" id="stockLimite" class="config-form-input" min="1" 
                                       value="<?= htmlspecialchars($notif['stock_bajo_limite'] ?? 5); ?>" required>
                                <span style="font-size: 11px; color: var(--text-muted);">Los productos con existencias iguales o inferiores a esta cantidad se clasificarán como "Stock bajo".</span>
                            </div>

                            <div class="config-form-group">
                                <label for="alertaCorreo">Correo para envío de alertas</label>
                                <input type="email" name="alerta_correo" id="alertaCorreo" class="config-form-input" 
                                       value="<?= htmlspecialchars($notif['alerta_correo'] ?? ''); ?>">
                            </div>

                            <div class="config-form-group form-group-full" style="flex-direction:row; align-items:center; gap:20px; margin-top: 15px;">
                                <label style="margin-bottom:0; cursor:pointer;" for="enviarAlertas">Activar notificaciones críticas por correo electrónico</label>
                                <label class="switch-toggle-wrapper">
                                    <input type="checkbox" name="enviar_alertas" id="enviarAlertas" <?= (int)($notif['enviar_alertas'] ?? 0) === 1 ? 'checked' : ''; ?>>
                                    <span class="slider-round"></span>
                                </label>
                            </div>
                        </div>

                        <div class="config-footer-actions">
                            <button type="submit" class="btn-config-save">
                                <i class="fa-solid fa-floppy-disk"></i> Guardar umbrales
                            </button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>

        </main>
    </div>

    <!-- ==========================================
         MODALES DE OPERACIÓN (USUARIO)
    =========================================== -->
    <?php if ($section === 'usuarios'): ?>
        <div class="modal" id="modalUsuario">
            <div class="modal-content" style="max-width: 550px;">
                <div class="modal-header">
                    <h3 id="modalTitle">Agregar Usuario</h3>
                    <button class="modal-close-btn" onclick="cerrarModalUsuario()">&times;</button>
                </div>
                <form action="configuracion.php?section=usuarios" method="POST">
                    <input type="hidden" name="action" value="guardar_usuario">
                    <input type="hidden" name="id_Usuario" id="userId" value="0">
                    
                    <div class="modal-body" style="padding:20px 25px;">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                            <div class="config-form-group">
                                <label for="userNombre">Nombre *</label>
                                <input type="text" name="nombre" id="userNombre" class="config-form-input" required>
                            </div>
                            <div class="config-form-group">
                                <label for="userApellido">Apellido *</label>
                                <input type="text" name="apellido" id="userApellido" class="config-form-input" required>
                            </div>
                            <div class="config-form-group">
                                <label for="userDoc">Documento *</label>
                                <input type="text" name="numero_Documento" id="userDoc" class="config-form-input" required>
                            </div>
                            <div class="config-form-group">
                                <label for="userRol">Rol *</label>
                                <select name="id_Rol" id="userRol" class="config-form-input" required>
                                    <option value="1">Administrador</option>
                                    <option value="2">Vendedor</option>
                                </select>
                            </div>
                            <div class="config-form-group">
                                <label for="userTel">Teléfono</label>
                                <input type="text" name="telefono" id="userTel" class="config-form-input">
                            </div>
                            <div class="config-form-group">
                                <label for="userCorreo">Correo Electrónico *</label>
                                <input type="email" name="correo" id="userCorreo" class="config-form-input" required>
                            </div>
                            <div class="config-form-group">
                                <label for="userNombreUsuario">Usuario de Acceso *</label>
                                <input type="text" name="nombre_Usuario" id="userNombreUsuario" class="config-form-input" required>
                            </div>
                            <div class="config-form-group">
                                <label for="userPass" id="userPassLabel">Contraseña *</label>
                                <input type="password" name="contraseña" id="userPass" class="config-form-input">
                            </div>
                            <div class="config-form-group" style="grid-column: span 2;">
                                <label for="userEstado">Estado *</label>
                                <select name="estado" id="userEstado" class="config-form-input" required>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="padding: 15px 25px; border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 10px;">
                        <button type="button" class="btn-config-reset" onclick="cerrarModalUsuario()" style="padding:8px 18px;">Cancelar</button>
                        <button type="submit" class="btn-config-save" style="padding:8px 20px;">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Formulario oculto para eliminar usuario -->
        <form id="deleteUserForm" action="configuracion.php?section=usuarios" method="POST" style="display:none;">
            <input type="hidden" name="action" value="eliminar_usuario">
            <input type="hidden" name="id_Usuario" id="deleteUserId" value="0">
        </form>
    <?php endif; ?>

    <!-- JS Drawer & Controllers -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebarClose = document.getElementById('sidebarClose');

        function openSidebar() {
            sidebar.classList.add('open');
        }

        function closeSidebar() {
            sidebar.classList.remove('open');
        }

        mobileMenu.addEventListener('click', openSidebar);
        sidebarClose.addEventListener('click', closeSidebar);

        // Controladores de Apariencia
        function seleccionarTema(tema, element) {
            document.getElementById('selectedTema').value = tema;
            document.querySelectorAll('.color-option-btn').forEach(btn => {
                btn.classList.remove('selected');
                const check = btn.querySelector('i');
                if (check) check.remove();
            });
            element.classList.add('selected');
            element.innerHTML = '<i class="fa-solid fa-check" style="color: #ffffff; font-size: 14px;"></i>';
        }

        function seleccionarFont(font, element) {
            document.getElementById('selectedTipografia').value = font;
            document.querySelectorAll('.font-option-btn').forEach(btn => {
                btn.classList.remove('selected');
                const check = btn.querySelector('i');
                if (check) check.remove();
            });
            element.classList.add('selected');
            element.innerHTML = '<i class="fa-solid fa-check" style="color: inherit; font-size: 12px; margin-right: 4px;"></i> ' + font;
        }

        const valToSizeMap = {
            1: '12px',
            2: '14px',
            3: '16px',
            4: '18px',
            5: '20px'
        };

        const sizeLabels = {
            1: 'Pequeño',
            2: 'Mediano',
            3: 'Grande',
            4: 'Muy Grande',
            5: 'Gigante'
        };

        function actualizarLabelSize(val) {
            const fontPixel = valToSizeMap[val] || '14px';
            document.getElementById('selectedFontSize').value = fontPixel;
            document.getElementById('currentSizeText').textContent = sizeLabels[val] || 'Mediano';
        }

        // Confirmar restablecimiento de apariencia
        function confirmarRestablecer() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Se aplicará el tema verde y la fuente estándar del sistema.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#014235',
                cancelButtonColor: '#e2e8f0',
                confirmButtonText: 'Sí, restablecer',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('configForm');
                    document.getElementById('formAction').value = 'restablecer_apariencia';
                    form.submit();
                }
            });
        }

        // Modales de Gestión de Usuario
        <?php if ($section === 'usuarios'): ?>
            function abrirModalUsuario(btn = null) {
                const modal = document.getElementById('modalUsuario');
                if (btn) {
                    document.getElementById('modalTitle').textContent = "Editar Usuario";
                    document.getElementById('userId').value = btn.dataset.id;
                    document.getElementById('userNombre').value = btn.dataset.nombre;
                    document.getElementById('userApellido').value = btn.dataset.apellido;
                    document.getElementById('userDoc').value = btn.dataset.doc;
                    document.getElementById('userRol').value = btn.dataset.rol;
                    document.getElementById('userTel').value = btn.dataset.tel;
                    document.getElementById('userCorreo').value = btn.dataset.correo;
                    document.getElementById('userNombreUsuario').value = btn.dataset.user;
                    document.getElementById('userEstado').value = btn.dataset.estado;
                    document.getElementById('userPassLabel').textContent = "Nueva Contraseña (vacío para conservar)";
                    document.getElementById('userPass').required = false;
                } else {
                    document.getElementById('modalTitle').textContent = "Agregar Usuario";
                    document.getElementById('userId').value = "0";
                    document.getElementById('userNombre').value = "";
                    document.getElementById('userApellido').value = "";
                    document.getElementById('userDoc').value = "";
                    document.getElementById('userRol').value = "2";
                    document.getElementById('userTel').value = "";
                    document.getElementById('userCorreo').value = "";
                    document.getElementById('userNombreUsuario').value = "";
                    document.getElementById('userPass').value = "";
                    document.getElementById('userEstado').value = "Activo";
                    document.getElementById('userPassLabel').textContent = "Contraseña *";
                    document.getElementById('userPass').required = true;
                }
                modal.classList.add('open');
            }

            function cerrarModalUsuario() {
                document.getElementById('modalUsuario').classList.remove('open');
            }

            function confirmarEliminarUsuario(id, nombre) {
                Swal.fire({
                    title: '¿Eliminar usuario?',
                    text: "Esta acción borrará a " + nombre + " y su historial de acceso al panel.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#e2e8f0',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteUserId').value = id;
                        document.getElementById('deleteUserForm').submit();
                    }
                });
            }
        <?php endif; ?>

        // Alertas SweetAlert
        <?php if ($mensaje !== ''): ?>
            Swal.fire({
                icon: '<?= $tipo_alerta; ?>',
                title: '<?= $titulo_alerta; ?>',
                text: '<?= $mensaje; ?>',
                confirmButtonColor: '#014235'
            });
        <?php endif; ?>
    </script>
</body>

</html>
