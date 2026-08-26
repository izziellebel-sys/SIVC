# Documentación Lógica: vendedor_controller.php

## Información General
- **Ruta del Archivo**: `controllers/vendedor_controller.php`
- **Tipo**: Archivo de código PHP (explicación lógica)

## Estructura del Código
Este archivo contiene la lógica para vendedor_controller.php. A continuación, se detalla el comportamiento de cada línea.

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

### Línea 6: `header("Location: ../views/login.php");`
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

### Línea 10: `require_once __DIR__ . '/../models/vendedor_model.php';`
- **¿Para qué sirve?**: Importar y ejecutar un archivo externo obligatorio.
- **¿Qué hace?**: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
- **¿Qué pasa si se daña?**: La aplicación fallará con un error crítico (Fatal Error: require_once failed) y se detendrá la ejecución por completo, resultando en una pantalla en blanco o error 500.

### Línea 11: `$model = new VendedorModel();`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Crea una instancia de la clase `VendedorModel` para utilizar sus métodos.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 12: `$id_usuario = $_SESSION['id_Usuario'] ?? 0;`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 13: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 14: `if ($_SERVER["REQUEST_METHOD"] == "POST" && $id_usuario > 0) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 15: `$action = $_POST['action'] ?? '';`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `action` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 16: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 17: `if ($action === 'registrar_venta') {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 18: `$id_cliente = (int)($_POST['id_cliente'] ?? 0);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `id_cliente` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 19: `$metodo_pago = trim($_POST['metodo_pago'] ?? 'Efectivo');`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `metodo_pago` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 20: `$productos_json = $_POST['productos_data'] ?? '[]';`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `productos_data` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 21: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 22: `$cart_items = json_decode($productos_json, true);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$cart_items` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 23: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 24: `if ($id_cliente > 0 && !empty($cart_items)) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 25: `$id_venta = $model->registrarVenta($id_cliente, $metodo_pago, $cart_items, $id_usuario);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$id_venta` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 26: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 27: `if ($id_venta) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 28: `header("Location: ../views/vendedor/ventas.php?success=1&venta_id=" . $id_venta);`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 29: `} else {`
- **¿Para qué sirve?**: Ejecutar un bloque de código alternativo cuando ninguna de las condiciones previas fue verdadera.
- **¿Qué hace?**: Ejecuta una alternativa cuando la condición anterior es falsa.
- **¿Qué pasa si se daña?**: El sistema no tendrá una respuesta por defecto ante fallos de validación, resultando en un estado indefinido o bloqueando la experiencia del usuario.

### Línea 30: `header("Location: ../views/vendedor/ventas.php?error=1");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 31: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 32: `} else {`
- **¿Para qué sirve?**: Ejecutar un bloque de código alternativo cuando ninguna de las condiciones previas fue verdadera.
- **¿Qué hace?**: Ejecuta una alternativa cuando la condición anterior es falsa.
- **¿Qué pasa si se daña?**: El sistema no tendrá una respuesta por defecto ante fallos de validación, resultando en un estado indefinido o bloqueando la experiencia del usuario.

### Línea 33: `header("Location: ../views/vendedor/ventas.php?warning=1");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 34: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 35: `exit();`
- **¿Para qué sirve?**: Detener el script inmediatamente después de un redireccionamiento u otra acción de control.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: El script continuará ejecutándose en segundo plano, consumiendo recursos o procesando lógica que no debería ejecutarse tras una redirección.

### Línea 36: `} elseif ($action === 'registrar_deuda') {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición alternativa si la anterior no se cumplió.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 37: `$id_cliente = (int)($_POST['id_cliente'] ?? 0);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `id_cliente` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 38: `$concepto = trim($_POST['concepto'] ?? '');`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `concepto` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 39: `$valor = (float)($_POST['valor'] ?? 0.00);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `valor` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 40: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 41: `if ($id_cliente > 0 && $concepto !== '' && $valor > 0) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 42: `$success = $model->registrarDeuda($id_cliente, $concepto, $valor, $id_usuario);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$success` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 43: `if ($success) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 44: `header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&deuda_success=1");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 45: `} else {`
- **¿Para qué sirve?**: Ejecutar un bloque de código alternativo cuando ninguna de las condiciones previas fue verdadera.
- **¿Qué hace?**: Ejecuta una alternativa cuando la condición anterior es falsa.
- **¿Qué pasa si se daña?**: El sistema no tendrá una respuesta por defecto ante fallos de validación, resultando en un estado indefinido o bloqueando la experiencia del usuario.

### Línea 46: `header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&deuda_error=1");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 47: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 48: `} else {`
- **¿Para qué sirve?**: Ejecutar un bloque de código alternativo cuando ninguna de las condiciones previas fue verdadera.
- **¿Qué hace?**: Ejecuta una alternativa cuando la condición anterior es falsa.
- **¿Qué pasa si se daña?**: El sistema no tendrá una respuesta por defecto ante fallos de validación, resultando en un estado indefinido o bloqueando la experiencia del usuario.

### Línea 49: `header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&deuda_warning=1");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 50: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 51: `exit();`
- **¿Para qué sirve?**: Detener el script inmediatamente después de un redireccionamiento u otra acción de control.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: El script continuará ejecutándose en segundo plano, consumiendo recursos o procesando lógica que no debería ejecutarse tras una redirección.

### Línea 52: `} elseif ($action === 'registrar_abono') {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición alternativa si la anterior no se cumplió.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 53: `$id_cliente = (int)($_POST['id_cliente'] ?? 0);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `id_cliente` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 54: `$id_deuda = (int)($_POST['id_deuda'] ?? 0);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `id_deuda` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 55: `$monto = (float)($_POST['monto'] ?? 0.00);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `monto` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 56: `$concepto = trim($_POST['concepto'] ?? 'Abono Parcial');`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `concepto` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 57: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 58: `if ($id_cliente > 0 && $id_deuda > 0 && $monto > 0) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 59: `$success = $model->registrarAbono($id_deuda, $monto, $concepto, $id_usuario, $id_cliente);`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$success` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 60: `if ($success) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 61: `header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&abono_success=1");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 62: `} else {`
- **¿Para qué sirve?**: Ejecutar un bloque de código alternativo cuando ninguna de las condiciones previas fue verdadera.
- **¿Qué hace?**: Ejecuta una alternativa cuando la condición anterior es falsa.
- **¿Qué pasa si se daña?**: El sistema no tendrá una respuesta por defecto ante fallos de validación, resultando en un estado indefinido o bloqueando la experiencia del usuario.

### Línea 63: `header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&abono_error=1");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 64: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 65: `} else {`
- **¿Para qué sirve?**: Ejecutar un bloque de código alternativo cuando ninguna de las condiciones previas fue verdadera.
- **¿Qué hace?**: Ejecuta una alternativa cuando la condición anterior es falsa.
- **¿Qué pasa si se daña?**: El sistema no tendrá una respuesta por defecto ante fallos de validación, resultando en un estado indefinido o bloqueando la experiencia del usuario.

### Línea 66: `header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&abono_warning=1");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 67: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 68: `exit();`
- **¿Para qué sirve?**: Detener el script inmediatamente después de un redireccionamiento u otra acción de control.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: El script continuará ejecutándose en segundo plano, consumiendo recursos o procesando lógica que no debería ejecutarse tras una redirección.

### Línea 69: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 70: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 71: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 72: `header("Location: ../views/vendedor/dashboard_vendedor.php");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 73: `exit();`
- **¿Para qué sirve?**: Detener el script inmediatamente después de un redireccionamiento u otra acción de control.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: El script continuará ejecutándose en segundo plano, consumiendo recursos o procesando lógica que no debería ejecutarse tras una redirección.

### Línea 74: `?>`
- **¿Para qué sirve?**: Finalizar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Cierra el bloque PHP.  6.1 Vendedor - modelo 
- **¿Qué pasa si se daña?**: Si falta o está mal posicionado, puede causar errores de sintaxis (syntax error) o que el código PHP subsiguiente se imprima como texto en pantalla.

