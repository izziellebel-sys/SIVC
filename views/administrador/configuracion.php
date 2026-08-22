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

// PROCESAR POST ACCIONES
if ($_SERVER["REQUEST_METHOD"] == "POST" && $id_usuario > 0) {
    $action = $_POST['action'] ?? '';

    if ($action === 'guardar') {
        $tema = $_POST['tema'] ?? 'lavender';
        $tipografia = $_POST['tipografia'] ?? 'Segoe UI';
        $tamanho_fuente = $_POST['tamanho_fuente'] ?? '14px';
        $modo_oscuro = isset($_POST['modo_oscuro']) ? 1 : 0;

        // Validar tamaño de fuente seguro
        $font_sizes_valid = ['12px', '14px', '16px', '18px', '20px'];
        if (!in_array($tamanho_fuente, $font_sizes_valid)) {
            $tamanho_fuente = '14px';
        }

        // Actualizar base de datos
        $stmtUpdate = $conn->prepare("UPDATE configuracion SET tema = ?, tipografia = ?, tamaño_Fuente = ?, modo_Oscuro = ? WHERE id_Usuario = ?");
        if ($stmtUpdate) {
            $stmtUpdate->bind_param("ssiii", $tema, $tipografia, $tamanho_fuente, $modo_oscuro, $id_usuario);
            if ($stmtUpdate->execute()) {
                $mensaje = "Configuración guardada y aplicada con éxito.";
                $tipo_alerta = "success";
                $titulo_alerta = "¡Éxito!";
            } else {
                $mensaje = "Error al actualizar la configuración.";
                $tipo_alerta = "error";
                $titulo_alerta = "Error";
            }
            $stmtUpdate->close();
        }
    } elseif ($action === 'restablecer') {
        // Restablecer valores de fábrica
        $stmtReset = $conn->prepare("UPDATE configuracion SET tema = 'lavender', tipografia = 'Segoe UI', tamaño_Fuente = '14px', modo_Oscuro = 0 WHERE id_Usuario = ?");
        if ($stmtReset) {
            $stmtReset->bind_param("i", $id_usuario);
            if ($stmtReset->execute()) {
                $mensaje = "Se han restablecido los valores predeterminados.";
                $tipo_alerta = "success";
                $titulo_alerta = "¡Restablecido!";
            } else {
                $mensaje = "Error al restablecer la configuración.";
                $tipo_alerta = "error";
                $titulo_alerta = "Error";
            }
            $stmtReset->close();
        }
    }
}

// Cargar configuración actual para pre-poblar los campos
$config = obtenerConfiguracionUsuario();

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
$fechaString = $dias[$diaSemana] . ' ' . date('d') . ' de ' . $meses[$mes];
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
    <link rel="stylesheet" href="admi.css/dashboard_admi.css?v=5">
    <link rel="stylesheet" href="admi.css/configuracion_admi.css?v=5">
    
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

                <a href="clientes.php" class="sidebar-link-card">
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

                <a href="configuracion.php" class="sidebar-link-card active">
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

            <!-- Header Section -->
            <header class="header-with-illustration">
                <div class="welcome-header-text">
                    <h1 style="font-size: 56px; font-weight: 800; color: #000000; margin: 0;">Configuración</h1>
                </div>
                <div class="header-illustration">
                    <img src="../../public/img/store_shelves_illustration.jpg" alt="Illustration" class="header-illustration-img">
                </div>
            </header>

            <!-- FORMULARIO DE AJUSTES -->
            <form action="configuracion.php" method="POST" id="configForm">
                <input type="hidden" name="action" id="formAction" value="guardar">
                
                <!-- Inputs Ocultos para capturar estados dinámicos del Tema y Fuente -->
                <input type="hidden" name="tema" id="selectedTema" value="<?= htmlspecialchars($config['tema']); ?>">
                <input type="hidden" name="tipografia" id="selectedTipografia" value="<?= htmlspecialchars($config['tipografia']); ?>">

                <section class="config-options-list">
                    
                    <!-- 1. Color de Fondo -->
                    <div class="config-card">
                        <div class="config-info">
                            <h3>Color de fondo</h3>
                            <p>Modifica el tono de fondo primario para toda la aplicación</p>
                        </div>
                        <div class="config-control-panel">
                            <div class="color-palette-group">
                                <!-- Opción Lavanda (Default) -->
                                <button type="button" class="color-option-btn <?= $config['tema'] === 'lavender' ? 'selected' : ''; ?>" 
                                        style="background-color: #eedffd;" onclick="seleccionarTema('lavender', this)"></button>
                                <!-- Opción Celeste -->
                                <button type="button" class="color-option-btn <?= $config['tema'] === 'cyan' ? 'selected' : ''; ?>" 
                                        style="background-color: #d1f2fd;" onclick="seleccionarTema('cyan', this)"></button>
                                <!-- Opción Verde -->
                                <button type="button" class="color-option-btn <?= $config['tema'] === 'green' ? 'selected' : ''; ?>" 
                                        style="background-color: #d2f8d2;" onclick="seleccionarTema('green', this)"></button>
                                <!-- Opción Rosado -->
                                <button type="button" class="color-option-btn <?= $config['tema'] === 'pink' ? 'selected' : ''; ?>" 
                                        style="background-color: #fde2ff;" onclick="seleccionarTema('pink', this)"></button>
                                <!-- Opción Arena -->
                                <button type="button" class="color-option-btn <?= $config['tema'] === 'sand' ? 'selected' : ''; ?>" 
                                        style="background-color: #f3e9dc;" onclick="seleccionarTema('sand', this)"></button>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Tipografía -->
                    <div class="config-card">
                        <div class="config-info">
                            <h3>Tipografía</h3>
                            <p>Elige el tipo de letra preferido del sistema</p>
                        </div>
                        <div class="config-control-panel">
                            <div class="font-buttons-group">
                                <button type="button" class="font-option-btn <?= $config['tipografia'] === 'Comic Sans' ? 'selected' : ''; ?>" 
                                        style="font-family: 'Comic Sans MS', cursive, sans-serif;" onclick="seleccionarFont('Comic Sans', this)">Comic Sans</button>
                                <button type="button" class="font-option-btn <?= $config['tipografia'] === 'Georgia' ? 'selected' : ''; ?>" 
                                        style="font-family: Georgia, serif;" onclick="seleccionarFont('Georgia', this)">Georgia</button>
                                <button type="button" class="font-option-btn <?= $config['tipografia'] === 'Courier' ? 'selected' : ''; ?>" 
                                        style="font-family: 'Courier New', Courier, monospace;" onclick="seleccionarFont('Courier', this)">Courier</button>
                                <button type="button" class="font-option-btn <?= $config['tipografia'] === 'Segoe UI' ? 'selected' : ''; ?>" 
                                        style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;" onclick="seleccionarFont('Segoe UI', this)">Segoe UI</button>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Tamaño de la fuente -->
                    <div class="config-card">
                        <div class="config-info">
                            <h3>Tamaño de la fuente</h3>
                            <p>Ajusta la escala de lectura de textos en los menús y paneles</p>
                        </div>
                        <div class="config-control-panel">
                            <div class="font-size-slider-wrapper">
                                <span class="slider-label-a small">A</span>
                                
                                <?php
                                    // Mapear el tamaño string (12px, 14px, etc) a valor numérico para el slider (1, 2, 3, 4, 5)
                                    $sizeMapToVal = ['12px' => 1, '14px' => 2, '16px' => 3, '18px' => 4, '20px' => 5];
                                    $slider_val = $sizeMapToVal[$config['tamaño_Fuente']] ?? 2;
                                ?>
                                <input type="range" min="1" max="5" step="1" value="<?= $slider_val; ?>" 
                                       class="font-size-range-input" id="fontSizeRange" oninput="actualizarLabelSize(this.value)">
                                <input type="hidden" name="tamanho_fuente" id="selectedFontSize" value="<?= htmlspecialchars($config['tamaño_Fuente']); ?>">
                                
                                <span class="slider-label-a large">A</span>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Modo oscuro -->
                    <div class="config-card">
                        <div class="config-info">
                            <h3>Modo oscuro</h3>
                            <p>Cambia la apariencia general del sistema a colores oscuros</p>
                        </div>
                        <div class="config-control-panel">
                            <label class="switch-toggle-wrapper">
                                <input type="checkbox" name="modo_oscuro" id="formModoOscuro" <?= (int)$config['modo_Oscuro'] === 1 ? 'checked' : ''; ?>>
                                <span class="slider-round"></span>
                            </label>
                        </div>
                    </div>

                </section>

                <!-- Botones Acciones -->
                <div class="config-footer-actions">
                    <button type="button" class="btn-config-reset" onclick="confirmarRestablecer()">Restablecer Valores</button>
                    <button type="submit" class="btn-config-save">Guardar Cambios</button>
                </div>
            </form>
        </main>
    </div>

    <!-- JS Mobile Toggle Drawer & Form Controllers -->
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

        // Controladores de Formulario
        function seleccionarTema(tema, element) {
            document.getElementById('selectedTema').value = tema;
            // Remover 'selected' de todos y agregar al seleccionado
            document.querySelectorAll('.color-option-btn').forEach(btn => btn.classList.remove('selected'));
            element.classList.add('selected');
        }

        function seleccionarFont(font, element) {
            document.getElementById('selectedTipografia').value = font;
            // Remover 'selected' de todos y agregar al seleccionado
            document.querySelectorAll('.font-option-btn').forEach(btn => btn.classList.remove('selected'));
            element.classList.add('selected');
        }

        // Mapear valores del slider a pixeles
        const valToSizeMap = {
            1: '12px',
            2: '14px',
            3: '16px',
            4: '18px',
            5: '20px'
        };

        function actualizarLabelSize(val) {
            const fontPixel = valToSizeMap[val] || '14px';
            document.getElementById('selectedFontSize').value = fontPixel;
        }

        // Confirmar restablecimiento
        function confirmarRestablecer() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Se aplicarán los valores de fábrica al sistema.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6f2dbd',
                cancelButtonColor: '#ebd3f8',
                confirmButtonText: 'Sí, restablecer',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('configForm');
                    document.getElementById('formAction').value = 'restablecer';
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
                confirmButtonColor: '#6f2dbd'
            });
        <?php endif; ?>
    </script>
</body>

</html>
