<?php
include_once( '../bf-php/bf-conexion.php' );
$llave_acceso = $_FILES[ 'input_llave_acceso' ][ 'tmp_name' ];
$llave_acceso_temp = fopen( $llave_acceso, 'r' );
$llave_acceso_temp = fopen( $llave_acceso, 'r' );
while ( $llave_codigo = fgets( $llave_acceso_temp ) ) {
  $llave_codigo_encode = $llave_codigo;
}
$llave_usuario = $llave_codigo_encode;
$llave_usuario_lectura = base64_decode( $llave_usuario );
$llave_contrasena_temp = substr( $llave_usuario_lectura, strpos( $llave_usuario_lectura, '/C/' ) );
$llave_contrasena_str = str_replace( '/C/', '', $llave_contrasena_temp );
$llave_contrasena_decode = base64_decode( $llave_contrasena_str );
$llave_usuario_str = str_replace( '/C/' . $llave_contrasena_str, '', $llave_usuario_lectura );
$llave_usuario_final = str_replace( '/U/', '', $llave_usuario_str );
$llave_usuario_decode = base64_decode( $llave_usuario_final );
$usuarios_usuario_llave = $llave_usuario_decode;
$usuarios_contrasena_llave = $llave_contrasena_decode;
//FILTRO DE USUARIO
$sql_acceso = $mysqli->query( "SELECT * FROM bluefoox_usuarios WHERE usuarios_usuario = '$usuarios_usuario_llave'" );
$row_acceso = mysqli_fetch_array( $sql_acceso );
//CARPETA PRINCIPAL
$hash_contrasena_acceso = $row_acceso[ 'usuarios_contrasena' ];
$sql_root = $mysqli->query( "SELECT * FROM bluefoox_configuracion WHERE uid = '1'" );
$row_root = mysqli_fetch_array( $sql_root );
$directorio_root_temp = $row_root[ 'configuracion_carpeta_root' ];
$directorio_root = urlencode( base64_encode( $directorio_root_temp ) );
//COMPROBACIÓN DE ACCESO
if ( $usuarios_contrasena_llave == $hash_contrasena_acceso ) {
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