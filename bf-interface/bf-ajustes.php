<?php
error_reporting( 0 );
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
$sql_root = $mysqli->query( "SELECT * FROM bluefoox_configuracion WHERE uid = '1'" );
$row_root = mysqli_fetch_array( $sql_root );
$sql_usuario = $mysqli->query( "SELECT * FROM bluefoox_usuarios WHERE usuarios_id = '$uid'" );
$row_usuario = mysqli_fetch_array( $sql_usuario );
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
  <div id="id-div-breadcrumb" class="div-breadcrumb">
    <svg class="svg-iconos-herramientas" viewBox="0 0 24 24">
      <path d="M12,6a4,4,0,1,0,4,4A4,4,0,0,0,12,6Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,12Z"/>
      <path d="M12,24a5.271,5.271,0,0,1-4.311-2.2c-3.811-5.257-5.744-9.209-5.744-11.747a10.055,10.055,0,0,1,20.11,0c0,2.538-1.933,6.49-5.744,11.747A5.271,5.271,0,0,1,12,24ZM12,2.181a7.883,7.883,0,0,0-7.874,7.874c0,2.01,1.893,5.727,5.329,10.466a3.145,3.145,0,0,0,5.09,0c3.436-4.739,5.329-8.456,5.329-10.466A7.883,7.883,0,0,0,12,2.181Z"/>
    </svg>
    <ul class="breadcrumb">
      <li><a class="a-breadcrumb" href="?r=<?php $directorio_root_temp = $row_root[ 'configuracion_carpeta_root' ]; echo $directorio_root = urlencode( base64_encode( $directorio_root_temp ) ); ?>">Documentos</a></li>
      <li class="li-breadcrumb">Ajustes</li>
    </ul>
  </div>
  <div class="div-contenido-ajuste">
    <form id="id-form-ajustes-usuario" method="post" enctype="multipart/form-data" action="">
      <svg class="svg-iconos-herramientas" viewBox="0 0 24 24">
        <path d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z"/>
        <path d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z"/>
      </svg>
      <span class="span-titulo-ajuste">Datos de acceso</span>
      <div class="div-usuario-ajuste">
        <label class="label-titulos-ajuste">Usuario</label>
        <input id="id-input-uid-usuario" value="<?php echo $row_usuario['usuarios_id']; ?>" type="hidden" name="usuarios_id">
        <input id="id-input-usuario-usuario" class="input-ajustes" value="<?php echo $row_usuario['usuarios_usuario']; ?>" type="text" disabled name="usuarios_usuario">
        <label class="label-titulos-ajuste">Contrase&ntilde;a </label>
        <input type="password" value="" placeholder="Contrase&ntilde;a" class="input-ajustes" id="id-input-usuario-contrasena" name="usuarios_contrasena" disabled>
        <input type="password" value="" placeholder="Repetir contrase&ntilde;a" class="input-ajustes-fix div-oculto" id="id-input-usuario-contrasena-dos" disabled>
        <br>
        <input id="id-input-boton-usuario-cambiar" class="input-subherramienta-interfaz-boton-fix" value="Cambiar" type="button" onClick="acceso_cambio_on()">
        <input id="id-input-boton-usuario-cancelar" class="input-subherramienta-interfaz-boton-fix-cancelar div-oculto" value="Cancelar" type="button" onClick="acceso_cambio_off()">
        <input id="id-input-boton-usuario-guardar" class="input-subherramienta-interfaz-boton-fix div-oculto" value="Guardar" type="button" onClick="usuario_datos()">
      </div>
    </form>
  </div>
  <br>
  <div class="div-contenido-ajuste">
    <form id="id-form-ajustes-llave" method="post" enctype="multipart/form-data" action="">
      <svg class="svg-iconos-herramientas" viewBox="0 0 24 24">
        <path d="M7.505,24A7.5,7.5,0,0,1,5.469,9.283,7.368,7.368,0,0,1,9.35,9.235l7.908-7.906A4.5,4.5,0,0,1,20.464,0h0A3.539,3.539,0,0,1,24,3.536a4.508,4.508,0,0,1-1.328,3.207L22,7.415A2.014,2.014,0,0,1,20.586,8H19V9a2,2,0,0,1-2,2H16v1.586A1.986,1.986,0,0,1,15.414,14l-.65.65a7.334,7.334,0,0,1-.047,3.88,7.529,7.529,0,0,1-6.428,5.429A7.654,7.654,0,0,1,7.505,24Zm0-13a5.5,5.5,0,1,0,5.289,6.99,5.4,5.4,0,0,0-.1-3.3,1,1,0,0,1,.238-1.035L14,12.586V11a2,2,0,0,1,2-2h1V8a2,2,0,0,1,2-2h1.586l.672-.672A2.519,2.519,0,0,0,22,3.536,1.537,1.537,0,0,0,20.465,2a2.52,2.52,0,0,0-1.793.743l-8.331,8.33a1,1,0,0,1-1.036.237A5.462,5.462,0,0,0,7.5,11ZM5,18a1,1,0,1,0,1-1A1,1,0,0,0,5,18Z"/>
      </svg>
      <span class="span-titulo-ajuste">LLave de acceso</span>
      <div class="div-usuario-ajuste">
        <input id="id-input-boton-llave" class="input-subherramienta-interfaz-boton-fix" value="Generar llave" type="button" onClick="generar_llave()">
      </div>
    </form>
  </div>
  <br>
  <div class="div-contenido-ajuste">
    <form id="id-form-ajustes-personalizar" method="post" enctype="multipart/form-data" action="">
      <svg class="svg-iconos-herramientas" viewBox="0 0 24 24">
        <path d="m19 1h-14a5.006 5.006 0 0 0 -5 5v12a5.006 5.006 0 0 0 5 5h14a5.006 5.006 0 0 0 5-5v-12a5.006 5.006 0 0 0 -5-5zm-14 2h14a3 3 0 0 1 3 3v1h-20v-1a3 3 0 0 1 3-3zm14 18h-14a3 3 0 0 1 -3-3v-9h20v9a3 3 0 0 1 -3 3zm0-8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 0-2h12a1 1 0 0 1 1 1zm-4 4a1 1 0 0 1 -1 1h-8a1 1 0 0 1 0-2h8a1 1 0 0 1 1 1zm-12-12a1 1 0 1 1 1 1 1 1 0 0 1 -1-1zm3 0a1 1 0 1 1 1 1 1 1 0 0 1 -1-1zm3 0a1 1 0 1 1 1 1 1 1 0 0 1 -1-1z"/>
      </svg>
      <span class="span-titulo-ajuste">Personalizar</span>
      <div class="div-usuario-ajuste">
        <label class="label-titulos-ajuste">Color interfaz</label>
        <label class="color-picker">
        <input class="input-color-ajustes" type="color" value="<?php echo $row_root[ 'configuracion_interfaz_color_primario' ]; ?>" name="configuracion_interfaz_color_primario" onChange="personalizar_datos()" id="id-configuracion-interfaz-color-primario">
        <div class="color-code"><?php echo $row_root[ 'configuracion_interfaz_color_primario' ]; ?></div>
        <div class="color" style="background:<?php echo $row_root[ 'configuracion_interfaz_color_primario' ]; ?>"></div>
        </label>
      </div>
    </form>
  </div>
  <br>
  <div class="div-contenido-ajuste">
    <svg class="svg-iconos-herramientas" viewBox="0 0 24 24">
      <path d="M13.5,6.5a1.5,1.5,0,0,1-3,0A1.5,1.5,0,0,1,13.5,6.5ZM24,19V12.34A12.209,12.209,0,0,0,12.836.028,12,12,0,0,0,.029,12.854C.471,19.208,6.082,24,13.083,24H19A5.006,5.006,0,0,0,24,19ZM12.7,2.024A10.2,10.2,0,0,1,22,12.34V19a3,3,0,0,1-3,3H13.083C7.049,22,2.4,18.1,2.025,12.716A10,10,0,0,1,12.016,2C12.243,2,12.472,2.009,12.7,2.024ZM14,18V12a2,2,0,0,0-2-2H11a1,1,0,0,0,0,2h1v6a1,1,0,0,0,2,0Z"/>
    </svg>
    <span class="span-titulo-ajuste">Sistema</span>
    <div class="div-usuario-ajuste">
      <?php
      $sha1_github = "https://github.com/BluefooxGIT/Bluefoox-Folder/archive/refs/heads/main.zip";
      $sha1_github_nuevo = sha1_file( $sha1_github );
      $sha1_actual = $row_root[ 'configuracion_sha1_actualizacion' ];
      if ( $sha1_github_nuevo != $sha1_actual ) {
        echo '<label class="label-titulos-ajuste">Existe una nueva actualizaci&oacute;n.</label>';
        echo '<div class="div-actualizacion" onclick="actualizar_sistema()">Descargar y aplicar.</div>';
      } else {
        echo '<label class="label-titulos-ajuste">Versi&oacute;n estable actualizada.</label>';
      }
      ?>
      <form id="id-form-actualizar" method="post" enctype="multipart/form-data" action="">
      </form>
    </div>
  </div>
</div>
<script>
function actualizar_sistema() {
  $('#id-form-ajustes-llave').attr('action', 'bf-php/bf-ajustes-actualizar.php');
  $('#id-form-ajustes-llave').submit();
}
	
function generar_llave() {
  $('#id-form-ajustes-llave').attr('action', 'bf-php/bf-ajustes-generar-llave.php');
  $('#id-form-ajustes-llave').submit();
}
    
function personalizar_datos() {
  $('#id-form-ajustes-personalizar').attr('action', 'bf-php/bf-ajustes-interfaz-configuracion.php');
  $('#id-form-ajustes-personalizar').submit();
}

$(document).ready(function () {
  $('#id-configuracion-interfaz-color-primario').change(function () {
    var color = $(this).val();
    $('.color-code').html(color);
    $('.color').css({
      'background': color
    })
  })
})

function usuario_datos() {
  var usuario = $('#id-input-usuario-usuario').val();
  var contrasena_uno = $('#id-input-usuario-contrasena').val();
  var contrasena_dos = $('#id-input-usuario-contrasena-dos').val();
  if (usuario == '') {
    $('#id-input-usuario-usuario').val('');
    $('#id-input-usuario-usuario').focus();
    $('#id-input-usuario-usuario').attr("placeholder", "Escribe tu usuario");
  } else if (contrasena_uno == '') {
    $('#id-input-usuario-contrasena').val('');
    $('#id-input-usuario-contrasena').focus();
    $('#id-input-usuario-contrasena').attr("placeholder", "Escribe tu contraseña");
  } else if (contrasena_dos == '') {
    $('#id-input-usuario-contrasena-dos').val('');
    $('#id-input-usuario-contrasena-dos').focus();
    $('#id-input-usuario-contrasena-dos').attr("placeholder", "Confirma tu contraseña");
  } else if (contrasena_uno != contrasena_dos) {
    $('#id-input-usuario-contrasena-dos').val('');
    $('#id-input-usuario-contrasena-uno').val('');
    $('#id-input-usuario-contrasena-uno').focus();
    $('#id-input-usuario-contrasena-uno').attr("placeholder", "Tu contraseña no coincide");
  } else if (contrasena_uno == contrasena_dos && usuario != '') {
    $('#id-form-ajustes-usuario').attr('action', 'bf-php/bf-ajustes-configuracion.php');
    $('#id-form-ajustes-usuario').submit();
  }
}

function acceso_cambio_on() {
  $("#id-input-usuario-usuario").prop('disabled', false);
  $("#id-input-usuario-contrasena").prop('disabled', false);
  $("#id-input-usuario-contrasena-dos").prop('disabled', false);
  $('#id-input-usuario-contrasena-dos').show();
  $('#id-input-boton-usuario-cambiar').hide();
  $('#id-input-boton-usuario-cancelar').show();
  $('#id-input-boton-usuario-guardar').show();
}

function acceso_cambio_off() {
  $("#id-input-usuario-usuario").prop('disabled', true);
  $("#id-input-usuario-contrasena").prop('disabled', true);
  $("#id-input-usuario-contrasena-dos").prop('disabled', true);
  $('#id-input-usuario-contrasena-dos').hide();
  $('#id-input-boton-usuario-cambiar').show();
  $('#id-input-boton-usuario-cancelar').hide();
  $('#id-input-boton-usuario-guardar').hide();
}

function submenu() {
  $('#id-div-submenu').toggle();
}

$("#id-div-ajustes").click(function () {
  var herramienta_ajustes = "<?php echo urlencode( base64_encode( 'ajustes' ) );?>";
  window.location.href = "?h=" + herramienta_ajustes;
});

$("#id-div-cerrar-sesion").click(function () {
  location.href = 'bf-php/bf-cerrar-sesion.php';
});
</script> 
