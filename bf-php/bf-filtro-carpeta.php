<?php
include_once( '../bf-php/bf-conexion.php' );
$nombre_carpeta = $_POST[ 'nombre_carpeta' ];
$direccion_carpetas = $_POST[ 'direccion_carpetas' ];
if ( $nombre_carpeta != null ) {
  $sql_filtro_carpeta = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_url = '$direccion_carpetas' AND archivos_nombre = '$nombre_carpeta' AND archivos_tipo = 'c'" );
  $row_filtro_carpeta = mysqli_fetch_array( $sql_filtro_carpeta );

  if ( isset( $row_filtro_carpeta ) ) {
    echo '<script>$("#id-boton-crear").hide(); $("#id-span-verificacion").show(); $("#id-span-verificacion").text("Este nombre ya existe"); var nombre_carpeta = $("#id-nombre-nueva-carpeta").val(); $("#id-nombre-nueva-carpeta").attr("placeholder", nombre_carpeta); $("#id-nombre-nueva-carpeta").val("");</script>';
  } else if ( !isset( $row_filtro_carpeta ) ) {
    $direccion_carpeta = '../' . $direccion_carpetas . '/' . $nombre_carpeta;
    if ( is_dir( $direccion_carpeta ) ) {
      echo '<script>$("#id-boton-crear").hide(); $("#id-span-verificacion").show(); $("#id-span-verificacion").text("Este nombre está en uso, haz clic en el botón de Escanear para visualizar la carpeta");</script>';
    } else if ( !is_dir( $direccion_carpeta ) ) {
      echo '<script>$("#id-boton-crear").show(); $("#id-span-verificacion").hide();</script>';
    }
  }
} else {
  echo '<script>$("#id-boton-crear").show(); $("#id-span-verificacion").hide();</script>';
}
?>