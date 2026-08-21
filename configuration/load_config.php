<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/database.php';

function obtenerConfiguracionUsuario() {
    global $conn;
    $id_usuario = $_SESSION['id_Usuario'] ?? 0;
    
    // Configuración por defecto
    $default_config = [
        'tema' => 'lavender',
        'tipografia' => 'Segoe UI',
        'tamaño_Fuente' => '14px',
        'modo_Oscuro' => 0
    ];

    if ($id_usuario <= 0) {
        return $default_config;
    }

    $stmt = $conn->prepare("SELECT tema, tipografia, tamaño_Fuente, modo_Oscuro FROM configuracion WHERE id_Usuario = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $res = $stmt->get_result();
        $config = $res->fetch_assoc();
        $stmt->close();

        if ($config) {
            return $config;
        } else {
            // Si no existe, insertar configuración por defecto
            $stmtInsert = $conn->prepare("INSERT INTO configuracion (tema, tipografia, tamaño_Fuente, modo_Oscuro, id_Usuario) VALUES (?, ?, ?, ?, ?)");
            if ($stmtInsert) {
                $tema = $default_config['tema'];
                $tipo = $default_config['tipografia'];
                $tamanho = $default_config['tamaño_Fuente'];
                $modo = $default_config['modo_Oscuro'];
                
                $stmtInsert->bind_param("ssiii", $tema, $tipo, $tamanho, $modo, $id_usuario);
                $stmtInsert->execute();
                $stmtInsert->close();
            }
            return $default_config;
        }
    }
    return $default_config;
}

function aplicarConfiguracionEstilos() {
    $config = obtenerConfiguracionUsuario();
    
    // Mapeo de Colores de Fondo (Temas)
    $temasMap = [
        'lavender' => '#eedffd',
        'cyan'     => '#d1f2fd',
        'green'    => '#d2f8d2',
        'pink'     => '#fde2ff',
        'sand'     => '#f3e9dc'
    ];
    $bg_color = $temasMap[$config['tema']] ?? '#eedffd';

    // Mapeo de Tipografías
    $fontsMap = [
        'Comic Sans' => "'Comic Sans MS', cursive, sans-serif",
        'Georgia'    => "Georgia, serif",
        'Courier'    => "'Courier New', Courier, monospace",
        'Segoe UI'   => "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
    ];
    $font_family = $fontsMap[$config['tipografia']] ?? "'Montserrat', sans-serif";

    // Tamaño de fuente
    $font_size = $config['tamaño_Fuente'];

    // Modo Oscuro CSS
    $modo_oscuro = (int)$config['modo_Oscuro'];

    echo "<!-- SIVC DYNAMIC CONFIGURATION OVERRIDES -->\n<style>\n";
    
    // Estilos generales del tema
    echo "  body {\n";
    echo "    --bg-lavender: $bg_color !important;\n";
    echo "    font-family: $font_family !important;\n";
    echo "  }\n";
    
    // Sobreescrituras de tamaño de fuente
    echo "  body, .main-content, .sidebar, input, select, button, table, td, th {\n";
    echo "    font-size: $font_size !important;\n";
    echo "  }\n";

    if ($modo_oscuro === 1) {
        echo "  /* MODO OSCURO GLOBAL OVERRIDES */\n";
        echo "  body, .main-content {\n";
        echo "    background-color: #12101f !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .sidebar {\n";
        echo "    background-color: #1e1b2e !important;\n";
        echo "    border-right: 2px solid #332d4b !important;\n";
        echo "  }\n";
        echo "  .sidebar-logo-section .brand-title {\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .sidebar-link-card {\n";
        echo "    background-color: #262238 !important;\n";
        echo "    border-color: #332d4b !important;\n";
        echo "    color: #b3b0c2 !important;\n";
        echo "  }\n";
        echo "  .sidebar-link-card.active {\n";
        echo "    background: linear-gradient(135deg, #6f2dbd 0%, #b5179e 100%) !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .stat-box-card, .chart-panel-card, .inventory-table-container, .clients-table-container, .filter-bar-form, .client-detail-header-card, .summary-card, .update-status-section, .modal-content {\n";
        echo "    background-color: #1e1b2e !important;\n";
        echo "    border-color: #332d4b !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .inventory-table th, .clients-table th, .report-table th, .debts-table th {\n";
        echo "    background-color: #2d2744 !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "    border-bottom: 2px solid #332d4b !important;\n";
        echo "  }\n";
        echo "  .inventory-table td, .clients-table td, .report-table td, .debts-table td {\n";
        echo "    border-bottom: 1px solid #332d4b !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .inventory-table tr:nth-child(even), .clients-table tr:nth-child(even), .report-table tr:nth-child(even), .debts-table tr:nth-child(even) {\n";
        echo "    background-color: #221f35 !important;\n";
        echo "  }\n";
        echo "  h1, h2, h3, h4, strong, .stat-box-details .stat-number, .card-value, .client-name-cell, .client-profile-info h2 {\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  p, span, .stat-box-details .stat-desc, .pagination-info, .card-subtext, label, .datetime-details span {\n";
        echo "    color: #b3b0c2 !important;\n";
        echo "  }\n";
        echo "  input, select {\n";
        echo "    background-color: #2d2744 !important;\n";
        echo "    border-color: #332d4b !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  input:focus, select:focus {\n";
        echo "    border-color: #6f2dbd !important;\n";
        echo "    background-color: #1e1b2e !important;\n";
        echo "  }\n";
        echo "  .filter-input-group {\n";
        echo "    background-color: #2d2744 !important;\n";
        echo "    border-color: #332d4b !important;\n";
        echo "  }\n";
        echo "  .filter-input-group input {\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .modal-header {\n";
        echo "    background-color: #262238 !important;\n";
        echo "    border-bottom: 2px solid #332d4b !important;\n";
        echo "  }\n";
    }

    echo "</style>\n";
}
?>
