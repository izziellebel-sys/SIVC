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
        'tema' => 'dark_green',
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

function obtenerConfiguracionFuentes() {
    $configFile = __DIR__ . '/fuentes_config.json';
    if (file_exists($configFile)) {
        $data = json_decode(file_get_contents($configFile), true);
        if (is_array($data)) {
            return $data;
        }
    }
    return null;
}

function aplicarConfiguracionEstilos() {
    $config = obtenerConfiguracionUsuario();
    $fuentesConfig = obtenerConfiguracionFuentes();
    
    // Mapeo de Temas (Azul, Morado, Verde agua marina, Verde más oscuro, Azul más oscuro)
    $themeSettings = [
        'blue' => [
            'sidebar_bg' => '#1e40af',
            'sidebar_active' => '#2563eb',
            'sidebar_hover' => '#1d4ed8',
            'text_muted' => '#bfdbfe'
        ],
        'purple' => [
            'sidebar_bg' => '#581c87',
            'sidebar_active' => '#7e22ce',
            'sidebar_hover' => '#6b21a8',
            'text_muted' => '#e9d5ff'
        ],
        'teal_green' => [
            'sidebar_bg' => '#0d9488',
            'sidebar_active' => '#14b8a6',
            'sidebar_hover' => '#0f766e',
            'text_muted' => '#ccfbf1'
        ],
        'aquamarine' => [
            'sidebar_bg' => '#0d9488',
            'sidebar_active' => '#14b8a6',
            'sidebar_hover' => '#0f766e',
            'text_muted' => '#ccfbf1'
        ],
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
        // Compatibilidad histórica
        'slate_grey' => [
            'sidebar_bg' => '#0f172a',
            'sidebar_active' => '#1e293b',
            'sidebar_hover' => '#1e293b99',
            'text_muted' => '#94a3b8'
        ],
        'dusty_purple' => [
            'sidebar_bg' => '#581c87',
            'sidebar_active' => '#7e22ce',
            'sidebar_hover' => '#6b21a8',
            'text_muted' => '#e9d5ff'
        ],
        'lavender' => [
            'sidebar_bg' => '#581c87',
            'sidebar_active' => '#7e22ce',
            'sidebar_hover' => '#6b21a8',
            'text_muted' => '#e9d5ff'
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

    // Escala tipográfica jerárquica
    $fontSizeKey = $config['tamaño_Fuente'] ?? '14px';
    $escalaActual = $fuentesConfig['escalas_usuario'][$fontSizeKey] ?? $fuentesConfig['escalas_usuario']['14px'] ?? null;
    
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
    
    // Jerarquía de tamaños de fuente
    if ($escalaActual) {
        $h1_size = $escalaActual['titulos']['h1'] ?? '22px';
        $h2_size = $escalaActual['titulos']['h2'] ?? '18px';
        $h3_size = $escalaActual['titulos']['h3'] ?? '16px';
        $sub_size = $escalaActual['subtitulos'] ?? '14px';
        $p_size = $escalaActual['parrafos'] ?? '13px';
        $th_size = $escalaActual['tablas']['th'] ?? '12px';
        $td_size = $escalaActual['tablas']['td'] ?? '13px';
        $detail_size = $escalaActual['detalles'] ?? '11px';
        $input_size = $escalaActual['inputs_botones'] ?? '13px';

        echo "  /* JERARQUÍA TIPOGRÁFICA (Títulos, Subtítulos, Párrafos, Tablas) */\n";
        echo "  h1, .page-header-title h1 { font-size: $h1_size !important; }\n";
        echo "  h2, .stat-box-card h2, .chart-panel-card h2 { font-size: $h2_size !important; }\n";
        echo "  h3, .config-info h3, .stat-title, .card-header h2 { font-size: $h3_size !important; }\n";
        echo "  .header-subtitle, .card-subtitle, .stat-desc, .config-info p { font-size: $sub_size !important; }\n";
        echo "  body, .main-content, p, .sidebar-link-card span { font-size: $p_size !important; }\n";
        echo "  table th { font-size: $th_size !important; }\n";
        echo "  table td { font-size: $td_size !important; }\n";
        echo "  .status-badge, .payment-method-tag, .pagination-info, label, .card-subtext { font-size: $detail_size !important; }\n";
        echo "  input, select, .btn-primary, .btn-secondary, button:not(.action-icon-btn) { font-size: $input_size !important; }\n";
    }

    if ($modo_oscuro === 1) {
        echo "  /* ==========================================================================\n";
        echo "     MODERN PREMIUM DARK MODE ENGINE - SIVC (ALL MODULES)\n";
        echo "     ========================================================================== */\n";
        
        // Sobreescribir tokens y variables de diseño
        echo "  :root {\n";
        echo "    --bg-slate-50: #0b0f19 !important;\n";
        echo "    --bg-lavender: #0b0f19 !important;\n";
        echo "    --card-bg: #141d30 !important;\n";
        echo "    --text-dark: #f8fafc !important;\n";
        echo "    --text-muted: #94a3b8 !important;\n";
        echo "    --border-color: #233044 !important;\n";
        echo "    --border-style: 1px solid #233044 !important;\n";
        echo "    --color-green-light: rgba(16, 185, 129, 0.15) !important;\n";
        echo "    --color-green: #34d399 !important;\n";
        echo "    --bg-green: rgba(16, 185, 129, 0.15) !important;\n";
        echo "    --bg-blue: rgba(59, 130, 246, 0.15) !important;\n";
        echo "    --bg-orange: rgba(249, 115, 22, 0.15) !important;\n";
        echo "    --bg-purple: rgba(168, 85, 247, 0.15) !important;\n";
        echo "  }\n";
        
        // 1. Lienzo Global y Contenedores
        echo "  body, .main-content {\n";
        echo "    background-color: #0b0f19 !important;\n";
        echo "    color: #f1f5f9 !important;\n";
        echo "  }\n";
        
        // 2. Tarjetas, Paneles y Superficies Elevadas (Todos los módulos)
        echo "  .stat-card, .stat-box-card, .chart-panel-card, .chart-wrapper-card, .activity-panel-card,\n";
        echo "  .inventory-table-container, .clients-table-container, .table-container, .report-table-container, .debts-table-container,\n";
        echo "  .filter-bar-form, .filters-bar, .search-filter-wrapper, .filter-section, .client-detail-header-card, .summary-card,\n";
        echo "  .update-status-section, .config-card, .config-section-card, .recent-activity-card, .card,\n";
        echo "  .sales-card-box, .sales-history-card, .vendedores-table-container, .report-tabs-bar, .date-range-badge,\n";
        echo "  .inventory-stats-row .stat-box-card, .clients-stats-row .stat-box-card, .vendedores-stats-row .stat-box-card,\n";
        echo "  .vendedor-profile-card, .seller-stat-badge-box, .details-grid, .modal-content, .card-body, .panel {\n";
        echo "    background-color: #141d30 !important;\n";
        echo "    border: 1px solid #233044 !important;\n";
        echo "    color: #f8fafc !important;\n";
        echo "    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25) !important;\n";
        echo "  }\n";
        echo "  .config-card:hover, .stat-card:hover, .stat-box-card:hover, .sales-card-box:hover {\n";
        echo "    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.35) !important;\n";
        echo "    border-color: #2e3e56 !important;\n";
        echo "  }\n";
        
        // 3. Encabezados y Widgets del Header
        echo "  .datetime-card, .datetime-badge, .profile-card, .user-profile-badge {\n";
        echo "    background-color: #141d30 !important;\n";
        echo "    border: 1px solid #233044 !important;\n";
        echo "    color: #f8fafc !important;\n";
        echo "    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2) !important;\n";
        echo "  }\n";
        echo "  .datetime-card i, .datetime-badge i {\n";
        echo "    color: #38bdf8 !important;\n";
        echo "  }\n";
        echo "  .datetime-details strong, .profile-info strong {\n";
        echo "    color: #f8fafc !important;\n";
        echo "  }\n";
        echo "  .datetime-details span, .profile-info span {\n";
        echo "    color: #94a3b8 !important;\n";
        echo "  }\n";
        echo "  .profile-avatar {\n";
        echo "    background-color: rgba(56, 189, 248, 0.15) !important;\n";
        echo "    color: #38bdf8 !important;\n";
        echo "    border: 1px solid rgba(56, 189, 248, 0.25) !important;\n";
        echo "  }\n";
        echo "  .profile-chevron {\n";
        echo "    color: #64748b !important;\n";
        echo "  }\n";
        
        // 4. Tipografía y Jerarquía Textual
        echo "  h1, h2, h3, h4, h5, h6, .brand-title, .stat-number, .stat-value, .card-value,\n";
        echo "  .client-name-cell, .vendedor-name-cell, .client-profile-info h2, .config-info h3, .config-section-header h2,\n";
        echo "  .sales-card-box h2, .card-header-with-filters h2 {\n";
        echo "    color: #f8fafc !important;\n";
        echo "  }\n";
        echo "  .welcome-header-text p, .content-header p, .header-subtitle, .stat-desc, .stat-subtext,\n";
        echo "  .stat-name, .stat-title, .card-subtitle, .config-info p, .config-section-header p,\n";
        echo "  .pagination-info, .card-subtext, .pagination-info-text {\n";
        echo "    color: #94a3b8 !important;\n";
        echo "  }\n";
        
        // 5. Form Controles, Inputs, Buscadores y Selectores
        echo "  input, select, textarea, .config-form-input, .filter-input-group, .search-box, .filter-select,\n";
        echo "  .select-wrapper select, .form-group-item input, .sales-input-wrapper select, .sales-input-wrapper input,\n";
        echo "  .filter-select-wrapper select, .form-field-group input, .form-field-group select {\n";
        echo "    background-color: #0e1626 !important;\n";
        echo "    border: 1px solid #283950 !important;\n";
        echo "    color: #f8fafc !important;\n";
        echo "  }\n";
        echo "  input::placeholder, textarea::placeholder, .filter-input-group input::placeholder, .search-box input::placeholder {\n";
        echo "    color: #64748b !important;\n";
        echo "  }\n";
        echo "  input:focus, select:focus, textarea:focus, .config-form-input:focus, .filter-input-group:focus-within,\n";
        echo "  .select-wrapper select:focus, .sales-input-wrapper select:focus, .sales-input-wrapper input:focus,\n";
        echo "  .form-field-group input:focus, .form-field-group select:focus {\n";
        echo "    border-color: #38bdf8 !important;\n";
        echo "    background-color: #0e1626 !important;\n";
        echo "    box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2) !important;\n";
        echo "    outline: none !important;\n";
        echo "  }\n";
        echo "  .filter-input-group i, .search-box i, .select-wrapper .select-chevron, .sales-input-wrapper .select-chevron-custom, .sales-input-wrapper .input-icon-left {\n";
        echo "    color: #94a3b8 !important;\n";
        echo "  }\n";
        echo "  .config-form-group label, label, .form-group-item label, .sales-filter-item label, .filter-select-wrapper label, .form-field-group label {\n";
        echo "    color: #cbd5e1 !important;\n";
        echo "  }\n";
        
        // 6. Tablas Universales y Filas (Neutraliza fondos blancos en TODAS las tablas)
        echo "  table, .inventory-table, .clients-table, .report-table, .debts-table, .vendedores-table, .sales-history-table, .cart-table, .preview-table {\n";
        echo "    background-color: transparent !important;\n";
        echo "  }\n";
        echo "  table th, .inventory-table th, .clients-table th, .report-table th, .debts-table th, .vendedores-table th, .sales-history-table th, .cart-table th, .preview-table th {\n";
        echo "    background-color: #101726 !important;\n";
        echo "    color: #94a3b8 !important;\n";
        echo "    border-bottom: 1px solid #233044 !important;\n";
        echo "  }\n";
        echo "  table td, .inventory-table td, .clients-table td, .report-table td, .debts-table td, .vendedores-table td, .sales-history-table td, .cart-table td, .preview-table td {\n";
        echo "    background-color: #141d30 !important;\n";
        echo "    border-bottom: 1px solid #1e293b !important;\n";
        echo "    color: #e2e8f0 !important;\n";
        echo "  }\n";
        echo "  table tbody tr:nth-child(even), table tbody tr:nth-child(even) td,\n";
        echo "  .vendedores-table tr:nth-child(even), .vendedores-table tr:nth-child(even) td,\n";
        echo "  .sales-history-table tr:nth-child(even), .sales-history-table tr:nth-child(even) td,\n";
        echo "  .inventory-table tr:nth-child(even), .inventory-table tr:nth-child(even) td,\n";
        echo "  .clients-table tr:nth-child(even), .clients-table tr:nth-child(even) td,\n";
        echo "  .cart-table tr:nth-child(even), .cart-table tr:nth-child(even) td,\n";
        echo "  .preview-table tr:nth-child(even), .preview-table tr:nth-child(even) td {\n";
        echo "    background-color: #101728 !important;\n";
        echo "  }\n";
        echo "  table tbody tr:nth-child(odd), table tbody tr:nth-child(odd) td,\n";
        echo "  .vendedores-table tr:nth-child(odd), .vendedores-table tr:nth-child(odd) td,\n";
        echo "  .sales-history-table tr:nth-child(odd), .sales-history-table tr:nth-child(odd) td,\n";
        echo "  .inventory-table tr:nth-child(odd), .inventory-table tr:nth-child(odd) td,\n";
        echo "  .clients-table tr:nth-child(odd), .clients-table tr:nth-child(odd) td {\n";
        echo "    background-color: #141d30 !important;\n";
        echo "  }\n";
        echo "  table tbody tr:hover, table tbody tr:hover td,\n";
        echo "  .vendedores-table tr:hover, .vendedores-table tr:hover td,\n";
        echo "  .sales-history-table tr:hover, .sales-history-table tr:hover td,\n";
        echo "  .inventory-table tr:hover, .inventory-table tr:hover td,\n";
        echo "  .clients-table tr:hover, .clients-table tr:hover td {\n";
        echo "    background-color: #1c273e !important;\n";
        echo "  }\n";
        echo "  .client-name-cell, .vendedor-name-cell, .product-cell-info strong {\n";
        echo "    color: #f8fafc !important;\n";
        echo "  }\n";
        echo "  .client-doc-cell, .table-subtext, .product-cell-info span {\n";
        echo "    color: #94a3b8 !important;\n";
        echo "  }\n";
        echo "  .product-cell-img {\n";
        echo "    border-color: #283950 !important;\n";
        echo "  }\n";
        
        // 7. Botones de Acción y Generales
        echo "  .action-btn-circle, .btn-action, .qty-btn, .btn-add-client-new, .action-icon-btn {\n";
        echo "    background: #0e1626 !important;\n";
        echo "    border: 1px solid #283950 !important;\n";
        echo "    color: #cbd5e1 !important;\n";
        echo "  }\n";
        echo "  .action-btn-circle:hover, .btn-action:hover, .qty-btn:hover, .btn-add-client-new:hover, .action-icon-btn:hover {\n";
        echo "    border-color: #38bdf8 !important;\n";
        echo "    color: #38bdf8 !important;\n";
        echo "    background: #141d30 !important;\n";
        echo "  }\n";
        echo "  .action-btn-circle.delete, .btn-action.delete, .action-icon-btn.delete-new {\n";
        echo "    background: rgba(239, 68, 68, 0.12) !important;\n";
        echo "    border: 1px solid rgba(239, 68, 68, 0.25) !important;\n";
        echo "    color: #f87171 !important;\n";
        echo "  }\n";
        echo "  .action-btn-circle.delete:hover, .btn-action.delete:hover, .action-icon-btn.delete-new:hover {\n";
        echo "    background: rgba(239, 68, 68, 0.25) !important;\n";
        echo "    border-color: #ef4444 !important;\n";
        echo "    color: #fca5a5 !important;\n";
        echo "  }\n";
        echo "  .btn-config-reset, .btn-secondary, .btn-cancel, .btn-clear-filters, .btn-clear-sales-filters, .btn-export, .btn-modal-cancel {\n";
        echo "    background-color: #0e1626 !important;\n";
        echo "    border: 1px solid #283950 !important;\n";
        echo "    color: #cbd5e1 !important;\n";
        echo "  }\n";
        echo "  .btn-config-reset:hover, .btn-secondary:hover, .btn-clear-filters:hover, .btn-clear-sales-filters:hover, .btn-export:hover, .btn-modal-cancel:hover {\n";
        echo "    background-color: #1a2538 !important;\n";
        echo "    border-color: #475569 !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .btn-invoice-action {\n";
        echo "    background-color: #0e1626 !important;\n";
        echo "    border: 1px solid #283950 !important;\n";
        echo "    color: #c084fc !important;\n";
        echo "  }\n";
        echo "  .btn-invoice-action:hover {\n";
        echo "    background-color: rgba(168, 85, 247, 0.2) !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "    border-color: #a855f7 !important;\n";
        echo "  }\n";
        
        // 8. Totales y Carrito de Ventas
        echo "  .totals-breakdown {\n";
        echo "    background-color: #0e1626 !important;\n";
        echo "    border: 1px solid #283950 !important;\n";
        echo "    border-radius: 12px !important;\n";
        echo "    padding: 16px !important;\n";
        echo "  }\n";
        echo "  .totals-breakdown-row span {\n";
        echo "    color: #cbd5e1 !important;\n";
        echo "  }\n";
        echo "  .totals-breakdown-row.total-grand {\n";
        echo "    border-top: 1px dashed #283950 !important;\n";
        echo "  }\n";
        echo "  .totals-breakdown-row.total-grand span {\n";
        echo "    color: #f8fafc !important;\n";
        echo "    font-weight: 800 !important;\n";
        echo "  }\n";
        echo "  .qty-val {\n";
        echo "    color: #f8fafc !important;\n";
        echo "  }\n";
        echo "  .empty-cart-state strong {\n";
        echo "    color: #f8fafc !important;\n";
        echo "  }\n";
        echo "  .empty-cart-state p {\n";
        echo "    color: #94a3b8 !important;\n";
        echo "  }\n";
        echo "  .empty-cart-state .basket-icon {\n";
        echo "    color: #34d399 !important;\n";
        echo "  }\n";
        
        // 9. Paginaciones (Todos los estilos de paginación)
        echo "  .pagination-btn, .pagination-container-new .pagination-btn-item {\n";
        echo "    background-color: #0e1626 !important;\n";
        echo "    border: 1px solid #283950 !important;\n";
        echo "    color: #cbd5e1 !important;\n";
        echo "  }\n";
        echo "  .pagination-btn:hover:not(.active):not(.disabled), .pagination-container-new .pagination-btn-item:hover:not(.active):not(.disabled) {\n";
        echo "    background-color: #1a2538 !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .pagination-btn.active, .pagination-container-new .pagination-btn-item.active {\n";
        echo "    background-color: var(--sidebar-active-bg, #2563eb) !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "    border-color: transparent !important;\n";
        echo "  }\n";
        echo "  .pagination-btn.disabled, .pagination-container-new .pagination-btn-item.disabled {\n";
        echo "    background-color: #0b0f19 !important;\n";
        echo "    border-color: #1e293b !important;\n";
        echo "    color: #475569 !important;\n";
        echo "  }\n";
        
        // 10. Badges de Estado y Avatares
        echo "  .status-badge, .status-badge.activo, .badge-success, .stock-badge.in-stock {\n";
        echo "    background-color: rgba(16, 185, 129, 0.15) !important;\n";
        echo "    color: #34d399 !important;\n";
        echo "    border: 1px solid rgba(16, 185, 129, 0.3) !important;\n";
        echo "  }\n";
        echo "  .status-badge.inactivo, .badge-danger, .stock-badge.out-of-stock {\n";
        echo "    background-color: rgba(239, 68, 68, 0.15) !important;\n";
        echo "    color: #f87171 !important;\n";
        echo "    border: 1px solid rgba(239, 68, 68, 0.3) !important;\n";
        echo "  }\n";
        echo "  .stock-badge.low-stock {\n";
        echo "    background-color: rgba(245, 158, 11, 0.15) !important;\n";
        echo "    color: #fbbf24 !important;\n";
        echo "    border: 1px solid rgba(245, 158, 11, 0.3) !important;\n";
        echo "  }\n";
        echo "  .avatar-circle, .vendedor-avatar-circle {\n";
        echo "    background-color: rgba(56, 189, 248, 0.15) !important;\n";
        echo "    color: #38bdf8 !important;\n";
        echo "    border: 1px solid rgba(56, 189, 248, 0.25) !important;\n";
        echo "  }\n";
        echo "  .vendedor-avatar-mini {\n";
        echo "    background-color: rgba(56, 189, 248, 0.15) !important;\n";
        echo "    color: #38bdf8 !important;\n";
        echo "    border: 1px solid rgba(56, 189, 248, 0.25) !important;\n";
        echo "  }\n";
        echo "  .vendedor-avatar-mini.circle-green { background-color: rgba(16, 185, 129, 0.15) !important; color: #34d399 !important; border-color: rgba(16, 185, 129, 0.3) !important; }\n";
        echo "  .vendedor-avatar-mini.circle-blue { background-color: rgba(59, 130, 246, 0.15) !important; color: #60a5fa !important; border-color: rgba(59, 130, 246, 0.3) !important; }\n";
        echo "  .vendedor-avatar-mini.circle-orange { background-color: rgba(249, 115, 22, 0.15) !important; color: #fb923c !important; border-color: rgba(249, 115, 22, 0.3) !important; }\n";
        echo "  .vendedor-avatar-mini.circle-pink { background-color: rgba(236, 72, 153, 0.15) !important; color: #f472b6 !important; border-color: rgba(236, 72, 153, 0.3) !important; }\n";
        echo "  .vendedor-avatar-mini.circle-teal { background-color: rgba(13, 148, 136, 0.15) !important; color: #2dd4bf !important; border-color: rgba(13, 148, 136, 0.3) !important; }\n";
        echo "  .vendedor-avatar-mini.circle-purple { background-color: rgba(168, 85, 247, 0.15) !important; color: #c084fc !important; border-color: rgba(168, 85, 247, 0.3) !important; }\n";
        echo "  .tag-pill, .tab-pill {\n";
        echo "    background-color: #0e1626 !important;\n";
        echo "    border: 1px solid #283950 !important;\n";
        echo "    color: #cbd5e1 !important;\n";
        echo "  }\n";
        echo "  .tab-pill.active {\n";
        echo "    background-color: var(--sidebar-active-bg, #2563eb) !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "    border-color: transparent !important;\n";
        echo "  }\n";
        
        // 11. Módulo de Configuración Específico
        echo "  .config-icon-circle {\n";
        echo "    background: rgba(56, 189, 248, 0.12) !important;\n";
        echo "    color: #38bdf8 !important;\n";
        echo "    border: 1px solid rgba(56, 189, 248, 0.25) !important;\n";
        echo "  }\n";
        echo "  .control-label {\n";
        echo "    color: #94a3b8 !important;\n";
        echo "  }\n";
        echo "  .font-option-btn {\n";
        echo "    background: #0e1626 !important;\n";
        echo "    border: 1px solid #283950 !important;\n";
        echo "    color: #cbd5e1 !important;\n";
        echo "  }\n";
        echo "  .font-option-btn:hover {\n";
        echo "    border-color: #38bdf8 !important;\n";
        echo "    color: #38bdf8 !important;\n";
        echo "    background: #141d30 !important;\n";
        echo "  }\n";
        echo "  .font-option-btn.selected {\n";
        echo "    background: rgba(56, 189, 248, 0.15) !important;\n";
        echo "    border-color: #38bdf8 !important;\n";
        echo "    color: #ffffff !important;\n";
        echo "    box-shadow: 0 0 12px rgba(56, 189, 248, 0.25) !important;\n";
        echo "  }\n";
        echo "  .font-size-range-input {\n";
        echo "    background: #283950 !important;\n";
        echo "  }\n";
        echo "  .font-size-range-input::-webkit-slider-thumb {\n";
        echo "    background: #38bdf8 !important;\n";
        echo "    box-shadow: 0 0 10px rgba(56, 189, 248, 0.5) !important;\n";
        echo "  }\n";
        echo "  .font-size-range-input::-moz-range-thumb {\n";
        echo "    background: #38bdf8 !important;\n";
        echo "    box-shadow: 0 0 10px rgba(56, 189, 248, 0.5) !important;\n";
        echo "  }\n";
        echo "  .slider-label-a {\n";
        echo "    color: #f8fafc !important;\n";
        echo "  }\n";
        echo "  #currentSizeText {\n";
        echo "    color: #38bdf8 !important;\n";
        echo "  }\n";
        echo "  .switch-toggle-wrapper .slider-round {\n";
        echo "    background-color: #283950 !important;\n";
        echo "  }\n";
        echo "  .switch-toggle-wrapper input:checked + .slider-round {\n";
        echo "    background-color: #10b981 !important;\n";
        echo "    box-shadow: 0 0 12px rgba(16, 185, 129, 0.4) !important;\n";
        echo "  }\n";
        echo "  .backup-option-box {\n";
        echo "    background-color: #0e1626 !important;\n";
        echo "    border: 1px dashed #283950 !important;\n";
        echo "  }\n";
        echo "  .backup-icon-wrapper i {\n";
        echo "    color: #38bdf8 !important;\n";
        echo "  }\n";
        echo "  .backup-text h4 {\n";
        echo "    color: #f8fafc !important;\n";
        echo "  }\n";
        echo "  .backup-text p {\n";
        echo "    color: #94a3b8 !important;\n";
        echo "  }\n";
        echo "  .btn-backup-download {\n";
        echo "    background-color: #141d30 !important;\n";
        echo "    border: 1px solid #283950 !important;\n";
        echo "    color: #f8fafc !important;\n";
        echo "  }\n";
        echo "  .btn-backup-download:hover {\n";
        echo "    border-color: #38bdf8 !important;\n";
        echo "    color: #38bdf8 !important;\n";
        echo "  }\n";
        
        // 12. Modales y Ventanas Emergentes
        echo "  .modal {\n";
        echo "    background-color: rgba(0, 0, 0, 0.75) !important;\n";
        echo "    backdrop-filter: blur(4px) !important;\n";
        echo "  }\n";
        echo "  .modal-content {\n";
        echo "    background-color: #141d30 !important;\n";
        echo "    border: 1px solid #283950 !important;\n";
        echo "    color: #f8fafc !important;\n";
        echo "    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7) !important;\n";
        echo "  }\n";
        echo "  .modal-header {\n";
        echo "    background-color: #101726 !important;\n";
        echo "    border-bottom: 1px solid #233044 !important;\n";
        echo "  }\n";
        echo "  .modal-header h2, .modal-header h3 {\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .modal-close-btn {\n";
        echo "    color: #94a3b8 !important;\n";
        echo "  }\n";
        echo "  .modal-close-btn:hover {\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .modal-footer {\n";
        echo "    background-color: #101726 !important;\n";
        echo "    border-top: 1px solid #233044 !important;\n";
        echo "  }\n";
        echo "  .swal2-popup {\n";
        echo "    background-color: #141d30 !important;\n";
        echo "    border: 1px solid #283950 !important;\n";
        echo "    color: #f8fafc !important;\n";
        echo "  }\n";
        echo "  .swal2-title {\n";
        echo "    color: #ffffff !important;\n";
        echo "  }\n";
        echo "  .swal2-html-container {\n";
        echo "    color: #94a3b8 !important;\n";
        echo "  }\n";
        
        // 13. Círculos de Iconos de Estadísticas (Colores vibrantes en fondo translúcido)
        echo "  .stat-icon-circle.circle-green, .stat-box-icon-circle.circle-green {\n";
        echo "    background-color: rgba(16, 185, 129, 0.15) !important;\n";
        echo "    color: #34d399 !important;\n";
        echo "  }\n";
        echo "  .stat-icon-circle.circle-blue, .stat-box-icon-circle.circle-blue {\n";
        echo "    background-color: rgba(59, 130, 246, 0.15) !important;\n";
        echo "    color: #60a5fa !important;\n";
        echo "  }\n";
        echo "  .stat-icon-circle.circle-teal, .stat-box-icon-circle.circle-teal {\n";
        echo "    background-color: rgba(13, 148, 136, 0.15) !important;\n";
        echo "    color: #2dd4bf !important;\n";
        echo "  }\n";
        echo "  .stat-icon-circle.circle-red, .stat-box-icon-circle.circle-red {\n";
        echo "    background-color: rgba(239, 68, 68, 0.15) !important;\n";
        echo "    color: #f87171 !important;\n";
        echo "  }\n";
        echo "  .stat-icon-circle.circle-orange, .stat-box-icon-circle.circle-orange {\n";
        echo "    background-color: rgba(249, 115, 22, 0.15) !important;\n";
        echo "    color: #fb923c !important;\n";
        echo "  }\n";
        echo "  .stat-icon-circle.circle-purple, .stat-box-icon-circle.circle-purple {\n";
        echo "    background-color: rgba(168, 85, 247, 0.15) !important;\n";
        echo "    color: #c084fc !important;\n";
        echo "  }\n";
        
        // 14. Botón de menú móvil
        echo "  .mobile-toggle-btn {\n";
        echo "    background-color: #141d30 !important;\n";
        echo "    border: 1px solid #283950 !important;\n";
        echo "    color: #f8fafc !important;\n";
        echo "  }\n";
    }

    // Estilo global para el indicador de módulo activo (de 'v' a '>')
    echo "  .sidebar-link-card .link-chevron, .sidebar-link-card .link-arrow, .nav-item .link-chevron { display: inline-flex; align-items: center; justify-content: center; font-size: 13px; }\n";
    echo "  .sidebar-link-card .link-chevron i, .sidebar-link-card .link-arrow i, .nav-item .link-chevron i { transition: transform 0.25s ease, color 0.25s ease; }\n";
    echo "</style>\n";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        if (sidebar) {
            document.addEventListener('click', function(e) {
                if (sidebar.classList.contains('open')) {
                    const mobileBtn = document.getElementById('mobileMenu');
                    if (!sidebar.contains(e.target) && (!mobileBtn || !mobileBtn.contains(e.target))) {
                        sidebar.classList.remove('open');
                    }
                }
            });
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && sidebar.classList.contains('open')) {
                    sidebar.classList.remove('open');
                }
            });
        }
    });
    </script>\n";
}
?>
