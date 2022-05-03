<?php
include_once( '../bf-php/bf-conexion.php' );
$uid_carpeta = $_POST[ 'uid-carpeta' ];
$retorno_carpeta = $_POST[ 'retorno-carpeta' ];
$input_dominio = $_POST[ 'input-dominio' ];
$header = $input_dominio . urlencode( base64_encode( $retorno_carpeta ) );
$sql_registros = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE uid = '$uid_carpeta'" );
$row_registros = mysqli_fetch_array( $sql_registros );
$archivos_url = $row_registros[ 'archivos_url' ];
$archivos_nombre = $row_registros[ 'archivos_nombre' ];
$url_carpeta = '../' . $archivos_url . '/' . $archivos_nombre;
if ( is_dir( $url_carpeta ) ) {
  rmdir( $url_carpeta );
  mysqli_query( $mysqli, "DELETE FROM bluefoox_archivos WHERE uid = '$uid_carpeta'" );
}
header( "Location: $header" );
?>