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
                
                $stmtInsert->bind_param("sssii", $tema, $tipo, $tamanho, $modo, $id_usuario);
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
    
    // Mapeo de Temas según Mockup (Configura colores primarios y del Sidebar)
    $themeSettings = [
        'dark_green' => [
            'sidebar_bg' => '#014235',
            'sidebar_active' => '#005a46',
            'sidebar_hover' => '#004837',
            'text_muted' => '#a3b8b0'
        ],
        'navy_blue' => [
            'sidebar_bg' => '#0f172a',
            'sidebar_active' => '#1e293b',
            'sidebar_hover' => '#1e293b99',
            'text_muted' => '#94a3b8'
        ],
        'slate_grey' => [
            'sidebar_bg' => '#334155',
            'sidebar_active' => '#475569',
            'sidebar_hover' => '#47556999',
            'text_muted' => '#cbd5e1'
        ],
        'teal_green' => [
            'sidebar_bg' => '#0d9488',
            'sidebar_active' => '#14b8a6',
            'sidebar_hover' => '#0f766e',
            'text_muted' => '#ccfbf1'
        ],
        'dusty_purple' => [
            'sidebar_bg' => '#8b9bb4',
            'sidebar_active' => '#a3b2c9',
            'sidebar_hover' => '#7887a0',
            'text_muted' => '#f1f5f9'
        ]
    ];
    
    $activeTheme = $themeSettings[$config['tema']] ?? $themeSettings['dark_green'];

    // Mapeo de Tipografías
    $fontsMap = [
        'Segoe UI'  => "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif",
        'Inter'     => "'Inter', sans-serif",
        'Poppins'   => "'Poppins', sans-serif",
        'Roboto'    => "'Roboto', sans-serif",
        'Nunito'    => "'Nunito', sans-serif",
        'Open Sans' => "'Open Sans', sans-serif"
    ];
    $font_family = $fontsMap[$config['tipografia']] ?? "'Montserrat', sans-serif";

    // Importación de Google Fonts dinámica
    $fontsImports = [
        'Inter'     => "@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');",
        'Poppins'   => "@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');",
        'Roboto'    => "@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');",
        'Nunito'    => "@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap');",
        'Open Sans' => "@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap');"
    ];
    $import_css = $fontsImports[$config['tipografia']] ?? "";

    // Tamaño de fuente
    $font_size = $config['tamaño_Fuente'];

    // Modo Oscuro CSS
    $modo_oscuro = (int)$config['modo_Oscuro'];

    echo "<!-- SIVC DYNAMIC CONFIGURATION OVERRIDES -->\n<style>\n";
    if ($import_css) {
        echo "  " . $import_css . "\n";
    }
    
    // Inyectar variables del tema
    echo "  :root {\n";
    echo "    --sidebar-bg: " . $activeTheme['sidebar_bg'] . " !important;\n";
    echo "    --sidebar-active-bg: " . $activeTheme['sidebar_active'] . " !important;\n";
    echo "    --sidebar-hover-bg: " . $activeTheme['sidebar_hover'] . " !important;\n";
    echo "    --sidebar-text-muted: " . $activeTheme['text_muted'] . " !important;\n";
    echo "  }\n";
    
    // Estilos generales del tema
    echo "  body {\n";
    echo "    font-family: $font_family !important;\n";
    echo "  }\n";
    
    // Sobreescrituras de tamaño de fuente
    echo "  body, .main-content, .sidebar, input, select, button, table, td, th {\n";
    echo "    font-size: $font_size !important;\n";
    echo "  }\n";

    if ($modo_oscuro === 1) {
        echo "  /* MODO OSCURO GLOBAL OVERRIDES */\n";
        echo "  body, .main-content {\n";
        echo "    background-color: #0b0f19 !important;\n";
        echo "    color: #f8fafc !important;\n";
        echo "  }\n";
        echo "  .sidebar {\n";
        echo "    background-color: #0f172a !important;\n";
        echo "    border-right: 2px solid #1e293b !important;\n";
        echo "  }\n";
        echo "  .sidebar-logo-section .brand-title {\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .sidebar-link-card {\n";
        echo "    background-color: #1e293b !important;\n";
        echo "    border-color: #334155 !important;\n";
        echo "    color: #94a3b8 !important;\n";
        echo "  }\n";
        echo "  .sidebar-link-card.active {\n";
        echo "    background-color: " . $activeTheme['sidebar_active'] . " !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .stat-box-card, .chart-panel-card, .inventory-table-container, .clients-table-container, .filter-bar-form, .client-detail-header-card, .summary-card, .update-status-section, .modal-content {\n";
        echo "    background-color: #0f172a !important;\n";
        echo "    border-color: #1e293b !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .inventory-table th, .clients-table th, .report-table th, .debts-table th {\n";
        echo "    background-color: #1e293b !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "    border-bottom: 2px solid #334155 !important;\n";
        echo "  }\n";
        echo "  .inventory-table td, .clients-table td, .report-table td, .debts-table td {\n";
        echo "    border-bottom: 1px solid #1e293b !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .inventory-table tr:nth-child(even), .clients-table tr:nth-child(even), .report-table tr:nth-child(even), .debts-table tr:nth-child(even) {\n";
        echo "    background-color: #0f172a !important;\n";
        echo "  }\n";
        echo "  h1, h2, h3, h4, strong, .stat-box-details .stat-number, .card-value, .client-name-cell, .client-profile-info h2 {\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  p, span, .stat-box-details .stat-desc, .pagination-info, .card-subtext, label, .datetime-details span {\n";
        echo "    color: #94a3b8 !important;\n";
        echo "  }\n";
        echo "  input, select {\n";
        echo "    background-color: #1e293b !important;\n";
        echo "    border-color: #334155 !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  input:focus, select:focus {\n";
        echo "    border-color: #0d9488 !important;\n";
        echo "    background-color: #0f172a !important;\n";
        echo "  }\n";
        echo "  .filter-input-group {\n";
        echo "    background-color: #1e293b !important;\n";
        echo "    border-color: #334155 !important;\n";
        echo "  }\n";
        echo "  .filter-input-group input {\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .modal-header {\n";
        echo "    background-color: #0f172a !important;\n";
        echo "    border-bottom: 2px solid #1e293b !important;\n";
        echo "  }\n";
    }

    echo "</style>\n";
}
?>
