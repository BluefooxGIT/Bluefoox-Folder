<?php
//CONEXIÓN A LA BASE DE DATOS
$bf_host = 'localhost';
$bf_usuario = 'bluefoox';
$bf_contrasena = 'bluefoox';
$bf_basedatos = 'bluefoox_documentos';
$mysqli = new mysqli( $bf_host, $bf_usuario, $bf_contrasena, $bf_basedatos );
$mysqli->set_charset( "utf8" );
//error_reporting( E_ERROR | E_WARNING | E_PARSE );
date_default_timezone_set( 'America/Mexico_City' );
set_time_limit( 0 );
//CONFIGURACIÓN
$sql_configuracion = $mysqli->query( "SELECT * FROM bluefoox_configuracion WHERE uid = '1'" );
$row_configuracion = mysqli_fetch_array( $sql_configuracion );
$configuracion_activo = $row_configuracion[ 'configuracion_activo' ];
$configuracion_carpeta_root = $row_configuracion[ 'configuracion_carpeta_root' ];
if ( $configuracion_activo == '0' ) {
  $configuracion_inicial = '1';
} else {
  $configuracion_inicial = '0';
}
?>
