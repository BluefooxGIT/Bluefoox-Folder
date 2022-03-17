<div class="div-introduccion-configuracion">
  <svg class="svg-logo-icono" viewBox="0 0 332.8 295.1">
    <path d="M318.2,138.6c0,0-1.9-0.8-3-0.8c-1.8-0.1-0.9-0.1-5.4,0.5c-9.9,1.3-24.5,17-38.5,16.7
	C212.6,154,140,131.1,112.5,80C92.1,42.1,56.2,42.1,36.7,0c-23.6,42.7-7.5,64.3,21.6,80.5c14,7.8,38,10.8,38.8,20.7
	c2.3,5.8,6.2,43.8-84.9,47.8c-4.1,0.2-8.1,3-10.4,6.4c-2,3-1.8,10.5-1.8,10.5s189.1-25.2,266.6,116c0,0,2.1,6.5,8.3,10.5
	c10.8,7,17.9-1.8,17.9-1.8s-48.5-58.4-34.8-79.4c13.5-20.6,62.3,38.6,74.8,11.2c-7.2-5.8-8.4-7.7-12.5-12.8
	c-4.2-5.1-4.5-25.4-13.8-35.2C297.2,164.7,319.7,141.2,318.2,138.6z"/>
  </svg>
  <div id="id-div-acceso">
    <form id="id-form-acceso-bluefoox-documentos" method="post" enctype="multipart/form-data" action="">
      <input type="text" value="" placeholder="Nombre de usuario" class="input-introduccion-configuracion-usuario" id="id-acceso-bluefoox-documentos-usuario" name="usuarios_usuario">
      <input type="password" value="" placeholder="Contrase&ntilde;a" class="input-introduccion-configuracion-contrasena" id="id-acceso-bluefoox-documentos-contrasena" name="usuarios_contrasena">
      <input type="button" value="Ingresar" class="input-introduccion-configuracion-boton" onClick="acceso_bluefoox_documentos()">
    </form>
  </div>
  <div id="id-div-llave" class="div-oculto">
    <form id="id-form-acceso-llave" method="post" enctype="multipart/form-data" action="">
      <input type="file" value="" placeholder="Seleccionar llave" class="input-archivo input-archivo-llave" id="id-input-archivos" name="input_llave_acceso" accept=".key" onChange="acceso_llave()">
      <label for="id-input-archivos">
        <svg class="svg-input" viewBox="0 0 24 24">
          <path d="M11.007,2.578,11,18.016a1,1,0,0,0,1,1h0a1,1,0,0,0,1-1l.007-15.421,2.912,2.913a1,1,0,0,0,1.414,0h0a1,1,0,0,0,0-1.414L14.122.879a3,3,0,0,0-4.244,0L6.667,4.091a1,1,0,0,0,0,1.414h0a1,1,0,0,0,1.414,0Z"/>
          <path d="M22,17v4a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V17a1,1,0,0,0-1-1H1a1,1,0,0,0-1,1v4a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V17a1,1,0,0,0-1-1h0A1,1,0,0,0,22,17Z"/>
        </svg>
        <span class="span-input-files">Selecciona la llave&hellip;</span></label>
    </form>
  </div>
  <div id="id-div-cambio-acceso" onClick="cambio_acceso()" class="div-texto-acceso">Acceso con llave</div>
</div>
<div class="div-introduccion-legales">Copyright © <?php echo date('Y'); ?> Bluefoox Electronics. Todos los derechos reservados.</div>
<script>
function cambio_acceso() {
    $('#id-div-acceso').toggle();
    $('#id-div-llave').toggle();
    var tipo_acceso_texto = $('#id-div-cambio-acceso').text();
    if(tipo_acceso_texto == 'Acceso con llave') {
        $('#id-div-cambio-acceso').text('Acceso normal');
    } else {
        $('#id-div-cambio-acceso').text('Acceso con llave');
    }
}
function acceso_llave() {
  $('#id-form-acceso-llave').attr('action', 'bf-php/bf-acceso-bluefoox-documentos-llave.php');
  $('#id-form-acceso-llave').submit();
}

function acceso_bluefoox_documentos() {
  var usuario = $('#id-acceso-bluefoox-documentos-usuario').val();
  var contrasena = $('#id-acceso-bluefoox-documentos-contrasena').val();
  if (usuario == '') {
    $('#id-acceso-bluefoox-documentos-usuario').val('');
    $('#id-acceso-bluefoox-documentos-usuario').focus();
    $('#id-acceso-bluefoox-documentos-usuario').attr("placeholder", "Escribe tu usuario");
  } else if (contrasena == '') {
    $('#id-acceso-bluefoox-documentos-contrasena').val('');
    $('#id-acceso-bluefoox-documentos-contrasena').focus();
    $('#id-acceso-bluefoox-documentos-contrasena').attr("placeholder", "Escribe tu contraseña");
  } else if (usuario != '' && contrasena != '') {
    $('#id-form-acceso-bluefoox-documentos').attr('action', 'bf-php/bf-acceso-bluefoox-documentos.php');
    $('#id-form-acceso-bluefoox-documentos').submit();
  }
}
</script> 
