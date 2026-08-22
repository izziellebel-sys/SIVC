<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/load_config.php';

$mensaje = "";
$tipo_alerta = "";
$titulo_alerta = "";

// REGISTRAR CLIENTE POST (Si el vendedor registra un cliente)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'agregar') {
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido = trim($_POST['apellido'] ?? '');
    $documento = trim($_POST['documento'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $estado = 'Activo';

    if ($nombre && $apellido && $documento && $correo) {
        $conn->begin_transaction();
        try {
            // 1. Verificar duplicados
            $stmtCheck = $conn->prepare("SELECT numero_Documento FROM usuarios WHERE numero_Documento = ? OR correo = ?");
            $stmtCheck->bind_param("ss", $documento, $correo);
            $stmtCheck->execute();
            if ($stmtCheck->get_result()->num_rows > 0) {
                throw new Exception("El documento o correo ya se encuentra registrado.");
            }
            $stmtCheck->close();

            // 2. Registrar usuario de rol Cliente (Rol 3)
            $dummy_pass = password_hash($documento, PASSWORD_BCRYPT);
            $stmtUser = $conn->prepare("INSERT INTO usuarios (nombre, apellido, numero_Documento, id_Rol, telefono, correo, nombre_Usuario, contraseña, estado) VALUES (?, ?, ?, '3', ?, ?, ?, ?, ?)");
            $username = strtolower($nombre) . date('y');
            $stmtUser->bind_param("sssssssss", $nombre, $apellido, $documento, $telefono, $correo, $username, $dummy_pass, $estado);
            $stmtUser->execute();
            $stmtUser->close();

            // 3. Registrar en cliente
            $fecha_actual = date('Y-m-d H:i:s');
            $stmtCli = $conn->prepare("INSERT INTO cliente (numero_Documento, nombre, apellido, fecha_Registro, estado) VALUES (?, ?, ?, ?, ?)");
            $stmtCli->bind_param("sssss", $documento, $nombre, $apellido, $fecha_actual, $estado);
            $stmtCli->execute();
            $stmtCli->close();

            $conn->commit();
            $mensaje = "El cliente ha sido registrado con éxito.";
            $tipo_alerta = "success";
            $titulo_alerta = "¡Éxito!";
        } catch (Exception $e) {
            $conn->rollback();
            $mensaje = $e->getMessage();
            $tipo_alerta = "error";
            $titulo_alerta = "Error";
        }
    } else {
        $mensaje = "Todos los campos obligatorios deben completarse.";
        $tipo_alerta = "warning";
        $titulo_alerta = "Campos obligatorios";
    }
}

// RECUPERAR ESTADÍSTICAS
// 1. Total Clientes
$resTotal = $conn->query("SELECT COUNT(*) as total FROM cliente");
$totalClientes = $resTotal ? (int)$resTotal->fetch_assoc()['total'] : 0;

// 2. Clientes Activos (que han hecho compras)
$resActivos = $conn->query("SELECT COUNT(DISTINCT id_Cliente) as total FROM venta WHERE id_Cliente IS NOT NULL AND estado = 'Completada'");
$clientesActivos = $resActivos ? (int)$resActivos->fetch_assoc()['total'] : 0;

// 3. Nuevos este mes
$resNuevos = $conn->query("SELECT COUNT(*) as total FROM cliente WHERE MONTH(fecha_Registro) = MONTH(CURRENT_DATE()) AND YEAR(fecha_Registro) = YEAR(CURRENT_DATE())");
$nuevosMes = $resNuevos ? (int)$resNuevos->fetch_assoc()['total'] : 0;

// FILTROS Y BÚSQUEDA
$buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
$estadoFiltro = isset($_GET['estado']) ? trim($_GET['estado']) : 'Todos';

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

$whereSql = "";
if (!empty($whereClauses)) {
    $whereSql = "WHERE " . implode(" AND ", $whereClauses);
}

// PAGINACIÓN
$limite = 5;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;

// Contar filtrados
$countQuery = "SELECT COUNT(*) as total FROM cliente c $whereSql";
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
        $idC = $row['id_Cliente'];
        
        // Sumar total gastado
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

    <!-- CSS Dashboard & Clientes (reutilizados) -->
    <link rel="stylesheet" href="../administrador/admi.css/dashboard_admi.css?v=5">
    <link rel="stylesheet" href="../administrador/admi.css/clientes_admi.css?v=6">
    
    <!-- Cargar estilos personalizados de base de datos -->
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

            <!-- Store Logo -->
            <div class="sidebar-logo-section">
                <img src="../../public/img/tienda.png" alt="Doña Marina Logo" class="brand-logo-img">
                <h2 class="brand-title">DOÑA MARINA</h2>
                <span class="brand-subtitle">TIENDA DE BARRIO</span>
            </div>

            <!-- Navigation Links -->
            <nav class="sidebar-navigation">
                <a href="dashboard_vendedor.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-house"></i>
                        <span>Inicio</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>

                <a href="inventario.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-basket-shopping"></i>
                        <span>Inventario</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>

                <a href="ventas.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Ventas</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>

                <a href="clientes.php" class="sidebar-link-card active">
                    <div class="link-left">
                        <i class="fa-solid fa-users"></i>
                        <span>Clientes</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>
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

            <!-- Header Section -->
            <header class="header-with-illustration">
                <div class="welcome-header-text">
                    <h1 style="font-size: 56px; font-weight: 800; color: #000000; margin: 0;">Clientes</h1>
                </div>
                <div class="header-illustration">
                    <img src="../../public/img/store_shelves_illustration.jpg" alt="Illustration" class="header-illustration-img">
                </div>
            </header>

            <!-- Metrics Cards Row -->
            <section class="clients-stats-row">
                <!-- Card 1 -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #ffd6ff;">
                        <i class="fa-solid fa-user-group" style="color: var(--color-pink);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Total Clientes</span>
                        <span class="stat-number"><?= $totalClientes; ?></span>
                        <span class="stat-desc">Clientes registrados</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #e2e2ff;">
                        <i class="fa-solid fa-user-check" style="color: var(--color-blue);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Clientes Activos</span>
                        <span class="stat-number"><?= $clientesActivos; ?></span>
                        <span class="stat-desc">Han comprado en la tienda</span>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="stat-box-card">
                    <div class="stat-box-icon-circle" style="background-color: #ffd8eb;">
                        <i class="fa-solid fa-user-plus" style="color: var(--color-magenta);"></i>
                    </div>
                    <div class="stat-box-details">
                        <span class="stat-name">Nuevo este Mes</span>
                        <span class="stat-number"><?= $nuevosMes; ?></span>
                        <span class="stat-desc">Registrados recientemente</span>
                    </div>
                </div>
            </section>

            <!-- Filter Bar -->
            <section class="filter-section">
                <form action="clientes.php" method="GET" class="filter-bar-form">
                    <div class="filters-left-group">
                        <div class="filter-input-group">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" name="buscar" placeholder="Buscar Cliente..." value="<?= htmlspecialchars($buscar); ?>">
                        </div>

                        <div class="filter-select-wrapper">
                            <label for="filterEstado">Estado</label>
                            <select name="estado" id="filterEstado" onchange="this.form.submit()">
                                <option value="Todos" <?= $estadoFiltro === 'Todos' ? 'selected' : ''; ?>>Todos</option>
                                <option value="Activo" <?= $estadoFiltro === 'Activo' ? 'selected' : ''; ?>>Activo</option>
                                <option value="Inactivo" <?= $estadoFiltro === 'Inactivo' ? 'selected' : ''; ?>>Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <?php if ($buscar !== '' || $estadoFiltro !== 'Todos'): ?>
                        <button type="button" class="btn-clear-filters" onclick="window.location.href='clientes.php'">
                            <i class="fa-solid fa-rotate-left"></i> Limpiar Filtros
                        </button>
                    <?php endif; ?>
                </form>
            </section>

            <!-- Table of Clients -->
            <section class="clients-table-container">
                <div class="clients-table-wrapper">
                    <table class="clients-table">
                        <thead>
                            <tr>
                                <th>Nombre Completo</th>
                                <th>Contacto</th>
                                <th>Compras</th>
                                <th>Total Gastado</th>
                                <th>Última Compra</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($clientes) > 0): ?>
                                <?php foreach ($clientes as $c): ?>
                                    <tr>
                                        <td>
                                            <div class="client-profile-cell">
                                                <div class="client-avatar-mini">
                                                    <?= strtoupper(substr($c['nombre'], 0, 1)); ?>
                                                </div>
                                                <div class="client-name-details">
                                                    <strong class="client-name-cell"><?= htmlspecialchars($c['nombre'] . ' ' . $c['apellido']); ?></strong>
                                                    <span>Doc: <?= htmlspecialchars($c['numero_Documento']); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="display:flex; flex-direction:column; font-size:12px;">
                                                <strong><?= htmlspecialchars($c['correo']); ?></strong>
                                                <span style="color:var(--text-muted);"><?= htmlspecialchars($c['telefono'] ? $c['telefono'] : 'N/A'); ?></span>
                                            </div>
                                        </td>
                                        <td><?= $c['compras_cant']; ?> compras</td>
                                        <td style="font-weight: 700;">$<?= number_format($c['compras_total'], 0, ',', '.'); ?></td>
                                        <td><?= htmlspecialchars($c['ultima_compra']); ?></td>
                                        <td>
                                            <a href="cliente_detalle.php?id=<?= $c['id_Cliente']; ?>" class="btn-view-detail" title="Ver Historial y Deudas">
                                                <i class="fa-regular fa-eye"></i> Ver Detalle
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 25px;">
                                        No se encontraron clientes registrados.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer & Pagination -->
                <section class="clients-footer-section">
                    <!-- Add Client Button -->
                    <button type="button" class="btn-add-client" onclick="abrirModalAgregar()">
                        <i class="fa-solid fa-user-plus"></i> Registrar Cliente
                    </button>

                    <!-- Pagination -->
                    <div class="pagination-controls">
                        <div class="pagination-links">
                            <a href="clientes.php?buscar=<?= urlencode($buscar); ?>&estado=<?= urlencode($estadoFiltro); ?>&pagina=<?= $pagina - 1; ?>" 
                               class="page-btn <?= $pagina <= 1 ? 'disabled' : ''; ?>">&lt;</a>
                            
                            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                <a href="clientes.php?buscar=<?= urlencode($buscar); ?>&estado=<?= urlencode($estadoFiltro); ?>&pagina=<?= $i; ?>" 
                                   class="page-btn <?= $pagina == $i ? 'active' : ''; ?>"><?= $i; ?></a>
                            <?php endfor; ?>

                            <a href="clientes.php?buscar=<?= urlencode($buscar); ?>&estado=<?= urlencode($estadoFiltro); ?>&pagina=<?= $pagina + 1; ?>" 
                               class="page-btn <?= $pagina >= $totalPaginas ? 'disabled' : ''; ?>">&gt;</a>
                        </div>
                        <div class="pagination-info">
                            Mostrando <?= count($clientes); ?> de <?= $totalFiltrados; ?> clientes
                        </div>
                    </div>
                </section>
            </section>
        </main>
    </div>

    <!-- MODAL AGREGAR CLIENTE -->
    <div class="modal" id="modalAgregar">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Registrar Nuevo Cliente</h2>
                <button class="modal-close-btn" onclick="cerrarModalAgregar()">&times;</button>
            </div>
            <div class="modal-body">
                <form action="clientes.php" method="POST" id="formAgregar">
                    <input type="hidden" name="action" value="agregar">
                    
                    <div class="modal-grid-form">
                        <div class="form-field-group">
                            <label for="addNombre">Nombre *</label>
                            <input type="text" name="nombre" id="addNombre" required>
                        </div>
                        <div class="form-field-group">
                            <label for="addApellido">Apellido *</label>
                            <input type="text" name="apellido" id="addApellido" required>
                        </div>
                        <div class="form-field-group">
                            <label for="addDocumento">N° Documento *</label>
                            <input type="text" name="documento" id="addDocumento" required>
                        </div>
                        <div class="form-field-group">
                            <label for="addTelefono">Teléfono</label>
                            <input type="text" name="telefono" id="addTelefono">
                        </div>
                        <div class="form-field-group form-full-row">
                            <label for="addCorreo">Correo Electrónico *</label>
                            <input type="email" name="correo" id="addCorreo" required>
                        </div>
                    </div>

                    <div class="form-actions-row">
                        <button type="button" class="btn-modal-cancel" onclick="cerrarModalAgregar()">Cancelar</button>
                        <button type="submit" class="btn-modal-submit">Registrar Cliente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS Controllers -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebarClose = document.getElementById('sidebarClose');

        mobileMenu.addEventListener('click', () => sidebar.classList.add('open'));
        sidebarClose.addEventListener('click', () => sidebar.classList.remove('open'));

        // Modales
        const modalAgregar = document.getElementById('modalAgregar');

        function abrirModalAgregar() {
            modalAgregar.classList.add('open');
        }

        function cerrarModalAgregar() {
            modalAgregar.classList.remove('open');
            document.getElementById('formAgregar').reset();
        }

        // SweetAlert alerts
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
