<?php
include_once( '../bf-php/bf-conexion.php' );
$configuracion_orden = $row_configuracion[ 'configuracion_orden' ];
$configuracion_orden_tipo = $row_configuracion[ 'configuracion_orden_tipo' ];
$input_orden = $_POST[ 'input-orden' ];
if ( $input_orden == 'archivos' ) {
  if ( $configuracion_orden == 'ASC' ) {
    mysqli_query( $mysqli, "UPDATE bluefoox_configuracion SET configuracion_orden = 'DESC' WHERE uid = '1'" );
  } else if ( $configuracion_orden == 'DESC' ) {
    mysqli_query( $mysqli, "UPDATE bluefoox_configuracion SET configuracion_orden = 'ASC' WHERE uid = '1'" );
  }
} else if ( $input_orden == 'tipo' ) {
  if ( $configuracion_orden_tipo == 'ASC' ) {
    mysqli_query( $mysqli, "UPDATE bluefoox_configuracion SET configuracion_orden_tipo = 'DESC' WHERE uid = '1'" );
  } else if ( $configuracion_orden_tipo == 'DESC' ) {
    mysqli_query( $mysqli, "UPDATE bluefoox_configuracion SET configuracion_orden_tipo = 'ASC' WHERE uid = '1'" );
  }
}
if ( isset( $_SERVER[ "HTTP_REFERER" ] ) ) {
  header( "Location: " . $_SERVER[ "HTTP_REFERER" ] );
}
?>