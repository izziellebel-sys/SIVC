<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || ($_SESSION['rol'] !== 'Administrador' && $_SESSION['rol'] !== 'Vendedor')) {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/database.php';

$id_venta = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id_venta <= 0) {
    die("ID de venta inválido.");
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
    <title>Comprobante de Venta #<?= $id_venta; ?> | SIVC</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    <!-- Library for client-side PDF generation and download -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: #ffffff;
            color: #333;
            margin: 0;
            padding: 30px;
            font-size: 13px;
        }

        .receipt-container {
            max-width: 600px;
            margin: 0 auto;
            border: 2px dashed #dcdcdc;
            padding: 30px;
            border-radius: 8px;
        }

        .header {
            text-align: center;
            border-bottom: 2px dashed #333;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0 0 5px;
            font-size: 24px;
            font-weight: 800;
            color: #6f2dbd;
        }

        .header p {
            margin: 4px 0;
            color: #666;
        }

        .info-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .info-section div {
            flex: 1;
        }

        .title-accent {
            font-weight: 700;
            color: #6f2dbd;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        th {
            border-bottom: 2px solid #333;
            padding: 8px;
            text-align: left;
            font-weight: 700;
            font-size: 11px;
            text-transform: uppercase;
        }

        td {
            padding: 10px 8px;
            border-bottom: 1px dashed #dcdcdc;
        }

        .text-right {
            text-align: right;
        }

        .totals-section {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-top: 20px;
            border-top: 2px dashed #333;
            padding-top: 15px;
        }

        .totals-row {
            display: flex;
            justify-content: space-between;
            width: 250px;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .totals-row.grand-total {
            font-size: 18px;
            font-weight: 800;
            color: #6f2dbd;
            border-top: 1px solid #333;
            padding-top: 6px;
            margin-top: 4px;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            color: #888;
            font-size: 11px;
        }

        .print-btn-bar {
            text-align: center;
            margin-bottom: 30px;
        }

        .print-btn {
            background-color: #6f2dbd;
            color: #fff;
            border: none;
            padding: 10px 24px;
            font-size: 14px;
            font-weight: 700;
            border-radius: 20px;
            cursor: pointer;
            transition: 0.2s;
        }

        .print-btn:hover {
            background-color: #531e90;
            transform: scale(1.05);
        }

        @media print {
            .print-btn-bar {
                display: none;
            }

            body {
                padding: 0;
            }

            .receipt-container {
                border: none;
                padding: 0;
            }
        }
    </style>
</head>

<body>

    <div class="print-btn-bar">
        <button onclick="window.print();" class="print-btn">Imprimir Comprobante</button>
    </div>

    <div class="receipt-container">
        <div class="header">
            <h1>DOÑA MARINA</h1>
            <p>TIENDA DE BARRIO</p>
            <p>NIT: 123456789-1</p>
            <p>Calle 10 # 5-20, Barrio Central</p>
            <p>Teléfono: 3001234567</p>
        </div>

        <div class="info-section">
            <div>
                <span class="title-accent">Datos de Venta</span>
                <strong>Comprobante #:</strong> SIVC-<?= str_pad($venta['id_Venta'], 5, '0', STR_PAD_LEFT); ?><br>
                <strong>Fecha:</strong> <?= htmlspecialchars($venta['fecha_Venta']); ?><br>
                <strong>Método Pago:</strong> <?= htmlspecialchars($venta['metodo_Pago']); ?><br>
                <strong>Estado:</strong> <?= htmlspecialchars($venta['estado']); ?>
            </div>
            <div style="text-align: right;">
                <span class="title-accent">Cliente</span>
                <strong>Nombre:</strong> <?= htmlspecialchars(($venta['cliente_nombre'] ?? 'General') . ' ' . ($venta['cliente_apellido'] ?? '')); ?><br>
                <?php if (!empty($venta['numero_Documento'])): ?>
                    <strong>C.C. / D.N.I.:</strong> <?= htmlspecialchars($venta['numero_Documento']); ?><br>
                <?php endif; ?>
                <?php if (!empty($venta['telefono'])): ?>
                    <strong>Teléfono:</strong> <?= htmlspecialchars($venta['telefono']); ?><br>
                <?php endif; ?>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Detalle Producto</th>
                    <th class="text-right">Cant.</th>
                    <th class="text-right">Precio Unit.</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalles as $det): ?>
                    <tr>
                        <td>
                            <strong><?= htmlspecialchars($det['producto_nombre']); ?></strong><br>
                            <span style="font-size: 10px; color: #666;">Cód: <?= htmlspecialchars($det['codigo_Producto']); ?></span>
                        </td>
                        <td class="text-right"><?= $det['cantidad']; ?></td>
                        <td class="text-right">$<?= number_format($det['precio_Unitario'], 0, ',', '.'); ?></td>
                        <td class="text-right">$<?= number_format($det['subtotal'], 0, ',', '.'); ?></td>
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
            <p>SIVC - Sistema de Información de Ventas y Crédito</p>
        </div>
    </div>

    <!-- Auto trigger PDF download on load -->
    <script>
        window.addEventListener('load', () => {
            const element = document.querySelector('.receipt-container');
            const options = {
                margin:       10,
                filename:     'comprobante_SIVC_<?= $id_venta; ?>.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2, useCORS: true },
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };
            
            // Generar y descargar el PDF usando html2pdf.js
            html2pdf().set(options).from(element).save().then(() => {
                // Notificar a la ventana padre si está en un iframe
                if (window.parent && window.parent !== window) {
                    window.parent.postMessage('pdf_downloaded', '*');
                } else {
                    // Si se abrió directamente en una pestaña nueva, cerrarla tras descargar
                    setTimeout(() => {
                        window.close();
                    }, 1000);
                }
            }).catch(err => {
                console.error('Error al generar PDF:', err);
                // Asegurar redirección en caso de error
                if (window.parent && window.parent !== window) {
                    window.parent.postMessage('pdf_downloaded', '*');
                }
            });
        });
    </script>

</body>

</html>
