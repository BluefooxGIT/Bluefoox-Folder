<?php
include_once( '../bf-php/bf-conexion.php' );

if ( isset( $_GET[ 'e' ] ) ) {
  if ( $_GET[ 'e' ] == 's' ) {
    $uid_archivo = $_GET[ 'u' ];
    $sql_registros = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE uid = '$uid_archivo'" );
    $row_registros = mysqli_fetch_array( $sql_registros );

    if ( isset( $row_registros ) ) {
      $archivos_url = $row_registros[ 'archivos_url' ];
      $archivos_nombre = $row_registros[ 'archivos_nombre' ];
      $url_archivo = '../' . $archivos_url . '/' . $archivos_nombre;
      if ( is_file( $url_archivo ) ) {
        unlink( $url_archivo );
        mysqli_query( $mysqli, "DELETE FROM bluefoox_archivos WHERE uid = '$uid_archivo' " );
      }
    }
  }
} else {
  foreach ( $_POST[ 'checkbox-eliminar' ] as $uid_registros ) {
    $sql_registros = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE uid = '$uid_registros'" );
    $row_registros = mysqli_fetch_array( $sql_registros );

    if ( isset( $row_registros ) ) {
      $archivos_url = $row_registros[ 'archivos_url' ];
      $archivos_nombre = $row_registros[ 'archivos_nombre' ];
      $url_archivo = '../' . $archivos_url . '/' . $archivos_nombre;
      if ( is_file( $url_archivo ) ) {
        unlink( $url_archivo );
        mysqli_query( $mysqli, "DELETE FROM bluefoox_archivos WHERE uid = '$uid_registros' " );
      }
    }
  }
}
if ( isset( $_SERVER[ "HTTP_REFERER" ] ) ) {
  header( "Location: " . $_SERVER[ "HTTP_REFERER" ] );
}
?>