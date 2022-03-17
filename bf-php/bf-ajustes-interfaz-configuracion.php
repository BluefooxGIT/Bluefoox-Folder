<?php
include_once( '../bf-php/bf-conexion.php' );
//ACTIVAR PLATAFORMA
$configuracion_interfaz_color_primario = $_POST[ 'configuracion_interfaz_color_primario' ];
mysqli_query( $mysqli, "UPDATE bluefoox_configuracion SET configuracion_interfaz_color_primario = '$configuracion_interfaz_color_primario' WHERE uid = '1'" );
if ( isset( $_SERVER[ "HTTP_REFERER" ] ) ) {
  header( "Location: " . $_SERVER[ "HTTP_REFERER" ] );
}
?>
