# Documentación Lógica: cliente_detalle.php

## Información General
- **Ruta del Archivo**: `views/administrador/cliente_detalle.php`
- **Tipo**: Archivo de código PHP (explicación lógica)

## Estructura del Código
Este archivo contiene la lógica para cliente_detalle.php. A continuación, se detalla el comportamiento de cada línea.

## Explicación Línea por Línea

### Línea 1: `<?php`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Abre el bloque PHP que será ejecutado por el servidor.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 2: `session_start();`
- **¿Para qué sirve?**: Iniciar o reanudar una sesión de usuario.
- **¿Qué hace?**: Inicia o recupera la sesión para conservar los datos del usuario conectado.
- **¿Qué pasa si se daña?**: Se perderá el estado de la sesión, impidiendo que los usuarios inicien sesión, permanezcan autenticados o accedan a datos protegidos, causando fallas de seguridad o redirecciones infinitas.

### Línea 3: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 4: `// Protección de acceso`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 5: `if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 6: `header("Location: ../login.php");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 7: `exit();`
- **¿Para qué sirve?**: Detener el script inmediatamente después de un redireccionamiento u otra acción de control.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: El script continuará ejecutándose en segundo plano, consumiendo recursos o procesando lógica que no debería ejecutarse tras una redirección.

### Línea 8: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 9: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 10: `require_once __DIR__ . '/../../configuration/database.php';`
- **¿Para qué sirve?**: Importar y ejecutar un archivo externo obligatorio.
- **¿Qué hace?**: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
- **¿Qué pasa si se daña?**: La aplicación fallará con un error crítico (Fatal Error: require_once failed) y se detendrá la ejecución por completo, resultando en una pantalla en blanco o error 500.

### Línea 11: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 12: `$mensaje = "";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$mensaje` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 13: `$tipo_alerta = "";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 14: `$titulo_alerta = "";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 15: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 16: `// OBTENER CLIENTE POR ID`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 17: `$id_cliente = isset($_GET['id']) ? (int)$_GET['id'] : 0;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene de la URL el parámetro `id`.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 18: `if ($id_cliente <= 0) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 19: `header("Location: clientes.php");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 20: `exit();`
- **¿Para qué sirve?**: Detener el script inmediatamente después de un redireccionamiento u otra acción de control.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: El script continuará ejecutándose en segundo plano, consumiendo recursos o procesando lógica que no debería ejecutarse tras una redirección.

### Línea 21: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 22: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 23: `// Consultar datos del cliente`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 24: `$stmtClient = $conn->prepare("SELECT c.*, u.correo FROM cliente c LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento WHERE c.id_Cliente = ?");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 25: `$stmtClient->bind_param("i", $id_cliente);`
- **¿Para qué sirve?**: Vincular variables como parámetros a una sentencia SQL preparada.
- **¿Qué hace?**: Asocia variables PHP con los parámetros `?` de una consulta preparada.
- **¿Qué pasa si se daña?**: La base de datos recibirá datos incompletos o incorrectos, provocando un error en la ejecución de la consulta SQL y fallos en la operación.

### Línea 26: `$stmtClient->execute();`
- **¿Para qué sirve?**: Ejecutar la sentencia SQL previamente preparada y vinculada.
- **¿Qué hace?**: Ejecuta la consulta preparada.
- **¿Qué pasa si se daña?**: La consulta no se ejecutará en la base de datos, por lo que no se guardará ni recuperará ninguna información, anulando la acción del usuario.

### Línea 27: `$cliente = $stmtClient->get_result()->fetch_assoc();`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene el resultado devuelto por la consulta SQL.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 28: `$stmtClient->close();`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 29: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 30: `if (!$cliente) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 31: `header("Location: clientes.php");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 32: `exit();`
- **¿Para qué sirve?**: Detener el script inmediatamente después de un redireccionamiento u otra acción de control.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: El script continuará ejecutándose en segundo plano, consumiendo recursos o procesando lógica que no debería ejecutarse tras una redirección.

### Línea 33: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 34: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 35: `// Iniciales del cliente para el avatar`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 36: `$iniciales = strtoupper(substr($cliente['nombre'], 0, 1) . substr($cliente['apellido'], 0, 1));`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$iniciales` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 37: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 38: `// PROCESAR POST ACCIONES (Registrar Deuda, Registrar Abono)`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 39: `if ($_SERVER["REQUEST_METHOD"] == "POST") {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 40: `$action = $_POST['action'] ?? '';`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `action` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 41: `$id_usuario_logueado = $_SESSION['id_Usuario'];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 42: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 43: `if ($action === 'registrar_deuda') {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 44: `$concepto = trim($_POST['concepto'] ?? '');`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `concepto` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 45: `$monto = (float)($_POST['monto'] ?? 0);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `monto` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 46: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 47: `if (empty($concepto) || $monto <= 0) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 48: `$mensaje = "Debe ingresar un concepto y un monto mayor a cero.";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$mensaje` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 49: `$tipo_alerta = "warning";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 50: `$titulo_alerta = "Datos inválidos";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 51: `} else {`
- **¿Para qué sirve?**: Ejecutar un bloque de código alternativo cuando ninguna de las condiciones previas fue verdadera.
- **¿Qué hace?**: Ejecuta una alternativa cuando la condición anterior es falsa.
- **¿Qué pasa si se daña?**: El sistema no tendrá una respuesta por defecto ante fallos de validación, resultando en un estado indefinido o bloqueando la experiencia del usuario.

### Línea 52: `$stmtInsertDeuda = $conn->prepare("INSERT INTO deuda (fecha_Registro, valor_Inicial, saldo_Pendiente, estado, id_Usuario, id_Cliente, concepto) VALUES (NOW(), ?, ?, 'Pendiente', ?, ?, ?)");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 53: `$stmtInsertDeuda->bind_param("ddiis", $monto, $monto, $id_usuario_logueado, $id_cliente, $concepto);`
- **¿Para qué sirve?**: Vincular variables como parámetros a una sentencia SQL preparada.
- **¿Qué hace?**: Asocia variables PHP con los parámetros `?` de una consulta preparada.
- **¿Qué pasa si se daña?**: La base de datos recibirá datos incompletos o incorrectos, provocando un error en la ejecución de la consulta SQL y fallos en la operación.

### Línea 54: `if ($stmtInsertDeuda->execute()) {`
- **¿Para qué sirve?**: Ejecutar la sentencia SQL previamente preparada y vinculada.
- **¿Qué hace?**: Ejecuta la consulta preparada.
- **¿Qué pasa si se daña?**: La consulta no se ejecutará en la base de datos, por lo que no se guardará ni recuperará ninguna información, anulando la acción del usuario.

### Línea 55: `$mensaje = "Deuda registrada con éxito.";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$mensaje` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 56: `$tipo_alerta = "success";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 57: `$titulo_alerta = "¡Éxito!";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 58: `} else {`
- **¿Para qué sirve?**: Ejecutar un bloque de código alternativo cuando ninguna de las condiciones previas fue verdadera.
- **¿Qué hace?**: Ejecuta una alternativa cuando la condición anterior es falsa.
- **¿Qué pasa si se daña?**: El sistema no tendrá una respuesta por defecto ante fallos de validación, resultando en un estado indefinido o bloqueando la experiencia del usuario.

### Línea 59: `$mensaje = "Error al registrar la deuda: " . $conn->error;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$mensaje` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 60: `$tipo_alerta = "error";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 61: `$titulo_alerta = "Error";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 62: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 63: `$stmtInsertDeuda->close();`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Forma parte de una consulta `INSERT`, utilizada para crear un registro.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 64: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 65: `} elseif ($action === 'registrar_abono') {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición alternativa si la anterior no se cumplió.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 66: `$id_deuda = (int)($_POST['id_deuda'] ?? 0);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `id_deuda` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 67: `$monto_abono = (float)($_POST['monto_abono'] ?? 0);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `monto_abono` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 68: `$nuevo_estado = $_POST['nuevo_estado'] ?? '';`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `nuevo_estado` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 69: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 70: `if ($id_deuda <= 0 || $monto_abono <= 0) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 71: `$mensaje = "Debe seleccionar una deuda y especificar un monto de abono válido.";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$mensaje` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 72: `$tipo_alerta = "warning";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 73: `$titulo_alerta = "Datos incompletos";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 74: `} else {`
- **¿Para qué sirve?**: Ejecutar un bloque de código alternativo cuando ninguna de las condiciones previas fue verdadera.
- **¿Qué hace?**: Ejecuta una alternativa cuando la condición anterior es falsa.
- **¿Qué pasa si se daña?**: El sistema no tendrá una respuesta por defecto ante fallos de validación, resultando en un estado indefinido o bloqueando la experiencia del usuario.

### Línea 75: `// Iniciar transacción`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 76: `$conn->begin_transaction();`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Inicia una transacción para que varias operaciones se confirmen o reviertan juntas.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 77: `try {`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Inicia un bloque donde se controlarán posibles errores.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 78: `// Obtener detalles de la deuda`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 79: `$stmtGetD = $conn->prepare("SELECT saldo_Pendiente, valor_Inicial FROM deuda WHERE id_Deuda = ? FOR UPDATE");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 80: `$stmtGetD->bind_param("i", $id_deuda);`
- **¿Para qué sirve?**: Vincular variables como parámetros a una sentencia SQL preparada.
- **¿Qué hace?**: Asocia variables PHP con los parámetros `?` de una consulta preparada.
- **¿Qué pasa si se daña?**: La base de datos recibirá datos incompletos o incorrectos, provocando un error en la ejecución de la consulta SQL y fallos en la operación.

### Línea 81: `$stmtGetD->execute();`
- **¿Para qué sirve?**: Ejecutar la sentencia SQL previamente preparada y vinculada.
- **¿Qué hace?**: Ejecuta la consulta preparada.
- **¿Qué pasa si se daña?**: La consulta no se ejecutará en la base de datos, por lo que no se guardará ni recuperará ninguna información, anulando la acción del usuario.

### Línea 82: `$deuda_row = $stmtGetD->get_result()->fetch_assoc();`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene el resultado devuelto por la consulta SQL.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 83: `$stmtGetD->close();`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 84: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 85: `if (!$deuda_row) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 86: `throw new Exception("La deuda seleccionada no existe.");`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Crea una instancia de la clase `Exception` para utilizar sus métodos.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 87: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 88: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 89: `$saldo_actual = (float)$deuda_row['saldo_Pendiente'];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$saldo_actual` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 90: `if ($monto_abono > $saldo_actual) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 91: `throw new Exception("El abono no puede superar el saldo pendiente ($" . number_format($saldo_actual, 0, ',', '.') . ").");`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Crea una instancia de la clase `Exception` para utilizar sus métodos.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 92: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 93: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 94: `$nuevo_saldo = $saldo_actual - $monto_abono;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$nuevo_saldo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 95: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 96: `// Determinar el estado final de la deuda`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 97: `if ($nuevo_saldo <= 0) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 98: `$estado_final = 'Pagada';`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$estado_final` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 99: `$nuevo_saldo = 0.00;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$nuevo_saldo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 100: `} else {`
- **¿Para qué sirve?**: Ejecutar un bloque de código alternativo cuando ninguna de las condiciones previas fue verdadera.
- **¿Qué hace?**: Ejecuta una alternativa cuando la condición anterior es falsa.
- **¿Qué pasa si se daña?**: El sistema no tendrá una respuesta por defecto ante fallos de validación, resultando en un estado indefinido o bloqueando la experiencia del usuario.

### Línea 101: `$estado_final = ($nuevo_estado === 'Pagada') ? 'Abonada' : $nuevo_estado; // Si seleccionan pagada pero queda saldo, es abonada`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$estado_final` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 102: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 103: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 104: `// 1. Insertar abono`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 105: `$stmtA = $conn->prepare("INSERT INTO abono (fecha_Abono, valor_Abonado, id_Deuda, id_Usuario) VALUES (NOW(), ?, ?, ?)");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 106: `$stmtA->bind_param("dii", $monto_abono, $id_deuda, $id_usuario_logueado);`
- **¿Para qué sirve?**: Vincular variables como parámetros a una sentencia SQL preparada.
- **¿Qué hace?**: Asocia variables PHP con los parámetros `?` de una consulta preparada.
- **¿Qué pasa si se daña?**: La base de datos recibirá datos incompletos o incorrectos, provocando un error en la ejecución de la consulta SQL y fallos en la operación.

### Línea 107: `$stmtA->execute();`
- **¿Para qué sirve?**: Ejecutar la sentencia SQL previamente preparada y vinculada.
- **¿Qué hace?**: Ejecuta la consulta preparada.
- **¿Qué pasa si se daña?**: La consulta no se ejecutará en la base de datos, por lo que no se guardará ni recuperará ninguna información, anulando la acción del usuario.

### Línea 108: `$stmtA->close();`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 109: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 110: `// 2. Actualizar deuda`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 111: `$stmtU = $conn->prepare("UPDATE deuda SET saldo_Pendiente = ?, estado = ? WHERE id_Deuda = ?");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 112: `$stmtU->bind_param("dsi", $nuevo_saldo, $estado_final, $id_deuda);`
- **¿Para qué sirve?**: Vincular variables como parámetros a una sentencia SQL preparada.
- **¿Qué hace?**: Asocia variables PHP con los parámetros `?` de una consulta preparada.
- **¿Qué pasa si se daña?**: La base de datos recibirá datos incompletos o incorrectos, provocando un error en la ejecución de la consulta SQL y fallos en la operación.

### Línea 113: `$stmtU->execute();`
- **¿Para qué sirve?**: Ejecutar la sentencia SQL previamente preparada y vinculada.
- **¿Qué hace?**: Ejecuta la consulta preparada.
- **¿Qué pasa si se daña?**: La consulta no se ejecutará en la base de datos, por lo que no se guardará ni recuperará ninguna información, anulando la acción del usuario.

### Línea 114: `$stmtU->close();`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 115: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 116: `// Confirmar transacción`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 117: `$conn->commit();`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Confirma la transacción y guarda definitivamente los cambios.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 118: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 119: `$mensaje = "Abono registrado correctamente.";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$mensaje` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 120: `$tipo_alerta = "success";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 121: `$titulo_alerta = "¡Éxito!";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 122: `} catch (Exception $e) {`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Captura y maneja un error producido dentro del bloque `try`.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 123: `$conn->rollback();`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Revierte la transacción cuando ocurre un error.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 124: `$mensaje = $e->getMessage();`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$mensaje` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 125: `$tipo_alerta = "error";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 126: `$titulo_alerta = "Error de transacción";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 127: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 128: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 129: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 130: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 131: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 132: `// CÁLCULO DE MÉTRICAS Y DATOS HISTÓRICOS`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 133: `// 1. Total Compras`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 134: `$resV = $conn->query("SELECT COUNT(*) as cant, SUM(total) as gastado FROM venta WHERE id_Cliente = $id_cliente AND estado = 'Completada'");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 135: `$vInfo = $resV ? $resV->fetch_assoc() : ['cant' => 0, 'gastado' => 0.00];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene una fila del resultado como arreglo asociativo.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 136: `$totalCompras = $vInfo['gastado'] ?? 0.00;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$totalCompras` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 137: `$totalComprasCant = $vInfo['cant'];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$totalComprasCant` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 138: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 139: `// 2. Deuda Total (Suma de saldos pendientes de deudas no pagadas)`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 140: `$resD = $conn->query("SELECT SUM(saldo_Pendiente) as total_pendiente, COUNT(*) as cant FROM deuda WHERE id_Cliente = $id_cliente AND estado != 'Pagada'");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 141: `$dInfo = $resD ? $resD->fetch_assoc() : ['total_pendiente' => 0.00, 'cant' => 0];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene una fila del resultado como arreglo asociativo.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 142: `$deudaTotal = $dInfo['total_pendiente'] ?? 0.00;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$deudaTotal` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 143: `$deudaTotalCant = $dInfo['cant'];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$deudaTotalCant` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 144: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 145: `// 3. Última Compra`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 146: `$resL = $conn->query("SELECT MAX(fecha_Venta) as ultima FROM venta WHERE id_Cliente = $id_cliente AND estado = 'Completada'");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 147: `$lDate = ($resL && $lRow = $resL->fetch_assoc()) ? $lRow['ultima'] : null;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene una fila del resultado como arreglo asociativo.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 148: `$ultimaCompra = $lDate ? date('d/m/y', strtotime($lDate)) : 'N/A';`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$ultimaCompra` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 149: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 150: `// Obtener deudas registradas`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 151: `$deudas = [];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$deudas` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 152: `$resDeudas = $conn->query("SELECT * FROM deuda WHERE id_Cliente = $id_cliente ORDER BY fecha_Registro DESC");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 153: `if ($resDeudas) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 154: `while ($row = $resDeudas->fetch_assoc()) {`
- **¿Para qué sirve?**: Iterar sobre un conjunto de datos o repetir un bloque de código bajo ciertas condiciones.
- **¿Qué hace?**: Obtiene una fila del resultado como arreglo asociativo.
- **¿Qué pasa si se daña?**: Los datos no se procesarán por completo o se generará un bucle infinito que consumirá toda la memoria del servidor hasta colapsar el servicio.

### Línea 155: `$deudas[] = $row;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 156: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 157: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 158: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 159: `// Obtener lista de deudas pendientes para el dropdown de abono`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 160: `$deudasPendientes = array_filter($deudas, function($d) {`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$deudasPendientes` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 161: `return $d['estado'] !== 'Pagada';`
- **¿Para qué sirve?**: Devolver un valor desde una función o método al código llamador y finalizar su ejecución.
- **¿Qué hace?**: Devuelve un resultado al código que llamó la función y finaliza ese método.
- **¿Qué pasa si se daña?**: El código que invoca la función recibirá un valor nulo o inesperado, causando errores lógicos graves en cascada en las capas superiores.

### Línea 162: `});`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 163: `?>`
- **¿Para qué sirve?**: Finalizar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Cierra el bloque PHP.
- **¿Qué pasa si se daña?**: Si falta o está mal posicionado, puede causar errores de sintaxis (syntax error) o que el código PHP subsiguiente se imprima como texto en pantalla.

### Línea 190: `<?php`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Abre el bloque PHP que será ejecutado por el servidor.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 191: `require_once __DIR__ . '/../../configuration/load_config.php';`
- **¿Para qué sirve?**: Importar y ejecutar un archivo externo obligatorio.
- **¿Qué hace?**: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
- **¿Qué pasa si se daña?**: La aplicación fallará con un error crítico (Fatal Error: require_once failed) y se detendrá la ejecución por completo, resultando en una pantalla en blanco o error 500.

### Línea 192: `aplicarConfiguracionEstilos();`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 193: `?>`
- **¿Para qué sirve?**: Finalizar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Cierra el bloque PHP.
- **¿Qué pasa si se daña?**: Si falta o está mal posicionado, puede causar errores de sintaxis (syntax error) o que el código PHP subsiguiente se imprima como texto en pantalla.

### Línea 313: `<?php if ($deudaTotalCant > 0): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 317: `<?php else: ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 321: `<?php endif; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 370: `<?php if (count($deudas) > 0): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 371: `<?php foreach ($deudas as $d): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 372: `<?php`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Abre el bloque PHP que será ejecutado por el servidor.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 373: `$abonado = $d['valor_Inicial'] - $d['saldo_Pendiente'];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$abonado` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 374: `$estadoClase = strtolower($d['estado']);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$estadoClase` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 375: `?>`
- **¿Para qué sirve?**: Finalizar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Cierra el bloque PHP.
- **¿Qué pasa si se daña?**: Si falta o está mal posicionado, puede causar errores de sintaxis (syntax error) o que el código PHP subsiguiente se imprima como texto en pantalla.

### Línea 394: `<?php endforeach; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 395: `<?php else: ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 401: `<?php endif; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 408: `<?php if (count($deudasPendientes) > 0): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 419: `<?php foreach ($deudasPendientes as $dp): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 423: `<?php endforeach; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 445: `<?php endif; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 565: `<?php if ($mensaje !== ''): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 572: `<?php endif; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 578: `<?php`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Abre el bloque PHP que será ejecutado por el servidor.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 579: `// API interna sencilla para obtener abonos vía AJAX`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 580: `if (isset($_GET['action']) && $_GET['action'] === 'get_abonos' && isset($_GET['id_deuda'])) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Obtiene de la URL el parámetro `action`.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 581: `ob_clean(); // Limpiar buffers anteriores`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 582: `header('Content-Type: application/json');`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 583: `$id_deuda = (int)$_GET['id_deuda'];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene de la URL el parámetro `id_deuda`.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 584: `$abonos = [];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$abonos` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 585: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 586: `$stmtAbonos = $conn->prepare("SELECT fecha_Abono, valor_Abonado FROM abono WHERE id_Deuda = ? ORDER BY fecha_Abono DESC");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 587: `if ($stmtAbonos) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 588: `$stmtAbonos->bind_param("i", $id_deuda);`
- **¿Para qué sirve?**: Vincular variables como parámetros a una sentencia SQL preparada.
- **¿Qué hace?**: Asocia variables PHP con los parámetros `?` de una consulta preparada.
- **¿Qué pasa si se daña?**: La base de datos recibirá datos incompletos o incorrectos, provocando un error en la ejecución de la consulta SQL y fallos en la operación.

### Línea 589: `$stmtAbonos->execute();`
- **¿Para qué sirve?**: Ejecutar la sentencia SQL previamente preparada y vinculada.
- **¿Qué hace?**: Ejecuta la consulta preparada.
- **¿Qué pasa si se daña?**: La consulta no se ejecutará en la base de datos, por lo que no se guardará ni recuperará ninguna información, anulando la acción del usuario.

### Línea 590: `$res = $stmtAbonos->get_result();`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene el resultado devuelto por la consulta SQL.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 591: `while ($row = $res->fetch_assoc()) {`
- **¿Para qué sirve?**: Iterar sobre un conjunto de datos o repetir un bloque de código bajo ciertas condiciones.
- **¿Qué hace?**: Obtiene una fila del resultado como arreglo asociativo.
- **¿Qué pasa si se daña?**: Los datos no se procesarán por completo o se generará un bucle infinito que consumirá toda la memoria del servidor hasta colapsar el servicio.

### Línea 592: `$abonos[] = [`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 593: `'fecha' => date('d/m/Y H:i', strtotime($row['fecha_Abono'])),`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 594: `'monto' => $row['valor_Abonado']`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 595: `];`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 596: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 597: `$stmtAbonos->close();`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 598: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 599: `echo json_encode($abonos);`
- **¿Para qué sirve?**: Imprimir texto, variables o código HTML directamente en la salida de la página.
- **¿Qué hace?**: Envía contenido al navegador para mostrarlo.
- **¿Qué pasa si se daña?**: La interfaz de usuario no mostrará los elementos dinámicos, textos o estilos esperados, dejando la interfaz rota o incompleta.

### Línea 600: `exit();`
- **¿Para qué sirve?**: Detener el script inmediatamente después de un redireccionamiento u otra acción de control.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: El script continuará ejecutándose en segundo plano, consumiendo recursos o procesando lógica que no debería ejecutarse tras una redirección.

### Línea 601: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 602: `?>`
- **¿Para qué sirve?**: Finalizar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Cierra el bloque PHP.  5. Administrador - vendedores.php 
- **¿Qué pasa si se daña?**: Si falta o está mal posicionado, puede causar errores de sintaxis (syntax error) o que el código PHP subsiguiente se imprima como texto en pantalla.

