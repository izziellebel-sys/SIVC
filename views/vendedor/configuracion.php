<?php
session_start();

// Protección de acceso para rol Vendedor
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/load_config.php';
$id_usuario = $_SESSION['id_Usuario'] ?? 0;

$mensaje = "";
$tipo_alerta = "";
$titulo_alerta = "";

// ==========================================================================
// PROCESAR POST ACCIONES (SÓLO APARIENCIA)
// ==========================================================================

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

        // Actualizar base de datos para el vendedor logueado
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
    }
}

// ==========================================================================
// CARGAR CONFIGURACIÓN DE APARIENCIA Y PERFIL DEL VENDEDOR
// ==========================================================================

$config = obtenerConfiguracionUsuario();

// Datos del Vendedor Logueado
$nombreUsuario = $_SESSION['usuario'] ?? 'Vendedor';
$sellerEmail = "vendedor@sivc.com";
$nombreCompleto = $nombreUsuario;
$resSeller = $conn->query("SELECT * FROM usuarios WHERE id_Usuario = $id_usuario");
if ($resSeller && $sRow = $resSeller->fetch_assoc()) {
    $sellerEmail = $sRow['correo'];
    $nombreCompleto = $sRow['nombre'] . ' ' . $sRow['apellido'];
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
    <title>Configuración de Apariencia | SIVC</title>

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
    <link rel="stylesheet" href="../administrador/admi.css/dashboard_admi.css?v=8">
    <link rel="stylesheet" href="../administrador/admi.css/configuracion_admi.css?v=8">
    
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
                <i class="fa-solid fa-xmark"></i>
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
                <a href="dashboard_vendedor.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-house"></i>
                        <span>Inicio</span>
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

                <a href="configuracion.php" class="sidebar-link-card active">
                    <div class="link-left">
                        <i class="fa-solid fa-gear"></i>
                        <span>Configuración</span>
                    </div>
                    <span class="link-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
            </nav>

            <!-- Logout -->
            <div class="sidebar-footer-section">
                <a href="../../controllers/logout.php" class="sidebar-logout-btn">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Cerrar sesión</span>
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
            <header class="content-header">
                <div class="welcome-header-text">
                    <span class="welcome-label" style="font-size: 11px; font-weight: 700; color: var(--color-green); letter-spacing: 1px; text-transform: uppercase; display: block; margin-bottom: 2px;">Panel de Venta</span>
                    <h1>Configuración</h1>
                    <p>Personaliza la apariencia visual de tu panel de ventas.</p>
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
                    <!-- Widget Perfil Vendedor -->
                    <div class="profile-card">
                        <div class="profile-avatar">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="profile-info">
                            <strong><?= htmlspecialchars($nombreCompleto); ?></strong>
                            <span><?= htmlspecialchars($sellerEmail); ?></span>
                        </div>
                        <i class="fa-solid fa-chevron-down profile-chevron"></i>
                    </div>
                </div>
            </header>

            <!-- ==========================================
                 SECCIÓN: APARIENCIA
            =========================================== -->
            <form action="configuracion.php" method="POST" id="configForm">
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
                                <p>Selecciona el color principal que se utilizará en tu panel.</p>
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
                                <p>Elige el tipo de letra que prefieres para la interfaz de tu panel.</p>
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
                                <p>Ajusta el tamaño de la fuente para mejorar la legibilidad en tus menús y tablas.</p>
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

        </main>
    </div>

    <!-- ==========================================
         JAVASCRIPT LOGIC
    =========================================== -->
    <script>
        // Drawer Mobile Menu
        const mobileBtn = document.getElementById('mobileMenu');
        const sidebar = document.getElementById('sidebar');
        const sidebarClose = document.getElementById('sidebarClose');

        if (mobileBtn && sidebar) {
            mobileBtn.addEventListener('click', () => {
                sidebar.classList.toggle('open');
            });
        }

        if (sidebarClose && sidebar) {
            sidebarClose.addEventListener('click', () => {
                sidebar.classList.remove('open');
            });
        }

        // Selección interactiva de Tema
        function seleccionarTema(temaClave, btnElement) {
            document.querySelectorAll('.color-option-btn').forEach(btn => {
                btn.classList.remove('selected');
                btn.innerHTML = '';
            });
            btnElement.classList.add('selected');
            btnElement.innerHTML = '<i class="fa-solid fa-check" style="color: #ffffff; font-size: 14px;"></i>';
            document.getElementById('selectedTema').value = temaClave;
        }

        // Selección interactiva de Tipografía
        function seleccionarFont(fontName, btnElement) {
            document.querySelectorAll('.font-option-btn').forEach(btn => {
                btn.classList.remove('selected');
                const check = btn.querySelector('.fa-check');
                if (check) check.remove();
            });
            btnElement.classList.add('selected');
            btnElement.innerHTML = '<i class="fa-solid fa-check" style="color: inherit; font-size: 12px; margin-right: 4px;"></i> ' + fontName;
            document.getElementById('selectedTipografia').value = fontName;
        }

        // Slider Tamaño de Fuente
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
