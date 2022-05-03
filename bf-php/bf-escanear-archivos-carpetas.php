<?php
include_once( '../bf-php/bf-conexion.php' );
$archivos_url = $_POST[ 'archivos_url' ];
$archivos_usuario = $_POST[ 'archivos_usuario' ];
$directorio_escaneo = '../' . $archivos_url;

if ( is_dir( $directorio_escaneo ) ) {
  foreach ( scandir( $directorio_escaneo ) as $archivo_escaneo ) {
    //FECHA ESPAÑOL
    $nombre_dia = array( "domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado" );
    $nombre_mes = array( "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre" );
    $fecha_espanol = $nombre_dia[ date( 'w' ) ] . " " . date( 'd' ) . " de " . $nombre_mes[ date( 'n' ) - 1 ] . " del " . date( 'Y' ) . ", " . date( 'h' ) . ":" . date( 'i' ) . ":" . date( 's' ) . date( 'a' );
    if ( !( $archivo_escaneo == '.' ) ) {
      if ( !( $archivo_escaneo == '..' ) ) {
        if ( !pathinfo( $archivo_escaneo, PATHINFO_EXTENSION ) ) {
          $archivos_url = $archivos_url;
          $archivos_nombre = $archivo_escaneo;
          $archivos_tipo = 'c';
          $archivos_modificacion = $fecha_espanol;
          $archivos_usuario = $archivos_usuario;
          $sql_directorio = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_url = '$archivos_url' AND archivos_nombre = '$archivos_nombre'" );
          $row_directorio = mysqli_fetch_array( $sql_directorio );
          if ( !isset( $row_directorio ) ) {
            mysqli_query( $mysqli, "INSERT INTO bluefoox_archivos (archivos_url, archivos_nombre, archivos_tipo, archivos_modificacion, archivos_usuario) VALUES ('$archivos_url', '$archivos_nombre', '$archivos_tipo', '$archivos_modificacion', '$archivos_usuario')" );
          }
        } else if ( pathinfo( $archivo_escaneo, PATHINFO_EXTENSION ) ) {
          $archivos_url = $archivos_url;
          $archivos_nombre = $archivo_escaneo;
          $pathinfo = $archivo_escaneo;
          $archivos_extension = strtolower( pathinfo( $pathinfo, PATHINFO_EXTENSION ) );
          $archivos_tipo = 'a';
          $archivos_modificacion = $fecha_espanol;
          $archivos_usuario = $archivos_usuario;
          $sql_filtro = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_url = '$archivos_url' AND archivos_nombre = '$archivos_nombre'" );
          $row_filtro = mysqli_fetch_array( $sql_filtro );
          if ( !isset( $row_filtro ) ) {
            mysqli_query( $mysqli, "INSERT INTO bluefoox_archivos (archivos_url, archivos_nombre, archivos_extension, archivos_tipo, archivos_modificacion, archivos_usuario) VALUES ('$archivos_url', '$archivos_nombre', '$archivos_extension', '$archivos_tipo', '$archivos_modificacion', '$archivos_usuario')" );
          }
        }
      }
    }
  }
}

//ARCHIVO
$sql_filtro_existencia_archivo = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_tipo = 'a'" );
$row_filtro_existencia_archivo = mysqli_fetch_array( $sql_filtro_existencia_archivo );
if ( isset( $row_filtro_existencia_archivo ) ) {
  do {
    $archivos_uid_existencia_archivo = $row_filtro_existencia_archivo[ 'uid' ];
    $archivos_url_existencia_archivo = $row_filtro_existencia_archivo[ 'archivos_url' ];
    $archivos_nombre_existencia_archivo = $row_filtro_existencia_archivo[ 'archivos_nombre' ];
    $archivo_existencia_archivo = '../' . $archivos_url_existencia_archivo . '/' . $archivos_nombre_existencia_archivo;
    if ( !is_file( $archivo_existencia_archivo ) ) {
      mysqli_query( $mysqli, "DELETE FROM bluefoox_archivos WHERE uid = '$archivos_uid_existencia_archivo' " );
    }
  }
  while ( $row_filtro_existencia_archivo = mysqli_fetch_assoc( $sql_filtro_existencia_archivo ) );
}

//CARPETA
$sql_filtro_existencia_carpeta = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_tipo = 'c'" );
$row_filtro_existencia_carpeta = mysqli_fetch_array( $sql_filtro_existencia_carpeta );
if ( isset( $row_filtro_existencia_carpeta ) ) {
  do {
    $archivos_uid_existencia_carpeta = $row_filtro_existencia_carpeta[ 'uid' ];
    $archivos_url_existencia_carpeta = $row_filtro_existencia_carpeta[ 'archivos_url' ];
    $archivos_nombre_existencia_carpeta = $row_filtro_existencia_carpeta[ 'archivos_nombre' ];
    $archivo_existencia_carpeta = '../' . $archivos_url_existencia_carpeta . '/' . $archivos_nombre_existencia_carpeta;
    if ( !is_dir( $archivo_existencia_carpeta ) ) {
      mysqli_query( $mysqli, "DELETE FROM bluefoox_archivos WHERE uid = '$archivos_uid_existencia_carpeta' " );
    }
  }
  while ( $row_filtro_existencia_carpeta = mysqli_fetch_assoc( $sql_filtro_existencia_carpeta ) );
}
?>