<?php
include_once( '../bf-php/bf-conexion.php' );
//ACTIVAR PLATAFORMA
$configuracion_uid = '1';
$configuracion_activo = '1';
mysqli_query( $mysqli, "UPDATE bluefoox_configuracion SET configuracion_activo = '$configuracion_activo' WHERE uid = '$configuracion_uid'" );
//CREAR USUARIO ROOT
$usuarios_id = date( 'dmyhis' );
$usuarios_usuario = $_POST[ 'usuarios_usuario' ];
$usuarios_contrasena_temp = $_POST[ 'usuarios_contrasena' ];
$usuarios_contrasena = password_hash( $usuarios_contrasena_temp, PASSWORD_DEFAULT );
$usuarios_estatus = '1';
$usuarios_nivel = '1';
mysqli_query( $mysqli, "INSERT INTO bluefoox_usuarios (usuarios_id, usuarios_usuario, usuarios_contrasena, usuarios_estatus, usuarios_nivel) VALUES ('$usuarios_id', '$usuarios_usuario', '$usuarios_contrasena', '$usuarios_estatus', '$usuarios_nivel')" );
header( 'Location: ../' );
die();
?>
