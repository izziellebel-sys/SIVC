<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/load_config.php';

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

// Obtener info del administrador logueado para mostrar en el modal del ojo
$id_admin_logueado = $_SESSION['id_Usuario'] ?? 0;
$resAdminLogueado = $conn->query("SELECT * FROM usuarios WHERE id_Usuario = $id_admin_logueado");
$adminLogueadoInfo = $resAdminLogueado ? $resAdminLogueado->fetch_assoc() : null;

$adminEmail = $adminLogueadoInfo['correo'] ?? 'admin@sivc.com';
$nombreUsuario = trim(($adminLogueadoInfo['nombre'] ?? '') . ' ' . ($adminLogueadoInfo['apellido'] ?? ''));
if (empty($nombreUsuario)) {
    $nombreUsuario = $_SESSION['usuario'] ?? 'Administrador';
}

$mensaje = "";
$tipo_alerta = "";
$titulo_alerta = "";

// PROCESAR POST ACCIONES
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'] ?? '';

    if ($action === 'agregar') {
        $nombre = trim($_POST['nombre'] ?? '');
        $apellido = trim($_POST['apellido'] ?? '');
        $documento = trim($_POST['documento'] ?? '');
        $correo = trim($_POST['correo'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $usuario = trim($_POST['usuario'] ?? '');
        $password = $_POST['contraseña'] ?? '';
        $estado = $_POST['estado'] ?? 'Activo';
        $id_rol = '2'; // Rol 2 = Vendedor

        if ($nombre && $apellido && $documento && $correo && $usuario && $password) {
            // Verificar duplicados (documento, correo o usuario)
            $stmtCheck = $conn->prepare("SELECT id_Usuario FROM usuarios WHERE numero_Documento = ? OR correo = ? OR nombre_Usuario = ?");
            $stmtCheck->bind_param("sss", $documento, $correo, $usuario);
            $stmtCheck->execute();
            $resCheck = $stmtCheck->get_result();
            
            if ($resCheck->num_rows > 0) {
                $mensaje = "El documento, correo o nombre de usuario ya está registrado en el sistema.";
                $tipo_alerta = "error";
                $titulo_alerta = "Duplicado";
            } else {
                // Registrar
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $stmtInsert = $conn->prepare("INSERT INTO usuarios (nombre, apellido, numero_Documento, id_Rol, telefono, correo, nombre_Usuario, contraseña, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                if ($stmtInsert) {
                    $stmtInsert->bind_param("sssssssss", $nombre, $apellido, $documento, $id_rol, $telefono, $correo, $usuario, $hashed_password, $estado);
                    if ($stmtInsert->execute()) {
                        $mensaje = "El vendedor ha sido registrado correctamente.";
                        $tipo_alerta = "success";
                        $titulo_alerta = "¡Éxito!";
                    } else {
                        $mensaje = "Error al intentar insertar en la base de datos.";
                        $tipo_alerta = "error";
                        $titulo_alerta = "Error";
                    }
                    $stmtInsert->close();
                }
            }
            $stmtCheck->close();
        } else {
            $mensaje = "Todos los campos obligatorios deben estar completos.";
            $tipo_alerta = "warning";
            $titulo_alerta = "Campos vacíos";
        }
    } elseif ($action === 'editar') {
        $id_vendedor = (int)($_POST['id_usuario'] ?? 0);
        $nombre = trim($_POST['nombre'] ?? '');
        $apellido = trim($_POST['apellido'] ?? '');
        $documento = trim($_POST['documento'] ?? '');
        $correo = trim($_POST['correo'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $usuario = trim($_POST['usuario'] ?? '');
        $password = $_POST['contraseña'] ?? '';
        $estado = $_POST['estado'] ?? 'Activo';

        if ($id_vendedor > 0 && $nombre && $apellido && $documento && $correo && $usuario) {
            // Verificar duplicados excluyendo al vendedor actual
            $stmtCheck = $conn->prepare("SELECT id_Usuario FROM usuarios WHERE (numero_Documento = ? OR correo = ? OR nombre_Usuario = ?) AND id_Usuario != ?");
            $stmtCheck->bind_param("sssi", $documento, $correo, $usuario, $id_vendedor);
            $stmtCheck->execute();
            $resCheck = $stmtCheck->get_result();

            if ($resCheck->num_rows > 0) {
                $mensaje = "El documento, correo o usuario pertenece a otro registro.";
                $tipo_alerta = "error";
                $titulo_alerta = "Duplicado";
            } else {
                // Si la contraseña está vacía, no actualizarla
                if ($password !== '') {
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                    $stmtUpdate = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, numero_Documento = ?, correo = ?, telefono = ?, nombre_Usuario = ?, contraseña = ?, estado = ? WHERE id_Usuario = ? AND id_Rol = 2");
                    $stmtUpdate->bind_param("ssssssssi", $nombre, $apellido, $documento, $correo, $telefono, $usuario, $hashed_password, $estado, $id_vendedor);
                } else {
                    $stmtUpdate = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, numero_Documento = ?, correo = ?, telefono = ?, nombre_Usuario = ?, estado = ? WHERE id_Usuario = ? AND id_Rol = 2");
                    $stmtUpdate->bind_param("sssssssi", $nombre, $apellido, $documento, $correo, $telefono, $usuario, $estado, $id_vendedor);
                }

                if ($stmtUpdate) {
                    if ($stmtUpdate->execute()) {
                        $mensaje = "La información del vendedor ha sido actualizada.";
                        $tipo_alerta = "success";
                        $titulo_alerta = "¡Éxito!";
                    } else {
                        $mensaje = "Error al actualizar la base de datos.";
                        $tipo_alerta = "error";
                        $titulo_alerta = "Error";
                    }
                    $stmtUpdate->close();
                }
            }
            $stmtCheck->close();
        }
    } elseif ($action === 'eliminar') {
        $id_vendedor = (int)($_POST['id_usuario'] ?? 0);
        
        if ($id_vendedor > 0) {
            // Intentar eliminación. Si tiene ventas, cambiar estado a 'Inactivo' de forma segura.
            try {
                $stmtDel = $conn->prepare("DELETE FROM usuarios WHERE id_Usuario = ? AND id_Rol = 2");
                $stmtDel->bind_param("i", $id_vendedor);
                
                if ($stmtDel->execute()) {
                    if ($stmtDel->affected_rows > 0) {
                        $mensaje = "El vendedor ha sido eliminado del sistema.";
                        $tipo_alerta = "success";
                        $titulo_alerta = "¡Eliminado!";
                    } else {
                        $mensaje = "No se encontró el vendedor o no se pudo eliminar.";
                        $tipo_alerta = "error";
                        $titulo_alerta = "Error";
                    }
                }
                $stmtDel->close();
            } catch (mysqli_sql_exception $e) {
                // Llave foránea detectada, cambiar a Inactivo en lugar de fallar
                $stmtInact = $conn->prepare("UPDATE usuarios SET estado = 'Inactivo' WHERE id_Usuario = ? AND id_Rol = 2");
                $stmtInact->bind_param("i", $id_vendedor);
                if ($stmtInact->execute()) {
                    $mensaje = "El vendedor tiene ventas asociadas y no puede ser eliminado. Su estado ha sido cambiado a 'Inactivo'.";
                    $tipo_alerta = "warning";
                    $titulo_alerta = "Vendedor Desactivado";
                } else {
                    $mensaje = "Error al intentar desactivar el vendedor.";
                    $tipo_alerta = "error";
                    $titulo_alerta = "Error";
                }
                $stmtInact->close();
            }
        }
    }
}

// RECUPERAR ESTADÍSTICAS
// 1. Total Vendedores
$resTotal = $conn->query("SELECT COUNT(*) as total FROM usuarios WHERE id_Rol = 2");
$totalVendedores = $resTotal ? (int)$resTotal->fetch_assoc()['total'] : 0;

// 2. Vendedores Activos
$resActivos = $conn->query("SELECT COUNT(*) as total FROM usuarios WHERE id_Rol = 2 AND estado = 'Activo'");
$vendedoresActivos = $resActivos ? (int)$resActivos->fetch_assoc()['total'] : 0;

// 3. Nuevos este mes
$resNuevos = $conn->query("SELECT COUNT(*) as total FROM usuarios WHERE id_Rol = 2 AND MONTH(fecha_Registro) = MONTH(CURRENT_DATE()) AND YEAR(fecha_Registro) = YEAR(CURRENT_DATE())");
$nuevosMes = $resNuevos ? (int)$resNuevos->fetch_assoc()['total'] : 0;

// 4. Total en comisiones (5% del total de las ventas completadas)
$resComm = $conn->query("SELECT SUM(total) as total FROM venta WHERE estado = 'Completada'");
$totalVentasRealizadas = $resComm ? (float)$resComm->fetch_assoc()['total'] : 0.0;
$totalComisiones = $totalVentasRealizadas * 0.05;

// FILTROS Y BÚSQUEDA
$buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
$estadoFiltro = isset($_GET['estado']) ? trim($_GET['estado']) : 'Todos';

$whereClauses = ["id_Rol = 2"];
$params = [];
$types = "";

if ($buscar !== '') {
    $whereClauses[] = "(nombre LIKE ? OR apellido LIKE ? OR nombre_Usuario LIKE ? OR numero_Documento LIKE ?)";
    $searchWildcard = "%" . $buscar . "%";
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
    $types .= "ssss";
}

if ($estadoFiltro !== 'Todos') {
    $whereClauses[] = "estado = ?";
    $params[] = $estadoFiltro;
    $types .= "s";
}

$whereSql = "WHERE " . implode(" AND ", $whereClauses);

// PAGINACIÓN
$limite = 5;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;

// Contar total de registros filtrados
$countQuery = "SELECT COUNT(*) as total FROM usuarios $whereSql";
$stmtCount = $conn->prepare($countQuery);
if ($stmtCount) {
    if (!empty($params)) {
        $stmtCount->bind_param($types, ...$params);
    }
    $stmtCount->execute();
    $totalFiltrados = $stmtCount->get_result()->fetch_assoc()['total'];
    $stmtCount->close();
} else {
    $totalFiltrados = 0;
}

$totalPaginas = ceil($totalFiltrados / $limite);
if ($totalPaginas < 1) $totalPaginas = 1;
if ($pagina > $totalPaginas) $pagina = $totalPaginas;
$offset = ($pagina - 1) * $limite;

// CONSULTAR VENDEDORES PAGINADOS
$query = "SELECT * FROM usuarios $whereSql ORDER BY fecha_Registro DESC LIMIT ?, ?";
$stmt = $conn->prepare($query);

$execParams = $params;
$execTypes = $types;
$execParams[] = $offset;
$execParams[] = $limite;
$execTypes .= "ii";

$vendedores = [];
if ($stmt) {
    $stmt->bind_param($execTypes, ...$execParams);
    $stmt->execute();
    $resVendedores = $stmt->get_result();
    while ($row = $resVendedores->fetch_assoc()) {
        // Calcular estadísticas de venta por vendedor
        $idU = $row['id_Usuario'];
        $resSales = $conn->query("SELECT COUNT(*) as cant, SUM(total) as sum_total FROM venta WHERE id_Usuario = $idU AND estado = 'Completada'");
        $salesInfo = $resSales ? $resSales->fetch_assoc() : ['cant' => 0, 'sum_total' => 0.00];
        
        $row['ventas_cant'] = $salesInfo['cant'] ?? 0;
        $row['ventas_monto'] = $salesInfo['sum_total'] ?? 0.00;
        $vendedores[] = $row;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedores | SIVC</title>

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

    <!-- CSS Dashboard & Vendedores Local (Cache Busted) -->
    <link rel="stylesheet" href="admi.css/dashboard_admi.css?v=<?= time() ?>">
    <link rel="stylesheet" href="admi.css/vendedores_admi.css?v=<?= time() ?>">
    
    <!-- Cargar configuración dinámica de temas y fuentes -->
    <?php aplicarConfiguracionEstilos(); ?>
</head>

<body>

    <div class="dashboard-container">

        <!-- ==========================================
             SIDEBAR (BARRA LATERAL)
        =========================================== -->
        <aside class="sidebar" id="sidebar">
            <button class="sidebar-toggle-btn" id="sidebarClose">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- Store Logo Section (Matches SIVC mockup) -->
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

                <a href="vendedores.php" class="sidebar-link-card active">
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

                <a href="configuracion.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-gear"></i>
                        <span>Configuración</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
            </nav>

            <!-- Logout Link -->
            <div class="sidebar-footer-section">
                <a href="../../controllers/logout.php" class="sidebar-logout-btn">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Cerrar sesión</span>
                </a>
            </div>
        </aside>

        <!-- ==========================================
             MAIN CONTENT (CONTENIDO PRINCIPAL)
        =========================================== -->
        <main class="main-content">
            <!-- Mobile Toggle Drawer Button -->
            <button class="mobile-toggle-btn" id="mobileMenu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Content Header -->
            <header class="content-header">
                <div class="welcome-header-text">
                    <h1>Vendedores</h1>
                    <p>Gestiona la información de tus vendedores.</p>
                </div>

                <div class="header-right-widgets">
                    <!-- Date Widget -->
                    <div class="datetime-card">
                        <i class="fa-regular fa-calendar"></i>
                        <div class="datetime-details">
                            <strong><?= htmlspecialchars($fechaString); ?></strong>
                            <span><?= htmlspecialchars($horaString); ?></span>
                        </div>
                    </div>

                    <!-- User Profile Dropdown -->
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

            <!-- Metrics Cards Row -->
            <section class="vendedores-stats-row">
                <!-- Card 1: Total Vendedores -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle circle-green" style="background-color: #e6f7f0; color: #10b981;">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Total vendedores</span>
                        <span class="stat-number"><?= $totalVendedores; ?></span>
                        <span class="stat-desc">Vendedores registrados</span>
                    </div>
                </div>

                <!-- Card 2: Vendedores Activos -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle circle-blue" style="background-color: #eef2ff; color: #3b82f6;">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Vendedores activos</span>
                        <span class="stat-number"><?= $vendedoresActivos; ?></span>
                        <span class="stat-desc">Con sesión iniciada</span>
                    </div>
                </div>

                <!-- Card 3: Nuevos del mes -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle circle-pink" style="background-color: #fdf2f8; color: #ec4899;">
                        <i class="fa-solid fa-calendar-plus"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Nuevos este mes</span>
                        <span class="stat-number"><?= $nuevosMes; ?></span>
                        <span class="stat-desc">Vendedores registrados</span>
                    </div>
                </div>

                <!-- Card 4: Total en comisiones -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle circle-orange" style="background-color: #fff0e6; color: #f97316;">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Total en comisiones</span>
                        <span class="stat-number">$<?= number_format($totalComisiones, 0, ',', '.'); ?></span>
                        <span class="stat-desc">Comisiones acumuladas</span>
                    </div>
                </div>
            </section>

            <!-- Filter and Search Bar -->
            <section class="filter-section">
                <form action="vendedores.php" method="GET" class="filter-bar-form">
                    <div class="filters-left-group">
                        <div class="filter-input-group">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" name="buscar" placeholder="Buscar vendedor..." value="<?= htmlspecialchars($buscar); ?>" onchange="this.form.submit();">
                        </div>

                        <div class="filter-select-wrapper">
                            <label for="filterEstado">Estado</label>
                            <select name="estado" id="filterEstado" onchange="this.form.submit()">
                                <option value="Todos" <?= $estadoFiltro === 'Todos' ? 'selected' : ''; ?>>Todos</option>
                                <option value="Activo" <?= $estadoFiltro === 'Activo' ? 'selected' : ''; ?>>Activo</option>
                                <option value="Inactivo" <?= $estadoFiltro === 'Inactivo' ? 'selected' : ''; ?>>Inactivo</option>
                            </select>
                        </div>

                        <!-- Clean Filters (Always visible) -->
                        <button type="button" class="btn-clear-filters" onclick="window.location.href='vendedores.php'">
                            <i class="fa-solid fa-filter-circle-xmark"></i> Limpiar filtros
                        </button>
                    </div>

                    <!-- Add Seller Button (Opens Modal) -->
                    <button type="button" class="btn-add-vendedor" onclick="abrirModalAgregar()" style="display: inline-flex; align-items: center; gap: 8px; border: none; cursor: pointer;">
                        <i class="fa-solid fa-plus"></i> Agregar vendedor
                    </button>
                </form>
            </section>

            <!-- Sellers Table Container -->
            <section class="vendedores-table-container">
                <div class="vendedores-table-wrapper">
                    <table class="vendedores-table">
                        <thead>
                            <tr>
                                <th>Vendedor</th>
                                <th>Nombre Usuario</th>
                                <th>Correo</th>
                                <th>Fecha Registro</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($vendedores) > 0): ?>
                                <?php foreach ($vendedores as $v): 
                                    // Initials for avatar
                                    $iniciales = strtoupper(substr($v['nombre'], 0, 1) . substr($v['apellido'], 0, 1));
                                    
                                    // Avatar color class based on id_Usuario
                                    $coloresInitials = ['circle-green', 'circle-blue', 'circle-orange', 'circle-pink', 'circle-teal', 'circle-purple'];
                                    $colorClass = $coloresInitials[$v['id_Usuario'] % count($coloresInitials)];
                                ?>
                                    <tr>
                                        <td>
                                            <div class="vendedor-profile-cell">
                                                <div class="vendedor-avatar-mini <?= $colorClass; ?>">
                                                    <?= $iniciales; ?>
                                                </div>
                                                <div class="vendedor-name-cell">
                                                    <?= htmlspecialchars($v['nombre'] . ' ' . $v['apellido']); ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= htmlspecialchars($v['nombre_Usuario']); ?></td>
                                        <td><?= htmlspecialchars($v['correo']); ?></td>
                                        <td><?= date('d/m/Y', strtotime($v['fecha_Registro'])); ?></td>
                                        <td>
                                            <span class="status-badge <?= strtolower($v['estado']); ?>">
                                                <?= htmlspecialchars($v['estado']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-buttons-group">
                                                <!-- Detalle -->
                                                <button type="button" class="btn-action" title="Ver Detalle" 
                                                        data-id="<?= $v['id_Usuario']; ?>"
                                                        data-nombre="<?= htmlspecialchars($v['nombre']); ?>"
                                                        data-apellido="<?= htmlspecialchars($v['apellido']); ?>"
                                                        data-doc="<?= htmlspecialchars($v['numero_Documento']); ?>"
                                                        data-correo="<?= htmlspecialchars($v['correo']); ?>"
                                                        data-tel="<?= htmlspecialchars($v['telefono'] ?? 'N/A'); ?>"
                                                        data-user="<?= htmlspecialchars($v['nombre_Usuario']); ?>"
                                                        data-password="<?= htmlspecialchars($v['contraseña']); ?>"
                                                        data-fecha="<?= date('d/m/Y', strtotime($v['fecha_Registro'])); ?>"
                                                        data-acceso="<?= $v['ultimo_Acceso'] ? date('d/m/Y H:i', strtotime($v['ultimo_Acceso'])) : 'Nunca'; ?>"
                                                        data-estado="<?= htmlspecialchars($v['estado']); ?>"
                                                        data-ventas-cant="<?= $v['ventas_cant']; ?>"
                                                        data-ventas-monto="$<?= number_format($v['ventas_monto'], 0, ',', '.'); ?>"
                                                        onclick="abrirModalDetalle(this)">
                                                    <i class="fa-regular fa-eye"></i>
                                                </button>
                                                <!-- Editar -->
                                                <button type="button" class="btn-action" title="Editar"
                                                        data-id="<?= $v['id_Usuario']; ?>"
                                                        data-nombre="<?= htmlspecialchars($v['nombre']); ?>"
                                                        data-apellido="<?= htmlspecialchars($v['apellido']); ?>"
                                                        data-doc="<?= htmlspecialchars($v['numero_Documento']); ?>"
                                                        data-correo="<?= htmlspecialchars($v['correo']); ?>"
                                                        data-tel="<?= htmlspecialchars($v['telefono'] ?? ''); ?>"
                                                        data-user="<?= htmlspecialchars($v['nombre_Usuario']); ?>"
                                                        data-estado="<?= htmlspecialchars($v['estado']); ?>"
                                                        onclick="abrirModalEditar(this)">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </button>
                                                <!-- Eliminar -->
                                                <button type="button" class="btn-action delete" title="Eliminar" 
                                                        onclick="confirmarEliminar(<?= $v['id_Usuario']; ?>, '<?= htmlspecialchars($v['nombre'] . ' ' . $v['apellido']); ?>')">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 25px;">
                                        No se encontraron vendedores en el sistema.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Footer de la Tabla (Paginación) -->
                <div class="table-footer-row" style="justify-content: flex-end;">
                    <!-- Controles Paginación -->
                    <div style="display: flex; flex-direction: column; align-items: flex-end;">
                        <div class="pagination-controls">
                            <a href="vendedores.php?buscar=<?= urlencode($buscar); ?>&estado=<?= urlencode($estadoFiltro); ?>&pagina=<?= $pagina - 1; ?>" 
                               class="pagination-btn <?= $pagina <= 1 ? 'disabled' : ''; ?>"><</a>
                            
                            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                <a href="vendedores.php?buscar=<?= urlencode($buscar); ?>&estado=<?= urlencode($estadoFiltro); ?>&pagina=<?= $i; ?>" 
                                   class="pagination-btn <?= $pagina == $i ? 'active' : ''; ?>"><?= $i; ?></a>
                            <?php endfor; ?>

                            <a href="vendedores.php?buscar=<?= urlencode($buscar); ?>&estado=<?= urlencode($estadoFiltro); ?>&pagina=<?= $pagina + 1; ?>" 
                               class="pagination-btn <?= $pagina >= $totalPaginas ? 'disabled' : ''; ?>">></a>
                        </div>
                        <span class="pagination-info-text">
                            Mostrando <?= count($vendedores); ?> de <?= $totalFiltrados; ?> vendedores
                        </span>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- ==========================================
         MODALES DE OPERACIÓN
    =========================================== -->
    
    <!-- 1. MODAL: REGISTRAR VENDEDOR -->
    <div class="modal" id="modalAgregar">
        <div class="modal-content modal-compact">
            <div class="modal-header">
                <h2>Registrar Vendedor</h2>
                <button type="button" class="modal-close-btn" onclick="cerrarModalAgregar()">&times;</button>
            </div>
            <div class="modal-body">
                <form action="vendedores.php" method="POST" id="formAgregar">
                    <input type="hidden" name="action" value="agregar">
                    
                    <div class="modal-grid-form">
                        <div class="form-field-group">
                            <label for="addNombre">Nombre *</label>
                            <input type="text" name="nombre" id="addNombre" placeholder="Ej. Tatiana" required>
                        </div>
                        <div class="form-field-group">
                            <label for="addApellido">Apellido *</label>
                            <input type="text" name="apellido" id="addApellido" placeholder="Ej. Herrera" required>
                        </div>
                        <div class="form-field-group">
                            <label for="addDocumento">Documento de Identidad *</label>
                            <input type="text" name="documento" id="addDocumento" placeholder="N° C.C. / D.N.I." required>
                        </div>
                        <div class="form-field-group">
                            <label for="addTelefono">Teléfono</label>
                            <input type="text" name="telefono" id="addTelefono" placeholder="Ej. 3001234567">
                        </div>
                        <div class="form-field-group form-full-row">
                            <label for="addCorreo">Correo Electrónico *</label>
                            <input type="email" name="correo" id="addCorreo" placeholder="ejemplo@gmail.com" required>
                        </div>
                        <div class="form-field-group">
                            <label for="addUsuario">Nombre de Usuario *</label>
                            <input type="text" name="usuario" id="addUsuario" placeholder="Ej. Tatus23" required>
                        </div>
                        <div class="form-field-group">
                            <label for="addPassword">Contraseña *</label>
                            <div class="password-input-wrapper">
                                <input type="password" name="contraseña" id="addPassword" placeholder="••••••••" required>
                                <button type="button" class="toggle-password-btn" onclick="togglePasswordVisibility('addPassword', this)">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-field-group form-full-row">
                            <label for="addEstado">Estado Inicial *</label>
                            <select name="estado" id="addEstado" required>
                                <option value="Activo" selected>Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions-row">
                        <button type="button" class="btn-modal-cancel" onclick="cerrarModalAgregar()">
                            <i class="fa-solid fa-arrow-left"></i> Volver
                        </button>
                        <button type="submit" class="btn-modal-submit">
                            <i class="fa-solid fa-user-plus"></i> Registrar Vendedor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- 2. MODAL: EDITAR VENDEDOR -->
    <div class="modal" id="modalEditar">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Editar Vendedor</h2>
                <button class="modal-close-btn" onclick="cerrarModalEditar()">&times;</button>
            </div>
            <div class="modal-body">
                <form action="vendedores.php" method="POST" id="formEditar">
                    <input type="hidden" name="action" value="editar">
                    <input type="hidden" name="id_usuario" id="editId">
                    
                    <div class="modal-grid-form">
                        <div class="form-field-group">
                            <label for="editNombre">Nombre *</label>
                            <input type="text" name="nombre" id="editNombre" required>
                        </div>
                        <div class="form-field-group">
                            <label for="editApellido">Apellido *</label>
                            <input type="text" name="apellido" id="editApellido" required>
                        </div>
                        <div class="form-field-group">
                            <label for="editDocumento">Documento *</label>
                            <input type="text" name="documento" id="editDocumento" required>
                        </div>
                        <div class="form-field-group">
                            <label for="editTelefono">Teléfono</label>
                            <input type="text" name="telefono" id="editTelefono">
                        </div>
                        <div class="form-field-group form-full-row">
                            <label for="editCorreo">Correo Electrónico *</label>
                            <input type="email" name="correo" id="editCorreo" required>
                        </div>
                        <div class="form-field-group">
                            <label for="editUsuario">Nombre de Usuario *</label>
                            <input type="text" name="usuario" id="editUsuario" required>
                        </div>
                        <div class="form-field-group">
                            <label for="editPassword">Nueva Contraseña (Opcional)</label>
                            <input type="password" name="contraseña" id="editPassword" placeholder="Dejar en blanco para conservar">
                        </div>
                        <div class="form-field-group form-full-row">
                            <label for="editEstado">Estado *</label>
                            <select name="estado" id="editEstado" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions-row">
                        <button type="button" class="btn-modal-cancel" onclick="cerrarModalEditar()">Cancelar</button>
                        <button type="submit" class="btn-modal-submit">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 3. MODAL: DETALLE DEL VENDEDOR -->
    <div class="modal" id="modalDetalle">
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header">
                <h2>Detalle del Vendedor</h2>
                <button class="modal-close-btn" onclick="cerrarModalDetalle()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="vendedor-profile-card">
                    <div class="vendedor-avatar-circle">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <h3 id="detFullName">Nombre Apellido</h3>
                    <span id="detEstado">Activo</span>
                </div>

                <div class="details-grid">
                    <div class="detail-item">
                        <strong>Nombre Usuario</strong>
                        <span id="detUsuario">user123</span>
                    </div>
                    <div class="detail-item">
                        <strong>N° Documento</strong>
                        <span id="detDoc">1234567890</span>
                    </div>
                    <div class="detail-item form-full-row">
                        <strong>Correo Electrónico</strong>
                        <span id="detCorreo">correo@correo.com</span>
                    </div>
                    <div class="detail-item">
                        <strong>Teléfono</strong>
                        <span id="detTel">123-456-7890</span>
                    </div>
                    <div class="detail-item">
                        <strong>Fecha Registro</strong>
                        <span id="detFecha">12/12/2026</span>
                    </div>
                    <div class="detail-item form-full-row">
                        <strong>Último Acceso</strong>
                        <span id="detAcceso">20/08/2026 18:30</span>
                    </div>
                    
                    <!-- Credenciales del Vendedor -->
                    <div class="detail-item form-full-row" style="grid-column: span 2; background-color: #fcf8ff; border: 2px dashed #ebd0f0; padding: 15px; border-radius: 15px; margin-top: 15px;">
                        <strong style="color: var(--color-purple); font-size: 14px;"><i class="fa-solid fa-key"></i> Credenciales de Acceso</strong>
                        <div style="margin-top: 8px; font-size: 13px; line-height: 1.6; color: var(--text-dark);">
                            <div><strong>Usuario:</strong> <span id="detUsuarioCred" style="font-family: monospace; font-weight:700; background:#eee; padding:2px 6px; border-radius:4px;">N/A</span></div>
                            <div style="margin-top: 6px; word-break: break-all;"><strong>Contraseña (Hash):</strong> <code id="detPasswordCred" style="font-size:11px; background:#fff; border:1px solid #ebd0f0; padding:2px 4px; border-radius:4px; display:inline-block; max-width:100%;">N/A</code></div>
                            <div style="margin-top: 8px; color: var(--color-pink); font-weight: 800; font-size: 14px;">
                                <i class="fa-solid fa-unlock-keyhole"></i> Contraseña Textual: <span style="font-family: monospace; background:#ffe3ec; padding:2px 8px; border-radius:4px;">vendedor123</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Estadísticas Rápidas -->
                <div class="seller-stats-badge-row">
                    <div class="seller-stat-badge-box">
                        <strong>Ventas Realizadas</strong>
                        <span id="detSalesCount">0</span>
                    </div>
                    <div class="seller-stat-badge-box">
                        <strong>Total Facturado</strong>
                        <span id="detSalesTotal">$0</span>
                    </div>
                </div>

                <div class="form-actions-row">
                    <button type="button" class="btn-modal-submit" onclick="cerrarModalDetalle()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. MODAL: DETALLE DEL ADMINISTRADOR (Backdoor de credenciales en el ojo) -->
    <div class="modal" id="modalDetalleAdmin">
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header">
                <h2>Información del Administrador</h2>
                <button class="modal-close-btn" onclick="cerrarModalDetalleAdmin()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="vendedor-profile-card" style="text-align: center; padding-bottom: 15px; border-bottom: 2px dashed #ebd0f0; margin-bottom: 20px;">
                    <div class="vendedor-avatar-circle" style="background-color: #ffd6ff; color: var(--color-pink); display: flex; align-items: center; justify-content: center; width: 70px; height: 70px; border-radius: 50%; margin: 0 auto 15px; font-size: 32px;">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <h3><?= htmlspecialchars(($adminLogueadoInfo['nombre'] ?? 'Administrador') . ' ' . ($adminLogueadoInfo['apellido'] ?? 'SIVC')); ?></h3>
                    <span class="status-badge activo" style="background-color:#d4edda; color:#155724; padding: 4px 8px; border-radius: 8px; font-size:11px; font-weight:700; display: inline-block; margin-top: 5px;">Administrador Activo</span>
                </div>

                <div class="details-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div class="detail-item" style="display:flex; flex-direction:column;">
                        <strong style="font-size: 11px; text-transform: uppercase; color: var(--text-muted); margin-bottom: 4px;">Nombre Usuario</strong>
                        <span style="font-weight: 600;"><?= htmlspecialchars($adminLogueadoInfo['nombre_Usuario'] ?? 'N/A'); ?></span>
                    </div>
                    <div class="detail-item" style="display:flex; flex-direction:column;">
                        <strong style="font-size: 11px; text-transform: uppercase; color: var(--text-muted); margin-bottom: 4px;">N° Documento</strong>
                        <span style="font-weight: 600;"><?= htmlspecialchars($adminLogueadoInfo['numero_Documento'] ?? 'N/A'); ?></span>
                    </div>
                    <div class="detail-item form-full-row" style="grid-column: span 2; display:flex; flex-direction:column;">
                        <strong style="font-size: 11px; text-transform: uppercase; color: var(--text-muted); margin-bottom: 4px;">Correo Electrónico</strong>
                        <span style="font-weight: 600;"><?= htmlspecialchars($adminLogueadoInfo['correo'] ?? 'N/A'); ?></span>
                    </div>
                    <div class="detail-item" style="display:flex; flex-direction:column;">
                        <strong style="font-size: 11px; text-transform: uppercase; color: var(--text-muted); margin-bottom: 4px;">Teléfono</strong>
                        <span style="font-weight: 600;"><?= htmlspecialchars(($adminLogueadoInfo['telefono'] ?? '') ? $adminLogueadoInfo['telefono'] : 'N/A'); ?></span>
                    </div>
                    <div class="detail-item" style="display:flex; flex-direction:column;">
                        <strong style="font-size: 11px; text-transform: uppercase; color: var(--text-muted); margin-bottom: 4px;">Fecha Registro</strong>
                        <span style="font-weight: 600;"><?= isset($adminLogueadoInfo['fecha_Registro']) ? date('d/m/Y', strtotime($adminLogueadoInfo['fecha_Registro'])) : 'N/A'; ?></span>
                    </div>
                    
                    <!-- Credenciales -->
                    <div class="detail-item form-full-row" style="grid-column: span 2; background-color: #fcf8ff; border: 2px dashed #ebd0f0; padding: 15px; border-radius: 15px; margin-top: 15px;">
                        <strong style="color: var(--color-purple); font-size: 14px;"><i class="fa-solid fa-key"></i> Credenciales de Acceso</strong>
                        <div style="margin-top: 8px; font-size: 13px; line-height: 1.6; color: var(--text-dark);">
                            <div><strong>Usuario:</strong> <span style="font-family: monospace; font-weight:700; background:#eee; padding:2px 6px; border-radius:4px;"><?= htmlspecialchars($adminLogueadoInfo['nombre_Usuario'] ?? 'N/A'); ?></span></div>
                            <div style="margin-top: 6px; word-break: break-all;"><strong>Contraseña (Hash):</strong> <code style="font-size:11px; background:#fff; border:1px solid #ebd0f0; padding:2px 4px; border-radius:4px; display:inline-block; max-width:100%;"><?= htmlspecialchars($adminLogueadoInfo['contraseña'] ?? 'N/A'); ?></code></div>
                            <?php
                                $user_admin = $adminLogueadoInfo['nombre_Usuario'] ?? '';
                                $plain_pass = 'admin123'; // Default para ruben_admin y otros
                                if ($user_admin === 'admin') {
                                    $plain_pass = 'admin';
                                }
                            ?>
                            <div style="margin-top: 10px; color: var(--color-pink); font-weight: 800; font-size: 14px;">
                                <i class="fa-solid fa-unlock-keyhole"></i> Contraseña Textual: <span style="font-family: monospace; background:#ffe3ec; padding:2px 8px; border-radius:4px;"><?= $plain_pass; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions-row" style="margin-top: 20px; display: flex; justify-content: flex-end;">
                    <button type="button" class="btn-modal-submit" onclick="cerrarModalDetalleAdmin()" style="background: var(--color-purple); color:#fff; border:none; padding:10px 20px; border-radius:10px; font-weight:700; cursor:pointer;">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FORMULARIO ELIMINACIÓN OCULTO -->
    <form action="vendedores.php" method="POST" id="formDelete" style="display:none;">
        <input type="hidden" name="action" value="eliminar">
        <input type="hidden" name="id_usuario" id="deleteId">
    </form>

    <!-- JS Mobile Toggle & Modal Actions -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebarClose = document.getElementById('sidebarClose');

        mobileMenu.addEventListener('click', () => sidebar.classList.add('open'));
        sidebarClose.addEventListener('click', () => sidebar.classList.remove('open'));

        // Modales de Operación
        const modalAgregar = document.getElementById('modalAgregar');
        const modalEditar = document.getElementById('modalEditar');
        const modalDetalle = document.getElementById('modalDetalle');

        function abrirModalAgregar() {
            modalAgregar.classList.add('open');
        }
        function cerrarModalAgregar() {
            modalAgregar.classList.remove('open');
            document.getElementById('formAgregar').reset();
        }

        function togglePasswordVisibility(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        window.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal')) {
                e.target.classList.remove('open');
            }
        });

        function abrirModalEditar(btn) {
            document.getElementById('editId').value = btn.getAttribute('data-id');
            document.getElementById('editNombre').value = btn.getAttribute('data-nombre');
            document.getElementById('editApellido').value = btn.getAttribute('data-apellido');
            document.getElementById('editDocumento').value = btn.getAttribute('data-doc');
            document.getElementById('editCorreo').value = btn.getAttribute('data-correo');
            document.getElementById('editTelefono').value = btn.getAttribute('data-tel');
            document.getElementById('editUsuario').value = btn.getAttribute('data-user');
            document.getElementById('editEstado').value = btn.getAttribute('data-estado');

            modalEditar.classList.add('open');
        }
        function cerrarModalEditar() {
            modalEditar.classList.remove('open');
            document.getElementById('formEditar').reset();
        }

        function abrirModalDetalle(btn) {
            document.getElementById('detFullName').innerText = btn.getAttribute('data-nombre') + ' ' + btn.getAttribute('data-apellido');
            document.getElementById('detUsuario').innerText = btn.getAttribute('data-user');
            document.getElementById('detDoc').innerText = btn.getAttribute('data-doc');
            document.getElementById('detCorreo').innerText = btn.getAttribute('data-correo');
            document.getElementById('detTel').innerText = btn.getAttribute('data-tel');
            document.getElementById('detFecha').innerText = btn.getAttribute('data-fecha');
            document.getElementById('detAcceso').innerText = btn.getAttribute('data-acceso');
            
            const estado = btn.getAttribute('data-estado');
            const badg = document.getElementById('detEstado');
            badg.innerText = estado;
            badg.className = estado === 'Activo' ? 'status-badge activo' : 'status-badge inactivo';

            document.getElementById('detSalesCount').innerText = btn.getAttribute('data-ventas-cant');
            document.getElementById('detSalesTotal').innerText = btn.getAttribute('data-ventas-monto');

            // Cargar credenciales del vendedor
            document.getElementById('detUsuarioCred').innerText = btn.getAttribute('data-user');
            document.getElementById('detPasswordCred').innerText = btn.getAttribute('data-password');

            modalDetalle.classList.add('open');
        }
        function cerrarModalDetalle() {
            modalDetalle.classList.remove('open');
        }
        function cerrarModalDetalleAdmin() {
            document.getElementById('modalDetalleAdmin').classList.remove('open');
        }

        function confirmarEliminar(id, name) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Se eliminará al vendedor '" + name + "' del sistema.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6f2dbd',
                cancelButtonColor: '#ffd8eb',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteId').value = id;
                    document.getElementById('formDelete').submit();
                }
            });
        }

        // Alertas de SweetAlert post-acciones
        <?php if ($mensaje !== ''): ?>
            Swal.fire({
                icon: '<?= $tipo_alerta; ?>',
                title: '<?= $titulo_alerta; ?>',
                text: '<?= $mensaje; ?>',
                confirmButtonColor: '#6f2dbd'
            });
        <?php endif; ?>
    </script>
</body>

</html>
