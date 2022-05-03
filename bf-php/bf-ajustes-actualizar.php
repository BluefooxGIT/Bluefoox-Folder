<?php
include_once( '../bf-php/bf-conexion.php' );
$sha1_github = "https://github.com/BluefooxGIT/Bluefoox-Folder/archive/refs/heads/main.zip";
$sha1_github_nuevo = sha1_file( $sha1_github );
$sha1_actual = $row_root[ 'configuracion_sha1_actualizacion' ];
if ( $sha1_github_nuevo != $sha1_actual ) {
  $github_actualizacion = $sha1_github;
  $github_actualizacion_nuevo = '../update_folder.zip';
  if ( copy( $github_actualizacion, $github_actualizacion_nuevo ) ) {
    $zip = new ZipArchive;
    $res = $zip->open( $github_actualizacion_nuevo );
    if ( $res === TRUE ) {
      //$zip->extractTo( getcwd() );
      $zip->extractTo( '../' );
      $zip->close();

      function custom_copy( $src, $dst ) {
        $dir = opendir( $src );
        @mkdir( $dst );
        foreach ( scandir( $src ) as $file ) {
          if ( ( $file != '.' ) && ( $file != '..' ) ) {
            if ( is_dir( $src . '/' . $file ) ) {
              custom_copy( $src . '/' . $file, $dst . '/' . $file );
            } else {
              copy( $src . '/' . $file, $dst . '/' . $file );
            }
          }
        }
        closedir( $dir );
      }
      $src = "../Bluefoox-Folder-main";
      //$dst = getcwd();
      $dst = '../';
      custom_copy( $src, $dst );
      mysqli_query( $mysqli, "UPDATE bluefoox_configuracion SET configuracion_sha1_actualizacion = '$sha1_github_nuevo' WHERE uid = '1'" );
    }
  }
}
$folderName = '../Bluefoox-Folder-main';
removeFiles( $folderName );

function removeFiles( $target ) {
  if ( is_dir( $target ) ) {
    $files = glob( $target . '*', GLOB_MARK );
    foreach ( $files as $file ) {
      removeFiles( $file );
    }
    rmdir( $target );
  } elseif ( is_file( $target ) ) {
    unlink( $target );
  }
}
unlink( '../bluefoox_documentos.sql' );

if ( isset( $_SERVER[ "HTTP_REFERER" ] ) ) {
  header( "Location: " . $_SERVER[ "HTTP_REFERER" ] );
}
?>
