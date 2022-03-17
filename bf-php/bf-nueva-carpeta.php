<?php
include_once( '../bf-php/bf-conexion.php' );
//DIRECTORIO ROOT
$sql_root = $mysqli->query( "SELECT * FROM bluefoox_configuracion WHERE uid = '1'" );
$row_root = mysqli_fetch_array( $sql_root );
$directorio_root = $row_root[ 'configuracion_carpeta_root' ];
$input_url_completa = $_POST[ 'input-url-completa' ];
$nueva_carpeta = $_POST[ 'nombre-nueva-carpeta' ];
$input_uid_usuario = $_POST[ 'input-uid-usuario' ];
$input_dominio = $_POST[ 'input-dominio' ];
$header = $input_dominio . urlencode( base64_encode( $input_url_completa ) );
//DIRECTORIO RAÍZ
if ( $input_url_completa == '' ) {
  $directorio_raiz = $directorio_root;
} else if ( $nueva_carpeta != '' ) {
  $directorio_raiz = $input_url_completa;
}
//FECHA ESPAÑOL
$nombre_dia = array( "domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado" );
$nombre_mes = array( "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre" );
$fecha_espanol = $nombre_dia[ date( 'w' ) ] . " " . date( 'd' ) . " de " . $nombre_mes[ date( 'n' ) - 1 ] . " del " . date( 'Y' ) . ", " . date( 'h' ) . ":" . date( 'i' ) . ":" . date( 's' ) . date( 'a' );
if ( !file_exists( $directorio_raiz . '/' . $nueva_carpeta ) ) {
  $archivos_url = $directorio_raiz;
  $archivos_nombre = $nueva_carpeta;
  $archivos_tipo = 'c';
  $archivos_modificacion = $fecha_espanol;
  $archivos_usuario = $input_uid_usuario;
  mysqli_query( $mysqli, "INSERT INTO bluefoox_archivos (archivos_url, archivos_nombre, archivos_tipo, archivos_modificacion, archivos_usuario) VALUES ('$archivos_url', '$archivos_nombre', '$archivos_tipo', '$archivos_modificacion', '$archivos_usuario')" );
  mkdir( '../' . $directorio_raiz . '/' . $nueva_carpeta, 0777, true );
}
header( "Location: $header" );
?>