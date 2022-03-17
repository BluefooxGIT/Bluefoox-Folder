<?php
include_once( 'bf-php/bf-conexion.php' );
if ( isset( $_SESSION[ 'usuarios_id' ] ) ) {
  $uid = $_SESSION[ 'usuarios_id' ];
  $usuarios_nivel = $_SESSION[ 'usuarios_nivel' ];
  if ( isset( $_GET[ 'r' ] ) ) {
    $archivos_url = urldecode( base64_decode( $_GET[ 'r' ] ) );
    $directorio_actual = $archivos_url;
    if ( !is_dir( $directorio_actual ) ) {
      if ( isset( $_SERVER[ "HTTP_REFERER" ] ) ) {
        header( "Location: " . $_SERVER[ "HTTP_REFERER" ] );
      }
    }
  }
}
$sql_sin_registros = $mysqli->query( "SELECT * FROM bluefoox_archivos" );
$row_sin_registros = mysqli_fetch_array( $sql_sin_registros );
$sql_registros_archivos = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_tipo = 'a'" );
$row_registros_archivos = mysqli_fetch_array( $sql_registros_archivos );
$configuracion_orden = $row_configuracion[ 'configuracion_orden' ];
$configuracion_orden_tipo = $row_configuracion[ 'configuracion_orden_tipo' ];
if ( $usuarios_nivel == '0' ) {
  $sql_registros = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_url = '$archivos_url' AND archivos_usuario = '$uid' ORDER BY archivos_tipo $configuracion_orden_tipo, uid $configuracion_orden" );
  $row_registros = mysqli_fetch_array( $sql_registros );
} else if ( $usuarios_nivel == '1' ) {
  $sql_registros = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_url = '$archivos_url' ORDER BY archivos_tipo $configuracion_orden_tipo, uid $configuracion_orden" );
  $row_registros = mysqli_fetch_array( $sql_registros );
}
?>
<?php
$bytes = disk_total_space( "." );
$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
$base = 1024;
$class = min( ( int )log( $bytes, $base ), count( $si_prefix ) - 1 );
$disco_espacio_total_temp = round( sprintf( '%1.2f', $bytes / pow( $base, $class ) ) );
$disco_espacio_total = ( ( int )$disco_espacio_total_temp );
?>
<?php
$bytes = disk_free_space( "." );
$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
$base = 1024;
$class = min( ( int )log( $bytes, $base ), count( $si_prefix ) - 1 );
$disco_espacio_libre_temp = round( sprintf( '%1.2f', $bytes / pow( $base, $class ) ) );
$disco_espacio_libre = ( ( int )$disco_espacio_libre_temp );
?>
<?php
$disco_espacio_usado = $disco_espacio_total - $disco_espacio_libre;
$disco_espacio_libre_porcentaje = round( ( $disco_espacio_libre * 100 ) / $disco_espacio_total );
$disco_espacio_usado_porcentaje = round( ( $disco_espacio_usado * 100 ) / $disco_espacio_total );
?>
<div class="div-espacio-disco">
  <section class="disco_espacio_usado" style="width: <?php echo $disco_espacio_usado_porcentaje; ?>%"><?php echo $disco_espacio_usado.'&nbsp;'.$si_prefix[ $class ]; ?></section>
  <section class="disco_espacio_libre" style="width: <?php echo $disco_espacio_libre_porcentaje; ?>%"><?php echo $disco_espacio_libre.'&nbsp;'.$si_prefix[ $class ]; ?></section>
</div>
<div id="id-div-carga" class="div-carga">
  <div class="div-carga-contenedor"><img src="bf-archivos/bf-gif/progreso.gif"></div>
</div>
<div class="div-contenedor-principal">
  <svg viewBox="0 0 450.3 46.9" class="svg-logo">
    <path d="M0,46V4.7h17.1c2.9,0,5.5,0.5,7.7,1.4C27,7,28.6,8.3,29.8,10c1.2,1.7,1.8,3.8,1.8,6.2c0,1.1-0.2,2.1-0.6,3.2
		c-0.4,1-0.9,2-1.6,2.7c-0.7,0.8-1.4,1.3-2.2,1.6c1.2,0.5,2.3,1.2,3.2,2.2c0.9,1,1.6,2.2,2.2,3.5s0.8,2.7,0.8,4.2
		c0,2.6-0.6,4.9-1.9,6.7c-1.3,1.9-3,3.2-5.2,4.2c-2.2,0.9-4.7,1.4-7.5,1.4H0z M16.1,20.1c1,0,1.8-0.3,2.4-0.8
		c0.6-0.5,0.9-1.1,0.9-1.9c0-0.7-0.3-1.2-0.8-1.6c-0.5-0.4-1.3-0.6-2.1-0.6h-4.2v4.9H16.1z M17.8,35.8c1,0,1.8-0.3,2.4-0.9
		c0.6-0.6,0.9-1.5,0.9-2.5c0-0.5-0.2-1.1-0.5-1.6s-0.7-0.9-1.3-1.2c-0.5-0.3-1.2-0.5-1.9-0.5h-5.3v6.6H17.8z"/>
    <path d="M49.7,46H38.2V1.9h11.4V46z"/>
    <path d="M76.3,14.6h11.5V46h-8.6l-1.9-3.2c-1.3,1.1-2.8,2.1-4.7,2.8c-1.9,0.7-3.6,1.1-5.1,1.1c-2.4,0-4.6-0.6-6.5-1.7
		c-1.9-1.1-3.4-2.7-4.4-4.8c-1-2.1-1.6-4.5-1.6-7.4V14.6h11.5v16.2c0,1.7,0.4,3,1.2,4s1.9,1.4,3.3,1.4c1.3,0,2.4-0.4,3.4-1.1
		c1-0.8,1.6-1.7,1.8-2.7V14.6z"/>
    <path d="M103.8,34c0.6,1.1,1.4,2,2.4,2.5c1,0.6,2.2,0.9,3.5,0.9c1.1,0,2.1-0.2,3-0.5s1.7-0.8,2.5-1.5l5.2,7.5
		c-1.5,1.3-3.2,2.3-5.1,3c-1.9,0.7-4,1.1-6.3,1.1c-3.2,0-6.1-0.7-8.7-2.2c-2.5-1.5-4.5-3.5-5.9-6c-1.4-2.5-2.1-5.2-2.1-8.2
		c0-3,0.7-5.8,2-8.3c1.4-2.5,3.2-4.5,5.7-6c2.4-1.5,5.2-2.2,8.3-2.2c3.4,0,6.3,0.7,8.7,2c2.4,1.4,4.2,3.3,5.5,5.7
		c1.2,2.4,1.9,5.3,1.9,8.4c0,1.2-0.1,2.4-0.3,3.8H103.8z M105.4,24c-0.9,0.6-1.6,1.6-2,2.9h10.3c-0.4-1.3-1-2.2-1.9-2.9
		c-0.9-0.6-1.9-1-3.2-1C107.4,23,106.3,23.3,105.4,24z"/>
    <path d="M129.2,46V25.1h-3.5V14.6h3.5v-3.3c0-3.9,1.1-6.7,3.4-8.6c2.3-1.8,5.7-2.7,10.3-2.7c0.9,0,1.5,0,1.7,0
		c0.1,0,0.2,0,0.4,0c0.2,0,0.4,0,0.7,0v9.8l-0.6,0l-1.5,0c-1.1,0-1.8,0.2-2.2,0.7c-0.4,0.5-0.6,1.2-0.6,2.2v1.9h5.1v10.5h-5.1V46
		H129.2z"/>
    <path d="M155.6,44.7c-2.6-1.5-4.7-3.5-6.2-6c-1.5-2.5-2.2-5.2-2.2-8.2c0-3,0.7-5.8,2.2-8.3s3.6-4.5,6.2-6
		c2.6-1.5,5.5-2.2,8.8-2.2s6.1,0.7,8.8,2.2c2.6,1.5,4.7,3.5,6.2,6c1.5,2.5,2.3,5.3,2.3,8.3c0,3-0.8,5.7-2.3,8.3
		c-1.5,2.5-3.6,4.5-6.2,5.9c-2.6,1.5-5.6,2.2-8.8,2.2C161.1,46.9,158.2,46.2,155.6,44.7z M167.3,35.4c0.9-0.5,1.6-1.2,2.1-2
		c0.5-0.9,0.7-1.8,0.7-2.9c0-1.1-0.2-2.1-0.7-3c-0.5-0.9-1.2-1.6-2.1-2c-0.9-0.5-1.9-0.7-2.9-0.7s-2.1,0.2-2.9,0.7s-1.6,1.2-2.1,2
		s-0.7,1.9-0.7,3c0,1.1,0.2,2,0.7,2.9c0.5,0.9,1.2,1.5,2.1,2c0.9,0.5,1.9,0.7,2.9,0.7S166.4,35.9,167.3,35.4z"/>
    <path d="M192.5,44.7c-2.6-1.5-4.7-3.5-6.2-6c-1.5-2.5-2.2-5.2-2.2-8.2c0-3,0.7-5.8,2.2-8.3c1.5-2.5,3.6-4.5,6.2-6
		c2.6-1.5,5.5-2.2,8.8-2.2c3.2,0,6.1,0.7,8.8,2.2c2.6,1.5,4.7,3.5,6.2,6s2.3,5.3,2.3,8.3c0,3-0.8,5.7-2.3,8.3
		c-1.5,2.5-3.6,4.5-6.2,5.9c-2.6,1.5-5.6,2.2-8.8,2.2C198,46.9,195.1,46.2,192.5,44.7z M204.2,35.4c0.9-0.5,1.6-1.2,2.1-2
		c0.5-0.9,0.7-1.8,0.7-2.9c0-1.1-0.2-2.1-0.7-3s-1.2-1.6-2.1-2s-1.9-0.7-2.9-0.7c-1.1,0-2.1,0.2-2.9,0.7c-0.9,0.5-1.6,1.2-2.1,2
		c-0.5,0.9-0.7,1.9-0.7,3c0,1.1,0.2,2,0.7,2.9c0.5,0.9,1.2,1.5,2.1,2c0.9,0.5,1.9,0.7,2.9,0.7C202.4,36.1,203.4,35.9,204.2,35.4z"/>
    <path d="M231.7,46h-13.5L229,30.1l-10.2-15.5h13.7l3.8,8.1l4-8.1h13.5l-9.9,15.5L254.3,46h-13.4l-4.6-8.7L231.7,46z"/>
    <path d="M280.8,46h-8V4.7h27.9v7.2h-20v11.7h15.6v6.8h-15.6V46z"/>
    <path d="M309.2,44.7c-2.5-1.4-4.4-3.4-5.9-5.8c-1.4-2.5-2.2-5.2-2.2-8.1c0-3,0.7-5.7,2.2-8.2c1.4-2.5,3.4-4.4,5.9-5.9
		c2.5-1.4,5.2-2.2,8.2-2.2c3,0,5.7,0.7,8.2,2.2c2.5,1.4,4.4,3.4,5.9,5.9c1.4,2.5,2.2,5.2,2.2,8.1c0,2.9-0.7,5.6-2.2,8.1
		c-1.4,2.5-3.4,4.4-5.9,5.8s-5.3,2.1-8.3,2.1C314.4,46.8,311.7,46.1,309.2,44.7z M321.9,38.6c1.3-0.8,2.4-1.9,3.2-3.3
		c0.8-1.4,1.2-2.9,1.2-4.6c0-1.7-0.4-3.2-1.2-4.6c-0.8-1.4-1.8-2.5-3.2-3.3c-1.4-0.8-2.8-1.2-4.4-1.2c-1.6,0-3.1,0.4-4.4,1.2
		c-1.3,0.8-2.4,1.9-3.2,3.3c-0.8,1.4-1.2,2.9-1.2,4.6s0.4,3.2,1.2,4.6s1.8,2.5,3.2,3.3c1.3,0.8,2.8,1.2,4.4,1.2
		C319.1,39.8,320.6,39.4,321.9,38.6z"/>
    <path d="M347.3,46h-7.5V2h7.5V46z"/>
    <path d="M377.9,2.7h7.5V46h-6.5l-0.5-3.6c-1.2,1.4-2.6,2.4-4.1,3.2s-3.4,1.2-5.3,1.2c-2.8,0-5.4-0.7-7.7-2.2
		c-2.4-1.4-4.3-3.4-5.7-5.8c-1.4-2.5-2.1-5.2-2.1-8.1c0-2.9,0.7-5.6,2.1-8.1s3.3-4.4,5.7-5.8c2.4-1.4,4.9-2.2,7.7-2.2
		c3.6,0,6.6,1.3,9,3.8V2.7z M374.1,38.5c1.4-0.8,2.4-1.8,3.2-3.2s1.2-2.9,1.2-4.6s-0.4-3.2-1.2-4.6c-0.8-1.4-1.8-2.5-3.2-3.2
		c-1.4-0.8-2.8-1.2-4.5-1.2c-1.6,0-3.1,0.4-4.4,1.2c-1.3,0.8-2.4,1.9-3.1,3.2c-0.8,1.4-1.1,2.9-1.1,4.6s0.4,3.2,1.1,4.6
		s1.8,2.4,3.1,3.2c1.3,0.8,2.8,1.1,4.4,1.1S372.7,39.2,374.1,38.5z"/>
    <path d="M399.1,33.1c0.5,2.2,1.5,3.9,3.2,5.2c1.6,1.3,3.5,1.9,5.7,1.9c2.8,0,5.3-0.9,7.3-2.8l3.6,5.2
		c-1.5,1.4-3.2,2.4-5.1,3.1c-1.9,0.7-4,1.1-6.3,1.1c-3,0-5.7-0.7-8.1-2.2c-2.4-1.4-4.3-3.4-5.7-5.9s-2.1-5.2-2.1-8.1
		c0-3,0.6-5.7,1.9-8.1s3.1-4.4,5.4-5.9c2.3-1.4,4.9-2.2,7.7-2.2c3.2,0,5.9,0.7,8.2,2c2.3,1.4,4,3.2,5.2,5.7s1.8,5.2,1.8,8.3
		c0,0.9-0.1,1.8-0.2,2.6H399.1z M402,22.7c-1.4,1.1-2.4,2.7-2.8,4.7h15.6c-0.5-2-1.3-3.6-2.7-4.7c-1.3-1.1-3-1.7-5-1.7
		C405.1,21.1,403.4,21.6,402,22.7z"/>
    <path d="M446.8,15.2c1.2,0.4,2.4,1,3.5,1.8l-3.3,6.1c-1.5-1.1-3.1-1.6-4.7-1.6c-1.1,0-2.2,0.4-3.2,1.1
		c-1,0.7-1.8,1.7-2.5,2.9c-0.6,1.3-1,2.7-1,4.4V46H428V15.2h6.4l0.5,4.1c0.9-1.5,2-2.7,3.4-3.5s3-1.3,4.8-1.3
		C444.3,14.6,445.5,14.8,446.8,15.2z"/>
  </svg>
  <div class="div-submenu-main" onClick="submenu()">
    <svg class="svg-submenu-main" viewBox="0 0 24 24">
      <circle cx="12" cy="2" r="2"/>
      <circle cx="12" cy="12" r="2"/>
      <circle cx="12" cy="22" r="2"/>
    </svg>
  </div>
  <div class="div-separador-cabezal">
    <hr class="hr-separador">
  </div>
  <div class="div-submenu div-oculto" id="id-div-submenu">
    <div id="id-div-ajustes" class="div-submenu-boton">
      <svg class="svg-submenu" viewBox="0 0 24 24">
        <path d="M12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/>
        <path d="M21.294,13.9l-.444-.256a9.1,9.1,0,0,0,0-3.29l.444-.256a3,3,0,1,0-3-5.2l-.445.257A8.977,8.977,0,0,0,15,3.513V3A3,3,0,0,0,9,3v.513A8.977,8.977,0,0,0,6.152,5.159L5.705,4.9a3,3,0,0,0-3,5.2l.444.256a9.1,9.1,0,0,0,0,3.29l-.444.256a3,3,0,1,0,3,5.2l.445-.257A8.977,8.977,0,0,0,9,20.487V21a3,3,0,0,0,6,0v-.513a8.977,8.977,0,0,0,2.848-1.646l.447.258a3,3,0,0,0,3-5.2Zm-2.548-3.776a7.048,7.048,0,0,1,0,3.75,1,1,0,0,0,.464,1.133l1.084.626a1,1,0,0,1-1,1.733l-1.086-.628a1,1,0,0,0-1.215.165,6.984,6.984,0,0,1-3.243,1.875,1,1,0,0,0-.751.969V21a1,1,0,0,1-2,0V19.748a1,1,0,0,0-.751-.969A6.984,6.984,0,0,1,7.006,16.9a1,1,0,0,0-1.215-.165l-1.084.627a1,1,0,1,1-1-1.732l1.084-.626a1,1,0,0,0,.464-1.133,7.048,7.048,0,0,1,0-3.75A1,1,0,0,0,4.79,8.992L3.706,8.366a1,1,0,0,1,1-1.733l1.086.628A1,1,0,0,0,7.006,7.1a6.984,6.984,0,0,1,3.243-1.875A1,1,0,0,0,11,4.252V3a1,1,0,0,1,2,0V4.252a1,1,0,0,0,.751.969A6.984,6.984,0,0,1,16.994,7.1a1,1,0,0,0,1.215.165l1.084-.627a1,1,0,1,1,1,1.732l-1.084.626A1,1,0,0,0,18.746,10.125Z"/>
      </svg>
      &nbsp;<span class="span-submenu">Ajustes</span></div>
    <div id="id-div-cerrar-sesion" class="div-submenu-boton">
      <svg class="svg-submenu" viewBox="0 0 24 24">
        <path d="M18.9,0H5.1A5.055,5.055,0,0,0,0,5V8A1,1,0,0,0,2,8V5A3.054,3.054,0,0,1,5.1,2H18.9A3.054,3.054,0,0,1,22,5V19a3.054,3.054,0,0,1-3.1,3H5.1A3.054,3.054,0,0,1,2,19V16a1,1,0,0,0-2,0v3a5.055,5.055,0,0,0,5.1,5H18.9A5.055,5.055,0,0,0,24,19V5A5.055,5.055,0,0,0,18.9,0Z"/>
        <path d="M3,12a1,1,0,0,0,1,1H4l13.188-.03-4.323,4.323a1,1,0,1,0,1.414,1.414l4.586-4.586a3,3,0,0,0,0-4.242L14.281,5.293a1,1,0,0,0-1.414,1.414l4.262,4.263L4,11A1,1,0,0,0,3,12Z"/>
      </svg>
      &nbsp;<span class="span-submenu">Salir</span></div>
  </div>
  <div id="id-div-contenedor-herramientas" class="div-contenedor-herramientas">
    <div class="div-herramienta-interfaz" onClick="nueva_carpeta()" id="id-div-nueva-carpeta">
      <svg class="svg-iconos-herramientas svg-iconos-responsivos" viewBox="0 0 24 24" >
        <path d="m16 15a1 1 0 0 1 -1 1h-2v2a1 1 0 0 1 -2 0v-2h-2a1 1 0 0 1 0-2h2v-2a1 1 0 0 1 2 0v2h2a1 1 0 0 1 1 1zm8-7v10a5.006 5.006 0 0 1 -5 5h-14a5.006 5.006 0 0 1 -5-5v-12a5.006 5.006 0 0 1 5-5h2.528a3.014 3.014 0 0 1 1.341.316l3.156 1.584a1.016 1.016 0 0 0 .447.1h6.528a5.006 5.006 0 0 1 5 5zm-22-2v1h19.816a3 3 0 0 0 -2.816-2h-6.528a3.014 3.014 0 0 1 -1.341-.316l-3.156-1.579a1.016 1.016 0 0 0 -.447-.105h-2.528a3 3 0 0 0 -3 3zm20 12v-9h-20v9a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3z"/>
      </svg>
      <span class="span-titulo-herramienta">&nbsp;Nueva carpeta</span></div>
    <div class="div-herramienta-interfaz" onClick="subir_archivos()" id="id-div-subir-archivos">
      <svg class="svg-iconos-herramientas svg-iconos-responsivos" viewBox="0 0 24 24">
        <path d="M18.4,7.379a1.128,1.128,0,0,1-.769-.754h0a8,8,0,1,0-15.1,5.237A1.046,1.046,0,0,1,2.223,13.1,5.5,5.5,0,0,0,.057,18.3,5.622,5.622,0,0,0,5.683,23H11a1,1,0,0,0,1-1h0a1,1,0,0,0-1-1H5.683a3.614,3.614,0,0,1-3.646-2.981,3.456,3.456,0,0,1,1.376-3.313A3.021,3.021,0,0,0,4.4,11.141a6.113,6.113,0,0,1-.073-4.126A5.956,5.956,0,0,1,9.215,3.05,6.109,6.109,0,0,1,9.987,3a5.984,5.984,0,0,1,5.756,4.28,2.977,2.977,0,0,0,2.01,1.99,5.934,5.934,0,0,1,.778,11.09.976.976,0,0,0-.531.888h0a.988.988,0,0,0,1.388.915c4.134-1.987,6.38-7.214,2.88-12.264A6.935,6.935,0,0,0,18.4,7.379Z"/>
        <path d="M18.707,16.707a1,1,0,0,0,0-1.414l-1.586-1.586a3,3,0,0,0-4.242,0l-1.586,1.586a1,1,0,0,0,1.414,1.414L14,15.414V23a1,1,0,0,0,2,0V15.414l1.293,1.293a1,1,0,0,0,1.414,0Z"/>
      </svg>
      <span class="span-titulo-herramienta">&nbsp;Subir archivos</span></div>
    <div class="div-herramienta-interfaz <?php if(!isset($row_registros_archivos)) { echo 'div-oculto'; }?>" onClick="buscar_archivos()">
      <svg class="svg-iconos-herramientas svg-iconos-responsivos" viewBox="0 0 24 24">
        <path d="M23.707,22.293l-5.969-5.969a10.016,10.016,0,1,0-1.414,1.414l5.969,5.969a1,1,0,0,0,1.414-1.414ZM10,18a8,8,0,1,1,8-8A8.009,8.009,0,0,1,10,18Z"/>
      </svg>
      <span class="span-titulo-herramienta">&nbsp;Buscar</span></div>
    <?php
    if ( $usuarios_nivel == '1' ) {
      echo '<div class="div-herramienta-interfaz" id="id-div-escanear" onClick="escanear_archivos();recargar_directorio()">
      <svg class="svg-iconos-herramientas svg-iconos-responsivos"  viewBox="0 0 24 24">
        <path d="M12,2a10.032,10.032,0,0,1,7.122,3H16a1,1,0,0,0-1,1h0a1,1,0,0,0,1,1h4.143A1.858,1.858,0,0,0,22,5.143V1a1,1,0,0,0-1-1h0a1,1,0,0,0-1,1V3.078A11.981,11.981,0,0,0,.05,10.9a1.007,1.007,0,0,0,1,1.1h0a.982.982,0,0,0,.989-.878A10.014,10.014,0,0,1,12,2Z"/>
        <path d="M22.951,12a.982.982,0,0,0-.989.878A9.986,9.986,0,0,1,4.878,19H8a1,1,0,0,0,1-1H9a1,1,0,0,0-1-1H3.857A1.856,1.856,0,0,0,2,18.857V23a1,1,0,0,0,1,1H3a1,1,0,0,0,1-1V20.922A11.981,11.981,0,0,0,23.95,13.1a1.007,1.007,0,0,0-1-1.1Z"/>
      </svg>
      <span class="span-titulo-herramienta">&nbsp;Actualizar</span></div>';
    }
    ?>
    <div class="div-herramienta-interfaz div-oculto" id="id-div-herramienta-interfaz-eliminar" onClick="eliminar_archivos()">
      <svg class="svg-iconos-herramientas"  viewBox="0 0 24 24">
        <path d="M21,4H17.9A5.009,5.009,0,0,0,13,0H11A5.009,5.009,0,0,0,6.1,4H3A1,1,0,0,0,3,6H4V19a5.006,5.006,0,0,0,5,5h6a5.006,5.006,0,0,0,5-5V6h1a1,1,0,0,0,0-2ZM11,2h2a3.006,3.006,0,0,1,2.829,2H8.171A3.006,3.006,0,0,1,11,2Zm7,17a3,3,0,0,1-3,3H9a3,3,0,0,1-3-3V6H18Z"/>
        <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18Z"/>
        <path d="M14,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/>
      </svg>
      <span class="span-titulo-herramienta">&nbsp;Eliminar</span></div>
  </div>
  <div class="div-contenedor-subherramientas div-oculto" id="id-div-contenedor-subherramientas">
    <form method="post" enctype="multipart/form-data" id="id-form-contenedor-herramientas">
      <div class="div-subherramientas-interfaz div-oculto" id="id-div-contenedor-subherramientas-nueva-carpeta">
        <input class="input-subharremienta-interfaz" type="text" placeholder="Nombre de la carpeta" id="id-nombre-nueva-carpeta" name="nombre-nueva-carpeta">
        <svg class="svg-input-fix" viewBox="0 0 24 24">
          <path d="m19 0h-14a5.006 5.006 0 0 0 -5 5v14a5.006 5.006 0 0 0 5 5h14a5.006 5.006 0 0 0 5-5v-14a5.006 5.006 0 0 0 -5-5zm3 19a3 3 0 0 1 -3 3h-14a3 3 0 0 1 -3-3v-14a3 3 0 0 1 3-3h14a3 3 0 0 1 3 3zm-4-10a1 1 0 0 1 -2 0 1 1 0 0 0 -1-1h-2v8h1a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2h1v-8h-2a1 1 0 0 0 -1 1 1 1 0 0 1 -2 0 3 3 0 0 1 3-3h6a3 3 0 0 1 3 3z"/>
        </svg>
        <input class="input-subherramienta-interfaz-boton-fix" type="button" value="Crear" onClick="crear_carpeta()" id="id-boton-crear">
      </div>
      <div class="div-subherramientas-interfaz div-oculto" id="id-div-contenedor-subherramientas-subir-archivos">
        <div class="box">
          <input onChange="" type="file" name="input-archivos[]" id="id-input-archivos" class="input-archivo input-archivo-contador" data-multiple-caption="{count} archivos seleccionados" multiple/>
          <label for="id-input-archivos" class="input-subharremienta-interfaz">
            <svg class="svg-input" viewBox="0 0 24 24">
              <path d="M11.007,2.578,11,18.016a1,1,0,0,0,1,1h0a1,1,0,0,0,1-1l.007-15.421,2.912,2.913a1,1,0,0,0,1.414,0h0a1,1,0,0,0,0-1.414L14.122.879a3,3,0,0,0-4.244,0L6.667,4.091a1,1,0,0,0,0,1.414h0a1,1,0,0,0,1.414,0Z"/>
              <path d="M22,17v4a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V17a1,1,0,0,0-1-1H1a1,1,0,0,0-1,1v4a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V17a1,1,0,0,0-1-1h0A1,1,0,0,0,22,17Z"/>
            </svg>
            <span class="span-input-files">Selecciona los archivos&hellip;</span></label>
        </div>
        <div id="id-div-archivo-grande" class="div-oculto div-alerta-archivo"></div>
      </div>
      <input type="hidden" name="input-dominio" value="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/?r="; ?>">
      <input type="hidden" id="id-input-url-completa" name="input-url-completa" value="<?php echo $archivos_url; ?>">
      <input type="hidden" id="id-input-uid-usuario" name="input-uid-usuario" value="<?php if ( isset( $_SESSION[ 'usuarios_id' ] ) ) { echo $_SESSION[ 'usuarios_id' ]; } ?>">
    </form>
    <span id="id-span-verificacion" class="span-verificacion"></span> </div>
  <div class="div-subherramientas-interfaz  div-subherramientas-interfaz-fix div-oculto" id="id-div-contenedor-subherramientas-buscar-archivos">
    <input class="input-subharremienta-interfaz input-icono-texto" type="text" placeholder="Buscar archivos" id="id-buscar-archivos">
    <svg class="svg-input-fix" viewBox="0 0 24 24">
      <path d="m19 0h-14a5.006 5.006 0 0 0 -5 5v14a5.006 5.006 0 0 0 5 5h14a5.006 5.006 0 0 0 5-5v-14a5.006 5.006 0 0 0 -5-5zm3 19a3 3 0 0 1 -3 3h-14a3 3 0 0 1 -3-3v-14a3 3 0 0 1 3-3h14a3 3 0 0 1 3 3zm-4-10a1 1 0 0 1 -2 0 1 1 0 0 0 -1-1h-2v8h1a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2h1v-8h-2a1 1 0 0 0 -1 1 1 1 0 0 1 -2 0 3 3 0 0 1 3-3h6a3 3 0 0 1 3 3z"/>
    </svg>
    <input class="input-subherramienta-interfaz-boton-fix" type="button" value="Limpiar" onClick="limpiar_busqueda()" id="id-boton-crear">
    <div id="id-div-numero-busqueda"></div>
  </div>
  <div id="id-div-breadcrumb" class="div-breadcrumb">
    <svg class="svg-iconos-herramientas" viewBox="0 0 24 24">
      <path d="M12,6a4,4,0,1,0,4,4A4,4,0,0,0,12,6Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,12Z"/>
      <path d="M12,24a5.271,5.271,0,0,1-4.311-2.2c-3.811-5.257-5.744-9.209-5.744-11.747a10.055,10.055,0,0,1,20.11,0c0,2.538-1.933,6.49-5.744,11.747A5.271,5.271,0,0,1,12,24ZM12,2.181a7.883,7.883,0,0,0-7.874,7.874c0,2.01,1.893,5.727,5.329,10.466a3.145,3.145,0,0,0,5.09,0c3.436-4.739,5.329-8.456,5.329-10.466A7.883,7.883,0,0,0,12,2.181Z"/>
    </svg>
    <ul class="breadcrumb">
      <?php
      $breadcrumb = explode( '/', $archivos_url );
      $conteo = count( $breadcrumb );
      $breadcrumb_ultimo = array_key_last( $breadcrumb );
      $directorio = '';
      foreach ( $breadcrumb as $breadcrumb_valor => $breadcrumb_texto ) {
        $directorio .= $breadcrumb_texto;
        if ( $breadcrumb_valor != $breadcrumb_ultimo ) {
          if ( $conteo < '4' ) {
            if ( $breadcrumb_valor == '0' ) {
              echo '<li><a class="a-breadcrumb" href="?r=' . urlencode( base64_encode( $directorio ) ) . '">' . mb_strimwidth( $breadcrumb_texto, 0, 8, "..." ) . '</a></li>';
            } else {
              echo '<li><a class="a-breadcrumb" href="?r=' . urlencode( base64_encode( $directorio ) ) . '">' . mb_strimwidth( $breadcrumb_texto, 0, 8, "..." ) . '</a></li>';
            }
          } else if ( $conteo > '3' ) {
            $penultimo = $breadcrumb_ultimo - 1;
            if ( $breadcrumb_valor == '0' ) {
              echo '<li><a class="a-breadcrumb" href="?r=' . urlencode( base64_encode( $directorio ) ) . '">' . mb_strimwidth( $breadcrumb_texto, 0, 8, "..." ) . '</a></li>';
              echo '<li class="li-breadcrumb">...</li>';
            }
            if ( $breadcrumb_valor == $penultimo ) {
              echo '<li><a class="a-breadcrumb" href="?r=' . urlencode( base64_encode( $directorio ) ) . '">' . mb_strimwidth( $breadcrumb_texto, 0, 8, "..." ) . '</a></li>';
            }
          }
        } else {
          echo '<li class="li-breadcrumb">' . mb_strimwidth( $breadcrumb_texto, 0, 12, "..." ) . '</li>';
        }
        $directorio .= '/';
      }
      ?>
    </ul>
  </div>
  <div class="div-separador-breadcrumb" id="id-div-separador-breadcrumb">
    <hr class="hr-separador">
  </div>
  <div class="div-carpeta-vacia <?php if(isset($row_registros)) { echo 'div-oculto'; } ?>">
    <form action="" method="post" enctype="multipart/form-data" id="id-form-eliminar-carpeta">
      <svg class="svg-carpeta-vacia"  viewBox="0 0 24 24">
        <path d="M19,3H12.472a1.019,1.019,0,0,1-.447-.1L8.869,1.316A3.014,3.014,0,0,0,7.528,1H5A5.006,5.006,0,0,0,0,6V18a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5V8A5.006,5.006,0,0,0,19,3ZM5,3H7.528a1.019,1.019,0,0,1,.447.1l3.156,1.579A3.014,3.014,0,0,0,12.472,5H19a3,3,0,0,1,2.779,1.882L2,6.994V6A3,3,0,0,1,5,3ZM19,21H5a3,3,0,0,1-3-3V8.994l20-.113V18A3,3,0,0,1,19,21Z"/>
      </svg>
      <span class="span-carpeta-vacia">Agrega archivos en Subir archivos
      <?php if(isset($row_sin_registros)) { echo ' o <a class="a-eliminar" onClick="eliminar_carpeta()">elim&iacute;nala</a>'; }?>
      .<span class="span-salto-linea"><br>
      Haz clic <a class="a-eliminar" onClick="escanear_archivos();recargar_directorio()">aqu&iacute;</a> para actualizar.</span></span>
      <input type="hidden" id="id-input-uid-carpeta" name="uid-carpeta" value="<?php $array_url = explode('/', $archivos_url); $array_url_temp = array_slice($array_url, 0, -1); $archivos_url_temp = implode("/", $array_url_temp); $archivos_nombre_carpeta_temp = end($array_url); $sql_carpeta = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_url = '$archivos_url_temp' AND archivos_nombre = '$archivos_nombre_carpeta_temp'" ); $row_carpeta = mysqli_fetch_array( $sql_carpeta ); if(isset($row_carpeta)) { echo $row_carpeta['uid']; } ?>">
      <input type="hidden" id="id-input-retorno-carpeta" name="retorno-carpeta" value="<?php $url_directorio = explode('/', $archivos_url); $directorios = $url_directorio; $directorios_texto = array_slice($directorios, 0, -1); echo implode('/', $directorios_texto); ?>">
      <input type="hidden" id="id-input-dominio" name="input-dominio" value="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/?r="; ?>">
      <input type="hidden" id="id-input-nombre-carpeta" value="<?php echo $row_carpeta['archivos_nombre']; ?>">
    </form>
  </div>
  <div id="id-div-lista-archivos" class="div-lista-archivos">
    <?php if(isset($row_registros)) { include_once('bf-php/bf-lista-archivos.php'); } if(isset($row_registros_busqueda)) { include_once('bf-php/bf-lista-archivos-busqueda.php'); } ?>
  </div>
</div>
<div class="div-alerta div-oculto" id="id-div-alerta">
  <div class="div-alerta-contendor div-oculto" id="id-div-copiar"><span id="id-span-copiar" class="span-titulo-alerta"></span>
    <div id="id-div-navegador-copiar" class="div-navegador"></div>
    <span id="id-nuevo-copia-cancelar" class="span-alerta-cancelar">Cancelar</span>
    <div id="id-span-copia" class="input-subherramienta-interfaz-boton div-oculto" onClick="copiar_archivo()">Copiar aqu&iacute;</div>
    <input id="id-input-url-raiz" type="hidden" value="<?php echo 'Documentos'; ?>">
  </div>
  <div class="div-alerta-contendor div-oculto" id="id-div-mover"><span id="id-span-mover" class="span-titulo-alerta"></span>
    <div id="id-div-navegador-mover" class="div-navegador"></div>
    <span id="id-nuevo-mover-cancelar" class="span-alerta-cancelar">Cancelar</span>
    <div id="id-span-mueve" class="input-subherramienta-interfaz-boton div-oculto" onClick="mover_archivo()">Mover aqu&iacute;</div>
    <input id="id-input-url-raiz" type="hidden" value="<?php echo 'Documentos'; ?>">
  </div>
  <div class="div-alerta-contendor div-oculto" id="id-div-renombrar"><span id="id-span-nuevo-nombre" class="span-titulo-alerta"></span>
    <input class="input-subharremienta-renombrar input-icono-texto" type="text" id="id-renombrar-nuevo-nombre">
    <span id="id-span-verificacion-archivo" class="span-verificacion-nombre"></span>
    <div> <span id="id-nuevo-nombre-cancelar" class="span-alerta-cancelar">Cancelar</span>
      <div id="id-nuevo-nombre-aceptar" class="input-subherramienta-interfaz-boton div-oculto">Guardar</div>
    </div>
  </div>
  <div class="div-alerta-contendor div-oculto" id="id-div-alerta-contenedor"><span id="id-span-titulo-alerta" class="span-titulo-alerta"></span><span id="id-span-alerta" class="span-texto-alerta"></span><span id="id-alerta-cancelar" class="span-alerta-cancelar">Cancelar</span>
    <input id="id-alerta-aceptar" class="input-subherramienta-interfaz-boton" value="Eliminar definitivamente">
  </div>
  <div class="div-vista-previa div-oculto" id="id-div-vista-previa-contenedor">
    <div class="div-vista-previa-contenedor">
      <div class="div-vista-previa-cabezal">
        <svg class="svg-cerrar-vista-previa hvr-grow" viewBox="0 0 24 24" onclick="cerrar_vista_previa()">
          <path d="M18,6h0a1,1,0,0,0-1.414,0L12,10.586,7.414,6A1,1,0,0,0,6,6H6A1,1,0,0,0,6,7.414L10.586,12,6,16.586A1,1,0,0,0,6,18H6a1,1,0,0,0,1.414,0L12,13.414,16.586,18A1,1,0,0,0,18,18h0a1,1,0,0,0,0-1.414L13.414,12,18,7.414A1,1,0,0,0,18,6Z"/>
        </svg>
      </div>
      <div class="div-contenido-archivos"> <img id="id-img-vista-previa" class="img-vista-previa" draggable="false">
        <audio id="id-audio-vista-previa" class="audio-vista-previa" controls></audio>
        <video id="id-video-vista-previa" class="video-vista-previa" controls preload="auto"></video>
        <iframe id="id-pdf-vista-previa" class="pdf-vista-previa" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>
<script>
function limpiar_busqueda() {
    $('#id-buscar-archivos').val('');
    location.reload();
}

$('#id-input-archivos').bind('change', function() {
    var tamano_archivos = (this.files[0].size);
    if(tamano_archivos <= 524288000){
        almacenar_archivos()
    } else {
        $('#id-div-archivo-grande').show();
        $('#id-div-archivo-grande').text('Se ha excedido el límite.');
    }
});
    
function copiar_archivo() {
  var directorio_copia = '../' + $('#id-input-url-raiz').val() + '/';
  var directorio_copia_registro = $('#id-input-url-raiz').val();
  $('#id-input-directorio-copia-destino').val(directorio_copia);
  $('#id-input-directorio-copia-registro').val(directorio_copia_registro);
  var directorio_copia_valido = $('#id-input-directorio-copia-destino').val();
  if (directorio_copia_valido != '') {
    $('#id-form-eliminar-archivos').attr('action', 'bf-php/bf-copiar-archivo.php?c=s');
    $('#id-form-eliminar-archivos').submit();
    $('#id-div-carga').show();
  }
}

function mover_archivo() {
  var directorio_mover = '../' + $('#id-input-url-raiz').val() + '/';
  var directorio_mover_registro = $('#id-input-url-raiz').val();
  $('#id-input-directorio-copia-destino').val(directorio_mover);
  $('#id-input-directorio-copia-registro').val(directorio_mover_registro);
  var directorio_mover_valido = $('#id-input-directorio-copia-destino').val();
  if (directorio_mover_valido != '') {
    $('#id-form-eliminar-archivos').attr('action', 'bf-php/bf-mover-archivo.php?m=s');
    $('#id-form-eliminar-archivos').submit();
    $('#id-div-carga').show();
  }
}

function ajustes() {
  $.ajax({
    url: 'bf-php/bf-ajustes.php',
    beforeSend: function () {},
    success: function (response) {
      $('#id-div-contenedor-herramientas').hide();
      $('#id-div-contenedor-subherramientas').hide();
      $('#id-div-breadcrumb').hide();
      $('#id-div-lista-archivos').hide();
      $('#id-div-ajustes').html(response);
    },
    error: function () {}
  });
}

$("#id-div-ajustes").click(function () {
    var herramienta_ajustes = "<?php echo urlencode( base64_encode( 'ajustes' ) );?>";
    window.location.href = "?h=" + herramienta_ajustes;
});
    
$("#id-div-cerrar-sesion").click(function () {
  location.href = 'bf-php/bf-cerrar-sesion.php';
});

function submenu() {
  $('#id-div-submenu').toggle();
}
$(document).ready(function () {
  escanear_archivos()
})

function escanear_archivos() {
  var archivos_url = $('#id-input-url-completa').val();
  var archivos_usuario = $('#id-input-uid-usuario').val();
  $.ajax({
    data: 'archivos_url=' + archivos_url + '&archivos_usuario=' + archivos_usuario,
    url: 'bf-php/bf-escanear-archivos-carpetas.php',
    type: 'post',
    beforeSend: function () {},
    success: function (response) {
    },
    error: function () {}
  });
}

function recargar_directorio() {
  location.reload();
}

$(document).ready(function () {
  $("#id-renombrar-nuevo-nombre").keyup(function () {
    var nombre_archivo = $('#id-renombrar-nuevo-nombre').val();
    var direccion_archivo = $('#id-input-url-completa').val();
    var extension_archivo = $('#id-input-extension-renombrar').val();
    $.ajax({
      data: 'nombre_archivo=' + nombre_archivo + '&direccion_archivo=' + direccion_archivo + '&extension_archivo=' + extension_archivo,
      url: 'bf-php/bf-filtro-archivo.php',
      type: 'post',
      beforeSend: function () {},
      success: function (response) {
        $('#id-span-verificacion-archivo').html(response);
      },
      error: function () {}
    });
  })
})


$(document).ready(function () {
  $("#id-buscar-archivos").keyup(function () {
    var nombre_archivo = $('#id-buscar-archivos').val();
    if (nombre_archivo != '') {
      $('#id-div-breadcrumb').hide();
      $.ajax({
        data: 'nombre_archivo=' + nombre_archivo,
        url: 'bf-php/bf-lista-archivos-busqueda.php',
        type: 'post',
        beforeSend: function () {},
        success: function (response) {
          $('#id-div-separador-breadcrumb').hide();
          $('#id-div-contenedor-lista-archivos').html(response);
          $('#id-div-breadcrumb').hide();
        },
        error: function () {}
      });
    } else if (nombre_archivo == '') {
      //$('#id-div-breadcrumb').show();
      location.reload();
    }
  })
})

function lista_navegador_copiar() {
  var url_actual = $('#id-input-url-raiz').val();
  var directorio_origen = $('#id-input-directorio-copia-origen').val();
  var nombre_archivo_origen = $('#id-input-nuevo-nombre').val();
  $.ajax({
    data: 'url_actual=' + url_actual + '&directorio_origen=' + directorio_origen + '&nombre_archivo_origen=' + nombre_archivo_origen,
    url: 'bf-php/bf-copiar-archivo.php',
    type: 'post',
    beforeSend: function () {},
    success: function (response) {
      $('#id-div-navegador-copiar').html(response);
    },
    error: function () {}
  });
}

function lista_navegador_mover() {
  var url_actual = $('#id-input-url-raiz').val();
  var directorio_origen = $('#id-input-directorio-copia-origen').val();
  var nombre_archivo_origen = $('#id-input-nuevo-nombre').val();
  $.ajax({
    data: 'url_actual=' + url_actual + '&directorio_origen=' + directorio_origen + '&nombre_archivo_origen=' + nombre_archivo_origen,
    url: 'bf-php/bf-mover-archivo.php',
    type: 'post',
    beforeSend: function () {},
    success: function (response) {
      $('#id-div-navegador-mover').html(response);
    },
    error: function () {}
  });
}

$("#id-nuevo-copia-cancelar").click(function () {
  var url_actual = $('#id-input-retorno-carpeta').val();
  $('#id-input-url-raiz').val('Documentos');
  $('#id-div-alerta').hide();
  $('#id-div-copiar').hide();
  $("body").css("overflow", "visible");
});

$("#id-nuevo-mover-cancelar").click(function () {
  var url_actual = $('#id-input-retorno-carpeta').val();
  $('#id-input-url-raiz').val('Documentos');
  $('#id-div-alerta').hide();
  $('#id-div-mover').hide();
  $("body").css("overflow", "visible");
});

$("#id-nuevo-nombre-cancelar").click(function () {
  $("#id-renombrar-nuevo-nombre").val('');
  $('#id-div-alerta').hide();
  $('#id-div-renombrar').hide();
  $('#id-nuevo-nombre-aceptar').hide();
  $("body").css("overflow", "visible");
});

$("#id-nuevo-nombre-aceptar").click(function () {
  var renombrar_archivo = $('#id-renombrar-nuevo-nombre').val();
  if (renombrar_archivo != '') {
    $('#id-div-carga').show();
    $('#id-input-nuevo-nombre').val(renombrar_archivo);
    $('#id-form-eliminar-archivos').attr('action', 'bf-php/bf-renombrar-archivo.php');
    $('#id-form-eliminar-archivos').submit();
  } else {
    $('#id-renombrar-nuevo-nombre').attr("placeholder", "Escribe el nuevo nombre");
  }
});

$(function () {
  var ancho_pagina_tooltip = window.outerWidth;
  if (ancho_pagina_tooltip > 768) {
    $(document).tooltip();
  }
});

function orden_carga_archivos() {
  $('#id-div-carga').show();
  $('#id-input-orden').val('fecha');
  $('#id-form-eliminar-archivos').attr('action', 'bf-php/bf-orden-archivos.php');
  $('#id-form-eliminar-archivos').submit();
}

function orden_archivos() {
  $('#id-div-carga').show();
  $('#id-input-orden').val('archivos');
  $('#id-form-eliminar-archivos').attr('action', 'bf-php/bf-orden-archivos.php');
  $('#id-form-eliminar-archivos').submit();
}

function orden_tipo() {
  $('#id-div-carga').show();
  $('#id-input-orden').val('tipo');
  $('#id-form-eliminar-archivos').attr('action', 'bf-php/bf-orden-archivos.php');
  $('#id-form-eliminar-archivos').submit();
}

function eliminar_archivos() {
  $('#id-div-alerta').show();
  $('#id-div-alerta-contenedor').show();
  $('.div-alerta').css('width', '18%');
  $("#id-span-titulo-alerta").text('¿Quieres eliminar estos archivos?');
  $("#id-alerta-aceptar").click(function () {
    $('#id-div-carga').show();
    $('#id-form-eliminar-archivos').attr('action', 'bf-php/bf-eliminar-archivos.php');
    $('#id-form-eliminar-archivos').submit();
  });
  $("#id-alerta-cancelar").click(function () {
    $("#id-span-alerta").text('');
    $('#id-div-alerta').hide();
    $('#id-div-alerta-contenedor').hide();
  });
}

function cerrar_vista_previa() {
  $('#id-div-alerta').hide();
  $('#id-div-vista-previa-contenedor').hide();
  $('#id-img-vista-previa').attr('src', '');
  $('#id-audio-vista-previa').get(0).pause();
  $('#id-audio-vista-previa').get(0).currentTime = 0;
  $('#id-video-vista-previa').get(0).pause();
  $('#id-video-vista-previa').get(0).currentTime = 0;
}

function eliminar_carpeta() {
  var nombre_carpeta = $('#id-input-nombre-carpeta').val();
  $('#id-div-alerta').show();
  $('#id-div-alerta-contenedor').show();
  $('.div-alerta').css('width', '18%');
  $("#id-span-titulo-alerta").text('¿Quieres eliminar ésta carpeta?');
  $("#id-span-alerta").text('Se eliminará "' + nombre_carpeta + '"');
  $("#id-alerta-aceptar").click(function () {
    $('#id-div-carga').show();
    $('#id-form-eliminar-carpeta').attr('action', 'bf-php/bf-eliminar-carpeta.php');
    $('#id-form-eliminar-carpeta').submit();
  });
  $("#id-alerta-cancelar").click(function () {
    $("#id-span-alerta").text('');
    $('#id-div-alerta').hide();
    $('#id-div-alerta-contenedor').hide();
  });
}

function crear_carpeta() {
  var nombre_carpeta = $('#id-nombre-nueva-carpeta').val();
  if (nombre_carpeta == '') {
    $('#id-nombre-nueva-carpeta').attr("placeholder", "Escribe el nombre");
  } else if (nombre_carpeta != '') {
    $('#id-div-carga').show();
    $('#id-form-contenedor-herramientas').attr('action', 'bf-php/bf-nueva-carpeta.php');
    $('#id-form-contenedor-herramientas').submit();
  }
}

function almacenar_archivos() {
  if ($('#id-input-archivos').get(0).files.length !== 0) {
    $('#id-div-carga').show();
    $('#id-form-contenedor-herramientas').attr('action', 'bf-php/bf-nuevo-archivo.php');
    $('#id-form-contenedor-herramientas').submit();
  }
}

function boton_eliminar() {
  if ($(".checkbox-eliminar").is(':checked')) {
    $('#id-div-herramienta-interfaz-eliminar').show();
    $('#id-div-herramienta-interfaz-eliminar').css('display', 'inline-block');
  } else {
    $('#id-div-herramienta-interfaz-eliminar').hide();
  }
}

function nueva_carpeta() {
  $('#id-div-contenedor-subherramientas').show();
  $('#id-div-contenedor-subherramientas-nueva-carpeta').toggle();
  $('#id-div-separador-herramientas-responsivo').show();
  //OCULTAR SUBHERRAMIENTAS
  $('#id-nombre-nueva-carpeta').val();
  $("#id-span-verificacion").text("");
  $('#id-div-contenedor-subherramientas-subir-archivos').hide();
  $('#id-div-contenedor-subherramientas-buscar-archivos').hide();
}

function subir_archivos() {
  $('#id-div-contenedor-subherramientas').show();
  $('#id-div-contenedor-subherramientas-subir-archivos').toggle();
  $('#id-div-separador-herramientas-responsivo').show();

  //OCULTAR SUBHERRAMIENTAS
  $('#id-nombre-nueva-carpeta').val();
  $("#id-span-verificacion").text("");
  $('#id-div-contenedor-subherramientas-nueva-carpeta').hide();
  $('#id-div-contenedor-subherramientas-buscar-archivos').hide();
}

function buscar_archivos() {
  $('#id-div-contenedor-subherramientas').show();
  $('#id-div-contenedor-subherramientas-buscar-archivos').toggle();
  $('#id-div-separador-herramientas-responsivo').show();
  $('#id-div-nueva-carpeta').toggle();
  $('#id-div-subir-archivos').toggle();
  $('#id-div-escanear').toggle();
  //OCULTAR SUBHERRAMIENTAS
  $('#id-nombre-nueva-carpeta').val();
  $("#id-span-verificacion").text("");
  $('#id-div-contenedor-subherramientas-nueva-carpeta').hide();
  $('#id-div-contenedor-subherramientas-subir-archivos').hide();
}

'use strict';;
(function (document, window, index) {
  var inputs = document.querySelectorAll('#id-input-archivos');
  Array.prototype.forEach.call(inputs, function (input) {
    var label = input.nextElementSibling,
      labelVal = label.innerHTML;
    input.addEventListener('change', function (e) {
      var fileName = '';
      if (this.files && this.files.length > 1)
        fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
      else
        fileName = e.target.value.split('\\').pop();
      if (fileName)
        label.querySelector('span').innerHTML = fileName;
      else
        label.innerHTML = labelVal;
    });
    input.addEventListener('focus', function () {
      input.classList.add('has-focus');
    });
    input.addEventListener('blur', function () {
      input.classList.remove('has-focus');
    });
  });
}(document, window, 0));

$('#id-seleccionar-checkbox-eliminar').click(function (event) {
  if (this.checked) {
    $('#id-div-herramienta-interfaz-eliminar').show();
    $('#id-div-herramienta-interfaz-eliminar').css('display', 'inline-block');
    $(':checkbox').each(function () {
      this.checked = true;
    });
  } else {
    $('#id-li-menu-eliminar').hide();
    $('#id-div-herramienta-interfaz-eliminar').hide();
    $(':checkbox').each(function () {
      this.checked = false;
    });
  }
});

$(document).ready(function () {
  $("#id-nombre-nueva-carpeta").keyup(function () {
    var nombre_carpeta = $('#id-nombre-nueva-carpeta').val();
    var direccion_carpetas = $('#id-input-url-completa').val();
    $.ajax({
      data: 'nombre_carpeta=' + nombre_carpeta + '&direccion_carpetas=' + direccion_carpetas,
      url: 'bf-php/bf-filtro-carpeta.php',
      type: 'post',
      beforeSend: function () {},
      success: function (response) {
        $('#id-span-verificacion').html(response);
      },
      error: function () {}
    });
  })
})
</script>