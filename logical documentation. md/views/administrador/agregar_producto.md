# Documentación Lógica: agregar_producto.php

## Información General
- **Ruta del Archivo**: `views/administrador/agregar_producto.php`
- **Tipo**: Archivo de Código PHP/HTML

## Estructura del Código
Este archivo contiene las directivas y lógica de agregar_producto.php. A continuación, se detalla el comportamiento de cada línea.

## Explicación Línea por Línea

### Línea 1: `<?php`
- **¿Para qué sirve?**: Iniciar la interpretación de código PHP.
- **¿Qué hace?**: Indica al servidor que procese las siguientes líneas como instrucciones de programación PHP.
- **¿Qué pasa si se daña?**: El servidor web enviará el código PHP como texto plano al navegador, rompiendo la aplicación y exponiendo datos sensibles o lógica interna.

### Línea 2: `session_start();`
- **¿Para qué sirve?**: Inicializar o restaurar la sesión del usuario.
- **¿Qué hace?**: Comienza una sesión en el servidor para almacenar y recuperar datos del usuario conectado mediante variables superglobales `$_SESSION`.
- **¿Qué pasa si se daña?**: Los usuarios no podrán iniciar sesión, y si ya estaban conectados, no se recordará su identidad, bloqueando el acceso a las vistas protegidas del sistema.

### Línea 3: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 4: `// Protección de acceso`
- **¿Para qué sirve?**: Comentario aclaratorio en el código.
- **¿Qué hace?**: Es ignorado por el compilador e intérprete de PHP.
- **¿Qué pasa si se daña?**: Ninguno. Solo se pierde la explicación en el código fuente para futuros desarrolladores.

### Línea 5: `if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {`
- **¿Para qué sirve?**: Evaluar una condición lógica de control de flujo.
- **¿Qué hace?**: Comprueba si una expresión lógica o variable es verdadera para decidir si se ejecuta el bloque de código consecuente.
- **¿Qué pasa si se daña?**: No se realizarán las validaciones correspondientes (como verificar roles de usuario o existencia de datos), vulnerando la lógica o la seguridad.

### Línea 6: `    header("Location: ../login.php");`
- **¿Para qué sirve?**: Redireccionar al usuario a otra página del sistema.
- **¿Qué hace?**: Envía una cabecera de redirección HTTP al navegador, forzándolo a cargar una nueva dirección URL.
- **¿Qué pasa si se daña?**: El flujo de navegación se romperá; el usuario se quedará en una pantalla en blanco y no podrá ser redirigido automáticamente.

### Línea 7: `    exit();`
- **¿Para qué sirve?**: Detener inmediatamente el procesamiento del script actual.
- **¿Qué hace?**: Finaliza el script PHP actual en esa línea exacta, previniendo la ejecución de código no deseado tras una redirección o validación.
- **¿Qué pasa si se daña?**: El servidor continuará ejecutando líneas de código no deseadas, lo que podría anular redirecciones o ejecutar operaciones de base de datos de manera incorrecta.

### Línea 8: `}`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 9: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 10: `require_once __DIR__ . '/../../configuration/load_config.php';`
- **¿Para qué sirve?**: Importar de forma obligatoria el archivo un archivo externo.
- **¿Qué hace?**: Carga y ejecuta el contenido del archivo un archivo externo una sola vez durante la solicitud, asegurando que sus funciones y variables estén disponibles.
- **¿Qué pasa si se daña?**: Se producirá un error fatal (Fatal Error) que detendrá por completo la ejecución del script y mostrará un error de servidor (ej. pantalla en blanco o error 500).

### Línea 11: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 12: `$mensaje = "";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$mensaje`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$mensaje` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$mensaje` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 13: `$tipo_alerta = "";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$tipo_alerta`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$tipo_alerta` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$tipo_alerta` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 14: `$titulo_alerta = "";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$titulo_alerta`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$titulo_alerta` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$titulo_alerta` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 15: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 16: `// PROCESAR POST ACCIONES`
- **¿Para qué sirve?**: Comentario aclaratorio en el código.
- **¿Qué hace?**: Es ignorado por el compilador e intérprete de PHP.
- **¿Qué pasa si se daña?**: Ninguno. Solo se pierde la explicación en el código fuente para futuros desarrolladores.

### Línea 17: `if ($_SERVER["REQUEST_METHOD"] == "POST") {`
- **¿Para qué sirve?**: Evaluar una condición lógica de control de flujo.
- **¿Qué hace?**: Comprueba si una expresión lógica o variable es verdadera para decidir si se ejecuta el bloque de código consecuente.
- **¿Qué pasa si se daña?**: No se realizarán las validaciones correspondientes (como verificar roles de usuario o existencia de datos), vulnerando la lógica o la seguridad.

### Línea 18: `    $codigo = trim($_POST['codigo_Producto'] ?? '');`
- **¿Para qué sirve?**: Definir e inicializar la variable `$codigo`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$codigo` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$codigo` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 19: `    $nombre = trim($_POST['nombre'] ?? '');`
- **¿Para qué sirve?**: Definir e inicializar la variable `$nombre`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$nombre` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$nombre` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 20: `    $id_proveedor = (int)($_POST['id_Proveedor'] ?? 0);`
- **¿Para qué sirve?**: Definir e inicializar la variable `$id_proveedor`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$id_proveedor` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$id_proveedor` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 21: `    $descripcion = trim($_POST['descripcion'] ?? '');`
- **¿Para qué sirve?**: Definir e inicializar la variable `$descripcion`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$descripcion` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$descripcion` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 22: `    $precio_compra = (float)($_POST['precio_Compra'] ?? 0);`
- **¿Para qué sirve?**: Definir e inicializar la variable `$precio_compra`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$precio_compra` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$precio_compra` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 23: `    $precio_venta = (float)($_POST['precio_Venta'] ?? 0);`
- **¿Para qué sirve?**: Definir e inicializar la variable `$precio_venta`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$precio_venta` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$precio_venta` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 24: `    $stock_actual = (int)($_POST['stock_Actual'] ?? 0);`
- **¿Para qué sirve?**: Definir e inicializar la variable `$stock_actual`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$stock_actual` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$stock_actual` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 25: `    $stock_minimo = (int)($_POST['stock_Minimo'] ?? 0);`
- **¿Para qué sirve?**: Definir e inicializar la variable `$stock_minimo`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$stock_minimo` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$stock_minimo` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 26: `    $unidad_medida = trim($_POST['unidad_Medida'] ?? '');`
- **¿Para qué sirve?**: Definir e inicializar la variable `$unidad_medida`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$unidad_medida` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$unidad_medida` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 27: `    $estado = $_POST['estado'] ?? 'Activo';`
- **¿Para qué sirve?**: Definir e inicializar la variable `$estado`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$estado` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$estado` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 28: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 29: `    if ($codigo && $nombre && $id_proveedor > 0) {`
- **¿Para qué sirve?**: Evaluar una condición lógica de control de flujo.
- **¿Qué hace?**: Comprueba si una expresión lógica o variable es verdadera para decidir si se ejecuta el bloque de código consecuente.
- **¿Qué pasa si se daña?**: No se realizarán las validaciones correspondientes (como verificar roles de usuario o existencia de datos), vulnerando la lógica o la seguridad.

### Línea 30: `        // Verificar duplicado de código`
- **¿Para qué sirve?**: Comentario aclaratorio en el código.
- **¿Qué hace?**: Es ignorado por el compilador e intérprete de PHP.
- **¿Qué pasa si se daña?**: Ninguno. Solo se pierde la explicación en el código fuente para futuros desarrolladores.

### Línea 31: `        $stmtCheck = $conn->prepare("SELECT id_Producto FROM producto WHERE codigo_Producto = ?");`
- **¿Para qué sirve?**: Definir e inicializar la variable `$stmtCheck`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$stmtCheck` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$stmtCheck` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 32: `        if ($stmtCheck) {`
- **¿Para qué sirve?**: Evaluar una condición lógica de control de flujo.
- **¿Qué hace?**: Comprueba si una expresión lógica o variable es verdadera para decidir si se ejecuta el bloque de código consecuente.
- **¿Qué pasa si se daña?**: No se realizarán las validaciones correspondientes (como verificar roles de usuario o existencia de datos), vulnerando la lógica o la seguridad.

### Línea 33: `            $stmtCheck->bind_param("s", $codigo);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 34: `            $stmtCheck->execute();`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 35: `            $resCheck = $stmtCheck->get_result();`
- **¿Para qué sirve?**: Definir e inicializar la variable `$resCheck`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$resCheck` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$resCheck` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 36: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 37: `            if ($resCheck->num_rows > 0) {`
- **¿Para qué sirve?**: Evaluar una condición lógica de control de flujo.
- **¿Qué hace?**: Comprueba si una expresión lógica o variable es verdadera para decidir si se ejecuta el bloque de código consecuente.
- **¿Qué pasa si se daña?**: No se realizarán las validaciones correspondientes (como verificar roles de usuario o existencia de datos), vulnerando la lógica o la seguridad.

### Línea 38: `                $mensaje = "El código de producto ya está registrado en el sistema.";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$mensaje`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$mensaje` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$mensaje` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 39: `                $tipo_alerta = "error";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$tipo_alerta`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$tipo_alerta` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$tipo_alerta` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 40: `                $titulo_alerta = "Duplicado";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$titulo_alerta`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$titulo_alerta` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$titulo_alerta` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 41: `            } else {`
- **¿Para qué sirve?**: Establecer la rama por defecto de una estructura condicional.
- **¿Qué hace?**: Ejecuta las instrucciones asociadas en caso de que ninguna condición del bloque `if` haya resultado verdadera.
- **¿Qué pasa si se daña?**: El flujo de control no tendrá una salida por defecto cuando fallen los casos previstos, causando estados nulos o detenciones lógicas.

### Línea 42: `                // Subir imagen si existe`
- **¿Para qué sirve?**: Comentario aclaratorio en el código.
- **¿Qué hace?**: Es ignorado por el compilador e intérprete de PHP.
- **¿Qué pasa si se daña?**: Ninguno. Solo se pierde la explicación en el código fuente para futuros desarrolladores.

### Línea 43: `                $db_image_path = null;`
- **¿Para qué sirve?**: Definir e inicializar la variable `$db_image_path`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$db_image_path` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$db_image_path` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 44: `                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {`
- **¿Para qué sirve?**: Evaluar una condición lógica de control de flujo.
- **¿Qué hace?**: Comprueba si una expresión lógica o variable es verdadera para decidir si se ejecuta el bloque de código consecuente.
- **¿Qué pasa si se daña?**: No se realizarán las validaciones correspondientes (como verificar roles de usuario o existencia de datos), vulnerando la lógica o la seguridad.

### Línea 45: `                    $tmpName = $_FILES['imagen']['tmp_name'];`
- **¿Para qué sirve?**: Definir e inicializar la variable `$tmpName`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$tmpName` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$tmpName` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 46: `                    $fileName = basename($_FILES['imagen']['name']);`
- **¿Para qué sirve?**: Definir e inicializar la variable `$fileName`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$fileName` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$fileName` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 47: `                    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));`
- **¿Para qué sirve?**: Definir e inicializar la variable `$fileExt`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$fileExt` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$fileExt` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 48: `                    $allowedExts = ['jpg', 'jpeg', 'png', 'webp', 'gif'];`
- **¿Para qué sirve?**: Definir e inicializar la variable `$allowedExts`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$allowedExts` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$allowedExts` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 49: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 50: `                    if (in_array($fileExt, $allowedExts)) {`
- **¿Para qué sirve?**: Evaluar una condición lógica de control de flujo.
- **¿Qué hace?**: Comprueba si una expresión lógica o variable es verdadera para decidir si se ejecuta el bloque de código consecuente.
- **¿Qué pasa si se daña?**: No se realizarán las validaciones correspondientes (como verificar roles de usuario o existencia de datos), vulnerando la lógica o la seguridad.

### Línea 51: `                        $newFileName = time() . '_' . uniqid() . '.' . $fileExt;`
- **¿Para qué sirve?**: Definir e inicializar la variable `$newFileName`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$newFileName` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$newFileName` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 52: `                        $uploadDir = __DIR__ . '/../../public/uploads/productos/';`
- **¿Para qué sirve?**: Definir e inicializar la variable `$uploadDir`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$uploadDir` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$uploadDir` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 53: `                        if (!is_dir($uploadDir)) {`
- **¿Para qué sirve?**: Evaluar una condición lógica de control de flujo.
- **¿Qué hace?**: Comprueba si una expresión lógica o variable es verdadera para decidir si se ejecuta el bloque de código consecuente.
- **¿Qué pasa si se daña?**: No se realizarán las validaciones correspondientes (como verificar roles de usuario o existencia de datos), vulnerando la lógica o la seguridad.

### Línea 54: `                            mkdir($uploadDir, 0777, true);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 55: `                        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 56: `                        if (move_uploaded_file($tmpName, $uploadDir . $newFileName)) {`
- **¿Para qué sirve?**: Evaluar una condición lógica de control de flujo.
- **¿Qué hace?**: Comprueba si una expresión lógica o variable es verdadera para decidir si se ejecuta el bloque de código consecuente.
- **¿Qué pasa si se daña?**: No se realizarán las validaciones correspondientes (como verificar roles de usuario o existencia de datos), vulnerando la lógica o la seguridad.

### Línea 57: `                            $db_image_path = '../../public/uploads/productos/' . $newFileName;`
- **¿Para qué sirve?**: Definir e inicializar la variable `$db_image_path`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$db_image_path` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$db_image_path` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 58: `                        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 59: `                    }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 60: `                }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 61: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 62: `                $stmtInsert = $conn->prepare("INSERT INTO producto (codigo_Producto, nombre, id_Proveedor, descripcion, precio_Compra, precio_Venta, stock_Actual, stock_Minimo, unidad_Medida, estado, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");`
- **¿Para qué sirve?**: Definir e inicializar la variable `$stmtInsert`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$stmtInsert` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$stmtInsert` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 63: `                if ($stmtInsert) {`
- **¿Para qué sirve?**: Evaluar una condición lógica de control de flujo.
- **¿Qué hace?**: Comprueba si una expresión lógica o variable es verdadera para decidir si se ejecuta el bloque de código consecuente.
- **¿Qué pasa si se daña?**: No se realizarán las validaciones correspondientes (como verificar roles de usuario o existencia de datos), vulnerando la lógica o la seguridad.

### Línea 64: `                    $stmtInsert->bind_param("ssisddiisss", $codigo, $nombre, $id_proveedor, $descripcion, $precio_compra, $precio_venta, $stock_actual, $stock_minimo, $unidad_medida, $estado, $db_image_path);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 65: `                    if ($stmtInsert->execute()) {`
- **¿Para qué sirve?**: Evaluar una condición lógica de control de flujo.
- **¿Qué hace?**: Comprueba si una expresión lógica o variable es verdadera para decidir si se ejecuta el bloque de código consecuente.
- **¿Qué pasa si se daña?**: No se realizarán las validaciones correspondientes (como verificar roles de usuario o existencia de datos), vulnerando la lógica o la seguridad.

### Línea 66: `                        $mensaje = "El producto ha sido registrado correctamente.";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$mensaje`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$mensaje` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$mensaje` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 67: `                        $tipo_alerta = "success";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$tipo_alerta`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$tipo_alerta` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$tipo_alerta` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 68: `                        $titulo_alerta = "¡Éxito!";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$titulo_alerta`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$titulo_alerta` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$titulo_alerta` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 69: `                    } else {`
- **¿Para qué sirve?**: Establecer la rama por defecto de una estructura condicional.
- **¿Qué hace?**: Ejecuta las instrucciones asociadas en caso de que ninguna condición del bloque `if` haya resultado verdadera.
- **¿Qué pasa si se daña?**: El flujo de control no tendrá una salida por defecto cuando fallen los casos previstos, causando estados nulos o detenciones lógicas.

### Línea 70: `                        $mensaje = "Error al registrar el producto en la base de datos.";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$mensaje`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$mensaje` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$mensaje` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 71: `                        $tipo_alerta = "error";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$tipo_alerta`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$tipo_alerta` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$tipo_alerta` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 72: `                        $titulo_alerta = "Error";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$titulo_alerta`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$titulo_alerta` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$titulo_alerta` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 73: `                    }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 74: `                    $stmtInsert->close();`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 75: `                }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 76: `            }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 77: `            $stmtCheck->close();`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 78: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 79: `    } else {`
- **¿Para qué sirve?**: Establecer la rama por defecto de una estructura condicional.
- **¿Qué hace?**: Ejecuta las instrucciones asociadas en caso de que ninguna condición del bloque `if` haya resultado verdadera.
- **¿Qué pasa si se daña?**: El flujo de control no tendrá una salida por defecto cuando fallen los casos previstos, causando estados nulos o detenciones lógicas.

### Línea 80: `        $mensaje = "El código, nombre y proveedor son obligatorios.";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$mensaje`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$mensaje` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$mensaje` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 81: `        $tipo_alerta = "warning";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$tipo_alerta`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$tipo_alerta` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$tipo_alerta` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 82: `        $titulo_alerta = "Campos vacíos";`
- **¿Para qué sirve?**: Definir e inicializar la variable `$titulo_alerta`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$titulo_alerta` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$titulo_alerta` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 83: `    }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 84: `}`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 85: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 86: `// Obtener lista de proveedores`
- **¿Para qué sirve?**: Comentario aclaratorio en el código.
- **¿Qué hace?**: Es ignorado por el compilador e intérprete de PHP.
- **¿Qué pasa si se daña?**: Ninguno. Solo se pierde la explicación en el código fuente para futuros desarrolladores.

### Línea 87: `$proveedores = [];`
- **¿Para qué sirve?**: Definir e inicializar la variable `$proveedores`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$proveedores` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$proveedores` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 88: `$resProv = $conn->query("SELECT id_Proveedor, nombre FROM proveedor");`
- **¿Para qué sirve?**: Definir e inicializar la variable `$resProv`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$resProv` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$resProv` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 89: `if ($resProv) {`
- **¿Para qué sirve?**: Evaluar una condición lógica de control de flujo.
- **¿Qué hace?**: Comprueba si una expresión lógica o variable es verdadera para decidir si se ejecuta el bloque de código consecuente.
- **¿Qué pasa si se daña?**: No se realizarán las validaciones correspondientes (como verificar roles de usuario o existencia de datos), vulnerando la lógica o la seguridad.

### Línea 90: `    while ($p = $resProv->fetch_assoc()) {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 91: `        $proveedores[] = $p;`
- **¿Para qué sirve?**: Definir e inicializar la variable `$proveedores`.
- **¿Qué hace?**: Asigna un valor resultante o una estructura de datos a la variable `$proveedores` para ser referenciada en la memoria del servidor.
- **¿Qué pasa si se daña?**: La variable `$proveedores` no estará declarada o tendrá un valor nulo, provocando errores en cascada al ser leída o comparada más adelante.

### Línea 92: `    }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 93: `}`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 94: `?>`
- **¿Para qué sirve?**: Finalizar la interpretación de PHP.
- **¿Qué hace?**: Indica al procesador de PHP que deje de procesar código y vuelva a interpretar lo que sigue como HTML/texto plano.
- **¿Qué pasa si se daña?**: Provocará errores de parseo (Parse error) o que el código HTML posterior sea tratado como código PHP, rompiendo la carga de la página.

### Línea 95: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 96: `<!DOCTYPE html>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 97: `<html lang="es">`
- **¿Para qué sirve?**: Definir la raíz del documento web.
- **¿Qué hace?**: Contiene todos los elementos del sitio web y delimita el inicio del código HTML.
- **¿Qué pasa si se daña?**: El navegador no reconocerá de forma correcta la estructura y el árbol DOM del archivo, lo que afectará al renderizado general de la página.

### Línea 98: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 99: `<head>`
- **¿Para qué sirve?**: Contener metadatos, hojas de estilo y scripts.
- **¿Qué hace?**: Define información técnica que no se renderiza en la página directamente, como el título, enlaces CSS y scripts Javascript.
- **¿Qué pasa si se daña?**: No se cargarán los estilos CSS ni los metadatos esenciales, haciendo que la página se vea como texto sin formato y rompa la lógica del cliente.

### Línea 100: `    <meta charset="UTF-8">`
- **¿Para qué sirve?**: Configurar metadatos del documento, como la codificación o la escala responsiva.
- **¿Qué hace?**: Establece propiedades de visualización y codificación para que el navegador renderice correctamente caracteres especiales o se adapte a dispositivos móviles.
- **¿Qué pasa si se daña?**: Se verán mal las tildes y caracteres especiales (por codificación incorrecta) o el sitio web no se adaptará adecuadamente a teléfonos móviles.

### Línea 101: `    <meta name="viewport" content="width=device-width, initial-scale=1.0">`
- **¿Para qué sirve?**: Configurar metadatos del documento, como la codificación o la escala responsiva.
- **¿Qué hace?**: Establece propiedades de visualización y codificación para que el navegador renderice correctamente caracteres especiales o se adapte a dispositivos móviles.
- **¿Qué pasa si se daña?**: Se verán mal las tildes y caracteres especiales (por codificación incorrecta) o el sitio web no se adaptará adecuadamente a teléfonos móviles.

### Línea 102: `    <title>Registrar Producto | SIVC</title>`
- **¿Para qué sirve?**: Definir el título de la pestaña del navegador.
- **¿Qué hace?**: Muestra el texto configurado en la pestaña del navegador web y en los resultados de búsqueda.
- **¿Qué pasa si se daña?**: La pestaña del navegador mostrará la URL del archivo o un título vacío, perjudicando la experiencia de usuario y el SEO.

### Línea 103: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 104: `    <!-- Fuentes -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 105: `    <link rel="preconnect" href="https://fonts.googleapis.com">`
- **¿Para qué sirve?**: Vincular un archivo externo de estilos CSS.
- **¿Qué hace?**: Enlaza la hoja de estilos externa al documento actual para aplicar el diseño visual y colores definidos.
- **¿Qué pasa si se daña?**: La vista actual perderá todos sus estilos y diseño visual, renderizándose como texto plano de navegador sin colores, márgenes o tipografía.

### Línea 106: `    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>`
- **¿Para qué sirve?**: Vincular un archivo externo de estilos CSS.
- **¿Qué hace?**: Enlaza la hoja de estilos externa al documento actual para aplicar el diseño visual y colores definidos.
- **¿Qué pasa si se daña?**: La vista actual perderá todos sus estilos y diseño visual, renderizándose como texto plano de navegador sin colores, márgenes o tipografía.

### Línea 107: `    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">`
- **¿Para qué sirve?**: Vincular un archivo externo de estilos CSS.
- **¿Qué hace?**: Enlaza la hoja de estilos externa al documento actual para aplicar el diseño visual y colores definidos.
- **¿Qué pasa si se daña?**: La vista actual perderá todos sus estilos y diseño visual, renderizándose como texto plano de navegador sin colores, márgenes o tipografía.

### Línea 108: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 109: `    <!-- Iconos -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 110: `    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">`
- **¿Para qué sirve?**: Vincular un archivo externo de estilos CSS.
- **¿Qué hace?**: Enlaza la hoja de estilos externa al documento actual para aplicar el diseño visual y colores definidos.
- **¿Qué pasa si se daña?**: La vista actual perderá todos sus estilos y diseño visual, renderizándose como texto plano de navegador sin colores, márgenes o tipografía.

### Línea 111: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 112: `    <!-- SweetAlert2 -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 113: `    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>`
- **¿Para qué sirve?**: Incluir scripts o código de comportamiento en JavaScript.
- **¿Qué hace?**: Carga archivos de JS para manejar interactividad del lado del cliente.
- **¿Qué pasa si se daña?**: Se romperá la interactividad en la página, como el menú desplegable, las validaciones del lado del cliente y las llamadas AJAX.

### Línea 114: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 115: `    <!-- CSS general -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 116: `    <link rel="stylesheet" href="../css/style.css">`
- **¿Para qué sirve?**: Vincular un archivo externo de estilos CSS.
- **¿Qué hace?**: Enlaza la hoja de estilos externa al documento actual para aplicar el diseño visual y colores definidos.
- **¿Qué pasa si se daña?**: La vista actual perderá todos sus estilos y diseño visual, renderizándose como texto plano de navegador sin colores, márgenes o tipografía.

### Línea 117: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 118: `    <!-- CSS Dashboard & Formulario -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 119: `    <link rel="stylesheet" href="admi.css/dashboard_admi.css?v=6">`
- **¿Para qué sirve?**: Vincular un archivo externo de estilos CSS.
- **¿Qué hace?**: Enlaza la hoja de estilos externa al documento actual para aplicar el diseño visual y colores definidos.
- **¿Qué pasa si se daña?**: La vista actual perderá todos sus estilos y diseño visual, renderizándose como texto plano de navegador sin colores, márgenes o tipografía.

### Línea 120: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 121: `    <style>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<style>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 122: `        .form-page-container {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 123: `            max-width: 650px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 124: `            margin: 40px auto;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 125: `            background-color: var(--card-bg);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 126: `            border: var(--border-style);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 127: `            border-radius: var(--radius-md);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 128: `            padding: 40px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 129: `            box-shadow: 0 10px 25px rgba(111,45,189,0.05);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 130: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 131: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 132: `        .form-page-header {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 133: `            text-align: center;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 134: `            margin-bottom: 30px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 135: `            border-bottom: 2px dashed #ebd0f0;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 136: `            padding-bottom: 20px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 137: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 138: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 139: `        .form-page-header h1 {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 140: `            font-size: 24px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 141: `            font-weight: 800;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 142: `            color: var(--color-purple);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 143: `            text-transform: uppercase;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 144: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 145: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 146: `        .form-page-header p {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 147: `            color: var(--text-muted);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 148: `            font-size: 13px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 149: `            font-weight: 600;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 150: `            margin-top: 5px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 151: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 152: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 153: `        .form-grid-layout {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 154: `            display: grid;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 155: `            grid-template-columns: 1fr 1fr;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 156: `            gap: 20px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 157: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 158: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 159: `        .form-full-width {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 160: `            grid-column: span 2;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 161: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 162: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 163: `        .input-item-group {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 164: `            display: flex;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 165: `            flex-direction: column;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 166: `            gap: 8px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 167: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 168: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 169: `        .input-item-group label {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 170: `            font-size: 11px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 171: `            font-weight: 700;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 172: `            color: var(--text-muted);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 173: `            text-transform: uppercase;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 174: `            letter-spacing: 0.5px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 175: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 176: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 177: `        .input-item-group input,`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 178: `        .input-item-group select,`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 179: `        .input-item-group textarea {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 180: `            background-color: #f7f3fc;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 181: `            border: 2px solid #ebd0f0;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 182: `            border-radius: 20px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 183: `            padding: 12px 18px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 184: `            font-family: inherit;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 185: `            font-size: 14px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 186: `            font-weight: 600;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 187: `            color: var(--text-dark);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 188: `            outline: none;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 189: `            transition: var(--transition);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 190: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 191: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 192: `        .input-item-group textarea {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 193: `            resize: vertical;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 194: `            min-height: 90px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 195: `            border-radius: 15px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 196: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 197: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 198: `        .input-item-group input:focus,`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 199: `        .input-item-group select:focus,`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 200: `        .input-item-group textarea:focus {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 201: `            border-color: var(--color-purple);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 202: `            background-color: #ffffff;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 203: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 204: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 205: `        .image-preview-wrapper {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 206: `            display: flex;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 207: `            flex-direction: column;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 208: `            align-items: center;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 209: `            gap: 10px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 210: `            padding: 15px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 211: `            border: 2px dashed #ebd0f0;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 212: `            border-radius: 20px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 213: `            background-color: #fcf9ff;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 214: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 215: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 216: `        .preview-box {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 217: `            width: 120px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 218: `            height: 120px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 219: `            border-radius: 15px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 220: `            border: 1px solid #e2d1f0;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 221: `            object-fit: cover;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 222: `            background-color: #f7f3fc;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 223: `            display: flex;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 224: `            align-items: center;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 225: `            justify-content: center;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 226: `            overflow: hidden;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 227: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 228: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 229: `        .preview-box img {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 230: `            width: 100%;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 231: `            height: 100%;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 232: `            object-fit: cover;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 233: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 234: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 235: `        .form-actions-footer {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 236: `            display: flex;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 237: `            justify-content: space-between;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 238: `            align-items: center;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 239: `            margin-top: 35px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 240: `            border-top: 2px dashed #ebd0f0;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 241: `            padding-top: 25px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 242: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 243: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 244: `        .btn-form-cancel {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 245: `            background-color: #fcdfe5;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 246: `            color: #ec4899;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 247: `            border: none;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 248: `            padding: 12px 24px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 249: `            border-radius: 20px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 250: `            font-family: inherit;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 251: `            font-size: 14px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 252: `            font-weight: 700;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 253: `            cursor: pointer;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 254: `            transition: var(--transition);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 255: `            text-decoration: none;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 256: `            display: inline-flex;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 257: `            align-items: center;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 258: `            gap: 8px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 259: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 260: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 261: `        .btn-form-cancel:hover {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 262: `            background-color: #ec4899;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 263: `            color: #ffffff;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 264: `            transform: translateY(-1px);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 265: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 266: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 267: `        .btn-form-submit {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 268: `            background: linear-gradient(90deg, #9b5de5, #f15bb5);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 269: `            color: #ffffff;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 270: `            border: none;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 271: `            padding: 12px 28px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 272: `            border-radius: 20px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 273: `            font-family: inherit;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 274: `            font-size: 14px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 275: `            font-weight: 700;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 276: `            cursor: pointer;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 277: `            transition: var(--transition);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 278: `            box-shadow: 0 4px 10px rgba(155,93,229,0.2);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 279: `            display: inline-flex;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 280: `            align-items: center;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 281: `            gap: 8px;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 282: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 283: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 284: `        .btn-form-submit:hover {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 285: `            transform: translateY(-2px);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 286: `            box-shadow: 0 6px 15px rgba(155,93,229,0.35);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 287: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 288: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 289: `        @media (max-width: 768px) {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 290: `            .form-grid-layout {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 291: `                grid-template-columns: 1fr;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 292: `            }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 293: `            .form-full-width {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 294: `                grid-column: span 1;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 295: `            }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 296: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 297: `    </style>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 298: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 299: `    <!-- Cargar temas y fuentes personalizadas de la base de datos -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 300: `    <?php aplicarConfiguracionEstilos(); ?>`
- **¿Para qué sirve?**: Iniciar la interpretación de código PHP.
- **¿Qué hace?**: Indica al servidor que procese las siguientes líneas como instrucciones de programación PHP.
- **¿Qué pasa si se daña?**: El servidor web enviará el código PHP como texto plano al navegador, rompiendo la aplicación y exponiendo datos sensibles o lógica interna.

### Línea 301: `</head>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 302: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 303: `<body>`
- **¿Para qué sirve?**: Contener todo el contenido visible de la página web.
- **¿Qué hace?**: Delimita la sección del documento donde se colocan los textos, imágenes, tablas y formularios que el usuario visualiza.
- **¿Qué pasa si se daña?**: El navegador no mostrará ningún elemento visual o el DOM quedará mal formado, provocando fallas visuales extremas.

### Línea 304: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 305: `    <div class="dashboard-container">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 306: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 307: `        <!-- ==========================================`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 308: `             SIDEBAR (BARRA LATERAL)`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 309: `        =========================================== -->`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 310: `        <aside class="sidebar" id="sidebar">`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<aside>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 311: `            <button class="sidebar-toggle-btn" id="sidebarClose">`
- **¿Para qué sirve?**: Proporcionar controles de entrada para que el usuario interactúe y envíe datos.
- **¿Qué hace?**: Renderiza un control de formulario (caja de texto, selector, botón, etc.) con sus atributos y valores correspondientes.
- **¿Qué pasa si se daña?**: El usuario no podrá rellenar la información requerida, o no podrá presionar el botón de confirmación, paralizando el sistema.

### Línea 312: `                <i class="fa-solid fa-bars"></i>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<i>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 313: `            </button>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 314: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 315: `            <!-- Store Logo -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 316: `            <div class="sidebar-logo-section">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 317: `                <img src="../../public/img/tienda.png" alt="Doña Marina Logo" class="brand-logo-img">`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<img>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 318: `                <h2 class="brand-title">DOÑA MARINA</h2>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<h2>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 319: `                <span class="brand-subtitle">TIENDA DE BARRIO</span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 320: `            </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 321: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 322: `            <!-- Navigation Links -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 323: `            <nav class="sidebar-navigation">`
- **¿Para qué sirve?**: Declarar la barra o sección de navegación.
- **¿Qué hace?**: Define un bloque de enlaces destinados a la navegación del sitio.
- **¿Qué pasa si se daña?**: El diseño de la barra de navegación se perderá o no se organizará de manera semántica.

### Línea 324: `                <a href="dashboar_admi.php" class="sidebar-link-card">`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<a>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 325: `                    <div class="link-left">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 326: `                        <i class="fa-solid fa-house"></i>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<i>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 327: `                        <span>Inicio</span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 328: `                    </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 329: `                    <span class="link-arrow">></span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 330: `                </a>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 331: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 332: `                <a href="inventario.php" class="sidebar-link-card active">`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<a>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 333: `                    <div class="link-left">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 334: `                        <i class="fa-solid fa-basket-shopping"></i>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<i>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 335: `                        <span>Inventario</span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 336: `                    </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 337: `                    <span class="link-arrow">></span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 338: `                </a>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 339: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 340: `                <a href="ventas.php" class="sidebar-link-card">`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<a>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 341: `                    <div class="link-left">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 342: `                        <i class="fa-solid fa-cart-shopping"></i>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<i>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 343: `                        <span>Ventas</span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 344: `                    </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 345: `                    <span class="link-arrow">></span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 346: `                </a>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 347: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 348: `                <a href="clientes.php" class="sidebar-link-card">`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<a>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 349: `                    <div class="link-left">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 350: `                        <i class="fa-solid fa-users"></i>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<i>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 351: `                        <span>Clientes</span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 352: `                    </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 353: `                    <span class="link-arrow">></span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 354: `                </a>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 355: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 356: `                <a href="vendedores.php" class="sidebar-link-card">`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<a>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 357: `                    <div class="link-left">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 358: `                        <i class="fa-solid fa-user-tie"></i>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<i>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 359: `                        <span>Vendedores</span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 360: `                    </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 361: `                    <span class="link-arrow">></span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 362: `                </a>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 363: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 364: `                <a href="reportes.php" class="sidebar-link-card">`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<a>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 365: `                    <div class="link-left">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 366: `                        <i class="fa-solid fa-chart-simple"></i>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<i>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 367: `                        <span>Reportes</span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 368: `                    </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 369: `                    <span class="link-arrow">></span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 370: `                </a>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 371: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 372: `                <a href="configuracion.php" class="sidebar-link-card">`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<a>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 373: `                    <div class="link-left">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 374: `                        <i class="fa-solid fa-gear"></i>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<i>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 375: `                        <span>Configuracion</span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 376: `                    </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 377: `                    <span class="link-arrow">></span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 378: `                </a>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 379: `            </nav>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 380: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 381: `            <!-- Logout -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 382: `            <div class="sidebar-footer-section">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 383: `                <a href="../../controllers/logout.php" class="sidebar-logout-btn">`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<a>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 384: `                    <i class="fa-solid fa-arrow-right-from-bracket"></i>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<i>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 385: `                    <span>Cerrar sesion</span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 386: `                </a>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 387: `            </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 388: `        </aside>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 389: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 390: `        <!-- ==========================================`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 391: `             MAIN CONTENT`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 392: `        =========================================== -->`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 393: `        <main class="main-content">`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<main>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 394: `            <!-- Mobile Toggle Menu Button -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 395: `            <button class="mobile-toggle-btn" id="mobileMenu">`
- **¿Para qué sirve?**: Proporcionar controles de entrada para que el usuario interactúe y envíe datos.
- **¿Qué hace?**: Renderiza un control de formulario (caja de texto, selector, botón, etc.) con sus atributos y valores correspondientes.
- **¿Qué pasa si se daña?**: El usuario no podrá rellenar la información requerida, o no podrá presionar el botón de confirmación, paralizando el sistema.

### Línea 396: `                <i class="fa-solid fa-bars"></i>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<i>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 397: `            </button>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 398: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 399: `            <!-- Form Card Container -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 400: `            <div class="form-page-container">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 401: `                <div class="form-page-header">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 402: `                    <h1>Registrar Producto</h1>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<h1>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 403: `                    <p>Agrega un nuevo producto con su información y foto al catálogo del inventario.</p>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<p>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 404: `                </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 405: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 406: `                <form action="agregar_producto.php" method="POST" enctype="multipart/form-data" id="formAgregarProducto">`
- **¿Para qué sirve?**: Definir un formulario interactivo para recolectar datos.
- **¿Qué hace?**: Envía los datos de los inputs del usuario al servidor usando un método HTTP (POST/GET) hacia una acción específica.
- **¿Qué pasa si se daña?**: El usuario no podrá enviar ningún dato (iniciar sesión, registrar productos o ventas), bloqueando el flujo funcional de la aplicación.

### Línea 407: `                    <div class="form-grid-layout">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 408: `                        <!-- Código -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 409: `                        <div class="input-item-group">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 410: `                            <label for="addCodigo">Código del Producto *</label>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<label>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 411: `                            <input type="text" name="codigo_Producto" id="addCodigo" placeholder="Ej. 104" required>`
- **¿Para qué sirve?**: Importar de forma obligatoria el archivo un archivo externo.
- **¿Qué hace?**: Carga y ejecuta el contenido del archivo un archivo externo una sola vez durante la solicitud, asegurando que sus funciones y variables estén disponibles.
- **¿Qué pasa si se daña?**: Se producirá un error fatal (Fatal Error) que detendrá por completo la ejecución del script y mostrará un error de servidor (ej. pantalla en blanco o error 500).

### Línea 412: `                        </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 413: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 414: `                        <!-- Nombre -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 415: `                        <div class="input-item-group">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 416: `                            <label for="addNombre">Nombre *</label>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<label>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 417: `                            <input type="text" name="nombre" id="addNombre" placeholder="Ej. Leche entera 1L" required>`
- **¿Para qué sirve?**: Importar de forma obligatoria el archivo un archivo externo.
- **¿Qué hace?**: Carga y ejecuta el contenido del archivo un archivo externo una sola vez durante la solicitud, asegurando que sus funciones y variables estén disponibles.
- **¿Qué pasa si se daña?**: Se producirá un error fatal (Fatal Error) que detendrá por completo la ejecución del script y mostrará un error de servidor (ej. pantalla en blanco o error 500).

### Línea 418: `                        </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 419: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 420: `                        <!-- Categoría -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 421: `                        <div class="input-item-group">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 422: `                            <label for="addCategoria">Categoría *</label>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<label>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 423: `                            <input type="text" name="unidad_Medida" id="addCategoria" placeholder="Ej. Lácteos" required>`
- **¿Para qué sirve?**: Importar de forma obligatoria el archivo un archivo externo.
- **¿Qué hace?**: Carga y ejecuta el contenido del archivo un archivo externo una sola vez durante la solicitud, asegurando que sus funciones y variables estén disponibles.
- **¿Qué pasa si se daña?**: Se producirá un error fatal (Fatal Error) que detendrá por completo la ejecución del script y mostrará un error de servidor (ej. pantalla en blanco o error 500).

### Línea 424: `                        </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 425: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 426: `                        <!-- Proveedor -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 427: `                        <div class="input-item-group">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 428: `                            <label for="addProveedor">Proveedor *</label>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<label>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 429: `                            <select name="id_Proveedor" id="addProveedor" required>`
- **¿Para qué sirve?**: Importar de forma obligatoria el archivo un archivo externo.
- **¿Qué hace?**: Carga y ejecuta el contenido del archivo un archivo externo una sola vez durante la solicitud, asegurando que sus funciones y variables estén disponibles.
- **¿Qué pasa si se daña?**: Se producirá un error fatal (Fatal Error) que detendrá por completo la ejecución del script y mostrará un error de servidor (ej. pantalla en blanco o error 500).

### Línea 430: `                                <option value="" disabled selected>Seleccione un proveedor</option>`
- **¿Para qué sirve?**: Proporcionar controles de entrada para que el usuario interactúe y envíe datos.
- **¿Qué hace?**: Renderiza un control de formulario (caja de texto, selector, botón, etc.) con sus atributos y valores correspondientes.
- **¿Qué pasa si se daña?**: El usuario no podrá rellenar la información requerida, o no podrá presionar el botón de confirmación, paralizando el sistema.

### Línea 431: `                                <?php foreach ($proveedores as $prov): ?>`
- **¿Para qué sirve?**: Iniciar la interpretación de código PHP.
- **¿Qué hace?**: Indica al servidor que procese las siguientes líneas como instrucciones de programación PHP.
- **¿Qué pasa si se daña?**: El servidor web enviará el código PHP como texto plano al navegador, rompiendo la aplicación y exponiendo datos sensibles o lógica interna.

### Línea 432: `                                    <option value="<?= $prov['id_Proveedor']; ?>"><?= htmlspecialchars($prov['nombre']); ?></option>`
- **¿Para qué sirve?**: Finalizar la interpretación de PHP.
- **¿Qué hace?**: Indica al procesador de PHP que deje de procesar código y vuelva a interpretar lo que sigue como HTML/texto plano.
- **¿Qué pasa si se daña?**: Provocará errores de parseo (Parse error) o que el código HTML posterior sea tratado como código PHP, rompiendo la carga de la página.

### Línea 433: `                                <?php endforeach; ?>`
- **¿Para qué sirve?**: Iniciar la interpretación de código PHP.
- **¿Qué hace?**: Indica al servidor que procese las siguientes líneas como instrucciones de programación PHP.
- **¿Qué pasa si se daña?**: El servidor web enviará el código PHP como texto plano al navegador, rompiendo la aplicación y exponiendo datos sensibles o lógica interna.

### Línea 434: `                            </select>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 435: `                        </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 436: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 437: `                        <!-- Precio Compra -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 438: `                        <div class="input-item-group">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 439: `                            <label for="addPrecioCompra">Precio Compra *</label>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<label>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 440: `                            <input type="number" step="0.01" name="precio_Compra" id="addPrecioCompra" placeholder="Ej. 1800.00" required>`
- **¿Para qué sirve?**: Importar de forma obligatoria el archivo un archivo externo.
- **¿Qué hace?**: Carga y ejecuta el contenido del archivo un archivo externo una sola vez durante la solicitud, asegurando que sus funciones y variables estén disponibles.
- **¿Qué pasa si se daña?**: Se producirá un error fatal (Fatal Error) que detendrá por completo la ejecución del script y mostrará un error de servidor (ej. pantalla en blanco o error 500).

### Línea 441: `                        </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 442: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 443: `                        <!-- Precio Venta -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 444: `                        <div class="input-item-group">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 445: `                            <label for="addPrecioVenta">Precio Venta *</label>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<label>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 446: `                            <input type="number" step="0.01" name="precio_Venta" id="addPrecioVenta" placeholder="Ej. 2400.00" required>`
- **¿Para qué sirve?**: Importar de forma obligatoria el archivo un archivo externo.
- **¿Qué hace?**: Carga y ejecuta el contenido del archivo un archivo externo una sola vez durante la solicitud, asegurando que sus funciones y variables estén disponibles.
- **¿Qué pasa si se daña?**: Se producirá un error fatal (Fatal Error) que detendrá por completo la ejecución del script y mostrará un error de servidor (ej. pantalla en blanco o error 500).

### Línea 447: `                        </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 448: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 449: `                        <!-- Stock Actual -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 450: `                        <div class="input-item-group">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 451: `                            <label for="addStock">Cantidad / Stock Inicial *</label>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<label>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 452: `                            <input type="number" name="stock_Actual" id="addStock" placeholder="Ej. 30" required>`
- **¿Para qué sirve?**: Importar de forma obligatoria el archivo un archivo externo.
- **¿Qué hace?**: Carga y ejecuta el contenido del archivo un archivo externo una sola vez durante la solicitud, asegurando que sus funciones y variables estén disponibles.
- **¿Qué pasa si se daña?**: Se producirá un error fatal (Fatal Error) que detendrá por completo la ejecución del script y mostrará un error de servidor (ej. pantalla en blanco o error 500).

### Línea 453: `                        </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 454: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 455: `                        <!-- Stock Mínimo -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 456: `                        <div class="input-item-group">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 457: `                            <label for="addStockMinimo">Stock Mínimo *</label>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<label>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 458: `                            <input type="number" name="stock_Minimo" id="addStockMinimo" value="5" required>`
- **¿Para qué sirve?**: Importar de forma obligatoria el archivo un archivo externo.
- **¿Qué hace?**: Carga y ejecuta el contenido del archivo un archivo externo una sola vez durante la solicitud, asegurando que sus funciones y variables estén disponibles.
- **¿Qué pasa si se daña?**: Se producirá un error fatal (Fatal Error) que detendrá por completo la ejecución del script y mostrará un error de servidor (ej. pantalla en blanco o error 500).

### Línea 459: `                        </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 460: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 461: `                        <!-- Estado -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 462: `                        <div class="input-item-group">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 463: `                            <label for="addEstado">Estado *</label>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<label>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 464: `                            <select name="estado" id="addEstado" required>`
- **¿Para qué sirve?**: Importar de forma obligatoria el archivo un archivo externo.
- **¿Qué hace?**: Carga y ejecuta el contenido del archivo un archivo externo una sola vez durante la solicitud, asegurando que sus funciones y variables estén disponibles.
- **¿Qué pasa si se daña?**: Se producirá un error fatal (Fatal Error) que detendrá por completo la ejecución del script y mostrará un error de servidor (ej. pantalla en blanco o error 500).

### Línea 465: `                                <option value="Activo" selected>Activo</option>`
- **¿Para qué sirve?**: Proporcionar controles de entrada para que el usuario interactúe y envíe datos.
- **¿Qué hace?**: Renderiza un control de formulario (caja de texto, selector, botón, etc.) con sus atributos y valores correspondientes.
- **¿Qué pasa si se daña?**: El usuario no podrá rellenar la información requerida, o no podrá presionar el botón de confirmación, paralizando el sistema.

### Línea 466: `                                <option value="Inactivo">Inactivo</option>`
- **¿Para qué sirve?**: Proporcionar controles de entrada para que el usuario interactúe y envíe datos.
- **¿Qué hace?**: Renderiza un control de formulario (caja de texto, selector, botón, etc.) con sus atributos y valores correspondientes.
- **¿Qué pasa si se daña?**: El usuario no podrá rellenar la información requerida, o no podrá presionar el botón de confirmación, paralizando el sistema.

### Línea 467: `                            </select>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 468: `                        </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 469: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 470: `                        <!-- Subir Foto -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 471: `                        <div class="input-item-group">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 472: `                            <label for="addImagen">Subir Foto</label>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<label>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 473: `                            <input type="file" name="imagen" id="addImagen" accept="image/*" onchange="previewImage(this)">`
- **¿Para qué sirve?**: Proporcionar controles de entrada para que el usuario interactúe y envíe datos.
- **¿Qué hace?**: Renderiza un control de formulario (caja de texto, selector, botón, etc.) con sus atributos y valores correspondientes.
- **¿Qué pasa si se daña?**: El usuario no podrá rellenar la información requerida, o no podrá presionar el botón de confirmación, paralizando el sistema.

### Línea 474: `                        </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 475: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 476: `                        <!-- Vista Previa de Foto -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 477: `                        <div class="input-item-group form-full-width">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 478: `                            <div class="image-preview-wrapper">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 479: `                                <span style="font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Vista Previa de Foto</span>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<span>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 480: `                                <div class="preview-box">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 481: `                                    <img id="addPreview" src="../../public/img/tienda.png" alt="Vista previa">`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<img>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 482: `                                </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 483: `                            </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 484: `                        </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 485: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 486: `                        <!-- Descripción -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 487: `                        <div class="input-item-group form-full-width">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 488: `                            <label for="addDescripcion">Descripción</label>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<label>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 489: `                            <textarea name="descripcion" id="addDescripcion" placeholder="Escribe una descripción sobre el producto..."></textarea>`
- **¿Para qué sirve?**: Proporcionar controles de entrada para que el usuario interactúe y envíe datos.
- **¿Qué hace?**: Renderiza un control de formulario (caja de texto, selector, botón, etc.) con sus atributos y valores correspondientes.
- **¿Qué pasa si se daña?**: El usuario no podrá rellenar la información requerida, o no podrá presionar el botón de confirmación, paralizando el sistema.

### Línea 490: `                        </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 491: `                    </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 492: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 493: `                    <div class="form-actions-footer">`
- **¿Para qué sirve?**: Crear un contenedor de bloque general para diseño.
- **¿Qué hace?**: Agrupa elementos de la página para estructurar el diseño o aplicar estilos CSS en conjunto.
- **¿Qué pasa si se daña?**: Se puede deformar la estructura de la página, alterando los márgenes, cuadrículas o la colocación de los componentes en la pantalla.

### Línea 494: `                        <a href="inventario.php" class="btn-form-cancel">`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<a>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 495: `                            <i class="fa-solid fa-arrow-left"></i> Volver`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<i>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 496: `                        </a>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 497: `                        <button type="submit" class="btn-form-submit">`
- **¿Para qué sirve?**: Proporcionar controles de entrada para que el usuario interactúe y envíe datos.
- **¿Qué hace?**: Renderiza un control de formulario (caja de texto, selector, botón, etc.) con sus atributos y valores correspondientes.
- **¿Qué pasa si se daña?**: El usuario no podrá rellenar la información requerida, o no podrá presionar el botón de confirmación, paralizando el sistema.

### Línea 498: `                            <i class="fa-solid fa-plus"></i> Registrar Producto`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<i>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 499: `                        </button>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 500: `                    </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 501: `                </form>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 502: `            </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 503: `        </main>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 504: `    </div>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 505: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 506: `    <!-- JS Mobile Toggle & Photo Preview -->`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 507: `    <script>`
- **¿Para qué sirve?**: Incluir scripts o código de comportamiento en JavaScript.
- **¿Qué hace?**: Carga archivos de JS para manejar interactividad del lado del cliente.
- **¿Qué pasa si se daña?**: Se romperá la interactividad en la página, como el menú desplegable, las validaciones del lado del cliente y las llamadas AJAX.

### Línea 508: `        const sidebar = document.getElementById('sidebar');`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 509: `        const mobileMenu = document.getElementById('mobileMenu');`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 510: `        const sidebarClose = document.getElementById('sidebarClose');`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 511: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 512: `        mobileMenu.addEventListener('click', () => sidebar.classList.add('open'));`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 513: `        sidebarClose.addEventListener('click', () => sidebar.classList.remove('open'));`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 514: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 515: `        // Photo Preview`
- **¿Para qué sirve?**: Comentario aclaratorio en el código.
- **¿Qué hace?**: Es ignorado por el compilador e intérprete de PHP.
- **¿Qué pasa si se daña?**: Ninguno. Solo se pierde la explicación en el código fuente para futuros desarrolladores.

### Línea 516: `        function previewImage(input) {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 517: `            const preview = document.getElementById('addPreview');`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 518: `            if (input.files && input.files[0]) {`
- **¿Para qué sirve?**: Evaluar una condición lógica de control de flujo.
- **¿Qué hace?**: Comprueba si una expresión lógica o variable es verdadera para decidir si se ejecuta el bloque de código consecuente.
- **¿Qué pasa si se daña?**: No se realizarán las validaciones correspondientes (como verificar roles de usuario o existencia de datos), vulnerando la lógica o la seguridad.

### Línea 519: `                const reader = new FileReader();`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 520: `                reader.onload = function(e) {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 521: `                    preview.src = e.target.result;`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 522: `                }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 523: `                reader.readAsDataURL(input.files[0]);`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 524: `            } else {`
- **¿Para qué sirve?**: Establecer la rama por defecto de una estructura condicional.
- **¿Qué hace?**: Ejecuta las instrucciones asociadas en caso de que ninguna condición del bloque `if` haya resultado verdadera.
- **¿Qué pasa si se daña?**: El flujo de control no tendrá una salida por defecto cuando fallen los casos previstos, causando estados nulos o detenciones lógicas.

### Línea 525: `                preview.src = "../../public/img/tienda.png";`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 526: `            }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 527: `        }`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 528: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 529: `        // SweetAlert2 Alerts`
- **¿Para qué sirve?**: Comentario aclaratorio en el código.
- **¿Qué hace?**: Es ignorado por el compilador e intérprete de PHP.
- **¿Qué pasa si se daña?**: Ninguno. Solo se pierde la explicación en el código fuente para futuros desarrolladores.

### Línea 530: `        <?php if ($mensaje !== ''): ?>`
- **¿Para qué sirve?**: Iniciar la interpretación de código PHP.
- **¿Qué hace?**: Indica al servidor que procese las siguientes líneas como instrucciones de programación PHP.
- **¿Qué pasa si se daña?**: El servidor web enviará el código PHP como texto plano al navegador, rompiendo la aplicación y exponiendo datos sensibles o lógica interna.

### Línea 531: `            Swal.fire({`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 532: `                icon: '<?= $tipo_alerta; ?>',`
- **¿Para qué sirve?**: Finalizar la interpretación de PHP.
- **¿Qué hace?**: Indica al procesador de PHP que deje de procesar código y vuelva a interpretar lo que sigue como HTML/texto plano.
- **¿Qué pasa si se daña?**: Provocará errores de parseo (Parse error) o que el código HTML posterior sea tratado como código PHP, rompiendo la carga de la página.

### Línea 533: `                title: '<?= $titulo_alerta; ?>',`
- **¿Para qué sirve?**: Finalizar la interpretación de PHP.
- **¿Qué hace?**: Indica al procesador de PHP que deje de procesar código y vuelva a interpretar lo que sigue como HTML/texto plano.
- **¿Qué pasa si se daña?**: Provocará errores de parseo (Parse error) o que el código HTML posterior sea tratado como código PHP, rompiendo la carga de la página.

### Línea 534: `                text: '<?= $mensaje; ?>',`
- **¿Para qué sirve?**: Finalizar la interpretación de PHP.
- **¿Qué hace?**: Indica al procesador de PHP que deje de procesar código y vuelva a interpretar lo que sigue como HTML/texto plano.
- **¿Qué pasa si se daña?**: Provocará errores de parseo (Parse error) o que el código HTML posterior sea tratado como código PHP, rompiendo la carga de la página.

### Línea 535: `                confirmButtonColor: '#6f2dbd'`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 536: `            }).then(() => {`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 537: `                <?php if ($tipo_alerta === 'success'): ?>`
- **¿Para qué sirve?**: Iniciar la interpretación de código PHP.
- **¿Qué hace?**: Indica al servidor que procese las siguientes líneas como instrucciones de programación PHP.
- **¿Qué pasa si se daña?**: El servidor web enviará el código PHP como texto plano al navegador, rompiendo la aplicación y exponiendo datos sensibles o lógica interna.

### Línea 538: `                    window.location.href = 'inventario.php';`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 539: `                <?php endif; ?>`
- **¿Para qué sirve?**: Iniciar la interpretación de código PHP.
- **¿Qué hace?**: Indica al servidor que procese las siguientes líneas como instrucciones de programación PHP.
- **¿Qué pasa si se daña?**: El servidor web enviará el código PHP como texto plano al navegador, rompiendo la aplicación y exponiendo datos sensibles o lógica interna.

### Línea 540: `            });`
- **¿Para qué sirve?**: Realizar una operación lógica u operativa de PHP.
- **¿Qué hace?**: Ejecuta la instrucción PHP correspondiente según la sintaxis del lenguaje.
- **¿Qué pasa si se daña?**: Si se altera, provocará fallos de sintaxis en PHP o de comportamiento en el flujo del servidor.

### Línea 541: `        <?php endif; ?>`
- **¿Para qué sirve?**: Iniciar la interpretación de código PHP.
- **¿Qué hace?**: Indica al servidor que procese las siguientes líneas como instrucciones de programación PHP.
- **¿Qué pasa si se daña?**: El servidor web enviará el código PHP como texto plano al navegador, rompiendo la aplicación y exponiendo datos sensibles o lógica interna.

### Línea 542: `    </script>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 543: `</body>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

### Línea 544: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual en el archivo PHP.
- **¿Qué hace?**: Línea vacía. No tiene efecto en la ejecución del servidor.
- **¿Qué pasa si se daña?**: No afecta la ejecución, únicamente reduce ligeramente la legibilidad del código.

### Línea 545: `</html>`
- **¿Para qué sirve?**: Renderizar un elemento HTML de tipo `<HTML>`.
- **¿Qué hace?**: Define la estructura visual y semántica del documento en la página web.
- **¿Qué pasa si se daña?**: El elemento se romperá o desordenará en la interfaz de usuario web.

