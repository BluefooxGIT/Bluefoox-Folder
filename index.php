<?php
include_once( 'bf-php/bf-conexion.php' );
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<script src="bf-archivos/bf-js/jquery.min.js"></script> 
<script src="bf-archivos/bf-js/bf-tooltip.js"></script> 
<script src="bf-archivos/bf-js/bf-tooltip-ui.js"></script>
<link rel="stylesheet" type="text/css" href="bf-css/bf-css-tooltip.css">
<link rel="shortcut icon" href="bf-archivos/bf-png/favicon.ico" type="image/x-icon">
<link rel="icon" href="bf-archivos/bf-png/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="bf-archivos/bf-png/icon-ios.png">
<title>Bluefoox Folder</title>
<body>
<?php
if ( $configuracion_inicial == '1' ) {
  echo '<link rel="stylesheet" type="text/css" href="bf-css/bf-css-logueo.css">';
  include_once( 'bf-introduccion/bf-principal.php' );
} else {
  if ( isset( $_SESSION[ 'usuarios_id' ] ) && isset( $_GET[ 'r' ] ) ) {
    include( 'bf-php/bf-estilos-css.php' );
    include_once( 'bf-interface/bf-principal.php' );
  } else if ( isset( $_SESSION[ 'usuarios_id' ] ) && isset( $_GET[ 'h' ] ) ) {
    include( 'bf-php/bf-estilos-css.php' );
    include_once( 'bf-interface/bf-ajustes.php' );
  } else {
    include( 'bf-php/bf-estilos-logueo-css.php' );
    include( 'bf-php/bf-estilos-css.php' );
    include_once( 'bf-interface/bf-logueo.php' );
  }
}
?>
</body>
</html>
<script>
$(function () {
  $(this).bind("contextmenu", function (e) {
    e.preventDefault();
  });
});
</script>