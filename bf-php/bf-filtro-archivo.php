<?php
include_once( '../bf-php/bf-conexion.php' );
$direccion_archivo = $_POST[ 'direccion_archivo' ];
$extension_archivo = $_POST[ 'extension_archivo' ];
$nombre_archivo_temp = $_POST[ 'nombre_archivo' ] . '.' . $_POST[ 'extension_archivo' ];

if ( $extension_archivo != '' ) {
  $nombre_archivo = $_POST[ 'nombre_archivo' ];
  if ( $nombre_archivo != '' ) {
    $sql_filtro_archivo = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_url = '$direccion_archivo' AND archivos_nombre = '$nombre_archivo_temp' AND archivos_extension = '$extension_archivo'" );
    $row_filtro_archivo = mysqli_fetch_array( $sql_filtro_archivo );
    $archivos_nombre = $row_filtro_archivo[ 'archivos_nombre' ];
    $archivos_extension = $row_filtro_archivo[ 'archivos_extension' ];
    $direccion_archivo_temp = '../' . $direccion_archivo . '/' . $nombre_archivo . '.' . $extension_archivo;
    if ( isset( $row_filtro_archivo ) ) {
      echo '<script>$("#id-nuevo-nombre-aceptar").hide(); $("#id-span-verificacion-archivo").show(); $("#id-span-verificacion-archivo").text("Este nombre ya existe");</script>';
    } else if ( !isset( $row_filtro_archivo ) ) {
      if ( is_file( $direccion_archivo_temp ) ) {
        echo '<script>$("#id-nuevo-nombre-aceptar").hide(); $("#id-span-verificacion-archivo").show(); $("#id-span-verificacion-archivo").text("Este nombre está en uso, haz clic en el botón de Escanear para visualizar el archivo");</script>';
      } else if ( !is_file( $direccion_archivo_temp ) ) {
        echo '<script>$("#id-nuevo-nombre-aceptar").show(); $("#id-span-verificacion-archivo").hide();</script>';
      }
    }
  } else {
    echo '<script>$("#id-nuevo-nombre-aceptar").hide(); $("#id-span-verificacion-archivo").hide();</script>';
  }
} else if ( $extension_archivo == '' ) {
  $nombre_archivo = $_POST[ 'nombre_archivo' ];
  if ( $nombre_archivo != '' ) {
    $sql_filtro_carpeta = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_url = '$direccion_archivo' AND archivos_nombre = '$nombre_archivo' AND archivos_tipo = 'c'" );
    $row_filtro_carpeta = mysqli_fetch_array( $sql_filtro_carpeta );

    if ( isset( $row_filtro_carpeta ) ) {
      echo '<script>$("#id-nuevo-nombre-aceptar").hide(); $("#id-span-verificacion-archivo").show(); $("#id-span-verificacion-archivo").text("Este nombre ya existe");</script>';
    } else if ( !isset( $row_filtro_carpeta ) ) {
      $direccion_carpeta = '../' . $direccion_archivo . '/' . $nombre_archivo;
      if ( is_dir( $direccion_carpeta ) ) {
        echo '<script>$("#id-nuevo-nombre-aceptar").hide(); $("#id-span-verificacion-archivo").show(); $("#id-span-verificacion-archivo").text("Este nombre está en uso, haz clic en el botón de Escanear para visualizar la carpeta");</script>';
      } else if ( !is_dir( $direccion_carpeta ) ) {
        echo '<script>$("#id-nuevo-nombre-aceptar").show(); $("#id-span-verificacion-archivo").hide();</script>';
      }
    }
  } else {
    echo '<script>$("#id-nuevo-nombre-aceptar").show(); $("#id-span-verificacion-archivo").hide();</script>';
  }
}

?>