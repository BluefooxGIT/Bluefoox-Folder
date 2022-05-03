<?php
include_once( '../bf-php/bf-conexion.php' );
$usuarios_usuario = $_POST[ 'usuarios_usuario' ];
$usuarios_contrasena = $_POST[ 'usuarios_contrasena' ];
//FILTRO DE USUARIO
$sql_acceso = $mysqli->query( "SELECT * FROM bluefoox_usuarios WHERE usuarios_usuario = '$usuarios_usuario'" );
$row_acceso = mysqli_fetch_array( $sql_acceso );
//CARPETA PRINCIPAL
$hash_contrasena_acceso = $row_acceso[ 'usuarios_contrasena' ];
$sql_root = $mysqli->query( "SELECT * FROM bluefoox_configuracion WHERE uid = '1'" );
$row_root = mysqli_fetch_array( $sql_root );
$directorio_root_temp = $row_root[ 'configuracion_carpeta_root' ];
$directorio_root = urlencode( base64_encode( $directorio_root_temp ) );
//COMPROBACIÓN DE ACCESO
if ( password_verify( $usuarios_contrasena, $hash_contrasena_acceso ) ) {
  session_start();
  $_SESSION[ 'usuarios_id' ] = $row_acceso[ 'usuarios_id' ];
  $_SESSION[ 'usuarios_nivel' ] = $row_acceso[ 'usuarios_nivel' ];
  header( "Location: ../?r=$directorio_root" );
  die();
} else {
  session_start();
  $_SESSION = array();
  session_destroy();
  header( "Location: ../" );
  die();
}
?>
