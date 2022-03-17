<?php
include_once( '../bf-php/bf-conexion.php' );
$uid = $_SESSION[ 'usuarios_id' ];
$sql_usuario = $mysqli->query( "SELECT * FROM bluefoox_usuarios WHERE usuarios_id = '$uid'" );
$row_usuario = mysqli_fetch_array( $sql_usuario );
//ACTIVAR PLATAFORMA
$usuarios_id = $_POST[ 'usuarios_id' ];
$usuarios_usuario = $_POST[ 'usuarios_usuario' ];
$usuarios_contrasena_temp = $_POST[ 'usuarios_contrasena' ];
$usuarios_contrasena = password_hash( $usuarios_contrasena_temp, PASSWORD_DEFAULT );
if ( $usuarios_contrasena_temp == '' && $usuarios_contrasena == '' ) {
  mysqli_query( $mysqli, "UPDATE bluefoox_usuarios SET usuarios_usuario = '$usuarios_usuario' WHERE usuarios_id = '$usuarios_id'" );

} else {
  mysqli_query( $mysqli, "UPDATE bluefoox_usuarios SET usuarios_usuario = '$usuarios_usuario', usuarios_contrasena = '$usuarios_contrasena' WHERE usuarios_id = '$usuarios_id'" );
}
if ( isset( $_SERVER[ "HTTP_REFERER" ] ) ) {
  header( "Location: " . $_SERVER[ "HTTP_REFERER" ] );
}
?>
