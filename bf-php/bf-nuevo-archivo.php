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
//SUBIR ARCHIVOS
$uploads_dir = '../' . $input_url_completa;
foreach ( $_FILES[ "input-archivos" ][ "error" ] as $key => $error ) {
  if ( $error == UPLOAD_ERR_OK ) {
    $tmp_name = $_FILES[ "input-archivos" ][ "tmp_name" ][ $key ];
    $name = basename( $_FILES[ "input-archivos" ][ "name" ][ $key ] );
    $pathinfo = $_FILES[ "input-archivos" ][ "name" ][ $key ];
    $archivos_url = $input_url_completa;
    $archivos_nombre = pathinfo( $pathinfo, PATHINFO_BASENAME );
    $archivos_extension = strtolower( pathinfo( $pathinfo, PATHINFO_EXTENSION ) );
    $archivos_tipo = 'a';
    $archivos_modificacion = $fecha_espanol;
    $archivos_usuario = $input_uid_usuario;
    $sql_filtro_duplicado = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_url = '$archivos_url' AND archivos_nombre = '$archivos_nombre'" );
    $row_filtro_duplicado = mysqli_fetch_array( $sql_filtro_duplicado );
    if ( !isset( $row_filtro_duplicado ) ) {
      move_uploaded_file( $tmp_name, "$uploads_dir/$name" );
      $archivo_almacenado = $uploads_dir . '/' . $name;
      if ( is_file( $archivo_almacenado ) ) {
        mysqli_query( $mysqli, "INSERT INTO bluefoox_archivos (archivos_url, archivos_nombre, archivos_extension, archivos_tipo, archivos_modificacion, archivos_usuario) VALUES ('$archivos_url', '$archivos_nombre', '$archivos_extension', '$archivos_tipo', '$archivos_modificacion', '$archivos_usuario')" );
      }
    } else if ( isset( $row_filtro_duplicado ) ) {
      $hora_filtro = date( 'his' );
      move_uploaded_file( $tmp_name, "$uploads_dir/$hora_filtro-$name" );
      $name_filtro = $hora_filtro . '-' . $name;
      $archivo_almacenado = $uploads_dir . '/' . $name_filtro;
      if ( is_file( $archivo_almacenado ) ) {
        $archivos_nombre_temp = $name_filtro;
        mysqli_query( $mysqli, "INSERT INTO bluefoox_archivos (archivos_url, archivos_nombre, archivos_extension, archivos_tipo, archivos_modificacion, archivos_usuario) VALUES ('$archivos_url', '$archivos_nombre_temp', '$archivos_extension', '$archivos_tipo', '$archivos_modificacion', '$archivos_usuario')" );
      }
    }
  }
}
header( "Location: $header" );
?>
