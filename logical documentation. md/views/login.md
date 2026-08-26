# Documentación Lógica: login.php

## Información General
- **Ruta del Archivo**: `views/login.php`
- **Tipo**: Archivo de código PHP (explicación lógica)

## Estructura del Código
Este archivo contiene la lógica para login.php. A continuación, se detalla el comportamiento de cada línea.

## Explicación Línea por Línea

### Línea 22: `<form action="../controllers/auth/login_controler.php" method="POST">`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Abre el formulario. `action` indica a qué controlador se envían los datos y `method="POST"` indica que PHP los recibirá con `$_POST`.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 23: `<label>Usuario o Correo electrónico</label>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Muestra la etiqueta que indica al usuario qué dato debe escribir.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 24: `<div class="input-box">`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Estructura visual del formulario o elemento que agrupa sus campos.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 25: `<i class="fa-regular fa-envelope"></i>`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Estructura visual del formulario o elemento que agrupa sus campos.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 26: `<input type="text" name="usuario" placeholder="Ingresa tu usuario o correo" required>`
- **¿Para qué sirve?**: Importar y ejecutar un archivo externo obligatorio.
- **¿Qué hace?**: Crea un campo de tipo `text` con `name="usuario"`; ese nombre será la clave recibida por PHP.
- **¿Qué pasa si se daña?**: La aplicación fallará con un error crítico (Fatal Error: require_once failed) y se detendrá la ejecución por completo, resultando en una pantalla en blanco o error 500.

### Línea 27: `</div>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Estructura visual del formulario o elemento que agrupa sus campos.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 29: `<label>Contraseña</label>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Muestra la etiqueta que indica al usuario qué dato debe escribir.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 31: `<div class="input-box">`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Estructura visual del formulario o elemento que agrupa sus campos.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 32: `<i class="fa-solid fa-lock"></i>`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Estructura visual del formulario o elemento que agrupa sus campos.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 33: `<input type="password" name="password" id="password" placeholder="********************" required>`
- **¿Para qué sirve?**: Importar y ejecutar un archivo externo obligatorio.
- **¿Qué hace?**: Crea un campo de tipo `password` con `name="password"`; ese nombre será la clave recibida por PHP.
- **¿Qué pasa si se daña?**: La aplicación fallará con un error crítico (Fatal Error: require_once failed) y se detendrá la ejecución por completo, resultando en una pantalla en blanco o error 500.

### Línea 34: `<i class="fa-regular fa-eye-slash" id="togglePassword"></i>`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Estructura visual del formulario o elemento que agrupa sus campos.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 35: `</div>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Estructura visual del formulario o elemento que agrupa sus campos.
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

### Línea 37: `<button type="submit">ENTRA</button>`
- **¿Para qué sirve?**: Asignar un valor o una expresión a una variable.
- **¿Qué hace?**: Crea el botón que permite enviar o ejecutar la acción del formulario.
- **¿Qué pasa si se daña?**: La variable no se definirá o tendrá un valor incorrecto, lo que causará errores de tipo 'Undefined variable' o lógica rota más adelante.

### Línea 38: `</form>`
- **¿Para qué sirve?**: Realizar una operación o instrucción dentro de la lógica del archivo.
- **¿Qué hace?**: Cierra el formulario.  3.1 Login - controlador 
- **¿Qué pasa si se daña?**: Puede causar errores sintácticos de PHP (parse error) que impedirán la carga del archivo por completo, o comportamientos inesperados en la aplicación.

