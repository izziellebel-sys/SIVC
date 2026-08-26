# Documentación Lógica: comprobante.php

## Información General
- **Ruta del Archivo**: `views/cliente/comprobante.php`
- **Tipo**: Archivo de código PHP (explicación lógica)

## Estructura del Código
Este archivo contiene la lógica para comprobante.php. A continuación, se detalla el comportamiento de cada línea.

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

### Línea 4: `// Protección básica de acceso`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 5: `if (!isset($_SESSION['usuario'])) {`
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

### Línea 12: `$id_Venta = isset($_GET['id']) ? intval($_GET['id']) : 0;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene de la URL el parámetro `id`.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 13: `if ($id_Venta <= 0) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 14: `die("ID de venta inválido.");`
- **¿Para qué sirve?**: Terminar la ejecución del script inmediatamente mostrando un mensaje de error.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: La ejecución continuará a pesar de haber errores críticos, lo que provocará fallos en cascada en las líneas posteriores.

### Línea 15: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 16: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 17: `// Obtener datos de la venta y del cliente para validar pertenencia`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 18: `$query = "SELECT v.fecha_Venta, v.subtotal, v.descuento, v.total, v.metodo_Pago, v.estado,`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 19: `c.nombre AS cliente_nombre, c.apellido AS cliente_apellido, c.numero_Documento, c.telefono,`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 20: `u.numero_Documento AS user_documento, u.id_Rol`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 21: `FROM venta v`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 22: `JOIN cliente c ON v.id_Cliente = c.id_Cliente`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 23: `LEFT JOIN usuarios u ON u.id_Usuario = ?`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 24: `WHERE v.id_Venta = ?";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 25: `$stmt = $conn->prepare($query);`
- **¿Para qué sirve?**: Preparar una sentencia SQL para su ejecución segura.
- **¿Qué hace?**: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
- **¿Qué pasa si se daña?**: La consulta no se preparará y causará un error fatal al intentar ejecutarla o vincular parámetros en las líneas siguientes.

### Línea 26: `$id_Usuario = $_SESSION['id_Usuario'];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 27: `$stmt->bind_param("ii", $id_Usuario, $id_Venta);`
- **¿Para qué sirve?**: Vincular variables como parámetros a una sentencia SQL preparada.
- **¿Qué hace?**: Asocia variables PHP con los parámetros `?` de una consulta preparada.
- **¿Qué pasa si se daña?**: La base de datos recibirá datos incompletos o incorrectos, provocando un error en la ejecución de la consulta SQL y fallos en la operación.

### Línea 28: `$stmt->execute();`
- **¿Para qué sirve?**: Ejecutar la sentencia SQL previamente preparada y vinculada.
- **¿Qué hace?**: Ejecuta la consulta preparada.
- **¿Qué pasa si se daña?**: La consulta no se ejecutará en la base de datos, por lo que no se guardará ni recuperará ninguna información, anulando la acción del usuario.

### Línea 29: `$res = $stmt->get_result();`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene el resultado devuelto por la consulta SQL.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 30: `$venta = $res->fetch_assoc();`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene una fila del resultado como arreglo asociativo.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 31: `$stmt->close();`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 32: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 33: `if (!$venta) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 34: `die("Comprobante no encontrado.");`
- **¿Para qué sirve?**: Terminar la ejecución del script inmediatamente mostrando un mensaje de error.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: La ejecución continuará a pesar de haber errores críticos, lo que provocará fallos en cascada en las líneas posteriores.

### Línea 35: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 36: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 37: `// Validar que el cliente tenga permiso de ver este comprobante:`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 38: `// Debe ser el propio cliente (su numero_Documento en usuarios coincide con el del cliente) o ser Admin/Vendedor (id_Rol 1 o 2).`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 39: `if ($venta['id_Rol'] == '3' && $venta['user_documento'] !== $venta['numero_Documento']) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 40: `die("Acceso denegado: No tiene permisos para visualizar este comprobante.");`
- **¿Para qué sirve?**: Terminar la ejecución del script inmediatamente mostrando un mensaje de error.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: La ejecución continuará a pesar de haber errores críticos, lo que provocará fallos en cascada en las líneas posteriores.

### Línea 41: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 42: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 43: `// Obtener detalles de productos`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 44: `$detalles = [];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$detalles` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 45: `$query = "SELECT d.cantidad, d.precio_Unitario, d.subtotal, p.nombre AS producto_nombre, p.codigo_Producto`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 46: `FROM detalle_venta d`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 47: `JOIN producto p ON d.id_Producto = p.id_Producto`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 48: `WHERE d.id_Venta = ?";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 49: `$stmt = $conn->prepare($query);`
- **¿Para qué sirve?**: Preparar una sentencia SQL para su ejecución segura.
- **¿Qué hace?**: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
- **¿Qué pasa si se daña?**: La consulta no se preparará y causará un error fatal al intentar ejecutarla o vincular parámetros en las líneas siguientes.

### Línea 50: `$stmt->bind_param("i", $id_Venta);`
- **¿Para qué sirve?**: Vincular variables como parámetros a una sentencia SQL preparada.
- **¿Qué hace?**: Asocia variables PHP con los parámetros `?` de una consulta preparada.
- **¿Qué pasa si se daña?**: La base de datos recibirá datos incompletos o incorrectos, provocando un error en la ejecución de la consulta SQL y fallos en la operación.

### Línea 51: `$stmt->execute();`
- **¿Para qué sirve?**: Ejecutar la sentencia SQL previamente preparada y vinculada.
- **¿Qué hace?**: Ejecuta la consulta preparada.
- **¿Qué pasa si se daña?**: La consulta no se ejecutará en la base de datos, por lo que no se guardará ni recuperará ninguna información, anulando la acción del usuario.

### Línea 52: `$res = $stmt->get_result();`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene el resultado devuelto por la consulta SQL.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 53: `while ($row = $res->fetch_assoc()) {`
- **¿Para qué sirve?**: Iterar sobre un conjunto de datos o repetir un bloque de código bajo ciertas condiciones.
- **¿Qué hace?**: Obtiene una fila del resultado como arreglo asociativo.
- **¿Qué pasa si se daña?**: Los datos no se procesarán por completo o se generará un bucle infinito que consumirá toda la memoria del servidor hasta colapsar el servicio.

### Línea 54: `$detalles[] = $row;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 55: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 56: `$stmt->close();`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 57: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 58: `// Obtener datos del comprobante (número y fecha de generación si existe)`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 59: `$query = "SELECT numero_Comprobante, fecha_Generacion FROM comprobante_venta WHERE id_Venta = ?";`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 60: `$stmt = $conn->prepare($query);`
- **¿Para qué sirve?**: Preparar una sentencia SQL para su ejecución segura.
- **¿Qué hace?**: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
- **¿Qué pasa si se daña?**: La consulta no se preparará y causará un error fatal al intentar ejecutarla o vincular parámetros en las líneas siguientes.

### Línea 61: `$stmt->bind_param("i", $id_Venta);`
- **¿Para qué sirve?**: Vincular variables como parámetros a una sentencia SQL preparada.
- **¿Qué hace?**: Asocia variables PHP con los parámetros `?` de una consulta preparada.
- **¿Qué pasa si se daña?**: La base de datos recibirá datos incompletos o incorrectos, provocando un error en la ejecución de la consulta SQL y fallos en la operación.

### Línea 62: `$stmt->execute();`
- **¿Para qué sirve?**: Ejecutar la sentencia SQL previamente preparada y vinculada.
- **¿Qué hace?**: Ejecuta la consulta preparada.
- **¿Qué pasa si se daña?**: La consulta no se ejecutará en la base de datos, por lo que no se guardará ni recuperará ninguna información, anulando la acción del usuario.

### Línea 63: `$res = $stmt->get_result();`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene el resultado devuelto por la consulta SQL.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 64: `$comprobante = $res->fetch_assoc();`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene una fila del resultado como arreglo asociativo.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 65: `$stmt->close();`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 66: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 67: `$nroComprobante = $comprobante['numero_Comprobante'] ?? sprintf("FAC-%06d", $id_Venta);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$nroComprobante` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 68: `$fechaEmision = $comprobante['fecha_Generacion'] ?? $venta['fecha_Venta'];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$fechaEmision` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 69: `?>`
- **¿Para qué sirve?**: Finalizar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Cierra el bloque PHP.
- **¿Qué pasa si se daña?**: Si falta o está mal posicionado, puede causar errores de sintaxis (syntax error) o que el código PHP subsiguiente se imprima como texto en pantalla.

### Línea 306: `<?php foreach ($detalles as $det): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 316: `<?php endforeach; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 325: `<?php if ($venta['descuento'] > 0): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 330: `<?php endif; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.  8. Cierre de sesión - logout.php 
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

