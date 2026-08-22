<?php
session_start();

// Protección de acceso
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
    header("Location: ../login.php");
    exit();
}

require_once __DIR__ . '/../../configuration/load_config.php';

$mensaje = "";
$tipo_alerta = "";
$titulo_alerta = "";

// PROCESAR POST ACCIONES
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = trim($_POST['codigo_Producto'] ?? '');
    $nombre = trim($_POST['nombre'] ?? '');
    $id_proveedor = (int)($_POST['id_Proveedor'] ?? 0);
    $descripcion = trim($_POST['descripcion'] ?? '');
    $precio_compra = (float)($_POST['precio_Compra'] ?? 0);
    $precio_venta = (float)($_POST['precio_Venta'] ?? 0);
    $stock_actual = (int)($_POST['stock_Actual'] ?? 0);
    $stock_minimo = (int)($_POST['stock_Minimo'] ?? 0);
    $unidad_medida = trim($_POST['unidad_Medida'] ?? '');
    $estado = $_POST['estado'] ?? 'Activo';

    if ($codigo && $nombre && $id_proveedor > 0) {
        // Verificar duplicado de código
        $stmtCheck = $conn->prepare("SELECT id_Producto FROM producto WHERE codigo_Producto = ?");
        if ($stmtCheck) {
            $stmtCheck->bind_param("s", $codigo);
            $stmtCheck->execute();
            $resCheck = $stmtCheck->get_result();

            if ($resCheck->num_rows > 0) {
                $mensaje = "El código de producto ya está registrado en el sistema.";
                $tipo_alerta = "error";
                $titulo_alerta = "Duplicado";
            } else {
                // Subir imagen si existe
                $db_image_path = null;
                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
                    $tmpName = $_FILES['imagen']['tmp_name'];
                    $fileName = basename($_FILES['imagen']['name']);
                    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $allowedExts = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

                    if (in_array($fileExt, $allowedExts)) {
                        $newFileName = time() . '_' . uniqid() . '.' . $fileExt;
                        $uploadDir = __DIR__ . '/../../public/uploads/productos/';
                        if (!is_dir($uploadDir)) {
                            mkdir($uploadDir, 0777, true);
                        }
                        if (move_uploaded_file($tmpName, $uploadDir . $newFileName)) {
                            $db_image_path = '../../public/uploads/productos/' . $newFileName;
                        }
                    }
                }

                $stmtInsert = $conn->prepare("INSERT INTO producto (codigo_Producto, nombre, id_Proveedor, descripcion, precio_Compra, precio_Venta, stock_Actual, stock_Minimo, unidad_Medida, estado, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                if ($stmtInsert) {
                    $stmtInsert->bind_param("ssisddiisss", $codigo, $nombre, $id_proveedor, $descripcion, $precio_compra, $precio_venta, $stock_actual, $stock_minimo, $unidad_medida, $estado, $db_image_path);
                    if ($stmtInsert->execute()) {
                        $mensaje = "El producto ha sido registrado correctamente.";
                        $tipo_alerta = "success";
                        $titulo_alerta = "¡Éxito!";
                    } else {
                        $mensaje = "Error al registrar el producto en la base de datos.";
                        $tipo_alerta = "error";
                        $titulo_alerta = "Error";
                    }
                    $stmtInsert->close();
                }
            }
            $stmtCheck->close();
        }
    } else {
        $mensaje = "El código, nombre y proveedor son obligatorios.";
        $tipo_alerta = "warning";
        $titulo_alerta = "Campos vacíos";
    }
}

// Obtener lista de proveedores
$proveedores = [];
$resProv = $conn->query("SELECT id_Proveedor, nombre FROM proveedor");
if ($resProv) {
    while ($p = $resProv->fetch_assoc()) {
        $proveedores[] = $p;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Producto | SIVC</title>

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

    <!-- CSS Dashboard & Formulario -->
    <link rel="stylesheet" href="admi.css/dashboard_admi.css?v=6">
    
    <style>
        .form-page-container {
            max-width: 650px;
            margin: 40px auto;
            background-color: var(--card-bg);
            border: var(--border-style);
            border-radius: var(--radius-md);
            padding: 40px;
            box-shadow: 0 10px 25px rgba(111,45,189,0.05);
        }

        .form-page-header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px dashed #ebd0f0;
            padding-bottom: 20px;
        }

        .form-page-header h1 {
            font-size: 24px;
            font-weight: 800;
            color: var(--color-purple);
            text-transform: uppercase;
        }

        .form-page-header p {
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 600;
            margin-top: 5px;
        }

        .form-grid-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-full-width {
            grid-column: span 2;
        }

        .input-item-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .input-item-group label {
            font-size: 11px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-item-group input,
        .input-item-group select,
        .input-item-group textarea {
            background-color: #f7f3fc;
            border: 2px solid #ebd0f0;
            border-radius: 20px;
            padding: 12px 18px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
            outline: none;
            transition: var(--transition);
        }

        .input-item-group textarea {
            resize: vertical;
            min-height: 90px;
            border-radius: 15px;
        }

        .input-item-group input:focus,
        .input-item-group select:focus,
        .input-item-group textarea:focus {
            border-color: var(--color-purple);
            background-color: #ffffff;
        }

        .image-preview-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 15px;
            border: 2px dashed #ebd0f0;
            border-radius: 20px;
            background-color: #fcf9ff;
        }

        .preview-box {
            width: 120px;
            height: 120px;
            border-radius: 15px;
            border: 1px solid #e2d1f0;
            object-fit: cover;
            background-color: #f7f3fc;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-actions-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 35px;
            border-top: 2px dashed #ebd0f0;
            padding-top: 25px;
        }

        .btn-form-cancel {
            background-color: #fcdfe5;
            color: #ec4899;
            border: none;
            padding: 12px 24px;
            border-radius: 20px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-form-cancel:hover {
            background-color: #ec4899;
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-form-submit {
            background: linear-gradient(90deg, #9b5de5, #f15bb5);
            color: #ffffff;
            border: none;
            padding: 12px 28px;
            border-radius: 20px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 10px rgba(155,93,229,0.2);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-form-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(155,93,229,0.35);
        }

        @media (max-width: 768px) {
            .form-grid-layout {
                grid-template-columns: 1fr;
            }
            .form-full-width {
                grid-column: span 1;
            }
        }
    </style>
    
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
                <a href="dashboar_admi.php" class="sidebar-link-card">
                    <div class="link-left">
                        <i class="fa-solid fa-house"></i>
                        <span>Inicio</span>
                    </div>
                    <span class="link-arrow">></span>
                </a>

                <a href="inventario.php" class="sidebar-link-card active">
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

            <!-- Form Card Container -->
            <div class="form-page-container">
                <div class="form-page-header">
                    <h1>Registrar Producto</h1>
                    <p>Agrega un nuevo producto con su información y foto al catálogo del inventario.</p>
                </div>

                <form action="agregar_producto.php" method="POST" enctype="multipart/form-data" id="formAgregarProducto">
                    <div class="form-grid-layout">
                        <!-- Código -->
                        <div class="input-item-group">
                            <label for="addCodigo">Código del Producto *</label>
                            <input type="text" name="codigo_Producto" id="addCodigo" placeholder="Ej. 104" required>
                        </div>
                        
                        <!-- Nombre -->
                        <div class="input-item-group">
                            <label for="addNombre">Nombre *</label>
                            <input type="text" name="nombre" id="addNombre" placeholder="Ej. Leche entera 1L" required>
                        </div>

                        <!-- Categoría -->
                        <div class="input-item-group">
                            <label for="addCategoria">Categoría *</label>
                            <input type="text" name="unidad_Medida" id="addCategoria" placeholder="Ej. Lácteos" required>
                        </div>

                        <!-- Proveedor -->
                        <div class="input-item-group">
                            <label for="addProveedor">Proveedor *</label>
                            <select name="id_Proveedor" id="addProveedor" required>
                                <option value="" disabled selected>Seleccione un proveedor</option>
                                <?php foreach ($proveedores as $prov): ?>
                                    <option value="<?= $prov['id_Proveedor']; ?>"><?= htmlspecialchars($prov['nombre']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Precio Compra -->
                        <div class="input-item-group">
                            <label for="addPrecioCompra">Precio Compra *</label>
                            <input type="number" step="0.01" name="precio_Compra" id="addPrecioCompra" placeholder="Ej. 1800.00" required>
                        </div>

                        <!-- Precio Venta -->
                        <div class="input-item-group">
                            <label for="addPrecioVenta">Precio Venta *</label>
                            <input type="number" step="0.01" name="precio_Venta" id="addPrecioVenta" placeholder="Ej. 2400.00" required>
                        </div>

                        <!-- Stock Actual -->
                        <div class="input-item-group">
                            <label for="addStock">Cantidad / Stock Inicial *</label>
                            <input type="number" name="stock_Actual" id="addStock" placeholder="Ej. 30" required>
                        </div>

                        <!-- Stock Mínimo -->
                        <div class="input-item-group">
                            <label for="addStockMinimo">Stock Mínimo *</label>
                            <input type="number" name="stock_Minimo" id="addStockMinimo" value="5" required>
                        </div>

                        <!-- Estado -->
                        <div class="input-item-group">
                            <label for="addEstado">Estado *</label>
                            <select name="estado" id="addEstado" required>
                                <option value="Activo" selected>Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>

                        <!-- Subir Foto -->
                        <div class="input-item-group">
                            <label for="addImagen">Subir Foto</label>
                            <input type="file" name="imagen" id="addImagen" accept="image/*" onchange="previewImage(this)">
                        </div>

                        <!-- Vista Previa de Foto -->
                        <div class="input-item-group form-full-width">
                            <div class="image-preview-wrapper">
                                <span style="font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Vista Previa de Foto</span>
                                <div class="preview-box">
                                    <img id="addPreview" src="../../public/img/tienda.png" alt="Vista previa">
                                </div>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="input-item-group form-full-width">
                            <label for="addDescripcion">Descripción</label>
                            <textarea name="descripcion" id="addDescripcion" placeholder="Escribe una descripción sobre el producto..."></textarea>
                        </div>
                    </div>

                    <div class="form-actions-footer">
                        <a href="inventario.php" class="btn-form-cancel">
                            <i class="fa-solid fa-arrow-left"></i> Volver
                        </a>
                        <button type="submit" class="btn-form-submit">
                            <i class="fa-solid fa-plus"></i> Registrar Producto
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <!-- JS Mobile Toggle & Photo Preview -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebarClose = document.getElementById('sidebarClose');

        mobileMenu.addEventListener('click', () => sidebar.classList.add('open'));
        sidebarClose.addEventListener('click', () => sidebar.classList.remove('open'));

        // Photo Preview
        function previewImage(input) {
            const preview = document.getElementById('addPreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "../../public/img/tienda.png";
            }
        }

        // SweetAlert2 Alerts
        <?php if ($mensaje !== ''): ?>
            Swal.fire({
                icon: '<?= $tipo_alerta; ?>',
                title: '<?= $titulo_alerta; ?>',
                text: '<?= $mensaje; ?>',
                confirmButtonColor: '#6f2dbd'
            }).then(() => {
                <?php if ($tipo_alerta === 'success'): ?>
                    window.location.href = 'inventario.php';
                <?php endif; ?>
            });
        <?php endif; ?>
    </script>
</body>

</html>
