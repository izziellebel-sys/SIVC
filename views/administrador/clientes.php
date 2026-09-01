<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/database.php';

$mensaje = "";
$tipo_alerta = "";
$titulo_alerta = "";

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

// PROCESAR POST ACCIONES (Agregar, Editar)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'] ?? '';

    if ($action === 'agregar') {
        $nombre = trim($_POST['nombre'] ?? '');
        $apellido = trim($_POST['apellido'] ?? '');
        $documento = trim($_POST['documento'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $direccion = trim($_POST['direccion'] ?? '');
        $estado = $_POST['estado'] ?? 'Activo';

        if (empty($nombre) || empty($apellido) || empty($documento)) {
            $mensaje = "Nombre, apellido y documento son campos obligatorios.";
            $tipo_alerta = "warning";
            $titulo_alerta = "Campos incompletos";
        } else {
            // Verificar si el documento ya existe
            $stmtCheck = $conn->prepare("SELECT id_Cliente FROM cliente WHERE numero_Documento = ?");
            $stmtCheck->bind_param("s", $documento);
            $stmtCheck->execute();
            $stmtCheck->store_result();
            if ($stmtCheck->num_rows > 0) {
                $mensaje = "El número de documento ya está registrado.";
                $tipo_alerta = "error";
                $titulo_alerta = "Cliente existente";
                $stmtCheck->close();
            } else {
                $stmtCheck->close();
                // Insertar nuevo cliente
                $stmtInsert = $conn->prepare("INSERT INTO cliente (nombre, apellido, numero_Documento, telefono, direccion, estado) VALUES (?, ?, ?, ?, ?, ?)");
                $stmtInsert->bind_param("ssssss", $nombre, $apellido, $documento, $telefono, $direccion, $estado);
                if ($stmtInsert->execute()) {
                    $mensaje = "Cliente agregado con éxito.";
                    $tipo_alerta = "success";
                    $titulo_alerta = "¡Éxito!";
                } else {
                    $mensaje = "Error al guardar el cliente.";
                    $tipo_alerta = "error";
                    $titulo_alerta = "Error";
                }
                $stmtInsert->close();
            }
        }
    } elseif ($action === 'editar') {
        $id_cliente = (int)($_POST['id_cliente'] ?? 0);
        $nombre = trim($_POST['nombre'] ?? '');
        $apellido = trim($_POST['apellido'] ?? '');
        $documento = trim($_POST['documento'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $direccion = trim($_POST['direccion'] ?? '');
        $estado = $_POST['estado'] ?? 'Activo';

        if (empty($nombre) || empty($apellido) || empty($documento) || $id_cliente <= 0) {
            $mensaje = "Nombre, apellido y documento son obligatorios.";
            $tipo_alerta = "warning";
            $titulo_alerta = "Campos incompletos";
        } else {
            // Verificar si el documento ya está ocupado por otro cliente
            $stmtCheck = $conn->prepare("SELECT id_Cliente FROM cliente WHERE numero_Documento = ? AND id_Cliente != ?");
            $stmtCheck->bind_param("si", $documento, $id_cliente);
            $stmtCheck->execute();
            $stmtCheck->store_result();
            if ($stmtCheck->num_rows > 0) {
                $mensaje = "El número de documento ya está registrado por otro cliente.";
                $tipo_alerta = "error";
                $titulo_alerta = "Documento duplicado";
                $stmtCheck->close();
            } else {
                $stmtCheck->close();
                // Actualizar cliente
                $stmtUpdate = $conn->prepare("UPDATE cliente SET nombre = ?, apellido = ?, numero_Documento = ?, telefono = ?, direccion = ?, estado = ? WHERE id_Cliente = ?");
                $stmtUpdate->bind_param("ssssssi", $nombre, $apellido, $documento, $telefono, $direccion, $estado, $id_cliente);
                if ($stmtUpdate->execute()) {
                    $mensaje = "Cliente actualizado con éxito.";
                    $tipo_alerta = "success";
                    $titulo_alerta = "¡Éxito!";
                } else {
                    $mensaje = "Error al actualizar el cliente.";
                    $tipo_alerta = "error";
                    $titulo_alerta = "Error";
                }
                $stmtUpdate->close();
            }
        }
    }
}

// PROCESAR GET ACCIONES (Eliminar/Inactivar)
if (isset($_GET['action']) && $_GET['action'] === 'eliminar' && isset($_GET['id'])) {
    $id_del = (int)$_GET['id'];
    if ($id_del > 0) {
        $stmtDel = $conn->prepare("UPDATE cliente SET estado = 'Inactivo' WHERE id_Cliente = ?");
        $stmtDel->bind_param("i", $id_del);
        if ($stmtDel->execute()) {
            $mensaje = "Cliente inactivado con éxito.";
            $tipo_alerta = "success";
            $titulo_alerta = "¡Éxito!";
        } else {
            $mensaje = "Error al inactivar el cliente.";
            $tipo_alerta = "error";
            $titulo_alerta = "Error";
        }
        $stmtDel->close();
    }
}

// RECUPERAR ESTADÍSTICAS
// 1. Total Clientes
$resTotal = $conn->query("SELECT COUNT(*) as total FROM cliente");
$totalClientes = $resTotal ? (int)$resTotal->fetch_assoc()['total'] : 0;

// 2. Clientes Activos (han realizado compras)
$resActivos = $conn->query("SELECT COUNT(DISTINCT id_Cliente) as total FROM venta WHERE id_Cliente IS NOT NULL AND estado = 'Completada'");
$clientesActivos = $resActivos ? (int)$resActivos->fetch_assoc()['total'] : 0;

// 3. Nuevos este mes
$resNuevos = $conn->query("SELECT COUNT(*) as total FROM cliente WHERE MONTH(fecha_Registro) = MONTH(CURRENT_DATE()) AND YEAR(fecha_Registro) = YEAR(CURRENT_DATE())");
$nuevosMes = $resNuevos ? (int)$resNuevos->fetch_assoc()['total'] : 0;

// 4. Total en compras
$resTotalCompras = $conn->query("SELECT SUM(total) as total FROM venta WHERE estado = 'Completada'");
$totalComprasClientes = $resTotalCompras ? (float)$resTotalCompras->fetch_assoc()['total'] : 0.0;

// FILTROS Y BÚSQUEDA
$buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
$estadoFiltro = isset($_GET['estado']) ? trim($_GET['estado']) : 'Todos';
$grupoFiltro = isset($_GET['grupo']) ? trim($_GET['grupo']) : 'Todos';

$whereClauses = [];
$params = [];
$types = "";

if ($buscar !== '') {
    $whereClauses[] = "(c.nombre LIKE ? OR c.apellido LIKE ? OR c.numero_Documento LIKE ?)";
    $searchWildcard = "%" . $buscar . "%";
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
    $types .= "sss";
}

if ($estadoFiltro !== 'Todos') {
    $whereClauses[] = "c.estado = ?";
    $params[] = $estadoFiltro;
    $types .= "s";
}

if ($grupoFiltro !== 'Todos') {
    if ($grupoFiltro === 'VIP') {
        $whereClauses[] = "(SELECT COUNT(*) FROM venta v WHERE v.id_Cliente = c.id_Cliente AND v.estado = 'Completada') >= 9";
    } elseif ($grupoFiltro === 'Frecuente') {
        $whereClauses[] = "(SELECT COUNT(*) FROM venta v WHERE v.id_Cliente = c.id_Cliente AND v.estado = 'Completada') BETWEEN 5 AND 8";
    } elseif ($grupoFiltro === 'General') {
        $whereClauses[] = "(SELECT COUNT(*) FROM venta v WHERE v.id_Cliente = c.id_Cliente AND v.estado = 'Completada') < 5";
    }
}

$whereSql = "";
if (count($whereClauses) > 0) {
    $whereSql = "WHERE " . implode(" AND ", $whereClauses);
}

// PAGINACIÓN
$limite = 4; // Mostrando 4 clientes por página
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;

// Contar filtrados
$countQuery = "SELECT COUNT(*) as total FROM cliente c $whereSql";
$stmtCount = $conn->prepare($countQuery);
if ($stmtCount) {
    if (count($params) > 0) {
        $stmtCount->bind_param($types, ...$params);
    }
    $stmtCount->execute();
    $totalFiltrado = $stmtCount->get_result()->fetch_assoc()['total'];
    $stmtCount->close();
} else {
    $totalFiltrado = 0;
}

$totalPaginas = ceil($totalFiltrado / $limite);
if ($totalPaginas < 1) $totalPaginas = 1;
if ($pagina > $totalPaginas) $pagina = $totalPaginas;
$offset = ($pagina - 1) * $limite;

// CONSULTAR CLIENTES PAGINADOS
$query = "SELECT c.*, u.correo FROM cliente c LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento $whereSql LIMIT ?, ?";
$stmt = $conn->prepare($query);

$execParams = $params;
$execTypes = $types;
$execParams[] = $offset;
$execParams[] = $limite;
$execTypes .= "ii";

$clientes = [];
if ($stmt) {
    $stmt->bind_param($execTypes, ...$execParams);
    $stmt->execute();
    $resClientes = $stmt->get_result();
    while ($row = $resClientes->fetch_assoc()) {
        // Calcular compras y total gastado por cliente
        $idC = $row['id_Cliente'];
        
        $resV = $conn->query("SELECT COUNT(*) as cant, SUM(total) as gastado FROM venta WHERE id_Cliente = $idC AND estado = 'Completada'");
        $vInfo = $resV ? $resV->fetch_assoc() : ['cant' => 0, 'gastado' => 0.00];
        
        $resL = $conn->query("SELECT MAX(fecha_Venta) as ultima FROM venta WHERE id_Cliente = $idC AND estado = 'Completada'");
        $lDate = ($resL && $lRow = $resL->fetch_assoc()) ? $lRow['ultima'] : null;

        $row['compras_cant'] = $vInfo['cant'];
        $row['compras_total'] = $vInfo['gastado'] ?? 0.00;
        $row['ultima_compra'] = $lDate ? date('d/m/y', strtotime($lDate)) : 'N/A';
        
        $clientes[] = $row;
    }
    $stmt->close();
}

// 4. Información del Administrador logueado
$id_admin = $_SESSION['id_Usuario'] ?? 0;
$adminEmail = 'admin@sivc.com';
$nombreUsuario = 'Administrador';
if ($id_admin > 0) {
    $resAdmin = $conn->query("SELECT correo, nombre, apellido FROM usuarios WHERE id_Usuario = $id_admin");
    if ($resAdmin && $rowAdmin = $resAdmin->fetch_assoc()) {
        $adminEmail = $rowAdmin['correo'] ?? 'admin@sivc.com';
        $nombreUsuario = trim(($rowAdmin['nombre'] ?? '') . ' ' . ($rowAdmin['apellido'] ?? ''));
        if (empty($nombreUsuario)) {
            $nombreUsuario = $_SESSION['usuario'] ?? 'Administrador';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes | SIVC</title>

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

    <!-- CSS Clientes & Dashboard -->
    <link rel="stylesheet" href="admi.css/dashboard_admi.css?v=3">
    <link rel="stylesheet" href="admi.css/clientes_admi.css?v=7">
    <?php 
    require_once __DIR__ . '/../../configuration/load_config.php';
    aplicarConfiguracionEstilos();
    ?>
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

                <a href="clientes.php" class="sidebar-link-card active">
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
            <!-- Mobile Toggle Menu Button -->
            <button class="mobile-toggle-btn" id="mobileMenu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Content Header -->
            <header class="content-header">
                <div class="welcome-header-text">
                    <h1>Clientes</h1>
                    <p>Administra la información de tus clientes.</p>
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

            <!-- Stats Row -->
            <section class="clients-stats-row">
                <!-- Total Clientes -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle circle-green" style="background-color: #e6f7f0; color: #10b981;">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Total clientes</span>
                        <span class="stat-number"><?= $totalClientes; ?></span>
                        <span class="stat-desc">Registrados</span>
                    </div>
                </div>

                <!-- Clientes Activos -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle circle-blue" style="background-color: #eef2ff; color: #3b82f6;">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Clientes activos</span>
                        <span class="stat-number"><?= $clientesActivos; ?></span>
                        <span class="stat-desc">Han comprado</span>
                    </div>
                </div>

                <!-- Nuevos este mes -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle circle-orange" style="background-color: #fff0e6; color: #f97316;">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Nuevos este mes</span>
                        <span class="stat-number"><?= $nuevosMes; ?></span>
                        <span class="stat-desc">Nuevos clientes</span>
                    </div>
                </div>

                <!-- Total en compras -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle circle-purple" style="background-color: #f5ebfa; color: #a855f7;">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Total en compras</span>
                        <span class="stat-number">$<?= number_format($totalComprasClientes, 0, ',', '.'); ?></span>
                        <span class="stat-desc">De todos los clientes</span>
                    </div>
                </div>
            </section>

            <!-- Filters Bar -->
            <section class="filters-section">
                <form action="clientes.php" method="GET" class="filter-bar-form-new" id="filtersForm">
                    <div class="filter-controls-left">
                        <!-- Search Input -->
                        <div class="filter-input-group">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" name="buscar" value="<?= htmlspecialchars($buscar); ?>" placeholder="Buscar cliente..." onchange="this.form.submit();">
                        </div>

                        <!-- State Filter -->
                        <div class="filter-select-group">
                            <label>Estado</label>
                            <select name="estado" onchange="this.form.submit();">
                                <option value="Todos" <?= $estadoFiltro === 'Todos' ? 'selected' : ''; ?>>Todos</option>
                                <option value="Activo" <?= $estadoFiltro === 'Activo' ? 'selected' : ''; ?>>Activo</option>
                                <option value="Inactivo" <?= $estadoFiltro === 'Inactivo' ? 'selected' : ''; ?>>Inactivo</option>
                            </select>
                        </div>

                        <!-- Group Filter -->
                        <div class="filter-select-group">
                            <label>Grupo</label>
                            <select name="grupo" onchange="this.form.submit();">
                                <option value="Todos" <?= $grupoFiltro === 'Todos' ? 'selected' : ''; ?>>Todos</option>
                                <option value="General" <?= $grupoFiltro === 'General' ? 'selected' : ''; ?>>General</option>
                                <option value="Frecuente" <?= $grupoFiltro === 'Frecuente' ? 'selected' : ''; ?>>Frecuente</option>
                                <option value="VIP" <?= $grupoFiltro === 'VIP' ? 'selected' : ''; ?>>VIP</option>
                            </select>
                        </div>

                        <!-- Clear Filters Link -->
                        <a href="clientes.php" class="btn-clear-filters-new">
                            <i class="fa-solid fa-filter-circle-xmark"></i> Limpiar filtros
                        </a>
                    </div>

                    <!-- Add Client Button (Mockup position: top right) -->
                    <button type="button" class="btn-add-client-top" onclick="abrirModalAgregar()">
                        <i class="fa-solid fa-plus"></i> Agregar cliente
                    </button>
                </form>
            </section>

            <!-- Clients Table -->
            <section class="table-section">
                <div class="clients-table-container">
                    <table class="clients-table">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Contacto</th>
                                <th>Grupo</th>
                                <th>Compras</th>
                                <th>Total comprado</th>
                                <th>Ultima Compra</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($clientes) > 0): ?>
                                <?php foreach ($clientes as $c): 
                                    // Calculate dynamic group
                                    $comprasCant = (int)$c['compras_cant'];
                                    if ($comprasCant >= 9) {
                                        $grupo = 'VIP';
                                        $grupoClass = 'badge-vip';
                                    } elseif ($comprasCant >= 5) {
                                        $grupo = 'Frecuente';
                                        $grupoClass = 'badge-frecuente';
                                    } else {
                                        $grupo = 'General';
                                        $grupoClass = 'badge-general';
                                    }

                                    // Initials for avatar
                                    $iniciales = strtoupper(substr($c['nombre'], 0, 1) . substr($c['apellido'], 0, 1));
                                    
                                    // Avatar color class based on id_Cliente
                                    $coloresInitials = ['circle-green', 'circle-blue', 'circle-orange', 'circle-pink', 'circle-teal'];
                                    $colorClass = $coloresInitials[$c['id_Cliente'] % count($coloresInitials)];
                                ?>
                                    <tr>
                                        <td>
                                            <div class="client-profile-cell">
                                                <div class="client-avatar-mini <?= $colorClass; ?>">
                                                    <?= $iniciales; ?>
                                                </div>
                                                <div class="client-name-details">
                                                    <strong><?= htmlspecialchars($c['nombre'] . ' ' . $c['apellido']); ?></strong>
                                                    <span>ID: CLI-<?= str_pad($c['id_Cliente'], 4, '0', STR_PAD_LEFT); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="contact-info-cell">
                                                <span><?= htmlspecialchars($c['correo'] ?? 'Sin correo'); ?></span>
                                                <small><?= htmlspecialchars($c['telefono'] ?? 'Sin teléfono'); ?></small>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="<?= $grupoClass; ?>"><?= $grupo; ?></span>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($c['compras_cant']); ?> Compras
                                        </td>
                                        <td style="font-weight: 600;">
                                            $<?= number_format($c['compras_total'], 0, ',', '.'); ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($c['ultima_compra']); ?>
                                        </td>
                                        <td>
                                            <span class="status-badge <?= strtolower($c['estado']); ?>"><?= htmlspecialchars($c['estado']); ?></span>
                                        </td>
                                        <td>
                                            <div class="actions-cell">
                                                <a href="cliente_detalle.php?id=<?= $c['id_Cliente']; ?>" class="action-icon-btn view" title="Ver Detalle del Cliente">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <button class="action-icon-btn edit" title="Editar Cliente" onclick='abrirModalEditar(<?= json_encode($c); ?>)'>
                                                    <i class="fa-solid fa-pencil"></i>
                                                </button>
                                                <button class="action-icon-btn delete" title="Inactivar Cliente" onclick="confirmarInactivar(<?= $c['id_Cliente']; ?>)">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" style="text-align: center; padding: 30px; color: var(--text-muted);">
                                        No se encontraron clientes registrados.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Table Footer & Pagination -->
            <section class="clients-footer-section" style="justify-content: flex-end;">
                <!-- Pagination -->
                <div class="pagination-controls">
                    <div class="pagination-links">
                        <a href="?buscar=<?= urlencode($buscar); ?>&estado=<?= urlencode($estadoFiltro); ?>&grupo=<?= urlencode($grupoFiltro); ?>&pagina=<?= $pagina - 1; ?>" 
                           class="page-btn <?= $pagina <= 1 ? 'disabled' : ''; ?>">
                           &lt;
                        </a>

                        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                            <a href="?buscar=<?= urlencode($buscar); ?>&estado=<?= urlencode($estadoFiltro); ?>&grupo=<?= urlencode($grupoFiltro); ?>&pagina=<?= $i; ?>" 
                               class="page-btn <?= $pagina === $i ? 'active' : ''; ?>">
                               <?= $i; ?>
                            </a>
                        <?php endfor; ?>

                        <a href="?buscar=<?= urlencode($buscar); ?>&estado=<?= urlencode($estadoFiltro); ?>&grupo=<?= urlencode($grupoFiltro); ?>&pagina=<?= $pagina + 1; ?>" 
                           class="page-btn <?= $pagina >= $totalPaginas ? 'disabled' : ''; ?>">
                           &gt;
                        </a>
                    </div>
                    <div class="pagination-info">
                        Mostrando <?= count($clientes); ?> de <?= $totalFiltrado; ?> clientes
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- ==========================================
         MODAL AGREGAR / EDITAR
    =========================================== -->
    <div class="modal" id="clientModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Agregar Cliente</h3>
                <button class="modal-close-btn" onclick="cerrarModal()">&times;</button>
            </div>
            <form action="clientes.php" method="POST">
                <input type="hidden" name="action" id="formAction" value="agregar">
                <input type="hidden" name="id_cliente" id="formIdCliente" value="">
                
                <div class="modal-body">
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="formNombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="formApellido" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="documento">Número de Documento</label>
                        <input type="text" name="documento" id="formDocumento" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" id="formTelefono">
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="formDireccion">
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" id="formEstado">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-secondary" onclick="cerrarModal()">Cancelar</button>
                    <button type="submit" class="btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JS Mobile toggle Drawer & Modal Management -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebarClose = document.getElementById('sidebarClose');
        const clientModal = document.getElementById('clientModal');

        function openSidebar() {
            sidebar.classList.add('open');
        }

        function closeSidebar() {
            sidebar.classList.remove('open');
        }

        mobileMenu.addEventListener('click', openSidebar);
        sidebarClose.addEventListener('click', closeSidebar);

        // Modales
        function abrirModalAgregar() {
            document.getElementById('modalTitle').innerText = 'Agregar Cliente';
            document.getElementById('formAction').value = 'agregar';
            document.getElementById('formIdCliente').value = '';
            document.getElementById('formNombre').value = '';
            document.getElementById('formApellido').value = '';
            document.getElementById('formDocumento').value = '';
            document.getElementById('formTelefono').value = '';
            document.getElementById('formDireccion').value = '';
            document.getElementById('formEstado').value = 'Activo';
            
            clientModal.classList.add('show');
        }

        function abrirModalEditar(cliente) {
            document.getElementById('modalTitle').innerText = 'Editar Cliente';
            document.getElementById('formAction').value = 'editar';
            document.getElementById('formIdCliente').value = cliente.id_Cliente;
            document.getElementById('formNombre').value = cliente.nombre;
            document.getElementById('formApellido').value = cliente.apellido;
            document.getElementById('formDocumento').value = cliente.numero_Documento;
            document.getElementById('formTelefono').value = cliente.telefono || '';
            document.getElementById('formDireccion').value = cliente.direccion || '';
            document.getElementById('formEstado').value = cliente.estado;
            
            clientModal.classList.add('show');
        }

        function cerrarModal() {
            clientModal.classList.remove('show');
        }

        // Cerrar al dar click fuera
        window.onclick = function(event) {
            if (event.target == clientModal) {
                cerrarModal();
            }
        }

        // Confirmar Inactivar
        function confirmarInactivar(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "El estado del cliente se cambiará a Inactivo.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ec4899',
                cancelButtonColor: '#ebd3f8',
                confirmButtonText: 'Sí, inactivar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `clientes.php?action=eliminar&id=${id}`;
                }
            });
        }

        // Mostrar Alertas de SweetAlert
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
