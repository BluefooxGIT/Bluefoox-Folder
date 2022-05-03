<?php
include_once( '../bf-php/bf-conexion.php' );
session_start();
$uid = $_SESSION[ 'usuarios_id' ];
$sql_usuario = $mysqli->query( "SELECT * FROM bluefoox_usuarios WHERE usuarios_id = '$uid'" );
$row_usuario = mysqli_fetch_array( $sql_usuario );
$usuarios_usuario = $row_usuario[ 'usuarios_usuario' ];
$usuarios_contrasena = $row_usuario[ 'usuarios_contrasena' ];
$llave_usuario = base64_encode( '/U/' . base64_encode( $usuarios_usuario ) . '/C/' . base64_encode( $usuarios_contrasena ) );
$llave_archivo_key = fopen( '../bf-key/' . $usuarios_usuario . '.key', 'w' );
fwrite( $llave_archivo_key, $llave_usuario );
fclose( $llave_archivo_key );
$key_archivo = '../bf-key/' . $usuarios_usuario . '.key';
if ( file_exists( $key_archivo ) ) {
  header( 'Content-Description: File Transfer' );
  header( 'Content-Type: application/octet-stream' );
  header( "Cache-Control: no-cache, must-revalidate" );
  header( "Expires: 0" );
  header( 'Content-Disposition: attachment; filename="' . basename( $key_archivo ) . '"' );
  header( 'Content-Length: ' . filesize( $key_archivo ) );
  header( 'Pragma: public' );
  flush();
  readfile( $key_archivo );
  unlink( $key_archivo );
}
die();
?>
