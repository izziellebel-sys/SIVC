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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido = trim($_POST['apellido'] ?? '');
    $documento = trim($_POST['documento'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['contraseña'] ?? '';
    $estado = $_POST['estado'] ?? 'Activo';
    $id_rol = '2'; // Rol 2 = Vendedor

    if ($nombre && $apellido && $documento && $correo && $usuario && $password) {
        // Verificar duplicados
        $stmtCheck = $conn->prepare("SELECT id_Usuario FROM usuarios WHERE numero_Documento = ? OR correo = ? OR nombre_Usuario = ?");
        if ($stmtCheck) {
            $stmtCheck->bind_param("sss", $documento, $correo, $usuario);
            $stmtCheck->execute();
            $resCheck = $stmtCheck->get_result();
            
            if ($resCheck->num_rows > 0) {
                $mensaje = "El documento, correo o nombre de usuario ya está registrado en el sistema.";
                $tipo_alerta = "error";
                $titulo_alerta = "Duplicado";
            } else {
                // Registrar
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $stmtInsert = $conn->prepare("INSERT INTO usuarios (nombre, apellido, numero_Documento, id_Rol, telefono, correo, nombre_Usuario, contraseña, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                if ($stmtInsert) {
                    $stmtInsert->bind_param("sssssssss", $nombre, $apellido, $documento, $id_rol, $telefono, $correo, $usuario, $hashed_password, $estado);
                    if ($stmtInsert->execute()) {
                        $mensaje = "El vendedor ha sido registrado correctamente.";
                        $tipo_alerta = "success";
                        $titulo_alerta = "¡Éxito!";
                    } else {
                        $mensaje = "Error al intentar insertar en la base de datos.";
                        $tipo_alerta = "error";
                        $titulo_alerta = "Error";
                    }
                    $stmtInsert->close();
                }
            }
            $stmtCheck->close();
        }
    } else {
        $mensaje = "Todos los campos obligatorios deben estar completos.";
        $tipo_alerta = "warning";
        $titulo_alerta = "Campos vacíos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Vendedor | SIVC</title>

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

    <!-- CSS Dashboard & Formulario (reutilizado) -->
    <link rel="stylesheet" href="admi.css/dashboard_admi.css?v=5">
    
    <style>
        .form-page-container {
            max-width: 600px;
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
        .input-item-group select {
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

        .input-item-group input:focus,
        .input-item-group select:focus {
            border-color: var(--color-purple);
            background-color: #ffffff;
        }

        .password-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-wrapper input {
            width: 100%;
        }

        .password-wrapper i {
            position: absolute;
            right: 15px;
            cursor: pointer;
            color: var(--text-muted);
            font-size: 16px;
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

                <a href="vendedores.php" class="sidebar-link-card active">
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
                    <h1>Registrar Vendedor</h1>
                    <p>Crea una nueva cuenta de vendedor con acceso restringido al sistema.</p>
                </div>

                <form action="crear_vendedor.php" method="POST" id="formAgregarVendedor">
                    <div class="form-grid-layout">
                        <!-- Nombre -->
                        <div class="input-item-group">
                            <label for="addNombre">Nombre *</label>
                            <input type="text" name="nombre" id="addNombre" placeholder="Ej. Tatiana" required>
                        </div>
                        
                        <!-- Apellido -->
                        <div class="input-item-group">
                            <label for="addApellido">Apellido *</label>
                            <input type="text" name="apellido" id="addApellido" placeholder="Ej. Herrera" required>
                        </div>

                        <!-- Documento -->
                        <div class="input-item-group">
                            <label for="addDocumento">Documento de Identidad *</label>
                            <input type="text" name="documento" id="addDocumento" placeholder="N° C.C. / D.N.I." required>
                        </div>

                        <!-- Teléfono -->
                        <div class="input-item-group">
                            <label for="addTelefono">Teléfono</label>
                            <input type="text" name="telefono" id="addTelefono" placeholder="Ej. 3001234567">
                        </div>

                        <!-- Correo -->
                        <div class="input-item-group form-full-width">
                            <label for="addCorreo">Correo Electrónico *</label>
                            <input type="email" name="correo" id="addCorreo" placeholder="ejemplo@gmail.com" required>
                        </div>

                        <!-- Usuario -->
                        <div class="input-item-group">
                            <label for="addUsuario">Nombre de Usuario *</label>
                            <input type="text" name="usuario" id="addUsuario" placeholder="Ej. Tatus23" required>
                        </div>

                        <!-- Contraseña -->
                        <div class="input-item-group">
                            <label for="addPassword">Contraseña *</label>
                            <div class="password-wrapper">
                                <input type="password" name="contraseña" id="addPassword" placeholder="********" required>
                                <i class="fa-regular fa-eye-slash" id="togglePassword"></i>
                            </div>
                        </div>

                        <!-- Estado -->
                        <div class="input-item-group form-full-width">
                            <label for="addEstado">Estado inicial *</label>
                            <select name="estado" id="addEstado" required>
                                <option value="Activo" selected>Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions-footer">
                        <a href="vendedores.php" class="btn-form-cancel">
                            <i class="fa-solid fa-arrow-left"></i> Volver
                        </a>
                        <button type="submit" class="btn-form-submit">
                            <i class="fa-solid fa-user-plus"></i> Registrar Vendedor
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <!-- JS Mobile Toggle & Password Visibility -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebarClose = document.getElementById('sidebarClose');

        mobileMenu.addEventListener('click', () => sidebar.classList.add('open'));
        sidebarClose.addEventListener('click', () => sidebar.classList.remove('open'));

        // Toggle Password
        const passwordInput = document.getElementById('addPassword');
        const toggleIcon = document.getElementById('togglePassword');

        toggleIcon.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
            }
        });

        // SweetAlert2 Alerts
        <?php if ($mensaje !== ''): ?>
            Swal.fire({
                icon: '<?= $tipo_alerta; ?>',
                title: '<?= $titulo_alerta; ?>',
                text: '<?= $mensaje; ?>',
                confirmButtonColor: '#6f2dbd'
            }).then(() => {
                <?php if ($tipo_alerta === 'success'): ?>
                    window.location.href = 'vendedores.php';
                <?php endif; ?>
            });
        <?php endif; ?>
    </script>
</body>

</html>
