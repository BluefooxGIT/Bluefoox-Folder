<?php
include_once( '../bf-php/bf-conexion.php' );
$uid = $_POST[ 'input-id-renombrar' ];
$archivos_nombre_temp = $_POST[ 'nombre-nuevo-archivo' ];
$archivos_tipo = $_POST[ 'input-tipo-renombrar' ];
$sql_registros = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE uid = '$uid'" );
$row_registros = mysqli_fetch_array( $sql_registros );
$archivos_url = $row_registros[ 'archivos_url' ];
$archivos_nombre = $row_registros[ 'archivos_nombre' ];
$archivos_extension = $row_registros[ 'archivos_extension' ];
if ( $archivos_tipo == 'c' ) {
  $archivos_nombre_nuevo_lista = $archivos_url . '/' . $archivos_nombre_temp;
  $archivos_nombre_nuevo = $archivos_nombre_temp;
  $direccion_actual_nombre = '../' . $archivos_url . '/' . $archivos_nombre;
  $direccion_nuevo_nombre = '../' . $archivos_url . '/' . $archivos_nombre_nuevo;
  $archivos_url_temp = $archivos_url . '/' . $archivos_nombre;
  rename( $direccion_actual_nombre, $direccion_nuevo_nombre );
  mysqli_query( $mysqli, "UPDATE bluefoox_archivos SET archivos_url = '$archivos_nombre_nuevo_lista' WHERE archivos_url = '$archivos_url_temp'" );
  mysqli_query( $mysqli, "UPDATE bluefoox_archivos SET archivos_nombre = '$archivos_nombre_nuevo' WHERE uid = '$uid'" );
} else if ( $archivos_tipo == 'a' ) {
  $archivos_nombre_nuevo = $archivos_nombre_temp . '.' . $archivos_extension;
  $direccion_actual_nombre = '../' . $archivos_url . '/' . $archivos_nombre;
  $direccion_nuevo_nombre = '../' . $archivos_url . '/' . $archivos_nombre_nuevo;
  rename( '../' . $archivos_url . '/' . $archivos_nombre, '../' . $archivos_url . '/' . $archivos_nombre_nuevo );
  mysqli_query( $mysqli, "UPDATE bluefoox_archivos SET archivos_nombre = '$archivos_nombre_nuevo' WHERE uid = '$uid'" );
}
if ( isset( $_SERVER[ "HTTP_REFERER" ] ) ) {
  header( "Location: " . $_SERVER[ "HTTP_REFERER" ] );
}
?>