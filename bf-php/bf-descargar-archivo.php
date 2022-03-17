<?php
include_once( '../bf-php/bf-conexion.php' );
if ( isset( $_GET[ 'u' ] ) ) {
  $uid = $_GET[ 'u' ];
  $sql_registros = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE uid = '$uid'" );
  $row_registros = mysqli_fetch_array( $sql_registros );
  $archivos_url = $row_registros[ 'archivos_url' ];
  $archivos_nombre = $row_registros[ 'archivos_nombre' ];
  $direccion_actual = '../' . $archivos_url . '/' . $archivos_nombre;
  if ( file_exists( $direccion_actual ) ) {
    header( 'Content-Description: File Transfer' );
    header( 'Content-Type: application/octet-stream' );
    header( "Cache-Control: no-cache, must-revalidate" );
    header( "Expires: 0" );
    header( 'Content-Disposition: attachment; filename="' . basename( $direccion_actual ) . '"' );
    header( 'Content-Length: ' . filesize( $direccion_actual ) );
    header( 'Pragma: public' );
    flush();
    readfile( $direccion_actual );
    die();
  }
}
?>