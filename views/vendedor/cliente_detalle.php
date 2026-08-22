<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/load_config.php';

$id_cliente = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id_cliente <= 0) {
    header("Location: clientes.php");
    exit();
}

// OBTENER INFORMACIÓN DEL CLIENTE
$resCliente = $conn->query("
    SELECT c.*, u.correo, u.telefono 
    FROM cliente c 
    LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento 
    WHERE c.id_Cliente = $id_cliente
");
$cliente = $resCliente ? $resCliente->fetch_assoc() : null;

if (!$cliente) {
    header("Location: clientes.php");
    exit();
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

// Alertas SweetAlert
$alerta_msg = "";
$alerta_tipo = "";
$alerta_titulo = "";

if (isset($_GET['deuda_success'])) {
    $alerta_msg = "La nueva deuda (fiado) ha sido registrada correctamente.";
    $alerta_tipo = "success";
    $alerta_titulo = "¡Crédito Registrado!";
} elseif (isset($_GET['deuda_error'])) {
    $alerta_msg = "Error al intentar registrar la deuda en la base de datos.";
    $alerta_tipo = "error";
    $alerta_titulo = "Error";
} elseif (isset($_GET['deuda_warning'])) {
    $alerta_msg = "Por favor completa todos los campos del formulario de deuda.";
    $alerta_tipo = "warning";
    $alerta_titulo = "Datos incompletos";
} elseif (isset($_GET['abono_success'])) {
    $alerta_msg = "El abono se ha registrado correctamente y el saldo de la deuda ha sido actualizado.";
    $alerta_tipo = "success";
    $alerta_titulo = "¡Abono Registrado!";
} elseif (isset($_GET['abono_error'])) {
    $alerta_msg = "Error al intentar procesar el abono.";
    $alerta_tipo = "error";
    $alerta_titulo = "Error de Transacción";
} elseif (isset($_GET['abono_warning'])) {
    $alerta_msg = "Por favor selecciona una deuda y escribe un monto de abono válido.";
    $alerta_tipo = "warning";
    $alerta_titulo = "Datos faltantes";
}
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

    <!-- CSS Dashboard & Cliente Detalle (reutilizados) -->
    <link rel="stylesheet" href="../administrador/css/dashboard_admi.css?v=5">
    <link rel="stylesheet" href="../css/detalle_cliente_vendedor.css">
    
    <!-- Cargar temas y fuentes personalizadas de la base de datos -->
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
                    <h1 style="font-size: 56px; font-weight: 800; color: #000000; margin: 0;">Detalle Cliente</h1>
                </div>
                <div class="header-illustration">
                    <img src="../../public/img/store_shelves_illustration.jpg" alt="Illustration" class="header-illustration-img">
                </div>
            </header>

            <!-- Client Profile Header Card -->
            <section class="client-detail-header-card">
                <div class="client-profile-section">
                    <div class="client-avatar-large">
                        <?= strtoupper(substr($cliente['nombre'], 0, 1)); ?>
                    </div>
                    <div class="client-profile-info">
                        <h2><?= htmlspecialchars($cliente['nombre'] . ' ' . $cliente['apellido']); ?></h2>
                        <p>Documento Identidad: <strong><?= htmlspecialchars($cliente['numero_Documento']); ?></strong></p>
                        
                        <?php if ($deudaTotal > 0): ?>
                            <span class="debt-status-badge con-deuda">
                                <i class="fa-solid fa-circle-exclamation"></i> CON DEUDA PENDIENTE
                            </span>
                        <?php else: ?>
                            <span class="debt-status-badge al-dia">
                                <i class="fa-solid fa-circle-check"></i> CUENTA AL DÍA
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="client-contact-section">
                    <div class="contact-item">
                        <i class="fa-regular fa-envelope"></i>
                        <div>
                            <span>Correo Electrónico</span>
                            <strong><?= htmlspecialchars($cliente['correo']); ?></strong>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fa-solid fa-phone"></i>
                        <div>
                            <span>Teléfono</span>
                            <strong><?= htmlspecialchars($cliente['telefono'] ? $cliente['telefono'] : 'N/A'); ?></strong>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Accumulator Cards (Summary Cards Row) -->
            <section class="summary-cards-row">
                <!-- Total Compras -->
                <div class="summary-card">
                    <div class="card-icon" style="background-color: #ffd6ff; color: var(--color-pink);">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div class="card-details">
                        <span class="card-title">Total Compras</span>
                        <span class="card-value">$<?= number_format($totalCompras, 0, ',', '.'); ?></span>
                        <span class="card-subtext"><?= $totalComprasCant; ?> ventas completadas</span>
                    </div>
                </div>

                <!-- Deuda Pendiente -->
                <div class="summary-card">
                    <div class="card-icon" style="background-color: #fcdfe5; color: #ec4899;">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <div class="card-details">
                        <span class="card-title">Deuda Pendiente</span>
                        <span class="card-value" style="color: #ec4899;">$<?= number_format($deudaTotal, 0, ',', '.'); ?></span>
                        <span class="card-subtext"><?= $deudaTotalCant; ?> fiados pendientes</span>
                    </div>
                </div>

                <!-- Última Compra -->
                <div class="summary-card">
                    <div class="card-icon" style="background-color: #e2e2ff; color: var(--color-blue);">
                        <i class="fa-regular fa-calendar-check"></i>
                    </div>
                    <div class="card-details">
                        <span class="card-title">Última Compra</span>
                        <span class="card-value"><?= $ultimaCompra; ?></span>
                        <span class="card-subtext">Fecha de última transacción</span>
                    </div>
                </div>
            </section>

            <!-- Grid: Historial de Deudas y Registro de Abono -->
            <section class="debts-grid-layout">
                
                <!-- Column Left: Historial de Créditos (Fiados) -->
                <div class="debts-history-card">
                    <div class="card-header-with-action">
                        <h2>Historial de Créditos (Fiados)</h2>
                        <button type="button" class="btn-register-debt-action" onclick="abrirModalDeuda()">
                            <i class="fa-solid fa-plus"></i> Registrar Deuda
                        </button>
                    </div>

                    <div style="overflow-x: auto;">
                        <table class="debts-table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Concepto</th>
                                    <th>Monto Inicial</th>
                                    <th>Monto Pendiente</th>
                                    <th>Estado</th>
                                    <th>Historial</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($deudas) > 0): ?>
                                    <?php foreach ($deudas as $d): ?>
                                        <?php 
                                            $badgeClass = "";
                                            if ($d['estado'] === 'Pagada') {
                                                $badgeClass = "pagada";
                                            } elseif ($d['estado'] === 'Abonada') {
                                                $badgeClass = "abonada";
                                            } else {
                                                $badgeClass = "pendiente";
                                            }
                                        ?>
                                        <tr>
                                            <td><?= date('d/m/Y', strtotime($d['fecha_Registro'])); ?></td>
                                            <td style="font-weight: 700; color: var(--color-purple);"><?= htmlspecialchars($d['concepto']); ?></td>
                                            <td style="font-weight: 600;">$<?= number_format($d['valor_Inicial'], 0, ',', '.'); ?></td>
                                            <td style="font-weight: 700;">$<?= number_format($d['saldo_Pendiente'], 0, ',', '.'); ?></td>
                                            <td>
                                                <span class="debt-status-pill <?= $badgeClass; ?>">
                                                    <?= htmlspecialchars($d['estado']); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn-view-abonos" onclick="consultarAbonos(<?= $d['id_Deuda']; ?>, '<?= htmlspecialchars($d['concepto']); ?>')">
                                                    <i class="fa-solid fa-list-check"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 25px;">
                                            El cliente no cuenta con deudas registradas.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Column Right: Registro de Abono Parcial -->
                <div class="update-status-section">
                    <h2>Registrar Abono a Deuda</h2>
                    <p style="font-size:12px; color:var(--text-muted); margin-bottom: 20px; font-weight:600;">
                        Selecciona el fiado correspondiente y registra el pago del cliente.
                    </p>

                    <?php if (count($deudasPendientes) > 0): ?>
                        <form action="../../controllers/vendedor_controller.php" method="POST" id="abonoForm">
                            <input type="hidden" name="action" value="registrar_abono">
                            <input type="hidden" name="id_cliente" value="<?= $id_cliente; ?>">

                            <div class="form-field">
                                <label for="selectDeuda">Selecciona la Deuda *</label>
                                <select name="id_deuda" id="selectDeuda" required onchange="actualizarSaldoMaximo()">
                                    <option value="" disabled selected>-- Elige una deuda pendiente --</option>
                                    <?php foreach ($deudasPendientes as $dp): ?>
                                        <option value="<?= $dp['id_Deuda']; ?>" data-saldo="<?= $dp['saldo_Pendiente']; ?>">
                                            <?= htmlspecialchars($dp['concepto']); ?> (Saldo: $<?= number_format($dp['saldo_Pendiente'], 0, ',', '.'); ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-field" style="margin-top: 15px;">
                                <label for="abonoMonto">Monto del Abono ($) *</label>
                                <input type="number" name="monto" id="abonoMonto" min="1" step="any" required>
                                <span id="montoMaxHelp" style="font-size:10px; color:var(--text-muted); font-weight:700; margin-top:4px;"></span>
                            </div>

                            <div class="form-field" style="margin-top: 15px;">
                                <label for="abonoConcepto">Concepto / Comentario</label>
                                <input type="text" name="concepto" id="abonoConcepto" value="Abono parcial en efectivo">
                            </div>

                            <button type="submit" class="btn-save-abono" style="margin-top: 25px;">
                                <i class="fa-solid fa-circle-check"></i> Registrar Abono
                            </button>
                        </form>
                    <?php else: ?>
                        <div style="text-align: center; color: var(--text-muted); padding: 30px; border: 2px dashed #ebd0f0; border-radius: 12px; background-color:#ffffff;">
                            <i class="fa-solid fa-face-smile" style="font-size: 32px; color: var(--color-purple); margin-bottom:10px;"></i>
                            <p style="font-weight: 700; font-size:13px;">El cliente no tiene deudas pendientes en este momento.</p>
                        </div>
                    <?php endif; ?>
                </div>

            </section>
        </main>
    </div>

    <!-- ==========================================
         MODALES
    =========================================== -->

    <!-- 1. MODAL: REGISTRAR NUEVA DEUDA -->
    <div class="modal" id="modalDeuda">
        <div class="modal-content" style="max-width: 450px;">
            <div class="modal-header">
                <h2>Registrar Nuevo Crédito (Fiado)</h2>
                <button class="modal-close-btn" onclick="cerrarModalDeuda()">&times;</button>
            </div>
            <div class="modal-body">
                <form action="../../controllers/vendedor_controller.php" method="POST" id="deudaForm">
                    <input type="hidden" name="action" value="registrar_deuda">
                    <input type="hidden" name="id_cliente" value="<?= $id_cliente; ?>">

                    <div style="display: flex; flex-direction: column; gap: 15px;">
                        <div class="form-field-group">
                            <label for="deudaConcepto">Concepto o Detalle *</label>
                            <input type="text" name="concepto" id="deudaConcepto" placeholder="Ej. Compra de víveres" required>
                        </div>
                        <div class="form-field-group">
                            <label for="deudaValor">Valor de la Deuda ($) *</label>
                            <input type="number" name="valor" id="deudaValor" min="1" step="any" required>
                        </div>
                    </div>

                    <div class="form-actions-row" style="margin-top: 25px;">
                        <button type="button" class="btn-modal-cancel" onclick="cerrarModalDeuda()">Cancelar</button>
                        <button type="submit" class="btn-modal-submit">Registrar Crédito</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 2. MODAL: CONSULTAR ABONOS -->
    <div class="modal" id="modalAbonos">
        <div class="modal-content" style="max-width: 520px;">
            <div class="modal-header">
                <h2 id="abonosModalTitle">Historial de Abonos</h2>
                <button class="modal-close-btn" onclick="cerrarModalAbonos()">&times;</button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <div style="max-height: 300px; overflow-y: auto;">
                    <table class="debts-table" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Concepto</th>
                                <th>Monto Abonado</th>
                            </tr>
                        </thead>
                        <tbody id="abonosTableBody">
                            <!-- Inyectado por JS -->
                        </tbody>
                    </table>
                </div>
                <div class="form-actions-row" style="margin-top: 20px;">
                    <button type="button" class="btn-modal-submit" onclick="cerrarModalAbonos()">Cerrar</button>
                </div>
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
        const modalDeuda = document.getElementById('modalDeuda');
        const modalAbonos = document.getElementById('modalAbonos');

        function abrirModalDeuda() {
            modalDeuda.classList.add('open');
        }
        function cerrarModalDeuda() {
            modalDeuda.classList.remove('open');
            document.getElementById('deudaForm').reset();
        }

        // Abonos Limit Check
        function actualizarSaldoMaximo() {
            const select = document.getElementById('selectDeuda');
            const selectedOption = select.options[select.selectedIndex];
            const montoInput = document.getElementById('abonoMonto');
            const help = document.getElementById('montoMaxHelp');

            if (selectedOption.value) {
                const saldo = parseFloat(selectedOption.getAttribute('data-saldo'));
                montoInput.max = saldo;
                help.innerText = `Monto máximo permitido: $${saldo.toLocaleString('es-CO')}`;
            } else {
                montoInput.removeAttribute('max');
                help.innerText = '';
            }
        }

        // Consultar Historial de Abonos de una Deuda
        function consultarAbonos(idDeuda, concepto) {
            document.getElementById('abonosModalTitle').innerText = "Abonos - " + concepto;
            
            // Consultar abonos mediante fetch a una mini-api local
            fetch(`../administrador/consultar_abonos.php?id_deuda=${idDeuda}`)
                .then(response => response.json())
                .then(data => {
                    const tbody = document.getElementById('abonosTableBody');
                    tbody.innerHTML = '';

                    if (data.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="3" style="text-align:center; color:var(--text-muted);">No se registran abonos a esta deuda.</td></tr>';
                    } else {
                        data.forEach(a => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td>${a.fecha}</td>
                                <td>${a.concepto}</td>
                                <td style="font-weight:700; color:#28a745;">$${parseFloat(a.monto).toLocaleString('es-CO')}</td>
                            `;
                            tbody.appendChild(tr);
                        });
                    }
                    modalAbonos.classList.add('open');
                })
                .catch(error => {
                    Swal.fire('Error', 'No se pudo consultar el historial de abonos.', 'error');
                });
        }

        function cerrarModalAbonos() {
            modalAbonos.classList.remove('open');
        }

        // SweetAlert GET notifications
        <?php if ($alerta_msg !== ''): ?>
            Swal.fire({
                icon: '<?= $alerta_tipo; ?>',
                title: '<?= $alerta_titulo; ?>',
                text: '<?= $alerta_msg; ?>',
                confirmButtonColor: '#6f2dbd'
            }).then(() => {
                window.location.href = 'cliente_detalle.php?id=<?= $id_cliente; ?>';
            });
        <?php endif; ?>
    </script>
</body>

</html>
