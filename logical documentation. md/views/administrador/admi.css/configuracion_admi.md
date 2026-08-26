# Documentación Lógica: configuracion_admi.css

## Información General
- **Ruta del Archivo**: `views/administrador/admi.css/configuracion_admi.css`
- **Tipo**: Hoja de Estilos CSS

## Estructura del Código
Este archivo contiene las directivas y lógica de configuracion_admi.css. A continuación, se detalla el comportamiento de cada línea.

## Explicación Línea por Línea

### Línea 1: `/* ==========================================================================`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 2: `   CONFIGURACIÓN ADMINISTRADOR CSS - SIVC`
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

### Línea 23: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 24: `    --grad-purple: linear-gradient(135deg, #6f2dbd 0%, #b5179e 100%);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `--grad-purple`.
- **¿Qué hace?**: Aplica la propiedad visual `--grad-purple` con el valor `linear-gradient(135deg, #6f2dbd 0%, #b5179e 100%)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `--grad-purple`, visualizándose con las directivas por defecto del navegador web.

### Línea 25: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 26: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 27: `/* ENCABEZADO CON ILUSTRACIÓN */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 28: `.header-with-illustration {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.header-with-illustration`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 29: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 30: `    justify-content: space-between;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 31: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 32: `    margin-bottom: 25px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `25px`.
- **¿Qué hace?**: Aplica un espaciado físico de `25px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 33: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 34: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 35: `.header-illustration-img {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.header-illustration-img`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 36: `    width: 170px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `170px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 37: `    height: auto;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `auto`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 38: `    border-radius: 12px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `12px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 39: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 40: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 41: `/* GRUPOS DE CONFIGURACIÓN (TARJETAS) */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 42: `.config-options-list {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.config-options-list`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 43: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 44: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 45: `    gap: 25px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `25px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 46: `    margin-bottom: 30px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `30px`.
- **¿Qué hace?**: Aplica un espaciado físico de `30px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 47: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 48: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 49: `.config-card {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.config-card`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 50: `    background-color: var(--card-bg);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--card-bg)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--card-bg)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 51: `    border: var(--border-style);`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `var(--border-style)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 52: `    border-radius: var(--radius-md);`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `var(--radius-md)`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 53: `    padding: 25px 35px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `25px 35px`.
- **¿Qué hace?**: Aplica un espaciado físico de `25px 35px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 54: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 55: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 56: `    justify-content: space-between;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 57: `    box-shadow: 0 4px 12px rgba(111, 45, 189, 0.02);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 4px 12px rgba(111, 45, 189, 0.02)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 58: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 59: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 60: `.config-info {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.config-info`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 61: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 62: `    flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 63: `    gap: 5px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `5px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 64: `    flex: 1;`
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

### Línea 67: `.config-info h3 {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.config-info h3`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 68: `    font-size: 18px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `18px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 69: `    font-weight: 800;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `800`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 70: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 71: `    margin: 0;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin`) con el valor `0`.
- **¿Qué hace?**: Aplica un espaciado físico de `0` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 72: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 73: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 74: `.config-info p {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.config-info p`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 75: `    font-size: 13px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `13px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 76: `    color: var(--text-muted);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-muted)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-muted)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 77: `    font-weight: 600;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `600`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 78: `    margin: 0;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin`) con el valor `0`.
- **¿Qué hace?**: Aplica un espaciado físico de `0` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 79: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 80: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 81: `.config-control-panel {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.config-control-panel`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 82: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 83: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 84: `    justify-content: flex-end;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 85: `    flex: 1.5;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 86: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 87: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 88: `/* 1. CONTROL COLOR DE FONDO */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 89: `.color-palette-group {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.color-palette-group`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 90: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 91: `    gap: 15px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `15px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 92: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 93: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 94: `.color-option-btn {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.color-option-btn`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 95: `    width: 44px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `44px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 96: `    height: 44px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `44px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 97: `    border-radius: 50%;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `50%`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 98: `    border: 3px solid transparent;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `3px solid transparent`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 99: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 100: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 101: `    position: relative;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `position`.
- **¿Qué hace?**: Aplica la propiedad visual `position` con el valor `relative` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `position`, visualizándose con las directivas por defecto del navegador web.

### Línea 102: `    box-shadow: 0 3px 6px rgba(0,0,0,0.08);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 3px 6px rgba(0,0,0,0.08)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 103: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 104: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 105: `.color-option-btn:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.color-option-btn:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 106: `    transform: scale(1.15);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transform`.
- **¿Qué hace?**: Aplica la propiedad visual `transform` con el valor `scale(1.15)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 107: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 108: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 109: `.color-option-btn.selected {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.color-option-btn.selected`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 110: `    border-color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('border-color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 111: `    transform: scale(1.15);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transform`.
- **¿Qué hace?**: Aplica la propiedad visual `transform` con el valor `scale(1.15)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 112: `    box-shadow: 0 4px 10px rgba(111, 45, 189, 0.25);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 4px 10px rgba(111, 45, 189, 0.25)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 113: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 114: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 115: `/* 2. CONTROL TIPOGRAFÍA */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 116: `.font-buttons-group {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.font-buttons-group`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 117: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 118: `    gap: 12px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `12px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 119: `    flex-wrap: wrap;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 120: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 121: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 122: `.font-option-btn {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.font-option-btn`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 123: `    padding: 10px 20px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `10px 20px`.
- **¿Qué hace?**: Aplica un espaciado físico de `10px 20px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 124: `    border-radius: 15px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `15px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 125: `    border: 2px solid #ebd0f0;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `2px solid #ebd0f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 126: `    background-color: var(--card-bg);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--card-bg)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--card-bg)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 127: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 128: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 129: `    font-size: 13px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `13px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 130: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 131: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 132: `    text-transform: uppercase;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `text-transform`.
- **¿Qué hace?**: Aplica la propiedad visual `text-transform` con el valor `uppercase` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `text-transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 133: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 134: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 135: `.font-option-btn:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.font-option-btn:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 136: `    border-color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('border-color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 137: `    color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 138: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 139: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 140: `.font-option-btn.selected {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.font-option-btn.selected`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 141: `    background: var(--grad-purple);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `var(--grad-purple)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 142: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 143: `    border-color: transparent;`
- **¿Para qué sirve?**: Definir la coloración ('border-color') con el valor `transparent`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `transparent`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 144: `    box-shadow: 0 4px 8px rgba(111, 45, 189, 0.2);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 4px 8px rgba(111, 45, 189, 0.2)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 145: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 146: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 147: `/* 3. CONTROL TAMAÑO DE FUENTE */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 148: `.font-size-slider-wrapper {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.font-size-slider-wrapper`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 149: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 150: `    align-items: center;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 151: `    gap: 20px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `20px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 152: `    width: 100%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `100%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 153: `    max-width: 450px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`max-width`) en `450px`.
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

### Línea 156: `.slider-label-a {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.slider-label-a`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 157: `    font-weight: 800;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `800`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 158: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 159: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 160: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 161: `.slider-label-a.small { font-size: 12px; }`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.slider-label-a.small`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 162: `.slider-label-a.large { font-size: 22px; }`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.slider-label-a.large`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 163: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 164: `.font-size-range-input {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.font-size-range-input`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 165: `    -webkit-appearance: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `-webkit-appearance`.
- **¿Qué hace?**: Aplica la propiedad visual `-webkit-appearance` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `-webkit-appearance`, visualizándose con las directivas por defecto del navegador web.

### Línea 166: `    width: 100%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `100%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 167: `    height: 8px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `8px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 168: `    border-radius: 4px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `4px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 169: `    background: #e2d1f0;`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `#e2d1f0`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 170: `    outline: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `outline`.
- **¿Qué hace?**: Aplica la propiedad visual `outline` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `outline`, visualizándose con las directivas por defecto del navegador web.

### Línea 171: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 172: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 173: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 174: `/* Custom track and thumb styles for input range */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 175: `.font-size-range-input::-webkit-slider-thumb {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.font-size-range-input::-webkit-slider-thumb`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 176: `    -webkit-appearance: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `-webkit-appearance`.
- **¿Qué hace?**: Aplica la propiedad visual `-webkit-appearance` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `-webkit-appearance`, visualizándose con las directivas por defecto del navegador web.

### Línea 177: `    appearance: none;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `appearance`.
- **¿Qué hace?**: Aplica la propiedad visual `appearance` con el valor `none` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `appearance`, visualizándose con las directivas por defecto del navegador web.

### Línea 178: `    width: 22px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `22px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 179: `    height: 22px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `22px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 180: `    border-radius: 50%;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `50%`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 181: `    background: var(--color-purple);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `var(--color-purple)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 182: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 183: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 184: `    box-shadow: 0 3px 6px rgba(111, 45, 189, 0.3);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 3px 6px rgba(111, 45, 189, 0.3)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 185: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 186: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 187: `.font-size-range-input::-webkit-slider-thumb:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.font-size-range-input::-webkit-slider-thumb:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 188: `    transform: scale(1.15);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transform`.
- **¿Qué hace?**: Aplica la propiedad visual `transform` con el valor `scale(1.15)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 189: `    background: var(--color-magenta);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `var(--color-magenta)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 190: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 191: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 192: `.font-size-range-input::-moz-range-thumb {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.font-size-range-input::-moz-range-thumb`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 193: `    width: 22px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `22px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 194: `    height: 22px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `22px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 195: `    border-radius: 50%;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `50%`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 196: `    background: var(--color-purple);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `var(--color-purple)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 197: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 198: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 199: `    border: none;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `none`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 200: `    box-shadow: 0 3px 6px rgba(111, 45, 189, 0.3);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 3px 6px rgba(111, 45, 189, 0.3)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 201: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 202: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 203: `.font-size-range-input::-moz-range-thumb:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.font-size-range-input::-moz-range-thumb:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 204: `    transform: scale(1.15);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transform`.
- **¿Qué hace?**: Aplica la propiedad visual `transform` con el valor `scale(1.15)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 205: `    background: var(--color-magenta);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `var(--color-magenta)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 206: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 207: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 208: `/* 4. MODO OSCURO SWITCH */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 209: `.switch-toggle-wrapper {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.switch-toggle-wrapper`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 210: `    position: relative;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `position`.
- **¿Qué hace?**: Aplica la propiedad visual `position` con el valor `relative` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `position`, visualizándose con las directivas por defecto del navegador web.

### Línea 211: `    display: inline-block;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 212: `    width: 60px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `60px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 213: `    height: 34px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `34px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 214: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 215: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 216: `.switch-toggle-wrapper input {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.switch-toggle-wrapper input`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 217: `    opacity: 0;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `opacity`.
- **¿Qué hace?**: Aplica la propiedad visual `opacity` con el valor `0` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `opacity`, visualizándose con las directivas por defecto del navegador web.

### Línea 218: `    width: 0;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `0`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 219: `    height: 0;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `0`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 220: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 221: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 222: `.slider-round {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.slider-round`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 223: `    position: absolute;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `position`.
- **¿Qué hace?**: Aplica la propiedad visual `position` con el valor `absolute` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `position`, visualizándose con las directivas por defecto del navegador web.

### Línea 224: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 225: `    top: 0; left: 0; right: 0; bottom: 0;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `top`.
- **¿Qué hace?**: Aplica la propiedad visual `top` con el valor `0 left` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `top`, visualizándose con las directivas por defecto del navegador web.

### Línea 226: `    background-color: #ebd3f8;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#ebd3f8`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ebd3f8`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 227: `    transition: .4s;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `.4s` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 228: `    border-radius: 34px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `34px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 229: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 230: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 231: `.slider-round:before {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.slider-round:before`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 232: `    position: absolute;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `position`.
- **¿Qué hace?**: Aplica la propiedad visual `position` con el valor `absolute` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `position`, visualizándose con las directivas por defecto del navegador web.

### Línea 233: `    content: "";`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `content`.
- **¿Qué hace?**: Aplica la propiedad visual `content` con el valor `""` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `content`, visualizándose con las directivas por defecto del navegador web.

### Línea 234: `    height: 26px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`height`) en `26px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 235: `    width: 26px;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `26px`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 236: `    left: 4px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `left`.
- **¿Qué hace?**: Aplica la propiedad visual `left` con el valor `4px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `left`, visualizándose con las directivas por defecto del navegador web.

### Línea 237: `    bottom: 4px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `bottom`.
- **¿Qué hace?**: Aplica la propiedad visual `bottom` con el valor `4px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `bottom`, visualizándose con las directivas por defecto del navegador web.

### Línea 238: `    background-color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 239: `    transition: .4s;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `.4s` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 240: `    border-radius: 50%;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `50%`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 241: `    box-shadow: 0 2px 5px rgba(0,0,0,0.15);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 2px 5px rgba(0,0,0,0.15)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 242: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 243: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 244: `input:checked + .slider-round {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `input:checked + .slider-round`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 245: `    background-color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 246: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 247: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 248: `input:focus + .slider-round {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `input:focus + .slider-round`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 249: `    box-shadow: 0 0 1px var(--color-purple);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 0 1px var(--color-purple)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 250: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 251: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 252: `input:checked + .slider-round:before {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `input:checked + .slider-round:before`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 253: `    transform: translateX(26px);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transform`.
- **¿Qué hace?**: Aplica la propiedad visual `transform` con el valor `translateX(26px)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 254: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 255: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 256: `/* ACCIONES INFERIORES */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 257: `.config-footer-actions {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.config-footer-actions`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 258: `    display: flex;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 259: `    justify-content: flex-end;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 260: `    gap: 15px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `15px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 261: `    margin-bottom: 40px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`margin-bottom`) con el valor `40px`.
- **¿Qué hace?**: Aplica un espaciado físico de `40px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 262: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 263: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 264: `.btn-config-reset {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-config-reset`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 265: `    background-color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('background-color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 266: `    border: 2px solid #ebd0f0;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `2px solid #ebd0f0`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 267: `    border-radius: 15px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `15px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 268: `    padding: 12px 28px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `12px 28px`.
- **¿Qué hace?**: Aplica un espaciado físico de `12px 28px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 269: `    color: var(--text-dark);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--text-dark)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--text-dark)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 270: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 271: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 272: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 273: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 274: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 275: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 276: `.btn-config-reset:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-config-reset:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 277: `    border-color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('border-color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 278: `    color: var(--color-purple);`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `var(--color-purple)`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `var(--color-purple)`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 279: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 280: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 281: `.btn-config-save {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-config-save`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 282: `    background: var(--grad-purple);`
- **¿Para qué sirve?**: Establecer la propiedad de fondo (`background`) con el valor `var(--grad-purple)`.
- **¿Qué hace?**: Define un color, imagen o degradado de fondo en el elemento seleccionado.
- **¿Qué pasa si se daña?**: El elemento perderá su fondo de color o imagen, mostrándose transparente o con el color base del navegador, arruinando la jerarquía visual.

### Línea 283: `    border: none;`
- **¿Para qué sirve?**: Definir el borde (`border`) con el valor `none`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 284: `    border-radius: 15px;`
- **¿Para qué sirve?**: Definir el borde (`border-radius`) con el valor `15px`.
- **¿Qué hace?**: Aplica una línea perimetral alrededor del elemento con el estilo, grosor y color indicados.
- **¿Qué pasa si se daña?**: Se eliminará el borde visual, lo que causará que el elemento se mezcle visualmente con el fondo o pierda su delimitación.

### Línea 285: `    padding: 12px 30px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `12px 30px`.
- **¿Qué hace?**: Aplica un espaciado físico de `12px 30px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 286: `    color: #ffffff;`
- **¿Para qué sirve?**: Definir la coloración ('color') con el valor `#ffffff`.
- **¿Qué hace?**: Modifica el color del texto o fondo del elemento seleccionado a `#ffffff`.
- **¿Qué pasa si se daña?**: El elemento se renderizará con el color por defecto (ej. texto negro sobre fondo blanco), afectando la paleta de colores y el contraste del diseño.

### Línea 287: `    font-size: 14px;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-size`) en `14px`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 288: `    font-weight: 700;`
- **¿Para qué sirve?**: Configurar la tipografía o estilo de fuente (`font-weight`) en `700`.
- **¿Qué hace?**: Ajusta el tamaño, grosor o familia de la tipografía con la que se muestra el texto.
- **¿Qué pasa si se daña?**: El texto se verá en una tipografía predeterminada (como Times New Roman), rompiendo la línea gráfica del sistema y su legibilidad.

### Línea 289: `    cursor: pointer;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `cursor`.
- **¿Qué hace?**: Aplica la propiedad visual `cursor` con el valor `pointer` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `cursor`, visualizándose con las directivas por defecto del navegador web.

### Línea 290: `    box-shadow: 0 4px 12px rgba(111, 45, 189, 0.2);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 4px 12px rgba(111, 45, 189, 0.2)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 291: `    transition: var(--transition);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transition`.
- **¿Qué hace?**: Aplica la propiedad visual `transition` con el valor `var(--transition)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transition`, visualizándose con las directivas por defecto del navegador web.

### Línea 292: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 293: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 294: `.btn-config-save:hover {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.btn-config-save:hover`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 295: `    transform: translateY(-1px);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `transform`.
- **¿Qué hace?**: Aplica la propiedad visual `transform` con el valor `translateY(-1px)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `transform`, visualizándose con las directivas por defecto del navegador web.

### Línea 296: `    box-shadow: 0 6px 16px rgba(111, 45, 189, 0.3);`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `box-shadow`.
- **¿Qué hace?**: Aplica la propiedad visual `box-shadow` con el valor `0 6px 16px rgba(111, 45, 189, 0.3)` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `box-shadow`, visualizándose con las directivas por defecto del navegador web.

### Línea 297: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 298: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 299: `/* RESPONSIVE DESIGN */`
- **¿Para qué sirve?**: Comentario descriptivo de secciones en la hoja de estilos.
- **¿Qué hace?**: Línea ignorada por el motor de renderizado CSS del navegador.
- **¿Qué pasa si se daña?**: Ninguno, solo se remueven las anotaciones aclaratorias del diseño.

### Línea 300: `@media (max-width: 991px) {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `@media (max-width: 991px)`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 301: `    .config-card {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.config-card`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 302: `        flex-direction: column;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 303: `        align-items: flex-start;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 304: `        gap: 15px;`
- **¿Para qué sirve?**: Definir la regla de estilo para la propiedad `gap`.
- **¿Qué hace?**: Aplica la propiedad visual `gap` con el valor `15px` sobre el selector correspondiente.
- **¿Qué pasa si se daña?**: El elemento perderá la propiedad `gap`, visualizándose con las directivas por defecto del navegador web.

### Línea 305: `        padding: 20px 25px;`
- **¿Para qué sirve?**: Configurar el espacio exterior o interior (`padding`) con el valor `20px 25px`.
- **¿Qué hace?**: Aplica un espaciado físico de `20px 25px` alrededor o dentro del contenedor para organizar los elementos.
- **¿Qué pasa si se daña?**: Los elementos visuales se colapsarán o amontonarán en la pantalla, desalineándose y perdiendo la estructura de rejilla responsiva.

### Línea 306: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 307: *(Línea vacía)*
- **¿Para qué sirve?**: Espaciado y separación visual en la hoja de estilos CSS.
- **¿Qué hace?**: Es una línea vacía que no realiza ninguna acción en la renderización.
- **¿Qué pasa si se daña?**: No produce ningún efecto adverso en el diseño, solo disminuye el orden visual del archivo de estilos.

### Línea 308: `    .config-control-panel {`
- **¿Para qué sirve?**: Abrir el bloque de reglas CSS aplicables a `.config-control-panel`.
- **¿Qué hace?**: Inicia la definición de las propiedades visuales que adoptará cualquier elemento HTML que coincida con el selector.
- **¿Qué pasa si se daña?**: Provoca un error de sintaxis CSS grave que causará que el navegador descarte todo el bloque de estilos, dejando los elementos correspondientes sin diseño visual.

### Línea 309: `        justify-content: flex-start;`
- **¿Para qué sirve?**: Configurar el modelo de caja y distribución de elementos.
- **¿Qué hace?**: Organiza la distribución de elementos hijos (por ejemplo, alineándolos horizontalmente mediante Flexbox o Grid).
- **¿Qué pasa si se daña?**: Los elementos hijos se apilarán en bloque vertical, rompiendo la estructura de columnas de la barra lateral, tarjetas de dashboard y tablas, destruyendo la adaptabilidad del diseño.

### Línea 310: `        width: 100%;`
- **¿Para qué sirve?**: Determinar la dimensión de ancho o alto (`width`) en `100%`.
- **¿Qué hace?**: Fija las dimensiones físicas (ancho o alto) del contenedor o imagen en la pantalla.
- **¿Qué pasa si se daña?**: El elemento tomará dimensiones automáticas o heredadas, expandiéndose o encogiéndose descontroladamente, lo que deformará el diseño.

### Línea 311: `    }`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

### Línea 312: `}`
- **¿Para qué sirve?**: Cerrar el bloque de declaraciones de estilo.
- **¿Qué hace?**: Delimita el final de las propiedades visuales aplicadas al selector anterior.
- **¿Qué pasa si se daña?**: El navegador continuará asociando las siguientes propiedades al selector anterior de forma indefinida, desconfigurando y rompiendo el renderizado de toda la hoja de estilos.

