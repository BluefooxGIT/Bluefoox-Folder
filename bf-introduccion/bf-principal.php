<div class="div-introduccion-configuracion">
  <svg class="svg-logo-icono" viewBox="0 0 332.8 295.1">
    <path d="M318.2,138.6c0,0-1.9-0.8-3-0.8c-1.8-0.1-0.9-0.1-5.4,0.5c-9.9,1.3-24.5,17-38.5,16.7
	C212.6,154,140,131.1,112.5,80C92.1,42.1,56.2,42.1,36.7,0c-23.6,42.7-7.5,64.3,21.6,80.5c14,7.8,38,10.8,38.8,20.7
	c2.3,5.8,6.2,43.8-84.9,47.8c-4.1,0.2-8.1,3-10.4,6.4c-2,3-1.8,10.5-1.8,10.5s189.1-25.2,266.6,116c0,0,2.1,6.5,8.3,10.5
	c10.8,7,17.9-1.8,17.9-1.8s-48.5-58.4-34.8-79.4c13.5-20.6,62.3,38.6,74.8,11.2c-7.2-5.8-8.4-7.7-12.5-12.8
	c-4.2-5.1-4.5-25.4-13.8-35.2C297.2,164.7,319.7,141.2,318.2,138.6z"/>
  </svg>
  <span class="span-texto-configuracion">Bienvenido, vamos a configurar tu usuario.</span>
  <form id="id-form-introduccion-configuracion" method="post" enctype="multipart/form-data" action="">
    <input type="text" value="" placeholder="Nombre de usuario" class="input-introduccion-configuracion-usuario" id="id-introduccion-configuracion-usuario" name="usuarios_usuario">
    <input type="password" value="" placeholder="Contrase&ntilde;a" class="input-introduccion-configuracion-contrasena" id="id-introduccion-configuracion-contrasena-uno" name="usuarios_contrasena">
    <input type="password" value="" placeholder="Repetir contrase&ntilde;a" class="input-introduccion-configuracion-contrasena" id="id-introduccion-configuracion-contrasena-dos">
    <input type="button" value="Generar usuario" class="input-introduccion-configuracion-boton" onClick="introduccion_configuracion()">
  </form>
</div>
<script>
	function introduccion_configuracion(){
		var usuario = $('#id-introduccion-configuracion-usuario').val();
		var contrasena_uno = $('#id-introduccion-configuracion-contrasena-uno').val();
		var contrasena_dos = $('#id-introduccion-configuracion-contrasena-dos').val();
		if(usuario == '') {
			$('#id-introduccion-configuracion-usuario').val('');
			$('#id-introduccion-configuracion-usuario').focus();
			$('#id-introduccion-configuracion-usuario').attr("placeholder", "Escribe tu usuario");
		}
		else if(contrasena_uno == '') {
			$('#id-introduccion-configuracion-contrasena-uno').val('');
			$('#id-introduccion-configuracion-contrasena-uno').focus();
			$('#id-introduccion-configuracion-contrasena-uno').attr("placeholder", "Escribe tu contraseña");
		}
		else if(contrasena_dos == '') {
			$('#id-introduccion-configuracion-contrasena-dos').val('');
			$('#id-introduccion-configuracion-contrasena-dos').focus();
			$('#id-introduccion-configuracion-contrasena-dos').attr("placeholder", "Confirma tu contraseña");
		}
		else if(contrasena_uno != contrasena_dos ) {
			$('#id-introduccion-configuracion-contrasena-dos').val('');
			$('#id-introduccion-configuracion-contrasena-uno').val('');
			$('#id-introduccion-configuracion-contrasena-uno').focus();
			$('#id-introduccion-configuracion-contrasena-uno').attr("placeholder", "Tu contraseña no coincide");
		} else if(contrasena_uno == contrasena_dos && usuario != '') {
			$('#id-form-introduccion-configuracion').attr('action', 'bf-php/bf-introduccion-configuracion.php');
			$('#id-form-introduccion-configuracion').submit();
		} 
	}
</script>