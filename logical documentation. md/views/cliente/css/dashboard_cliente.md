# Documentación Lógica: dashboard_cliente.css

## Información General
- **Ruta del Archivo**: `views/cliente/css/dashboard_cliente.css`
- **Tipo**: Hoja de Estilos CSS

## Estructura del Código
Este archivo contiene las directivas y lógica de dashboard_cliente.css. A continuación, se detalla el comportamiento de cada línea.

## Explicación Línea por Línea

### Línea 1: `/* ==========================================================================`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 2: `   DASHBOARD CLIENTE CSS - SIVC`
- **¿Para qué sirve?**: Definir directivas o reglas CSS.
- **¿Qué hace?**: Configura valores de renderizado para los elementos de la página.
- **¿Qué pasa si se daña?**: El navegador podría ignorar el estilo, provocando deformaciones visuales en el diseño.

### Línea 3: `   ========================================================================== */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 4: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 5: `:root {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `:root`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 6: `    --primary-color: #6f2dbd;`
- **¿Para qué sirve?**: Definir la coloración ('--primary-color') con el valor `#6f2dbd`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#6f2dbd`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 7: `    --primary-light: #f3e5f5;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--primary-light`.
- **¿Qué hace?**: Aplica la propiedad visual `--primary-light` con el valor `#f3e5f5` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--primary-light`, visualizándose con las directivas por defecto del navegador web.

### Línea 8: `    --primary-gradient: linear-gradient(135deg, #b85ce8, #8f7cff);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--primary-gradient`.
- **¿Qué hace?**: Aplica la propiedad visual `--primary-gradient` con el valor `linear-gradient(135deg, #b85ce8, #8f7cff)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--primary-gradient`, visualizándose con las directivas por defecto del navegador web.

### Línea 9: `    --secondary-color: #3f37c9;`
- **¿Para qué sirve?**: Definir la coloración ('--secondary-color') con el valor `#3f37c9`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#3f37c9`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 10: `    --text-color: #2b2b2b;`
- **¿Para qué sirve?**: Definir la coloración ('--text-color') con el valor `#2b2b2b`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#2b2b2b`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 11: `    --text-muted: #777777;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--text-muted`.
- **¿Qué hace?**: Aplica la propiedad visual `--text-muted` con el valor `#777777` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--text-muted`, visualizándose con las directivas por defecto del navegador web.

### Línea 12: `    --bg-color: #f7f9fc;`
- **¿Para qué sirve?**: Definir la coloración ('--bg-color') con el valor `#f7f9fc`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#f7f9fc`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 13: `    --card-bg: #ffffff;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--card-bg`.
- **¿Qué hace?**: Aplica la propiedad visual `--card-bg` con el valor `#ffffff` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--card-bg`, visualizándose con las directivas por defecto del navegador web.

### Línea 14: `    --sidebar-bg: #1e1b2e;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--sidebar-bg`.
- **¿Qué hace?**: Aplica la propiedad visual `--sidebar-bg` con el valor `#1e1b2e` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--sidebar-bg`, visualizándose con las directivas por defecto del navegador web.

### Línea 15: `    --sidebar-hover: rgba(255, 255, 255, 0.08);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--sidebar-hover`.
- **¿Qué hace?**: Aplica la propiedad visual `--sidebar-hover` con el valor `rgba(255, 255, 255, 0.08)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--sidebar-hover`, visualizándose con las directivas por defecto del navegador web.

### Línea 16: `    --sidebar-active: #b85ce8;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--sidebar-active`.
- **¿Qué hace?**: Aplica la propiedad visual `--sidebar-active` con el valor `#b85ce8` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--sidebar-active`, visualizándose con las directivas por defecto del navegador web.

### Línea 17: `    --border-color: #eef0f5;`
- **¿Para qué sirve?**: Definir la coloración ('--border-color') con el valor `#eef0f5`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#eef0f5`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 18: `    --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.03);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--shadow-sm`.
- **¿Qué hace?**: Aplica la propiedad visual `--shadow-sm` con el valor `0 4px 6px rgba(0, 0, 0, 0.03)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--shadow-sm`, visualizándose con las directivas por defecto del navegador web.

### Línea 19: `    --shadow-md: 0 8px 24px rgba(111, 45, 189, 0.08);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--shadow-md`.
- **¿Qué hace?**: Aplica la propiedad visual `--shadow-md` con el valor `0 8px 24px rgba(111, 45, 189, 0.08)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--shadow-md`, visualizándose con las directivas por defecto del navegador web.

### Línea 20: `    --shadow-lg: 0 16px 40px rgba(0, 0, 0, 0.12);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--shadow-lg`.
- **¿Qué hace?**: Aplica la propiedad visual `--shadow-lg` con el valor `0 16px 40px rgba(0, 0, 0, 0.12)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--shadow-lg`, visualizándose con las directivas por defecto del navegador web.

### Línea 21: `    --radius-sm: 8px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--radius-sm`.
- **¿Qué hace?**: Aplica la propiedad visual `--radius-sm` con el valor `8px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--radius-sm`, visualizándose con las directivas por defecto del navegador web.

### Línea 22: `    --radius-md: 16px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--radius-md`.
- **¿Qué hace?**: Aplica la propiedad visual `--radius-md` con el valor `16px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--radius-md`, visualizándose con las directivas por defecto del navegador web.

### Línea 23: `    --radius-lg: 24px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--radius-lg`.
- **¿Qué hace?**: Aplica la propiedad visual `--radius-lg` con el valor `24px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--radius-lg`, visualizándose con las directivas por defecto del navegador web.

### Línea 24: `    --radius-xl: 30px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--radius-xl`.
- **¿Qué hace?**: Aplica la propiedad visual `--radius-xl` con el valor `30px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--radius-xl`, visualizándose con las directivas por defecto del navegador web.

### Línea 25: `    --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--transition`.
- **¿Qué hace?**: Aplica la propiedad visual `--transition` con el valor `all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 26: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 27: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 28: `/* GENERAL LAYOUT */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 29: `body {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `body`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 30: `    background-color: var(--bg-color);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--bg-color)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--bg-color)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 31: `    color: var(--text-color);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-color)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-color)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 32: `    font-family: 'Montserrat', sans-serif;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-family`) en `'Montserrat', sans-serif`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 33: `    margin: 0;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin`) con el valor `0`.
- **¿Qué hace?**: Aplica un espaciado físico de `0` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 34: `    padding: 0;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `0`.
- **¿Qué hace?**: Aplica un espaciado físico de `0` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 35: `    min-height: 100vh;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`min-height`) en `100vh`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 36: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 37: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 38: `.dashboard-container {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.dashboard-container`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 39: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 40: `    min-height: 100vh;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`min-height`) en `100vh`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 41: `    position: relative;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `position`.
- **¿Qué hace?**: Aplica la propiedad visual `position` con el valor `relative` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `position`, visualizándose con las directivas por defecto del navegador web.

### Línea 42: `    overflow-x: hidden;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `overflow-x`.
- **¿Qué hace?**: Aplica la propiedad visual `overflow-x` con el valor `hidden` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `overflow-x`, visualizándose con las directivas por defecto del navegador web.

### Línea 43: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 44: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 45: `/* SIDEBAR STYLES */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 46: `.sidebar {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.sidebar`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 47: `    width: 280px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `280px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 48: `    background-color: var(--sidebar-bg);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--sidebar-bg)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--sidebar-bg)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 49: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 50: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 51: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 52: `    height: 100vh;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `100vh`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 53: `    position: fixed;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `position`.
- **¿Qué hace?**: Aplica la propiedad visual `position` con el valor `fixed` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `position`, visualizándose con las directivas por defecto del navegador web.

### Línea 54: `    top: 0;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `top`.
- **¿Qué hace?**: Aplica la propiedad visual `top` con el valor `0` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `top`, visualizándose con las directivas por defecto del navegador web.

### Línea 55: `    left: 0;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `left`.
- **¿Qué hace?**: Aplica la propiedad visual `left` con el valor `0` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `left`, visualizándose con las directivas por defecto del navegador web.

### Línea 56: `    z-index: 100;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `z-index`.
- **¿Qué hace?**: Aplica la propiedad visual `z-index` con el valor `100` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `z-index`, visualizándose con las directivas por defecto del navegador web.

### Línea 57: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 58: `    border-right: 1px solid rgba(255, 255, 255, 0.05);`
- **¿Para qué sirve?**: Definir el borde (`border-right`) con el valor `1px solid rgba(255, 255, 255, 0.05)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 59: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 60: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 61: `.sidebar-header {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.sidebar-header`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 62: `    padding: 30px 24px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `30px 24px`.
- **¿Qué hace?**: Aplica un espaciado físico de `30px 24px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 63: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 64: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 65: `    justify-content: space-between;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 66: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 67: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 68: `.sidebar-header .brand {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.sidebar-header .brand`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 69: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 70: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 71: `    gap: 12px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `12px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 72: `    text-decoration: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-decoration`.
- **¿Qué hace?**: Aplica la propiedad visual `text-decoration` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-decoration`, visualizándose con las directivas por defecto del navegador web.

### Línea 73: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 74: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 75: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 76: `.brand-icon {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.brand-icon`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 77: `    width: 42px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `42px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 78: `    height: 42px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `42px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 79: `    background: var(--primary-gradient);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `var(--primary-gradient)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 80: `    border-radius: var(--radius-sm);`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `var(--radius-sm)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 81: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 82: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 83: `    justify-content: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 84: `    font-size: 20px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `20px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 85: `    box-shadow: 0 4px 12px rgba(184, 92, 232, 0.3);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 4px 12px rgba(184, 92, 232, 0.3)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 86: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 87: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 88: `.brand-text {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.brand-text`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 89: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 90: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 91: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 92: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 93: `.brand-name {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.brand-name`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 94: `    font-size: 22px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `22px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 95: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 96: `    letter-spacing: 0.5px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `letter-spacing`.
- **¿Qué hace?**: Aplica la propiedad visual `letter-spacing` con el valor `0.5px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `letter-spacing`, visualizándose con las directivas por defecto del navegador web.

### Línea 97: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 98: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 99: `.brand-subtitle {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.brand-subtitle`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 100: `    font-size: 11px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `11px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 101: `    color: rgba(255, 255, 255, 0.5);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `rgba(255, 255, 255, 0.5)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `rgba(255, 255, 255, 0.5)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 102: `    font-weight: 500;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `500`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 103: `    text-transform: uppercase;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-transform`.
- **¿Qué hace?**: Aplica la propiedad visual `text-transform` con el valor `uppercase` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 104: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 105: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 106: `.sidebar-close {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.sidebar-close`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 107: `    display: none;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 108: `    background: transparent;`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `transparent`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 109: `    border: none;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `none`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 110: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 111: `    font-size: 24px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `24px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 112: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 113: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 114: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 115: `/* USER PROFILE IN SIDEBAR */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 116: `.user-profile {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.user-profile`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 117: `    padding: 20px 24px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `20px 24px`.
- **¿Qué hace?**: Aplica un espaciado físico de `20px 24px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 118: `    margin: 0 16px 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin`) con el valor `0 16px 20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `0 16px 20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 119: `    background: rgba(255, 255, 255, 0.03);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `rgba(255, 255, 255, 0.03)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 120: `    border-radius: var(--radius-md);`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `var(--radius-md)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 121: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 122: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 123: `    gap: 12px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `12px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 124: `    border: 1px solid rgba(255, 255, 255, 0.05);`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `1px solid rgba(255, 255, 255, 0.05)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 125: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 126: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 127: `.user-avatar {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.user-avatar`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 128: `    width: 48px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `48px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 129: `    height: 48px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `48px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 130: `    background: var(--primary-gradient);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `var(--primary-gradient)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 131: `    border-radius: 50%;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `50%`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 132: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 133: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 134: `    justify-content: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 135: `    font-size: 18px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `18px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 136: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 137: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 138: `    box-shadow: 0 4px 10px rgba(143, 124, 255, 0.2);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 4px 10px rgba(143, 124, 255, 0.2)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 139: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 140: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 141: `.user-info {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.user-info`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 142: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 143: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 144: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 145: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 146: `.user-info strong {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.user-info strong`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 147: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 148: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 149: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 150: `    white-space: nowrap;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `white-space`.
- **¿Qué hace?**: Aplica la propiedad visual `white-space` con el valor `nowrap` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `white-space`, visualizándose con las directivas por defecto del navegador web.

### Línea 151: `    overflow: hidden;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `overflow`.
- **¿Qué hace?**: Aplica la propiedad visual `overflow` con el valor `hidden` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `overflow`, visualizándose con las directivas por defecto del navegador web.

### Línea 152: `    text-overflow: ellipsis;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-overflow`.
- **¿Qué hace?**: Aplica la propiedad visual `text-overflow` con el valor `ellipsis` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-overflow`, visualizándose con las directivas por defecto del navegador web.

### Línea 153: `    max-width: 150px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`max-width`) en `150px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 154: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 155: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 156: `.user-info span {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.user-info span`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 157: `    font-size: 11px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `11px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 158: `    color: rgba(255, 255, 255, 0.5);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `rgba(255, 255, 255, 0.5)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `rgba(255, 255, 255, 0.5)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 159: `    font-weight: 500;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `500`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 160: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 161: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 162: `/* SIDEBAR NAVIGATION */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 163: `.sidebar-nav {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.sidebar-nav`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 164: `    flex: 1;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 165: `    padding: 0 16px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `0 16px`.
- **¿Qué hace?**: Aplica un espaciado físico de `0 16px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 166: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 167: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 168: `    gap: 5px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `5px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 169: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 170: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 171: `.nav-title {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.nav-title`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 172: `    font-size: 11px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `11px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 173: `    color: rgba(255, 255, 255, 0.3);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `rgba(255, 255, 255, 0.3)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `rgba(255, 255, 255, 0.3)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 174: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 175: `    text-transform: uppercase;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-transform`.
- **¿Qué hace?**: Aplica la propiedad visual `text-transform` con el valor `uppercase` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 176: `    letter-spacing: 1px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `letter-spacing`.
- **¿Qué hace?**: Aplica la propiedad visual `letter-spacing` con el valor `1px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `letter-spacing`, visualizándose con las directivas por defecto del navegador web.

### Línea 177: `    padding: 10px 12px 5px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `10px 12px 5px`.
- **¿Qué hace?**: Aplica un espaciado físico de `10px 12px 5px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 178: `    margin: 0;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin`) con el valor `0`.
- **¿Qué hace?**: Aplica un espaciado físico de `0` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 179: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 180: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 181: `.nav-item {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.nav-item`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 182: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 183: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 184: `    gap: 12px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `12px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 185: `    padding: 12px 16px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `12px 16px`.
- **¿Qué hace?**: Aplica un espaciado físico de `12px 16px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 186: `    color: rgba(255, 255, 255, 0.6);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `rgba(255, 255, 255, 0.6)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `rgba(255, 255, 255, 0.6)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 187: `    text-decoration: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-decoration`.
- **¿Qué hace?**: Aplica la propiedad visual `text-decoration` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-decoration`, visualizándose con las directivas por defecto del navegador web.

### Línea 188: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 189: `    font-weight: 500;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `500`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 190: `    border-radius: var(--radius-sm);`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `var(--radius-sm)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 191: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 192: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 193: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 194: `.nav-item:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.nav-item:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 195: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 196: `    background-color: var(--sidebar-hover);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--sidebar-hover)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--sidebar-hover)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 197: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 198: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 199: `.nav-item.active {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.nav-item.active`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 200: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 201: `    background: var(--primary-gradient);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `var(--primary-gradient)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 202: `    box-shadow: 0 4px 15px rgba(184, 92, 232, 0.25);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 4px 15px rgba(184, 92, 232, 0.25)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 203: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 204: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 205: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 206: `.nav-icon {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.nav-icon`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 207: `    font-size: 18px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `18px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 208: `    width: 24px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `24px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 209: `    display: inline-flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 210: `    justify-content: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 211: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 212: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 213: `/* SIDEBAR FOOTER */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 214: `.sidebar-footer {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.sidebar-footer`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 215: `    padding: 20px 16px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `20px 16px`.
- **¿Qué hace?**: Aplica un espaciado físico de `20px 16px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 216: `    border-top: 1px solid rgba(255, 255, 255, 0.05);`
- **¿Para qué sirve?**: Definir el borde (`border-top`) con el valor `1px solid rgba(255, 255, 255, 0.05)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 217: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 218: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 219: `.logout-link {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.logout-link`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 220: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 221: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 222: `    gap: 12px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `12px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 223: `    padding: 12px 16px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `12px 16px`.
- **¿Qué hace?**: Aplica un espaciado físico de `12px 16px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 224: `    color: #ff4d4d;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ff4d4d`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ff4d4d`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 225: `    text-decoration: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-decoration`.
- **¿Qué hace?**: Aplica la propiedad visual `text-decoration` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-decoration`, visualizándose con las directivas por defecto del navegador web.

### Línea 226: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 227: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 228: `    border-radius: var(--radius-sm);`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `var(--radius-sm)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 229: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 230: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 231: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 232: `.logout-link:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.logout-link:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 233: `    background-color: rgba(255, 77, 77, 0.1);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `rgba(255, 77, 77, 0.1)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `rgba(255, 77, 77, 0.1)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 234: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 235: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 236: `/* MAIN CONTENT */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 237: `.main-content {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.main-content`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 238: `    flex: 1;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 239: `    margin-left: 280px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-left`) con el valor `280px`.
- **¿Qué hace?**: Aplica un espaciado físico de `280px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 240: `    min-height: 100vh;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`min-height`) en `100vh`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 241: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 242: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 243: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 244: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 245: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 246: `/* TOPBAR */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 247: `.topbar {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.topbar`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 248: `    height: 80px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `80px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 249: `    background-color: var(--card-bg);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--card-bg)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--card-bg)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 250: `    border-bottom: 1px solid var(--border-color);`
- **¿Para qué sirve?**: Definir el borde (`border-bottom`) con el valor `1px solid var(--border-color)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 251: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 252: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 253: `    justify-content: space-between;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 254: `    padding: 0 40px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `0 40px`.
- **¿Qué hace?**: Aplica un espaciado físico de `0 40px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 255: `    position: sticky;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `position`.
- **¿Qué hace?**: Aplica la propiedad visual `position` con el valor `sticky` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `position`, visualizándose con las directivas por defecto del navegador web.

### Línea 256: `    top: 0;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `top`.
- **¿Qué hace?**: Aplica la propiedad visual `top` con el valor `0` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `top`, visualizándose con las directivas por defecto del navegador web.

### Línea 257: `    z-index: 90;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `z-index`.
- **¿Qué hace?**: Aplica la propiedad visual `z-index` con el valor `90` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `z-index`, visualizándose con las directivas por defecto del navegador web.

### Línea 258: `    box-shadow: var(--shadow-sm);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `var(--shadow-sm)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 259: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 260: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 261: `.mobile-menu {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.mobile-menu`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 262: `    display: none;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 263: `    background: transparent;`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `transparent`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 264: `    border: none;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `none`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 265: `    color: var(--text-color);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-color)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-color)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 266: `    font-size: 24px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `24px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 267: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 268: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 269: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 270: `.breadcrumb {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.breadcrumb`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 271: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 272: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 273: `    gap: 8px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `8px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 274: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 275: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 276: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 277: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 278: `.breadcrumb i {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.breadcrumb i`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 279: `    font-size: 10px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `10px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 280: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 281: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 282: `.breadcrumb strong {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.breadcrumb strong`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 283: `    color: var(--primary-color);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--primary-color)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--primary-color)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 284: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 285: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 286: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 287: `.topbar-actions {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.topbar-actions`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 288: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 289: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 290: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 291: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 292: `.topbar-user {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.topbar-user`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 293: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 294: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 295: `    gap: 10px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `10px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 296: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 297: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 298: `.topbar-avatar {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.topbar-avatar`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 299: `    width: 38px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `38px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 300: `    height: 38px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `38px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 301: `    background-color: var(--primary-light);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--primary-light)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--primary-light)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 302: `    color: var(--primary-color);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--primary-color)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--primary-color)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 303: `    border-radius: 50%;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `50%`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 304: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 305: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 306: `    justify-content: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 307: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 308: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 309: `    border: 1px solid rgba(111, 45, 189, 0.15);`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `1px solid rgba(111, 45, 189, 0.15)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 310: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 311: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 312: `.topbar-user-info {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.topbar-user-info`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 313: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 314: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 315: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 316: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 317: `.topbar-user-info strong {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.topbar-user-info strong`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 318: `    font-size: 13px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `13px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 319: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 320: `    color: var(--text-color);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-color)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-color)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 321: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 322: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 323: `.topbar-user-info span {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.topbar-user-info span`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 324: `    font-size: 10px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `10px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 325: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 326: `    font-weight: 500;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `500`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 327: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 328: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 329: `/* DASHBOARD CONTENT */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 330: `.dashboard-content {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.dashboard-content`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 331: `    padding: 40px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `40px`.
- **¿Qué hace?**: Aplica un espaciado físico de `40px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 332: `    flex: 1;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 333: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 334: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 335: `/* WELCOME SECTION */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 336: `.welcome-section {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.welcome-section`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 337: `    background: var(--primary-gradient);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `var(--primary-gradient)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 338: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 339: `    padding: 30px 40px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `30px 40px`.
- **¿Qué hace?**: Aplica un espaciado físico de `30px 40px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 340: `    border-radius: var(--radius-md);`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `var(--radius-md)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 341: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 342: `    justify-content: space-between;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 343: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 344: `    margin-bottom: 35px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `35px`.
- **¿Qué hace?**: Aplica un espaciado físico de `35px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 345: `    box-shadow: 0 10px 25px rgba(143, 124, 255, 0.2);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 10px 25px rgba(143, 124, 255, 0.2)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 346: `    position: relative;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `position`.
- **¿Qué hace?**: Aplica la propiedad visual `position` con el valor `relative` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `position`, visualizándose con las directivas por defecto del navegador web.

### Línea 347: `    overflow: hidden;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `overflow`.
- **¿Qué hace?**: Aplica la propiedad visual `overflow` con el valor `hidden` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `overflow`, visualizándose con las directivas por defecto del navegador web.

### Línea 348: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 349: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 350: `.welcome-section::before {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.welcome-section::before`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 351: `    content: '';`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `content`.
- **¿Qué hace?**: Aplica la propiedad visual `content` con el valor `''` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `content`, visualizándose con las directivas por defecto del navegador web.

### Línea 352: `    position: absolute;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `position`.
- **¿Qué hace?**: Aplica la propiedad visual `position` con el valor `absolute` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `position`, visualizándose con las directivas por defecto del navegador web.

### Línea 353: `    top: -50%;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `top`.
- **¿Qué hace?**: Aplica la propiedad visual `top` con el valor `-50%` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `top`, visualizándose con las directivas por defecto del navegador web.

### Línea 354: `    right: -10%;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `right`.
- **¿Qué hace?**: Aplica la propiedad visual `right` con el valor `-10%` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `right`, visualizándose con las directivas por defecto del navegador web.

### Línea 355: `    width: 300px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `300px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 356: `    height: 300px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `300px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 357: `    background: rgba(255, 255, 255, 0.05);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `rgba(255, 255, 255, 0.05)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 358: `    border-radius: 50%;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `50%`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 359: `    pointer-events: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `pointer-events`.
- **¿Qué hace?**: Aplica la propiedad visual `pointer-events` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `pointer-events`, visualizándose con las directivas por defecto del navegador web.

### Línea 360: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 361: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 362: `.welcome-label {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.welcome-label`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 363: `    font-size: 11px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `11px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 364: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 365: `    letter-spacing: 1.5px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `letter-spacing`.
- **¿Qué hace?**: Aplica la propiedad visual `letter-spacing` con el valor `1.5px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `letter-spacing`, visualizándose con las directivas por defecto del navegador web.

### Línea 366: `    text-transform: uppercase;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-transform`.
- **¿Qué hace?**: Aplica la propiedad visual `text-transform` con el valor `uppercase` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 367: `    background: rgba(255, 255, 255, 0.15);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `rgba(255, 255, 255, 0.15)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 368: `    padding: 4px 10px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `4px 10px`.
- **¿Qué hace?**: Aplica un espaciado físico de `4px 10px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 369: `    border-radius: 30px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `30px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 370: `    display: inline-block;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 371: `    margin-bottom: 12px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `12px`.
- **¿Qué hace?**: Aplica un espaciado físico de `12px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 372: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 373: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 374: `.welcome-section h1 {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.welcome-section h1`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 375: `    font-size: 28px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `28px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 376: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 377: `    margin: 0 0 8px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin`) con el valor `0 0 8px`.
- **¿Qué hace?**: Aplica un espaciado físico de `0 0 8px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 378: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 379: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 380: `.welcome-section p {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.welcome-section p`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 381: `    margin: 0;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin`) con el valor `0`.
- **¿Qué hace?**: Aplica un espaciado físico de `0` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 382: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 383: `    opacity: 0.9;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `opacity`.
- **¿Qué hace?**: Aplica la propiedad visual `opacity` con el valor `0.9` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `opacity`, visualizándose con las directivas por defecto del navegador web.

### Línea 384: `    font-weight: 400;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `400`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 385: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 386: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 387: `.current-date {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.current-date`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 388: `    background: rgba(255, 255, 255, 0.15);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `rgba(255, 255, 255, 0.15)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 389: `    backdrop-filter: blur(10px);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `backdrop-filter`.
- **¿Qué hace?**: Aplica la propiedad visual `backdrop-filter` con el valor `blur(10px)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `backdrop-filter`, visualizándose con las directivas por defecto del navegador web.

### Línea 390: `    padding: 10px 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `10px 20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `10px 20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 391: `    border-radius: 30px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `30px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 392: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 393: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 394: `    gap: 10px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `10px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 395: `    font-size: 13px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `13px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 396: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 397: `    border: 1px solid rgba(255, 255, 255, 0.1);`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `1px solid rgba(255, 255, 255, 0.1)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 398: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 399: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 400: `/* STATS GRID */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 401: `.stats-grid {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stats-grid`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 402: `    display: grid;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 403: `    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 404: `    gap: 25px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `25px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 405: `    margin-bottom: 35px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `35px`.
- **¿Qué hace?**: Aplica un espaciado físico de `35px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 406: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 407: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 408: `.stat-card {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-card`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 409: `    background-color: var(--card-bg);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--card-bg)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--card-bg)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 410: `    border-radius: var(--radius-md);`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `var(--radius-md)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 411: `    padding: 24px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `24px`.
- **¿Qué hace?**: Aplica un espaciado físico de `24px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 412: `    border: 1px solid var(--border-color);`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `1px solid var(--border-color)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 413: `    box-shadow: var(--shadow-sm);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `var(--shadow-sm)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 414: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 415: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 416: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 417: `.stat-card:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-card:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 418: `    transform: translateY(-5px);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transform`.
- **¿Qué hace?**: Aplica la propiedad visual `transform` con el valor `translateY(-5px)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 419: `    box-shadow: var(--shadow-md);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `var(--shadow-md)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 420: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 421: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 422: `.stat-card-top {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-card-top`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 423: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 424: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 425: `    gap: 12px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `12px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 426: `    margin-bottom: 15px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `15px`.
- **¿Qué hace?**: Aplica un espaciado físico de `15px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 427: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 428: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 429: `.stat-icon {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-icon`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 430: `    width: 44px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `44px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 431: `    height: 44px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `44px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 432: `    border-radius: var(--radius-sm);`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `var(--radius-sm)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 433: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 434: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 435: `    justify-content: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 436: `    font-size: 18px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `18px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 437: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 438: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 439: `.sales-icon {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.sales-icon`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 440: `    background-color: var(--primary-light);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--primary-light)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--primary-light)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 441: `    color: var(--primary-color);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--primary-color)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--primary-color)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 442: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 443: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 444: `.products-icon {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.products-icon`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 445: `    background-color: #ffebee;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#ffebee`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffebee`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 446: `    color: #f44336;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#f44336`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#f44336`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 447: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 448: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 449: `.clients-icon {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.clients-icon`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 450: `    background-color: #e8f5e9;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#e8f5e9`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#e8f5e9`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 451: `    color: #4caf50;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#4caf50`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#4caf50`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 452: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 453: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 454: `.stat-label {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-label`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 455: `    font-size: 13px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `13px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 456: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 457: `    font-weight: 500;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `500`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 458: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 459: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 460: `.stat-value {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-value`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 461: `    font-size: 26px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `26px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 462: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 463: `    color: var(--text-color);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-color)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-color)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 464: `    margin-bottom: 10px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `10px`.
- **¿Qué hace?**: Aplica un espaciado físico de `10px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 465: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 466: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 467: `.stat-footer {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-footer`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 468: `    font-size: 12px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `12px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 469: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 470: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 471: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 472: `    gap: 5px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `5px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 473: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 474: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 475: `.stat-neutral {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-neutral`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 476: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 477: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 478: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 479: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 480: `/* TABLES & CARDS */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 481: `.recent-sales-card {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.recent-sales-card`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 482: `    background-color: var(--card-bg);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--card-bg)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--card-bg)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 483: `    border-radius: var(--radius-md);`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `var(--radius-md)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 484: `    border: 1px solid var(--border-color);`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `1px solid var(--border-color)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 485: `    box-shadow: var(--shadow-sm);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `var(--shadow-sm)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 486: `    overflow: hidden;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `overflow`.
- **¿Qué hace?**: Aplica la propiedad visual `overflow` con el valor `hidden` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `overflow`, visualizándose con las directivas por defecto del navegador web.

### Línea 487: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 488: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 489: `.card-header {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.card-header`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 490: `    padding: 20px 25px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `20px 25px`.
- **¿Qué hace?**: Aplica un espaciado físico de `20px 25px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 491: `    border-bottom: 1px solid var(--border-color);`
- **¿Para qué sirve?**: Definir el borde (`border-bottom`) con el valor `1px solid var(--border-color)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 492: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 493: `    justify-content: space-between;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 494: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 495: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 496: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 497: `.card-header h2 {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.card-header h2`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 498: `    font-size: 16px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `16px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 499: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 500: `    margin: 0;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin`) con el valor `0`.
- **¿Qué hace?**: Aplica un espaciado físico de `0` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 501: `    color: var(--text-color);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-color)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-color)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 502: `    text-transform: uppercase;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-transform`.
- **¿Qué hace?**: Aplica la propiedad visual `text-transform` con el valor `uppercase` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 503: `    letter-spacing: 0.5px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `letter-spacing`.
- **¿Qué hace?**: Aplica la propiedad visual `letter-spacing` con el valor `0.5px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `letter-spacing`, visualizándose con las directivas por defecto del navegador web.

### Línea 504: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 505: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 506: `.btn-view-all {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-view-all`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 507: `    font-size: 12px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `12px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 508: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 509: `    color: var(--primary-color);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--primary-color)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--primary-color)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 510: `    text-decoration: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-decoration`.
- **¿Qué hace?**: Aplica la propiedad visual `text-decoration` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-decoration`, visualizándose con las directivas por defecto del navegador web.

### Línea 511: `    background-color: var(--primary-light);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--primary-light)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--primary-light)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 512: `    padding: 6px 14px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `6px 14px`.
- **¿Qué hace?**: Aplica un espaciado físico de `6px 14px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 513: `    border-radius: 20px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `20px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 514: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 515: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 516: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 517: `.btn-view-all:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-view-all:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 518: `    background-color: var(--primary-color);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--primary-color)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--primary-color)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 519: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 520: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 521: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 522: `.table-responsive {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.table-responsive`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 523: `    width: 100%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `100%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 524: `    overflow-x: auto;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `overflow-x`.
- **¿Qué hace?**: Aplica la propiedad visual `overflow-x` con el valor `auto` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `overflow-x`, visualizándose con las directivas por defecto del navegador web.

### Línea 525: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 526: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 527: `table {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `table`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 528: `    width: 100%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `100%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 529: `    border-collapse: collapse;`
- **¿Para qué sirve?**: Definir el borde (`border-collapse`) con el valor `collapse`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 530: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 531: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 532: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 533: `th {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `th`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 534: `    background-color: #fcfcfd;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#fcfcfd`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#fcfcfd`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 535: `    padding: 14px 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `14px 20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `14px 20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 536: `    text-align: left;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-align`.
- **¿Qué hace?**: Aplica la propiedad visual `text-align` con el valor `left` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-align`, visualizándose con las directivas por defecto del navegador web.

### Línea 537: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 538: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 539: `    border-bottom: 1px solid var(--border-color);`
- **¿Para qué sirve?**: Definir el borde (`border-bottom`) con el valor `1px solid var(--border-color)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 540: `    text-transform: uppercase;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-transform`.
- **¿Qué hace?**: Aplica la propiedad visual `text-transform` con el valor `uppercase` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 541: `    font-size: 11px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `11px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 542: `    letter-spacing: 0.5px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `letter-spacing`.
- **¿Qué hace?**: Aplica la propiedad visual `letter-spacing` con el valor `0.5px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `letter-spacing`, visualizándose con las directivas por defecto del navegador web.

### Línea 543: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 544: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 545: `td {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `td`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 546: `    padding: 16px 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `16px 20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `16px 20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 547: `    border-bottom: 1px solid var(--border-color);`
- **¿Para qué sirve?**: Definir el borde (`border-bottom`) con el valor `1px solid var(--border-color)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 548: `    color: var(--text-color);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-color)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-color)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 549: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 550: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 551: `tr:last-child td {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `tr:last-child td`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 552: `    border-bottom: none;`
- **¿Para qué sirve?**: Definir el borde (`border-bottom`) con el valor `none`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 553: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 554: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 555: `.text-right {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.text-right`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 556: `    text-align: right;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-align`.
- **¿Qué hace?**: Aplica la propiedad visual `text-align` con el valor `right` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-align`, visualizándose con las directivas por defecto del navegador web.

### Línea 557: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 558: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 559: `.text-center {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.text-center`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 560: `    text-align: center;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-align`.
- **¿Qué hace?**: Aplica la propiedad visual `text-align` con el valor `center` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-align`, visualizándose con las directivas por defecto del navegador web.

### Línea 561: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 562: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 563: `/* BADGES */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 564: `.status-badge {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.status-badge`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 565: `    padding: 4px 10px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `4px 10px`.
- **¿Qué hace?**: Aplica un espaciado físico de `4px 10px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 566: `    border-radius: 20px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `20px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 567: `    font-size: 11px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `11px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 568: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 569: `    text-transform: uppercase;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-transform`.
- **¿Qué hace?**: Aplica la propiedad visual `text-transform` con el valor `uppercase` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 570: `    display: inline-block;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 571: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 572: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 573: `.status-paid {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.status-paid`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 574: `    background-color: #e8f5e9;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#e8f5e9`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#e8f5e9`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 575: `    color: #4caf50;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#4caf50`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#4caf50`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 576: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 577: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 578: `.status-pending {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.status-pending`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 579: `    background-color: #fff8e1;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#fff8e1`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#fff8e1`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 580: `    color: #ffb300;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffb300`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffb300`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 581: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 582: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 583: `/* FOOTER */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 584: `.dashboard-footer {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.dashboard-footer`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 585: `    height: 60px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `60px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 586: `    background-color: var(--card-bg);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--card-bg)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--card-bg)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 587: `    border-top: 1px solid var(--border-color);`
- **¿Para qué sirve?**: Definir el borde (`border-top`) con el valor `1px solid var(--border-color)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 588: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 589: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 590: `    justify-content: space-between;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 591: `    padding: 0 40px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `0 40px`.
- **¿Qué hace?**: Aplica un espaciado físico de `0 40px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 592: `    font-size: 12px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `12px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 593: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 594: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 595: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 596: `/* OVERLAY FOR MOBILE */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 597: `.sidebar-overlay {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.sidebar-overlay`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 598: `    position: fixed;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `position`.
- **¿Qué hace?**: Aplica la propiedad visual `position` con el valor `fixed` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `position`, visualizándose con las directivas por defecto del navegador web.

### Línea 599: `    top: 0;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `top`.
- **¿Qué hace?**: Aplica la propiedad visual `top` con el valor `0` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `top`, visualizándose con las directivas por defecto del navegador web.

### Línea 600: `    left: 0;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `left`.
- **¿Qué hace?**: Aplica la propiedad visual `left` con el valor `0` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `left`, visualizándose con las directivas por defecto del navegador web.

### Línea 601: `    width: 100%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `100%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 602: `    height: 100%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `100%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 603: `    background-color: rgba(0, 0, 0, 0.4);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `rgba(0, 0, 0, 0.4)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `rgba(0, 0, 0, 0.4)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 604: `    z-index: 95;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `z-index`.
- **¿Qué hace?**: Aplica la propiedad visual `z-index` con el valor `95` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `z-index`, visualizándose con las directivas por defecto del navegador web.

### Línea 605: `    opacity: 0;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `opacity`.
- **¿Qué hace?**: Aplica la propiedad visual `opacity` con el valor `0` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `opacity`, visualizándose con las directivas por defecto del navegador web.

### Línea 606: `    visibility: hidden;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `visibility`.
- **¿Qué hace?**: Aplica la propiedad visual `visibility` con el valor `hidden` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `visibility`, visualizándose con las directivas por defecto del navegador web.

### Línea 607: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 608: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 609: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 610: `.sidebar-overlay.active {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.sidebar-overlay.active`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 611: `    opacity: 1;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `opacity`.
- **¿Qué hace?**: Aplica la propiedad visual `opacity` con el valor `1` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `opacity`, visualizándose con las directivas por defecto del navegador web.

### Línea 612: `    visibility: visible;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `visibility`.
- **¿Qué hace?**: Aplica la propiedad visual `visibility` con el valor `visible` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `visibility`, visualizándose con las directivas por defecto del navegador web.

### Línea 613: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 614: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 615: `/* RESPONSIVE DESIGN */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 616: `@media (max-width: 991px) {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `@media (max-width: 991px)`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 617: `    .sidebar {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.sidebar`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 618: `        left: -280px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `left`.
- **¿Qué hace?**: Aplica la propiedad visual `left` con el valor `-280px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `left`, visualizándose con las directivas por defecto del navegador web.

### Línea 619: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 620: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 621: `    .sidebar.open {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.sidebar.open`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 622: `        left: 0;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `left`.
- **¿Qué hace?**: Aplica la propiedad visual `left` con el valor `0` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `left`, visualizándose con las directivas por defecto del navegador web.

### Línea 623: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 624: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 625: `    .sidebar-close {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.sidebar-close`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 626: `        display: block;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 627: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 628: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 629: `    .main-content {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.main-content`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 630: `        margin-left: 0;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-left`) con el valor `0`.
- **¿Qué hace?**: Aplica un espaciado físico de `0` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 631: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 632: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 633: `    .mobile-menu {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.mobile-menu`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 634: `        display: block;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 635: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 636: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 637: `    .topbar {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.topbar`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 638: `        padding: 0 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `0 20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `0 20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 639: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 640: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 641: `    .dashboard-content {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.dashboard-content`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 642: `        padding: 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 643: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 644: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 645: `    .welcome-section {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.welcome-section`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 646: `        flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 647: `        align-items: flex-start;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 648: `        gap: 20px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `20px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 649: `        padding: 25px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `25px`.
- **¿Qué hace?**: Aplica un espaciado físico de `25px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 650: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 651: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 652: `    .current-date {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.current-date`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 653: `        align-self: flex-start;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 654: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 655: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 656: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 657: `@media (max-width: 768px) {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `@media (max-width: 768px)`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 658: `    .dashboard-grid {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.dashboard-grid`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 659: `        grid-template-columns: 1fr !important;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 660: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 661: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

