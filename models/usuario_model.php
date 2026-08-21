<?php
require_once __DIR__ . '/../configuration/database.php';

class Usuario
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    /**
     * Verifica si un nombre de usuario ya está registrado.
     */
    public function usuarioExiste($usuario)
    {
        $stmt = $this->conn->prepare("SELECT id_Usuario FROM usuarios WHERE nombre_Usuario = ?");
        if ($stmt) {
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $stmt->store_result();
            $exists = $stmt->num_rows > 0;
            $stmt->close();
            return $exists;
        }
        return false;
    }

    /**
     * Verifica si un correo electrónico ya está registrado.
     */
    public function correoExiste($correo)
    {
        $stmt = $this->conn->prepare("SELECT id_Usuario FROM usuarios WHERE correo = ?");
        if ($stmt) {
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $stmt->store_result();
            $exists = $stmt->num_rows > 0;
            $stmt->close();
            return $exists;
        }
        return false;
    }

    /**
     * Registra un nuevo usuario en la base de datos.
     */
    public function registrar($datos)
    {
        // Mapear el rol (Administrador -> 1, Vendedor -> 2, Cliente -> 3)
        $id_rol = '3'; // Por defecto Cliente
        if (isset($datos['rol'])) {
            if ($datos['rol'] === 'Administrador') {
                $id_rol = '1';
            } elseif ($datos['rol'] === 'Vendedor') {
                $id_rol = '2';
            } elseif ($datos['rol'] === 'Cliente') {
                $id_rol = '3';
            }
        }

        $hashed_password = password_hash($datos['password'], PASSWORD_BCRYPT);
        $estado = $datos['estado'] ?? 'Activo';

        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, apellido, numero_Documento, id_Rol, telefono, correo, nombre_Usuario, contraseña, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param(
                "sssssssss",
                $datos['nombre'],
                $datos['apellido'],
                $datos['documento'],
                $id_rol,
                $datos['telefono'],
                $datos['correo'],
                $datos['usuario'],
                $hashed_password,
                $estado
            );
            $result = $stmt->execute();
            $stmt->close();

            // Si se registró con éxito y es un Cliente, también lo agregamos a la tabla de clientes
            if ($result && $id_rol === '3') {
                // Verificar si ya existe en la tabla de clientes por documento para evitar duplicado
                $chk = $this->conn->prepare("SELECT id_Cliente FROM cliente WHERE numero_Documento = ?");
                if ($chk) {
                    $chk->bind_param("s", $datos['documento']);
                    $chk->execute();
                    $chk->store_result();
                    $clientExists = $chk->num_rows > 0;
                    $chk->close();

                    if (!$clientExists) {
                        $stmtCliente = $this->conn->prepare("INSERT INTO cliente (nombre, apellido, numero_Documento, telefono, estado) VALUES (?, ?, ?, ?, ?)");
                        if ($stmtCliente) {
                            $stmtCliente->bind_param("sssss", 
                                $datos['nombre'], 
                                $datos['apellido'], 
                                $datos['documento'], 
                                $datos['telefono'], 
                                $estado
                            );
                            $stmtCliente->execute();
                            $stmtCliente->close();
                        }
                    }
                }
            }

            return $result;
        }
        return false;
    }

    /**
     * Busca un usuario por su nombre de usuario o correo.
     * Retorna los datos incluyendo el nombre del rol.
     */
    public function buscarPorUsuario($usuario)
    {
        $stmt = $this->conn->prepare("
            SELECT u.id_Usuario, u.nombre_Usuario, u.nombre, r.nombre_Rol AS rol, u.contraseña, u.estado 
            FROM usuarios u 
            LEFT JOIN rol r ON u.id_Rol = r.id_Rol 
            WHERE u.nombre_Usuario = ? OR u.correo = ?
        ");
        if ($stmt) {
            $stmt->bind_param("ss", $usuario, $usuario);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
            return $user;
        }
        return null;
    }

    /**
     * Actualiza la fecha y hora del último acceso del usuario.
     */
    public function actualizarAcceso($id_usuario)
    {
        $stmt = $this->conn->prepare("UPDATE usuarios SET ultimo_Acceso = NOW() WHERE id_Usuario = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id_usuario);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }
}
?>