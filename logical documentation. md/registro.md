DOCUMENTACIÓN LÓGICA DEL SISTEMA SIVC
Explicación línea por línea de la lógica PHP y de los formularios de acceso
1. Conceptos básicos
Formulario HTML: recoge los datos del usuario. `name` determina con qué nombre llega el dato a PHP. Por ejemplo, `name="usuario"` se recibe como `$_POST['usuario']`. Si un input no tiene `name`, no se envía.
POST: método utilizado para enviar los datos del formulario hacia PHP.
Entidad / Base de datos: representa la información que se almacena, por ejemplo un usuario con ID, nombre, correo, contraseña, rol y estado.
Modelo: clase PHP que representa una entidad y se comunica con la base de datos para guardar, consultar, editar o eliminar.
Controlador: recibe los datos enviados por la vista, decide qué hacer y utiliza el modelo.
Vista: es lo que ve el usuario: formularios, tablas, botones y dashboards.
Flujo: Usuario → Formulario HTML → POST → Controlador → Modelo → Base de datos.
Regreso: Base de datos → Modelo → Controlador → Vista → Usuario.
Instancia
Una instancia es un objeto concreto creado a partir de una clase. En `$usuario = new Usuario();`, `Usuario` es la clase o molde, `new Usuario()` crea la instancia y `$usuario` la guarda para poder usar sus métodos.
 
2. Base de datos - database.php
Ruta: configuration/database.php
Se explican 25 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 3: $host = "127.0.0.1";
Explicación: Asigna un valor a la variable `$host` para utilizarlo después.
Línea 4: $user = "root";
Explicación: Asigna un valor a la variable `$user` para utilizarlo después.
Línea 5: $password = "";
Explicación: Asigna un valor a la variable `$password` para utilizarlo después.
Línea 6: $database = "SIVC";
Explicación: Asigna un valor a la variable `$database` para utilizarlo después.
Línea 7: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 8: $conn = new mysqli(
Explicación: Crea la conexión con la base de datos MySQL.
Línea 9: $host,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 10: $user,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 11: $password,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 12: $database
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 13: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 14: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 15: if ($conn->connect_error)
Explicación: Comprueba si la conexión con MySQL produjo un error.
Línea 16: {
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 17: die(
Explicación: Detiene la ejecución del archivo.
Línea 18: "Error de conexión: "
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 19: . $conn->connect_error
Explicación: Comprueba si la conexión con MySQL produjo un error.
Línea 20: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 21: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 22: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 23: $conn->set_charset("utf8");
Explicación: Define UTF-8 como codificación de la conexión.
Línea 24: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 25: ?>
Explicación: Cierra el bloque PHP.
 
2.1 Base de datos/configuración - load_config.php
Ruta: configuration/load_config.php
Se explican 163 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: if (session_status() === PHP_SESSION_NONE) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 3: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 4: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 5: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 6: require_once __DIR__ . '/database.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 7: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 8: function obtenerConfiguracionUsuario() {
Explicación: Declara la función o método `obtenerConfiguracionUsuario`; las líneas siguientes indican cómo realiza esa operación.
Línea 9: global $conn;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 10: $id_usuario = $_SESSION['id_Usuario'] ?? 0;
Explicación: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: // Configuración por defecto
Explicación: Comentario: explica el código y no se ejecuta.
Línea 13: $default_config = [
Explicación: Asigna un valor a la variable `$default_config` para utilizarlo después.
Línea 14: 'tema' => 'lavender',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 15: 'tipografia' => 'Segoe UI',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 16: 'tamaño_Fuente' => '14px',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 17: 'modo_Oscuro' => 0
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 18: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 19: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 20: if ($id_usuario <= 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 21: return $default_config;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 22: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 23: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 24: $stmt = $conn->prepare("SELECT tema, tipografia, tamaño_Fuente, modo_Oscuro FROM configuracion WHERE id_Usuario = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 25: if ($stmt) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 26: $stmt->bind_param("i", $id_usuario);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 27: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 28: $res = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 29: $config = $res->fetch_assoc();
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 30: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 31: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 32: if ($config) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 33: return $config;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 34: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 35: // Si no existe, insertar configuración por defecto
Explicación: Comentario: explica el código y no se ejecuta.
Línea 36: $stmtInsert = $conn->prepare("INSERT INTO configuracion (tema, tipografia, tamaño_Fuente, modo_Oscuro, id_Usuario) VALUES (?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 37: if ($stmtInsert) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 38: $tema = $default_config['tema'];
Explicación: Asigna un valor a la variable `$tema` para utilizarlo después.
Línea 39: $tipo = $default_config['tipografia'];
Explicación: Asigna un valor a la variable `$tipo` para utilizarlo después.
Línea 40: $tamanho = $default_config['tamaño_Fuente'];
Explicación: Asigna un valor a la variable `$tamanho` para utilizarlo después.
Línea 41: $modo = $default_config['modo_Oscuro'];
Explicación: Asigna un valor a la variable `$modo` para utilizarlo después.
Línea 42: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 43: $stmtInsert->bind_param("ssiii", $tema, $tipo, $tamanho, $modo, $id_usuario);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 44: $stmtInsert->execute();
Explicación: Ejecuta la consulta preparada.
Línea 45: $stmtInsert->close();
Explicación: Forma parte de una consulta `INSERT`, utilizada para crear un registro.
Línea 46: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 47: return $default_config;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 48: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 49: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 50: return $default_config;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 51: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 52: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 53: function aplicarConfiguracionEstilos() {
Explicación: Declara la función o método `aplicarConfiguracionEstilos`; las líneas siguientes indican cómo realiza esa operación.
Línea 54: $config = obtenerConfiguracionUsuario();
Explicación: Asigna un valor a la variable `$config` para utilizarlo después.
Línea 55: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 56: // Mapeo de Colores de Fondo (Temas)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 57: $temasMap = [
Explicación: Asigna un valor a la variable `$temasMap` para utilizarlo después.
Línea 58: 'lavender' => '#eedffd',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 59: 'cyan'     => '#d1f2fd',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 60: 'green'    => '#d2f8d2',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 61: 'pink'     => '#fde2ff',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 62: 'sand'     => '#f3e9dc'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 63: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 64: $bg_color = $temasMap[$config['tema']] ?? '#eedffd';
Explicación: Asigna un valor a la variable `$bg_color` para utilizarlo después.
Línea 65: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 66: // Mapeo de Tipografías
Explicación: Comentario: explica el código y no se ejecuta.
Línea 67: $fontsMap = [
Explicación: Asigna un valor a la variable `$fontsMap` para utilizarlo después.
Línea 68: 'Comic Sans' => "'Comic Sans MS', cursive, sans-serif",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 69: 'Georgia'    => "Georgia, serif",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 70: 'Courier'    => "'Courier New', Courier, monospace",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 71: 'Segoe UI'   => "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 72: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 73: $font_family = $fontsMap[$config['tipografia']] ?? "'Montserrat', sans-serif";
Explicación: Asigna un valor a la variable `$font_family` para utilizarlo después.
Línea 74: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 75: // Tamaño de fuente
Explicación: Comentario: explica el código y no se ejecuta.
Línea 76: $font_size = $config['tamaño_Fuente'];
Explicación: Asigna un valor a la variable `$font_size` para utilizarlo después.
Línea 77: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 78: // Modo Oscuro CSS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 79: $modo_oscuro = (int)$config['modo_Oscuro'];
Explicación: Asigna un valor a la variable `$modo_oscuro` para utilizarlo después.
Línea 80: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 81: echo "<!-- SIVC DYNAMIC CONFIGURATION OVERRIDES -->\n<style>\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 82: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 83: // Estilos generales del tema
Explicación: Comentario: explica el código y no se ejecuta.
Línea 84: echo "  body {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 85: echo "    --bg-lavender: $bg_color !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 86: echo "    font-family: $font_family !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 87: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 88: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 89: // Sobreescrituras de tamaño de fuente
Explicación: Comentario: explica el código y no se ejecuta.
Línea 90: echo "  body, .main-content, .sidebar, input, select, button, table, td, th {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 91: echo "    font-size: $font_size !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 92: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 93: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 94: if ($modo_oscuro === 1) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 95: echo "  /* MODO OSCURO GLOBAL OVERRIDES */\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 96: echo "  body, .main-content {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 97: echo "    background-color: #12101f !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 98: echo "    color: #ffffff !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 99: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 100: echo "  .sidebar {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 101: echo "    background-color: #1e1b2e !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 102: echo "    border-right: 2px solid #332d4b !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 103: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 104: echo "  .sidebar-logo-section .brand-title {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 105: echo "    color: #ffffff !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 106: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 107: echo "  .sidebar-link-card {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 108: echo "    background-color: #262238 !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 109: echo "    border-color: #332d4b !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 110: echo "    color: #b3b0c2 !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 111: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 112: echo "  .sidebar-link-card.active {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 113: echo "    background: linear-gradient(135deg, #6f2dbd 0%, #b5179e 100%) !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 114: echo "    color: #ffffff !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 115: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 116: echo "  .stat-box-card, .chart-panel-card, .inventory-table-container, .clients-table-container, .filter-bar-form, .client-detail-header-card, .summary-card, .update-status-section, .modal-content {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 117: echo "    background-color: #1e1b2e !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 118: echo "    border-color: #332d4b !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 119: echo "    color: #ffffff !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 120: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 121: echo "  .inventory-table th, .clients-table th, .report-table th, .debts-table th {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 122: echo "    background-color: #2d2744 !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 123: echo "    color: #ffffff !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 124: echo "    border-bottom: 2px solid #332d4b !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 125: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 126: echo "  .inventory-table td, .clients-table td, .report-table td, .debts-table td {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 127: echo "    border-bottom: 1px solid #332d4b !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 128: echo "    color: #ffffff !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 129: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 130: echo "  .inventory-table tr:nth-child(even), .clients-table tr:nth-child(even), .report-table tr:nth-child(even), .debts-table tr:nth-child(even) {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 131: echo "    background-color: #221f35 !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 132: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 133: echo "  h1, h2, h3, h4, strong, .stat-box-details .stat-number, .card-value, .client-name-cell, .client-profile-info h2 {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 134: echo "    color: #ffffff !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 135: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 136: echo "  p, span, .stat-box-details .stat-desc, .pagination-info, .card-subtext, label, .datetime-details span {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 137: echo "    color: #b3b0c2 !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 138: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 139: echo "  input, select {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 140: echo "    background-color: #2d2744 !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 141: echo "    border-color: #332d4b !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 142: echo "    color: #ffffff !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 143: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 144: echo "  input:focus, select:focus {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 145: echo "    border-color: #6f2dbd !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 146: echo "    background-color: #1e1b2e !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 147: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 148: echo "  .filter-input-group {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 149: echo "    background-color: #2d2744 !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 150: echo "    border-color: #332d4b !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 151: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 152: echo "  .filter-input-group input {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 153: echo "    color: #ffffff !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 154: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 155: echo "  .modal-header {\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 156: echo "    background-color: #262238 !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 157: echo "    border-bottom: 2px solid #332d4b !important;\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 158: echo "  }\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 159: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 160: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 161: echo "</style>\n";
Explicación: Envía contenido al navegador para mostrarlo.
Línea 162: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 163: ?>
Explicación: Cierra el bloque PHP.
 
3. Login - vista login.php
Ruta: views/login.php
Se explican 14 líneas de lógica PHP y del formulario.
Línea 22: <form action="../controllers/auth/login_controler.php" method="POST">
Explicación: Abre el formulario. `action` indica a qué controlador se envían los datos y `method="POST"` indica que PHP los recibirá con `$_POST`.
Línea 23: <label>Usuario o Correo electrónico</label>
Explicación: Muestra la etiqueta que indica al usuario qué dato debe escribir.
Línea 24: <div class="input-box">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 25: <i class="fa-regular fa-envelope"></i>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 26: <input type="text" name="usuario" placeholder="Ingresa tu usuario o correo" required>
Explicación: Crea un campo de tipo `text` con `name="usuario"`; ese nombre será la clave recibida por PHP.
Línea 27: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 29: <label>Contraseña</label>
Explicación: Muestra la etiqueta que indica al usuario qué dato debe escribir.
Línea 31: <div class="input-box">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 32: <i class="fa-solid fa-lock"></i>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 33: <input type="password" name="password" id="password" placeholder="********************" required>
Explicación: Crea un campo de tipo `password` con `name="password"`; ese nombre será la clave recibida por PHP.
Línea 34: <i class="fa-regular fa-eye-slash" id="togglePassword"></i>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 35: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 37: <button type="submit">ENTRA</button>
Explicación: Crea el botón que permite enviar o ejecutar la acción del formulario.
Línea 38: </form>
Explicación: Cierra el formulario.
 
3.1 Login - controlador
Ruta: controllers/auth/login_controler.php
Se explican 87 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: require_once __DIR__ . '/../../models/usuario_model.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 5: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 6: function alerta($icono, $titulo, $mensaje, $ruta)
Explicación: Declara la función o método `alerta`; las líneas siguientes indican cómo realiza esa operación.
Línea 7: {
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 8: echo "
Explicación: Envía contenido al navegador para mostrarlo.
Línea 9: <!DOCTYPE html>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 10: <html lang='es'>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 11: <head>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 12: <meta charset='UTF-8'>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 13: <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 14: </head>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 15: <body>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 16: <script>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 17: Swal.fire({
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 18: icon: '$icono',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 19: title: '$titulo',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 20: text: '$mensaje',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 21: confirmButtonColor: '#198754'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 22: }).then(() => {
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 23: window.location.href = '$ruta';
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 24: });
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 25: </script>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 26: </body>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 27: </html>";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 28: exit();
Explicación: Detiene la ejecución del archivo.
Línea 29: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 30: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 31: if ($_SERVER['REQUEST_METHOD'] != 'POST') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 32: header('Location: ../views/auth/login.php');
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 33: exit();
Explicación: Detiene la ejecución del archivo.
Línea 34: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 35: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 36: $usuario = trim($_POST['usuario'] ?? '');
Explicación: Recibe mediante POST el dato `usuario` enviado por el formulario.
Línea 37: $password = $_POST['password'] ?? '';
Explicación: Recibe mediante POST el dato `password` enviado por el formulario.
Línea 38: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 39: if (empty($usuario) || empty($password)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 40: alerta(
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 41: 'warning',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 42: 'Campos incompletos',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 43: 'Ingresa tu usuario y contraseña.',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 44: '../views/auth/login.php'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 45: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 46: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 47: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 48: $modelo = new Usuario();
Explicación: Crea una instancia de la clase `Usuario` para utilizar sus métodos.
Línea 49: $datos = $modelo->buscarPorUsuario($usuario);
Explicación: Asigna un valor a la variable `$datos` para utilizarlo después.
Línea 50: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 51: if (!$datos || !password_verify($password, $datos['contraseña'])) {
Explicación: Verifica si la contraseña escrita corresponde al hash guardado.
Línea 52: alerta(
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 53: 'error',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 54: 'Datos incorrectos',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 55: 'El usuario o la contraseña no son correctos.',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 56: '../views/login.php'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 57: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 58: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 59: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 60: if ($datos['estado'] != 'Activo') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 61: alerta(
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 62: 'warning',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 63: 'Usuario inactivo',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 64: 'Tu cuenta se encuentra inactiva.',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 65: '../views/login.php'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 66: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 67: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 68: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 69: $_SESSION['id_Usuario'] = $datos['id_Usuario'];
Explicación: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
Línea 70: $_SESSION['usuario'] = $datos['nombre_Usuario'];
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 71: $_SESSION['nombre'] = $datos['nombre'];
Explicación: Lee o guarda `nombre` en la sesión para conservarlo entre páginas.
Línea 72: $_SESSION['rol'] = $datos['rol'];
Explicación: Lee o guarda `rol` en la sesión para conservarlo entre páginas.
Línea 73: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 74: $modelo->actualizarAcceso($datos['id_Usuario']);
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 75: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 76: if ($datos['rol'] == 'Administrador') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 77: header('Location: ../../views/administrador/dashboar_admi.php');
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 78: } elseif ($datos['rol'] == 'Vendedor') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 79: header('Location: ../../views/vendedor/dashboard_vendedor.php');
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 80: } elseif ($datos['rol'] == 'Cliente') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 81: header('Location: ../../views/cliente/dashboard_cliente.php');
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 82: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 83: header('Location: ../../views/login.php');
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 84: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 85: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 86: exit();
Explicación: Detiene la ejecución del archivo.
Línea 87: ?>
Explicación: Cierra el bloque PHP.
 
3.2 Login y registro - modelo Usuario
Ruta: models/usuario_model.php
Se explican 156 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: require_once __DIR__ . '/../configuration/database.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: class Usuario
Explicación: Declara la clase `Usuario`, que agrupa propiedades y métodos relacionados.
Línea 5: {
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 6: private $conn;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 7: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 8: public function __construct()
Explicación: Declara la función o método `__construct`; las líneas siguientes indican cómo realiza esa operación.
Línea 9: {
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 10: global $conn;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 11: $this->conn = $conn;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 12: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 13: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 14: /**
Explicación: Comentario: explica el código y no se ejecuta.
Línea 15: * Verifica si un nombre de usuario ya está registrado.
Explicación: Comentario: explica el código y no se ejecuta.
Línea 16: */
Explicación: Comentario: explica el código y no se ejecuta.
Línea 17: public function usuarioExiste($usuario)
Explicación: Declara la función o método `usuarioExiste`; las líneas siguientes indican cómo realiza esa operación.
Línea 18: {
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 19: $stmt = $this->conn->prepare("SELECT id_Usuario FROM usuarios WHERE nombre_Usuario = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 20: if ($stmt) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 21: $stmt->bind_param("s", $usuario);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 22: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 23: $stmt->store_result();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 24: $exists = $stmt->num_rows > 0;
Explicación: Comprueba cuántos registros devolvió la consulta.
Línea 25: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 26: return $exists;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 27: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 28: return false;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 29: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 30: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 31: /**
Explicación: Comentario: explica el código y no se ejecuta.
Línea 32: * Verifica si un correo electrónico ya está registrado.
Explicación: Comentario: explica el código y no se ejecuta.
Línea 33: */
Explicación: Comentario: explica el código y no se ejecuta.
Línea 34: public function correoExiste($correo)
Explicación: Declara la función o método `correoExiste`; las líneas siguientes indican cómo realiza esa operación.
Línea 35: {
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 36: $stmt = $this->conn->prepare("SELECT id_Usuario FROM usuarios WHERE correo = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 37: if ($stmt) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 38: $stmt->bind_param("s", $correo);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 39: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 40: $stmt->store_result();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 41: $exists = $stmt->num_rows > 0;
Explicación: Comprueba cuántos registros devolvió la consulta.
Línea 42: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 43: return $exists;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 44: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 45: return false;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 46: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 47: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 48: /**
Explicación: Comentario: explica el código y no se ejecuta.
Línea 49: * Registra un nuevo usuario en la base de datos.
Explicación: Comentario: explica el código y no se ejecuta.
Línea 50: */
Explicación: Comentario: explica el código y no se ejecuta.
Línea 51: public function registrar($datos)
Explicación: Declara la función o método `registrar`; las líneas siguientes indican cómo realiza esa operación.
Línea 52: {
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 53: // Mapear el rol (Administrador -> 1, Vendedor -> 2, Cliente -> 3)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 54: $id_rol = '3'; // Por defecto Cliente
Explicación: Asigna un valor a la variable `$id_rol` para utilizarlo después.
Línea 55: if (isset($datos['rol'])) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 56: if ($datos['rol'] === 'Administrador') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 57: $id_rol = '1';
Explicación: Asigna un valor a la variable `$id_rol` para utilizarlo después.
Línea 58: } elseif ($datos['rol'] === 'Vendedor') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 59: $id_rol = '2';
Explicación: Asigna un valor a la variable `$id_rol` para utilizarlo después.
Línea 60: } elseif ($datos['rol'] === 'Cliente') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 61: $id_rol = '3';
Explicación: Asigna un valor a la variable `$id_rol` para utilizarlo después.
Línea 62: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 63: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 64: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 65: $hashed_password = password_hash($datos['password'], PASSWORD_BCRYPT);
Explicación: Cifra la contraseña mediante un hash seguro antes de almacenarla.
Línea 66: $estado = $datos['estado'] ?? 'Activo';
Explicación: Asigna un valor a la variable `$estado` para utilizarlo después.
Línea 67: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 68: $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, apellido, numero_Documento, id_Rol, telefono, correo, nombre_Usuario, contraseña, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 69: if ($stmt) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 70: $stmt->bind_param(
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 71: "sssssssss",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 72: $datos['nombre'],
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 73: $datos['apellido'],
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 74: $datos['documento'],
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 75: $id_rol,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 76: $datos['telefono'],
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 77: $datos['correo'],
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 78: $datos['usuario'],
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 79: $hashed_password,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 80: $estado
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 81: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 82: $result = $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 83: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 84: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 85: // Si se registró con éxito y es un Cliente, también lo agregamos a la tabla de clientes
Explicación: Comentario: explica el código y no se ejecuta.
Línea 86: if ($result && $id_rol === '3') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 87: // Verificar si ya existe en la tabla de clientes por documento para evitar duplicado
Explicación: Comentario: explica el código y no se ejecuta.
Línea 88: $chk = $this->conn->prepare("SELECT id_Cliente FROM cliente WHERE numero_Documento = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 89: if ($chk) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 90: $chk->bind_param("s", $datos['documento']);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 91: $chk->execute();
Explicación: Ejecuta la consulta preparada.
Línea 92: $chk->store_result();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 93: $clientExists = $chk->num_rows > 0;
Explicación: Comprueba cuántos registros devolvió la consulta.
Línea 94: $chk->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 95: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 96: if (!$clientExists) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 97: $stmtCliente = $this->conn->prepare("INSERT INTO cliente (nombre, apellido, numero_Documento, telefono, estado) VALUES (?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 98: if ($stmtCliente) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 99: $stmtCliente->bind_param("sssss",
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 100: $datos['nombre'],
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 101: $datos['apellido'],
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 102: $datos['documento'],
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 103: $datos['telefono'],
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 104: $estado
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 105: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 106: $stmtCliente->execute();
Explicación: Ejecuta la consulta preparada.
Línea 107: $stmtCliente->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 108: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 109: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 110: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 111: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 112: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 113: return $result;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 114: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 115: return false;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 116: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 117: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 118: /**
Explicación: Comentario: explica el código y no se ejecuta.
Línea 119: * Busca un usuario por su nombre de usuario o correo.
Explicación: Comentario: explica el código y no se ejecuta.
Línea 120: * Retorna los datos incluyendo el nombre del rol.
Explicación: Comentario: explica el código y no se ejecuta.
Línea 121: */
Explicación: Comentario: explica el código y no se ejecuta.
Línea 122: public function buscarPorUsuario($usuario)
Explicación: Declara la función o método `buscarPorUsuario`; las líneas siguientes indican cómo realiza esa operación.
Línea 123: {
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 124: $stmt = $this->conn->prepare("
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 125: SELECT u.id_Usuario, u.nombre_Usuario, u.nombre, r.nombre_Rol AS rol, u.contraseña, u.estado
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 126: FROM usuarios u
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 127: LEFT JOIN rol r ON u.id_Rol = r.id_Rol
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 128: WHERE u.nombre_Usuario = ? OR u.correo = ?
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 129: ");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 130: if ($stmt) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 131: $stmt->bind_param("ss", $usuario, $usuario);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 132: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 133: $result = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 134: $user = $result->fetch_assoc();
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 135: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 136: return $user;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 137: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 138: return null;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 139: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 140: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 141: /**
Explicación: Comentario: explica el código y no se ejecuta.
Línea 142: * Actualiza la fecha y hora del último acceso del usuario.
Explicación: Comentario: explica el código y no se ejecuta.
Línea 143: */
Explicación: Comentario: explica el código y no se ejecuta.
Línea 144: public function actualizarAcceso($id_usuario)
Explicación: Declara la función o método `actualizarAcceso`; las líneas siguientes indican cómo realiza esa operación.
Línea 145: {
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 146: $stmt = $this->conn->prepare("UPDATE usuarios SET ultimo_Acceso = NOW() WHERE id_Usuario = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 147: if ($stmt) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 148: $stmt->bind_param("i", $id_usuario);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 149: $result = $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 150: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 151: return $result;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 152: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 153: return false;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 154: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 155: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 156: ?>
Explicación: Cierra el bloque PHP.
 
4. Registro - vista register.php
Ruta: views/register.php
Se explican 63 líneas de lógica PHP y del formulario.
Línea 24: <form action="../controllers/auth/register_controller.php" method="POST">
Explicación: Abre el formulario. `action` indica a qué controlador se envían los datos y `method="POST"` indica que PHP los recibirá con `$_POST`.
Línea 25: <div class="form-grid">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 26: <div class="form-group">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 27: <label>Nombre</label>
Explicación: Muestra la etiqueta que indica al usuario qué dato debe escribir.
Línea 28: <div class="input-box">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 29: <i class="fa-solid fa-user"></i>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 30: <input type="text" name="nombre" placeholder="Ingresa tu nombre" required>
Explicación: Crea un campo de tipo `text` con `name="nombre"`; ese nombre será la clave recibida por PHP.
Línea 31: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 32: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 34: <div class="form-group">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 35: <label>Apellido</label>
Explicación: Muestra la etiqueta que indica al usuario qué dato debe escribir.
Línea 36: <div class="input-box">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 37: <i class="fa-solid fa-user"></i>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 38: <input type="text" name="apellido" placeholder="Ingresa tu apellido" required>
Explicación: Crea un campo de tipo `text` con `name="apellido"`; ese nombre será la clave recibida por PHP.
Línea 39: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 40: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 42: <div class="form-group">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 43: <label>Número de Documento</label>
Explicación: Muestra la etiqueta que indica al usuario qué dato debe escribir.
Línea 44: <div class="input-box">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 45: <i class="fa-solid fa-id-card"></i>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 46: <input type="text" name="documento" placeholder="Ej: 1098765432" required>
Explicación: Crea un campo de tipo `text` con `name="documento"`; ese nombre será la clave recibida por PHP.
Línea 47: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 48: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 50: <div class="form-group">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 51: <label>Teléfono</label>
Explicación: Muestra la etiqueta que indica al usuario qué dato debe escribir.
Línea 52: <div class="input-box">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 53: <i class="fa-solid fa-phone"></i>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 54: <input type="text" name="telefono" placeholder="Ej: 3001234567">
Explicación: Crea un campo de tipo `text` con `name="telefono"`; ese nombre será la clave recibida por PHP.
Línea 55: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 56: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 58: <div class="form-group">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 59: <label>Nombre de Usuario</label>
Explicación: Muestra la etiqueta que indica al usuario qué dato debe escribir.
Línea 60: <div class="input-box">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 61: <i class="fa-solid fa-user-tag"></i>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 62: <input type="text" name="usuario" placeholder="Ej: ruben123" required>
Explicación: Crea un campo de tipo `text` con `name="usuario"`; ese nombre será la clave recibida por PHP.
Línea 63: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 64: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 66: <div class="form-group">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 67: <label>Correo electrónico</label>
Explicación: Muestra la etiqueta que indica al usuario qué dato debe escribir.
Línea 68: <div class="input-box">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 69: <i class="fa-regular fa-envelope"></i>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 70: <input type="email" name="correo" placeholder="ejemplo@gmail.com" required>
Explicación: Crea un campo de tipo `email` con `name="correo"`; ese nombre será la clave recibida por PHP.
Línea 71: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 72: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 74: <div class="form-group">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 75: <label>Contraseña</label>
Explicación: Muestra la etiqueta que indica al usuario qué dato debe escribir.
Línea 76: <div class="input-box">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 77: <i class="fa-solid fa-lock"></i>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 78: <input type="password" name="password" id="password" placeholder="********" required>
Explicación: Crea un campo de tipo `password` con `name="password"`; ese nombre será la clave recibida por PHP.
Línea 79: <i class="fa-regular fa-eye-slash" id="togglePassword"></i>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 80: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 81: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 83: <div class="form-group">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 84: <label>Confirmar contraseña</label>
Explicación: Muestra la etiqueta que indica al usuario qué dato debe escribir.
Línea 85: <div class="input-box">
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 86: <i class="fa-solid fa-lock"></i>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 87: <input type="password" name="confirmar" id="confirmPassword" placeholder="********" required>
Explicación: Crea un campo de tipo `password` con `name="confirmar"`; ese nombre será la clave recibida por PHP.
Línea 88: <i class="fa-regular fa-eye-slash" id="toggleConfirmPassword"></i>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 89: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 90: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 91: </div>
Explicación: Estructura visual del formulario o elemento que agrupa sus campos.
Línea 93: <button type="submit">REGISTRARME</button>
Explicación: Crea el botón que permite enviar o ejecutar la acción del formulario.
Línea 94: </form>
Explicación: Cierra el formulario.
 
4.1 Registro - controlador
Ruta: controllers/auth/register_controller.php
Se explican 121 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: require_once __DIR__ . '/../../models/usuario_model.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 5: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 6: function alerta($icono, $titulo, $mensaje, $ruta)
Explicación: Declara la función o método `alerta`; las líneas siguientes indican cómo realiza esa operación.
Línea 7: {
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 8: echo "
Explicación: Envía contenido al navegador para mostrarlo.
Línea 9: <!DOCTYPE html>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 10: <html lang='es'>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 11: <head>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 12: <meta charset='UTF-8'>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 13: <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 14: <style>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 15: body {
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 16: font-family: 'Montserrat', sans-serif;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 17: background-color: #f7dbe4;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 18: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 19: </style>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 20: </head>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 21: <body>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 22: <script>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 23: Swal.fire({
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 24: icon: '$icono',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 25: title: '$titulo',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 26: text: '$mensaje',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 27: confirmButtonColor: '#6f2dbd'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 28: }).then(() => {
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 29: window.location.href = '$ruta';
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 30: });
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 31: </script>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 32: </body>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 33: </html>";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 34: exit();
Explicación: Detiene la ejecución del archivo.
Línea 35: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 36: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 37: if ($_SERVER["REQUEST_METHOD"] == "POST") {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 38: $nombre = trim($_POST["nombre"] ?? '');
Explicación: Recibe mediante POST el dato `nombre` enviado por el formulario.
Línea 39: $apellido = trim($_POST["apellido"] ?? '');
Explicación: Recibe mediante POST el dato `apellido` enviado por el formulario.
Línea 40: $documento = trim($_POST["documento"] ?? '');
Explicación: Recibe mediante POST el dato `documento` enviado por el formulario.
Línea 41: $telefono = trim($_POST["telefono"] ?? '');
Explicación: Recibe mediante POST el dato `telefono` enviado por el formulario.
Línea 42: $usuario_input = trim($_POST["usuario"] ?? '');
Explicación: Recibe mediante POST el dato `usuario` enviado por el formulario.
Línea 43: $correo = trim($_POST["correo"] ?? '');
Explicación: Recibe mediante POST el dato `correo` enviado por el formulario.
Línea 44: $password = $_POST["password"] ?? '';
Explicación: Recibe mediante POST el dato `password` enviado por el formulario.
Línea 45: $confirmar = $_POST["confirmar"] ?? '';
Explicación: Recibe mediante POST el dato `confirmar` enviado por el formulario.
Línea 46: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 47: // Validar que todos los campos requeridos estén completos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 48: if (empty($nombre) || empty($apellido) || empty($documento) || empty($usuario_input) || empty($correo) || empty($password) || empty($confirmar)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 49: alerta(
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 50: "warning",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 51: "Campos incompletos",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 52: "Por favor completa todos los campos del formulario.",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 53: "../../views/register.php"
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 54: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 55: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 56: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 57: // Validar contraseñas coincidentes
Explicación: Comentario: explica el código y no se ejecuta.
Línea 58: if ($password !== $confirmar) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 59: alerta(
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 60: "error",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 61: "Contraseñas no coinciden",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 62: "La contraseña y su confirmación deben ser idénticas.",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 63: "../../views/register.php"
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 64: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 65: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 66: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 67: $usuarioModel = new Usuario();
Explicación: Crea una instancia de la clase `Usuario` para utilizar sus métodos.
Línea 68: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 69: // Validar que el nombre de usuario no exista
Explicación: Comentario: explica el código y no se ejecuta.
Línea 70: if ($usuarioModel->usuarioExiste($usuario_input)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 71: alerta(
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 72: "error",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 73: "Usuario ya registrado",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 74: "El nombre de usuario '$usuario_input' ya se encuentra registrado.",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 75: "../../views/register.php"
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 76: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 77: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 78: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 79: // Validar que el correo no exista
Explicación: Comentario: explica el código y no se ejecuta.
Línea 80: if ($usuarioModel->correoExiste($correo)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 81: alerta(
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 82: "error",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 83: "Correo ya registrado",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 84: "El correo electrónico '$correo' ya se encuentra registrado.",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 85: "../../views/register.php"
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 86: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 87: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 88: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 89: // Preparar datos para registro
Explicación: Comentario: explica el código y no se ejecuta.
Línea 90: $datos = [
Explicación: Asigna un valor a la variable `$datos` para utilizarlo después.
Línea 91: "nombre" => $nombre,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 92: "apellido" => $apellido,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 93: "documento" => $documento,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 94: "telefono" => $telefono,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 95: "usuario" => $usuario_input,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 96: "correo" => $correo,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 97: "password" => $password,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 98: "rol" => "Cliente", // Rol inicial predeterminado
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 99: "estado" => "Activo"
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 100: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 101: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 102: if ($usuarioModel->registrar($datos)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 103: alerta(
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 104: "success",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 105: "¡Registro Exitoso!",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 106: "Tu cuenta ha sido creada con éxito. Ahora puedes iniciar sesión.",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 107: "../../views/login.php"
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 108: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 109: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 110: alerta(
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 111: "error",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 112: "Error de registro",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 113: "Hubo un problema al procesar el registro en la base de datos. Inténtalo de nuevo.",
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 114: "../../views/register.php"
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 115: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 116: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 117: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 118: header("Location: ../../views/register.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 119: exit();
Explicación: Detiene la ejecución del archivo.
Línea 120: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 121: ?>
Explicación: Cierra el bloque PHP.
 
5. Administrador - dashboar_admi.php
Ruta: views/administrador/dashboar_admi.php
Se explican 31 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección básica de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: $nombreUsuario = $_SESSION['usuario'] ?? 'Administrador';
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 11: $rolUsuario = $_SESSION['rol'] ?? 'Administrador';
Explicación: Lee o guarda `rol` en la sesión para conservarlo entre páginas.
Línea 12: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 13: // Obtener fecha actual en español
Explicación: Comentario: explica el código y no se ejecuta.
Línea 14: $dias = [
Explicación: Asigna un valor a la variable `$dias` para utilizarlo después.
Línea 15: 1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 4 => 'Jueves',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 16: 5 => 'Viernes', 6 => 'Sábado', 7 => 'Domingo'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 17: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 18: $meses = [
Explicación: Asigna un valor a la variable `$meses` para utilizarlo después.
Línea 19: 1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 20: 5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 21: 9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 22: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 23: $diaSemana = date('N');
Explicación: Asigna un valor a la variable `$diaSemana` para utilizarlo después.
Línea 24: $mes = date('n');
Explicación: Asigna un valor a la variable `$mes` para utilizarlo después.
Línea 25: $fechaString = $dias[$diaSemana] . ' ' . date('d') . ' de ' . $meses[$mes];
Explicación: Asigna un valor a la variable `$fechaString` para utilizarlo después.
Línea 26: $horaString = date('h:i a');
Explicación: Asigna un valor a la variable `$horaString` para utilizarlo después.
Línea 27: ?>
Explicación: Cierra el bloque PHP.
Línea 50: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 51: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 52: aplicarConfiguracionEstilos();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 53: ?>
Explicación: Cierra el bloque PHP.
 
5. Administrador - inventario.php
Ruta: views/administrador/inventario.php
Se explican 168 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/database.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: // AUTO-POBLAR PROVEEDORES Y PRODUCTOS SI ESTÁN VACÍOS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 13: $checkProv = $conn->query("SELECT COUNT(*) as total FROM proveedor");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 14: if ($checkProv && $checkProv->fetch_assoc()['total'] == 0) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 15: // Insertar un proveedor de prueba
Explicación: Comentario: explica el código y no se ejecuta.
Línea 16: $conn->query("INSERT INTO proveedor (id_Proveedor, nombre, telefono, correo, direccion) VALUES
Explicación: Forma parte de una consulta `INSERT`, utilizada para crear un registro.
Línea 17: (1, 'Distribuidora Central', '3001234567', 'ventas@districentral.com', 'Calle 10 # 5-20')");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 18: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 19: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 20: $checkProd = $conn->query("SELECT COUNT(*) as total FROM producto");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 21: if ($checkProd && $checkProd->fetch_assoc()['total'] == 0) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 22: // Insertar productos de prueba en la tabla real 'producto'
Explicación: Comentario: explica el código y no se ejecuta.
Línea 23: $conn->query("INSERT INTO producto (codigo_Producto, nombre, id_Proveedor, descripcion, precio_Compra, precio_Venta, stock_Actual, stock_Minimo, unidad_Medida, estado) VALUES
Explicación: Forma parte de una consulta `INSERT`, utilizada para crear un registro.
Línea 24: ('101', 'Arroz', 1, 'Arroz premium en bolsa de 1kg', 2000.00, 3000.00, 45, 5, 'Granos', 'Activo'),
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 25: ('102', 'Tuna / Atún', 1, 'Atún enlatado en agua 160g', 3800.00, 5000.00, 20, 5, 'Pez', 'Activo'),
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 26: ('103', 'Cereal', 1, 'Cereal hojuelas de maíz azucarado', 2500.00, 3500.00, 0, 5, 'Cereales', 'Activo')");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 27: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 28: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 29: // OBTENER ESTADÍSTICAS REALES DESDE LA BASE DE DATOS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 30: // 1. Total productos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 31: $resTotal = $conn->query("SELECT COUNT(*) as total FROM producto");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 32: $totalProductos = $resTotal ? $resTotal->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 33: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 34: // 2. Stock Disponible (Suma de todas las unidades)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 35: $resStockTotal = $conn->query("SELECT SUM(stock_Actual) as total_stock FROM producto");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 36: $stockDisponible = $resStockTotal ? $resStockTotal->fetch_assoc()['total_stock'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 37: if (is_null($stockDisponible)) $stockDisponible = 0;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 38: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 39: // 3. Stock Bajo (stock_Actual > 0 y stock_Actual <= 15)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 40: $resStockBajo = $conn->query("SELECT COUNT(*) as total_bajo FROM producto WHERE stock_Actual > 0 AND stock_Actual <= 15");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 41: $stockBajo = $resStockBajo ? $resStockBajo->fetch_assoc()['total_bajo'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 42: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 43: // 4. Sin Stock (stock_Actual = 0)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 44: $resSinStock = $conn->query("SELECT COUNT(*) as total_sin FROM producto WHERE stock_Actual = 0");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 45: $sinStock = $resSinStock ? $resSinStock->fetch_assoc()['total_sin'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 46: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 47: // RECUPERAR FILTROS Y PARÁMETROS DE BÚSQUEDA
Explicación: Comentario: explica el código y no se ejecuta.
Línea 48: $buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
Explicación: Obtiene de la URL el parámetro `buscar`.
Línea 49: $categoriaFiltro = isset($_GET['categoria']) ? trim($_GET['categoria']) : 'Todas';
Explicación: Obtiene de la URL el parámetro `categoria`.
Línea 50: $estadoFiltro = isset($_GET['estado']) ? trim($_GET['estado']) : 'Todos';
Explicación: Obtiene de la URL el parámetro `estado`.
Línea 51: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 52: // CONSTRUIR CONSULTA SQL DINÁMICA CON FILTROS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 53: $whereClauses = [];
Explicación: Asigna un valor a la variable `$whereClauses` para utilizarlo después.
Línea 54: $params = [];
Explicación: Asigna un valor a la variable `$params` para utilizarlo después.
Línea 55: $types = "";
Explicación: Asigna un valor a la variable `$types` para utilizarlo después.
Línea 56: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 57: if ($buscar !== '') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 58: $whereClauses[] = "(nombre LIKE ? OR codigo_Producto LIKE ?)";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 59: $searchWildcard = "%" . $buscar . "%";
Explicación: Asigna un valor a la variable `$searchWildcard` para utilizarlo después.
Línea 60: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 61: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 62: $types .= "ss";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 63: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 64: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 65: if ($categoriaFiltro !== 'Todas') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 66: $whereClauses[] = "unidad_Medida = ?";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 67: $params[] = $categoriaFiltro;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 68: $types .= "s";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 69: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 70: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 71: if ($estadoFiltro !== 'Todos') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 72: if ($estadoFiltro === 'Disponible') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 73: $whereClauses[] = "stock_Actual > 15";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 74: } elseif ($estadoFiltro === 'Stock Bajo') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 75: $whereClauses[] = "stock_Actual > 0 AND stock_Actual <= 15";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 76: } elseif ($estadoFiltro === 'Sin Stock') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 77: $whereClauses[] = "stock_Actual = 0";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 78: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 79: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 80: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 81: $whereSql = "";
Explicación: Asigna un valor a la variable `$whereSql` para utilizarlo después.
Línea 82: if (count($whereClauses) > 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 83: $whereSql = "WHERE " . implode(" AND ", $whereClauses);
Explicación: Asigna un valor a la variable `$whereSql` para utilizarlo después.
Línea 84: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 85: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 86: // Paginación
Explicación: Comentario: explica el código y no se ejecuta.
Línea 87: $limite = 3; // Mostrar 3 productos por página como en la imagen
Explicación: Asigna un valor a la variable `$limite` para utilizarlo después.
Línea 88: $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
Explicación: Obtiene de la URL el parámetro `pagina`.
Línea 89: if ($pagina < 1) $pagina = 1;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 90: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 91: // Contar productos filtrados para paginación
Explicación: Comentario: explica el código y no se ejecuta.
Línea 92: $countQuery = "SELECT COUNT(*) as total FROM producto $whereSql";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 93: $stmtCount = $conn->prepare($countQuery);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 94: if ($stmtCount) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 95: if (count($params) > 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 96: $stmtCount->bind_param($types, ...$params);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 97: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 98: $stmtCount->execute();
Explicación: Ejecuta la consulta preparada.
Línea 99: $totalFiltrado = $stmtCount->get_result()->fetch_assoc()['total'];
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 100: $stmtCount->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 101: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 102: $totalFiltrado = 0;
Explicación: Asigna un valor a la variable `$totalFiltrado` para utilizarlo después.
Línea 103: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 104: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 105: $totalPaginas = ceil($totalFiltrado / $limite);
Explicación: Asigna un valor a la variable `$totalPaginas` para utilizarlo después.
Línea 106: if ($totalPaginas < 1) $totalPaginas = 1;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 107: if ($pagina > $totalPaginas) $pagina = $totalPaginas;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 108: $offset = ($pagina - 1) * $limite;
Explicación: Asigna un valor a la variable `$offset` para utilizarlo después.
Línea 109: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 110: // Consultar productos paginados
Explicación: Comentario: explica el código y no se ejecuta.
Línea 111: $query = "SELECT * FROM producto $whereSql LIMIT ?, ?";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 112: $stmt = $conn->prepare($query);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 113: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 114: // Copiar params de búsqueda para añadir paginación
Explicación: Comentario: explica el código y no se ejecuta.
Línea 115: $execParams = $params;
Explicación: Asigna un valor a la variable `$execParams` para utilizarlo después.
Línea 116: $execTypes = $types;
Explicación: Asigna un valor a la variable `$execTypes` para utilizarlo después.
Línea 117: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 118: $execParams[] = $offset;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 119: $execParams[] = $limite;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 120: $execTypes .= "ii";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 121: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 122: if ($stmt) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 123: $stmt->bind_param($execTypes, ...$execParams);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 124: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 125: $productosResult = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 126: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 127: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 128: // Obtener todas las categorías (representadas por unidad_Medida) para llenar el filtro dropdown
Explicación: Comentario: explica el código y no se ejecuta.
Línea 129: $categoriesResult = $conn->query("SELECT DISTINCT unidad_Medida FROM producto WHERE unidad_Medida IS NOT NULL AND unidad_Medida != ''");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 130: ?>
Explicación: Cierra el bloque PHP.
Línea 154: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 155: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 156: aplicarConfiguracionEstilos();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 157: ?>
Explicación: Cierra el bloque PHP.
Línea 331: <?php if ($categoriesResult): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 332: <?php while ($cat = $categoriesResult->fetch_assoc()): ?>
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 336: <?php endwhile; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 337: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 374: <?php if ($productosResult && $productosResult->num_rows > 0): ?>
Explicación: Comprueba cuántos registros devolvió la consulta.
Línea 375: <?php while ($prod = $productosResult->fetch_assoc()): ?>
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 376: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 377: // Determinar clase de stock y estado badge
Explicación: Comentario: explica el código y no se ejecuta.
Línea 378: $stock = (int)$prod['stock_Actual'];
Explicación: Asigna un valor a la variable `$stock` para utilizarlo después.
Línea 379: if ($stock === 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 380: $stockClass = "empty";
Explicación: Asigna un valor a la variable `$stockClass` para utilizarlo después.
Línea 381: $statusText = "Sin Stock";
Explicación: Asigna un valor a la variable `$statusText` para utilizarlo después.
Línea 382: $statusClass = "sin-stock";
Explicación: Asigna un valor a la variable `$statusClass` para utilizarlo después.
Línea 383: } elseif ($stock <= 15) {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 384: $stockClass = "low";
Explicación: Asigna un valor a la variable `$stockClass` para utilizarlo después.
Línea 385: $statusText = "Stock Bajo";
Explicación: Asigna un valor a la variable `$statusText` para utilizarlo después.
Línea 386: $statusClass = "stock-bajo";
Explicación: Asigna un valor a la variable `$statusClass` para utilizarlo después.
Línea 387: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 388: $stockClass = "available";
Explicación: Asigna un valor a la variable `$stockClass` para utilizarlo después.
Línea 389: $statusText = "Disponible";
Explicación: Asigna un valor a la variable `$statusText` para utilizarlo después.
Línea 390: $statusClass = "disponible";
Explicación: Asigna un valor a la variable `$statusClass` para utilizarlo después.
Línea 391: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 392: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 393: // Fallback de imagen
Explicación: Comentario: explica el código y no se ejecuta.
Línea 394: $imgPath = (isset($prod['imagen']) && !is_null($prod['imagen'])) ? htmlspecialchars($prod['imagen']) : '';
Explicación: Escapa caracteres especiales antes de mostrarlos en HTML para mayor seguridad.
Línea 395: if (empty($imgPath)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 396: $imgPath = "../../public/img/tienda.png";
Explicación: Asigna un valor a la variable `$imgPath` para utilizarlo después.
Línea 397: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 398: ?>
Explicación: Cierra el bloque PHP.
Línea 435: <?php endwhile; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 436: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 442: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 464: <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 469: <?php endfor; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
5. Administrador - ventas.php
Ruta: views/administrador/ventas.php
Se explican 137 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/database.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: $mensaje_exito = "";
Explicación: Asigna un valor a la variable `$mensaje_exito` para utilizarlo después.
Línea 13: $venta_id_reciente = 0;
Explicación: Asigna un valor a la variable `$venta_id_reciente` para utilizarlo después.
Línea 14: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 15: // REGISTRAR VENTA POST
Explicación: Comentario: explica el código y no se ejecuta.
Línea 16: if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'registrar_venta') {
Explicación: Recibe mediante POST el dato `action` enviado por el formulario.
Línea 17: $id_cliente = (int)($_POST['id_cliente'] ?? 0);
Explicación: Recibe mediante POST el dato `id_cliente` enviado por el formulario.
Línea 18: $metodo_pago = trim($_POST['metodo_pago'] ?? 'Efectivo');
Explicación: Recibe mediante POST el dato `metodo_pago` enviado por el formulario.
Línea 19: $productos_json = $_POST['productos_data'] ?? '[]';
Explicación: Recibe mediante POST el dato `productos_data` enviado por el formulario.
Línea 20: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 21: $cart_items = json_decode($productos_json, true);
Explicación: Asigna un valor a la variable `$cart_items` para utilizarlo después.
Línea 22: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 23: if ($id_cliente > 0 && !empty($cart_items)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 24: // Iniciar transacción
Explicación: Comentario: explica el código y no se ejecuta.
Línea 25: $conn->begin_transaction();
Explicación: Inicia una transacción para que varias operaciones se confirmen o reviertan juntas.
Línea 26: try {
Explicación: Inicia un bloque donde se controlarán posibles errores.
Línea 27: // Calcular total de la venta
Explicación: Comentario: explica el código y no se ejecuta.
Línea 28: $total_venta = 0;
Explicación: Asigna un valor a la variable `$total_venta` para utilizarlo después.
Línea 29: foreach ($cart_items as $item) {
Explicación: Recorre uno por uno los elementos de un arreglo o resultado.
Línea 30: $total_venta += (float)$item['subtotal'];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 31: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 32: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 33: $fecha_actual = date('Y-m-d H:i:s');
Explicación: Asigna un valor a la variable `$fecha_actual` para utilizarlo después.
Línea 34: $estado_venta = 'Completada';
Explicación: Asigna un valor a la variable `$estado_venta` para utilizarlo después.
Línea 35: $id_usuario_session = $_SESSION['id_Usuario']; // Extraer ID usuario del administrador activo
Explicación: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
Línea 36: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 37: // 1. Insertar cabecera de venta
Explicación: Comentario: explica el código y no se ejecuta.
Línea 38: $stmtV = $conn->prepare("INSERT INTO venta (id_Cliente, fecha_Venta, subtotal, descuento, total, metodo_Pago, estado, id_Usuario) VALUES (?, ?, ?, 0, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 39: $stmtV->bind_param("isddssi", $id_cliente, $fecha_actual, $total_venta, $total_venta, $metodo_pago, $estado_venta, $id_usuario_session);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 40: $stmtV->execute();
Explicación: Ejecuta la consulta preparada.
Línea 41: $id_venta = $conn->insert_id;
Explicación: Obtiene el ID generado por el último INSERT.
Línea 42: $stmtV->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 43: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 44: // 2. Insertar detalles y actualizar stock
Explicación: Comentario: explica el código y no se ejecuta.
Línea 45: $stmtD = $conn->prepare("INSERT INTO detalle_venta (id_Venta, id_Producto, cantidad, precio_Unitario, subtotal) VALUES (?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 46: $stmtS = $conn->prepare("UPDATE producto SET stock_Actual = stock_Actual - ? WHERE id_Producto = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 47: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 48: foreach ($cart_items as $item) {
Explicación: Recorre uno por uno los elementos de un arreglo o resultado.
Línea 49: $id_prod = (int)$item['id_producto'];
Explicación: Asigna un valor a la variable `$id_prod` para utilizarlo después.
Línea 50: $cant = (int)$item['cantidad'];
Explicación: Asigna un valor a la variable `$cant` para utilizarlo después.
Línea 51: $precio_u = (float)$item['precio'];
Explicación: Asigna un valor a la variable `$precio_u` para utilizarlo después.
Línea 52: $sub = (float)$item['subtotal'];
Explicación: Asigna un valor a la variable `$sub` para utilizarlo después.
Línea 53: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 54: // Insertar detalle
Explicación: Comentario: explica el código y no se ejecuta.
Línea 55: $stmtD->bind_param("iiidd", $id_venta, $id_prod, $cant, $precio_u, $sub);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 56: $stmtD->execute();
Explicación: Ejecuta la consulta preparada.
Línea 57: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 58: // Actualizar stock
Explicación: Comentario: explica el código y no se ejecuta.
Línea 59: $stmtS->bind_param("ii", $cant, $id_prod);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 60: $stmtS->execute();
Explicación: Ejecuta la consulta preparada.
Línea 61: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 62: $stmtD->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 63: $stmtS->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 64: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 65: // 3. Si es Crédito (Fiado), registrar la deuda
Explicación: Comentario: explica el código y no se ejecuta.
Línea 66: if ($metodo_pago === 'Crédito') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 67: $estado_deuda = 'Pendiente';
Explicación: Asigna un valor a la variable `$estado_deuda` para utilizarlo después.
Línea 68: $stmtDeuda = $conn->prepare("INSERT INTO deuda (fecha_Registro, valor_Inicial, saldo_Pendiente, estado, id_Usuario, id_Cliente) VALUES (?, ?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 69: $stmtDeuda->bind_param("sddsii", $fecha_actual, $total_venta, $total_venta, $estado_deuda, $id_usuario_session, $id_cliente);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 70: $stmtDeuda->execute();
Explicación: Ejecuta la consulta preparada.
Línea 71: $stmtDeuda->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 72: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 73: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 74: // Confirmar transacción
Explicación: Comentario: explica el código y no se ejecuta.
Línea 75: $conn->commit();
Explicación: Confirma la transacción y guarda definitivamente los cambios.
Línea 76: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 77: $mensaje_exito = "Venta registrada con éxito.";
Explicación: Asigna un valor a la variable `$mensaje_exito` para utilizarlo después.
Línea 78: $venta_id_reciente = $id_venta;
Explicación: Asigna un valor a la variable `$venta_id_reciente` para utilizarlo después.
Línea 79: } catch (Exception $e) {
Explicación: Captura y maneja un error producido dentro del bloque `try`.
Línea 80: $conn->rollback();
Explicación: Revierte la transacción cuando ocurre un error.
Línea 81: $mensaje_error = "Error al procesar la venta: " . $e->getMessage();
Explicación: Asigna un valor a la variable `$mensaje_error` para utilizarlo después.
Línea 82: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 83: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 84: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 85: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 86: // OBTENER ESTADÍSTICAS REALES
Explicación: Comentario: explica el código y no se ejecuta.
Línea 87: // 1. Total Facturado
Explicación: Comentario: explica el código y no se ejecuta.
Línea 88: $resTotal = $conn->query("SELECT SUM(total) as total FROM venta WHERE estado = 'Completada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 89: $totalFacturado = $resTotal ? (float)$resTotal->fetch_assoc()['total'] : 0.0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 90: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 91: // 2. Ventas Realizadas
Explicación: Comentario: explica el código y no se ejecuta.
Línea 92: $resCount = $conn->query("SELECT COUNT(*) as total FROM venta");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 93: $totalVentas = $resCount ? (int)$resCount->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 94: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 95: // 3. Metodo de Pago Preferido
Explicación: Comentario: explica el código y no se ejecuta.
Línea 96: $resMetodo = $conn->query("SELECT metodo_Pago, COUNT(*) as cant FROM venta GROUP BY metodo_Pago ORDER BY cant DESC LIMIT 1");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 97: $metodoPreferido = ($resMetodo && $row = $resMetodo->fetch_assoc()) ? $row['metodo_Pago'] : 'Efectivo';
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 98: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 99: // 4. Créditos (Fiados) Activos (Suma de los saldos pendientes de deudas)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 100: $resDeuda = $conn->query("SELECT SUM(saldo_Pendiente) as total FROM deuda WHERE estado = 'Pendiente'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 101: $totalDeudaActiva = $resDeuda ? (float)$resDeuda->fetch_assoc()['total'] : 0.0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 102: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 103: // OBTENER CLIENTES Y PRODUCTOS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 104: $clientesResult = $conn->query("SELECT c.id_Cliente, u.nombre, u.apellido FROM cliente c JOIN usuarios u ON c.numero_Documento = u.numero_Documento WHERE u.estado = 'Activo'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 105: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 106: $productosResult = $conn->query("SELECT id_Producto, nombre, codigo_Producto, precio_Venta, stock_Actual, unidad_Medida FROM producto WHERE estado = 'Activo' AND stock_Actual > 0");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 107: $productosArr = [];
Explicación: Asigna un valor a la variable `$productosArr` para utilizarlo después.
Línea 108: if ($productosResult) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 109: while ($row = $productosResult->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 110: $productosArr[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 111: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 112: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 113: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 114: // OBTENER VENTAS RECIENTES (Historial de 5 registros)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 115: $ventasRecientes = $conn->query("SELECT v.*, u.nombre as cliente_nombre, u.apellido as cliente_apellido
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 116: FROM venta v
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 117: LEFT JOIN cliente c ON v.id_Cliente = c.id_Cliente
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 118: LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 119: ORDER BY v.id_Venta DESC LIMIT 5");
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 120: ?>
Explicación: Cierra el bloque PHP.
Línea 147: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 148: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 149: aplicarConfiguracionEstilos();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 150: ?>
Explicación: Cierra el bloque PHP.
Línea 320: <?php foreach ($productosArr as $p): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 327: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 384: <?php if ($clientesResult): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 385: <?php while ($c = $clientesResult->fetch_assoc()): ?>
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 389: <?php endwhile; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 390: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 450: <?php if ($ventasRecientes && $ventasRecientes->num_rows > 0): ?>
Explicación: Comprueba cuántos registros devolvió la consulta.
Línea 451: <?php while ($v = $ventasRecientes->fetch_assoc()): ?>
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 479: <?php endwhile; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 480: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 486: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 672: <?php if (!empty($mensaje_exito)): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 690: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
5. Administrador - comprobante.php
Ruta: views/administrador/comprobante.php
Se explican 59 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/database.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: $id_venta = isset($_GET['id']) ? (int)$_GET['id'] : 0;
Explicación: Obtiene de la URL el parámetro `id`.
Línea 13: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 14: if ($id_venta <= 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 15: die("ID de venta inválido.");
Explicación: Detiene la ejecución del archivo.
Línea 16: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 17: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 18: // 1. Obtener datos de la venta y del cliente
Explicación: Comentario: explica el código y no se ejecuta.
Línea 19: $queryVenta = "SELECT v.*, u.nombre as cliente_nombre, u.apellido as cliente_apellido, c.numero_Documento, c.telefono
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 20: FROM venta v
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 21: LEFT JOIN cliente c ON v.id_Cliente = c.id_Cliente
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 22: LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 23: WHERE v.id_Venta = ?";
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 24: $stmtV = $conn->prepare($queryVenta);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 25: $venta = null;
Explicación: Asigna un valor a la variable `$venta` para utilizarlo después.
Línea 26: if ($stmtV) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 27: $stmtV->bind_param("i", $id_venta);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 28: $stmtV->execute();
Explicación: Ejecuta la consulta preparada.
Línea 29: $venta = $stmtV->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 30: $stmtV->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 31: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 32: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 33: if (!$venta) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 34: die("La venta especificada no existe.");
Explicación: Detiene la ejecución del archivo.
Línea 35: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 36: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 37: // 2. Obtener productos de la venta
Explicación: Comentario: explica el código y no se ejecuta.
Línea 38: $queryDetalles = "SELECT d.*, p.nombre as producto_nombre, p.codigo_Producto
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 39: FROM detalle_venta d
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 40: LEFT JOIN producto p ON d.id_Producto = p.id_Producto
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 41: WHERE d.id_Venta = ?";
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 42: $stmtD = $conn->prepare($queryDetalles);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 43: $detalles = [];
Explicación: Asigna un valor a la variable `$detalles` para utilizarlo después.
Línea 44: if ($stmtD) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 45: $stmtD->bind_param("i", $id_venta);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 46: $stmtD->execute();
Explicación: Ejecuta la consulta preparada.
Línea 47: $resD = $stmtD->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 48: while ($row = $resD->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 49: $detalles[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 50: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 51: $stmtD->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 52: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 53: ?>
Explicación: Cierra el bloque PHP.
Línea 243: <?php if (!empty($venta['numero_Documento'])): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 245: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 246: <?php if (!empty($venta['telefono'])): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 248: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 262: <?php foreach ($detalles as $det): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 272: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
5. Administrador - clientes.php
Ruta: views/administrador/clientes.php
Se explican 249 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/database.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: $mensaje = "";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 13: $tipo_alerta = "";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 14: $titulo_alerta = "";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 15: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 16: // OBTENER FECHA ACTUAL EN ESPAÑOL
Explicación: Comentario: explica el código y no se ejecuta.
Línea 17: $dias = [
Explicación: Asigna un valor a la variable `$dias` para utilizarlo después.
Línea 18: 1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 4 => 'Jueves',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 19: 5 => 'Viernes', 6 => 'Sábado', 7 => 'Domingo'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 20: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 21: $meses = [
Explicación: Asigna un valor a la variable `$meses` para utilizarlo después.
Línea 22: 1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 23: 5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 24: 9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 25: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 26: $diaSemana = date('N');
Explicación: Asigna un valor a la variable `$diaSemana` para utilizarlo después.
Línea 27: $mes = date('n');
Explicación: Asigna un valor a la variable `$mes` para utilizarlo después.
Línea 28: $fechaString = $dias[$diaSemana] . ' ' . date('d') . ' de ' . $meses[$mes];
Explicación: Asigna un valor a la variable `$fechaString` para utilizarlo después.
Línea 29: $horaString = date('h:i a');
Explicación: Asigna un valor a la variable `$horaString` para utilizarlo después.
Línea 30: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 31: // PROCESAR POST ACCIONES (Agregar, Editar)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 32: if ($_SERVER["REQUEST_METHOD"] == "POST") {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 33: $action = $_POST['action'] ?? '';
Explicación: Recibe mediante POST el dato `action` enviado por el formulario.
Línea 34: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 35: if ($action === 'agregar') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 36: $nombre = trim($_POST['nombre'] ?? '');
Explicación: Recibe mediante POST el dato `nombre` enviado por el formulario.
Línea 37: $apellido = trim($_POST['apellido'] ?? '');
Explicación: Recibe mediante POST el dato `apellido` enviado por el formulario.
Línea 38: $documento = trim($_POST['documento'] ?? '');
Explicación: Recibe mediante POST el dato `documento` enviado por el formulario.
Línea 39: $telefono = trim($_POST['telefono'] ?? '');
Explicación: Recibe mediante POST el dato `telefono` enviado por el formulario.
Línea 40: $direccion = trim($_POST['direccion'] ?? '');
Explicación: Recibe mediante POST el dato `direccion` enviado por el formulario.
Línea 41: $estado = $_POST['estado'] ?? 'Activo';
Explicación: Recibe mediante POST el dato `estado` enviado por el formulario.
Línea 42: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 43: if (empty($nombre) || empty($apellido) || empty($documento)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 44: $mensaje = "Nombre, apellido y documento son campos obligatorios.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 45: $tipo_alerta = "warning";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 46: $titulo_alerta = "Campos incompletos";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 47: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 48: // Verificar si el documento ya existe
Explicación: Comentario: explica el código y no se ejecuta.
Línea 49: $stmtCheck = $conn->prepare("SELECT id_Cliente FROM cliente WHERE numero_Documento = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 50: $stmtCheck->bind_param("s", $documento);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 51: $stmtCheck->execute();
Explicación: Ejecuta la consulta preparada.
Línea 52: $stmtCheck->store_result();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 53: if ($stmtCheck->num_rows > 0) {
Explicación: Comprueba cuántos registros devolvió la consulta.
Línea 54: $mensaje = "El número de documento ya está registrado.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 55: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 56: $titulo_alerta = "Cliente existente";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 57: $stmtCheck->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 58: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 59: $stmtCheck->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 60: // Insertar nuevo cliente
Explicación: Comentario: explica el código y no se ejecuta.
Línea 61: $stmtInsert = $conn->prepare("INSERT INTO cliente (nombre, apellido, numero_Documento, telefono, direccion, estado) VALUES (?, ?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 62: $stmtInsert->bind_param("ssssss", $nombre, $apellido, $documento, $telefono, $direccion, $estado);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 63: if ($stmtInsert->execute()) {
Explicación: Ejecuta la consulta preparada.
Línea 64: $mensaje = "Cliente agregado con éxito.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 65: $tipo_alerta = "success";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 66: $titulo_alerta = "¡Éxito!";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 67: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 68: $mensaje = "Error al guardar el cliente.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 69: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 70: $titulo_alerta = "Error";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 71: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 72: $stmtInsert->close();
Explicación: Forma parte de una consulta `INSERT`, utilizada para crear un registro.
Línea 73: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 74: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 75: } elseif ($action === 'editar') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 76: $id_cliente = (int)($_POST['id_cliente'] ?? 0);
Explicación: Recibe mediante POST el dato `id_cliente` enviado por el formulario.
Línea 77: $nombre = trim($_POST['nombre'] ?? '');
Explicación: Recibe mediante POST el dato `nombre` enviado por el formulario.
Línea 78: $apellido = trim($_POST['apellido'] ?? '');
Explicación: Recibe mediante POST el dato `apellido` enviado por el formulario.
Línea 79: $documento = trim($_POST['documento'] ?? '');
Explicación: Recibe mediante POST el dato `documento` enviado por el formulario.
Línea 80: $telefono = trim($_POST['telefono'] ?? '');
Explicación: Recibe mediante POST el dato `telefono` enviado por el formulario.
Línea 81: $direccion = trim($_POST['direccion'] ?? '');
Explicación: Recibe mediante POST el dato `direccion` enviado por el formulario.
Línea 82: $estado = $_POST['estado'] ?? 'Activo';
Explicación: Recibe mediante POST el dato `estado` enviado por el formulario.
Línea 83: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 84: if (empty($nombre) || empty($apellido) || empty($documento) || $id_cliente <= 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 85: $mensaje = "Nombre, apellido y documento son obligatorios.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 86: $tipo_alerta = "warning";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 87: $titulo_alerta = "Campos incompletos";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 88: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 89: // Verificar si el documento ya está ocupado por otro cliente
Explicación: Comentario: explica el código y no se ejecuta.
Línea 90: $stmtCheck = $conn->prepare("SELECT id_Cliente FROM cliente WHERE numero_Documento = ? AND id_Cliente != ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 91: $stmtCheck->bind_param("si", $documento, $id_cliente);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 92: $stmtCheck->execute();
Explicación: Ejecuta la consulta preparada.
Línea 93: $stmtCheck->store_result();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 94: if ($stmtCheck->num_rows > 0) {
Explicación: Comprueba cuántos registros devolvió la consulta.
Línea 95: $mensaje = "El número de documento ya está registrado por otro cliente.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 96: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 97: $titulo_alerta = "Documento duplicado";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 98: $stmtCheck->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 99: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 100: $stmtCheck->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 101: // Actualizar cliente
Explicación: Comentario: explica el código y no se ejecuta.
Línea 102: $stmtUpdate = $conn->prepare("UPDATE cliente SET nombre = ?, apellido = ?, numero_Documento = ?, telefono = ?, direccion = ?, estado = ? WHERE id_Cliente = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 103: $stmtUpdate->bind_param("ssssssi", $nombre, $apellido, $documento, $telefono, $direccion, $estado, $id_cliente);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 104: if ($stmtUpdate->execute()) {
Explicación: Ejecuta la consulta preparada.
Línea 105: $mensaje = "Cliente actualizado con éxito.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 106: $tipo_alerta = "success";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 107: $titulo_alerta = "¡Éxito!";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 108: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 109: $mensaje = "Error al actualizar el cliente.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 110: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 111: $titulo_alerta = "Error";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 112: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 113: $stmtUpdate->close();
Explicación: Forma parte de una consulta `UPDATE`, utilizada para modificar un registro existente.
Línea 114: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 115: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 116: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 117: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 118: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 119: // PROCESAR GET ACCIONES (Eliminar/Inactivar)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 120: if (isset($_GET['action']) && $_GET['action'] === 'eliminar' && isset($_GET['id'])) {
Explicación: Obtiene de la URL el parámetro `action`.
Línea 121: $id_del = (int)$_GET['id'];
Explicación: Obtiene de la URL el parámetro `id`.
Línea 122: if ($id_del > 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 123: $stmtDel = $conn->prepare("UPDATE cliente SET estado = 'Inactivo' WHERE id_Cliente = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 124: $stmtDel->bind_param("i", $id_del);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 125: if ($stmtDel->execute()) {
Explicación: Ejecuta la consulta preparada.
Línea 126: $mensaje = "Cliente inactivado con éxito.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 127: $tipo_alerta = "success";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 128: $titulo_alerta = "¡Éxito!";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 129: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 130: $mensaje = "Error al inactivar el cliente.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 131: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 132: $titulo_alerta = "Error";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 133: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 134: $stmtDel->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 135: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 136: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 137: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 138: // RECUPERAR ESTADÍSTICAS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 139: // 1. Total Clientes
Explicación: Comentario: explica el código y no se ejecuta.
Línea 140: $resTotal = $conn->query("SELECT COUNT(*) as total FROM cliente");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 141: $totalClientes = $resTotal ? (int)$resTotal->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 142: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 143: // 2. Clientes Activos (han realizado compras)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 144: $resActivos = $conn->query("SELECT COUNT(DISTINCT id_Cliente) as total FROM venta WHERE id_Cliente IS NOT NULL AND estado = 'Completada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 145: $clientesActivos = $resActivos ? (int)$resActivos->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 146: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 147: // 3. Nuevos este mes
Explicación: Comentario: explica el código y no se ejecuta.
Línea 148: $resNuevos = $conn->query("SELECT COUNT(*) as total FROM cliente WHERE MONTH(fecha_Registro) = MONTH(CURRENT_DATE()) AND YEAR(fecha_Registro) = YEAR(CURRENT_DATE())");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 149: $nuevosMes = $resNuevos ? (int)$resNuevos->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 150: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 151: // FILTROS Y BÚSQUEDA
Explicación: Comentario: explica el código y no se ejecuta.
Línea 152: $buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
Explicación: Obtiene de la URL el parámetro `buscar`.
Línea 153: $estadoFiltro = isset($_GET['estado']) ? trim($_GET['estado']) : 'Todos';
Explicación: Obtiene de la URL el parámetro `estado`.
Línea 154: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 155: $whereClauses = [];
Explicación: Asigna un valor a la variable `$whereClauses` para utilizarlo después.
Línea 156: $params = [];
Explicación: Asigna un valor a la variable `$params` para utilizarlo después.
Línea 157: $types = "";
Explicación: Asigna un valor a la variable `$types` para utilizarlo después.
Línea 158: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 159: if ($buscar !== '') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 160: $whereClauses[] = "(nombre LIKE ? OR apellido LIKE ? OR numero_Documento LIKE ?)";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 161: $searchWildcard = "%" . $buscar . "%";
Explicación: Asigna un valor a la variable `$searchWildcard` para utilizarlo después.
Línea 162: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 163: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 164: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 165: $types .= "sss";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 166: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 167: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 168: if ($estadoFiltro !== 'Todos') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 169: $whereClauses[] = "estado = ?";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 170: $params[] = $estadoFiltro;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 171: $types .= "s";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 172: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 173: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 174: $whereSql = "";
Explicación: Asigna un valor a la variable `$whereSql` para utilizarlo después.
Línea 175: if (count($whereClauses) > 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 176: $whereSql = "WHERE " . implode(" AND ", $whereClauses);
Explicación: Asigna un valor a la variable `$whereSql` para utilizarlo después.
Línea 177: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 178: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 179: // PAGINACIÓN
Explicación: Comentario: explica el código y no se ejecuta.
Línea 180: $limite = 4; // Mostrando 4 clientes por página
Explicación: Asigna un valor a la variable `$limite` para utilizarlo después.
Línea 181: $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
Explicación: Obtiene de la URL el parámetro `pagina`.
Línea 182: if ($pagina < 1) $pagina = 1;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 183: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 184: // Contar filtrados
Explicación: Comentario: explica el código y no se ejecuta.
Línea 185: $countQuery = "SELECT COUNT(*) as total FROM cliente $whereSql";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 186: $stmtCount = $conn->prepare($countQuery);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 187: if ($stmtCount) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 188: if (count($params) > 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 189: $stmtCount->bind_param($types, ...$params);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 190: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 191: $stmtCount->execute();
Explicación: Ejecuta la consulta preparada.
Línea 192: $totalFiltrado = $stmtCount->get_result()->fetch_assoc()['total'];
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 193: $stmtCount->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 194: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 195: $totalFiltrado = 0;
Explicación: Asigna un valor a la variable `$totalFiltrado` para utilizarlo después.
Línea 196: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 197: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 198: $totalPaginas = ceil($totalFiltrado / $limite);
Explicación: Asigna un valor a la variable `$totalPaginas` para utilizarlo después.
Línea 199: if ($totalPaginas < 1) $totalPaginas = 1;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 200: if ($pagina > $totalPaginas) $pagina = $totalPaginas;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 201: $offset = ($pagina - 1) * $limite;
Explicación: Asigna un valor a la variable `$offset` para utilizarlo después.
Línea 202: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 203: // CONSULTAR CLIENTES PAGINADOS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 204: $query = "SELECT c.*, u.correo FROM cliente c LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento $whereSql LIMIT ?, ?";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 205: $stmt = $conn->prepare($query);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 206: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 207: $execParams = $params;
Explicación: Asigna un valor a la variable `$execParams` para utilizarlo después.
Línea 208: $execTypes = $types;
Explicación: Asigna un valor a la variable `$execTypes` para utilizarlo después.
Línea 209: $execParams[] = $offset;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 210: $execParams[] = $limite;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 211: $execTypes .= "ii";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 212: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 213: $clientes = [];
Explicación: Asigna un valor a la variable `$clientes` para utilizarlo después.
Línea 214: if ($stmt) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 215: $stmt->bind_param($execTypes, ...$execParams);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 216: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 217: $resClientes = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 218: while ($row = $resClientes->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 219: // Calcular compras y total gastado por cliente
Explicación: Comentario: explica el código y no se ejecuta.
Línea 220: $idC = $row['id_Cliente'];
Explicación: Asigna un valor a la variable `$idC` para utilizarlo después.
Línea 221: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 222: $resV = $conn->query("SELECT COUNT(*) as cant, SUM(total) as gastado FROM venta WHERE id_Cliente = $idC AND estado = 'Completada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 223: $vInfo = $resV ? $resV->fetch_assoc() : ['cant' => 0, 'gastado' => 0.00];
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 224: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 225: $resL = $conn->query("SELECT MAX(fecha_Venta) as ultima FROM venta WHERE id_Cliente = $idC AND estado = 'Completada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 226: $lDate = ($resL && $lRow = $resL->fetch_assoc()) ? $lRow['ultima'] : null;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 227: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 228: $row['compras_cant'] = $vInfo['cant'];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 229: $row['compras_total'] = $vInfo['gastado'] ?? 0.00;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 230: $row['ultima_compra'] = $lDate ? date('d/m/y', strtotime($lDate)) : 'N/A';
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 231: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 232: $clientes[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 233: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 234: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 235: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 236: ?>
Explicación: Cierra el bloque PHP.
Línea 263: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 264: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 265: aplicarConfiguracionEstilos();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 266: ?>
Explicación: Cierra el bloque PHP.
Línea 456: <?php if (count($clientes) > 0): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 457: <?php foreach ($clientes as $c): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 493: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 494: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 500: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 521: <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 526: <?php endfor; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 675: <?php if ($mensaje !== ''): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 682: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
5. Administrador - cliente_detalle.php
Ruta: views/administrador/cliente_detalle.php
Se explican 210 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/database.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: $mensaje = "";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 13: $tipo_alerta = "";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 14: $titulo_alerta = "";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 15: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 16: // OBTENER CLIENTE POR ID
Explicación: Comentario: explica el código y no se ejecuta.
Línea 17: $id_cliente = isset($_GET['id']) ? (int)$_GET['id'] : 0;
Explicación: Obtiene de la URL el parámetro `id`.
Línea 18: if ($id_cliente <= 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 19: header("Location: clientes.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 20: exit();
Explicación: Detiene la ejecución del archivo.
Línea 21: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 22: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 23: // Consultar datos del cliente
Explicación: Comentario: explica el código y no se ejecuta.
Línea 24: $stmtClient = $conn->prepare("SELECT c.*, u.correo FROM cliente c LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento WHERE c.id_Cliente = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 25: $stmtClient->bind_param("i", $id_cliente);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 26: $stmtClient->execute();
Explicación: Ejecuta la consulta preparada.
Línea 27: $cliente = $stmtClient->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 28: $stmtClient->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 29: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 30: if (!$cliente) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 31: header("Location: clientes.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 32: exit();
Explicación: Detiene la ejecución del archivo.
Línea 33: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 34: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 35: // Iniciales del cliente para el avatar
Explicación: Comentario: explica el código y no se ejecuta.
Línea 36: $iniciales = strtoupper(substr($cliente['nombre'], 0, 1) . substr($cliente['apellido'], 0, 1));
Explicación: Asigna un valor a la variable `$iniciales` para utilizarlo después.
Línea 37: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 38: // PROCESAR POST ACCIONES (Registrar Deuda, Registrar Abono)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 39: if ($_SERVER["REQUEST_METHOD"] == "POST") {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 40: $action = $_POST['action'] ?? '';
Explicación: Recibe mediante POST el dato `action` enviado por el formulario.
Línea 41: $id_usuario_logueado = $_SESSION['id_Usuario'];
Explicación: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
Línea 42: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 43: if ($action === 'registrar_deuda') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 44: $concepto = trim($_POST['concepto'] ?? '');
Explicación: Recibe mediante POST el dato `concepto` enviado por el formulario.
Línea 45: $monto = (float)($_POST['monto'] ?? 0);
Explicación: Recibe mediante POST el dato `monto` enviado por el formulario.
Línea 46: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 47: if (empty($concepto) || $monto <= 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 48: $mensaje = "Debe ingresar un concepto y un monto mayor a cero.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 49: $tipo_alerta = "warning";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 50: $titulo_alerta = "Datos inválidos";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 51: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 52: $stmtInsertDeuda = $conn->prepare("INSERT INTO deuda (fecha_Registro, valor_Inicial, saldo_Pendiente, estado, id_Usuario, id_Cliente, concepto) VALUES (NOW(), ?, ?, 'Pendiente', ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 53: $stmtInsertDeuda->bind_param("ddiis", $monto, $monto, $id_usuario_logueado, $id_cliente, $concepto);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 54: if ($stmtInsertDeuda->execute()) {
Explicación: Ejecuta la consulta preparada.
Línea 55: $mensaje = "Deuda registrada con éxito.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 56: $tipo_alerta = "success";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 57: $titulo_alerta = "¡Éxito!";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 58: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 59: $mensaje = "Error al registrar la deuda: " . $conn->error;
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 60: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 61: $titulo_alerta = "Error";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 62: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 63: $stmtInsertDeuda->close();
Explicación: Forma parte de una consulta `INSERT`, utilizada para crear un registro.
Línea 64: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 65: } elseif ($action === 'registrar_abono') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 66: $id_deuda = (int)($_POST['id_deuda'] ?? 0);
Explicación: Recibe mediante POST el dato `id_deuda` enviado por el formulario.
Línea 67: $monto_abono = (float)($_POST['monto_abono'] ?? 0);
Explicación: Recibe mediante POST el dato `monto_abono` enviado por el formulario.
Línea 68: $nuevo_estado = $_POST['nuevo_estado'] ?? '';
Explicación: Recibe mediante POST el dato `nuevo_estado` enviado por el formulario.
Línea 69: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 70: if ($id_deuda <= 0 || $monto_abono <= 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 71: $mensaje = "Debe seleccionar una deuda y especificar un monto de abono válido.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 72: $tipo_alerta = "warning";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 73: $titulo_alerta = "Datos incompletos";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 74: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 75: // Iniciar transacción
Explicación: Comentario: explica el código y no se ejecuta.
Línea 76: $conn->begin_transaction();
Explicación: Inicia una transacción para que varias operaciones se confirmen o reviertan juntas.
Línea 77: try {
Explicación: Inicia un bloque donde se controlarán posibles errores.
Línea 78: // Obtener detalles de la deuda
Explicación: Comentario: explica el código y no se ejecuta.
Línea 79: $stmtGetD = $conn->prepare("SELECT saldo_Pendiente, valor_Inicial FROM deuda WHERE id_Deuda = ? FOR UPDATE");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 80: $stmtGetD->bind_param("i", $id_deuda);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 81: $stmtGetD->execute();
Explicación: Ejecuta la consulta preparada.
Línea 82: $deuda_row = $stmtGetD->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 83: $stmtGetD->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 84: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 85: if (!$deuda_row) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 86: throw new Exception("La deuda seleccionada no existe.");
Explicación: Crea una instancia de la clase `Exception` para utilizar sus métodos.
Línea 87: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 88: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 89: $saldo_actual = (float)$deuda_row['saldo_Pendiente'];
Explicación: Asigna un valor a la variable `$saldo_actual` para utilizarlo después.
Línea 90: if ($monto_abono > $saldo_actual) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 91: throw new Exception("El abono no puede superar el saldo pendiente ($" . number_format($saldo_actual, 0, ',', '.') . ").");
Explicación: Crea una instancia de la clase `Exception` para utilizar sus métodos.
Línea 92: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 93: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 94: $nuevo_saldo = $saldo_actual - $monto_abono;
Explicación: Asigna un valor a la variable `$nuevo_saldo` para utilizarlo después.
Línea 95: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 96: // Determinar el estado final de la deuda
Explicación: Comentario: explica el código y no se ejecuta.
Línea 97: if ($nuevo_saldo <= 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 98: $estado_final = 'Pagada';
Explicación: Asigna un valor a la variable `$estado_final` para utilizarlo después.
Línea 99: $nuevo_saldo = 0.00;
Explicación: Asigna un valor a la variable `$nuevo_saldo` para utilizarlo después.
Línea 100: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 101: $estado_final = ($nuevo_estado === 'Pagada') ? 'Abonada' : $nuevo_estado; // Si seleccionan pagada pero queda saldo, es abonada
Explicación: Asigna un valor a la variable `$estado_final` para utilizarlo después.
Línea 102: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 103: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 104: // 1. Insertar abono
Explicación: Comentario: explica el código y no se ejecuta.
Línea 105: $stmtA = $conn->prepare("INSERT INTO abono (fecha_Abono, valor_Abonado, id_Deuda, id_Usuario) VALUES (NOW(), ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 106: $stmtA->bind_param("dii", $monto_abono, $id_deuda, $id_usuario_logueado);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 107: $stmtA->execute();
Explicación: Ejecuta la consulta preparada.
Línea 108: $stmtA->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 109: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 110: // 2. Actualizar deuda
Explicación: Comentario: explica el código y no se ejecuta.
Línea 111: $stmtU = $conn->prepare("UPDATE deuda SET saldo_Pendiente = ?, estado = ? WHERE id_Deuda = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 112: $stmtU->bind_param("dsi", $nuevo_saldo, $estado_final, $id_deuda);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 113: $stmtU->execute();
Explicación: Ejecuta la consulta preparada.
Línea 114: $stmtU->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 115: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 116: // Confirmar transacción
Explicación: Comentario: explica el código y no se ejecuta.
Línea 117: $conn->commit();
Explicación: Confirma la transacción y guarda definitivamente los cambios.
Línea 118: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 119: $mensaje = "Abono registrado correctamente.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 120: $tipo_alerta = "success";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 121: $titulo_alerta = "¡Éxito!";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 122: } catch (Exception $e) {
Explicación: Captura y maneja un error producido dentro del bloque `try`.
Línea 123: $conn->rollback();
Explicación: Revierte la transacción cuando ocurre un error.
Línea 124: $mensaje = $e->getMessage();
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 125: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 126: $titulo_alerta = "Error de transacción";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 127: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 128: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 129: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 130: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 131: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 132: // CÁLCULO DE MÉTRICAS Y DATOS HISTÓRICOS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 133: // 1. Total Compras
Explicación: Comentario: explica el código y no se ejecuta.
Línea 134: $resV = $conn->query("SELECT COUNT(*) as cant, SUM(total) as gastado FROM venta WHERE id_Cliente = $id_cliente AND estado = 'Completada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 135: $vInfo = $resV ? $resV->fetch_assoc() : ['cant' => 0, 'gastado' => 0.00];
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 136: $totalCompras = $vInfo['gastado'] ?? 0.00;
Explicación: Asigna un valor a la variable `$totalCompras` para utilizarlo después.
Línea 137: $totalComprasCant = $vInfo['cant'];
Explicación: Asigna un valor a la variable `$totalComprasCant` para utilizarlo después.
Línea 138: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 139: // 2. Deuda Total (Suma de saldos pendientes de deudas no pagadas)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 140: $resD = $conn->query("SELECT SUM(saldo_Pendiente) as total_pendiente, COUNT(*) as cant FROM deuda WHERE id_Cliente = $id_cliente AND estado != 'Pagada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 141: $dInfo = $resD ? $resD->fetch_assoc() : ['total_pendiente' => 0.00, 'cant' => 0];
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 142: $deudaTotal = $dInfo['total_pendiente'] ?? 0.00;
Explicación: Asigna un valor a la variable `$deudaTotal` para utilizarlo después.
Línea 143: $deudaTotalCant = $dInfo['cant'];
Explicación: Asigna un valor a la variable `$deudaTotalCant` para utilizarlo después.
Línea 144: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 145: // 3. Última Compra
Explicación: Comentario: explica el código y no se ejecuta.
Línea 146: $resL = $conn->query("SELECT MAX(fecha_Venta) as ultima FROM venta WHERE id_Cliente = $id_cliente AND estado = 'Completada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 147: $lDate = ($resL && $lRow = $resL->fetch_assoc()) ? $lRow['ultima'] : null;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 148: $ultimaCompra = $lDate ? date('d/m/y', strtotime($lDate)) : 'N/A';
Explicación: Asigna un valor a la variable `$ultimaCompra` para utilizarlo después.
Línea 149: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 150: // Obtener deudas registradas
Explicación: Comentario: explica el código y no se ejecuta.
Línea 151: $deudas = [];
Explicación: Asigna un valor a la variable `$deudas` para utilizarlo después.
Línea 152: $resDeudas = $conn->query("SELECT * FROM deuda WHERE id_Cliente = $id_cliente ORDER BY fecha_Registro DESC");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 153: if ($resDeudas) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 154: while ($row = $resDeudas->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 155: $deudas[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 156: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 157: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 158: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 159: // Obtener lista de deudas pendientes para el dropdown de abono
Explicación: Comentario: explica el código y no se ejecuta.
Línea 160: $deudasPendientes = array_filter($deudas, function($d) {
Explicación: Asigna un valor a la variable `$deudasPendientes` para utilizarlo después.
Línea 161: return $d['estado'] !== 'Pagada';
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 162: });
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 163: ?>
Explicación: Cierra el bloque PHP.
Línea 190: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 191: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 192: aplicarConfiguracionEstilos();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 193: ?>
Explicación: Cierra el bloque PHP.
Línea 313: <?php if ($deudaTotalCant > 0): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 317: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 321: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 370: <?php if (count($deudas) > 0): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 371: <?php foreach ($deudas as $d): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 372: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 373: $abonado = $d['valor_Inicial'] - $d['saldo_Pendiente'];
Explicación: Asigna un valor a la variable `$abonado` para utilizarlo después.
Línea 374: $estadoClase = strtolower($d['estado']);
Explicación: Asigna un valor a la variable `$estadoClase` para utilizarlo después.
Línea 375: ?>
Explicación: Cierra el bloque PHP.
Línea 394: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 395: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 401: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 408: <?php if (count($deudasPendientes) > 0): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 419: <?php foreach ($deudasPendientes as $dp): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 423: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 445: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 565: <?php if ($mensaje !== ''): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 572: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 578: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 579: // API interna sencilla para obtener abonos vía AJAX
Explicación: Comentario: explica el código y no se ejecuta.
Línea 580: if (isset($_GET['action']) && $_GET['action'] === 'get_abonos' && isset($_GET['id_deuda'])) {
Explicación: Obtiene de la URL el parámetro `action`.
Línea 581: ob_clean(); // Limpiar buffers anteriores
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 582: header('Content-Type: application/json');
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 583: $id_deuda = (int)$_GET['id_deuda'];
Explicación: Obtiene de la URL el parámetro `id_deuda`.
Línea 584: $abonos = [];
Explicación: Asigna un valor a la variable `$abonos` para utilizarlo después.
Línea 585: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 586: $stmtAbonos = $conn->prepare("SELECT fecha_Abono, valor_Abonado FROM abono WHERE id_Deuda = ? ORDER BY fecha_Abono DESC");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 587: if ($stmtAbonos) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 588: $stmtAbonos->bind_param("i", $id_deuda);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 589: $stmtAbonos->execute();
Explicación: Ejecuta la consulta preparada.
Línea 590: $res = $stmtAbonos->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 591: while ($row = $res->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 592: $abonos[] = [
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 593: 'fecha' => date('d/m/Y H:i', strtotime($row['fecha_Abono'])),
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 594: 'monto' => $row['valor_Abonado']
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 595: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 596: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 597: $stmtAbonos->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 598: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 599: echo json_encode($abonos);
Explicación: Envía contenido al navegador para mostrarlo.
Línea 600: exit();
Explicación: Detiene la ejecución del archivo.
Línea 601: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 602: ?>
Explicación: Cierra el bloque PHP.
 
5. Administrador - vendedores.php
Ruta: views/administrador/vendedores.php
Se explican 269 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: // Obtener info del administrador logueado para mostrar en el modal del ojo
Explicación: Comentario: explica el código y no se ejecuta.
Línea 13: $id_admin_logueado = $_SESSION['id_Usuario'] ?? 0;
Explicación: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
Línea 14: $resAdminLogueado = $conn->query("SELECT * FROM usuarios WHERE id_Usuario = $id_admin_logueado");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 15: $adminLogueadoInfo = $resAdminLogueado ? $resAdminLogueado->fetch_assoc() : null;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 16: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 17: $mensaje = "";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 18: $tipo_alerta = "";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 19: $titulo_alerta = "";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 20: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 21: // PROCESAR POST ACCIONES
Explicación: Comentario: explica el código y no se ejecuta.
Línea 22: if ($_SERVER["REQUEST_METHOD"] == "POST") {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 23: $action = $_POST['action'] ?? '';
Explicación: Recibe mediante POST el dato `action` enviado por el formulario.
Línea 24: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 25: if ($action === 'agregar') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 26: $nombre = trim($_POST['nombre'] ?? '');
Explicación: Recibe mediante POST el dato `nombre` enviado por el formulario.
Línea 27: $apellido = trim($_POST['apellido'] ?? '');
Explicación: Recibe mediante POST el dato `apellido` enviado por el formulario.
Línea 28: $documento = trim($_POST['documento'] ?? '');
Explicación: Recibe mediante POST el dato `documento` enviado por el formulario.
Línea 29: $correo = trim($_POST['correo'] ?? '');
Explicación: Recibe mediante POST el dato `correo` enviado por el formulario.
Línea 30: $telefono = trim($_POST['telefono'] ?? '');
Explicación: Recibe mediante POST el dato `telefono` enviado por el formulario.
Línea 31: $usuario = trim($_POST['usuario'] ?? '');
Explicación: Recibe mediante POST el dato `usuario` enviado por el formulario.
Línea 32: $password = $_POST['contraseña'] ?? '';
Explicación: Recibe mediante POST el dato `contraseña` enviado por el formulario.
Línea 33: $estado = $_POST['estado'] ?? 'Activo';
Explicación: Recibe mediante POST el dato `estado` enviado por el formulario.
Línea 34: $id_rol = '2'; // Rol 2 = Vendedor
Explicación: Asigna un valor a la variable `$id_rol` para utilizarlo después.
Línea 35: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 36: if ($nombre && $apellido && $documento && $correo && $usuario && $password) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 37: // Verificar duplicados (documento, correo o usuario)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 38: $stmtCheck = $conn->prepare("SELECT id_Usuario FROM usuarios WHERE numero_Documento = ? OR correo = ? OR nombre_Usuario = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 39: $stmtCheck->bind_param("sss", $documento, $correo, $usuario);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 40: $stmtCheck->execute();
Explicación: Ejecuta la consulta preparada.
Línea 41: $resCheck = $stmtCheck->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 42: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 43: if ($resCheck->num_rows > 0) {
Explicación: Comprueba cuántos registros devolvió la consulta.
Línea 44: $mensaje = "El documento, correo o nombre de usuario ya está registrado en el sistema.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 45: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 46: $titulo_alerta = "Duplicado";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 47: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 48: // Registrar
Explicación: Comentario: explica el código y no se ejecuta.
Línea 49: $hashed_password = password_hash($password, PASSWORD_BCRYPT);
Explicación: Cifra la contraseña mediante un hash seguro antes de almacenarla.
Línea 50: $stmtInsert = $conn->prepare("INSERT INTO usuarios (nombre, apellido, numero_Documento, id_Rol, telefono, correo, nombre_Usuario, contraseña, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 51: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 52: if ($stmtInsert) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 53: $stmtInsert->bind_param("sssssssss", $nombre, $apellido, $documento, $id_rol, $telefono, $correo, $usuario, $hashed_password, $estado);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 54: if ($stmtInsert->execute()) {
Explicación: Ejecuta la consulta preparada.
Línea 55: $mensaje = "El vendedor ha sido registrado correctamente.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 56: $tipo_alerta = "success";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 57: $titulo_alerta = "¡Éxito!";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 58: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 59: $mensaje = "Error al intentar insertar en la base de datos.";
Explicación: Forma parte de una consulta `INSERT`, utilizada para crear un registro.
Línea 60: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 61: $titulo_alerta = "Error";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 62: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 63: $stmtInsert->close();
Explicación: Forma parte de una consulta `INSERT`, utilizada para crear un registro.
Línea 64: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 65: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 66: $stmtCheck->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 67: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 68: $mensaje = "Todos los campos obligatorios deben estar completos.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 69: $tipo_alerta = "warning";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 70: $titulo_alerta = "Campos vacíos";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 71: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 72: } elseif ($action === 'editar') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 73: $id_vendedor = (int)($_POST['id_usuario'] ?? 0);
Explicación: Recibe mediante POST el dato `id_usuario` enviado por el formulario.
Línea 74: $nombre = trim($_POST['nombre'] ?? '');
Explicación: Recibe mediante POST el dato `nombre` enviado por el formulario.
Línea 75: $apellido = trim($_POST['apellido'] ?? '');
Explicación: Recibe mediante POST el dato `apellido` enviado por el formulario.
Línea 76: $documento = trim($_POST['documento'] ?? '');
Explicación: Recibe mediante POST el dato `documento` enviado por el formulario.
Línea 77: $correo = trim($_POST['correo'] ?? '');
Explicación: Recibe mediante POST el dato `correo` enviado por el formulario.
Línea 78: $telefono = trim($_POST['telefono'] ?? '');
Explicación: Recibe mediante POST el dato `telefono` enviado por el formulario.
Línea 79: $usuario = trim($_POST['usuario'] ?? '');
Explicación: Recibe mediante POST el dato `usuario` enviado por el formulario.
Línea 80: $password = $_POST['contraseña'] ?? '';
Explicación: Recibe mediante POST el dato `contraseña` enviado por el formulario.
Línea 81: $estado = $_POST['estado'] ?? 'Activo';
Explicación: Recibe mediante POST el dato `estado` enviado por el formulario.
Línea 82: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 83: if ($id_vendedor > 0 && $nombre && $apellido && $documento && $correo && $usuario) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 84: // Verificar duplicados excluyendo al vendedor actual
Explicación: Comentario: explica el código y no se ejecuta.
Línea 85: $stmtCheck = $conn->prepare("SELECT id_Usuario FROM usuarios WHERE (numero_Documento = ? OR correo = ? OR nombre_Usuario = ?) AND id_Usuario != ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 86: $stmtCheck->bind_param("sssi", $documento, $correo, $usuario, $id_vendedor);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 87: $stmtCheck->execute();
Explicación: Ejecuta la consulta preparada.
Línea 88: $resCheck = $stmtCheck->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 89: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 90: if ($resCheck->num_rows > 0) {
Explicación: Comprueba cuántos registros devolvió la consulta.
Línea 91: $mensaje = "El documento, correo o usuario pertenece a otro registro.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 92: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 93: $titulo_alerta = "Duplicado";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 94: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 95: // Si la contraseña está vacía, no actualizarla
Explicación: Comentario: explica el código y no se ejecuta.
Línea 96: if ($password !== '') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 97: $hashed_password = password_hash($password, PASSWORD_BCRYPT);
Explicación: Cifra la contraseña mediante un hash seguro antes de almacenarla.
Línea 98: $stmtUpdate = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, numero_Documento = ?, correo = ?, telefono = ?, nombre_Usuario = ?, contraseña = ?, estado = ? WHERE id_Usuario = ? AND id_Rol = 2");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 99: $stmtUpdate->bind_param("ssssssssi", $nombre, $apellido, $documento, $correo, $telefono, $usuario, $hashed_password, $estado, $id_vendedor);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 100: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 101: $stmtUpdate = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, numero_Documento = ?, correo = ?, telefono = ?, nombre_Usuario = ?, estado = ? WHERE id_Usuario = ? AND id_Rol = 2");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 102: $stmtUpdate->bind_param("sssssssi", $nombre, $apellido, $documento, $correo, $telefono, $usuario, $estado, $id_vendedor);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 103: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 104: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 105: if ($stmtUpdate) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 106: if ($stmtUpdate->execute()) {
Explicación: Ejecuta la consulta preparada.
Línea 107: $mensaje = "La información del vendedor ha sido actualizada.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 108: $tipo_alerta = "success";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 109: $titulo_alerta = "¡Éxito!";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 110: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 111: $mensaje = "Error al actualizar la base de datos.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 112: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 113: $titulo_alerta = "Error";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 114: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 115: $stmtUpdate->close();
Explicación: Forma parte de una consulta `UPDATE`, utilizada para modificar un registro existente.
Línea 116: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 117: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 118: $stmtCheck->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 119: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 120: } elseif ($action === 'eliminar') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 121: $id_vendedor = (int)($_POST['id_usuario'] ?? 0);
Explicación: Recibe mediante POST el dato `id_usuario` enviado por el formulario.
Línea 122: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 123: if ($id_vendedor > 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 124: // Intentar eliminación. Si tiene ventas, cambiar estado a 'Inactivo' de forma segura.
Explicación: Comentario: explica el código y no se ejecuta.
Línea 125: try {
Explicación: Inicia un bloque donde se controlarán posibles errores.
Línea 126: $stmtDel = $conn->prepare("DELETE FROM usuarios WHERE id_Usuario = ? AND id_Rol = 2");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 127: $stmtDel->bind_param("i", $id_vendedor);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 128: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 129: if ($stmtDel->execute()) {
Explicación: Ejecuta la consulta preparada.
Línea 130: if ($stmtDel->affected_rows > 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 131: $mensaje = "El vendedor ha sido eliminado del sistema.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 132: $tipo_alerta = "success";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 133: $titulo_alerta = "¡Eliminado!";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 134: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 135: $mensaje = "No se encontró el vendedor o no se pudo eliminar.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 136: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 137: $titulo_alerta = "Error";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 138: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 139: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 140: $stmtDel->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 141: } catch (mysqli_sql_exception $e) {
Explicación: Captura y maneja un error producido dentro del bloque `try`.
Línea 142: // Llave foránea detectada, cambiar a Inactivo en lugar de fallar
Explicación: Comentario: explica el código y no se ejecuta.
Línea 143: $stmtInact = $conn->prepare("UPDATE usuarios SET estado = 'Inactivo' WHERE id_Usuario = ? AND id_Rol = 2");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 144: $stmtInact->bind_param("i", $id_vendedor);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 145: if ($stmtInact->execute()) {
Explicación: Ejecuta la consulta preparada.
Línea 146: $mensaje = "El vendedor tiene ventas asociadas y no puede ser eliminado. Su estado ha sido cambiado a 'Inactivo'.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 147: $tipo_alerta = "warning";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 148: $titulo_alerta = "Vendedor Desactivado";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 149: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 150: $mensaje = "Error al intentar desactivar el vendedor.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 151: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 152: $titulo_alerta = "Error";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 153: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 154: $stmtInact->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 155: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 156: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 157: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 158: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 159: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 160: // RECUPERAR ESTADÍSTICAS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 161: // 1. Total Vendedores
Explicación: Comentario: explica el código y no se ejecuta.
Línea 162: $resTotal = $conn->query("SELECT COUNT(*) as total FROM usuarios WHERE id_Rol = 2");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 163: $totalVendedores = $resTotal ? (int)$resTotal->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 164: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 165: // 2. Vendedores Activos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 166: $resActivos = $conn->query("SELECT COUNT(*) as total FROM usuarios WHERE id_Rol = 2 AND estado = 'Activo'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 167: $vendedoresActivos = $resActivos ? (int)$resActivos->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 168: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 169: // 3. Nuevos este mes
Explicación: Comentario: explica el código y no se ejecuta.
Línea 170: $resNuevos = $conn->query("SELECT COUNT(*) as total FROM usuarios WHERE id_Rol = 2 AND MONTH(fecha_Registro) = MONTH(CURRENT_DATE()) AND YEAR(fecha_Registro) = YEAR(CURRENT_DATE())");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 171: $nuevosMes = $resNuevos ? (int)$resNuevos->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 172: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 173: // FILTROS Y BÚSQUEDA
Explicación: Comentario: explica el código y no se ejecuta.
Línea 174: $buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
Explicación: Obtiene de la URL el parámetro `buscar`.
Línea 175: $estadoFiltro = isset($_GET['estado']) ? trim($_GET['estado']) : 'Todos';
Explicación: Obtiene de la URL el parámetro `estado`.
Línea 176: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 177: $whereClauses = ["id_Rol = 2"];
Explicación: Asigna un valor a la variable `$whereClauses` para utilizarlo después.
Línea 178: $params = [];
Explicación: Asigna un valor a la variable `$params` para utilizarlo después.
Línea 179: $types = "";
Explicación: Asigna un valor a la variable `$types` para utilizarlo después.
Línea 180: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 181: if ($buscar !== '') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 182: $whereClauses[] = "(nombre LIKE ? OR apellido LIKE ? OR nombre_Usuario LIKE ? OR numero_Documento LIKE ?)";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 183: $searchWildcard = "%" . $buscar . "%";
Explicación: Asigna un valor a la variable `$searchWildcard` para utilizarlo después.
Línea 184: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 185: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 186: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 187: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 188: $types .= "ssss";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 189: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 190: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 191: if ($estadoFiltro !== 'Todos') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 192: $whereClauses[] = "estado = ?";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 193: $params[] = $estadoFiltro;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 194: $types .= "s";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 195: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 196: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 197: $whereSql = "WHERE " . implode(" AND ", $whereClauses);
Explicación: Asigna un valor a la variable `$whereSql` para utilizarlo después.
Línea 198: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 199: // PAGINACIÓN
Explicación: Comentario: explica el código y no se ejecuta.
Línea 200: $limite = 5;
Explicación: Asigna un valor a la variable `$limite` para utilizarlo después.
Línea 201: $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
Explicación: Obtiene de la URL el parámetro `pagina`.
Línea 202: if ($pagina < 1) $pagina = 1;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 203: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 204: // Contar total de registros filtrados
Explicación: Comentario: explica el código y no se ejecuta.
Línea 205: $countQuery = "SELECT COUNT(*) as total FROM usuarios $whereSql";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 206: $stmtCount = $conn->prepare($countQuery);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 207: if ($stmtCount) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 208: if (!empty($params)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 209: $stmtCount->bind_param($types, ...$params);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 210: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 211: $stmtCount->execute();
Explicación: Ejecuta la consulta preparada.
Línea 212: $totalFiltrados = $stmtCount->get_result()->fetch_assoc()['total'];
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 213: $stmtCount->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 214: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 215: $totalFiltrados = 0;
Explicación: Asigna un valor a la variable `$totalFiltrados` para utilizarlo después.
Línea 216: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 217: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 218: $totalPaginas = ceil($totalFiltrados / $limite);
Explicación: Asigna un valor a la variable `$totalPaginas` para utilizarlo después.
Línea 219: if ($totalPaginas < 1) $totalPaginas = 1;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 220: if ($pagina > $totalPaginas) $pagina = $totalPaginas;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 221: $offset = ($pagina - 1) * $limite;
Explicación: Asigna un valor a la variable `$offset` para utilizarlo después.
Línea 222: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 223: // CONSULTAR VENDEDORES PAGINADOS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 224: $query = "SELECT * FROM usuarios $whereSql ORDER BY fecha_Registro DESC LIMIT ?, ?";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 225: $stmt = $conn->prepare($query);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 226: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 227: $execParams = $params;
Explicación: Asigna un valor a la variable `$execParams` para utilizarlo después.
Línea 228: $execTypes = $types;
Explicación: Asigna un valor a la variable `$execTypes` para utilizarlo después.
Línea 229: $execParams[] = $offset;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 230: $execParams[] = $limite;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 231: $execTypes .= "ii";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 232: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 233: $vendedores = [];
Explicación: Asigna un valor a la variable `$vendedores` para utilizarlo después.
Línea 234: if ($stmt) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 235: $stmt->bind_param($execTypes, ...$execParams);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 236: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 237: $resVendedores = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 238: while ($row = $resVendedores->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 239: // Calcular estadísticas de venta por vendedor
Explicación: Comentario: explica el código y no se ejecuta.
Línea 240: $idU = $row['id_Usuario'];
Explicación: Asigna un valor a la variable `$idU` para utilizarlo después.
Línea 241: $resSales = $conn->query("SELECT COUNT(*) as cant, SUM(total) as sum_total FROM venta WHERE id_Usuario = $idU AND estado = 'Completada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 242: $salesInfo = $resSales ? $resSales->fetch_assoc() : ['cant' => 0, 'sum_total' => 0.00];
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 243: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 244: $row['ventas_cant'] = $salesInfo['cant'] ?? 0;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 245: $row['ventas_monto'] = $salesInfo['sum_total'] ?? 0.00;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 246: $vendedores[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 247: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 248: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 249: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 250: ?>
Explicación: Cierra el bloque PHP.
Línea 279: <?php aplicarConfiguracionEstilos(); ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 446: <?php if ($buscar !== '' || $estadoFiltro !== 'Todos'): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 450: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 469: <?php if (count($vendedores) > 0): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 470: <?php foreach ($vendedores as $v): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 522: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 523: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 529: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 546: <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 549: <?php endfor; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 744: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 745: $user_admin = $adminLogueadoInfo['nombre_Usuario'] ?? '';
Explicación: Asigna un valor a la variable `$user_admin` para utilizarlo después.
Línea 746: $plain_pass = 'admin123'; // Default para ruben_admin y otros
Explicación: Asigna un valor a la variable `$plain_pass` para utilizarlo después.
Línea 747: if ($user_admin === 'admin') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 748: $plain_pass = 'admin';
Explicación: Asigna un valor a la variable `$plain_pass` para utilizarlo después.
Línea 749: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 750: ?>
Explicación: Cierra el bloque PHP.
Línea 850: <?php if ($mensaje !== ''): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 857: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
5. Administrador - crear_vendedor.php
Ruta: views/administrador/crear_vendedor.php
Se explican 71 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: $mensaje = "";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 13: $tipo_alerta = "";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 14: $titulo_alerta = "";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 15: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 16: if ($_SERVER["REQUEST_METHOD"] == "POST") {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 17: $nombre = trim($_POST['nombre'] ?? '');
Explicación: Recibe mediante POST el dato `nombre` enviado por el formulario.
Línea 18: $apellido = trim($_POST['apellido'] ?? '');
Explicación: Recibe mediante POST el dato `apellido` enviado por el formulario.
Línea 19: $documento = trim($_POST['documento'] ?? '');
Explicación: Recibe mediante POST el dato `documento` enviado por el formulario.
Línea 20: $correo = trim($_POST['correo'] ?? '');
Explicación: Recibe mediante POST el dato `correo` enviado por el formulario.
Línea 21: $telefono = trim($_POST['telefono'] ?? '');
Explicación: Recibe mediante POST el dato `telefono` enviado por el formulario.
Línea 22: $usuario = trim($_POST['usuario'] ?? '');
Explicación: Recibe mediante POST el dato `usuario` enviado por el formulario.
Línea 23: $password = $_POST['contraseña'] ?? '';
Explicación: Recibe mediante POST el dato `contraseña` enviado por el formulario.
Línea 24: $estado = $_POST['estado'] ?? 'Activo';
Explicación: Recibe mediante POST el dato `estado` enviado por el formulario.
Línea 25: $id_rol = '2'; // Rol 2 = Vendedor
Explicación: Asigna un valor a la variable `$id_rol` para utilizarlo después.
Línea 26: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 27: if ($nombre && $apellido && $documento && $correo && $usuario && $password) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 28: // Verificar duplicados
Explicación: Comentario: explica el código y no se ejecuta.
Línea 29: $stmtCheck = $conn->prepare("SELECT id_Usuario FROM usuarios WHERE numero_Documento = ? OR correo = ? OR nombre_Usuario = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 30: if ($stmtCheck) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 31: $stmtCheck->bind_param("sss", $documento, $correo, $usuario);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 32: $stmtCheck->execute();
Explicación: Ejecuta la consulta preparada.
Línea 33: $resCheck = $stmtCheck->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 34: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 35: if ($resCheck->num_rows > 0) {
Explicación: Comprueba cuántos registros devolvió la consulta.
Línea 36: $mensaje = "El documento, correo o nombre de usuario ya está registrado en el sistema.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 37: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 38: $titulo_alerta = "Duplicado";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 39: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 40: // Registrar
Explicación: Comentario: explica el código y no se ejecuta.
Línea 41: $hashed_password = password_hash($password, PASSWORD_BCRYPT);
Explicación: Cifra la contraseña mediante un hash seguro antes de almacenarla.
Línea 42: $stmtInsert = $conn->prepare("INSERT INTO usuarios (nombre, apellido, numero_Documento, id_Rol, telefono, correo, nombre_Usuario, contraseña, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 43: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 44: if ($stmtInsert) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 45: $stmtInsert->bind_param("sssssssss", $nombre, $apellido, $documento, $id_rol, $telefono, $correo, $usuario, $hashed_password, $estado);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 46: if ($stmtInsert->execute()) {
Explicación: Ejecuta la consulta preparada.
Línea 47: $mensaje = "El vendedor ha sido registrado correctamente.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 48: $tipo_alerta = "success";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 49: $titulo_alerta = "¡Éxito!";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 50: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 51: $mensaje = "Error al intentar insertar en la base de datos.";
Explicación: Forma parte de una consulta `INSERT`, utilizada para crear un registro.
Línea 52: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 53: $titulo_alerta = "Error";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 54: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 55: $stmtInsert->close();
Explicación: Forma parte de una consulta `INSERT`, utilizada para crear un registro.
Línea 56: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 57: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 58: $stmtCheck->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 59: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 60: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 61: $mensaje = "Todos los campos obligatorios deben estar completos.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 62: $tipo_alerta = "warning";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 63: $titulo_alerta = "Campos vacíos";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 64: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 65: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 66: ?>
Explicación: Cierra el bloque PHP.
Línea 252: <?php aplicarConfiguracionEstilos(); ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 452: <?php if ($mensaje !== ''): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 459: <?php if ($tipo_alerta === 'success'): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 461: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 463: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
5. Administrador - crear_admin.php
Ruta: views/administrador/crear_admin.php
Se explican 87 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: // Incluir la base de datos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 3: require_once __DIR__ . '/../../configuration/database.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 4: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 5: $mensaje = "";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 6: $tipo_alerta = "";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 7: $titulo_alerta = "";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 8: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 9: if ($_SERVER["REQUEST_METHOD"] == "POST") {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 10: $nombre = trim($_POST["nombre"] ?? '');
Explicación: Recibe mediante POST el dato `nombre` enviado por el formulario.
Línea 11: $apellido = trim($_POST["apellido"] ?? '');
Explicación: Recibe mediante POST el dato `apellido` enviado por el formulario.
Línea 12: $documento = trim($_POST["documento"] ?? '');
Explicación: Recibe mediante POST el dato `documento` enviado por el formulario.
Línea 13: $telefono = trim($_POST["telefono"] ?? '');
Explicación: Recibe mediante POST el dato `telefono` enviado por el formulario.
Línea 14: $usuario = trim($_POST["usuario"] ?? '');
Explicación: Recibe mediante POST el dato `usuario` enviado por el formulario.
Línea 15: $correo = trim($_POST["correo"] ?? '');
Explicación: Recibe mediante POST el dato `correo` enviado por el formulario.
Línea 16: $password = $_POST["password"] ?? '';
Explicación: Recibe mediante POST el dato `password` enviado por el formulario.
Línea 17: $confirmar = $_POST["confirmar"] ?? '';
Explicación: Recibe mediante POST el dato `confirmar` enviado por el formulario.
Línea 18: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 19: // Validar campos obligatorios
Explicación: Comentario: explica el código y no se ejecuta.
Línea 20: if (empty($nombre) || empty($apellido) || empty($documento) || empty($usuario) || empty($correo) || empty($password) || empty($confirmar)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 21: $mensaje = "Por favor, complete todos los campos requeridos.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 22: $tipo_alerta = "warning";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 23: $titulo_alerta = "Campos incompletos";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 24: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 25: // Validar contraseñas
Explicación: Comentario: explica el código y no se ejecuta.
Línea 26: elseif ($password !== $confirmar) {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 27: $mensaje = "Las contraseñas ingresadas no coinciden.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 28: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 29: $titulo_alerta = "Contraseñas no coinciden";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 30: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 31: // Verificar si el usuario o correo ya existen en la base de datos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 32: $stmtCheck = $conn->prepare("SELECT id_Usuario FROM usuarios WHERE nombre_Usuario = ? OR correo = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 33: if ($stmtCheck) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 34: $stmtCheck->bind_param("ss", $usuario, $correo);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 35: $stmtCheck->execute();
Explicación: Ejecuta la consulta preparada.
Línea 36: $stmtCheck->store_result();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 37: $exists = $stmtCheck->num_rows > 0;
Explicación: Comprueba cuántos registros devolvió la consulta.
Línea 38: $stmtCheck->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 39: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 40: if ($exists) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 41: $mensaje = "El nombre de usuario o correo electrónico ya se encuentra registrado.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 42: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 43: $titulo_alerta = "Usuario existente";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 44: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 45: // Registrar el nuevo administrador
Explicación: Comentario: explica el código y no se ejecuta.
Línea 46: $hashed_password = password_hash($password, PASSWORD_BCRYPT);
Explicación: Cifra la contraseña mediante un hash seguro antes de almacenarla.
Línea 47: $id_rol = '1'; // Rol 1 = Administrador
Explicación: Asigna un valor a la variable `$id_rol` para utilizarlo después.
Línea 48: $estado = 'Activo';
Explicación: Asigna un valor a la variable `$estado` para utilizarlo después.
Línea 49: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 50: $stmtInsert = $conn->prepare("INSERT INTO usuarios (nombre, apellido, numero_Documento, id_Rol, telefono, correo, nombre_Usuario, contraseña, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 51: if ($stmtInsert) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 52: $stmtInsert->bind_param("sssssssss",
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 53: $nombre,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 54: $apellido,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 55: $documento,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 56: $id_rol,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 57: $telefono,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 58: $correo,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 59: $usuario,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 60: $hashed_password,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 61: $estado
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 62: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 63: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 64: if ($stmtInsert->execute()) {
Explicación: Ejecuta la consulta preparada.
Línea 65: $mensaje = "El administrador ha sido creado correctamente en el sistema.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 66: $tipo_alerta = "success";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 67: $titulo_alerta = "¡Registro Exitoso!";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 68: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 69: $mensaje = "Error al intentar registrar en la base de datos.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 70: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 71: $titulo_alerta = "Error de inserción";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 72: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 73: $stmtInsert->close();
Explicación: Forma parte de una consulta `INSERT`, utilizada para crear un registro.
Línea 74: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 75: $mensaje = "Error de preparación de la consulta.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 76: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 77: $titulo_alerta = "Error Interno";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 78: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 79: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 80: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 81: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 82: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 83: ?>
Explicación: Cierra el bloque PHP.
Línea 374: <?php if (!empty($mensaje)): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 382: <?php if ($tipo_alerta === 'success'): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 384: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 387: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
5. Administrador - reportes.php
Ruta: views/administrador/reportes.php
Se explican 584 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/database.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: // OBTENER RANGO DE FECHAS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 13: $ano_actual = date('Y');
Explicación: Asigna un valor a la variable `$ano_actual` para utilizarlo después.
Línea 14: $fecha_inicio_default = "$ano_actual-01-01";
Explicación: Asigna un valor a la variable `$fecha_inicio_default` para utilizarlo después.
Línea 15: $fecha_fin_default = date('Y-m-d');
Explicación: Asigna un valor a la variable `$fecha_fin_default` para utilizarlo después.
Línea 16: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 17: $fecha_inicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : $fecha_inicio_default;
Explicación: Obtiene de la URL el parámetro `fecha_inicio`.
Línea 18: $fecha_fin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : $fecha_fin_default;
Explicación: Obtiene de la URL el parámetro `fecha_fin`.
Línea 19: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 20: $datetime_inicio = $fecha_inicio . " 00:00:00";
Explicación: Asigna un valor a la variable `$datetime_inicio` para utilizarlo después.
Línea 21: $datetime_fin = $fecha_fin . " 23:59:59";
Explicación: Asigna un valor a la variable `$datetime_fin` para utilizarlo después.
Línea 22: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 23: // OBTENER TABA ACTUAL
Explicación: Comentario: explica el código y no se ejecuta.
Línea 24: $tab = isset($_GET['tab']) ? $_GET['tab'] : 'general';
Explicación: Obtiene de la URL el parámetro `tab`.
Línea 25: $valid_tabs = ['general', 'ventas', 'productos', 'clientes', 'inventario'];
Explicación: Asigna un valor a la variable `$valid_tabs` para utilizarlo después.
Línea 26: if (!in_array($tab, $valid_tabs)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 27: $tab = 'general';
Explicación: Asigna un valor a la variable `$tab` para utilizarlo después.
Línea 28: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 29: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 30: // OBTENER FECHA ACTUAL EN ESPAÑOL
Explicación: Comentario: explica el código y no se ejecuta.
Línea 31: $dias = [
Explicación: Asigna un valor a la variable `$dias` para utilizarlo después.
Línea 32: 1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 4 => 'Jueves',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 33: 5 => 'Viernes', 6 => 'Sábado', 7 => 'Domingo'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 34: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 35: $meses = [
Explicación: Asigna un valor a la variable `$meses` para utilizarlo después.
Línea 36: 1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 37: 5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 38: 9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 39: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 40: $diaSemana = date('N');
Explicación: Asigna un valor a la variable `$diaSemana` para utilizarlo después.
Línea 41: $mes = date('n');
Explicación: Asigna un valor a la variable `$mes` para utilizarlo después.
Línea 42: $fechaString = $dias[$diaSemana] . ' ' . date('d') . ' de ' . $meses[$mes];
Explicación: Asigna un valor a la variable `$fechaString` para utilizarlo después.
Línea 43: $horaString = date('h:i a');
Explicación: Asigna un valor a la variable `$horaString` para utilizarlo después.
Línea 44: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 45: // EJECUTAR CONSULTAS EN FUNCIÓN DE LA PESTAÑA SELECCIONADA
Explicación: Comentario: explica el código y no se ejecuta.
Línea 46: $stat1_name = $stat1_value = $stat1_desc = $stat1_icon = $stat1_bg = "";
Explicación: Asigna un valor a la variable `$stat1_name` para utilizarlo después.
Línea 47: $stat2_name = $stat2_value = $stat2_desc = $stat2_icon = $stat2_bg = "";
Explicación: Asigna un valor a la variable `$stat2_name` para utilizarlo después.
Línea 48: $stat3_name = $stat3_value = $stat3_desc = $stat3_icon = $stat3_bg = "";
Explicación: Asigna un valor a la variable `$stat3_name` para utilizarlo después.
Línea 49: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 50: $colorPalette = ['#6f2dbd', '#f72585', '#3f37c9', '#b5179e', '#009688', '#fd7e14'];
Explicación: Asigna un valor a la variable `$colorPalette` para utilizarlo después.
Línea 51: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 52: if ($tab === 'general') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 53: // -------------------------------------------------------------
Explicación: Comentario: explica el código y no se ejecuta.
Línea 54: // PESTAÑA: RESUMEN GENERAL
Explicación: Comentario: explica el código y no se ejecuta.
Línea 55: // -------------------------------------------------------------
Explicación: Comentario: explica el código y no se ejecuta.
Línea 56: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 57: // 1. Ventas Totales
Explicación: Comentario: explica el código y no se ejecuta.
Línea 58: $stmtV = $conn->prepare("SELECT SUM(total) as total FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 59: $stmtV->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 60: $stmtV->execute();
Explicación: Ejecuta la consulta preparada.
Línea 61: $resV = $stmtV->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 62: $ventasTotales = (float)($resV['total'] ?? 0.00);
Explicación: Asigna un valor a la variable `$ventasTotales` para utilizarlo después.
Línea 63: $stmtV->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 64: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 65: // 2. Productos Vendidos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 66: $stmtP = $conn->prepare("SELECT SUM(dv.cantidad) as total FROM detalle_venta dv JOIN venta v ON dv.id_Venta = v.id_Venta WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 67: $stmtP->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 68: $stmtP->execute();
Explicación: Ejecuta la consulta preparada.
Línea 69: $resP = $stmtP->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 70: $productosVendidos = (int)($resP['total'] ?? 0);
Explicación: Asigna un valor a la variable `$productosVendidos` para utilizarlo después.
Línea 71: $stmtP->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 72: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 73: // 3. Clientes Atendidos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 74: $stmtC = $conn->prepare("SELECT COUNT(DISTINCT v.id_Cliente) as total FROM venta v WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 75: $stmtC->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 76: $stmtC->execute();
Explicación: Ejecuta la consulta preparada.
Línea 77: $resC = $stmtC->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 78: $clientesAtendidos = (int)($resC['total'] ?? 0);
Explicación: Asigna un valor a la variable `$clientesAtendidos` para utilizarlo después.
Línea 79: $stmtC->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 80: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 81: // Métricas para las Tarjetas
Explicación: Comentario: explica el código y no se ejecuta.
Línea 82: $stat1_name = "Ventas Totales";
Explicación: Asigna un valor a la variable `$stat1_name` para utilizarlo después.
Línea 83: $stat1_value = "$" . number_format($ventasTotales, 0, ',', '.');
Explicación: Asigna un valor a la variable `$stat1_value` para utilizarlo después.
Línea 84: $stat1_desc = "Ventas Completadas";
Explicación: Asigna un valor a la variable `$stat1_desc` para utilizarlo después.
Línea 85: $stat1_icon = "fa-solid fa-bag-shopping";
Explicación: Asigna un valor a la variable `$stat1_icon` para utilizarlo después.
Línea 86: $stat1_bg = "#ffd6ff";
Explicación: Asigna un valor a la variable `$stat1_bg` para utilizarlo después.
Línea 87: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 88: $stat2_name = "Productos Vendidos";
Explicación: Asigna un valor a la variable `$stat2_name` para utilizarlo después.
Línea 89: $stat2_value = number_format($productosVendidos, 0, ',', '.');
Explicación: Asigna un valor a la variable `$stat2_value` para utilizarlo después.
Línea 90: $stat2_desc = "Unidades Vendidas";
Explicación: Asigna un valor a la variable `$stat2_desc` para utilizarlo después.
Línea 91: $stat2_icon = "fa-solid fa-box";
Explicación: Asigna un valor a la variable `$stat2_icon` para utilizarlo después.
Línea 92: $stat2_bg = "#ffd8eb";
Explicación: Asigna un valor a la variable `$stat2_bg` para utilizarlo después.
Línea 93: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 94: $stat3_name = "Clientes Atendidos";
Explicación: Asigna un valor a la variable `$stat3_name` para utilizarlo después.
Línea 95: $stat3_value = number_format($clientesAtendidos, 0, ',', '.');
Explicación: Asigna un valor a la variable `$stat3_value` para utilizarlo después.
Línea 96: $stat3_desc = "Clientes Registrados";
Explicación: Asigna un valor a la variable `$stat3_desc` para utilizarlo después.
Línea 97: $stat3_icon = "fa-solid fa-user";
Explicación: Asigna un valor a la variable `$stat3_icon` para utilizarlo después.
Línea 98: $stat3_bg = "#e2e2ff";
Explicación: Asigna un valor a la variable `$stat3_bg` para utilizarlo después.
Línea 99: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 100: // Gráfico de Línea: Ventas diarias
Explicación: Comentario: explica el código y no se ejecuta.
Línea 101: $stmtLine = $conn->prepare("SELECT DATE(fecha_Venta) as fecha, SUM(total) as total_dia FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ? GROUP BY DATE(fecha_Venta) ORDER BY fecha ASC");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 102: $stmtLine->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 103: $stmtLine->execute();
Explicación: Ejecuta la consulta preparada.
Línea 104: $resLine = $stmtLine->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 105: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 106: $diasArray = [];
Explicación: Asigna un valor a la variable `$diasArray` para utilizarlo después.
Línea 107: $ventasDiaArray = [];
Explicación: Asigna un valor a la variable `$ventasDiaArray` para utilizarlo después.
Línea 108: $diasSemanaES = ['Sun'=>'Dom', 'Mon'=>'Lun', 'Tue'=>'Mar', 'Wed'=>'Mié', 'Thu'=>'Jue', 'Fri'=>'Vie', 'Sat'=>'Sáb'];
Explicación: Asigna un valor a la variable `$diasSemanaES` para utilizarlo después.
Línea 109: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 110: while ($row = $resLine->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 111: $fechaObj = strtotime($row['fecha']);
Explicación: Asigna un valor a la variable `$fechaObj` para utilizarlo después.
Línea 112: $diaES = $diasSemanaES[date('D', $fechaObj)] ?? date('D', $fechaObj);
Explicación: Asigna un valor a la variable `$diaES` para utilizarlo después.
Línea 113: $diasArray[] = $diaES . ' ' . date('d', $fechaObj);
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 114: $ventasDiaArray[] = (float)$row['total_dia'];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 115: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 116: $stmtLine->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 117: if (empty($diasArray)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 118: $diasArray = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];
Explicación: Asigna un valor a la variable `$diasArray` para utilizarlo después.
Línea 119: $ventasDiaArray = [0, 0, 0, 0, 0, 0, 0];
Explicación: Asigna un valor a la variable `$ventasDiaArray` para utilizarlo después.
Línea 120: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 121: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 122: // Gráfico de Dona: Ventas por categoría
Explicación: Comentario: explica el código y no se ejecuta.
Línea 123: $stmtDonut = $conn->prepare("
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 124: SELECT p.unidad_Medida as categoria, SUM(dv.subtotal) as total_ventas
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 125: FROM detalle_venta dv
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 126: JOIN producto p ON dv.id_Producto = p.id_Producto
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 127: JOIN venta v ON dv.id_Venta = v.id_Venta
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 128: WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 129: GROUP BY p.unidad_Medida
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 130: ORDER BY total_ventas DESC
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 131: ");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 132: $stmtDonut->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 133: $stmtDonut->execute();
Explicación: Ejecuta la consulta preparada.
Línea 134: $resDonut = $stmtDonut->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 135: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 136: $categoriasArray = [];
Explicación: Asigna un valor a la variable `$categoriasArray` para utilizarlo después.
Línea 137: $totalesCatArray = [];
Explicación: Asigna un valor a la variable `$totalesCatArray` para utilizarlo después.
Línea 138: $totalVentasGeneral = 0;
Explicación: Asigna un valor a la variable `$totalVentasGeneral` para utilizarlo después.
Línea 139: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 140: while ($row = $resDonut->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 141: $cat = $row['categoria'] ? $row['categoria'] : 'Otros';
Explicación: Asigna un valor a la variable `$cat` para utilizarlo después.
Línea 142: $total_cat = (float)$row['total_ventas'];
Explicación: Asigna un valor a la variable `$total_cat` para utilizarlo después.
Línea 143: $categoriasArray[] = $cat;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 144: $totalesCatArray[] = $total_cat;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 145: $totalVentasGeneral += $total_cat;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 146: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 147: $stmtDonut->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 148: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 149: $leyendas = [];
Explicación: Asigna un valor a la variable `$leyendas` para utilizarlo después.
Línea 150: foreach ($categoriasArray as $i => $cat) {
Explicación: Recorre uno por uno los elementos de un arreglo o resultado.
Línea 151: $total_cat = $totalesCatArray[$i];
Explicación: Asigna un valor a la variable `$total_cat` para utilizarlo después.
Línea 152: $pct = $totalVentasGeneral > 0 ? round(($total_cat / $totalVentasGeneral) * 100) : 0;
Explicación: Asigna un valor a la variable `$pct` para utilizarlo después.
Línea 153: $leyendas[] = [
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 154: 'categoria' => $cat,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 155: 'total' => $total_cat,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 156: 'porcentaje' => $pct,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 157: 'color' => $colorPalette[$i % count($colorPalette)]
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 158: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 159: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 160: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 161: } elseif ($tab === 'ventas') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 162: // -------------------------------------------------------------
Explicación: Comentario: explica el código y no se ejecuta.
Línea 163: // PESTAÑA: VENTAS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 164: // -------------------------------------------------------------
Explicación: Comentario: explica el código y no se ejecuta.
Línea 165: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 166: // 1. Ventas Realizadas (Conteo)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 167: $stmtCount = $conn->prepare("SELECT COUNT(*) as total_cant, AVG(total) as avg_t FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 168: $stmtCount->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 169: $stmtCount->execute();
Explicación: Ejecuta la consulta preparada.
Línea 170: $resCount = $stmtCount->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 171: $ventasCant = (int)($resCount['total_cant'] ?? 0);
Explicación: Asigna un valor a la variable `$ventasCant` para utilizarlo después.
Línea 172: $ticketPromedio = (float)($resCount['avg_t'] ?? 0.00);
Explicación: Asigna un valor a la variable `$ticketPromedio` para utilizarlo después.
Línea 173: $stmtCount->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 174: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 175: // 2. Método preferido
Explicación: Comentario: explica el código y no se ejecuta.
Línea 176: $stmtMetodo = $conn->prepare("SELECT metodo_Pago, COUNT(*) as count FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ? GROUP BY metodo_Pago ORDER BY count DESC LIMIT 1");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 177: $stmtMetodo->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 178: $stmtMetodo->execute();
Explicación: Ejecuta la consulta preparada.
Línea 179: $resMetodo = $stmtMetodo->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 180: $metodoPreferido = $resMetodo ? $resMetodo['metodo_Pago'] : 'Efectivo';
Explicación: Asigna un valor a la variable `$metodoPreferido` para utilizarlo después.
Línea 181: $stmtMetodo->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 182: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 183: // Métricas Tarjetas
Explicación: Comentario: explica el código y no se ejecuta.
Línea 184: $stat1_name = "Ventas Realizadas";
Explicación: Asigna un valor a la variable `$stat1_name` para utilizarlo después.
Línea 185: $stat1_value = number_format($ventasCant, 0, ',', '.');
Explicación: Asigna un valor a la variable `$stat1_value` para utilizarlo después.
Línea 186: $stat1_desc = "Transacciones en el periodo";
Explicación: Asigna un valor a la variable `$stat1_desc` para utilizarlo después.
Línea 187: $stat1_icon = "fa-solid fa-cart-shopping";
Explicación: Asigna un valor a la variable `$stat1_icon` para utilizarlo después.
Línea 188: $stat1_bg = "#e2e2ff";
Explicación: Asigna un valor a la variable `$stat1_bg` para utilizarlo después.
Línea 189: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 190: $stat2_name = "Ticket Promedio";
Explicación: Asigna un valor a la variable `$stat2_name` para utilizarlo después.
Línea 191: $stat2_value = "$" . number_format($ticketPromedio, 0, ',', '.');
Explicación: Asigna un valor a la variable `$stat2_value` para utilizarlo después.
Línea 192: $stat2_desc = "Gasto promedio por cliente";
Explicación: Asigna un valor a la variable `$stat2_desc` para utilizarlo después.
Línea 193: $stat2_icon = "fa-solid fa-calculator";
Explicación: Asigna un valor a la variable `$stat2_icon` para utilizarlo después.
Línea 194: $stat2_bg = "#ffd6ff";
Explicación: Asigna un valor a la variable `$stat2_bg` para utilizarlo después.
Línea 195: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 196: $stat3_name = "Método Preferido";
Explicación: Asigna un valor a la variable `$stat3_name` para utilizarlo después.
Línea 197: $stat3_value = htmlspecialchars($metodoPreferido);
Explicación: Escapa caracteres especiales antes de mostrarlos en HTML para mayor seguridad.
Línea 198: $stat3_desc = "Método de pago principal";
Explicación: Asigna un valor a la variable `$stat3_desc` para utilizarlo después.
Línea 199: $stat3_icon = "fa-solid fa-credit-card";
Explicación: Asigna un valor a la variable `$stat3_icon` para utilizarlo después.
Línea 200: $stat3_bg = "#ffd8eb";
Explicación: Asigna un valor a la variable `$stat3_bg` para utilizarlo después.
Línea 201: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 202: // Gráfico de Línea: Ventas diarias
Explicación: Comentario: explica el código y no se ejecuta.
Línea 203: $stmtLine = $conn->prepare("SELECT DATE(fecha_Venta) as fecha, SUM(total) as total_dia FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ? GROUP BY DATE(fecha_Venta) ORDER BY fecha ASC");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 204: $stmtLine->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 205: $stmtLine->execute();
Explicación: Ejecuta la consulta preparada.
Línea 206: $resLine = $stmtLine->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 207: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 208: $diasArray = [];
Explicación: Asigna un valor a la variable `$diasArray` para utilizarlo después.
Línea 209: $ventasDiaArray = [];
Explicación: Asigna un valor a la variable `$ventasDiaArray` para utilizarlo después.
Línea 210: $diasSemanaES = ['Sun'=>'Dom', 'Mon'=>'Lun', 'Tue'=>'Mar', 'Wed'=>'Mié', 'Thu'=>'Jue', 'Fri'=>'Vie', 'Sat'=>'Sáb'];
Explicación: Asigna un valor a la variable `$diasSemanaES` para utilizarlo después.
Línea 211: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 212: while ($row = $resLine->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 213: $fechaObj = strtotime($row['fecha']);
Explicación: Asigna un valor a la variable `$fechaObj` para utilizarlo después.
Línea 214: $diaES = $diasSemanaES[date('D', $fechaObj)] ?? date('D', $fechaObj);
Explicación: Asigna un valor a la variable `$diaES` para utilizarlo después.
Línea 215: $diasArray[] = $diaES . ' ' . date('d', $fechaObj);
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 216: $ventasDiaArray[] = (float)$row['total_dia'];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 217: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 218: $stmtLine->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 219: if (empty($diasArray)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 220: $diasArray = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];
Explicación: Asigna un valor a la variable `$diasArray` para utilizarlo después.
Línea 221: $ventasDiaArray = [0, 0, 0, 0, 0, 0, 0];
Explicación: Asigna un valor a la variable `$ventasDiaArray` para utilizarlo después.
Línea 222: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 223: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 224: // Gráfico de Dona: Ventas por Método de Pago
Explicación: Comentario: explica el código y no se ejecuta.
Línea 225: $stmtMetodos = $conn->prepare("SELECT metodo_Pago, SUM(total) as total_metodo FROM venta WHERE estado = 'Completada' AND fecha_Venta BETWEEN ? AND ? GROUP BY metodo_Pago");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 226: $stmtMetodos->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 227: $stmtMetodos->execute();
Explicación: Ejecuta la consulta preparada.
Línea 228: $resMetodos = $stmtMetodos->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 229: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 230: $metodosArray = [];
Explicación: Asigna un valor a la variable `$metodosArray` para utilizarlo después.
Línea 231: $totalesMetodoArray = [];
Explicación: Asigna un valor a la variable `$totalesMetodoArray` para utilizarlo después.
Línea 232: $totalVentasMetodo = 0;
Explicación: Asigna un valor a la variable `$totalVentasMetodo` para utilizarlo después.
Línea 233: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 234: while ($row = $resMetodos->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 235: $metodosArray[] = $row['metodo_Pago'];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 236: $total_m = (float)$row['total_metodo'];
Explicación: Asigna un valor a la variable `$total_m` para utilizarlo después.
Línea 237: $totalesMetodoArray[] = $total_m;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 238: $totalVentasMetodo += $total_m;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 239: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 240: $stmtMetodos->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 241: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 242: $leyendasMetodo = [];
Explicación: Asigna un valor a la variable `$leyendasMetodo` para utilizarlo después.
Línea 243: foreach ($metodosArray as $i => $metodo) {
Explicación: Recorre uno por uno los elementos de un arreglo o resultado.
Línea 244: $total_m = $totalesMetodoArray[$i];
Explicación: Asigna un valor a la variable `$total_m` para utilizarlo después.
Línea 245: $pct = $totalVentasMetodo > 0 ? round(($total_m / $totalVentasMetodo) * 100) : 0;
Explicación: Asigna un valor a la variable `$pct` para utilizarlo después.
Línea 246: $leyendasMetodo[] = [
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 247: 'metodo' => $metodo,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 248: 'total' => $total_m,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 249: 'porcentaje' => $pct,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 250: 'color' => $colorPalette[$i % count($colorPalette)]
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 251: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 252: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 253: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 254: // Tabla: Últimas Ventas
Explicación: Comentario: explica el código y no se ejecuta.
Línea 255: $stmtLastV = $conn->prepare("
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 256: SELECT v.*, c.nombre, c.apellido
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 257: FROM venta v
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 258: LEFT JOIN cliente c ON v.id_Cliente = c.id_Cliente
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 259: WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 260: ORDER BY v.fecha_Venta DESC
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 261: LIMIT 5
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 262: ");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 263: $stmtLastV->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 264: $stmtLastV->execute();
Explicación: Ejecuta la consulta preparada.
Línea 265: $resLastV = $stmtLastV->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 266: $ultimasVentas = [];
Explicación: Asigna un valor a la variable `$ultimasVentas` para utilizarlo después.
Línea 267: while ($row = $resLastV->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 268: $row['cliente_nombre'] = $row['nombre'] ? $row['nombre'] . ' ' . $row['apellido'] : 'General / Anónimo';
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 269: $ultimasVentas[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 270: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 271: $stmtLastV->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 272: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 273: } elseif ($tab === 'productos') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 274: // -------------------------------------------------------------
Explicación: Comentario: explica el código y no se ejecuta.
Línea 275: // PESTAÑA: PRODUCTOS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 276: // -------------------------------------------------------------
Explicación: Comentario: explica el código y no se ejecuta.
Línea 277: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 278: // 1. Unidades vendidas y total ingresos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 279: $stmtIngresos = $conn->prepare("
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 280: SELECT SUM(dv.cantidad) as total_qty, SUM(dv.subtotal) as total_rev
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 281: FROM detalle_venta dv
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 282: JOIN venta v ON dv.id_Venta = v.id_Venta
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 283: WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 284: ");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 285: $stmtIngresos->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 286: $stmtIngresos->execute();
Explicación: Ejecuta la consulta preparada.
Línea 287: $resIngresos = $stmtIngresos->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 288: $unidadesVendidas = (int)($resIngresos['total_qty'] ?? 0);
Explicación: Asigna un valor a la variable `$unidadesVendidas` para utilizarlo después.
Línea 289: $ingresosProductos = (float)($resIngresos['total_rev'] ?? 0.00);
Explicación: Asigna un valor a la variable `$ingresosProductos` para utilizarlo después.
Línea 290: $stmtIngresos->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 291: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 292: // 2. Producto estrella
Explicación: Comentario: explica el código y no se ejecuta.
Línea 293: $stmtEstrella = $conn->prepare("
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 294: SELECT p.nombre, SUM(dv.cantidad) as total_qty
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 295: FROM detalle_venta dv
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 296: JOIN producto p ON dv.id_Producto = p.id_Producto
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 297: JOIN venta v ON dv.id_Venta = v.id_Venta
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 298: WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 299: GROUP BY dv.id_Producto
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 300: ORDER BY total_qty DESC
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 301: LIMIT 1
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 302: ");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 303: $stmtEstrella->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 304: $stmtEstrella->execute();
Explicación: Ejecuta la consulta preparada.
Línea 305: $resEstrella = $stmtEstrella->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 306: $productoEstrella = $resEstrella ? $resEstrella['nombre'] : 'Ninguno';
Explicación: Asigna un valor a la variable `$productoEstrella` para utilizarlo después.
Línea 307: $stmtEstrella->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 308: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 309: // Métricas Tarjetas
Explicación: Comentario: explica el código y no se ejecuta.
Línea 310: $stat1_name = "Unidades Vendidas";
Explicación: Asigna un valor a la variable `$stat1_name` para utilizarlo después.
Línea 311: $stat1_value = number_format($unidadesVendidas, 0, ',', '.');
Explicación: Asigna un valor a la variable `$stat1_value` para utilizarlo después.
Línea 312: $stat1_desc = "Productos despachados";
Explicación: Asigna un valor a la variable `$stat1_desc` para utilizarlo después.
Línea 313: $stat1_icon = "fa-solid fa-boxes-stacked";
Explicación: Asigna un valor a la variable `$stat1_icon` para utilizarlo después.
Línea 314: $stat1_bg = "#ffd8eb";
Explicación: Asigna un valor a la variable `$stat1_bg` para utilizarlo después.
Línea 315: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 316: $stat2_name = "Producto Estrella";
Explicación: Asigna un valor a la variable `$stat2_name` para utilizarlo después.
Línea 317: $stat2_value = htmlspecialchars($productoEstrella);
Explicación: Escapa caracteres especiales antes de mostrarlos en HTML para mayor seguridad.
Línea 318: $stat2_desc = "Producto con mayor demanda";
Explicación: Asigna un valor a la variable `$stat2_desc` para utilizarlo después.
Línea 319: $stat2_icon = "fa-solid fa-star";
Explicación: Asigna un valor a la variable `$stat2_icon` para utilizarlo después.
Línea 320: $stat2_bg = "#ffd6ff";
Explicación: Asigna un valor a la variable `$stat2_bg` para utilizarlo después.
Línea 321: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 322: $stat3_name = "Ingresos Generados";
Explicación: Asigna un valor a la variable `$stat3_name` para utilizarlo después.
Línea 323: $stat3_value = "$" . number_format($ingresosProductos, 0, ',', '.');
Explicación: Asigna un valor a la variable `$stat3_value` para utilizarlo después.
Línea 324: $stat3_desc = "Facturación total de productos";
Explicación: Asigna un valor a la variable `$stat3_desc` para utilizarlo después.
Línea 325: $stat3_icon = "fa-solid fa-sack-dollar";
Explicación: Asigna un valor a la variable `$stat3_icon` para utilizarlo después.
Línea 326: $stat3_bg = "#e2e2ff";
Explicación: Asigna un valor a la variable `$stat3_bg` para utilizarlo después.
Línea 327: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 328: // Gráfico de Barras: Top 5 Productos más vendidos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 329: $stmtTopProd = $conn->prepare("
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 330: SELECT p.nombre, SUM(dv.cantidad) as total_qty
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 331: FROM detalle_venta dv
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 332: JOIN producto p ON dv.id_Producto = p.id_Producto
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 333: JOIN venta v ON dv.id_Venta = v.id_Venta
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 334: WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 335: GROUP BY dv.id_Producto
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 336: ORDER BY total_qty DESC
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 337: LIMIT 5
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 338: ");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 339: $stmtTopProd->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 340: $stmtTopProd->execute();
Explicación: Ejecuta la consulta preparada.
Línea 341: $resTopProd = $stmtTopProd->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 342: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 343: $prodNombresArray = [];
Explicación: Asigna un valor a la variable `$prodNombresArray` para utilizarlo después.
Línea 344: $prodCantidadesArray = [];
Explicación: Asigna un valor a la variable `$prodCantidadesArray` para utilizarlo después.
Línea 345: while ($row = $resTopProd->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 346: $prodNombresArray[] = $row['nombre'];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 347: $prodCantidadesArray[] = (int)$row['total_qty'];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 348: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 349: $stmtTopProd->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 350: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 351: if (empty($prodNombresArray)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 352: $prodNombresArray = ['Sin datos'];
Explicación: Asigna un valor a la variable `$prodNombresArray` para utilizarlo después.
Línea 353: $prodCantidadesArray = [0];
Explicación: Asigna un valor a la variable `$prodCantidadesArray` para utilizarlo después.
Línea 354: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 355: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 356: // Tabla: Rendimiento de Productos (Top 5)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 357: $stmtRend = $conn->prepare("
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 358: SELECT p.nombre, p.codigo_Producto, p.unidad_Medida, SUM(dv.cantidad) as total_qty, SUM(dv.subtotal) as total_revenue
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 359: FROM detalle_venta dv
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 360: JOIN producto p ON dv.id_Producto = p.id_Producto
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 361: JOIN venta v ON dv.id_Venta = v.id_Venta
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 362: WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 363: GROUP BY dv.id_Producto
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 364: ORDER BY total_qty DESC
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 365: LIMIT 5
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 366: ");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 367: $stmtRend->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 368: $stmtRend->execute();
Explicación: Ejecuta la consulta preparada.
Línea 369: $resRend = $stmtRend->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 370: $rendimientoProductos = [];
Explicación: Asigna un valor a la variable `$rendimientoProductos` para utilizarlo después.
Línea 371: while ($row = $resRend->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 372: $rendimientoProductos[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 373: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 374: $stmtRend->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 375: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 376: } elseif ($tab === 'clientes') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 377: // -------------------------------------------------------------
Explicación: Comentario: explica el código y no se ejecuta.
Línea 378: // PESTAÑA: CLIENTES
Explicación: Comentario: explica el código y no se ejecuta.
Línea 379: // -------------------------------------------------------------
Explicación: Comentario: explica el código y no se ejecuta.
Línea 380: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 381: // 1. Clientes Atendidos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 382: $stmtClientes = $conn->prepare("SELECT COUNT(DISTINCT v.id_Cliente) as total FROM venta v WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 383: $stmtClientes->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 384: $stmtClientes->execute();
Explicación: Ejecuta la consulta preparada.
Línea 385: $resClientes = $stmtClientes->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 386: $clientesAtendidos = (int)($resClientes['total'] ?? 0);
Explicación: Asigna un valor a la variable `$clientesAtendidos` para utilizarlo después.
Línea 387: $stmtClientes->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 388: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 389: // 2. Cliente VIP (Mayor Gasto)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 390: $stmtVIP = $conn->prepare("
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 391: SELECT c.nombre, c.apellido, SUM(v.total) as total_spent
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 392: FROM venta v
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 393: JOIN cliente c ON v.id_Cliente = c.id_Cliente
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 394: WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 395: GROUP BY v.id_Cliente
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 396: ORDER BY total_spent DESC
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 397: LIMIT 1
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 398: ");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 399: $stmtVIP->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 400: $stmtVIP->execute();
Explicación: Ejecuta la consulta preparada.
Línea 401: $resVIP = $stmtVIP->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 402: $clienteVIP = $resVIP ? $resVIP['nombre'] . ' ' . $resVIP['apellido'] : 'Ninguno';
Explicación: Asigna un valor a la variable `$clienteVIP` para utilizarlo después.
Línea 403: $clienteVIPGasto = $resVIP ? (float)$resVIP['total_spent'] : 0.00;
Explicación: Asigna un valor a la variable `$clienteVIPGasto` para utilizarlo después.
Línea 404: $stmtVIP->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 405: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 406: // 3. Gasto Promedio por Cliente
Explicación: Comentario: explica el código y no se ejecuta.
Línea 407: $stmtProm = $conn->prepare("
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 408: SELECT SUM(total) / COUNT(DISTINCT id_Cliente) as avg_spent
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 409: FROM venta
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 410: WHERE estado = 'Completada' AND id_Cliente IS NOT NULL AND fecha_Venta BETWEEN ? AND ?
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 411: ");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 412: $stmtProm->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 413: $stmtProm->execute();
Explicación: Ejecuta la consulta preparada.
Línea 414: $resProm = $stmtProm->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 415: $gastoPromedio = (float)($resProm['avg_spent'] ?? 0.00);
Explicación: Asigna un valor a la variable `$gastoPromedio` para utilizarlo después.
Línea 416: $stmtProm->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 417: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 418: // Métricas Tarjetas
Explicación: Comentario: explica el código y no se ejecuta.
Línea 419: $stat1_name = "Clientes Atendidos";
Explicación: Asigna un valor a la variable `$stat1_name` para utilizarlo después.
Línea 420: $stat1_value = number_format($clientesAtendidos, 0, ',', '.');
Explicación: Asigna un valor a la variable `$stat1_value` para utilizarlo después.
Línea 421: $stat1_desc = "Han comprado en el periodo";
Explicación: Asigna un valor a la variable `$stat1_desc` para utilizarlo después.
Línea 422: $stat1_icon = "fa-solid fa-users";
Explicación: Asigna un valor a la variable `$stat1_icon` para utilizarlo después.
Línea 423: $stat1_bg = "#e2e2ff";
Explicación: Asigna un valor a la variable `$stat1_bg` para utilizarlo después.
Línea 424: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 425: $stat2_name = "Cliente VIP";
Explicación: Asigna un valor a la variable `$stat2_name` para utilizarlo después.
Línea 426: $stat2_value = htmlspecialchars($clienteVIP);
Explicación: Escapa caracteres especiales antes de mostrarlos en HTML para mayor seguridad.
Línea 427: $stat2_desc = "Mayor comprador ($" . number_format($clienteVIPGasto, 0, ',', '.') . ")";
Explicación: Asigna un valor a la variable `$stat2_desc` para utilizarlo después.
Línea 428: $stat2_icon = "fa-solid fa-crown";
Explicación: Asigna un valor a la variable `$stat2_icon` para utilizarlo después.
Línea 429: $stat2_bg = "#ffd8eb";
Explicación: Asigna un valor a la variable `$stat2_bg` para utilizarlo después.
Línea 430: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 431: $stat3_name = "Gasto Promedio";
Explicación: Asigna un valor a la variable `$stat3_name` para utilizarlo después.
Línea 432: $stat3_value = "$" . number_format($gastoPromedio, 0, ',', '.');
Explicación: Asigna un valor a la variable `$stat3_value` para utilizarlo después.
Línea 433: $stat3_desc = "Gasto promedio por cliente";
Explicación: Asigna un valor a la variable `$stat3_desc` para utilizarlo después.
Línea 434: $stat3_icon = "fa-solid fa-scale-balanced";
Explicación: Asigna un valor a la variable `$stat3_icon` para utilizarlo después.
Línea 435: $stat3_bg = "#ffd6ff";
Explicación: Asigna un valor a la variable `$stat3_bg` para utilizarlo después.
Línea 436: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 437: // Gráfico de Barras: Top 5 Clientes con Mayor Gasto
Explicación: Comentario: explica el código y no se ejecuta.
Línea 438: $stmtTopC = $conn->prepare("
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 439: SELECT CONCAT(c.nombre, ' ', c.apellido) as cliente_nombre, SUM(v.total) as total_spent
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 440: FROM venta v
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 441: JOIN cliente c ON v.id_Cliente = c.id_Cliente
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 442: WHERE v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 443: GROUP BY v.id_Cliente
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 444: ORDER BY total_spent DESC
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 445: LIMIT 5
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 446: ");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 447: $stmtTopC->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 448: $stmtTopC->execute();
Explicación: Ejecuta la consulta preparada.
Línea 449: $resTopC = $stmtTopC->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 450: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 451: $clientesNombresArray = [];
Explicación: Asigna un valor a la variable `$clientesNombresArray` para utilizarlo después.
Línea 452: $clientesMontosArray = [];
Explicación: Asigna un valor a la variable `$clientesMontosArray` para utilizarlo después.
Línea 453: while ($row = $resTopC->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 454: $clientesNombresArray[] = $row['cliente_nombre'];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 455: $clientesMontosArray[] = (float)$row['total_spent'];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 456: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 457: $stmtTopC->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 458: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 459: if (empty($clientesNombresArray)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 460: $clientesNombresArray = ['Sin datos'];
Explicación: Asigna un valor a la variable `$clientesNombresArray` para utilizarlo después.
Línea 461: $clientesMontosArray = [0];
Explicación: Asigna un valor a la variable `$clientesMontosArray` para utilizarlo después.
Línea 462: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 463: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 464: // Tabla: Ranking de Clientes (Top 5)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 465: $stmtRank = $conn->prepare("
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 466: SELECT CONCAT(c.nombre, ' ', c.apellido) as cliente_nombre, COUNT(v.id_Venta) as compras_cant, SUM(v.total) as total_spent
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 467: FROM cliente c
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 468: LEFT JOIN venta v ON c.id_Cliente = v.id_Cliente AND v.estado = 'Completada' AND v.fecha_Venta BETWEEN ? AND ?
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 469: GROUP BY c.id_Cliente
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 470: ORDER BY total_spent DESC
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 471: LIMIT 5
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 472: ");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 473: $stmtRank->bind_param("ss", $datetime_inicio, $datetime_fin);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 474: $stmtRank->execute();
Explicación: Ejecuta la consulta preparada.
Línea 475: $resRank = $stmtRank->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 476: $rankingClientes = [];
Explicación: Asigna un valor a la variable `$rankingClientes` para utilizarlo después.
Línea 477: while ($row = $resRank->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 478: // Consultar deuda pendiente por cliente de forma paralela por rendimiento
Explicación: Comentario: explica el código y no se ejecuta.
Línea 479: $idC = $row['total_spent'] ? 1 : 0; // Solo para validar que tenga compras
Explicación: Asigna un valor a la variable `$idC` para utilizarlo después.
Línea 480: $stmtDeuda = $conn->query("SELECT SUM(saldo_Pendiente) as deuda_p FROM deuda WHERE id_Cliente = (SELECT id_Cliente FROM cliente WHERE CONCAT(nombre, ' ', apellido) = '" . $conn->real_escape_string($row['cliente_nombre']) . "') AND estado != 'Pagada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 481: $deudaP = ($stmtDeuda && $deudaRow = $stmtDeuda->fetch_assoc()) ? (float)$deudaRow['deuda_p'] : 0.00;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 482: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 483: $row['total_spent'] = $row['total_spent'] ?? 0.00;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 484: $row['deuda_pendiente'] = $deudaP;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 485: $rankingClientes[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 486: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 487: $stmtRank->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 488: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 489: } elseif ($tab === 'inventario') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 490: // -------------------------------------------------------------
Explicación: Comentario: explica el código y no se ejecuta.
Línea 491: // PESTAÑA: INVENTARIO (Datos actuales en stock)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 492: // -------------------------------------------------------------
Explicación: Comentario: explica el código y no se ejecuta.
Línea 493: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 494: // 1. Valor compra e ingresos venta esperados
Explicación: Comentario: explica el código y no se ejecuta.
Línea 495: $resVal = $conn->query("SELECT SUM(stock_Actual * precio_Compra) as total_compra, SUM(stock_Actual * precio_Venta) as total_venta FROM producto");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 496: $vVals = $resVal ? $resVal->fetch_assoc() : ['total_compra' => 0.00, 'total_venta' => 0.00];
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 497: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 498: $inventarioValorCompra = (float)($vVals['total_compra'] ?? 0.00);
Explicación: Asigna un valor a la variable `$inventarioValorCompra` para utilizarlo después.
Línea 499: $inventarioValorVenta = (float)($vVals['total_venta'] ?? 0.00);
Explicación: Asigna un valor a la variable `$inventarioValorVenta` para utilizarlo después.
Línea 500: $margenPesos = $inventarioValorVenta - $inventarioValorCompra;
Explicación: Asigna un valor a la variable `$margenPesos` para utilizarlo después.
Línea 501: $margenPct = $inventarioValorVenta > 0 ? round(($margenPesos / $inventarioValorVenta) * 100) : 0;
Explicación: Asigna un valor a la variable `$margenPct` para utilizarlo después.
Línea 502: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 503: // Métricas Tarjetas
Explicación: Comentario: explica el código y no se ejecuta.
Línea 504: $stat1_name = "Valor de Compra";
Explicación: Asigna un valor a la variable `$stat1_name` para utilizarlo después.
Línea 505: $stat1_value = "$" . number_format($inventarioValorCompra, 0, ',', '.');
Explicación: Asigna un valor a la variable `$stat1_value` para utilizarlo después.
Línea 506: $stat1_desc = "Inversión actual en stock";
Explicación: Asigna un valor a la variable `$stat1_desc` para utilizarlo después.
Línea 507: $stat1_icon = "fa-solid fa-hand-holding-dollar";
Explicación: Asigna un valor a la variable `$stat1_icon` para utilizarlo después.
Línea 508: $stat1_bg = "#ffd6ff";
Explicación: Asigna un valor a la variable `$stat1_bg` para utilizarlo después.
Línea 509: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 510: $stat2_name = "Valor de Venta";
Explicación: Asigna un valor a la variable `$stat2_name` para utilizarlo después.
Línea 511: $stat2_value = "$" . number_format($inventarioValorVenta, 0, ',', '.');
Explicación: Asigna un valor a la variable `$stat2_value` para utilizarlo después.
Línea 512: $stat2_desc = "Valor de venta estimado";
Explicación: Asigna un valor a la variable `$stat2_desc` para utilizarlo después.
Línea 513: $stat2_icon = "fa-solid fa-store";
Explicación: Asigna un valor a la variable `$stat2_icon` para utilizarlo después.
Línea 514: $stat2_bg = "#e2e2ff";
Explicación: Asigna un valor a la variable `$stat2_bg` para utilizarlo después.
Línea 515: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 516: $stat3_name = "Margen Estimado";
Explicación: Asigna un valor a la variable `$stat3_name` para utilizarlo después.
Línea 517: $stat3_value = "$" . number_format($margenPesos, 0, ',', '.') . " (" . $margenPct . "%)";
Explicación: Asigna un valor a la variable `$stat3_value` para utilizarlo después.
Línea 518: $stat3_desc = "Ganancia proyectada en stock";
Explicación: Asigna un valor a la variable `$stat3_desc` para utilizarlo después.
Línea 519: $stat3_icon = "fa-solid fa-chart-line";
Explicación: Asigna un valor a la variable `$stat3_icon` para utilizarlo después.
Línea 520: $stat3_bg = "#ffd8eb";
Explicación: Asigna un valor a la variable `$stat3_bg` para utilizarlo después.
Línea 521: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 522: // Gráfico de Barras: Stock por Categoría (unidad_Medida)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 523: $resStockCat = $conn->query("SELECT unidad_Medida as categoria, SUM(stock_Actual) as total_stock FROM producto GROUP BY unidad_Medida ORDER BY total_stock DESC");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 524: $stockCategoriasArray = [];
Explicación: Asigna un valor a la variable `$stockCategoriasArray` para utilizarlo después.
Línea 525: $stockTotalesArray = [];
Explicación: Asigna un valor a la variable `$stockTotalesArray` para utilizarlo después.
Línea 526: if ($resStockCat) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 527: while ($row = $resStockCat->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 528: $stockCategoriasArray[] = $row['categoria'] ? $row['categoria'] : 'Otros';
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 529: $stockTotalesArray[] = (int)$row['total_stock'];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 530: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 531: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 532: if (empty($stockCategoriasArray)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 533: $stockCategoriasArray = ['Sin Stock'];
Explicación: Asigna un valor a la variable `$stockCategoriasArray` para utilizarlo después.
Línea 534: $stockTotalesArray = [0];
Explicación: Asigna un valor a la variable `$stockTotalesArray` para utilizarlo después.
Línea 535: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 536: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 537: // Tabla: Productos con Stock Crítico (stock_Actual <= stock_Minimo)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 538: $resCritico = $conn->query("SELECT nombre, codigo_Producto, stock_Actual, stock_Minimo FROM producto WHERE stock_Actual <= stock_Minimo ORDER BY stock_Actual ASC LIMIT 5");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 539: $stockCritico = [];
Explicación: Asigna un valor a la variable `$stockCritico` para utilizarlo después.
Línea 540: if ($resCritico) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 541: while ($row = $resCritico->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 542: $stockCritico[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 543: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 544: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 545: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 546: ?>
Explicación: Cierra el bloque PHP.
Línea 594: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 595: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 596: aplicarConfiguracionEstilos();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 597: ?>
Explicación: Cierra el bloque PHP.
Línea 723: <?php if ($tab !== 'inventario'): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 733: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 777: <?php if ($tab === 'general'): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 802: <?php foreach ($leyendas as $item): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 813: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 822: <?php elseif ($tab === 'ventas'): ?>
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 843: <?php foreach ($leyendasMetodo as $lm): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 854: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 873: <?php foreach ($ultimasVentas as $uv): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 880: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 887: <?php elseif ($tab === 'productos'): ?>
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 914: <?php foreach ($rendimientoProductos as $rp): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 921: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 931: <?php elseif ($tab === 'clientes'): ?>
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 958: <?php foreach ($rankingClientes as $rc): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 965: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 975: <?php elseif ($tab === 'inventario'): ?>
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 1002: <?php if (count($stockCritico) > 0): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 1003: <?php foreach ($stockCritico as $sc): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 1004: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 1005: $stock = (int)$sc['stock_Actual'];
Explicación: Asigna un valor a la variable `$stock` para utilizarlo después.
Línea 1006: $statusText = $stock === 0 ? "Sin Stock" : "Stock Bajo";
Explicación: Asigna un valor a la variable `$statusText` para utilizarlo después.
Línea 1007: $statusStyle = $stock === 0 ? "background-color:#f8d7da; color:#721c24;" : "background-color:#fff3cd; color:#856404;";
Explicación: Asigna un valor a la variable `$statusStyle` para utilizarlo después.
Línea 1008: ?>
Explicación: Cierra el bloque PHP.
Línea 1019: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 1020: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 1026: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 1036: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 1048: <?php if ($tab === 'general'): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 1152: <?php elseif ($tab === 'ventas'): ?>
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 1215: <?php elseif ($tab === 'productos'): ?>
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 1247: <?php elseif ($tab === 'clientes'): ?>
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 1279: <?php elseif ($tab === 'inventario'): ?>
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 1310: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
5. Administrador - configuracion.php
Ruta: views/administrador/configuracion.php
Se explican 92 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Administrador') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: $id_usuario = $_SESSION['id_Usuario'] ?? 0;
Explicación: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
Línea 12: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 13: $mensaje = "";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 14: $tipo_alerta = "";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 15: $titulo_alerta = "";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 16: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 17: // PROCESAR POST ACCIONES
Explicación: Comentario: explica el código y no se ejecuta.
Línea 18: if ($_SERVER["REQUEST_METHOD"] == "POST" && $id_usuario > 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 19: $action = $_POST['action'] ?? '';
Explicación: Recibe mediante POST el dato `action` enviado por el formulario.
Línea 20: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 21: if ($action === 'guardar') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 22: $tema = $_POST['tema'] ?? 'lavender';
Explicación: Recibe mediante POST el dato `tema` enviado por el formulario.
Línea 23: $tipografia = $_POST['tipografia'] ?? 'Segoe UI';
Explicación: Recibe mediante POST el dato `tipografia` enviado por el formulario.
Línea 24: $tamanho_fuente = $_POST['tamanho_fuente'] ?? '14px';
Explicación: Recibe mediante POST el dato `tamanho_fuente` enviado por el formulario.
Línea 25: $modo_oscuro = isset($_POST['modo_oscuro']) ? 1 : 0;
Explicación: Recibe mediante POST el dato `modo_oscuro` enviado por el formulario.
Línea 26: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 27: // Validar tamaño de fuente seguro
Explicación: Comentario: explica el código y no se ejecuta.
Línea 28: $font_sizes_valid = ['12px', '14px', '16px', '18px', '20px'];
Explicación: Asigna un valor a la variable `$font_sizes_valid` para utilizarlo después.
Línea 29: if (!in_array($tamanho_fuente, $font_sizes_valid)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 30: $tamanho_fuente = '14px';
Explicación: Asigna un valor a la variable `$tamanho_fuente` para utilizarlo después.
Línea 31: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 32: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 33: // Actualizar base de datos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 34: $stmtUpdate = $conn->prepare("UPDATE configuracion SET tema = ?, tipografia = ?, tamaño_Fuente = ?, modo_Oscuro = ? WHERE id_Usuario = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 35: if ($stmtUpdate) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 36: $stmtUpdate->bind_param("ssiii", $tema, $tipografia, $tamanho_fuente, $modo_oscuro, $id_usuario);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 37: if ($stmtUpdate->execute()) {
Explicación: Ejecuta la consulta preparada.
Línea 38: $mensaje = "Configuración guardada y aplicada con éxito.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 39: $tipo_alerta = "success";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 40: $titulo_alerta = "¡Éxito!";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 41: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 42: $mensaje = "Error al actualizar la configuración.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 43: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 44: $titulo_alerta = "Error";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 45: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 46: $stmtUpdate->close();
Explicación: Forma parte de una consulta `UPDATE`, utilizada para modificar un registro existente.
Línea 47: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 48: } elseif ($action === 'restablecer') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 49: // Restablecer valores de fábrica
Explicación: Comentario: explica el código y no se ejecuta.
Línea 50: $stmtReset = $conn->prepare("UPDATE configuracion SET tema = 'lavender', tipografia = 'Segoe UI', tamaño_Fuente = '14px', modo_Oscuro = 0 WHERE id_Usuario = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 51: if ($stmtReset) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 52: $stmtReset->bind_param("i", $id_usuario);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 53: if ($stmtReset->execute()) {
Explicación: Ejecuta la consulta preparada.
Línea 54: $mensaje = "Se han restablecido los valores predeterminados.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 55: $tipo_alerta = "success";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 56: $titulo_alerta = "¡Restablecido!";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 57: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 58: $mensaje = "Error al restablecer la configuración.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 59: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 60: $titulo_alerta = "Error";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 61: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 62: $stmtReset->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 63: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 64: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 65: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 66: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 67: // Cargar configuración actual para pre-poblar los campos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 68: $config = obtenerConfiguracionUsuario();
Explicación: Asigna un valor a la variable `$config` para utilizarlo después.
Línea 69: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 70: // OBTENER FECHA ACTUAL EN ESPAÑOL
Explicación: Comentario: explica el código y no se ejecuta.
Línea 71: $dias = [
Explicación: Asigna un valor a la variable `$dias` para utilizarlo después.
Línea 72: 1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 4 => 'Jueves',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 73: 5 => 'Viernes', 6 => 'Sábado', 7 => 'Domingo'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 74: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 75: $meses = [
Explicación: Asigna un valor a la variable `$meses` para utilizarlo después.
Línea 76: 1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 77: 5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 78: 9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 79: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 80: $diaSemana = date('N');
Explicación: Asigna un valor a la variable `$diaSemana` para utilizarlo después.
Línea 81: $mes = date('n');
Explicación: Asigna un valor a la variable `$mes` para utilizarlo después.
Línea 82: $fechaString = $dias[$diaSemana] . ' ' . date('d') . ' de ' . $meses[$mes];
Explicación: Asigna un valor a la variable `$fechaString` para utilizarlo después.
Línea 83: $horaString = date('h:i a');
Explicación: Asigna un valor a la variable `$horaString` para utilizarlo después.
Línea 84: ?>
Explicación: Cierra el bloque PHP.
Línea 113: <?php aplicarConfiguracionEstilos(); ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 289: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 290: // Mapear el tamaño string (12px, 14px, etc) a valor numérico para el slider (1, 2, 3, 4, 5)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 291: $sizeMapToVal = ['12px' => 1, '14px' => 2, '16px' => 3, '18px' => 4, '20px' => 5];
Explicación: Asigna un valor a la variable `$sizeMapToVal` para utilizarlo después.
Línea 292: $slider_val = $sizeMapToVal[$config['tamaño_Fuente']] ?? 2;
Explicación: Asigna un valor a la variable `$slider_val` para utilizarlo después.
Línea 293: ?>
Explicación: Cierra el bloque PHP.
Línea 395: <?php if ($mensaje !== ''): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 402: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
6. Vendedor - controlador
Ruta: controllers/vendedor_controller.php
Se explican 74 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../views/login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../models/vendedor_model.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: $model = new VendedorModel();
Explicación: Crea una instancia de la clase `VendedorModel` para utilizar sus métodos.
Línea 12: $id_usuario = $_SESSION['id_Usuario'] ?? 0;
Explicación: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
Línea 13: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 14: if ($_SERVER["REQUEST_METHOD"] == "POST" && $id_usuario > 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 15: $action = $_POST['action'] ?? '';
Explicación: Recibe mediante POST el dato `action` enviado por el formulario.
Línea 16: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 17: if ($action === 'registrar_venta') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 18: $id_cliente = (int)($_POST['id_cliente'] ?? 0);
Explicación: Recibe mediante POST el dato `id_cliente` enviado por el formulario.
Línea 19: $metodo_pago = trim($_POST['metodo_pago'] ?? 'Efectivo');
Explicación: Recibe mediante POST el dato `metodo_pago` enviado por el formulario.
Línea 20: $productos_json = $_POST['productos_data'] ?? '[]';
Explicación: Recibe mediante POST el dato `productos_data` enviado por el formulario.
Línea 21: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 22: $cart_items = json_decode($productos_json, true);
Explicación: Asigna un valor a la variable `$cart_items` para utilizarlo después.
Línea 23: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 24: if ($id_cliente > 0 && !empty($cart_items)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 25: $id_venta = $model->registrarVenta($id_cliente, $metodo_pago, $cart_items, $id_usuario);
Explicación: Asigna un valor a la variable `$id_venta` para utilizarlo después.
Línea 26: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 27: if ($id_venta) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 28: header("Location: ../views/vendedor/ventas.php?success=1&venta_id=" . $id_venta);
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 29: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 30: header("Location: ../views/vendedor/ventas.php?error=1");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 31: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 32: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 33: header("Location: ../views/vendedor/ventas.php?warning=1");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 34: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 35: exit();
Explicación: Detiene la ejecución del archivo.
Línea 36: } elseif ($action === 'registrar_deuda') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 37: $id_cliente = (int)($_POST['id_cliente'] ?? 0);
Explicación: Recibe mediante POST el dato `id_cliente` enviado por el formulario.
Línea 38: $concepto = trim($_POST['concepto'] ?? '');
Explicación: Recibe mediante POST el dato `concepto` enviado por el formulario.
Línea 39: $valor = (float)($_POST['valor'] ?? 0.00);
Explicación: Recibe mediante POST el dato `valor` enviado por el formulario.
Línea 40: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 41: if ($id_cliente > 0 && $concepto !== '' && $valor > 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 42: $success = $model->registrarDeuda($id_cliente, $concepto, $valor, $id_usuario);
Explicación: Asigna un valor a la variable `$success` para utilizarlo después.
Línea 43: if ($success) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 44: header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&deuda_success=1");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 45: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 46: header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&deuda_error=1");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 47: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 48: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 49: header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&deuda_warning=1");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 50: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 51: exit();
Explicación: Detiene la ejecución del archivo.
Línea 52: } elseif ($action === 'registrar_abono') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 53: $id_cliente = (int)($_POST['id_cliente'] ?? 0);
Explicación: Recibe mediante POST el dato `id_cliente` enviado por el formulario.
Línea 54: $id_deuda = (int)($_POST['id_deuda'] ?? 0);
Explicación: Recibe mediante POST el dato `id_deuda` enviado por el formulario.
Línea 55: $monto = (float)($_POST['monto'] ?? 0.00);
Explicación: Recibe mediante POST el dato `monto` enviado por el formulario.
Línea 56: $concepto = trim($_POST['concepto'] ?? 'Abono Parcial');
Explicación: Recibe mediante POST el dato `concepto` enviado por el formulario.
Línea 57: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 58: if ($id_cliente > 0 && $id_deuda > 0 && $monto > 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 59: $success = $model->registrarAbono($id_deuda, $monto, $concepto, $id_usuario, $id_cliente);
Explicación: Asigna un valor a la variable `$success` para utilizarlo después.
Línea 60: if ($success) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 61: header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&abono_success=1");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 62: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 63: header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&abono_error=1");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 64: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 65: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 66: header("Location: ../views/vendedor/cliente_detalle.php?id=" . $id_cliente . "&abono_warning=1");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 67: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 68: exit();
Explicación: Detiene la ejecución del archivo.
Línea 69: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 70: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 71: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 72: header("Location: ../views/vendedor/dashboard_vendedor.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 73: exit();
Explicación: Detiene la ejecución del archivo.
Línea 74: ?>
Explicación: Cierra el bloque PHP.
 
6.1 Vendedor - modelo
Ruta: models/vendedor_model.php
Se explican 199 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: require_once __DIR__ . '/../configuration/database.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: class VendedorModel {
Explicación: Declara la clase `VendedorModel`, que agrupa propiedades y métodos relacionados.
Línea 5: private $db;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 6: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 7: public function __construct() {
Explicación: Declara la función o método `__construct`; las líneas siguientes indican cómo realiza esa operación.
Línea 8: global $conn;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 9: $this->db = $conn;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 10: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: // 1. Obtener estadísticas para el dashboard del vendedor
Explicación: Comentario: explica el código y no se ejecuta.
Línea 13: public function obtenerEstadisticasDashboard($id_usuario) {
Explicación: Declara la función o método `obtenerEstadisticasDashboard`; las líneas siguientes indican cómo realiza esa operación.
Línea 14: $stats = [
Explicación: Asigna un valor a la variable `$stats` para utilizarlo después.
Línea 15: 'ventas_hoy' => 0.00,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 16: 'productos_activos' => 0,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 17: 'clientes_registrados' => 0
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 18: ];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 19: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 20: // Ventas de hoy realizadas por este vendedor
Explicación: Comentario: explica el código y no se ejecuta.
Línea 21: $stmtV = $this->db->prepare("SELECT SUM(total) as total FROM venta WHERE id_Usuario = ? AND DATE(fecha_Venta) = CURRENT_DATE() AND estado = 'Completada'");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 22: if ($stmtV) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 23: $stmtV->bind_param("i", $id_usuario);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 24: $stmtV->execute();
Explicación: Ejecuta la consulta preparada.
Línea 25: $res = $stmtV->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 26: $stats['ventas_hoy'] = (float)($res['total'] ?? 0.00);
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 27: $stmtV->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 28: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 29: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 30: // Cantidad de productos activos en stock
Explicación: Comentario: explica el código y no se ejecuta.
Línea 31: $resP = $this->db->query("SELECT COUNT(*) as total FROM producto WHERE estado = 'Activo'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 32: if ($resP) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 33: $stats['productos_activos'] = (int)$resP->fetch_assoc()['total'];
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 34: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 35: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 36: // Cantidad de clientes registrados
Explicación: Comentario: explica el código y no se ejecuta.
Línea 37: $resC = $this->db->query("SELECT COUNT(*) as total FROM cliente");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 38: if ($resC) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 39: $stats['clientes_registrados'] = (int)$resC->fetch_assoc()['total'];
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 40: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 41: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 42: return $stats;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 43: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 44: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 45: // 2. Consultar productos disponibles
Explicación: Comentario: explica el código y no se ejecuta.
Línea 46: public function consultarProductos($buscar = '') {
Explicación: Declara la función o método `consultarProductos`; las líneas siguientes indican cómo realiza esa operación.
Línea 47: $productos = [];
Explicación: Asigna un valor a la variable `$productos` para utilizarlo después.
Línea 48: $query = "SELECT * FROM producto WHERE estado = 'Activo'";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 49: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 50: if ($buscar !== '') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 51: $query .= " AND (nombre LIKE ? OR codigo_Producto LIKE ? OR unidad_Medida LIKE ?)";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 52: $stmt = $this->db->prepare($query);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 53: $term = "%" . $buscar . "%";
Explicación: Asigna un valor a la variable `$term` para utilizarlo después.
Línea 54: $stmt->bind_param("sss", $term, $term, $term);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 55: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 56: $res = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 57: while ($row = $res->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 58: $productos[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 59: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 60: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 61: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 62: $res = $this->db->query($query);
Explicación: Asigna un valor a la variable `$res` para utilizarlo después.
Línea 63: if ($res) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 64: while ($row = $res->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 65: $productos[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 66: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 67: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 68: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 69: return $productos;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 70: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 71: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 72: // 3. Registrar Venta Transaccional
Explicación: Comentario: explica el código y no se ejecuta.
Línea 73: public function registrarVenta($id_cliente, $metodo_pago, $cart_items, $id_usuario) {
Explicación: Declara la función o método `registrarVenta`; las líneas siguientes indican cómo realiza esa operación.
Línea 74: if (empty($cart_items) || $id_cliente <= 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 75: return false;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 76: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 77: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 78: $this->db->begin_transaction();
Explicación: Inicia una transacción para que varias operaciones se confirmen o reviertan juntas.
Línea 79: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 80: try {
Explicación: Inicia un bloque donde se controlarán posibles errores.
Línea 81: // Calcular total de la venta
Explicación: Comentario: explica el código y no se ejecuta.
Línea 82: $total_venta = 0.00;
Explicación: Asigna un valor a la variable `$total_venta` para utilizarlo después.
Línea 83: foreach ($cart_items as $item) {
Explicación: Recorre uno por uno los elementos de un arreglo o resultado.
Línea 84: $total_venta += (float)$item['subtotal'];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 85: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 86: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 87: $fecha_actual = date('Y-m-d H:i:s');
Explicación: Asigna un valor a la variable `$fecha_actual` para utilizarlo después.
Línea 88: $estado_venta = 'Completada';
Explicación: Asigna un valor a la variable `$estado_venta` para utilizarlo después.
Línea 89: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 90: // 1. Insertar Cabecera de Venta
Explicación: Comentario: explica el código y no se ejecuta.
Línea 91: $stmtV = $this->db->prepare("INSERT INTO venta (id_Cliente, fecha_Venta, subtotal, descuento, total, metodo_Pago, estado, id_Usuario) VALUES (?, ?, ?, 0.00, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 92: $stmtV->bind_param("isddssi", $id_cliente, $fecha_actual, $total_venta, $total_venta, $metodo_pago, $estado_venta, $id_usuario);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 93: $stmtV->execute();
Explicación: Ejecuta la consulta preparada.
Línea 94: $id_venta = $this->db->insert_id;
Explicación: Obtiene el ID generado por el último INSERT.
Línea 95: $stmtV->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 96: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 97: // 2. Insertar Detalles de Venta y actualizar stock de productos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 98: $stmtD = $this->db->prepare("INSERT INTO detalle_venta (id_Venta, id_Producto, cantidad, precio_Unitario, subtotal) VALUES (?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 99: $stmtS = $this->db->prepare("UPDATE producto SET stock_Actual = stock_Actual - ? WHERE id_Producto = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 100: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 101: foreach ($cart_items as $item) {
Explicación: Recorre uno por uno los elementos de un arreglo o resultado.
Línea 102: $id_prod = (int)$item['id_producto'];
Explicación: Asigna un valor a la variable `$id_prod` para utilizarlo después.
Línea 103: $cant = (int)$item['cantidad'];
Explicación: Asigna un valor a la variable `$cant` para utilizarlo después.
Línea 104: $precio_u = (float)$item['precio'];
Explicación: Asigna un valor a la variable `$precio_u` para utilizarlo después.
Línea 105: $sub = (float)$item['subtotal'];
Explicación: Asigna un valor a la variable `$sub` para utilizarlo después.
Línea 106: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 107: // Insertar Detalle
Explicación: Comentario: explica el código y no se ejecuta.
Línea 108: $stmtD->bind_param("iiidd", $id_venta, $id_prod, $cant, $precio_u, $sub);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 109: $stmtD->execute();
Explicación: Ejecuta la consulta preparada.
Línea 110: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 111: // Actualizar Stock
Explicación: Comentario: explica el código y no se ejecuta.
Línea 112: $stmtS->bind_param("ii", $cant, $id_prod);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 113: $stmtS->execute();
Explicación: Ejecuta la consulta preparada.
Línea 114: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 115: $stmtD->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 116: $stmtS->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 117: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 118: // 3. Si el método de pago es Crédito, registrar la deuda
Explicación: Comentario: explica el código y no se ejecuta.
Línea 119: if ($metodo_pago === 'Crédito') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 120: $estado_deuda = 'Pendiente';
Explicación: Asigna un valor a la variable `$estado_deuda` para utilizarlo después.
Línea 121: $concepto = "Venta #" . str_pad($id_venta, 5, '0', STR_PAD_LEFT);
Explicación: Asigna un valor a la variable `$concepto` para utilizarlo después.
Línea 122: $stmtDeuda = $this->db->prepare("INSERT INTO deuda (fecha_Registro, valor_Inicial, saldo_Pendiente, estado, concepto, id_Usuario, id_Cliente) VALUES (?, ?, ?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 123: $stmtDeuda->bind_param("sddssii", $fecha_actual, $total_venta, $total_venta, $estado_deuda, $concepto, $id_usuario, $id_cliente);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 124: $stmtDeuda->execute();
Explicación: Ejecuta la consulta preparada.
Línea 125: $stmtDeuda->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 126: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 127: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 128: $this->db->commit();
Explicación: Confirma la transacción y guarda definitivamente los cambios.
Línea 129: return $id_venta;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 130: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 131: } catch (Exception $e) {
Explicación: Captura y maneja un error producido dentro del bloque `try`.
Línea 132: $this->db->rollback();
Explicación: Revierte la transacción cuando ocurre un error.
Línea 133: return false;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 134: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 135: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 136: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 137: // 4. Registrar Deuda (Fiado)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 138: public function registrarDeuda($id_cliente, $concepto, $valor, $id_usuario) {
Explicación: Declara la función o método `registrarDeuda`; las líneas siguientes indican cómo realiza esa operación.
Línea 139: $fecha_actual = date('Y-m-d H:i:s');
Explicación: Asigna un valor a la variable `$fecha_actual` para utilizarlo después.
Línea 140: $estado = 'Pendiente';
Explicación: Asigna un valor a la variable `$estado` para utilizarlo después.
Línea 141: $stmt = $this->db->prepare("INSERT INTO deuda (fecha_Registro, valor_Inicial, saldo_Pendiente, estado, concepto, id_Usuario, id_Cliente) VALUES (?, ?, ?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 142: if ($stmt) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 143: $stmt->bind_param("sddssii", $fecha_actual, $valor, $valor, $estado, $concepto, $id_usuario, $id_cliente);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 144: $success = $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 145: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 146: return $success;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 147: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 148: return false;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 149: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 150: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 151: // 5. Registrar Abono
Explicación: Comentario: explica el código y no se ejecuta.
Línea 152: public function registrarAbono($id_deuda, $monto, $concepto, $id_usuario, $id_cliente) {
Explicación: Declara la función o método `registrarAbono`; las líneas siguientes indican cómo realiza esa operación.
Línea 153: $this->db->begin_transaction();
Explicación: Inicia una transacción para que varias operaciones se confirmen o reviertan juntas.
Línea 154: try {
Explicación: Inicia un bloque donde se controlarán posibles errores.
Línea 155: $fecha_actual = date('Y-m-d H:i:s');
Explicación: Asigna un valor a la variable `$fecha_actual` para utilizarlo después.
Línea 156: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 157: // 1. Insertar registro de abono
Explicación: Comentario: explica el código y no se ejecuta.
Línea 158: $stmtA = $this->db->prepare("INSERT INTO abono (fecha_Registro, monto, concepto, id_Deuda, id_Usuario) VALUES (?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 159: $stmtA->bind_param("sdsii", $fecha_actual, $monto, $concepto, $id_deuda, $id_usuario);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 160: $stmtA->execute();
Explicación: Ejecuta la consulta preparada.
Línea 161: $stmtA->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 162: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 163: // 2. Consultar saldo pendiente actual de la deuda
Explicación: Comentario: explica el código y no se ejecuta.
Línea 164: $stmtD = $this->db->prepare("SELECT saldo_Pendiente, valor_Inicial FROM deuda WHERE id_Deuda = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 165: $stmtD->bind_param("i", $id_deuda);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 166: $stmtD->execute();
Explicación: Ejecuta la consulta preparada.
Línea 167: $resD = $stmtD->get_result()->fetch_assoc();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 168: $stmtD->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 169: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 170: if (!$resD) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 171: throw new Exception("Deuda no encontrada");
Explicación: Crea una instancia de la clase `Exception` para utilizar sus métodos.
Línea 172: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 173: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 174: $nuevo_saldo = (float)$resD['saldo_Pendiente'] - (float)$monto;
Explicación: Asigna un valor a la variable `$nuevo_saldo` para utilizarlo después.
Línea 175: if ($nuevo_saldo < 0) $nuevo_saldo = 0.00;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 176: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 177: // Determinar nuevo estado de deuda
Explicación: Comentario: explica el código y no se ejecuta.
Línea 178: if ($nuevo_saldo == 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 179: $nuevo_estado = 'Pagada';
Explicación: Asigna un valor a la variable `$nuevo_estado` para utilizarlo después.
Línea 180: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 181: $nuevo_estado = 'Abonada';
Explicación: Asigna un valor a la variable `$nuevo_estado` para utilizarlo después.
Línea 182: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 183: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 184: // 3. Actualizar tabla deuda
Explicación: Comentario: explica el código y no se ejecuta.
Línea 185: $stmtU = $this->db->prepare("UPDATE deuda SET saldo_Pendiente = ?, estado = ? WHERE id_Deuda = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 186: $stmtU->bind_param("dsi", $nuevo_saldo, $nuevo_estado, $id_deuda);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 187: $stmtU->execute();
Explicación: Ejecuta la consulta preparada.
Línea 188: $stmtU->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 189: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 190: $this->db->commit();
Explicación: Confirma la transacción y guarda definitivamente los cambios.
Línea 191: return true;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 192: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 193: } catch (Exception $e) {
Explicación: Captura y maneja un error producido dentro del bloque `try`.
Línea 194: $this->db->rollback();
Explicación: Revierte la transacción cuando ocurre un error.
Línea 195: return false;
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 196: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 197: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 198: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 199: ?>
Explicación: Cierra el bloque PHP.
 
6.2 Vendedor - dashboard_vendedor.php
Ruta: views/vendedor/dashboard_vendedor.php
Se explican 25 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: require_once __DIR__ . '/../../models/vendedor_model.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 12: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 13: $nombreUsuario = $_SESSION['usuario'] ?? 'Vendedor';
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 14: $rolUsuario = $_SESSION['rol'] ?? 'Vendedor';
Explicación: Lee o guarda `rol` en la sesión para conservarlo entre páginas.
Línea 15: $id_usuario = $_SESSION['id_Usuario'] ?? 0;
Explicación: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
Línea 16: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 17: // Cargar estadísticas dinámica usando el modelo
Explicación: Comentario: explica el código y no se ejecuta.
Línea 18: $model = new VendedorModel();
Explicación: Crea una instancia de la clase `VendedorModel` para utilizar sus métodos.
Línea 19: $stats = $model->obtenerEstadisticasDashboard($id_usuario);
Explicación: Asigna un valor a la variable `$stats` para utilizarlo después.
Línea 20: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 21: $ventasHoy = $stats['ventas_hoy'];
Explicación: Asigna un valor a la variable `$ventasHoy` para utilizarlo después.
Línea 22: $productos = $stats['productos_activos'];
Explicación: Asigna un valor a la variable `$productos` para utilizarlo después.
Línea 23: $clientes = $stats['clientes_registrados'];
Explicación: Asigna un valor a la variable `$clientes` para utilizarlo después.
Línea 24: ?>
Explicación: Cierra el bloque PHP.
Línea 49: <?php aplicarConfiguracionEstilos(); ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
6.2 Vendedor - ventas.php
Ruta: views/vendedor/ventas.php
Se explican 94 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: require_once __DIR__ . '/../../models/vendedor_model.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 12: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 13: $id_usuario = $_SESSION['id_Usuario'] ?? 0;
Explicación: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
Línea 14: $nombreUsuario = $_SESSION['usuario'] ?? 'Vendedor';
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 15: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 16: $model = new VendedorModel();
Explicación: Crea una instancia de la clase `VendedorModel` para utilizar sus métodos.
Línea 17: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 18: // OBTENER ESTADÍSTICAS DEL VENDEDOR ACTIVO
Explicación: Comentario: explica el código y no se ejecuta.
Línea 19: // 1. Total Facturado por este vendedor
Explicación: Comentario: explica el código y no se ejecuta.
Línea 20: $resTotal = $conn->query("SELECT SUM(total) as total FROM venta WHERE id_Usuario = $id_usuario AND estado = 'Completada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 21: $totalFacturado = $resTotal ? (float)$resTotal->fetch_assoc()['total'] : 0.0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 22: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 23: // 2. Ventas Realizadas por este vendedor
Explicación: Comentario: explica el código y no se ejecuta.
Línea 24: $resCount = $conn->query("SELECT COUNT(*) as total FROM venta WHERE id_Usuario = $id_usuario");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 25: $totalVentas = $resCount ? (int)$resCount->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 26: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 27: // 3. Metodo de Pago Preferido por este vendedor
Explicación: Comentario: explica el código y no se ejecuta.
Línea 28: $resMetodo = $conn->query("SELECT metodo_Pago, COUNT(*) as cant FROM venta WHERE id_Usuario = $id_usuario GROUP BY metodo_Pago ORDER BY cant DESC LIMIT 1");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 29: $metodoPreferido = ($resMetodo && $row = $resMetodo->fetch_assoc()) ? $row['metodo_Pago'] : 'Efectivo';
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 30: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 31: // 4. Créditos (Fiados) del vendedor
Explicación: Comentario: explica el código y no se ejecuta.
Línea 32: $resDeuda = $conn->query("SELECT SUM(saldo_Pendiente) as total FROM deuda WHERE id_Usuario = $id_usuario AND estado = 'Pendiente'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 33: $totalDeudaActiva = $resDeuda ? (float)$resDeuda->fetch_assoc()['total'] : 0.0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 34: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 35: // OBTENER CLIENTES Y PRODUCTOS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 36: $clientesResult = $conn->query("SELECT c.id_Cliente, u.nombre, u.apellido FROM cliente c JOIN usuarios u ON c.numero_Documento = u.numero_Documento WHERE u.estado = 'Activo'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 37: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 38: $productosResult = $conn->query("SELECT id_Producto, nombre, codigo_Producto, precio_Venta, stock_Actual, unidad_Medida FROM producto WHERE estado = 'Activo' AND stock_Actual > 0");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 39: $productosArr = [];
Explicación: Asigna un valor a la variable `$productosArr` para utilizarlo después.
Línea 40: if ($productosResult) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 41: while ($row = $productosResult->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 42: $productosArr[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 43: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 44: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 45: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 46: // OBTENER VENTAS RECIENTES DEL VENDEDOR ACTIVO (Últimas 5)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 47: $ventasRecientes = $conn->query("SELECT v.*, u.nombre as cliente_nombre, u.apellido as cliente_apellido
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 48: FROM venta v
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 49: LEFT JOIN cliente c ON v.id_Cliente = c.id_Cliente
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 50: LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 51: WHERE v.id_Usuario = $id_usuario
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 52: ORDER BY v.id_Venta DESC LIMIT 5");
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 53: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 54: // Alertas de redirección
Explicación: Comentario: explica el código y no se ejecuta.
Línea 55: $alerta_msg = "";
Explicación: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
Línea 56: $alerta_tipo = "";
Explicación: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
Línea 57: $alerta_titulo = "";
Explicación: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
Línea 58: $venta_imprimir_id = 0;
Explicación: Asigna un valor a la variable `$venta_imprimir_id` para utilizarlo después.
Línea 59: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 60: if (isset($_GET['success']) && $_GET['success'] == '1') {
Explicación: Obtiene de la URL el parámetro `success`.
Línea 61: $alerta_msg = "La venta ha sido registrada con éxito.";
Explicación: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
Línea 62: $alerta_tipo = "success";
Explicación: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
Línea 63: $alerta_titulo = "¡Venta Registrada!";
Explicación: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
Línea 64: $venta_imprimir_id = isset($_GET['venta_id']) ? (int)$_GET['venta_id'] : 0;
Explicación: Obtiene de la URL el parámetro `venta_id`.
Línea 65: } elseif (isset($_GET['error'])) {
Explicación: Obtiene de la URL el parámetro `error`.
Línea 66: $alerta_msg = "Error al procesar la venta en la base de datos.";
Explicación: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
Línea 67: $alerta_tipo = "error";
Explicación: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
Línea 68: $alerta_titulo = "Error";
Explicación: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
Línea 69: } elseif (isset($_GET['warning'])) {
Explicación: Obtiene de la URL el parámetro `warning`.
Línea 70: $alerta_msg = "Por favor selecciona un cliente y agrega productos al carrito.";
Explicación: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
Línea 71: $alerta_tipo = "warning";
Explicación: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
Línea 72: $alerta_titulo = "Datos incompletos";
Explicación: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
Línea 73: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 74: ?>
Explicación: Cierra el bloque PHP.
Línea 103: <?php aplicarConfiguracionEstilos(); ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 252: <?php foreach ($productosArr as $p): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 259: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 313: <?php if ($clientesResult): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 314: <?php while ($c = $clientesResult->fetch_assoc()): ?>
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 318: <?php endwhile; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 319: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 377: <?php if ($ventasRecientes && $ventasRecientes->num_rows > 0): ?>
Explicación: Comprueba cuántos registros devolvió la consulta.
Línea 378: <?php while ($row = $ventasRecientes->fetch_assoc()): ?>
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 379: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 380: $cliente_nom = $row['cliente_nombre'] ? $row['cliente_nombre'] . ' ' . $row['cliente_apellido'] : 'General / Anónimo';
Explicación: Asigna un valor a la variable `$cliente_nom` para utilizarlo después.
Línea 381: $venta_formatted_id = "#SIVC-" . str_pad($row['id_Venta'], 5, '0', STR_PAD_LEFT);
Explicación: Asigna un valor a la variable `$venta_formatted_id` para utilizarlo después.
Línea 382: ?>
Explicación: Cierra el bloque PHP.
Línea 400: <?php endwhile; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 401: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 407: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 548: <?php if ($alerta_msg !== ''): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 555: <?php if ($venta_imprimir_id > 0): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 557: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 561: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
6.2 Vendedor - inventario.php
Ruta: views/vendedor/inventario.php
Se explican 150 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: // OBTENER ESTADÍSTICAS DEL INVENTARIO GENERAL
Explicación: Comentario: explica el código y no se ejecuta.
Línea 13: // 1. Total Productos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 14: $resTotal = $conn->query("SELECT COUNT(*) as total FROM producto");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 15: $totalProductos = $resTotal ? (int)$resTotal->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 16: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 17: // 2. Total Categorías (unidad_Medida)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 18: $resCat = $conn->query("SELECT COUNT(DISTINCT unidad_Medida) as total FROM producto");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 19: $totalCategorias = $resCat ? (int)$resCat->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 20: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 21: // 3. Stock Disponible (stock_Actual > stock_Minimo)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 22: $resDisp = $conn->query("SELECT COUNT(*) as total FROM producto WHERE stock_Actual > stock_Minimo");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 23: $stockDisponible = $resDisp ? (int)$resDisp->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 24: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 25: // 4. Stock Bajo (stock_Actual <= stock_Minimo)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 26: $resBajo = $conn->query("SELECT COUNT(*) as total FROM producto WHERE stock_Actual <= stock_Minimo");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 27: $stockBajo = $resBajo ? (int)$resBajo->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 28: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 29: // FILTROS Y BÚSQUEDA
Explicación: Comentario: explica el código y no se ejecuta.
Línea 30: $buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
Explicación: Obtiene de la URL el parámetro `buscar`.
Línea 31: $categoriaFiltro = isset($_GET['categoria']) ? trim($_GET['categoria']) : 'Todos';
Explicación: Obtiene de la URL el parámetro `categoria`.
Línea 32: $estadoFiltro = isset($_GET['estado']) ? trim($_GET['estado']) : 'Todos';
Explicación: Obtiene de la URL el parámetro `estado`.
Línea 33: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 34: $whereClauses = [];
Explicación: Asigna un valor a la variable `$whereClauses` para utilizarlo después.
Línea 35: $params = [];
Explicación: Asigna un valor a la variable `$params` para utilizarlo después.
Línea 36: $types = "";
Explicación: Asigna un valor a la variable `$types` para utilizarlo después.
Línea 37: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 38: if ($buscar !== '') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 39: $whereClauses[] = "(nombre LIKE ? OR codigo_Producto LIKE ?)";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 40: $searchWildcard = "%" . $buscar . "%";
Explicación: Asigna un valor a la variable `$searchWildcard` para utilizarlo después.
Línea 41: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 42: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 43: $types .= "ss";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 44: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 45: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 46: if ($categoriaFiltro !== 'Todos') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 47: $whereClauses[] = "unidad_Medida = ?";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 48: $params[] = $categoriaFiltro;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 49: $types .= "s";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 50: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 51: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 52: if ($estadoFiltro !== 'Todos') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 53: if ($estadoFiltro === 'Disponible') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 54: $whereClauses[] = "stock_Actual > stock_Minimo";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 55: } elseif ($estadoFiltro === 'Stock Bajo') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 56: $whereClauses[] = "stock_Actual <= stock_Minimo AND stock_Actual > 0";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 57: } elseif ($estadoFiltro === 'Sin Stock') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 58: $whereClauses[] = "stock_Actual = 0";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 59: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 60: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 61: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 62: $whereSql = "";
Explicación: Asigna un valor a la variable `$whereSql` para utilizarlo después.
Línea 63: if (!empty($whereClauses)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 64: $whereSql = "WHERE " . implode(" AND ", $whereClauses);
Explicación: Asigna un valor a la variable `$whereSql` para utilizarlo después.
Línea 65: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 66: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 67: // PAGINACIÓN
Explicación: Comentario: explica el código y no se ejecuta.
Línea 68: $limite = 5;
Explicación: Asigna un valor a la variable `$limite` para utilizarlo después.
Línea 69: $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
Explicación: Obtiene de la URL el parámetro `pagina`.
Línea 70: if ($pagina < 1) $pagina = 1;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 71: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 72: // Contar total de registros filtrados
Explicación: Comentario: explica el código y no se ejecuta.
Línea 73: $countQuery = "SELECT COUNT(*) as total FROM producto $whereSql";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 74: $stmtCount = $conn->prepare($countQuery);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 75: if ($stmtCount) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 76: if (!empty($params)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 77: $stmtCount->bind_param($types, ...$params);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 78: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 79: $stmtCount->execute();
Explicación: Ejecuta la consulta preparada.
Línea 80: $totalFiltrados = $stmtCount->get_result()->fetch_assoc()['total'];
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 81: $stmtCount->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 82: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 83: $totalFiltrados = 0;
Explicación: Asigna un valor a la variable `$totalFiltrados` para utilizarlo después.
Línea 84: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 85: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 86: $totalPaginas = ceil($totalFiltrados / $limite);
Explicación: Asigna un valor a la variable `$totalPaginas` para utilizarlo después.
Línea 87: if ($totalPaginas < 1) $totalPaginas = 1;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 88: if ($pagina > $totalPaginas) $pagina = $totalPaginas;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 89: $offset = ($pagina - 1) * $limite;
Explicación: Asigna un valor a la variable `$offset` para utilizarlo después.
Línea 90: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 91: // CONSULTAR PRODUCTOS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 92: $query = "SELECT * FROM producto $whereSql ORDER BY nombre ASC LIMIT ?, ?";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 93: $stmt = $conn->prepare($query);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 94: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 95: $execParams = $params;
Explicación: Asigna un valor a la variable `$execParams` para utilizarlo después.
Línea 96: $execTypes = $types;
Explicación: Asigna un valor a la variable `$execTypes` para utilizarlo después.
Línea 97: $execParams[] = $offset;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 98: $execParams[] = $limite;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 99: $execTypes .= "ii";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 100: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 101: $productos = [];
Explicación: Asigna un valor a la variable `$productos` para utilizarlo después.
Línea 102: if ($stmt) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 103: $stmt->bind_param($execTypes, ...$execParams);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 104: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 105: $resProductos = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 106: while ($row = $resProductos->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 107: $productos[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 108: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 109: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 110: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 111: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 112: // Obtener categorías para dropdown
Explicación: Comentario: explica el código y no se ejecuta.
Línea 113: $resCategorias = $conn->query("SELECT DISTINCT unidad_Medida FROM producto ORDER BY unidad_Medida ASC");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 114: ?>
Explicación: Cierra el bloque PHP.
Línea 140: <?php aplicarConfiguracionEstilos(); ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 289: <?php if ($resCategorias): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 290: <?php while ($cat = $resCategorias->fetch_assoc()): ?>
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 291: <?php $cName = $cat['unidad_Medida'] ? $cat['unidad_Medida'] : 'Otros'; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 295: <?php endwhile; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 296: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 311: <?php if ($buscar !== '' || $categoriaFiltro !== 'Todos' || $estadoFiltro !== 'Todos'): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 315: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 333: <?php if (count($productos) > 0): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 334: <?php foreach ($productos as $p): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 335: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 336: $stock = (int)$p['stock_Actual'];
Explicación: Asigna un valor a la variable `$stock` para utilizarlo después.
Línea 337: $min = (int)$p['stock_Minimo'];
Explicación: Asigna un valor a la variable `$min` para utilizarlo después.
Línea 338: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 339: // Determinar estados y badges
Explicación: Comentario: explica el código y no se ejecuta.
Línea 340: if ($stock === 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 341: $stockClass = "empty";
Explicación: Asigna un valor a la variable `$stockClass` para utilizarlo después.
Línea 342: $badgeClass = "sin-stock";
Explicación: Asigna un valor a la variable `$badgeClass` para utilizarlo después.
Línea 343: $badgeText = "Sin Stock";
Explicación: Asigna un valor a la variable `$badgeText` para utilizarlo después.
Línea 344: } elseif ($stock <= $min) {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 345: $stockClass = "low";
Explicación: Asigna un valor a la variable `$stockClass` para utilizarlo después.
Línea 346: $badgeClass = "stock-bajo";
Explicación: Asigna un valor a la variable `$badgeClass` para utilizarlo después.
Línea 347: $badgeText = "Stock Bajo";
Explicación: Asigna un valor a la variable `$badgeText` para utilizarlo después.
Línea 348: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 349: $stockClass = "available";
Explicación: Asigna un valor a la variable `$stockClass` para utilizarlo después.
Línea 350: $badgeClass = "disponible";
Explicación: Asigna un valor a la variable `$badgeClass` para utilizarlo después.
Línea 351: $badgeText = "Disponible";
Explicación: Asigna un valor a la variable `$badgeText` para utilizarlo después.
Línea 352: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 353: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 354: $img_src = !empty($p['imagen']) ? "../../public/img/" . htmlspecialchars($p['imagen']) : "../../public/img/caja.png";
Explicación: Escapa caracteres especiales antes de mostrarlos en HTML para mayor seguridad.
Línea 355: ?>
Explicación: Cierra el bloque PHP.
Línea 384: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 385: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 391: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 402: <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 405: <?php endfor; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
6.2 Vendedor - clientes.php
Ruta: views/vendedor/clientes.php
Se explican 178 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: $mensaje = "";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 13: $tipo_alerta = "";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 14: $titulo_alerta = "";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 15: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 16: // REGISTRAR CLIENTE POST (Si el vendedor registra un cliente)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 17: if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'agregar') {
Explicación: Recibe mediante POST el dato `action` enviado por el formulario.
Línea 18: $nombre = trim($_POST['nombre'] ?? '');
Explicación: Recibe mediante POST el dato `nombre` enviado por el formulario.
Línea 19: $apellido = trim($_POST['apellido'] ?? '');
Explicación: Recibe mediante POST el dato `apellido` enviado por el formulario.
Línea 20: $documento = trim($_POST['documento'] ?? '');
Explicación: Recibe mediante POST el dato `documento` enviado por el formulario.
Línea 21: $telefono = trim($_POST['telefono'] ?? '');
Explicación: Recibe mediante POST el dato `telefono` enviado por el formulario.
Línea 22: $correo = trim($_POST['correo'] ?? '');
Explicación: Recibe mediante POST el dato `correo` enviado por el formulario.
Línea 23: $estado = 'Activo';
Explicación: Asigna un valor a la variable `$estado` para utilizarlo después.
Línea 24: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 25: if ($nombre && $apellido && $documento && $correo) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 26: $conn->begin_transaction();
Explicación: Inicia una transacción para que varias operaciones se confirmen o reviertan juntas.
Línea 27: try {
Explicación: Inicia un bloque donde se controlarán posibles errores.
Línea 28: // 1. Verificar duplicados
Explicación: Comentario: explica el código y no se ejecuta.
Línea 29: $stmtCheck = $conn->prepare("SELECT numero_Documento FROM usuarios WHERE numero_Documento = ? OR correo = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 30: $stmtCheck->bind_param("ss", $documento, $correo);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 31: $stmtCheck->execute();
Explicación: Ejecuta la consulta preparada.
Línea 32: if ($stmtCheck->get_result()->num_rows > 0) {
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 33: throw new Exception("El documento o correo ya se encuentra registrado.");
Explicación: Crea una instancia de la clase `Exception` para utilizar sus métodos.
Línea 34: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 35: $stmtCheck->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 36: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 37: // 2. Registrar usuario de rol Cliente (Rol 3)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 38: $dummy_pass = password_hash($documento, PASSWORD_BCRYPT);
Explicación: Cifra la contraseña mediante un hash seguro antes de almacenarla.
Línea 39: $stmtUser = $conn->prepare("INSERT INTO usuarios (nombre, apellido, numero_Documento, id_Rol, telefono, correo, nombre_Usuario, contraseña, estado) VALUES (?, ?, ?, '3', ?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 40: $username = strtolower($nombre) . date('y');
Explicación: Asigna un valor a la variable `$username` para utilizarlo después.
Línea 41: $stmtUser->bind_param("sssssssss", $nombre, $apellido, $documento, $telefono, $correo, $username, $dummy_pass, $estado);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 42: $stmtUser->execute();
Explicación: Ejecuta la consulta preparada.
Línea 43: $stmtUser->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 44: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 45: // 3. Registrar en cliente
Explicación: Comentario: explica el código y no se ejecuta.
Línea 46: $fecha_actual = date('Y-m-d H:i:s');
Explicación: Asigna un valor a la variable `$fecha_actual` para utilizarlo después.
Línea 47: $stmtCli = $conn->prepare("INSERT INTO cliente (numero_Documento, nombre, apellido, fecha_Registro, estado) VALUES (?, ?, ?, ?, ?)");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 48: $stmtCli->bind_param("sssss", $documento, $nombre, $apellido, $fecha_actual, $estado);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 49: $stmtCli->execute();
Explicación: Ejecuta la consulta preparada.
Línea 50: $stmtCli->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 51: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 52: $conn->commit();
Explicación: Confirma la transacción y guarda definitivamente los cambios.
Línea 53: $mensaje = "El cliente ha sido registrado con éxito.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 54: $tipo_alerta = "success";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 55: $titulo_alerta = "¡Éxito!";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 56: } catch (Exception $e) {
Explicación: Captura y maneja un error producido dentro del bloque `try`.
Línea 57: $conn->rollback();
Explicación: Revierte la transacción cuando ocurre un error.
Línea 58: $mensaje = $e->getMessage();
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 59: $tipo_alerta = "error";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 60: $titulo_alerta = "Error";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 61: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 62: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 63: $mensaje = "Todos los campos obligatorios deben completarse.";
Explicación: Asigna un valor a la variable `$mensaje` para utilizarlo después.
Línea 64: $tipo_alerta = "warning";
Explicación: Asigna un valor a la variable `$tipo_alerta` para utilizarlo después.
Línea 65: $titulo_alerta = "Campos obligatorios";
Explicación: Asigna un valor a la variable `$titulo_alerta` para utilizarlo después.
Línea 66: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 67: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 68: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 69: // RECUPERAR ESTADÍSTICAS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 70: // 1. Total Clientes
Explicación: Comentario: explica el código y no se ejecuta.
Línea 71: $resTotal = $conn->query("SELECT COUNT(*) as total FROM cliente");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 72: $totalClientes = $resTotal ? (int)$resTotal->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 73: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 74: // 2. Clientes Activos (que han hecho compras)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 75: $resActivos = $conn->query("SELECT COUNT(DISTINCT id_Cliente) as total FROM venta WHERE id_Cliente IS NOT NULL AND estado = 'Completada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 76: $clientesActivos = $resActivos ? (int)$resActivos->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 77: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 78: // 3. Nuevos este mes
Explicación: Comentario: explica el código y no se ejecuta.
Línea 79: $resNuevos = $conn->query("SELECT COUNT(*) as total FROM cliente WHERE MONTH(fecha_Registro) = MONTH(CURRENT_DATE()) AND YEAR(fecha_Registro) = YEAR(CURRENT_DATE())");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 80: $nuevosMes = $resNuevos ? (int)$resNuevos->fetch_assoc()['total'] : 0;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 81: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 82: // FILTROS Y BÚSQUEDA
Explicación: Comentario: explica el código y no se ejecuta.
Línea 83: $buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
Explicación: Obtiene de la URL el parámetro `buscar`.
Línea 84: $estadoFiltro = isset($_GET['estado']) ? trim($_GET['estado']) : 'Todos';
Explicación: Obtiene de la URL el parámetro `estado`.
Línea 85: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 86: $whereClauses = [];
Explicación: Asigna un valor a la variable `$whereClauses` para utilizarlo después.
Línea 87: $params = [];
Explicación: Asigna un valor a la variable `$params` para utilizarlo después.
Línea 88: $types = "";
Explicación: Asigna un valor a la variable `$types` para utilizarlo después.
Línea 89: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 90: if ($buscar !== '') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 91: $whereClauses[] = "(nombre LIKE ? OR apellido LIKE ? OR numero_Documento LIKE ?)";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 92: $searchWildcard = "%" . $buscar . "%";
Explicación: Asigna un valor a la variable `$searchWildcard` para utilizarlo después.
Línea 93: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 94: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 95: $params[] = $searchWildcard;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 96: $types .= "sss";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 97: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 98: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 99: if ($estadoFiltro !== 'Todos') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 100: $whereClauses[] = "estado = ?";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 101: $params[] = $estadoFiltro;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 102: $types .= "s";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 103: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 104: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 105: $whereSql = "";
Explicación: Asigna un valor a la variable `$whereSql` para utilizarlo después.
Línea 106: if (!empty($whereClauses)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 107: $whereSql = "WHERE " . implode(" AND ", $whereClauses);
Explicación: Asigna un valor a la variable `$whereSql` para utilizarlo después.
Línea 108: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 109: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 110: // PAGINACIÓN
Explicación: Comentario: explica el código y no se ejecuta.
Línea 111: $limite = 5;
Explicación: Asigna un valor a la variable `$limite` para utilizarlo después.
Línea 112: $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
Explicación: Obtiene de la URL el parámetro `pagina`.
Línea 113: if ($pagina < 1) $pagina = 1;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 114: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 115: $countQuery = "SELECT COUNT(*) as total FROM cliente $whereSql";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 116: $stmtCount = $conn->prepare($countQuery);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 117: if ($stmtCount) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 118: if (!empty($params)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 119: $stmtCount->bind_param($types, ...$params);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 120: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 121: $stmtCount->execute();
Explicación: Ejecuta la consulta preparada.
Línea 122: $totalFiltrados = $stmtCount->get_result()->fetch_assoc()['total'];
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 123: $stmtCount->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 124: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 125: $totalFiltrados = 0;
Explicación: Asigna un valor a la variable `$totalFiltrados` para utilizarlo después.
Línea 126: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 127: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 128: $totalPaginas = ceil($totalFiltrados / $limite);
Explicación: Asigna un valor a la variable `$totalPaginas` para utilizarlo después.
Línea 129: if ($totalPaginas < 1) $totalPaginas = 1;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 130: if ($pagina > $totalPaginas) $pagina = $totalPaginas;
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 131: $offset = ($pagina - 1) * $limite;
Explicación: Asigna un valor a la variable `$offset` para utilizarlo después.
Línea 132: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 133: // CONSULTAR CLIENTES PAGINADOS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 134: $query = "SELECT c.*, u.correo FROM cliente c LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento $whereSql LIMIT ?, ?";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 135: $stmt = $conn->prepare($query);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 136: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 137: $execParams = $params;
Explicación: Asigna un valor a la variable `$execParams` para utilizarlo después.
Línea 138: $execTypes = $types;
Explicación: Asigna un valor a la variable `$execTypes` para utilizarlo después.
Línea 139: $execParams[] = $offset;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 140: $execParams[] = $limite;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 141: $execTypes .= "ii";
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 142: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 143: $clientes = [];
Explicación: Asigna un valor a la variable `$clientes` para utilizarlo después.
Línea 144: if ($stmt) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 145: $stmt->bind_param($execTypes, ...$execParams);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 146: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 147: $resClientes = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 148: while ($row = $resClientes->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 149: $idC = $row['id_Cliente'];
Explicación: Asigna un valor a la variable `$idC` para utilizarlo después.
Línea 150: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 151: // Sumar total gastado
Explicación: Comentario: explica el código y no se ejecuta.
Línea 152: $resV = $conn->query("SELECT COUNT(*) as cant, SUM(total) as gastado FROM venta WHERE id_Cliente = $idC AND estado = 'Completada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 153: $vInfo = $resV ? $resV->fetch_assoc() : ['cant' => 0, 'gastado' => 0.00];
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 154: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 155: $resL = $conn->query("SELECT MAX(fecha_Venta) as ultima FROM venta WHERE id_Cliente = $idC AND estado = 'Completada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 156: $lDate = ($resL && $lRow = $resL->fetch_assoc()) ? $lRow['ultima'] : null;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 157: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 158: $row['compras_cant'] = $vInfo['cant'];
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 159: $row['compras_total'] = $vInfo['gastado'] ?? 0.00;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 160: $row['ultima_compra'] = $lDate ? date('d/m/y', strtotime($lDate)) : 'N/A';
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 161: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 162: $clientes[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 163: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 164: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 165: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 166: ?>
Explicación: Cierra el bloque PHP.
Línea 195: <?php aplicarConfiguracionEstilos(); ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 338: <?php if ($buscar !== '' || $estadoFiltro !== 'Todos'): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 342: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 361: <?php if (count($clientes) > 0): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 362: <?php foreach ($clientes as $c): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 390: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 391: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 397: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 413: <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 416: <?php endfor; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 495: <?php if ($mensaje !== ''): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 502: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
6.2 Vendedor - cliente_detalle.php
Ruta: views/vendedor/cliente_detalle.php
Se explican 120 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Vendedor') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/load_config.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: $id_cliente = isset($_GET['id']) ? (int)$_GET['id'] : 0;
Explicación: Obtiene de la URL el parámetro `id`.
Línea 13: if ($id_cliente <= 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 14: header("Location: clientes.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 15: exit();
Explicación: Detiene la ejecución del archivo.
Línea 16: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 17: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 18: // OBTENER INFORMACIÓN DEL CLIENTE
Explicación: Comentario: explica el código y no se ejecuta.
Línea 19: $resCliente = $conn->query("
Explicación: Asigna un valor a la variable `$resCliente` para utilizarlo después.
Línea 20: SELECT c.*, u.correo, u.telefono
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 21: FROM cliente c
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 22: LEFT JOIN usuarios u ON c.numero_Documento = u.numero_Documento
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 23: WHERE c.id_Cliente = $id_cliente
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 24: ");
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 25: $cliente = $resCliente ? $resCliente->fetch_assoc() : null;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 26: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 27: if (!$cliente) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 28: header("Location: clientes.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 29: exit();
Explicación: Detiene la ejecución del archivo.
Línea 30: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 31: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 32: // CÁLCULO DE MÉTRICAS Y DATOS HISTÓRICOS
Explicación: Comentario: explica el código y no se ejecuta.
Línea 33: // 1. Total Compras
Explicación: Comentario: explica el código y no se ejecuta.
Línea 34: $resV = $conn->query("SELECT COUNT(*) as cant, SUM(total) as gastado FROM venta WHERE id_Cliente = $id_cliente AND estado = 'Completada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 35: $vInfo = $resV ? $resV->fetch_assoc() : ['cant' => 0, 'gastado' => 0.00];
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 36: $totalCompras = $vInfo['gastado'] ?? 0.00;
Explicación: Asigna un valor a la variable `$totalCompras` para utilizarlo después.
Línea 37: $totalComprasCant = $vInfo['cant'];
Explicación: Asigna un valor a la variable `$totalComprasCant` para utilizarlo después.
Línea 38: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 39: // 2. Deuda Total (Suma de saldos pendientes de deudas no pagadas)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 40: $resD = $conn->query("SELECT SUM(saldo_Pendiente) as total_pendiente, COUNT(*) as cant FROM deuda WHERE id_Cliente = $id_cliente AND estado != 'Pagada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 41: $dInfo = $resD ? $resD->fetch_assoc() : ['total_pendiente' => 0.00, 'cant' => 0];
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 42: $deudaTotal = $dInfo['total_pendiente'] ?? 0.00;
Explicación: Asigna un valor a la variable `$deudaTotal` para utilizarlo después.
Línea 43: $deudaTotalCant = $dInfo['cant'];
Explicación: Asigna un valor a la variable `$deudaTotalCant` para utilizarlo después.
Línea 44: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 45: // 3. Última Compra
Explicación: Comentario: explica el código y no se ejecuta.
Línea 46: $resL = $conn->query("SELECT MAX(fecha_Venta) as ultima FROM venta WHERE id_Cliente = $id_cliente AND estado = 'Completada'");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 47: $lDate = ($resL && $lRow = $resL->fetch_assoc()) ? $lRow['ultima'] : null;
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 48: $ultimaCompra = $lDate ? date('d/m/y', strtotime($lDate)) : 'N/A';
Explicación: Asigna un valor a la variable `$ultimaCompra` para utilizarlo después.
Línea 49: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 50: // Obtener deudas registradas
Explicación: Comentario: explica el código y no se ejecuta.
Línea 51: $deudas = [];
Explicación: Asigna un valor a la variable `$deudas` para utilizarlo después.
Línea 52: $resDeudas = $conn->query("SELECT * FROM deuda WHERE id_Cliente = $id_cliente ORDER BY fecha_Registro DESC");
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 53: if ($resDeudas) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 54: while ($row = $resDeudas->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 55: $deudas[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 56: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 57: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 58: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 59: // Obtener lista de deudas pendientes para el dropdown de abono
Explicación: Comentario: explica el código y no se ejecuta.
Línea 60: $deudasPendientes = array_filter($deudas, function($d) {
Explicación: Asigna un valor a la variable `$deudasPendientes` para utilizarlo después.
Línea 61: return $d['estado'] !== 'Pagada';
Explicación: Devuelve un resultado al código que llamó la función y finaliza ese método.
Línea 62: });
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 63: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 64: // Alertas SweetAlert
Explicación: Comentario: explica el código y no se ejecuta.
Línea 65: $alerta_msg = "";
Explicación: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
Línea 66: $alerta_tipo = "";
Explicación: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
Línea 67: $alerta_titulo = "";
Explicación: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
Línea 68: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 69: if (isset($_GET['deuda_success'])) {
Explicación: Obtiene de la URL el parámetro `deuda_success`.
Línea 70: $alerta_msg = "La nueva deuda (fiado) ha sido registrada correctamente.";
Explicación: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
Línea 71: $alerta_tipo = "success";
Explicación: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
Línea 72: $alerta_titulo = "¡Crédito Registrado!";
Explicación: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
Línea 73: } elseif (isset($_GET['deuda_error'])) {
Explicación: Obtiene de la URL el parámetro `deuda_error`.
Línea 74: $alerta_msg = "Error al intentar registrar la deuda en la base de datos.";
Explicación: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
Línea 75: $alerta_tipo = "error";
Explicación: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
Línea 76: $alerta_titulo = "Error";
Explicación: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
Línea 77: } elseif (isset($_GET['deuda_warning'])) {
Explicación: Obtiene de la URL el parámetro `deuda_warning`.
Línea 78: $alerta_msg = "Por favor completa todos los campos del formulario de deuda.";
Explicación: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
Línea 79: $alerta_tipo = "warning";
Explicación: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
Línea 80: $alerta_titulo = "Datos incompletos";
Explicación: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
Línea 81: } elseif (isset($_GET['abono_success'])) {
Explicación: Obtiene de la URL el parámetro `abono_success`.
Línea 82: $alerta_msg = "El abono se ha registrado correctamente y el saldo de la deuda ha sido actualizado.";
Explicación: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
Línea 83: $alerta_tipo = "success";
Explicación: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
Línea 84: $alerta_titulo = "¡Abono Registrado!";
Explicación: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
Línea 85: } elseif (isset($_GET['abono_error'])) {
Explicación: Obtiene de la URL el parámetro `abono_error`.
Línea 86: $alerta_msg = "Error al intentar procesar el abono.";
Explicación: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
Línea 87: $alerta_tipo = "error";
Explicación: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
Línea 88: $alerta_titulo = "Error de Transacción";
Explicación: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
Línea 89: } elseif (isset($_GET['abono_warning'])) {
Explicación: Obtiene de la URL el parámetro `abono_warning`.
Línea 90: $alerta_msg = "Por favor selecciona una deuda y escribe un monto de abono válido.";
Explicación: Asigna un valor a la variable `$alerta_msg` para utilizarlo después.
Línea 91: $alerta_tipo = "warning";
Explicación: Asigna un valor a la variable `$alerta_tipo` para utilizarlo después.
Línea 92: $alerta_titulo = "Datos faltantes";
Explicación: Asigna un valor a la variable `$alerta_titulo` para utilizarlo después.
Línea 93: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 94: ?>
Explicación: Cierra el bloque PHP.
Línea 123: <?php aplicarConfiguracionEstilos(); ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 218: <?php if ($deudaTotal > 0): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 222: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 226: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 312: <?php if (count($deudas) > 0): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 313: <?php foreach ($deudas as $d): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 314: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 315: $badgeClass = "";
Explicación: Asigna un valor a la variable `$badgeClass` para utilizarlo después.
Línea 316: if ($d['estado'] === 'Pagada') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 317: $badgeClass = "pagada";
Explicación: Asigna un valor a la variable `$badgeClass` para utilizarlo después.
Línea 318: } elseif ($d['estado'] === 'Abonada') {
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 319: $badgeClass = "abonada";
Explicación: Asigna un valor a la variable `$badgeClass` para utilizarlo después.
Línea 320: } else {
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 321: $badgeClass = "pendiente";
Explicación: Asigna un valor a la variable `$badgeClass` para utilizarlo después.
Línea 322: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 323: ?>
Explicación: Cierra el bloque PHP.
Línea 340: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 341: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 347: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 360: <?php if (count($deudasPendientes) > 0): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 369: <?php foreach ($deudasPendientes as $dp): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 373: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 392: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 397: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 543: <?php if ($alerta_msg !== ''): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 552: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
7. Cliente - dashboard_cliente.php
Ruta: views/cliente/dashboard_cliente.php
Se explican 134 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección básica de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'Cliente') {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/database.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: $nombreUsuario = $_SESSION['usuario'] ?? 'Cliente';
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 13: $rolUsuario = $_SESSION['rol'] ?? 'Cliente';
Explicación: Lee o guarda `rol` en la sesión para conservarlo entre páginas.
Línea 14: $nombreCompleto = $_SESSION['nombre'] ?? 'Cliente SIVC';
Explicación: Lee o guarda `nombre` en la sesión para conservarlo entre páginas.
Línea 15: $id_Usuario = $_SESSION['id_Usuario'];
Explicación: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
Línea 16: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 17: // 1. Obtener el número de documento de la tabla usuarios
Explicación: Comentario: explica el código y no se ejecuta.
Línea 18: $stmt = $conn->prepare("SELECT numero_Documento FROM usuarios WHERE id_Usuario = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 19: $stmt->bind_param("i", $id_Usuario);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 20: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 21: $res = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 22: $userRow = $res->fetch_assoc();
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 23: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 24: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 25: $documento = $userRow['numero_Documento'] ?? '';
Explicación: Asigna un valor a la variable `$documento` para utilizarlo después.
Línea 26: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 27: // 2. Obtener el id_Cliente de la tabla cliente
Explicación: Comentario: explica el código y no se ejecuta.
Línea 28: $id_Cliente = null;
Explicación: Asigna un valor a la variable `$id_Cliente` para utilizarlo después.
Línea 29: if (!empty($documento)) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 30: $stmt = $conn->prepare("SELECT id_Cliente, nombre, apellido FROM cliente WHERE numero_Documento = ?");
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 31: $stmt->bind_param("s", $documento);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 32: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 33: $res = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 34: $clientRow = $res->fetch_assoc();
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 35: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 36: if ($clientRow) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 37: $id_Cliente = $clientRow['id_Cliente'];
Explicación: Asigna un valor a la variable `$id_Cliente` para utilizarlo después.
Línea 38: $nombreCompleto = $clientRow['nombre'] . ' ' . $clientRow['apellido'];
Explicación: Asigna un valor a la variable `$nombreCompleto` para utilizarlo después.
Línea 39: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 40: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 41: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 42: // Inicializar variables de datos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 43: $compras = [];
Explicación: Asigna un valor a la variable `$compras` para utilizarlo después.
Línea 44: $deudas = [];
Explicación: Asigna un valor a la variable `$deudas` para utilizarlo después.
Línea 45: $abonos = [];
Explicación: Asigna un valor a la variable `$abonos` para utilizarlo después.
Línea 46: $total_compras_realizadas = 0;
Explicación: Asigna un valor a la variable `$total_compras_realizadas` para utilizarlo después.
Línea 47: $total_monto_compras = 0.0;
Explicación: Asigna un valor a la variable `$total_monto_compras` para utilizarlo después.
Línea 48: $total_deuda_pendiente = 0.0;
Explicación: Asigna un valor a la variable `$total_deuda_pendiente` para utilizarlo después.
Línea 49: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 50: if ($id_Cliente) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 51: // 3. Consultar Historial de Compras
Explicación: Comentario: explica el código y no se ejecuta.
Línea 52: $query = "SELECT id_Venta, fecha_Venta, subtotal, descuento, total, metodo_Pago, estado FROM venta WHERE id_Cliente = ? ORDER BY fecha_Venta DESC";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 53: $stmt = $conn->prepare($query);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 54: $stmt->bind_param("i", $id_Cliente);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 55: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 56: $res = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 57: while ($row = $res->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 58: $compras[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 59: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 60: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 61: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 62: // 4. Consultar Total de Deuda
Explicación: Comentario: explica el código y no se ejecuta.
Línea 63: $query = "SELECT id_Deuda, fecha_Registro, valor_Inicial, saldo_Pendiente, estado FROM deuda WHERE id_Cliente = ? ORDER BY fecha_Registro DESC";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 64: $stmt = $conn->prepare($query);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 65: $stmt->bind_param("i", $id_Cliente);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 66: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 67: $res = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 68: while ($row = $res->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 69: $deudas[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 70: if ($row['estado'] !== 'Pagado') {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 71: $total_deuda_pendiente += floatval($row['saldo_Pendiente']);
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 72: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 73: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 74: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 75: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 76: // 5. Historial de Abonos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 77: $query = "SELECT a.fecha_Abono, a.valor_Abonado, d.id_Deuda, d.valor_Inicial
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 78: FROM abono a
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 79: JOIN deuda d ON a.id_Deuda = d.id_Deuda
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 80: WHERE d.id_Cliente = ?
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 81: ORDER BY a.fecha_Abono DESC";
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 82: $stmt = $conn->prepare($query);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 83: $stmt->bind_param("i", $id_Cliente);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 84: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 85: $res = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 86: while ($row = $res->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 87: $abonos[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 88: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 89: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 90: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 91: // 6. Consultas (Estadísticas globales)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 92: $total_compras_realizadas = count($compras);
Explicación: Asigna un valor a la variable `$total_compras_realizadas` para utilizarlo después.
Línea 93: foreach ($compras as $c) {
Explicación: Recorre uno por uno los elementos de un arreglo o resultado.
Línea 94: $total_monto_compras += floatval($c['total']);
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 95: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 96: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 97: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 98: // Determinar la sección activa
Explicación: Comentario: explica el código y no se ejecuta.
Línea 99: $section = $_GET['section'] ?? 'dashboard';
Explicación: Obtiene de la URL el parámetro `section`.
Línea 100: ?>
Explicación: Cierra el bloque PHP.
Línea 205: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 206: if ($section === 'compras') echo "Mis Compras";
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 207: elseif ($section === 'deudas') echo "Mis Deudas";
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 208: elseif ($section === 'consultas') echo "Consultas";
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 209: else echo "Dashboard Cliente";
Explicación: Ejecuta una alternativa cuando la condición anterior es falsa.
Línea 210: ?>
Explicación: Cierra el bloque PHP.
Línea 231: <?php if ($section === 'dashboard'): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 308: <?php if (empty($compras)): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 314: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 315: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 316: $recent_compras = array_slice($compras, 0, 3);
Explicación: Asigna un valor a la variable `$recent_compras` para utilizarlo después.
Línea 317: foreach ($recent_compras as $compra):
Explicación: Recorre uno por uno los elementos de un arreglo o resultado.
Línea 318: ?>
Explicación: Cierra el bloque PHP.
Línea 335: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 336: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 345: <?php elseif ($section === 'compras'): ?>
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 374: <?php if (empty($compras)): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 381: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 382: <?php foreach ($compras as $compra): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 401: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 402: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 411: <?php elseif ($section === 'deudas'): ?>
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 452: <?php if (empty($deudas)): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 458: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 459: <?php foreach ($deudas as $deuda): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 470: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 471: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 492: <?php if (empty($abonos)): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 498: <?php else: ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 499: <?php foreach ($abonos as $abono): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 505: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 506: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 515: <?php elseif ($section === 'consultas'): ?>
Explicación: Evalúa una condición alternativa si la anterior no se cumplió.
Línea 554: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
7. Cliente - comprobante.php
Ruta: views/cliente/comprobante.php
Se explican 73 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Protección básica de acceso
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: if (!isset($_SESSION['usuario'])) {
Explicación: Lee o guarda `usuario` en la sesión para conservarlo entre páginas.
Línea 6: header("Location: ../login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 7: exit();
Explicación: Detiene la ejecución del archivo.
Línea 8: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 9: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 10: require_once __DIR__ . '/../../configuration/database.php';
Explicación: Carga otro archivo necesario, por ejemplo la conexión, configuración o un modelo.
Línea 11: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 12: $id_Venta = isset($_GET['id']) ? intval($_GET['id']) : 0;
Explicación: Obtiene de la URL el parámetro `id`.
Línea 13: if ($id_Venta <= 0) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 14: die("ID de venta inválido.");
Explicación: Detiene la ejecución del archivo.
Línea 15: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 16: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 17: // Obtener datos de la venta y del cliente para validar pertenencia
Explicación: Comentario: explica el código y no se ejecuta.
Línea 18: $query = "SELECT v.fecha_Venta, v.subtotal, v.descuento, v.total, v.metodo_Pago, v.estado,
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 19: c.nombre AS cliente_nombre, c.apellido AS cliente_apellido, c.numero_Documento, c.telefono,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 20: u.numero_Documento AS user_documento, u.id_Rol
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 21: FROM venta v
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 22: JOIN cliente c ON v.id_Cliente = c.id_Cliente
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 23: LEFT JOIN usuarios u ON u.id_Usuario = ?
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 24: WHERE v.id_Venta = ?";
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 25: $stmt = $conn->prepare($query);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 26: $id_Usuario = $_SESSION['id_Usuario'];
Explicación: Lee o guarda `id_Usuario` en la sesión para conservarlo entre páginas.
Línea 27: $stmt->bind_param("ii", $id_Usuario, $id_Venta);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 28: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 29: $res = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 30: $venta = $res->fetch_assoc();
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 31: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 32: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 33: if (!$venta) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 34: die("Comprobante no encontrado.");
Explicación: Detiene la ejecución del archivo.
Línea 35: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 36: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 37: // Validar que el cliente tenga permiso de ver este comprobante:
Explicación: Comentario: explica el código y no se ejecuta.
Línea 38: // Debe ser el propio cliente (su numero_Documento en usuarios coincide con el del cliente) o ser Admin/Vendedor (id_Rol 1 o 2).
Explicación: Comentario: explica el código y no se ejecuta.
Línea 39: if ($venta['id_Rol'] == '3' && $venta['user_documento'] !== $venta['numero_Documento']) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 40: die("Acceso denegado: No tiene permisos para visualizar este comprobante.");
Explicación: Detiene la ejecución del archivo.
Línea 41: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 42: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 43: // Obtener detalles de productos
Explicación: Comentario: explica el código y no se ejecuta.
Línea 44: $detalles = [];
Explicación: Asigna un valor a la variable `$detalles` para utilizarlo después.
Línea 45: $query = "SELECT d.cantidad, d.precio_Unitario, d.subtotal, p.nombre AS producto_nombre, p.codigo_Producto
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 46: FROM detalle_venta d
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 47: JOIN producto p ON d.id_Producto = p.id_Producto
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 48: WHERE d.id_Venta = ?";
Explicación: Completa la consulta SQL indicando tablas, relaciones, filtros, agrupación u orden.
Línea 49: $stmt = $conn->prepare($query);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 50: $stmt->bind_param("i", $id_Venta);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 51: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 52: $res = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 53: while ($row = $res->fetch_assoc()) {
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 54: $detalles[] = $row;
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 55: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 56: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 57: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 58: // Obtener datos del comprobante (número y fecha de generación si existe)
Explicación: Comentario: explica el código y no se ejecuta.
Línea 59: $query = "SELECT numero_Comprobante, fecha_Generacion FROM comprobante_venta WHERE id_Venta = ?";
Explicación: Forma parte de una consulta `SELECT`, utilizada para obtener datos de la base de datos.
Línea 60: $stmt = $conn->prepare($query);
Explicación: Prepara una consulta SQL para ejecutarla de forma controlada y segura.
Línea 61: $stmt->bind_param("i", $id_Venta);
Explicación: Asocia variables PHP con los parámetros `?` de una consulta preparada.
Línea 62: $stmt->execute();
Explicación: Ejecuta la consulta preparada.
Línea 63: $res = $stmt->get_result();
Explicación: Obtiene el resultado devuelto por la consulta SQL.
Línea 64: $comprobante = $res->fetch_assoc();
Explicación: Obtiene una fila del resultado como arreglo asociativo.
Línea 65: $stmt->close();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 66: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 67: $nroComprobante = $comprobante['numero_Comprobante'] ?? sprintf("FAC-%06d", $id_Venta);
Explicación: Asigna un valor a la variable `$nroComprobante` para utilizarlo después.
Línea 68: $fechaEmision = $comprobante['fecha_Generacion'] ?? $venta['fecha_Venta'];
Explicación: Asigna un valor a la variable `$fechaEmision` para utilizarlo después.
Línea 69: ?>
Explicación: Cierra el bloque PHP.
Línea 306: <?php foreach ($detalles as $det): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 316: <?php endforeach; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 325: <?php if ($venta['descuento'] > 0): ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 330: <?php endif; ?>
Explicación: Completa la estructura o lógica del bloque al que pertenece.
 
8. Cierre de sesión - logout.php
Ruta: controllers/logout.php
Se explican 27 líneas de lógica PHP.
Línea 1: <?php
Explicación: Abre el bloque PHP que será ejecutado por el servidor.
Línea 2: session_start();
Explicación: Inicia o recupera la sesión para conservar los datos del usuario conectado.
Línea 3: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 4: // Destruir todas las variables de sesión
Explicación: Comentario: explica el código y no se ejecuta.
Línea 5: $_SESSION = array();
Explicación: Trabaja con información de la sesión.
Línea 6: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 7: // Si se desea destruir la cookie de sesión, también se puede borrar
Explicación: Comentario: explica el código y no se ejecuta.
Línea 8: if (ini_get("session.use_cookies")) {
Explicación: Evalúa una condición; el bloque se ejecuta únicamente si resulta verdadera.
Línea 9: $params = session_get_cookie_params();
Explicación: Asigna un valor a la variable `$params` para utilizarlo después.
Línea 10: setcookie(
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 11: session_name(),
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 12: '',
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 13: time() - 42000,
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 14: $params["path"],
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 15: $params["domain"],
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 16: $params["secure"],
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 17: $params["httponly"]
Explicación: Completa la estructura o lógica del bloque al que pertenece.
Línea 18: );
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 19: }
Explicación: Abre o cierra el bloque de instrucciones actual.
Línea 20: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 21: // Destruir la sesión por completo
Explicación: Comentario: explica el código y no se ejecuta.
Línea 22: session_destroy();
Explicación: Completa una instrucción PHP dentro de la lógica actual.
Línea 23: ⟨línea vacía⟩
Explicación: Separa visualmente bloques de código.
Línea 24: // Redireccionar a la vista de login
Explicación: Comentario: explica el código y no se ejecuta.
Línea 25: header("Location: ../views/login.php");
Explicación: Redirige al usuario o envía una cabecera HTTP.
Línea 26: exit();
Explicación: Detiene la ejecución del archivo.
Línea 27: ?>
Explicación: Cierra el bloque PHP.
 
9. Resumen del funcionamiento
Registro: register.php → register_controller.php → usuario_model.php → base de datos → login.php.
Login: login.php → login_controler.php → usuario_model.php → base de datos → validación de contraseña, estado y rol → dashboard correspondiente.
Administrador: gestiona inventario, ventas, comprobantes, clientes, vendedores, reportes y configuración desde sus archivos PHP.
Vendedor: las vistas utilizan vendedor_controller.php y vendedor_model.php para registrar ventas, deudas, abonos y consultar información.
Cliente: consulta desde sus archivos sus compras, deudas, abonos y comprobantes.
SIVC utiliza una estructura parecida a MVC. Sin embargo, algunas vistas contienen consultas y lógica PHP directamente, por lo que no es un MVC completamente separado.