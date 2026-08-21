<?php
session_start();

// Protección básica de acceso
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/database.php';

$id_Venta = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id_Venta <= 0) {
    die("ID de venta inválido.");
}

// Obtener datos de la venta y del cliente para validar pertenencia
$query = "SELECT v.fecha_Venta, v.subtotal, v.descuento, v.total, v.metodo_Pago, v.estado, 
                 c.nombre AS cliente_nombre, c.apellido AS cliente_apellido, c.numero_Documento, c.telefono,
                 u.numero_Documento AS user_documento, u.id_Rol
          FROM venta v 
          JOIN cliente c ON v.id_Cliente = c.id_Cliente 
          LEFT JOIN usuarios u ON u.id_Usuario = ?
          WHERE v.id_Venta = ?";
$stmt = $conn->prepare($query);
$id_Usuario = $_SESSION['id_Usuario'];
$stmt->bind_param("ii", $id_Usuario, $id_Venta);
$stmt->execute();
$res = $stmt->get_result();
$venta = $res->fetch_assoc();
$stmt->close();

if (!$venta) {
    die("Comprobante no encontrado.");
}

// Validar que el cliente tenga permiso de ver este comprobante:
// Debe ser el propio cliente (su numero_Documento en usuarios coincide con el del cliente) o ser Admin/Vendedor (id_Rol 1 o 2).
if ($venta['id_Rol'] == '3' && $venta['user_documento'] !== $venta['numero_Documento']) {
    die("Acceso denegado: No tiene permisos para visualizar este comprobante.");
}

// Obtener detalles de productos
$detalles = [];
$query = "SELECT d.cantidad, d.precio_Unitario, d.subtotal, p.nombre AS producto_nombre, p.codigo_Producto 
          FROM detalle_venta d 
          JOIN producto p ON d.id_Producto = p.id_Producto 
          WHERE d.id_Venta = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_Venta);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) {
    $detalles[] = $row;
}
$stmt->close();

// Obtener datos del comprobante (número y fecha de generación si existe)
$query = "SELECT numero_Comprobante, fecha_Generacion FROM comprobante_venta WHERE id_Venta = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_Venta);
$stmt->execute();
$res = $stmt->get_result();
$comprobante = $res->fetch_assoc();
$stmt->close();

$nroComprobante = $comprobante['numero_Comprobante'] ?? sprintf("FAC-%06d", $id_Venta);
$fechaEmision = $comprobante['fecha_Generacion'] ?? $venta['fecha_Venta'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobante <?= htmlspecialchars($nroComprobante); ?> | SIVC</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .comprobante-card {
            background-color: #fff;
            max-width: 600px;
            margin: 0 auto;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 40px;
            box-sizing: border-box;
            border: 1px solid #eee;
        }

        .header {
            text-align: center;
            border-bottom: 2px dashed #eee;
            padding-bottom: 25px;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            color: #6f2dbd;
            font-size: 28px;
            font-weight: 700;
        }

        .header p {
            margin: 5px 0 0;
            color: #777;
            font-size: 14px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .info-block strong {
            display: block;
            color: #555;
            margin-bottom: 3px;
        }

        .info-block span {
            color: #222;
        }

        .table-title {
            font-size: 16px;
            font-weight: 600;
            color: #6f2dbd;
            margin-bottom: 12px;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            font-size: 14px;
        }

        th {
            background-color: #f9f9f9;
            text-align: left;
            padding: 10px;
            color: #555;
            font-weight: 600;
        }

        td {
            padding: 12px 10px;
            border-bottom: 1px solid #eee;
        }

        .text-right {
            text-align: right;
        }

        .totals-section {
            width: 50%;
            margin-left: auto;
            font-size: 14px;
        }

        .totals-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            color: #555;
        }

        .totals-row.grand-total {
            border-top: 2px solid #6f2dbd;
            font-weight: 700;
            font-size: 18px;
            color: #6f2dbd;
            padding-top: 12px;
            margin-top: 5px;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #999;
            border-top: 1px dashed #eee;
            padding-top: 20px;
        }

        .actions-bar {
            max-width: 600px;
            margin: 20px auto 0;
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border-radius: 30px;
            border: none;
            font-family: inherit;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-primary {
            background: linear-gradient(90deg, #b85ce8, #8f7cff);
            color: white;
        }

        .btn-primary:hover {
            box-shadow: 0 5px 15px rgba(184, 92, 232, 0.4);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #e0e0e0;
            color: #333;
        }

        .btn-secondary:hover {
            background-color: #d5d5d5;
            transform: translateY(-2px);
        }

        @media print {
            body {
                background-color: white;
                padding: 0;
            }

            .comprobante-card {
                box-shadow: none;
                border: none;
                padding: 0;
                max-width: 100%;
            }

            .actions-bar {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="comprobante-card">
        <div class="header">
            <h1>SIVC</h1>
            <p>Sistema Integral de Ventas y Control</p>
            <p>Comprobante Oficial de Compra</p>
        </div>

        <div class="info-grid">
            <div class="info-block">
                <strong>Nro. Comprobante</strong>
                <span><?= htmlspecialchars($nroComprobante); ?></span>
            </div>
            <div class="info-block">
                <strong>Fecha de Emisión</strong>
                <span><?= date('d/m/Y h:i A', strtotime($fechaEmision)); ?></span>
            </div>
            <div class="info-block" style="grid-column: span 2;">
                <strong>Cliente</strong>
                <span><?= htmlspecialchars($venta['cliente_nombre'] . ' ' . $venta['cliente_apellido']); ?> (Doc: <?= htmlspecialchars($venta['numero_Documento']); ?>)</span>
            </div>
            <div class="info-block">
                <strong>Método de Pago</strong>
                <span><?= htmlspecialchars($venta['metodo_Pago']); ?></span>
            </div>
            <div class="info-block">
                <strong>Estado de Transacción</strong>
                <span><?= htmlspecialchars($venta['estado']); ?></span>
            </div>
        </div>

        <div class="table-title">Detalle de Compra</div>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th class="text-right" style="width: 80px;">Cant.</th>
                    <th class="text-right" style="width: 100px;">P. Unit</th>
                    <th class="text-right" style="width: 120px;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalles as $det): ?>
                    <tr>
                        <td>
                            <strong><?= htmlspecialchars($det['producto_nombre']); ?></strong><br>
                            <small style="color: #777;">Cód: <?= htmlspecialchars($det['codigo_Producto']); ?></small>
                        </td>
                        <td class="text-right"><?= htmlspecialchars($det['cantidad']); ?></td>
                        <td class="text-right">$<?= number_format($det['precio_Unitario'], 0, ',', '.'); ?></td>
                        <td class="text-right">$<?= number_format($det['subtotal'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="totals-section">
            <div class="totals-row">
                <span>Subtotal</span>
                <span>$<?= number_format($venta['subtotal'], 0, ',', '.'); ?></span>
            </div>
            <?php if ($venta['descuento'] > 0): ?>
                <div class="totals-row">
                    <span>Descuento</span>
                    <span>-$<?= number_format($venta['descuento'], 0, ',', '.'); ?></span>
                </div>
            <?php endif; ?>
            <div class="totals-row grand-total">
                <span>TOTAL</span>
                <span>$<?= number_format($venta['total'], 0, ',', '.'); ?></span>
            </div>
        </div>

        <div class="footer">
            <p>Gracias por tu preferencia y confianza.</p>
            <p>© <?= date('Y'); ?> SIVC - Todos los derechos reservados.</p>
        </div>
    </div>

    <div class="actions-bar">
        <button class="btn btn-secondary" onclick="window.close();">Cerrar Ventana</button>
        <button class="btn btn-primary" onclick="window.print();">Descargar / Imprimir</button>
    </div>

</body>

</html>
