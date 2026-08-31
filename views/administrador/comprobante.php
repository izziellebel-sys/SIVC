<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || ($_SESSION['rol'] !== 'Administrador' && $_SESSION['rol'] !== 'Vendedor')) {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/database.php';

$id_venta = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$auto_download = isset($_GET['auto']) && $_GET['auto'] == '1';

if ($id_venta <= 0) {
    die("ID de venta inválido.");
}

// Cargar configuración de la empresa
$empresaConfig = [
    'nombre' => 'DOÑA MARINA',
    'nit' => '123456789-1',
    'telefono' => '3001234567',
    'correo' => 'info@donamarina.com',
    'direccion' => 'Calle 10 # 5-20, Barrio Central'
];
$empresaConfigFile = __DIR__ . '/../../configuration/empresa_config.json';
if (file_exists($empresaConfigFile)) {
    $loadedEmpresa = json_decode(file_get_contents($empresaConfigFile), true);
    if (is_array($loadedEmpresa)) {
        $empresaConfig = array_merge($empresaConfig, $loadedEmpresa);
    }
}

// 1. Obtener datos de la venta y del cliente
$queryVenta = "SELECT v.*, u.nombre as cliente_nombre, u.apellido as cliente_apellido, c.numero_Documento, c.telefono 
               FROM venta v 
               LEFT JOIN cliente c ON v.id_Cliente = c.id_Cliente 
               LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento 
               WHERE v.id_Venta = ?";
$stmtV = $conn->prepare($queryVenta);
$venta = null;
if ($stmtV) {
    $stmtV->bind_param("i", $id_venta);
    $stmtV->execute();
    $venta = $stmtV->get_result()->fetch_assoc();
    $stmtV->close();
}

if (!$venta) {
    die("La venta especificada no existe.");
}

// 2. Obtener productos de la venta
$queryDetalles = "SELECT d.*, p.nombre as producto_nombre, p.codigo_Producto 
                  FROM detalle_venta d 
                  LEFT JOIN producto p ON d.id_Producto = p.id_Producto 
                  WHERE d.id_Venta = ?";
$stmtD = $conn->prepare($queryDetalles);
$detalles = [];
if ($stmtD) {
    $stmtD->bind_param("i", $id_venta);
    $stmtD->execute();
    $resD = $stmtD->get_result();
    while ($row = $resD->fetch_assoc()) {
        $detalles[] = $row;
    }
    $stmtD->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobante de Venta #<?= str_pad($id_venta, 5, '0', STR_PAD_LEFT); ?> | SIVC</title>
    
    <!-- Fuentes e Iconos -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Librería html2pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #f1f5f9;
            color: #1e293b;
            margin: 0;
            padding: 24px 16px;
            font-size: 13px;
        }

        /* Barra de Acciones Superior */
        .print-btn-bar {
            max-width: 620px;
            margin: 0 auto 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
            padding: 12px 18px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
        }

        .bar-title {
            font-size: 13px;
            font-weight: 700;
            color: #475569;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .bar-actions {
            display: flex;
            gap: 10px;
        }

        .btn-action-pdf {
            background-color: #014235;
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            font-size: 12.5px;
            font-weight: 700;
            border-radius: 8px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-action-pdf:hover {
            background-color: #002b22;
            transform: translateY(-1px);
        }

        .btn-action-print {
            background-color: #6f2dbd;
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            font-size: 12.5px;
            font-weight: 700;
            border-radius: 8px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-action-print:hover {
            background-color: #581c87;
            transform: translateY(-1px);
        }

        .btn-action-close {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid #cbd5e1;
            padding: 8px 12px;
            font-size: 12.5px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-action-close:hover {
            background-color: #e2e8f0;
            color: #0f172a;
        }

        /* Contenedor del Comprobante */
        .receipt-container {
            max-width: 620px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            padding: 36px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        }

        .header {
            text-align: center;
            border-bottom: 2px dashed #cbd5e1;
            padding-bottom: 20px;
            margin-bottom: 22px;
        }

        .header h1 {
            margin: 0 0 4px;
            font-size: 22px;
            font-weight: 800;
            color: #014235;
            letter-spacing: -0.5px;
        }

        .header p {
            margin: 3px 0;
            color: #64748b;
            font-size: 12px;
            font-weight: 500;
        }

        .info-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 22px;
            line-height: 1.6;
            gap: 20px;
        }

        .info-section div {
            flex: 1;
        }

        .title-accent {
            font-weight: 800;
            color: #6f2dbd;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.6px;
            margin-bottom: 6px;
            display: block;
        }

        .info-item-row {
            font-size: 12px;
            color: #334155;
            margin-bottom: 2px;
        }

        .info-item-row strong {
            color: #0f172a;
        }

        /* Tabla de Productos */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        th {
            background-color: #f8fafc;
            border-top: 1.5px solid #e2e8f0;
            border-bottom: 1.5px solid #0f172a;
            padding: 9px 8px;
            text-align: left;
            font-weight: 700;
            font-size: 11px;
            color: #0f172a;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 10px 8px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 12.5px;
            color: #334155;
        }

        .text-right {
            text-align: right;
        }

        .totals-section {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-top: 15px;
            border-top: 2px dashed #cbd5e1;
            padding-top: 14px;
        }

        .totals-row {
            display: flex;
            justify-content: space-between;
            width: 250px;
            margin-bottom: 6px;
            font-size: 12.5px;
            color: #475569;
        }

        .totals-row strong {
            color: #0f172a;
        }

        .totals-row.grand-total {
            font-size: 16px;
            font-weight: 800;
            color: #014235;
            border-top: 1.5px solid #0f172a;
            padding-top: 8px;
            margin-top: 6px;
        }

        .totals-row.grand-total strong {
            color: #014235;
        }

        .footer {
            text-align: center;
            margin-top: 35px;
            padding-top: 15px;
            border-top: 1px solid #f1f5f9;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.5;
        }

        @media print {
            .print-btn-bar {
                display: none !important;
            }

            body {
                background: #ffffff;
                padding: 0;
            }

            .receipt-container {
                border: none;
                box-shadow: none;
                padding: 0;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Barra Superior de Acciones -->
    <div class="print-btn-bar">
        <div class="bar-title">
            <i class="fa-solid fa-receipt" style="color: #014235;"></i> Comprobante #SIVC-<?= str_pad($id_venta, 5, '0', STR_PAD_LEFT); ?>
        </div>
        <div class="bar-actions">
            <button type="button" onclick="descargarPDF()" class="btn-action-pdf" id="btnDownloadPDF">
                <i class="fa-solid fa-download"></i> Descargar PDF
            </button>
            <button type="button" onclick="window.print()" class="btn-action-print">
                <i class="fa-solid fa-print"></i> Imprimir
            </button>
            <button type="button" onclick="window.close()" class="btn-action-close">
                <i class="fa-solid fa-xmark"></i> Cerrar
            </button>
        </div>
    </div>

    <!-- Contenido del Comprobante -->
    <div class="receipt-container" id="receiptContainer">
        <div class="header">
            <h1><?= htmlspecialchars(strtoupper($empresaConfig['nombre'])); ?></h1>
            <p>NIT: <?= htmlspecialchars($empresaConfig['nit']); ?></p>
            <p><?= htmlspecialchars($empresaConfig['direccion']); ?></p>
            <p>Tel: <?= htmlspecialchars($empresaConfig['telefono']); ?> | <?= htmlspecialchars($empresaConfig['correo']); ?></p>
        </div>

        <div class="info-section">
            <div>
                <span class="title-accent">Datos de Venta</span>
                <div class="info-item-row"><strong>N° Factura:</strong> #SIVC-<?= str_pad($venta['id_Venta'], 5, '0', STR_PAD_LEFT); ?></div>
                <div class="info-item-row"><strong>Fecha y Hora:</strong> <?= htmlspecialchars($venta['fecha_Venta']); ?></div>
                <div class="info-item-row"><strong>Método Pago:</strong> <?= htmlspecialchars($venta['metodo_Pago']); ?></div>
                <div class="info-item-row"><strong>Estado:</strong> <?= htmlspecialchars($venta['estado']); ?></div>
            </div>
            <div style="text-align: right;">
                <span class="title-accent">Cliente</span>
                <div class="info-item-row"><strong>Nombre:</strong> <?= htmlspecialchars(($venta['cliente_nombre'] ?? 'Cliente') . ' ' . ($venta['cliente_apellido'] ?? 'General')); ?></div>
                <?php if (!empty($venta['numero_Documento'])): ?>
                    <div class="info-item-row"><strong>Documento:</strong> <?= htmlspecialchars($venta['numero_Documento']); ?></div>
                <?php endif; ?>
                <?php if (!empty($venta['telefono'])): ?>
                    <div class="info-item-row"><strong>Teléfono:</strong> <?= htmlspecialchars($venta['telefono']); ?></div>
                <?php endif; ?>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th class="text-right" style="width: 70px;">Cant.</th>
                    <th class="text-right" style="width: 100px;">P. Unit</th>
                    <th class="text-right" style="width: 110px;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalles as $det): ?>
                    <tr>
                        <td>
                            <strong><?= htmlspecialchars($det['producto_nombre']); ?></strong><br>
                            <span style="font-size: 10.5px; color: #64748b;">SKU: <?= htmlspecialchars($det['codigo_Producto']); ?></span>
                        </td>
                        <td class="text-right"><?= $det['cantidad']; ?></td>
                        <td class="text-right">$<?= number_format($det['precio_Unitario'], 0, ',', '.'); ?></td>
                        <td class="text-right"><strong>$<?= number_format($det['subtotal'], 0, ',', '.'); ?></strong></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="totals-section">
            <div class="totals-row">
                <span>Subtotal:</span>
                <strong>$<?= number_format($venta['subtotal'], 0, ',', '.'); ?></strong>
            </div>
            <div class="totals-row">
                <span>Descuento:</span>
                <strong>$0</strong>
            </div>
            <div class="totals-row">
                <span>IVA (19%):</span>
                <strong>$<?= number_format($venta['total'] - $venta['subtotal'], 0, ',', '.'); ?></strong>
            </div>
            <div class="totals-row grand-total">
                <span>Total a Pagar:</span>
                <strong>$<?= number_format($venta['total'], 0, ',', '.'); ?></strong>
            </div>
        </div>

        <div class="footer">
            <p>¡Gracias por su compra!</p>
            <p>SIVC - Sistema de Información de Ventas y Comercio</p>
        </div>
    </div>

    <!-- Lógica de Generación de PDF -->
    <script>
        function descargarPDF() {
            const element = document.getElementById('receiptContainer');
            const btn = document.getElementById('btnDownloadPDF');
            if (btn) btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Generando...';

            const opt = {
                margin:       [10, 10, 10, 10],
                filename:     'comprobante_SIVC_<?= str_pad($id_venta, 5, '0', STR_PAD_LEFT); ?>.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { 
                    scale: 2, 
                    useCORS: true, 
                    letterRendering: true,
                    scrollY: 0
                },
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            return html2pdf().set(opt).from(element).save().then(() => {
                if (btn) btn.innerHTML = '<i class="fa-solid fa-check"></i> Descargado';
                setTimeout(() => {
                    if (btn) btn.innerHTML = '<i class="fa-solid fa-download"></i> Descargar PDF';
                }, 3000);

                if (window.parent && window.parent !== window) {
                    window.parent.postMessage('pdf_downloaded', '*');
                }
            }).catch(err => {
                console.error('Error al generar PDF:', err);
                if (btn) btn.innerHTML = '<i class="fa-solid fa-download"></i> Reintentar PDF';
            });
        }

        <?php if ($auto_download): ?>
        window.addEventListener('load', () => {
            setTimeout(() => {
                descargarPDF();
            }, 300);
        });
        <?php endif; ?>
    </script>

</body>

</html>
