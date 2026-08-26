# Documentación Lógica: inventario.css

## Información General
- **Ruta del Archivo**: `views/vendedor/css/inventario.css`
- **Tipo**: Hoja de Estilos CSS

## Estructura del Código
Este archivo contiene las directivas y lógica de inventario.css. A continuación, se detalla el comportamiento de cada línea.

## Explicación Línea por Línea

### Línea 1: `/* ==========================================================================`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 2: `   INVENTARIO ADMINISTRADOR CSS - SIVC`
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

### Línea 6: `    --bg-lavender: #eedffd;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--bg-lavender`.
- **¿Qué hace?**: Aplica la propiedad visual `--bg-lavender` con el valor `#eedffd` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--bg-lavender`, visualizándose con las directivas por defecto del navegador web.

### Línea 7: `    --sidebar-bg: #f5e4f7;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--sidebar-bg`.
- **¿Qué hace?**: Aplica la propiedad visual `--sidebar-bg` con el valor `#f5e4f7` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--sidebar-bg`, visualizándose con las directivas por defecto del navegador web.

### Línea 8: `    --card-bg: #ffffff;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--card-bg`.
- **¿Qué hace?**: Aplica la propiedad visual `--card-bg` con el valor `#ffffff` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--card-bg`, visualizándose con las directivas por defecto del navegador web.

### Línea 9: `    --text-dark: #120e24;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--text-dark`.
- **¿Qué hace?**: Aplica la propiedad visual `--text-dark` con el valor `#120e24` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--text-dark`, visualizándose con las directivas por defecto del navegador web.

### Línea 10: `    --text-muted: #555555;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--text-muted`.
- **¿Qué hace?**: Aplica la propiedad visual `--text-muted` con el valor `#555555` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--text-muted`, visualizándose con las directivas por defecto del navegador web.

### Línea 11: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 12: `    /* Colores temáticos */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 13: `    --color-purple: #6f2dbd;`
- **¿Para qué sirve?**: Definir la coloración ('--color-purple') con el valor `#6f2dbd`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#6f2dbd`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 14: `    --color-pink: #f72585;`
- **¿Para qué sirve?**: Definir la coloración ('--color-pink') con el valor `#f72585`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#f72585`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 15: `    --color-blue: #3f37c9;`
- **¿Para qué sirve?**: Definir la coloración ('--color-blue') con el valor `#3f37c9`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#3f37c9`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 16: `    --color-magenta: #b5179e;`
- **¿Para qué sirve?**: Definir la coloración ('--color-magenta') con el valor `#b5179e`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#b5179e`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 17: `    --color-teal: #009688;`
- **¿Para qué sirve?**: Definir la coloración ('--color-teal') con el valor `#009688`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#009688`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 18: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 19: `    --border-style: 2px solid #e2d1f0;`
- **¿Para qué sirve?**: Definir el borde (`--border-style`) con el valor `2px solid #e2d1f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 20: `    --radius-md: 20px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--radius-md`.
- **¿Qué hace?**: Aplica la propiedad visual `--radius-md` con el valor `20px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--radius-md`, visualizándose con las directivas por defecto del navegador web.

### Línea 21: `    --radius-lg: 30px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--radius-lg`.
- **¿Qué hace?**: Aplica la propiedad visual `--radius-lg` con el valor `30px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--radius-lg`, visualizándose con las directivas por defecto del navegador web.

### Línea 22: `    --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--transition`.
- **¿Qué hace?**: Aplica la propiedad visual `--transition` con el valor `all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 23: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 24: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 25: `/* ENCABEZADO CON ILUSTRACIÓN */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 26: `.header-with-illustration {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.header-with-illustration`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 27: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 28: `    justify-content: space-between;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 29: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 30: `    margin-bottom: 25px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `25px`.
- **¿Qué hace?**: Aplica un espaciado físico de `25px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 31: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 32: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 33: `.header-illustration-img {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.header-illustration-img`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 34: `    width: 170px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `170px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 35: `    height: auto;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `auto`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 36: `    border-radius: 12px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `12px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 37: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 38: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 39: `/* FILA DE ESTADÍSTICAS */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 40: `.inventory-stats-row {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.inventory-stats-row`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 41: `    display: grid;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 42: `    grid-template-columns: repeat(4, 1fr);`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 43: `    gap: 20px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `20px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 44: `    margin-bottom: 30px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `30px`.
- **¿Qué hace?**: Aplica un espaciado físico de `30px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 45: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 46: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 47: `.stat-box-card {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-box-card`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 48: `    background-color: var(--card-bg);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--card-bg)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--card-bg)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 49: `    border: var(--border-style);`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `var(--border-style)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 50: `    border-radius: 20px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `20px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 51: `    padding: 15px 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `15px 20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `15px 20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 52: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 53: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 54: `    gap: 15px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `15px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 55: `    box-shadow: 0 4px 10px rgba(0,0,0,0.02);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 4px 10px rgba(0,0,0,0.02)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 56: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 57: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 58: `.stat-box-icon-circle {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-box-icon-circle`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 59: `    width: 60px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `60px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 60: `    height: 60px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `60px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 61: `    border-radius: 50%;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `50%`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 62: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 63: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 64: `    justify-content: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 65: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 66: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 67: `.stat-box-icon-circle i {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-box-icon-circle i`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 68: `    font-size: 26px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `26px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 69: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 70: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 71: `.stat-box-details {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-box-details`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 72: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 73: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 74: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 75: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 76: `.stat-box-details .stat-name {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-box-details .stat-name`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 77: `    font-size: 13px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `13px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 78: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 79: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 80: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 81: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 82: `.stat-box-details .stat-number {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-box-details .stat-number`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 83: `    font-size: 28px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `28px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 84: `    font-weight: 800;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `800`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 85: `    color: #000000;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#000000`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#000000`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 86: `    margin: 2px 0;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin`) con el valor `2px 0`.
- **¿Qué hace?**: Aplica un espaciado físico de `2px 0` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 87: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 88: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 89: `.stat-box-details .stat-desc {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stat-box-details .stat-desc`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 90: `    font-size: 10px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `10px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 91: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 92: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 93: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 94: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 95: `/* BARRA DE FILTROS */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 96: `.filter-bar-form {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.filter-bar-form`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 97: `    background-color: var(--card-bg);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--card-bg)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--card-bg)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 98: `    border: var(--border-style);`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `var(--border-style)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 99: `    border-radius: 20px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `20px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 100: `    padding: 15px 25px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `15px 25px`.
- **¿Qué hace?**: Aplica un espaciado físico de `15px 25px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 101: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 102: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 103: `    gap: 20px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `20px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 104: `    margin-bottom: 25px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `25px`.
- **¿Qué hace?**: Aplica un espaciado físico de `25px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 105: `    box-shadow: 0 4px 10px rgba(0,0,0,0.02);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 4px 10px rgba(0,0,0,0.02)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 106: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 107: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 108: `.filter-input-group {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.filter-input-group`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 109: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 110: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 111: `    background-color: #f7f3fc;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#f7f3fc`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#f7f3fc`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 112: `    border: 1px solid #ebd0f0;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `1px solid #ebd0f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 113: `    border-radius: 30px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `30px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 114: `    padding: 10px 18px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `10px 18px`.
- **¿Qué hace?**: Aplica un espaciado físico de `10px 18px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 115: `    flex: 1;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 116: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 117: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 118: `.filter-input-group i {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.filter-input-group i`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 119: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 120: `    margin-right: 10px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-right`) con el valor `10px`.
- **¿Qué hace?**: Aplica un espaciado físico de `10px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 121: `    font-size: 16px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `16px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 122: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 123: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 124: `.filter-input-group input {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.filter-input-group input`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 125: `    background: transparent;`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `transparent`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 126: `    border: none;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `none`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 127: `    outline: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `outline`.
- **¿Qué hace?**: Aplica la propiedad visual `outline` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `outline`, visualizándose con las directivas por defecto del navegador web.

### Línea 128: `    width: 100%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `100%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 129: `    font-family: inherit;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-family`) en `inherit`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 130: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 131: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 132: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 133: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 134: `.filter-select-group {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.filter-select-group`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 135: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 136: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 137: `    gap: 10px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `10px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 138: `    background-color: var(--card-bg);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--card-bg)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--card-bg)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 139: `    border: 2px solid #ebd0f0;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `2px solid #ebd0f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 140: `    border-radius: 30px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `30px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 141: `    padding: 8px 18px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `8px 18px`.
- **¿Qué hace?**: Aplica un espaciado físico de `8px 18px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 142: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 143: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 144: `.filter-select-group label {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.filter-select-group label`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 145: `    font-size: 12px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `12px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 146: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 147: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 148: `    text-transform: uppercase;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-transform`.
- **¿Qué hace?**: Aplica la propiedad visual `text-transform` con el valor `uppercase` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 149: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 150: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 151: `.filter-select-group select {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.filter-select-group select`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 152: `    border: none;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `none`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 153: `    outline: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `outline`.
- **¿Qué hace?**: Aplica la propiedad visual `outline` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `outline`, visualizándose con las directivas por defecto del navegador web.

### Línea 154: `    font-family: inherit;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-family`) en `inherit`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 155: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 156: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 157: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 158: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 159: `    background: transparent;`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `transparent`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 160: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 161: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 162: `.btn-clear-filters {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-clear-filters`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 163: `    background-color: #ebd3f8;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#ebd3f8`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ebd3f8`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 164: `    border: none;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `none`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 165: `    border-radius: 30px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `30px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 166: `    padding: 10px 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `10px 20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `10px 20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 167: `    color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 168: `    font-size: 13px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `13px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 169: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 170: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 171: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 172: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 173: `    gap: 8px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `8px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 174: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 175: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 176: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 177: `.btn-clear-filters:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-clear-filters:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 178: `    background-color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 179: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 180: `    transform: translateY(-1px);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transform`.
- **¿Qué hace?**: Aplica la propiedad visual `transform` con el valor `translateY(-1px)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 181: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 182: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 183: `/* TABLA DE INVENTARIO Y CONTENEDOR */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 184: `.inventory-table-container {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.inventory-table-container`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 185: `    background-color: var(--card-bg);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--card-bg)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--card-bg)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 186: `    border: var(--border-style);`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `var(--border-style)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 187: `    border-radius: var(--radius-md);`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `var(--radius-md)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 188: `    overflow: hidden;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `overflow`.
- **¿Qué hace?**: Aplica la propiedad visual `overflow` con el valor `hidden` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `overflow`, visualizándose con las directivas por defecto del navegador web.

### Línea 189: `    box-shadow: 0 6px 15px rgba(111, 45, 189, 0.03);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 6px 15px rgba(111, 45, 189, 0.03)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 190: `    margin-bottom: 25px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `25px`.
- **¿Qué hace?**: Aplica un espaciado físico de `25px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 191: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 192: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 193: `.inventory-table {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.inventory-table`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 194: `    width: 100%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `100%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 195: `    border-collapse: collapse;`
- **¿Para qué sirve?**: Definir el borde (`border-collapse`) con el valor `collapse`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 196: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 197: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 198: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 199: `.inventory-table th {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.inventory-table th`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 200: `    background-color: #ebd3f8;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#ebd3f8`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ebd3f8`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 201: `    color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 202: `    font-weight: 800;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `800`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 203: `    padding: 15px 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `15px 20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `15px 20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 204: `    text-align: left;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-align`.
- **¿Qué hace?**: Aplica la propiedad visual `text-align` con el valor `left` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-align`, visualizándose con las directivas por defecto del navegador web.

### Línea 205: `    border-bottom: 2px solid #e2d1f0;`
- **¿Para qué sirve?**: Definir el borde (`border-bottom`) con el valor `2px solid #e2d1f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 206: `    font-size: 13px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `13px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 207: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 208: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 209: `.inventory-table td {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.inventory-table td`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 210: `    padding: 15px 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `15px 20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `15px 20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 211: `    border-bottom: 2px solid #ebd0f0;`
- **¿Para qué sirve?**: Definir el borde (`border-bottom`) con el valor `2px solid #ebd0f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 212: `    vertical-align: middle;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `vertical-align`.
- **¿Qué hace?**: Aplica la propiedad visual `vertical-align` con el valor `middle` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `vertical-align`, visualizándose con las directivas por defecto del navegador web.

### Línea 213: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 214: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 215: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 216: `.inventory-table tr:last-child td {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.inventory-table tr:last-child td`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 217: `    border-bottom: none;`
- **¿Para qué sirve?**: Definir el borde (`border-bottom`) con el valor `none`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 218: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 219: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 220: `.inventory-table tr:nth-child(even) {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.inventory-table tr:nth-child(even)`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 221: `    background-color: #fbf6ff;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#fbf6ff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#fbf6ff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 222: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 223: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 224: `/* Columna Producto */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 225: `.product-cell {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.product-cell`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 226: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 227: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 228: `    gap: 15px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `15px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 229: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 230: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 231: `.product-cell-img {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.product-cell-img`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 232: `    width: 55px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `55px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 233: `    height: 55px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `55px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 234: `    border-radius: 12px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `12px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 235: `    object-fit: cover;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `object-fit`.
- **¿Qué hace?**: Aplica la propiedad visual `object-fit` con el valor `cover` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `object-fit`, visualizándose con las directivas por defecto del navegador web.

### Línea 236: `    border: 1px solid #ebd0f0;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `1px solid #ebd0f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 237: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 238: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 239: `.product-cell-info {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.product-cell-info`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 240: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 241: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 242: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 243: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 244: `.product-cell-info strong {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.product-cell-info strong`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 245: `    font-size: 15px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `15px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 246: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 247: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 248: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 249: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 250: `.product-cell-info span {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.product-cell-info span`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 251: `    font-size: 11px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `11px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 252: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 253: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 254: `    margin-top: 2px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-top`) con el valor `2px`.
- **¿Qué hace?**: Aplica un espaciado físico de `2px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 255: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 256: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 257: `/* Columna Categoría */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 258: `.category-badge {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.category-badge`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 259: `    background-color: #ebd3f8;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#ebd3f8`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ebd3f8`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 260: `    color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 261: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 262: `    font-size: 12px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `12px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 263: `    padding: 6px 14px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `6px 14px`.
- **¿Qué hace?**: Aplica un espaciado físico de `6px 14px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 264: `    border-radius: 12px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `12px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 265: `    display: inline-block;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 266: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 267: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 268: `/* Columna Stock con colores dinámicos */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 269: `.stock-text {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stock-text`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 270: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 271: `    font-size: 15px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `15px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 272: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 273: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 274: `.stock-text.available { color: #28a745; }`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stock-text.available`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 275: `.stock-text.low { color: #fd7e14; }`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stock-text.low`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 276: `.stock-text.empty { color: #dc3545; }`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.stock-text.empty`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 277: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 278: `/* Columna Estado con Badges */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 279: `.status-badge {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.status-badge`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 280: `    padding: 6px 14px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `6px 14px`.
- **¿Qué hace?**: Aplica un espaciado físico de `6px 14px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 281: `    border-radius: 12px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `12px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 282: `    font-size: 11px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `11px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 283: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 284: `    display: inline-block;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 285: `    text-transform: capitalize;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-transform`.
- **¿Qué hace?**: Aplica la propiedad visual `text-transform` con el valor `capitalize` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 286: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 287: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 288: `.status-badge.disponible {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.status-badge.disponible`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 289: `    background-color: #d4edda;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#d4edda`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#d4edda`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 290: `    color: #155724;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#155724`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#155724`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 291: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 292: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 293: `.status-badge.stock-bajo {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.status-badge.stock-bajo`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 294: `    background-color: #fff3cd;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#fff3cd`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#fff3cd`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 295: `    color: #856404;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#856404`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#856404`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 296: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 297: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 298: `.status-badge.sin-stock {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.status-badge.sin-stock`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 299: `    background-color: #f8d7da;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#f8d7da`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#f8d7da`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 300: `    color: #721c24;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#721c24`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#721c24`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 301: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 302: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 303: `/* Columna Acciones */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 304: `.actions-cell {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.actions-cell`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 305: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 306: `    gap: 8px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `8px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 307: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 308: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 309: `.action-icon-btn {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.action-icon-btn`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 310: `    width: 34px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `34px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 311: `    height: 34px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `34px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 312: `    border-radius: 50%;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `50%`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 313: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 314: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 315: `    justify-content: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 316: `    text-decoration: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-decoration`.
- **¿Qué hace?**: Aplica la propiedad visual `text-decoration` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-decoration`, visualizándose con las directivas por defecto del navegador web.

### Línea 317: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 318: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 319: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 320: `.action-icon-btn.view {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.action-icon-btn.view`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 321: `    background-color: #f3e6f8;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#f3e6f8`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#f3e6f8`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 322: `    color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 323: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 324: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 325: `.action-icon-btn.edit {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.action-icon-btn.edit`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 326: `    background-color: #e2e2ff;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#e2e2ff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#e2e2ff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 327: `    color: var(--color-blue);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--color-blue)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-blue)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 328: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 329: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 330: `.action-icon-btn.delete {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.action-icon-btn.delete`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 331: `    background-color: #fcdfe5;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#fcdfe5`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#fcdfe5`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 332: `    color: #ec4899;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ec4899`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ec4899`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 333: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 334: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 335: `.action-icon-btn:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.action-icon-btn:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 336: `    transform: scale(1.1);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transform`.
- **¿Qué hace?**: Aplica la propiedad visual `transform` con el valor `scale(1.1)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 337: `    box-shadow: 0 4px 8px rgba(0,0,0,0.08);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 4px 8px rgba(0,0,0,0.08)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 338: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 339: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 340: `/* SECCIÓN INFERIOR (PAGINACIÓN Y AGREGAR) */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 341: `.inventory-footer-section {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.inventory-footer-section`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 342: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 343: `    justify-content: space-between;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 344: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 345: `    margin-bottom: 30px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `30px`.
- **¿Qué hace?**: Aplica un espaciado físico de `30px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 346: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 347: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 348: `.btn-add-product {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-add-product`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 349: `    background: var(--grad-purple);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `var(--grad-purple)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 350: `    border: none;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `none`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 351: `    border-radius: 15px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `15px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 352: `    padding: 12px 24px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `12px 24px`.
- **¿Qué hace?**: Aplica un espaciado físico de `12px 24px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 353: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 354: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 355: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 356: `    text-decoration: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-decoration`.
- **¿Qué hace?**: Aplica la propiedad visual `text-decoration` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-decoration`, visualizándose con las directivas por defecto del navegador web.

### Línea 357: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 358: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 359: `    gap: 8px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `8px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 360: `    box-shadow: 0 4px 10px rgba(155, 93, 229, 0.2);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 4px 10px rgba(155, 93, 229, 0.2)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 361: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 362: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 363: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 364: `.btn-add-product:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-add-product:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 365: `    transform: translateY(-2px);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transform`.
- **¿Qué hace?**: Aplica la propiedad visual `transform` con el valor `translateY(-2px)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 366: `    box-shadow: 0 6px 15px rgba(155, 93, 229, 0.35);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 6px 15px rgba(155, 93, 229, 0.35)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 367: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 368: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 369: `/* Paginación */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 370: `.pagination-controls {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.pagination-controls`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 371: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 372: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 373: `    align-items: flex-end;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 374: `    gap: 5px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `5px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 375: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 376: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 377: `.pagination-links {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.pagination-links`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 378: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 379: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 380: `    gap: 8px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `8px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 381: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 382: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 383: `.page-btn {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.page-btn`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 384: `    width: 32px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `32px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 385: `    height: 32px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `32px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 386: `    border-radius: 8px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `8px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 387: `    background-color: var(--card-bg);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--card-bg)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--card-bg)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 388: `    border: 1px solid #ebd0f0;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `1px solid #ebd0f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 389: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 390: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 391: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 392: `    justify-content: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 393: `    text-decoration: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-decoration`.
- **¿Qué hace?**: Aplica la propiedad visual `text-decoration` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-decoration`, visualizándose con las directivas por defecto del navegador web.

### Línea 394: `    font-size: 13px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `13px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 395: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 396: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 397: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 398: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 399: `.page-btn:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.page-btn:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 400: `    border-color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('border-color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 401: `    color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 402: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 403: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 404: `.page-btn.active {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.page-btn.active`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 405: `    background-color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 406: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 407: `    border-color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('border-color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 408: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 409: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 410: `.page-btn.disabled {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.page-btn.disabled`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 411: `    opacity: 0.5;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `opacity`.
- **¿Qué hace?**: Aplica la propiedad visual `opacity` con el valor `0.5` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `opacity`, visualizándose con las directivas por defecto del navegador web.

### Línea 412: `    pointer-events: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `pointer-events`.
- **¿Qué hace?**: Aplica la propiedad visual `pointer-events` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `pointer-events`, visualizándose con las directivas por defecto del navegador web.

### Línea 413: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 414: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 415: `.pagination-info {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.pagination-info`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 416: `    font-size: 11px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `11px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 417: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 418: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 419: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 420: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 421: `/* RESPONSIVE DESIGN */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 422: `@media (max-width: 1280px) {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `@media (max-width: 1280px)`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 423: `    .inventory-stats-row {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.inventory-stats-row`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 424: `        grid-template-columns: repeat(2, 1fr);`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 425: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 426: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 427: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 428: `@media (max-width: 991px) {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `@media (max-width: 991px)`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 429: `    .filter-bar-form {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.filter-bar-form`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 430: `        flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 431: `        align-items: stretch;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 432: `        gap: 15px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `15px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 433: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 434: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 435: `    .filter-select-group {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.filter-select-group`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 436: `        justify-content: space-between;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 437: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 438: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 439: `    .btn-clear-filters {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-clear-filters`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 440: `        justify-content: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 441: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 442: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 443: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 444: `@media (max-width: 768px) {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `@media (max-width: 768px)`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 445: `    .inventory-stats-row {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.inventory-stats-row`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 446: `        grid-template-columns: 1fr;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 447: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 448: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 449: `    .inventory-footer-section {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.inventory-footer-section`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 450: `        flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 451: `        align-items: stretch;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 452: `        gap: 20px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `20px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 453: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 454: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 455: `    .btn-add-product {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-add-product`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 456: `        justify-content: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 457: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 458: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 459: `    .pagination-controls {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.pagination-controls`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 460: `        align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 461: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 462: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 463: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 464: `/* ==========================================================================`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 465: `   MODAL PARA ACCIONES DE PRODUCTO (AGREGAR, EDITAR, DETALLE)`
- **¿Para qué sirve?**: Definir directivas o reglas CSS.
- **¿Qué hace?**: Configura valores de renderizado para los elementos de la página.
- **¿Qué pasa si se daña?**: El navegador podría ignorar el estilo, provocando deformaciones visuales en el diseño.

### Línea 466: `   ========================================================================== */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 467: `.modal {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.modal`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 468: `    display: none;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 469: `    position: fixed;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `position`.
- **¿Qué hace?**: Aplica la propiedad visual `position` con el valor `fixed` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `position`, visualizándose con las directivas por defecto del navegador web.

### Línea 470: `    z-index: 1000;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `z-index`.
- **¿Qué hace?**: Aplica la propiedad visual `z-index` con el valor `1000` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `z-index`, visualizándose con las directivas por defecto del navegador web.

### Línea 471: `    left: 0;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `left`.
- **¿Qué hace?**: Aplica la propiedad visual `left` con el valor `0` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `left`, visualizándose con las directivas por defecto del navegador web.

### Línea 472: `    top: 0;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `top`.
- **¿Qué hace?**: Aplica la propiedad visual `top` con el valor `0` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `top`, visualizándose con las directivas por defecto del navegador web.

### Línea 473: `    width: 100%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `100%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 474: `    height: 100%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `100%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 475: `    overflow: auto;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `overflow`.
- **¿Qué hace?**: Aplica la propiedad visual `overflow` con el valor `auto` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `overflow`, visualizándose con las directivas por defecto del navegador web.

### Línea 476: `    background-color: rgba(18, 14, 36, 0.4);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `rgba(18, 14, 36, 0.4)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `rgba(18, 14, 36, 0.4)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 477: `    backdrop-filter: blur(5px);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `backdrop-filter`.
- **¿Qué hace?**: Aplica la propiedad visual `backdrop-filter` con el valor `blur(5px)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `backdrop-filter`, visualizándose con las directivas por defecto del navegador web.

### Línea 478: `    justify-content: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 479: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 480: `    opacity: 0;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `opacity`.
- **¿Qué hace?**: Aplica la propiedad visual `opacity` con el valor `0` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `opacity`, visualizándose con las directivas por defecto del navegador web.

### Línea 481: `    transition: opacity 0.3s ease;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `opacity 0.3s ease` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 482: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 483: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 484: `.modal.open {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.modal.open`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 485: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 486: `    opacity: 1;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `opacity`.
- **¿Qué hace?**: Aplica la propiedad visual `opacity` con el valor `1` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `opacity`, visualizándose con las directivas por defecto del navegador web.

### Línea 487: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 488: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 489: `.modal-content {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.modal-content`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 490: `    background-color: var(--card-bg);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--card-bg)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--card-bg)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 491: `    border: var(--border-style);`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `var(--border-style)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 492: `    border-radius: 24px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `24px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 493: `    width: 90%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `90%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 494: `    max-width: 650px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`max-width`) en `650px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 495: `    box-shadow: 0 10px 30px rgba(111, 45, 189, 0.15);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 10px 30px rgba(111, 45, 189, 0.15)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 496: `    overflow: hidden;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `overflow`.
- **¿Qué hace?**: Aplica la propiedad visual `overflow` con el valor `hidden` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `overflow`, visualizándose con las directivas por defecto del navegador web.

### Línea 497: `    animation: modalSlideIn 0.3s ease;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `animation`.
- **¿Qué hace?**: Aplica la propiedad visual `animation` con el valor `modalSlideIn 0.3s ease` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `animation`, visualizándose con las directivas por defecto del navegador web.

### Línea 498: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 499: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 500: `@keyframes modalSlideIn {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `@keyframes modalSlideIn`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 501: `    from { transform: translateY(-20px); opacity: 0; }`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `from`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 502: `    to { transform: translateY(0); opacity: 1; }`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `to`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 503: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 504: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 505: `.modal-header {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.modal-header`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 506: `    background-color: #fbf6ff;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#fbf6ff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#fbf6ff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 507: `    padding: 20px 25px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `20px 25px`.
- **¿Qué hace?**: Aplica un espaciado físico de `20px 25px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 508: `    border-bottom: 2px solid #e2d1f0;`
- **¿Para qué sirve?**: Definir el borde (`border-bottom`) con el valor `2px solid #e2d1f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 509: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 510: `    justify-content: space-between;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 511: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 512: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 513: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 514: `.modal-header h2 {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.modal-header h2`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 515: `    font-size: 18px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `18px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 516: `    font-weight: 800;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `800`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 517: `    color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 518: `    margin: 0;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin`) con el valor `0`.
- **¿Qué hace?**: Aplica un espaciado físico de `0` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 519: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 520: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 521: `.modal-close-btn {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.modal-close-btn`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 522: `    background: none;`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `none`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 523: `    border: none;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `none`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 524: `    font-size: 24px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `24px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 525: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 526: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 527: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 528: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 529: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 530: `.modal-close-btn:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.modal-close-btn:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 531: `    color: var(--color-pink);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--color-pink)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-pink)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 532: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 533: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 534: `.modal-body {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.modal-body`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 535: `    padding: 25px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `25px`.
- **¿Qué hace?**: Aplica un espaciado físico de `25px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 536: `    max-height: 80vh;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`max-height`) en `80vh`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 537: `    overflow-y: auto;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `overflow-y`.
- **¿Qué hace?**: Aplica la propiedad visual `overflow-y` con el valor `auto` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `overflow-y`, visualizándose con las directivas por defecto del navegador web.

### Línea 538: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 539: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 540: `/* Formulario en Grid */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 541: `.modal-grid-form {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.modal-grid-form`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 542: `    display: grid;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 543: `    grid-template-columns: 1fr 1fr;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 544: `    gap: 15px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `15px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 545: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 546: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 547: `.form-full-row {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.form-full-row`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 548: `    grid-column: span 2;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 549: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 550: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 551: `.form-field-group {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.form-field-group`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 552: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 553: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 554: `    gap: 6px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `6px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 555: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 556: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 557: `.form-field-group label {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.form-field-group label`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 558: `    font-size: 11px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `11px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 559: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 560: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 561: `    text-transform: uppercase;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-transform`.
- **¿Qué hace?**: Aplica la propiedad visual `text-transform` con el valor `uppercase` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 562: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 563: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 564: `.form-field-group input, `
- **¿Para qué sirve?**: Definir directivas o reglas CSS.
- **¿Qué hace?**: Configura valores de renderizado para los elementos de la página.
- **¿Qué pasa si se daña?**: El navegador podría ignorar el estilo, provocando deformaciones visuales en el diseño.

### Línea 565: `.form-field-group select, `
- **¿Para qué sirve?**: Definir directivas o reglas CSS.
- **¿Qué hace?**: Configura valores de renderizado para los elementos de la página.
- **¿Qué pasa si se daña?**: El navegador podría ignorar el estilo, provocando deformaciones visuales en el diseño.

### Línea 566: `.form-field-group textarea {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.form-field-group textarea`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 567: `    background-color: #f7f3fc;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#f7f3fc`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#f7f3fc`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 568: `    border: 2px solid #ebd0f0;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `2px solid #ebd0f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 569: `    border-radius: 12px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `12px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 570: `    padding: 10px 15px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `10px 15px`.
- **¿Qué hace?**: Aplica un espaciado físico de `10px 15px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 571: `    font-family: inherit;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-family`) en `inherit`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 572: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 573: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 574: `    outline: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `outline`.
- **¿Qué hace?**: Aplica la propiedad visual `outline` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `outline`, visualizándose con las directivas por defecto del navegador web.

### Línea 575: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 576: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 577: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 578: `.form-field-group textarea {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.form-field-group textarea`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 579: `    resize: vertical;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `resize`.
- **¿Qué hace?**: Aplica la propiedad visual `resize` con el valor `vertical` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `resize`, visualizándose con las directivas por defecto del navegador web.

### Línea 580: `    min-height: 80px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`min-height`) en `80px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 581: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 582: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 583: `.form-field-group input:focus, `
- **¿Para qué sirve?**: Definir directivas o reglas CSS.
- **¿Qué hace?**: Configura valores de renderizado para los elementos de la página.
- **¿Qué pasa si se daña?**: El navegador podría ignorar el estilo, provocando deformaciones visuales en el diseño.

### Línea 584: `.form-field-group select:focus, `
- **¿Para qué sirve?**: Definir directivas o reglas CSS.
- **¿Qué hace?**: Configura valores de renderizado para los elementos de la página.
- **¿Qué pasa si se daña?**: El navegador podría ignorar el estilo, provocando deformaciones visuales en el diseño.

### Línea 585: `.form-field-group textarea:focus {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.form-field-group textarea:focus`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 586: `    border-color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('border-color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 587: `    background-color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 588: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 589: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 590: `.form-actions-row {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.form-actions-row`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 591: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 592: `    justify-content: flex-end;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 593: `    gap: 12px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `12px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 594: `    margin-top: 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-top`) con el valor `20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 595: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 596: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 597: `.btn-modal-cancel {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-modal-cancel`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 598: `    background-color: #ebd3f8;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#ebd3f8`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ebd3f8`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 599: `    color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 600: `    border: none;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `none`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 601: `    border-radius: 12px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `12px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 602: `    padding: 10px 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `10px 20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `10px 20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 603: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 604: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 605: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 606: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 607: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 608: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 609: `.btn-modal-cancel:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-modal-cancel:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 610: `    background-color: #e2c0f5;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#e2c0f5`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#e2c0f5`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 611: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 612: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 613: `.btn-modal-submit {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-modal-submit`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 614: `    background-color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 615: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 616: `    border: none;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `none`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 617: `    border-radius: 12px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `12px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 618: `    padding: 10px 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `10px 20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `10px 20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 619: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 620: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 621: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 622: `    box-shadow: 0 4px 10px rgba(111, 45, 189, 0.2);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 4px 10px rgba(111, 45, 189, 0.2)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 623: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 624: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 625: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 626: `.btn-modal-submit:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-modal-submit:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 627: `    transform: translateY(-1px);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transform`.
- **¿Qué hace?**: Aplica la propiedad visual `transform` con el valor `translateY(-1px)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 628: `    box-shadow: 0 6px 15px rgba(111, 45, 189, 0.3);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 6px 15px rgba(111, 45, 189, 0.3)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 629: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 630: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 631: `/* Image preview styles */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 632: `.image-preview-container {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.image-preview-container`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 633: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 634: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 635: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 636: `    gap: 10px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `10px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 637: `    padding: 15px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `15px`.
- **¿Qué hace?**: Aplica un espaciado físico de `15px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 638: `    border: 2px dashed #ebd0f0;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `2px dashed #ebd0f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 639: `    border-radius: 15px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `15px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 640: `    background-color: #fbf9ff;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#fbf9ff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#fbf9ff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 641: `    margin-top: 5px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-top`) con el valor `5px`.
- **¿Qué hace?**: Aplica un espaciado físico de `5px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 642: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 643: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 644: `.image-preview-box {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.image-preview-box`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 645: `    width: 120px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `120px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 646: `    height: 120px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `120px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 647: `    border-radius: 12px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `12px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 648: `    border: 1px solid #e2d1f0;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `1px solid #e2d1f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 649: `    object-fit: cover;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `object-fit`.
- **¿Qué hace?**: Aplica la propiedad visual `object-fit` con el valor `cover` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `object-fit`, visualizándose con las directivas por defecto del navegador web.

### Línea 650: `    background-color: #f7f3fc;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#f7f3fc`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#f7f3fc`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 651: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 652: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 653: `    justify-content: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 654: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 655: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 656: `.image-preview-box img {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.image-preview-box img`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 657: `    width: 100%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `100%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 658: `    height: 100%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `100%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 659: `    border-radius: 12px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `12px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 660: `    object-fit: cover;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `object-fit`.
- **¿Qué hace?**: Aplica la propiedad visual `object-fit` con el valor `cover` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `object-fit`, visualizándose con las directivas por defecto del navegador web.

### Línea 661: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 662: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 663: `/* Detalle Grid styles */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 664: `.details-grid {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.details-grid`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 665: `    display: grid;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 666: `    grid-template-columns: 1fr 1fr;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 667: `    gap: 15px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `15px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 668: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 669: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 670: `.detail-item {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.detail-item`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 671: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 672: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 673: `    gap: 4px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `4px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 674: `    background-color: #fcfaff;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#fcfaff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#fcfaff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 675: `    border: 1px solid #ebd0f0;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `1px solid #ebd0f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 676: `    padding: 12px 15px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `12px 15px`.
- **¿Qué hace?**: Aplica un espaciado físico de `12px 15px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 677: `    border-radius: 12px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `12px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 678: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 679: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 680: `.detail-item strong {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.detail-item strong`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 681: `    font-size: 10px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `10px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 682: `    text-transform: uppercase;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-transform`.
- **¿Qué hace?**: Aplica la propiedad visual `text-transform` con el valor `uppercase` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 683: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 684: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 685: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 686: `.detail-item span {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.detail-item span`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 687: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 688: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 689: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 690: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 691: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 692: `.product-profile-card {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.product-profile-card`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 693: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 694: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 695: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 696: `    text-align: center;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-align`.
- **¿Qué hace?**: Aplica la propiedad visual `text-align` con el valor `center` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-align`, visualizándose con las directivas por defecto del navegador web.

### Línea 697: `    padding-bottom: 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding-bottom`) con el valor `20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 698: `    border-bottom: 2px dashed #ebd0f0;`
- **¿Para qué sirve?**: Definir el borde (`border-bottom`) con el valor `2px dashed #ebd0f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 699: `    margin-bottom: 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 700: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 701: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 702: `.product-avatar-img {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.product-avatar-img`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 703: `    width: 100px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `100px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 704: `    height: 100px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `100px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 705: `    border-radius: 20px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `20px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 706: `    object-fit: cover;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `object-fit`.
- **¿Qué hace?**: Aplica la propiedad visual `object-fit` con el valor `cover` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `object-fit`, visualizándose con las directivas por defecto del navegador web.

### Línea 707: `    border: 2px solid #ebd0f0;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `2px solid #ebd0f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 708: `    box-shadow: 0 4px 10px rgba(111, 45, 189, 0.08);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 4px 10px rgba(111, 45, 189, 0.08)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 709: `    margin-bottom: 12px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `12px`.
- **¿Qué hace?**: Aplica un espaciado físico de `12px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 710: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 711: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 712: `.product-profile-card h3 {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.product-profile-card h3`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 713: `    font-size: 20px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `20px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 714: `    font-weight: 800;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `800`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 715: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 716: `    margin: 0;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin`) con el valor `0`.
- **¿Qué hace?**: Aplica un espaciado físico de `0` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 717: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 718: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 719: `.product-profile-card span {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.product-profile-card span`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 720: `    margin-top: 6px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-top`) con el valor `6px`.
- **¿Qué hace?**: Aplica un espaciado físico de `6px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 721: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 722: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

