<?php
include_once( 'bf-php/bf-conexion.php' );
$sql_configuracion = $mysqli->query( "SELECT * FROM bluefoox_configuracion WHERE uid = '1'" );
$row_configuracion = mysqli_fetch_array( $sql_configuracion );
?>
<style>
@charset "utf-8";
@font-face {
	font-family: "Roboto-Regular";
	src: url("/bf-archivos/bf-fuente/Roboto-Regular.ttf");
}
@font-face {
	font-family: "Roboto-Bold";
	src: url("/bf-archivos/bf-fuente/Roboto-Bold.ttf");
}
body {
	margin: 0px;
	padding: 0px;
	background-color: #f2f2f2;
	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}
body .ui-tooltip {
	border-width: 2px;
}
a {
	cursor: pointer;
}
span {
	box-sizing: border-box;
}
input {
	font-family: "Roboto-Regular";
	border: 2px solid #f2f2f2;
	outline: none !important;
	box-sizing: border-box;
}
#id-div-contenedor-subherramientas-buscar-archivos {
	position: relative;
	top: -9px;
	margin: -12px 0px 12px 0px;
}
#id-div-contenedor-subherramientas-subir-archivos {
	margin: -3px 0px 21px 0px;
}
::-webkit-scrollbar {
width: 9px;
}
::-webkit-scrollbar-track {
background: #f1f1f1;
border-radius: 10px;
}
::-webkit-scrollbar-thumb {
background: #888;
border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
background: #555;
}
.ui-progressbar {
	background-color: inherit !important;
}
.ui-corner-all {
	background-color: inherit !important;
}
.ui-widget {
	background-color: inherit !important;
}
.ui-widget-content {
	background-color: inherit !important;
	box-shadow: inherit;
	border-radius: inherit;
}
.div-contenedor-progressbar {
	border-radius: 30px;
	padding: 3px;
	background-color: transparent;
border: 2px solid <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	width: 100%;
}
.progress {
	display: none;
	width: 100%;
	background-color: transparent;
	font-family: "Roboto-Bold";
}
.ui-progressbar-value {
	font-size: 0.90em;
background-color: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> !important;
	color: #ffffff;
	padding: 3px 0px;
	border-radius: 30px;
	margin: 0px 0px;
	display: block;
	text-align: center;
}
.hr-separador {
	width: 100%;
	border: 0;
	height: 0;
	border-top: 1px solid rgba(0, 0, 0, 0.1);
	border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}
.th-tipo {
	width: 6%;
}
.ui-tooltip {
	padding: 8px;
	position: absolute;
	z-index: 9999;
	max-width: 300px;
	-webkit-box-shadow: 0 0 5px #aaa;
	box-shadow: 0 0 5px #aaa;
}
/*LABEL*/
.label-titulos-ajuste {
	font-size: 0.9em;
	font-family: "Roboto-Regular";
	display: block;
	margin: 9px 0px;
}
.label-nombre-columna {
	font-size: 0.90em;
	display: inline-table;
}
/*IMG*/
.img-vista-previa-landscape {
	width: 90%;
	cursor: default;
}
.img-vista-previa-portrait {
	width: auto;
	max-height: 500px;
	cursor: default;
}
/*LI*/
.li-breadcrumb-activo {
	width: 10px;
}
.li-breadcrumb {
	font-family: "Roboto-Bold";
	width: auto;
	display: inline-block;
}
/*A*/
.a-subherramienta {
	text-decoration: none;
color: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
.a-subherramienta {
	text-decoration: none;
}
.a-eliminar {
	font-family: "Roboto-Bold";
}
.a-archivo {
	font-family: "Roboto-Regular";
	text-decoration: none;
	color: #000000;
}
.a-archivo:hover {
	font-family: "Roboto-Bold";
}
.a-breadcrumb {
	padding: 6px 12px;
	border-radius: 30px;
	background-color: #f2f2f2;
	overflow: hidden;
	white-space: nowrap;
	text-overflow: ellipsis;
	width: 10px;
	border: 2px solid #f2f2f2;
}
.a-breadcrumb:hover {
	text-decoration: none !important;
border: 2px <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid;
	color: #000000 !important;
}
.a-breadcrumb:active {
border: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid 2px;
}
/*SPAN*/
.span-input-files {
color: <?php echo $row_configuracion['configuracion_interfaz_color_secundario'];
?>;
}
.span-titulo-ajuste {
	font-family: "Roboto-Bold";
	font-size: 0.90em;
	position: relative;
	top: -6px;
}
.span-titulo-vista-previa {
	cursor: pointer;
}
.span-resultados {
	position: relative;
	top: -4px;
	left: 6px;
}
.span-submenu {
	position: relative;
	top: -3px;
	font-family: "Roboto-Bold";
}
.span-verificacion-nombre {
	font-size: 0.90em;
	font-family: "Roboto-Regular";
	padding: 3px 12px;
	background-color: #ebd334;
	border-radius: 30px;
	display: none;
	margin-bottom: 12px;
}
.span-verificacion {
	font-size: 0.90em;
	font-family: "Roboto-Regular";
	padding: 3px 12px;
	background-color: #ebd334;
	border-radius: 6px;
	display: none;
	position: relative;
	top: 15px;
}
.span-archivo-informacion {
	display: inline-table;
	padding: 0px 0px 9px 0px;
	font-size: 0.90em;
}
.span-archivo-nombre {
	display: block;
	font-family: "Roboto-Bold";
	font-size: 1em;
	padding: 3px 0px 6px 0px;
	max-width: 100%;
}
.span-alerta-cancelar {
	cursor: pointer;
	padding: 12px 12px;
	border-radius: 30px;
	font-family: "Roboto-Regular";
	font-size: 0.90em;
	display: inline-table;
	background-color: #f2f2f2;
	color: #000000;
	text-align: center;
	margin: 6px auto;
	width: 100%;
	border: 2px solid #f2f2f2;
	transition: all .3s ease;
}
.span-alerta-cancelar:hover {
border: 2px <?php echo $row_configuracion['configuracion_interfaz_color_secundario'];
?> solid;
background-color: <?php echo $row_configuracion['configuracion_interfaz_color_secundario'];
?>;
	color: #FFFFFF;
}
.span-texto-alerta {
	font-size: 0.90em;
	font-family: "Roboto-Regular";
	display: block;
	margin-bottom: 21px;
}
.span-titulo-alerta {
	font-size: 1.3em;
	font-family: "Roboto-Bold";
	display: block;
	margin-bottom: 9px;
}
.span-carpeta-vacia {
	display: block;
}
.span-titulo-herramienta {
	position: relative;
	top: -5px;
	font-family: "Roboto-Bold";
}
/*INPUT*/
.input-color-ajustes {
	height: 1px;
	width: 1px;
}
.input-ajustes-fix {
	padding: 12px 6px 12px 6px;
	border-radius: 30px;
	border: 2px solid #f2f2f2;
	background-color: #f2f2f2;
	font-family: "Roboto-Regular";
	font-size: 0.90em;
	display: block;
	outline: none;
	width: 312px;
	margin: 9px 0px 3px 0px;
	transition: all .3s ease;
}
.input-ajustes-fix:hover {
border: 2px <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid;
}
.input-ajustes {
	padding: 12px 12px 12px 12px;
	border-radius: 30px;
	border: 2px solid #f2f2f2;
	background-color: #f2f2f2;
	font-family: "Roboto-Regular";
	font-size: 0.90em;
	display: block;
	outline: none;
	width: 312px;
	margin: 0px 0px 3px 0px;
	transition: all .3s ease;
}
.input-ajustes:hover {
border: 2px <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid;
}
.input-icono-texto {
}
.input-subherramienta-interfaz-boton-fix-cancelar {
	padding: 12px 18px;
	border-radius: 30px;
	font-family: "Roboto-Regular";
	font-size: 0.90em;
	display: inline-table;
background-color: <?php echo $row_configuracion['configuracion_interfaz_color_secundario'];
?>;;
	color: #ffffff;
	text-align: center;
	margin: 9px auto 0px auto;
	border: 2px solid transparent;
}
.input-subherramienta-interfaz-boton-fix-cancelar:hover {
	cursor: pointer;
	background-color: #333333;
	color: #ffffff;
	border: 2px solid transparent;
}
.input-subherramienta-interfaz-boton-fix {
	padding: 12px 18px;
	border-radius: 30px;
	font-family: "Roboto-Regular";
	font-size: 0.90em;
	display: inline-table;
background-color: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	color: #ffffff;
	text-align: center;
	margin: 9px auto 0px auto;
	border: 2px solid transparent;
	position: relative;/**right: 12px;**/
}
.input-subherramienta-interfaz-boton-fix:hover {
	cursor: pointer;
background-color: <?php echo $row_configuracion['configuracion_interfaz_color_secundario'];
?>;
	color: #ffffff;
	border: 2px solid transparent;
}
.input-subherramienta-interfaz-boton {
	padding: 12px 12px;
	border-radius: 30px;
	font-family: "Roboto-Regular";
	font-size: 0.90em;
	display: inline-table;
background-color: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	color: #ffffff;
	text-align: center;
	margin: 9px auto 0px auto;
	border: 2px solid transparent;
	width: 100%;
	caret-color: transparent;
	box-sizing: border-box;
}
.input-subherramienta-interfaz-boton:hover {
	cursor: pointer;
background-color: <?php echo $row_configuracion['configuracion_interfaz_color_secundario'];
?>;
	color: #ffffff;
	border: 2px solid transparent;
}
.input-subharremienta-renombrar {
	padding: 12px 12px 12px 12px;
	border-radius: 30px;
	font-family: "Roboto-Regular";
	font-size: 0.90em;
	display: inline-table;
	outline: none;
	width: 100%;
	margin: 0px 0px 12px 0px;
	border: 1px solid #f2f2f2;
	background-color: #f2f2f2;
	transition: all .3s ease;
}
.input-subharremienta-renombrar:focus {
border: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid 2px;
}
.input-subharremienta-interfaz-fix {
	padding: 12px 12px 12px 12px;
	border-radius: 30px;
	border: 1px solid #f2f2f2;
	background-color: #f2f2f2;
	font-family: "Roboto-Regular";
	font-size: 0.90em;
	display: inline-table;
	outline: none;
	width: 312px;
	transition: all .3s ease;
}
.input-subharremienta-interfaz-fix:focus {
border: 2px <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid;
}
.input-subharremienta-interfaz-fix:hover {
border: 2px <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid;
}
.input-subharremienta-interfaz {
	padding: 12px 6px 12px 33px;
	border-radius: 30px;
	border: 2px solid #f2f2f2;
	background-color: #f2f2f2;
	font-family: "Roboto-Regular";
	font-size: 0.90em;
	display: inline-table;
	outline: none;
	width: 312px;
	margin: 0px 0px 3px 0px;
	transition: all .3s ease;
}
.input-subharremienta-interfaz:focus {
border: 2px <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid;
}
.input-subharremienta-interfaz:hover {
border: 2px <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid;
}
.pdf-vista-previa {
	width: 100%;
	height: 500px;
}
.video-vista-previa {
	width: 100%;
}
.audio-vista-previa {
	min-width: 200px;
}
/*DIV*/
.div-texto-acceso {
	display: block;
	font-family: "Roboto-Regular";
	font-size: 0.90em;
	margin: 12px 0px;
	cursor: pointer;
}
.div-texto-acceso:hover {
	font-family: "Roboto-Bold";
}
.div-actualizacion {
	display: block;
	font-family: "Roboto-Bold";
	font-size: 0.90em;
}
.div-actualizacion:hover {
	cursor: pointer;
}
.div-usuario-ajuste {
	display: block;
	position: relative;
	top: 9px;
}
.div-contenido-ajuste {
	position: relative;
	top: -15px;
	margin: 0px 0px 30px 0px;
}
.div-subherramientas-interfaz {
	margin: -12px 0px 21px 0px;
}
.div-lista-archivos {
	position: relative;
	top: -30px;
}
.div-separador-cabezal {
	position: relative;
	top: -15px;
	margin: 18px 0px;
}
.div-separador-breadcrumb {
	position: relative;
	top: -39px;
	margin: 18px 0px;
}
.div-texto-ellipsis-breadcrumb {
	font-family: "Roboto-Bold";
	position: relative;
	float: left;
	max-width: 300px;
}
.div-texto-ellipsis-carpetas-fix {
	width: 69% !important;
	position: relative;
	top: 3px;
	left: -9px;
	display: inline-block;
}
.div-texto-ellipsis-carpetas {
	width: 69% !important;
	position: relative;
	top: 1px;
	display: inline-block;
}
.div-submenu-archivos {
	display: none;
}
.div-archivo-detalles {
	padding: 18px 0px 0px 0px;
	border-bottom: 1px solid #ddd;
}
.div-nombre-orden {
	font-family: "Roboto-Regular";
	display: inline-block;
	margin: 0px 0px 0px 10px;
	position: relative;
	top: -6px;
}
.div-nombre-orden-busqueda {
	font-family: "Roboto-Regular";
	display: inline-block;
	margin: 0px 0px 0px 9px;
	position: relative;
	top: -6px;
}
.div-tipo-orden {
	font-family: "Roboto-Regular";
	display: inline-block;
	margin: 0px 0px 0px 40px;
	position: relative;
	top: -6px;
}
.div-tipo-orden-busqueda {
	font-family: "Roboto-Regular";
	display: inline-block;
	margin: 0px 0px 0px 0px;
	position: relative;
	top: -6px;
}
.div-subherramientas-archivos {
	float: right;
	display: none;
	position: relative;
	top: 9px;
}
.div-archivo {
	margin: 0px 0px 0px 0px;
	display: inline-block;
}
.div-icono-archivo {
	margin: 0px 0px 0px 0px;
	display: inline-block;
}
.div-checkbox-eliminar {
	margin: 0px 0px 0px 0px;
	display: inline-block;
}
.div-resultados-busqueda {
	margin: 32px 0px 0px 0px;
}
.div-texto-ellipsis {
	display: inline-block;
	width: 100%;
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
	position: relative;
	top: -6px;
}
.div-carpetas-fix {
	padding: 9px 0px 0px 0px;
	position: relative;
	left: -3px;
	margin: 0px 0px 21px 0px;
}
.div-carpetas {
	display: inline-block;
	padding: 6px 0px 12px 9px;
	text-align: left;
	width: 90%;
	max-width: 90%;
	border-bottom: 1px solid #ddd;
	position: relative;
	left: -12px;
}
.div-carpetas:hover {
	cursor: pointer;
	font-family: "Roboto-Bold";
}
.div-contenedor-lista-carpetas {
	text-align: left;
	width: 100%;
}
.div-navegador {
border: 0px solid <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	font-family: "Roboto-Regular";
	font-size: 0.90em;
	display: block;
	outline: none;
	margin: 0px auto 15px auto;
	width: 96%;
	padding: 9px;
	overflow-y: auto;
	overflow-x: hidden;
	max-height: 480px;
}
.div-carga-contenedor {
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translate(-50%, -50%);
	background-color: transparent;
	min-width: 300px;
}
.div-carga {
	position: fixed;
	top: 0px;
	left: 0px;
	width: 100%;
	height: 100%;
	z-index: 10000;
	background-color: rgba(255, 255, 255, 0.60);
	display: none;
	backdrop-filter: blur(3px);
}
.div-contenedor-descripcion {
	display: block;
	cursor: default;
}
.div-vista-previa-cabezal {
	text-align: right;
	display: block;
	cursor: default;
	position: relative;
	margin: 0px 0px 12px 0px;
}
.div-vista-previa-video {
	display: inline-table;
	width: 40%;
}
.div-titulo-archivo {
	font-family: "Roboto-Regular";
	font-size: 0.90em;
	padding: 15px 0px;
	background-color: transparent;
	border-radius: 30px;
	max-width: 500px;
}
.div-titulo-archivo:hover {
	font-family: "Roboto-Bold";
}
.div-contenedor-descripcion-portrait {
	position: relative;
}
.div-contenedor-descripcion-landscape {
	position: relative;
}
.div-contenido-archivos {
	text-align: center;
	width: 100%;
}
.div-vista-previa-contenedor {
	font-family: "Roboto-Regular";
	background-color: #ffffff;
	border-radius: 6px;
	padding: 12px;
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translate(-50%, -50%);
	border: 2px solid transparent;
	-webkit-box-shadow: 0px 1px 6px 0px rgba(0, 0, 0, 0.39);
	box-shadow: 0px 1px 6px 0px rgba(0, 0, 0, 0.39);
	width: auto;
	max-width: 90%;
}
.div-alerta-contendor {
	font-family: "Roboto-Regular";
	background-color: #ffffff;
	border-radius: 6px;
	padding: 15px;
}
.div-alerta {
	border-radius: 6px;
	position: fixed;
	left: 50%;
	top: 50%;
	transform: translate(-50%, -50%);
	-webkit-box-shadow: 0px 1px 6px 0px rgba(0, 0, 0, 0.39);
	box-shadow: 0px 1px 6px 0px rgba(0, 0, 0, 0.39);
	text-align: center;
}
.div-carpeta-vacia {
	font-family: "Roboto-Regular";
	font-size: 0.90em;
	margin: 0px auto;
	text-align: center;
}
.div-vista-previa {
	width: 100%;
}
.div-resultados {
	font-family: "Roboto-Bold";
	font-size: 0.90em;
	position: relative;
	margin: 30px 0px 15px 0px;
}
.div-breadcrumb {
	font-family: "Roboto-Regular";
}
.div-contenedor-herramientas {
	margin: 6px 0px;
	position: relative;
	top: -15px;
}
.div-contenedor-subherramientas {
	margin: 9px 0px 18px 0px;
}
.div-herramienta-interfaz {
	padding: 6px 12px 3px 12px;
	border-radius: 30px;
	background-color: #f2f2f2;
	font-family: "Roboto-Regular";
	font-size: 0.86em;
	width: 121px;
	display: inline-table;
	margin-right: 3px;
	border: 2px solid #f2f2f2;
	transition: all .3s ease;
}
.div-herramienta-interfaz:hover {
border: 2px solid <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	cursor: pointer;
}
.div-herramienta-interfaz:active {
border: 2px <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid;
}
.div-contenedor-principal {
	width: 96%;
	padding: 12px;
	background-color: #ffffff;
	border-radius: 6px;
	margin: 12px auto 18px auto;
}
.div-oculto {
	display: none;
}
.div-svg-orden {
	display: inline-table;
	cursor: pointer;
	border-radius: 30px;
	background-color: #f2f2f2;
	border: 2px solid #f2f2f2;
	width: 21px;
	height: 18px;
}
.div-svg-orden:hover {
border: 2px <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid;
}
.div-carpetas-regresar {
	display: inline-table;
	border-radius: 30px;
	background-color: #f2f2f2;
	border: #f2f2f2 solid 2px;
	margin: 0px 3px;
	padding: 6px 0px 3px 6px;
	position: relative;
	float: left;
	top: -9px;
}
.div-carpetas-regresar:hover {
	cursor: pointer;
}
.div-carpetas-regresar:active {
border: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid 2px;
}
.div-herramientas-archivos {
	display: inline-table;
	border-radius: 30px;
	background-color: #f2f2f2;
	border: #f2f2f2 solid 2px;
	margin: 0px 3px;
	padding: 6px;
	transition: all .3s ease;
}
.div-herramientas-archivos:hover {
border: 2px <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid;
	cursor: pointer;
}
.div-herramientas-archivos:active {
border: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid 2px;
}
.div-submenu-boton {
	background-color: #f2f2f2;
	padding: 8px 12px 4px 12px;
	cursor: pointer;
	font-family: "Roboto-Bold";
	transition: all .3s ease;
	user-select: none;
	border-radius: 30px;
	margin: 0px 0px 6px 0px;
	display: inline-block;
	border: 2px solid #f2f2f2;
}
.div-submenu-boton:hover {
	background-color: #f2f2f2;
border: 2px solid <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
.div-submenu-boton:active {
border: 2px <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid;
}
.div-submenu {
	position: relative;
	font-size: 0.90em;
	float: right;
	top: -89px;
	right: 38px;
}
.div-submenu-main {
	float: right;
	position: relative;
	top: 0px;
	cursor: pointer;
	border-radius: 100%;
	background-color: #f2f2f2;
	border: #f2f2f2 solid 2px;
	width: 30px;
	height: 30px;
	text-align: center;
	padding: 0px 0px 0px 0px;
	transition: all .3s ease;
}
.div-submenu-main:hover {
border: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid 2px;
}
.div-submenu-main:active {
border: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid 2px;
}
.div-alerta-archivo {
	font-size: 0.90em;
	font-family: "Roboto-Regular";
	display: none;
}
/*PNG*/
.png-icono-archivo-lista {
	width: 36px;
	height: auto;
	margin: 0px auto;
	display: inline-block;
	position: relative;
	top: 6px;
	left: -12px;
}
.png-icono-archivo {
	width: 36px;
	height: auto;
	margin: 0px auto;
}
/*SVG*/
.svg-input-fix {
	position: relative;
	left: -300px;
	top: 3px;
	width: 15px;
	height: auto;
fill: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
.svg-input {
	width: 15px;
	height: auto;
fill: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
.svg-logo {
	width: 180px;
	padding: 12px 0px 12px 0px;
	fill: #8c8c8c;
}
.svg-submenu-main {
	width: 21px;
	height: auto;
fill: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	position: relative;
	top: 5px;
}
.svg-submenu-archivos {
	width: 21px;
	height: auto;
fill: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	position: relative;
	top: 5px;
}
.svg-herramientas-archivos {
	width: 18px;
	height: auto;
	padding: 6px 6px 0px 6px;
fill: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
.svg-submenu {
	width: 15px;
	height: auto;
fill: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
.svg-oculto {
	display: none;
}
.svg-orden {
	width: 18px;
	height: auto;
fill: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	position: relative;
	left: 1px;
	top: 1px;
}
.svg-icono-descripcion {
	width: 21px;
fill: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	display: inline-table;
	margin: 0px 6px 0px 0px;
	position: relative;
	top: 3px;
}
.svg-cerrar-vista-previa {
	display: inline-table;
	width: 23px;
	cursor: pointer;
fill: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
.svg-mover-vista-previa {
	display: inline-table;
	width: 23px;
	cursor: grab;
	margin: 0px 12px;
}
.svg-mover-vista-previa:active {
	cursor: grabbing;
}
.svg-carpeta-vacia {
	width: 60px;
	height: auto;
fill: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
.svg-iconos-herramientas-lista-carpetas {
	width: 21px;
fill: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	display: inline-table;
	float: right;
	position: relative;
	top: 12px;
}
.svg-iconos-herramientas-lista {
	width: 21px;
fill: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	display: inline-block;
	margin: 0px 9px 0px 0px;
}
.svg-iconos-herramientas {
	width: 21px;
fill: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	display: inline-table;
}
/*TABLE*/
.td-herramientas-archivos {
	width: 290px;
	text-align: right;
	cursor: default;
}
.table-lista-archivos {
	font-family: "Roboto-Regular";
	border-collapse: collapse;
}
.table-lista-archivos th, td {
	text-align: left;
	border-bottom: 1px solid #ddd;
}
.tr-hover:hover {
}
/*CHECKBOX*/
.label-checkbox-eliminar-oculto {
	visibility: hidden;
	margin: 0px 12px 0px 0px;
}
.label-checkbox-eliminar-fix {
	top: -6px;
}
.label-checkbox-eliminar {
	display: block;
	position: relative;
	padding-left: 35px;
	margin-bottom: 24px;
	cursor: pointer;
	font-size: 22px;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}
.label-checkbox-eliminar input {
	position: absolute;
	opacity: 0;
	cursor: pointer;
	height: 0;
	width: 0;
}
.span-checkmark-eliminar {
	position: absolute;
	top: 0;
	left: 0;
	height: 18px;
	width: 18px;
	background-color: #ffffff;
	border-radius: 30px;
border: 1px solid <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
.label-checkbox-eliminar:hover input ~ .span-checkmark-eliminar {
	cursor: pointer;
	background-color: #ffffff;
}
.label-checkbox-eliminar input:checked ~ .span-checkmark-eliminar {
background-color: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
.span-checkmark-eliminar:after {
	content: "";
	position: absolute;
	display: none;
}
.label-checkbox-eliminar input:checked ~ .span-checkmark-eliminar:after {
	display: block;
}
.label-checkbox-eliminar .span-checkmark-eliminar:after {
	left: 6px;
	top: 4px;
	width: 3px;
	height: 6px;
	border: solid white;
	border-width: 0 3px 3px 0;
	-webkit-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	transform: rotate(45deg);
}
/*INPUT FILE*/
.input-archivo {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}
.input-archivo + label {
	font-family: "Roboto-Regular";
	width: 324px;
	font-size: 0.90em;
	text-overflow: ellipsis;
	white-space: nowrap;
	cursor: pointer;
	display: inline-block;
	overflow: hidden;
}
.input-archivo + label svg {
	width: 15px;
	height: auto;
	vertical-align: middle;
}
.input-archivo-llave + label {
color: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	border: 2px solid #f2f2f2;
	background-color: #f2f2f2;
	border-radius: 30px;
	padding: 12px 18px 12px 9px;
	transition: all .3s ease;
	width: 91.6%;
border: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid 2px;
}
.input-archivo-llave:focus + label {
border: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid 2px;
}
.input-archivo-llave:focus + label, .input-archivo-llave.has-focus + label, .input-archivo-llave + label:hover {
color: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	cursor: pointer;
border: 2px solid <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
.input-archivo-contador + label {
color: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	border: 2px solid #f2f2f2;
	background-color: #f2f2f2;
	border-radius: 30px;
	padding: 12px 18px 12px 9px;
	transition: all .3s ease;
}
.input-archivo-contador:focus + label {
border: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?> solid 2px;
}
.input-archivo-contador:focus + label, .input-archivo-contador.has-focus + label, .input-archivo-contador + label:hover {
color: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	cursor: pointer;
border: 2px solid <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
/* Style the list */
ul.breadcrumb {
	list-style: none;
	position: relative;
	top: -40px;
	left: -9px;
}
/* Display list items side by side */
ul.breadcrumb li {
	display: inline-block;
	font-size: 0.90em;
}
/* Add a slash symbol (/) before/behind each list item */
ul.breadcrumb li + li:before {
	padding: 8px;
	color: black;
	content: "\203A";
}
/* Add a color to all links inside the list */
ul.breadcrumb li a {
color: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	text-decoration: none;
}
/* Add a color on mouse-over */
ul.breadcrumb li a:hover {
	cursor: pointer;
	color: #01447e;
	text-decoration: underline;
}
/* Grow */
.hvr-grow {
	display: inline-block;
	vertical-align: middle;
	-webkit-transform: perspective(1px) translateZ(0);
	transform: perspective(1px) translateZ(0);
	box-shadow: 0 0 1px rgba(0, 0, 0, 0);
	-webkit-transition-duration: 0.3s;
	transition-duration: 0.3s;
	-webkit-transition-property: transform;
	transition-property: transform;
}
.hvr-grow:hover, .hvr-grow:focus, .hvr-grow:active {
	-webkit-transform: scale(1.3);
	transform: scale(1.3);
}
.custom-menu {
	display: none;
	z-index: 1000;
	position: absolute;
	overflow: hidden;
	border: 1px solid #CCC;
	white-space: nowrap;
	font-family: sans-serif;
	background: #FFF;
	color: #333;
	border-radius: 5px;
	padding: 0;
}
/* Each of the items in the list */
.custom-menu li {
	padding: 8px 12px;
	cursor: pointer;
	list-style-type: none;
	transition: all .3s ease;
	user-select: none;
	font-family: "Roboto-Regular";
	font-size: 0.90em;
}
.custom-menu li:hover {
	background-color: #DEF;
}
.div-espacio-disco {
	font-family: "Roboto-Bold";
	font-size: 0.70em;
	width: 97%;
	margin: 0 auto;
	display: flex;
	border-radius: 18px;
	overflow: hidden;
	margin-top: 18px;
}
.div-espacio-disco section {
	height: 100%;
	line-height: 100%;
	text-align: center;
	padding: 3px 0px;
}
.div-espacio-disco section:last-of-type {
	flex: auto;
}
.disco_espacio_usado {
background: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
	color: #ffffff;
}
.disco_espacio_libre {
	background: #ffffff;
color: <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
/* Forward */
.hvr-forward {
	vertical-align: middle;
	-webkit-transform: perspective(1px) translateZ(0);
	transform: perspective(1px) translateZ(0);
	-webkit-transition-duration: 0.3s;
	transition-duration: 0.3s;
	-webkit-transition-property: transform;
	transition-property: transform;
}
.hvr-forward:hover, .hvr-forward:focus, .hvr-forward:active {
	-webkit-transform: translateX(8px);
	transform: translateX(8px);
}
.tt-regresar {
	position: relative;
	top: 9px;
	display: block;
	width: 100%;
	padding: 0px 0px 12px 0px;
}
.t-regresar {
	white-space: nowrap;
	position: relative;
	overflow: hidden;
	text-overflow: ellipsis;
	display: block;
	width: 100%;
	top: 9px;
	padding: 0px 0px 12px 0px;
}
.tt {
	position: relative;
	display: block;
	width: 100%;
}
.t {
	white-space: nowrap;
	position: relative;
	overflow: hidden;
	text-overflow: ellipsis;
	display: block;
	width: 100%;
	top: 3px;
}
.s {
	display: inline-block;
	width: 100%;
}
.t:hover, .s:hover {
	width: auto;
}
.s:hover .t {
	animation: scroll 12s;
}
.f {
	position: relative;
	top: -6px;
	width: 100%;
	overflow: hidden;
}
@keyframes scroll {
0% {
left: 0px;
}
100% {
left: -100%;
}
}
.color-picker {
	cursor: pointer;
	position: relative;
	width: 100px;
	height: 30px;
	display: block;
}
.color-code {
	position: absolute;
	top: 0;
	left: 0;
	background: #fff;
	width: 70px;
	height: 30px;
	line-height: 30px;
	text-align: center;
	font-family: "Roboto-Regular";
	font-size: 0.90em;
}
.color {
	position: absolute;
	top: 0;
	right: 0;
	width: 30px;
	height: 30px;
	border-radius: 100%;
}

@media only screen and (max-width: 460px) {
.div-carga-contenedor {
	min-width: 80%;
	max-width: 80%;
}
.div-contenedor-herramientas {
	top: -9px;
}
.div-alerta-contendor {
	max-height: 510px;
}
#id-nuevo-nombre-aceptar {
	width: 86% !important;
}
#id-span-mueve {
	width: 86% !important;
}
#id-span-copia {
	width: 86% !important;
}
.input-subherramienta-interfaz-boton-fix-cancelar {
	width: 100% !important;
}
.input-subherramienta-interfaz-boton-fix {
	width: 100% !important;
}
.input-subherramienta-interfaz-boton {
	width: 100% !important;
}
.div-espacio-disco {
	width: 92% !important;
	font-size: 0.60em !important;
}
.div-contenedor-principal {
	width: 86% !important;
}
.div-submenu {
	font-size: 0.80em;
	position: relative;
	left: -9px !important;
	top: -24px !important;
}
.input-subharremienta-interfaz {
	width: 87% !important;
}
.input-subharremienta-renombrar {
	width: 89%;
}
.input-archivo + label {
	width: 90.6% !important;
}
.div-submenu-main {
	position: relative;
	top: 9px;
	left: -3px;
}
}

@media only screen and (max-width: 920px) {
.svg-input-fix {
	left: 12px;
	top: -33px;
}
.svg-logo {
	width: 180px;
}
.input-archivo + label {
	width: 94%;
}
.input-subharremienta-renombrar {
	width: 87%;
}
.div-navegador {
	overflow-y: auto;
	overflow-x: hidden;
	max-height: 180px;
}
#id-alerta-cancelar {
	width: 86%;
}
.span-alerta-cancelar {
	width: 86%;
}
.div-texto-ellipsis-breadcrumb {
	max-width: 180px;
}
.div-carpetas-regresar {
	left: -6px;
}
.div-breadcrumb {
	margin: 0px 0px -15px 0px;
}
#id-nuevo-nombre-aceptar {
	width: 86% !important;
}
#id-span-mueve {
	width: 86% !important;
}
#id-span-copia {
	width: 86% !important;
}
.div-submenu-archivos {
	float: right;
	display: inline-table;
	position: relative;
	top: 3px;
	right: -3px;
	border-radius: 30px !important;
	padding: 9px;
	width: 30px;
	height: 30px;
}
.svg-submenu-main {
	position: relative;
	left: 0px;
}
.svg-submenu-archivos {
	position: relative;
	left: 3px;
}
.svg-orden {
	left: 6px;
	top: 6px;
}
.div-svg-orden {
	width: 30px;
	height: 30px;
}
#id-div-contenedor-subherramientas-buscar-archivos {
	margin: 18px 0px 12px 0px;
}
#id-div-contenedor-subherramientas-subir-archivos {
	margin: 23px 0px 21px 0px;
}
.input-subherramienta-interfaz-boton {
	width: 86% !important;
	border-radius: 30px;
}
.input-subherramienta-interfaz-boton-fix {
	width: 99%;
	border-radius: 30px;
	margin: 6px 0px 0px 0px;
}
input {
	font-family: "Roboto-Regular";
	border-radius: 30px;
	border: 2px solid #f2f2f2;
}
.div-contenido-archivos {
	width: 100% !important;
}
.audio-vista-previa {
	width: 100% !important;
}
.div-espacio-disco {
	margin: 9px auto 9px auto;
}
ul.breadcrumb li {
	display: inline-block;
	font-size: 0.90em;
	margin: 18px 0px 0px 0px;
	position: relative;
	top: -18px;
}
input {
	-webkit-appearance: none;
}
.div-herramienta-interfaz {
	width: 30px;
	height: 43px;
	border-radius: 30px;
}
.div-archivo-detalles:hover {
	background-color: transparent;
}
.svg-iconos-responsivos {
	width: 30px !important;
	position: relative;
	top: 5px;
}
.th-tipo {
	width: 9%;
}
.div-contenedor-principal {
	width: 93%;
	margin: 0px auto 18px auto;
}
.div-introduccion-configuracion {
	width: 90%;
	margin: 0px auto;
}
.span-checkmark-eliminar {
	display: none;
}
.div-checkbox-eliminar {
	display: none;
}
.div-checkbox-general-eliminar {
	display: none;
}
.div-tipo-orden {
	margin: 0px 0px 0px 0px;
}
.svg-herramientas-archivos {
	width: 21px;
	padding: 12px 7px 0px 7px;
	margin: 0px 0px 0px 3px;
	position: relative;
	top: -4px;
}
.div-herramientas-archivos {
	display: inline-block;
	padding: 0px 0px 0px 0px;
}
.div-subherramientas-archivos {
	position: relative;
	top: -9px;
	float: inherit;
	text-align: left;
	margin: 12px 0px;
}
.ui-tooltip {
	display: none !important;
}
.div-vista-previa-contenedor {
	transform: translate(-53%, -50%) !important;
	width: 76%;
	height: auto;
	position: fixed;
	max-width: inherit;
}
.svg-mover-vista-previa {
	display: none;
}
.span-archivo-nombre {
	font-size: 1em;
}
#id-svg-alto {
	display: none !important;
}
#id-svg-ancho {
	display: none !important;
}
.div-alerta {
	width: 80% !important;
}
.div-texto-ellipsis-carpetas {
	width: 69% !important;
	position: relative;
	top: -3px;
	display: inline-block;
}
.img-vista-previa-portrait {
	width: 100%;
	cursor: default;
}
.span-titulo-herramienta {
	display: none;
}
.div-submenu {
	font-size: 0.70em !important;
	position: relative;
	left: -41px;
	top: -83px;
}
.div-submenu-main {
	position: relative;
	top: 6px;
	left: -3px;
}
.div-submenu-boton {
	position: relative;
	margin: 0px auto;
	z-index: 2;
	padding: 8px 9px 4px 9px;
}
.input-subharremienta-interfaz {
	width: 92%;
}
.div-navegador {
	max-height: 330px;
}
#id-div-vista-previa-contenedor {
	position: relative;
	left: inherit;
	top: inherit;
	transform: none;
}
.div-titulo-archivo {
	width: 230px;
	position: relative;
	top: -3px;
}
.div-subherramientas-interfaz {
	position: relative;
	top: -15px;
}
.div-separador-herramientas-responsivo {
	position: relative;
	top: -15px;
	margin: 18px 0px;
}
.div-subherramientas-interfaz {
	position: relative;
	margin: 24px 0px 10px 0px;
}
}
</style>
