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

// OBTENER CLIENTE POR ID
$id_cliente = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id_cliente <= 0) {
    header("Location: clientes.php");
    exit();
}

// Consultar datos del cliente
$stmtClient = $conn->prepare("SELECT c.*, u.correo FROM cliente c LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento WHERE c.id_Cliente = ?");
$stmtClient->bind_param("i", $id_cliente);
$stmtClient->execute();
$cliente = $stmtClient->get_result()->fetch_assoc();
$stmtClient->close();

if (!$cliente) {
    header("Location: clientes.php");
    exit();
}

// Iniciales del cliente para el avatar
$iniciales = strtoupper(substr($cliente['nombre'], 0, 1) . substr($cliente['apellido'], 0, 1));

// PROCESAR POST ACCIONES (Registrar Deuda, Registrar Abono)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'] ?? '';
    $id_usuario_logueado = $_SESSION['id_Usuario'];

    if ($action === 'registrar_deuda') {
        $concepto = trim($_POST['concepto'] ?? '');
        $monto = (float)($_POST['monto'] ?? 0);

        if (empty($concepto) || $monto <= 0) {
            $mensaje = "Debe ingresar un concepto y un monto mayor a cero.";
            $tipo_alerta = "warning";
            $titulo_alerta = "Datos inválidos";
        } else {
            $stmtInsertDeuda = $conn->prepare("INSERT INTO deuda (fecha_Registro, valor_Inicial, saldo_Pendiente, estado, id_Usuario, id_Cliente, concepto) VALUES (NOW(), ?, ?, 'Pendiente', ?, ?, ?)");
            $stmtInsertDeuda->bind_param("ddiis", $monto, $monto, $id_usuario_logueado, $id_cliente, $concepto);
            if ($stmtInsertDeuda->execute()) {
                $mensaje = "Deuda registrada con éxito.";
                $tipo_alerta = "success";
                $titulo_alerta = "¡Éxito!";
            } else {
                $mensaje = "Error al registrar la deuda: " . $conn->error;
                $tipo_alerta = "error";
                $titulo_alerta = "Error";
            }
            $stmtInsertDeuda->close();
        }
    } elseif ($action === 'registrar_abono') {
        $id_deuda = (int)($_POST['id_deuda'] ?? 0);
        $monto_abono = (float)($_POST['monto_abono'] ?? 0);
        $nuevo_estado = $_POST['nuevo_estado'] ?? '';

        if ($id_deuda <= 0 || $monto_abono <= 0) {
            $mensaje = "Debe seleccionar una deuda y especificar un monto de abono válido.";
            $tipo_alerta = "warning";
            $titulo_alerta = "Datos incompletos";
        } else {
            // Iniciar transacción
            $conn->begin_transaction();
            try {
                // Obtener detalles de la deuda
                $stmtGetD = $conn->prepare("SELECT saldo_Pendiente, valor_Inicial FROM deuda WHERE id_Deuda = ? FOR UPDATE");
                $stmtGetD->bind_param("i", $id_deuda);
                $stmtGetD->execute();
                $deuda_row = $stmtGetD->get_result()->fetch_assoc();
                $stmtGetD->close();

                if (!$deuda_row) {
                    throw new Exception("La deuda seleccionada no existe.");
                }

                $saldo_actual = (float)$deuda_row['saldo_Pendiente'];
                if ($monto_abono > $saldo_actual) {
                    throw new Exception("El abono no puede superar el saldo pendiente ($" . number_format($saldo_actual, 0, ',', '.') . ").");
                }

                $nuevo_saldo = $saldo_actual - $monto_abono;
                
                // Determinar el estado final de la deuda
                if ($nuevo_saldo <= 0) {
                    $estado_final = 'Pagada';
                    $nuevo_saldo = 0.00;
                } else {
                    $estado_final = ($nuevo_estado === 'Pagada') ? 'Abonada' : $nuevo_estado; // Si seleccionan pagada pero queda saldo, es abonada
                }

                // 1. Insertar abono
                $stmtA = $conn->prepare("INSERT INTO abono (fecha_Abono, valor_Abonado, id_Deuda, id_Usuario) VALUES (NOW(), ?, ?, ?)");
                $stmtA->bind_param("dii", $monto_abono, $id_deuda, $id_usuario_logueado);
                $stmtA->execute();
                $stmtA->close();

                // 2. Actualizar deuda
                $stmtU = $conn->prepare("UPDATE deuda SET saldo_Pendiente = ?, estado = ? WHERE id_Deuda = ?");
                $stmtU->bind_param("dsi", $nuevo_saldo, $estado_final, $id_deuda);
                $stmtU->execute();
                $stmtU->close();

                // Confirmar transacción
                $conn->commit();
                
                $mensaje = "Abono registrado correctamente.";
                $tipo_alerta = "success";
                $titulo_alerta = "¡Éxito!";
            } catch (Exception $e) {
                $conn->rollback();
                $mensaje = $e->getMessage();
                $tipo_alerta = "error";
                $titulo_alerta = "Error de transacción";
            }
        }
    }
}

// CÁLCULO DE MÉTRICAS Y DATOS HISTÓRICOS
// 1. Total Compras
$resV = $conn->query("SELECT COUNT(*) as cant, SUM(total) as gastado FROM venta WHERE id_Cliente = $id_cliente AND estado = 'Completada'");
$vInfo = $resV ? $resV->fetch_assoc() : ['cant' => 0, 'gastado' => 0.00];
$totalCompras = $vInfo['gastado'] ?? 0.00;
$totalComprasCant = $vInfo['cant'];

// 2. Deuda Total (Suma de saldos pendientes de deudas no pagadas)
$resD = $conn->query("SELECT SUM(saldo_Pendiente) as total_pendiente, COUNT(*) as cant FROM deuda WHERE id_Cliente = $id_cliente AND estado != 'Pagada'");
$dInfo = $resD ? $resD->fetch_assoc() : ['total_pendiente' => 0.00, 'cant' => 0];
$deudaTotal = $dInfo['total_pendiente'] ?? 0.00;
$deudaTotalCant = $dInfo['cant'];

// 3. Última Compra
$resL = $conn->query("SELECT MAX(fecha_Venta) as ultima FROM venta WHERE id_Cliente = $id_cliente AND estado = 'Completada'");
$lDate = ($resL && $lRow = $resL->fetch_assoc()) ? $lRow['ultima'] : null;
$ultimaCompra = $lDate ? date('d/m/y', strtotime($lDate)) : 'N/A';

// Obtener deudas registradas
$deudas = [];
$resDeudas = $conn->query("SELECT * FROM deuda WHERE id_Cliente = $id_cliente ORDER BY fecha_Registro DESC");
if ($resDeudas) {
    while ($row = $resDeudas->fetch_assoc()) {
        $deudas[] = $row;
    }
}

// Obtener lista de deudas pendientes para el dropdown de abono
$deudasPendientes = array_filter($deudas, function($d) {
    return $d['estado'] !== 'Pagada';
});
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Cliente | SIVC</title>

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

    <!-- CSS Detalle & Dashboard -->
    <link rel="stylesheet" href="css/dashboard_admi.css?v=3">
    <link rel="stylesheet" href="css/cliente_detalle.css?v=3">
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
                <a href="dashboar_admi.php" class="sidebar-link-card">
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

                <a href="vendedores.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-user-tie"></i>
                        <span>Vendedores</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>

                <a href="reportes.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-chart-simple"></i>
                        <span>Reportes</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>

                <a href="configuracion.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-gear"></i>
                        <span>Configuracion</span>
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

            <!-- Enlace Volver -->
            <a href="clientes.php" class="back-link">
                <i class="fa-solid fa-arrow-left"></i> Volver a Clientes
            </a>

            <!-- Ficha del Cliente (Cabecera Detalle) -->
            <section class="client-detail-header-card">
                <div class="client-profile-section">
                    <div class="client-avatar-circle">
                        <?= $iniciales; ?>
                    </div>
                    <div class="client-profile-info">
                        <h2><?= htmlspecialchars($cliente['nombre'] . ' ' . $cliente['apellido']); ?></h2>
                        <p>
                            <?= htmlspecialchars($cliente['correo'] ?? 'Sin correo'); ?> 
                            | Cliente desde <?= date('d/m/Y', strtotime($cliente['fecha_Registro'])); ?>
                        </p>
                    </div>
                </div>

                <!-- Badge de Deuda general -->
                <?php if ($deudaTotalCant > 0): ?>
                    <span class="general-status-badge debt">
                        <i class="fa-solid fa-triangle-exclamation"></i> Con deuda pendiente
                    </span>
                <?php else: ?>
                    <span class="general-status-badge no-debt">
                        <i class="fa-solid fa-circle-check"></i> Al día
                    </span>
                <?php endif; ?>
            </section>

            <!-- Tarjetas Resumen -->
            <section class="summary-cards-row">
                <!-- Total Compras -->
                <div class="summary-card purchases">
                    <span class="card-title">Total Compras</span>
                    <span class="card-value">$<?= number_format($totalCompras, 0, ',', '.'); ?></span>
                    <span class="card-subtext"><?= $totalComprasCant; ?> compras realizadas</span>
                </div>

                <!-- Deuda Total -->
                <div class="summary-card debts">
                    <span class="card-title">Deuda Total</span>
                    <span class="card-value">$<?= number_format($deudaTotal, 0, ',', '.'); ?></span>
                    <span class="card-subtext"><?= $deudaTotalCant; ?> deudas pendientes</span>
                </div>

                <!-- Última Compra -->
                <div class="summary-card activity">
                    <span class="card-title">Última Compra</span>
                    <span class="card-value"><?= $ultimaCompra; ?></span>
                    <span class="card-subtext">Última actividad</span>
                </div>
            </section>

            <!-- Historial de Deudas -->
            <section class="debts-history-section">
                <div class="debts-section-header">
                    <h3>Deudas registradas</h3>
                    <button class="btn-register-debt" onclick="abrirModalDeuda()">
                        <i class="fa-solid fa-plus"></i> Registrar Deuda
                    </button>
                </div>

                <div class="debts-table-container">
                    <table class="debts-table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Abonado</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($deudas) > 0): ?>
                                <?php foreach ($deudas as $d): ?>
                                    <?php 
                                        $abonado = $d['valor_Inicial'] - $d['saldo_Pendiente'];
                                        $estadoClase = strtolower($d['estado']);
                                    ?>
                                    <tr>
                                        <td><?= date('d/m/Y', strtotime($d['fecha_Registro'])); ?></td>
                                        <td style="font-weight: 600;"><?= htmlspecialchars($d['concepto'] ?? 'Mercado fiado'); ?></td>
                                        <td style="font-weight: 600;">$<?= number_format($d['valor_Inicial'], 0, ',', '.'); ?></td>
                                        <td style="font-weight: 600;">$<?= number_format($abonado, 0, ',', '.'); ?></td>
                                        <td>
                                            <span class="debt-status-badge <?= $estadoClase; ?>">
                                                <?= htmlspecialchars($d['estado']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="debt-actions">
                                                <button class="debt-action-btn" title="Ver Detalle" onclick="verAbonos(<?= $d['id_Deuda']; ?>, '<?= htmlspecialchars($d['concepto']); ?>')">
                                                    <i class="fa-solid fa-receipt"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 25px; color: var(--text-muted);">
                                        No se registran deudas para este cliente.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Actualizar Estado Deuda (Formulario Inferior) -->
            <?php if (count($deudasPendientes) > 0): ?>
                <section class="update-status-section">
                    <h4>Actualizar estado de la deuda seleccionada</h4>
                    <form action="cliente_detalle.php?id=<?= $id_cliente; ?>" method="POST" id="formAbono">
                        <input type="hidden" name="action" value="registrar_abono">
                        
                        <div class="update-form-row">
                            <div class="form-field">
                                <label for="id_deuda">Seleccione Deuda</label>
                                <select name="id_deuda" id="formAbonoDeuda" required onchange="actualizarSaldoMaximo()">
                                    <option value="" disabled selected>-- Elegir Deuda --</option>
                                    <?php foreach ($deudasPendientes as $dp): ?>
                                        <option value="<?= $dp['id_Deuda']; ?>" data-saldo="<?= $dp['saldo_Pendiente']; ?>">
                                            <?= htmlspecialchars($dp['concepto']); ?> - $<?= number_format($dp['saldo_Pendiente'], 0, ',', '.'); ?> pendiente
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-field">
                                <label for="nuevo_estado">Estado</label>
                                <select name="nuevo_estado" id="formAbonoEstado" required>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Abonada">Abonada</option>
                                    <option value="Pagada">Pagada</option>
                                </select>
                            </div>

                            <div class="form-field">
                                <label for="monto_abono">Monto del abono</label>
                                <input type="number" name="monto_abono" id="formAbonoMonto" placeholder="Ej: 20000" min="1" step="any" required>
                            </div>

                            <button type="submit" class="btn-save-abono">Guardar</button>
                        </div>
                    </form>
                </section>
            <?php endif; ?>
        </main>
    </div>

    <!-- ==========================================
         MODAL REGISTRAR DEUDA
    =========================================== -->
    <div class="modal" id="deudaModal">
        <div class="modal-content" style="max-width: 450px;">
            <div class="modal-header">
                <h3>Registrar Deuda</h3>
                <button class="modal-close-btn" onclick="cerrarModalDeuda()">&times;</button>
            </div>
            <form action="cliente_detalle.php?id=<?= $id_cliente; ?>" method="POST">
                <input type="hidden" name="action" value="registrar_deuda">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="concepto">Concepto de la Deuda</label>
                        <input type="text" name="concepto" id="deudaConcepto" placeholder="Ej: Mercado fiado, Productos de aseo" required>
                    </div>

                    <div class="form-group">
                        <label for="monto">Monto Inicial ($)</label>
                        <input type="number" name="monto" id="deudaMonto" placeholder="Ej: 50000" min="1" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-secondary" onclick="cerrarModalDeuda()">Cancelar</button>
                    <button type="submit" class="btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Drawer & Modales -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebarClose = document.getElementById('sidebarClose');
        const deudaModal = document.getElementById('deudaModal');

        function openSidebar() {
            sidebar.classList.add('open');
        }

        function closeSidebar() {
            sidebar.classList.remove('open');
        }

        mobileMenu.addEventListener('click', openSidebar);
        sidebarClose.addEventListener('click', closeSidebar);

        // Modales
        function abrirModalDeuda() {
            document.getElementById('deudaConcepto').value = '';
            document.getElementById('deudaMonto').value = '';
            deudaModal.classList.add('show');
        }

        function cerrarModalDeuda() {
            deudaModal.classList.remove('show');
        }

        window.onclick = function(event) {
            if (event.target == deudaModal) {
                cerrarModalDeuda();
            }
        }

        // Validación de abonos en frontend
        function actualizarSaldoMaximo() {
            const select = document.getElementById('formAbonoDeuda');
            const selectedOption = select.options[select.selectedIndex];
            const maxSaldo = selectedOption.getAttribute('data-saldo');
            
            const montoInput = document.getElementById('formAbonoMonto');
            montoInput.max = maxSaldo;
            montoInput.placeholder = `Máx: ${maxSaldo}`;
        }

        // Ver detalle de abonos anteriores
        function verAbonos(idDeuda, concepto) {
            // Hacemos una consulta rápida por Ajax o mostramos un modal
            // Por simplicidad en este modulo y velocidad, consultamos abonos en una petición rápida y los mostramos en SweetAlert
            fetch(`../../views/administrador/cliente_detalle.php?id=<?= $id_cliente; ?>&action=get_abonos&id_deuda=${idDeuda}`)
                .then(res => res.json())
                .then(data => {
                    let html = `<div style="text-align:left; font-family: Montserrat, sans-serif;">`;
                    if (data.length === 0) {
                        html += `<p>No se registran abonos para esta deuda.</p>`;
                    } else {
                        html += `<table style="width:100%; border-collapse:collapse; margin-top:10px;">
                                    <thead>
                                        <tr style="border-bottom:2px solid #e2d1f0; color:#6f2dbd;">
                                            <th style="padding:8px; text-align:left;">Fecha</th>
                                            <th style="padding:8px; text-align:right;">Monto Abonado</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                        data.forEach(a => {
                            html += `<tr style="border-bottom:1px solid #ebd0f0;">
                                        <td style="padding:8px;">${a.fecha}</td>
                                        <td style="padding:8px; text-align:right; font-weight:bold;">$${parseInt(a.monto).toLocaleString('es-CO')}</td>
                                     </tr>`;
                        });
                        html += `</tbody></table>`;
                    }
                    html += `</div>`;

                    Swal.fire({
                        title: `Historial de Abonos - ${concepto}`,
                        html: html,
                        confirmButtonColor: '#6f2dbd',
                        confirmButtonText: 'Cerrar'
                    });
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

<?php
// API interna sencilla para obtener abonos vía AJAX
if (isset($_GET['action']) && $_GET['action'] === 'get_abonos' && isset($_GET['id_deuda'])) {
    ob_clean(); // Limpiar buffers anteriores
    header('Content-Type: application/json');
    $id_deuda = (int)$_GET['id_deuda'];
    $abonos = [];
    
    $stmtAbonos = $conn->prepare("SELECT fecha_Abono, valor_Abonado FROM abono WHERE id_Deuda = ? ORDER BY fecha_Abono DESC");
    if ($stmtAbonos) {
        $stmtAbonos->bind_param("i", $id_deuda);
        $stmtAbonos->execute();
        $res = $stmtAbonos->get_result();
        while ($row = $res->fetch_assoc()) {
            $abonos[] = [
                'fecha' => date('d/m/Y H:i', strtotime($row['fecha_Abono'])),
                'monto' => $row['valor_Abonado']
            ];
        }
        $stmtAbonos->close();
    }
    echo json_encode($abonos);
    exit();
}
?>
