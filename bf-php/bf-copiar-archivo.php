<?php
include_once( '../bf-php/bf-conexion.php' );
if ( isset( $_GET[ 'c' ] ) ) {
  $funcion_copia = $_GET[ 'c' ];
  if ( $funcion_copia == 's' ) {
    $nombre_archivo = $_POST[ 'nombre-nuevo-archivo' ];
    $directorio_copia_origen = $_POST[ 'directorio-copia-origen' ];
    $directorio_copia_destino = $_POST[ 'directorio-copia-destino' ] . $nombre_archivo;
    $uid_archivo = $_POST[ 'input-id-renombrar' ];
    if ( is_file( $directorio_copia_origen ) ) {
      echo '<script>$("#id-div-carga").show();</script>';
      copy( $directorio_copia_origen, $directorio_copia_destino );
      $sql_copia = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE uid = '$uid_archivo'" );
      $row_copia = mysqli_fetch_array( $sql_copia );
      $archivos_url = $_POST[ 'directorio-copia-registro' ];
      $archivos_nombre = $row_copia[ 'archivos_nombre' ];
      $archivos_extension = $row_copia[ 'archivos_extension' ];
      $archivos_tipo = $row_copia[ 'archivos_tipo' ];
      $nombre_dia = array( "domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado" );
      $nombre_mes = array( "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre" );
      $fecha_espanol = $nombre_dia[ date( 'w' ) ] . " " . date( 'd' ) . " de " . $nombre_mes[ date( 'n' ) - 1 ] . " del " . date( 'Y' ) . ", " . date( 'h' ) . ":" . date( 'i' ) . ":" . date( 's' ) . date( 'a' );
      $archivos_modificacion = $fecha_espanol;
      $archivos_usuario = $row_copia[ 'archivos_usuario' ];
      mysqli_query( $mysqli, "INSERT INTO bluefoox_archivos (archivos_url, archivos_nombre, archivos_extension, archivos_tipo, archivos_modificacion, archivos_usuario) VALUES ('$archivos_url', '$archivos_nombre', '$archivos_extension', '$archivos_tipo', '$archivos_modificacion', '$archivos_usuario')" );
    }
  }
  if ( isset( $_SERVER[ "HTTP_REFERER" ] ) ) {
    header( "Location: " . $_SERVER[ "HTTP_REFERER" ] );
  }
} else {
  $url_actual = $_POST[ 'url_actual' ];
  $sql_registros = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_url = '$url_actual' AND archivos_tipo = 'c'" );
  $row_registros = mysqli_fetch_array( $sql_registros );
  $url_directorio = explode( '/', $url_actual );
  $directorios = $url_directorio;
  $directorios_texto = array_slice( $directorios, 0, -1 );
  $url_retorno = implode( '/', $directorios_texto );
  $url_retorno_text = end( $directorios );
  $rango_url_retorno_text = strlen( $url_retorno_text );
  if ( $rango_url_retorno_text > '30' ) {
    $url_retorno_text_clase = 't-regresar';
  } else {
    $url_retorno_text_clase = 'tt-regresar';
  }
  if ( $url_retorno != '' ) {
    echo '<div class="div-carpetas-fix"><div class="div-carpetas-regresar" onClick="retorno()"><svg class="svg-iconos-herramientas-lista" viewBox="0 0 24 24"><path d="M10.6,12.71a1,1,0,0,1,0-1.42l4.59-4.58a1,1,0,0,0,0-1.42,1,1,0,0,0-1.41,0L9.19,9.88a3,3,0,0,0,0,4.24l4.59,4.59a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.42Z"/></svg></div><div class="div-texto-ellipsis-breadcrumb"><div class="f"><div class="s"><div class="' . $url_retorno_text_clase . '">' . $url_retorno_text . '</div></div></div></div></div>';
    echo '<script> function retorno() { $("#id-input-url-raiz").val("' . $url_retorno . '"); lista_navegador_copiar(); }</script>';
  }
  if ( isset( $row_registros ) ) {
    do {
      $uid_carpeta = $row_registros[ 'uid' ];
      $nombre_carpeta = $row_registros[ 'archivos_nombre' ];
      $rango_nombre_archivo = strlen( $row_registros[ 'archivos_nombre' ] );
      if ( $rango_nombre_archivo > '24' ) {
        $nombre_archivo_clase = 't';
      } else {
        $nombre_archivo_clase = 'tt';
      }
      $url_carpeta = $row_registros[ 'archivos_url' ];
      echo '<div class="div-carpetas" onClick="navegador_carpetas_' . $uid_carpeta . '()"><img src="../bf-archivos/bf-png/icono-carpeta.png" class="png-icono-archivo-lista" draggable="false">
      <div class="div-texto-ellipsis-carpetas-fix"><div class="f"><div class="s"><div class="' . $nombre_archivo_clase . '">' . $nombre_carpeta . '</div></div></div></div></div>';
      echo '<input id="id-input-url-carpeta-actual-' . $uid_carpeta . '" type="hidden" value="' . $url_carpeta . '"> <input id="id-input-url-carpeta-destino-' . $uid_carpeta . '" type="hidden" value="' . $nombre_carpeta . '">';
      echo '<script> function navegador_carpetas_' . $uid_carpeta . '() { var carpeta_actual_' . $uid_carpeta . ' = $("#id-input-url-carpeta-actual-' . $uid_carpeta . '").val(); var carpeta_destino_' . $uid_carpeta . ' = $("#id-input-url-carpeta-destino-' . $uid_carpeta . '").val(); var url_destino_' . $uid_carpeta . ' = carpeta_actual_' . $uid_carpeta . ' + "/" + carpeta_destino_' . $uid_carpeta . '; $("#id-input-url-raiz").val(url_destino_' . $uid_carpeta . '); lista_navegador_copiar(); } </script>';
    } while ( $row_registros = mysqli_fetch_assoc( $sql_registros ) );
  }
  $directorio_destino_archivo = '../' . $url_actual . '/' . $_POST[ 'nombre_archivo_origen' ];
  if ( is_file( $directorio_destino_archivo ) ) {
    echo '<script>$("#id-span-copia").hide();</script>';
  } else {
    echo '<script>$("#id-span-copia").show();</script>';
  }
}
?>
