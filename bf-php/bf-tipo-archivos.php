<?php
if ( isset( $row_registros_busqueda[ 'archivos_tipo' ] ) ) {
  $archivos_tipo = $row_registros_busqueda[ 'archivos_tipo' ];
  $archivos_extension = $row_registros_busqueda[ 'archivos_extension' ];
  if ( $archivos_tipo == 'c' ) {
    $icono_archivo = 'icono-carpeta';
  } else if ( $archivos_tipo == 'a' ) {
    if ( $archivos_extension == 'jpg' || $archivos_extension == 'jpeg' || $archivos_extension == 'gif' || $archivos_extension == 'png' || $archivos_extension == 'bmp' || $archivos_extension == 'tiff' || $archivos_extension == 'wbmp' ) {
      $icono_archivo = 'icono-imagen';
    } else if ( $archivos_extension == 'pdf' ) {
      $icono_archivo = 'icono-pdf';
    } else if ( $archivos_extension == 'ai' ) {
      $icono_archivo = 'icono-ai';
    } else if ( $archivos_extension == 'psd' ) {
      $icono_archivo = 'icono-psd';
    } else if ( $archivos_extension == 'css' ) {
      $icono_archivo = 'icono-css';
    } else if ( $archivos_extension == 'docx' || $archivos_extension == 'doc' ) {
      $icono_archivo = 'icono-doc';
    } else if ( $archivos_extension == 'xlsx' || $archivos_extension == 'xls' ) {
      $icono_archivo = 'icono-xls';
    } else if ( $archivos_extension == 'ttf' || $archivos_extension == 'otf' ) {
      $icono_archivo = 'icono-fuente';
    } else if ( $archivos_extension == 'js' ) {
      $icono_archivo = 'icono-js';
    } else if ( $archivos_extension == 'mp3' || $archivos_extension == 'wav' || $archivos_extension == 'aiff' || $archivos_extension == 'wma' || $archivos_extension == 'ogg' || $archivos_extension == 'flac' ) {
      $icono_archivo = 'icono-musica';
    } else if ( $archivos_extension == 'mp4' || $archivos_extension == 'mkv' || $archivos_extension == 'mov' || $archivos_extension == 'avi' ) {
      $icono_archivo = 'icono-video';
    } else {
      $icono_archivo = 'icono-archivo';
    }
  }
}
if ( isset( $row_registros[ 'archivos_tipo' ] ) ) {
  $archivos_tipo = $row_registros[ 'archivos_tipo' ];
  $archivos_extension = $row_registros[ 'archivos_extension' ];
  if ( $archivos_tipo == 'c' ) {
    $icono_archivo = 'icono-carpeta';
  } else if ( $archivos_tipo == 'a' ) {
    if ( $archivos_extension == 'jpg' || $archivos_extension == 'jpeg' || $archivos_extension == 'gif' || $archivos_extension == 'png' || $archivos_extension == 'bmp' || $archivos_extension == 'tiff' || $archivos_extension == 'wbmp' ) {
      $icono_archivo = 'icono-imagen';
    } else if ( $archivos_extension == 'pdf' ) {
      $icono_archivo = 'icono-pdf';
    } else if ( $archivos_extension == 'ai' ) {
      $icono_archivo = 'icono-ai';
    } else if ( $archivos_extension == 'psd' ) {
      $icono_archivo = 'icono-psd';
    } else if ( $archivos_extension == 'css' ) {
      $icono_archivo = 'icono-css';
    } else if ( $archivos_extension == 'docx' || $archivos_extension == 'doc' ) {
      $icono_archivo = 'icono-doc';
    } else if ( $archivos_extension == 'xlsx' || $archivos_extension == 'xls' ) {
      $icono_archivo = 'icono-xls';
    } else if ( $archivos_extension == 'ttf' || $archivos_extension == 'otf' ) {
      $icono_archivo = 'icono-fuente';
    } else if ( $archivos_extension == 'js' ) {
      $icono_archivo = 'icono-js';
    } else if ( $archivos_extension == 'mp3' || $archivos_extension == 'wav' || $archivos_extension == 'aiff' || $archivos_extension == 'wma' || $archivos_extension == 'ogg' || $archivos_extension == 'flac' ) {
      $icono_archivo = 'icono-musica';
    } else if ( $archivos_extension == 'mp4' || $archivos_extension == 'mkv' || $archivos_extension == 'mov' || $archivos_extension == 'avi' ) {
      $icono_archivo = 'icono-video';
    } else {
      $icono_archivo = 'icono-archivo';
    }
  }
}
?>