# Documentación Lógica: register_controller.php

## Información General
- **Ruta del Archivo**: `controllers/auth/register_controller.php`
- **Tipo**: Archivo de código PHP (explicación lógica)

## Estructura del Código
Este archivo contiene la lógica para register_controller.php. A continuación, se detalla el comportamiento de cada línea.

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

### Línea 4: `require_once __DIR__ . '/../../models/usuario_model.php';`
- **¿Para qué sirve?**: Importar y ejecutar un archivo externo obligatorio.
- **¿Qué hace?**: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
- **¿Qué pasa si se daña?**: La aplicación fallará con un error crítico (Fatal Error: require_once failed) y se detendrá la ejecución por completo, resultando en una pantalla en blanco o error 500.

### Línea 5: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 6: `function alerta($icono, $titulo, $mensaje, $ruta)`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Declara la función o método `alerta`; las líneas siguientes indican cómo realiza esa operación.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 7: `{`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 8: `echo "`
- **¿Para qué sirve?**: Imprimir texto, variables o código HTML directamente en la salida de la página.
- **¿Qué hace?**: Envía contenido al navegador para mostrarlo.
- **¿Qué pasa si se daña?**: La interfaz de usuario no mostrará los elementos dinámicos, textos o estilos esperados, dejando la interfaz rota o incompleta.

### Línea 9: `<!DOCTYPE html>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 10: `<html lang='es'>`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 11: `<head>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 12: `<meta charset='UTF-8'>`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 13: `<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 14: `<style>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 15: `body {`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 16: `font-family: 'Montserrat', sans-serif;`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 17: `background-color: #f7dbe4;`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 18: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 19: `</style>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 20: `</head>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 21: `<body>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 22: `<script>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 23: `Swal.fire({`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 24: `icon: '$icono',`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 25: `title: '$titulo',`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 26: `text: '$mensaje',`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 27: `confirmButtonColor: '#6f2dbd'`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 28: `}).then(() => {`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 29: `window.location.href = '$ruta';`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 30: `});`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 31: `</script>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 32: `</body>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 33: `</html>";`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 34: `exit();`
- **¿Para qué sirve?**: Detener el script inmediatamente después de un redireccionamiento u otra acción de control.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: El script continuará ejecutándose en segundo plano, consumiendo recursos o procesando lógica que no debería ejecutarse tras una redirección.

### Línea 35: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 36: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 37: `if ($_SERVER["REQUEST_METHOD"] == "POST") {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 38: `$nombre = trim($_POST["nombre"] ?? '');`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `nombre` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 39: `$apellido = trim($_POST["apellido"] ?? '');`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `apellido` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 40: `$documento = trim($_POST["documento"] ?? '');`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `documento` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 41: `$telefono = trim($_POST["telefono"] ?? '');`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `telefono` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 42: `$usuario_input = trim($_POST["usuario"] ?? '');`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `usuario` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 43: `$correo = trim($_POST["correo"] ?? '');`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `correo` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 44: `$password = $_POST["password"] ?? '';`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `password` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 45: `$confirmar = $_POST["confirmar"] ?? '';`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Recibe mediante POST el dato `confirmar` enviado por el formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 46: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 47: `// Validar que todos los campos requeridos estén completos`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 48: `if (empty($nombre) || empty($apellido) || empty($documento) || empty($usuario_input) || empty($correo) || empty($password) || empty($confirmar)) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 49: `alerta(`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 50: `"warning",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 51: `"Campos incompletos",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 52: `"Por favor completa todos los campos del formulario.",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 53: `"../../views/register.php"`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 54: `);`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 55: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 56: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 57: `// Validar contraseñas coincidentes`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 58: `if ($password !== $confirmar) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 59: `alerta(`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 60: `"error",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 61: `"Contraseñas no coinciden",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 62: `"La contraseña y su confirmación deben ser idénticas.",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 63: `"../../views/register.php"`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 64: `);`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 65: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 66: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 67: `$usuarioModel = new Usuario();`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Crea una instancia de la clase `Usuario` para utilizar sus métodos.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 68: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 69: `// Validar que el nombre de usuario no exista`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 70: `if ($usuarioModel->usuarioExiste($usuario_input)) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 71: `alerta(`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 72: `"error",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 73: `"Usuario ya registrado",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 74: `"El nombre de usuario '$usuario_input' ya se encuentra registrado.",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 75: `"../../views/register.php"`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 76: `);`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 77: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 78: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 79: `// Validar que el correo no exista`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 80: `if ($usuarioModel->correoExiste($correo)) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 81: `alerta(`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 82: `"error",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 83: `"Correo ya registrado",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 84: `"El correo electrónico '$correo' ya se encuentra registrado.",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 85: `"../../views/register.php"`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 86: `);`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 87: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 88: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 89: `// Preparar datos para registro`
- **¿Para qué sirve?**: Documentar y comentar el código para explicar su lógica.
- **¿Qué hace?**: Comentario: explica el código y no se ejecuta.
- **¿Qué pasa si se daña?**: No afecta el funcionamiento del sistema, solo dificulta la comprensión de la lógica para otros desarrolladores.

### Línea 90: `$datos = [`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Asigna un valor a la variable `$datos` para utilizarlo después.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 91: `"nombre" => $nombre,`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 92: `"apellido" => $apellido,`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 93: `"documento" => $documento,`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 94: `"telefono" => $telefono,`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 95: `"usuario" => $usuario_input,`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 96: `"correo" => $correo,`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 97: `"password" => $password,`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 98: `"rol" => "Cliente", // Rol inicial predeterminado`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 99: `"estado" => "Activo"`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 100: `];`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 101: *(Línea vacía)*
- **¿Para qué sirve?**: Separación visual del código.
- **¿Qué hace?**: Separa visualmente bloques de código.
- **¿Qué pasa si se daña?**: No causa ningún error funcional; el archivo sigue funcionando igual, pero se reduce la legibilidad del código fuente.

### Línea 102: `if ($usuarioModel->registrar($datos)) {`
- **¿Para qué sirve?**: Evaluar una condición lógica para ramificar el flujo del programa.
- **¿Qué hace?**: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
- **¿Qué pasa si se daña?**: Se alterará la lógica de control, ejecutando bloques incorrectos o saltándose validaciones de seguridad cruciales (como permisos o credenciales correctas).

### Línea 103: `alerta(`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 104: `"success",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 105: `"¡Registro Exitoso!",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 106: `"Tu cuenta ha sido creada con éxito. Ahora puedes iniciar sesión.",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 107: `"../../views/login.php"`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 108: `);`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 109: `} else {`
- **¿Para qué sirve?**: Ejecutar un bloque de código alternativo cuando ninguna de las condiciones previas fue verdadera.
- **¿Qué hace?**: Ejecuta una alternativa cuando la condición anterior es falsa.
- **¿Qué pasa si se daña?**: El sistema no tendrá una respuesta por defecto ante fallos de validación, resultando en un estado indefinido o bloqueando la experiencia del usuario.

### Línea 110: `alerta(`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 111: `"error",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 112: `"Error de registro",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 113: `"Hubo un problema al procesar el registro en la base de datos. Inténtalo de nuevo.",`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 114: `"../../views/register.php"`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa la estructura o lógica del bloque al que pertenece.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 115: `);`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Completa una instrucción PHP dentro de la lógica actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 116: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 117: `} else {`
- **¿Para qué sirve?**: Ejecutar un bloque de código alternativo cuando ninguna de las condiciones previas fue verdadera.
- **¿Qué hace?**: Ejecuta una alternativa cuando la condición anterior es falsa.
- **¿Qué pasa si se daña?**: El sistema no tendrá una respuesta por defecto ante fallos de validación, resultando en un estado indefinido o bloqueando la experiencia del usuario.

### Línea 118: `header("Location: ../../views/register.php");`
- **¿Para qué sirve?**: Enviar un encabezado HTTP crudo al navegador, comúnmente para redireccionamiento.
- **¿Qué hace?**: Redirige al usuario o envía una cabecera HTTP.
- **¿Qué pasa si se daña?**: El usuario no será redirigido y se quedará en una página en blanco o con comportamiento errático. Si se envía salida antes de esta línea, PHP generará un error de 'Headers already sent'.

### Línea 119: `exit();`
- **¿Para qué sirve?**: Detener el script inmediatamente después de un redireccionamiento u otra acción de control.
- **¿Qué hace?**: Detiene la ejecución del archivo.
- **¿Qué pasa si se daña?**: El script continuará ejecutándose en segundo plano, consumiendo recursos o procesando lógica que no debería ejecutarse tras una redirección.

### Línea 120: `}`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Abre o cierra el bloque de instrucciones actual.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 121: `?>`
- **¿Para qué sirve?**: Finalizar la ejecución del intérprete de PHP.
- **¿Qué hace?**: Cierra el bloque PHP.  5. Administrador - dashboar_admi.php 
- **¿Qué pasa si se daña?**: Si falta o está mal posicionado, puede causar errores de sintaxis (syntax error) o que el código PHP subsiguiente se imprima como texto en pantalla.

