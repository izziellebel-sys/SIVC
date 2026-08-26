# Documentación Lógica: cliente_detalle.php

## Información General
- **Ruta del Archivo**: `views/vendedor/cliente_detalle.php`
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

### Línea 5: `if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {`
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

### Línea 10: `require_once __DIR__ . '/../../configuration/load_config.php';`
- **¿Para qué sirve?**: Importar y ejecutar un archivo externo obligatorio.
- **¿Qué hace?**: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
- **¿Qué pasa si se daña?**: La aplicación fallará con un error crítico (Fatal Error: require_once failed) y se detendrá la ejecución por completo, resultando en una pantalla en blanco o error 500.

### Línea 11: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 12: `$id_cliente = isset($_GET['id']) ? (int)$_GET['id'] : 0;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene de la URL el parámetro `id`.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 13: `if ($id_cliente <= 0) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 14: `header("Location: clientes.php");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 15: `exit();`
- **¿Para qué sirve?**: Detener el script inmediatamente después de un redireccionamiento u otra acción de control.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: El script continuará ejecutándose en segundo plano, consumiendo recursos o procesando lógica que no debería ejecutarse tras una redirección.

### Línea 16: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 17: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 18: `// OBTENER INFORMACIÓN DEL CLIENTE`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 19: `$resCliente = $conn->query("`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Asigna un valor a la variable `$resCliente` para utilizarlo después.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 20: `SELECT c.*, u.correo, u.telefono`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 21: `FROM cliente c`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 22: `LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 23: `WHERE c.id_Cliente = $id_cliente`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 24: `");`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 25: `$cliente = $resCliente ? $resCliente->fetch_assoc() : null;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene una fila del resultado como arreglo asociativo.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 26: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 27: `if (!$cliente) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 28: `header("Location: clientes.php");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 29: `exit();`
- **¿Para qué sirve?**: Detener el script inmediatamente después de un redireccionamiento u otra acción de control.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: El script continuará ejecutándose en segundo plano, consumiendo recursos o procesando lógica que no debería ejecutarse tras una redirección.

### Línea 30: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 31: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 32: `// CÁLCULO DE MÉTRICAS Y DATOS HISTÓRICOS`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 33: `// 1. Total Compras`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 34: `$resV = $conn->query("SELECT COUNT(*) as cant, SUM(total) as gastado FROM venta WHERE id_Cliente = $id_cliente AND estado = 'Completada'");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 35: `$vInfo = $resV ? $resV->fetch_assoc() : ['cant' => 0, 'gastado' => 0.00];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene una fila del resultado como arreglo asociativo.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 36: `$totalCompras = $vInfo['gastado'] ?? 0.00;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$totalCompras` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 37: `$totalComprasCant = $vInfo['cant'];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$totalComprasCant` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 38: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 39: `// 2. Deuda Total (Suma de saldos pendientes de deudas no pagadas)`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 40: `$resD = $conn->query("SELECT SUM(saldo_Pendiente) as total_pendiente, COUNT(*) as cant FROM deuda WHERE id_Cliente = $id_cliente AND estado != 'Pagada'");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 41: `$dInfo = $resD ? $resD->fetch_assoc() : ['total_pendiente' => 0.00, 'cant' => 0];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene una fila del resultado como arreglo asociativo.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 42: `$deudaTotal = $dInfo['total_pendiente'] ?? 0.00;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$deudaTotal` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 43: `$deudaTotalCant = $dInfo['cant'];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$deudaTotalCant` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 44: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 45: `// 3. Última Compra`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 46: `$resL = $conn->query("SELECT MAX(fecha_Venta) as ultima FROM venta WHERE id_Cliente = $id_cliente AND estado = 'Completada'");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 47: `$lDate = ($resL && $lRow = $resL->fetch_assoc()) ? $lRow['ultima'] : null;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Obtiene una fila del resultado como arreglo asociativo.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 48: `$ultimaCompra = $lDate ? date('d/m/y', strtotime($lDate)) : 'N/A';`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$ultimaCompra` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 49: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 50: `// Obtener deudas registradas`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 51: `$deudas = [];`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$deudas` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 52: `$resDeudas = $conn->query("SELECT * FROM deuda WHERE id_Cliente = $id_cliente ORDER BY fecha_Registro DESC");`
- **¿Para qué sirve?**: Ejecutar una consulta SQL en la base de datos.
- **¿Qué hace?**: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
- **¿Qué pasa si se daña?**: Las consultas fallarán, impidiendo la lectura o escritura de datos del sistema (como iniciar sesión, guardar registros, etc.), provocando errores de ejecución.

### Línea 53: `if ($resDeudas) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 54: `while ($row = $resDeudas->fetch_assoc()) {`
- **¿Para qué sirve?**: Iterar sobre un conjunto de datos o repetir un bloque de código bajo ciertas condiciones.
- **¿Qué hace?**: Obtiene una fila del resultado como arreglo asociativo.
- **¿Qué pasa si se daña?**: Los datos no se procesarán por completo o se generará un bucle infinito que consumirá toda la memoria del servidor hasta colapsar el servicio.

### Línea 55: `$deudas[] = $row;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 56: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 57: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 58: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 59: `// Obtener lista de deudas pendientes para el dropdown de abono`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 60: `$deudasPendientes = array_filter($deudas, function($d) {`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$deudasPendientes` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 61: `return $d['estado'] !== 'Pagada';`
- **¿Para qué sirve?**: Devolver un valor desde una función o método al código llamador y finalizar su ejecución.
- **¿Qué hace?**: Devuelve un resultado al código que llamó la función y finaliza ese método.
- **¿Qué pasa si se daña?**: El código que invoca la función recibirá un valor nulo o inesperado, causando errores lógicos graves en cascada en las capas superiores.

### Línea 62: `});`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 63: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 64: `// Alertas SweetAlert`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 65: `$alerta_msg = "";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 66: `$alerta_tipo = "";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 67: `$alerta_titulo = "";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 68: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 69: `if (isset($_GET['deuda_success'])) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Obtiene de la URL el parámetro `deuda_success`.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 70: `$alerta_msg = "La nueva deuda (fiado) ha sido registrada correctamente.";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 71: `$alerta_tipo = "success";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 72: `$alerta_titulo = "¡Crédito Registrado!";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 73: `} elseif (isset($_GET['deuda_error'])) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Obtiene de la URL el parámetro `deuda_error`.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 74: `$alerta_msg = "Error al intentar registrar la deuda en la base de datos.";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 75: `$alerta_tipo = "error";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 76: `$alerta_titulo = "Error";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 77: `} elseif (isset($_GET['deuda_warning'])) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Obtiene de la URL el parámetro `deuda_warning`.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 78: `$alerta_msg = "Por favor completa todos los campos del formulario de deuda.";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 79: `$alerta_tipo = "warning";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 80: `$alerta_titulo = "Datos incompletos";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 81: `} elseif (isset($_GET['abono_success'])) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Obtiene de la URL el parámetro `abono_success`.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 82: `$alerta_msg = "El abono se ha registrado correctamente y el saldo de la deuda ha sido actualizado.";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 83: `$alerta_tipo = "success";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 84: `$alerta_titulo = "¡Abono Registrado!";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 85: `} elseif (isset($_GET['abono_error'])) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Obtiene de la URL el parámetro `abono_error`.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 86: `$alerta_msg = "Error al intentar procesar el abono.";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 87: `$alerta_tipo = "error";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 88: `$alerta_titulo = "Error de Transacción";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 89: `} elseif (isset($_GET['abono_warning'])) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Obtiene de la URL el parámetro `abono_warning`.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 90: `$alerta_msg = "Por favor selecciona una deuda y escribe un monto de abono válido.";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 91: `$alerta_tipo = "warning";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 92: `$alerta_titulo = "Datos faltantes";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 93: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 94: `?>`
- **¿Para qué sirve?**: Finalizar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Cierra el bloque PHP.
- **¿Qué pasa si se daña?**: Si falta o está mal posicionado, puede causar errores de sintaxis (syntax error) o que el código PHP subsiguiente se imprima como texto en pantalla.

### Línea 123: `<?php aplicarConfiguracionEstilos(); ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 218: `<?php if ($deudaTotal > 0): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 222: `<?php else: ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 226: `<?php endif; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 312: `<?php if (count($deudas) > 0): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 313: `<?php foreach ($deudas as $d): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 314: `<?php`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Abre el bloque PHP que será ejecutado por el servidor.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 315: `$badgeClass = "";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$badgeClass` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 316: `if ($d['estado'] === 'Pagada') {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 317: `$badgeClass = "pagada";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$badgeClass` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 318: `} elseif ($d['estado'] === 'Abonada') {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición alternativa si la anterior no se cumplió.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 319: `$badgeClass = "abonada";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$badgeClass` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 320: `} else {`
- **¿Para qué sirve?**: Ejecutar un bloque de código alternativo cuando ninguna de las condiciones previas fue verdadera.
- **¿Qué hace?**: Ejecuta una alternativa cuando la condición anterior es falsa.
- **¿Qué pasa si se daña?**: El sistema no tendrá una respuesta por defecto ante fallos de validación, resultando en un estado indefinido o bloqueando la experiencia del usuario.

### Línea 321: `$badgeClass = "pendiente";`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$badgeClass` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 322: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 323: `?>`
- **¿Para qué sirve?**: Finalizar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Cierra el bloque PHP.
- **¿Qué pasa si se daña?**: Si falta o está mal posicionado, puede causar errores de sintaxis (syntax error) o que el código PHP subsiguiente se imprima como texto en pantalla.

### Línea 340: `<?php endforeach; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 341: `<?php else: ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 347: `<?php endif; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 360: `<?php if (count($deudasPendientes) > 0): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 369: `<?php foreach ($deudasPendientes as $dp): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 373: `<?php endforeach; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 392: `<?php else: ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 397: `<?php endif; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 543: `<?php if ($alerta_msg !== ''): ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

### Línea 552: `<?php endif; ?>`
- **¿Para qué sirve?**: Iniciar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.  7. Cliente - dashboard_cliente.php 
- **¿Qué pasa si se daña?**: El servidor no reconocerá el código PHP y lo mostrará como texto plano en el navegador, exponiendo la lógica del código y rompiendo por completo la aplicación.

