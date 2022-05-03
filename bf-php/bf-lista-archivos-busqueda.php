<?php
include_once( '../bf-php/bf-conexion.php' );
session_start();
$usuarios_nivel = $_SESSION[ 'usuarios_nivel' ];
if ( isset( $_POST[ 'nombre_archivo' ] ) ) {
  $archivo_busqueda = $_POST[ 'nombre_archivo' ];
  $sql_sin_registros = $mysqli->query( "SELECT * FROM bluefoox_archivos" );
  $row_sin_registros = mysqli_fetch_array( $sql_sin_registros );
  $sql_registros_archivos = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_tipo = 'a'" );
  $row_registros_archivos = mysqli_fetch_array( $sql_registros_archivos );
  $configuracion_orden = $row_configuracion[ 'configuracion_orden' ];
  $configuracion_orden_tipo = $row_configuracion[ 'configuracion_orden_tipo' ];
  if ( $usuarios_nivel == '0' ) {
    $sql_registros_busqueda = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_extension LIKE '%$archivo_busqueda%' AND archivos_usuario = '$uid' AND archivos_tipo = 'a' ORDER BY archivos_tipo $configuracion_orden_tipo, uid $configuracion_orden" );
    $sql_registros_busqueda_numero = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_extension LIKE '%$archivo_busqueda%' AND archivos_usuario = '$uid' AND archivos_tipo = 'a' ORDER BY archivos_tipo $configuracion_orden_tipo, uid $configuracion_orden" );
    $row_registros_busqueda = mysqli_fetch_array( $sql_registros_busqueda );
    $row_registros_busqueda_numero = mysqli_num_rows( $sql_registros_busqueda_numero );
  } else if ( $usuarios_nivel == '1' ) {
    $sql_registros_busqueda = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_extension LIKE '%$archivo_busqueda%' OR archivos_nombre LIKE '%$archivo_busqueda%' AND archivos_tipo = 'a' ORDER BY archivos_tipo $configuracion_orden_tipo, uid $configuracion_orden" );
    $sql_registros_busqueda_numero = $mysqli->query( "SELECT * FROM bluefoox_archivos WHERE archivos_extension LIKE '%$archivo_busqueda%' OR archivos_nombre LIKE '%$archivo_busqueda%' AND archivos_tipo = 'a' ORDER BY archivos_tipo $configuracion_orden_tipo, uid $configuracion_orden" );
    $row_registros_busqueda = mysqli_fetch_array( $sql_registros_busqueda );
    $row_registros_busqueda_numero = mysqli_num_rows( $sql_registros_busqueda_numero );
  }
}
?>
<?php echo '<div class="div-resultados" id="id-div-resultados"><svg class="svg-iconos-herramientas" viewBox="0 0 24 24"><path d="M23,7H18.191l.8-5.865a1,1,0,1,0-1.982-.27L16.173,7H9.191l.8-5.865A1,1,0,1,0,8.009.865L7.173,7H2A1,1,0,0,0,2,9H6.9l-.818,6H1a1,1,0,0,0,0,2H5.809l-.8,5.865a1,1,0,0,0,1.982.27L7.827,17h6.982l-.8,5.865a1,1,0,0,0,1.982.27L16.827,17H22a1,1,0,0,0,0-2H17.1l.818-6H23A1,1,0,0,0,23,7Zm-7.918,8H8.1l.818-6H15.9Z"/></svg><span class="span-resultados">'.$row_registros_busqueda_numero.' resultados</span></div>'; ?>
<div class="div-resultados-busqueda <?php if(!isset($row_registros_busqueda)) { echo 'div-oculto'; } ?>">
  <div id="id-div-contenedor-lista-archivos" class="<?php if(!isset($row_registros_busqueda)) { echo 'div-oculto'; } ?>">
    <div class="div-checkbox-general-eliminar">
      <label class="label-checkbox-eliminar label-checkbox-eliminar-fix">
        <input type="checkbox" id="id-seleccionar-checkbox-eliminar" class="checkbox-eliminar">
        <span class="span-checkmark-eliminar <?php if(!isset($row_registros_archivos)) { echo 'div-oculto'; } ?>"></span></label>
    </div>
    <div class="div-tipo-orden">
      <label class="label-nombre-columna">Tipo</label>
      <div class="div-svg-orden" onClick="orden_tipo()" title="<?php if($configuracion_orden_tipo == 'DESC') { echo 'Descendente'; } else if($configuracion_orden_tipo == 'ASC') { echo 'Ascendente'; }?>">
        <svg class="svg-orden <?php if($configuracion_orden_tipo == 'DESC') { echo 'svg-oculto'; }?>"  id="Outline" viewBox="0 0 24 24" width="512" height="512">
          <path d="M17.71,9.88l-4.3-4.29a2,2,0,0,0-2.82,0L6.29,9.88a1,1,0,0,0,0,1.41,1,1,0,0,0,1.42,0L11,8V19a1,1,0,0,0,2,0V8l3.29,3.29a1,1,0,1,0,1.42-1.41Z"/>
        </svg>
        <svg class="svg-orden <?php if($configuracion_orden_tipo == 'ASC') { echo 'svg-oculto'; }?>"  id="Outline" viewBox="0 0 24 24" width="512" height="512">
          <path d="M17.71,12.71a1,1,0,0,0-1.42,0L13,16V6a1,1,0,0,0-2,0V16L7.71,12.71a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.3,4.29A2,2,0,0,0,12,19h0a2,2,0,0,0,1.4-.59l4.3-4.29A1,1,0,0,0,17.71,12.71Z"/>
        </svg>
      </div>
    </div>
    <div class="div-nombre-orden">
      <label class="label-nombre-columna">Nombre</label>
      <div class="div-svg-orden" onClick="orden_archivos()" title="<?php if($configuracion_orden == 'DESC') { echo 'Descendente'; } else if($configuracion_orden == 'ASC') { echo 'Ascendente'; }?>">
        <svg class="svg-orden <?php if($configuracion_orden == 'DESC') { echo 'svg-oculto'; }?>"  id="Outline" viewBox="0 0 24 24" width="512" height="512">
          <path d="M17.71,9.88l-4.3-4.29a2,2,0,0,0-2.82,0L6.29,9.88a1,1,0,0,0,0,1.41,1,1,0,0,0,1.42,0L11,8V19a1,1,0,0,0,2,0V8l3.29,3.29a1,1,0,1,0,1.42-1.41Z"/>
        </svg>
        <svg class="svg-orden <?php if($configuracion_orden == 'ASC') { echo 'svg-oculto'; }?>"  id="Outline" viewBox="0 0 24 24" width="512" height="512">
          <path d="M17.71,12.71a1,1,0,0,0-1.42,0L13,16V6a1,1,0,0,0-2,0V16L7.71,12.71a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.3,4.29A2,2,0,0,0,12,19h0a2,2,0,0,0,1.4-.59l4.3-4.29A1,1,0,0,0,17.71,12.71Z"/>
        </svg>
      </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data" id="id-form-eliminar-archivos">
      <?php do { include( '../bf-php/bf-tipo-archivos.php' ); ?>
      <?php $uid_archivo_temp = $row_registros_busqueda['uid']; if ($uid_archivo_temp == ' ') { $uid_archivo = 'null'; } else { $uid_archivo = $uid_archivo_temp; } ?>
      <div id="id-archivo-detalles-<?php echo $uid_archivo; ?>" class="div-archivo-detalles hvr-forward">
        <div class="div-checkbox-eliminar">
          <label class="label-checkbox-eliminar<?php if($row_registros_busqueda['archivos_tipo'] == 'c') { echo '-oculto'; } ?>">
            <input type="checkbox" id="id-checkbox-eliminar" onClick="boton_eliminar()" class="checkbox-eliminar" name="checkbox-eliminar[]" value="<?php echo $row_registros_busqueda["uid"]; ?>">
            <span class="span-checkmark-eliminar"></span></label>
        </div>
        <?php
        if ( $row_registros_busqueda[ 'archivos_tipo' ] == 'c' ) {
          $url_carpeta_temp = $archivos_url . '/' . $row_registros_busqueda[ 'archivos_nombre' ];
          $url_carpeta = '?r=' . urlencode( base64_encode( $url_carpeta_temp ) );
          echo '<a class="a-archivo" href="' . $url_carpeta . '">';
        } else if ( $row_registros_busqueda[ 'archivos_tipo' ] == 'a' ) {
          $archivos_extension = $row_registros_busqueda[ "archivos_extension" ];
          if ( $archivos_extension == 'jpg' || $archivos_extension == 'jpeg' || $archivos_extension == 'png' || $archivos_extension == 'mp4' || $archivos_extension == 'pdf' ) {
            echo '<a class="span-titulo-vista-previa" onClick="vista_previa_' . $row_registros_busqueda[ "uid" ] . '()">';
          } else if ( $archivos_extension == 'mp3' ) {
            echo '<a class="span-titulo-vista-previa" onClick="vista_previa_' . $row_registros_busqueda[ "uid" ] . '()">';
          }
        }
        ?>
        <div class="div-icono-archivo"><img src="../bf-archivos/bf-png/<?php echo $icono_archivo; ?>.png" class="png-icono-archivo" draggable="false"></div>
        <div class="div-archivo">
          <div class="div-titulo-archivo">
            <div class="div-texto-ellipsis"> </div>
            <div class="f">
              <div class="s">
                <div class="<?php $rango_nombre_archivo = strlen($row_registros_busqueda['archivos_nombre']); if($rango_nombre_archivo > '30') { echo 't'; } else { echo 'tt'; } ?>">
                  <?php if($row_registros_busqueda['archivos_tipo'] == 'c') { if(isset($row_registros_busqueda['archivos_nombre'])) { echo $row_registros_busqueda['archivos_nombre']; }} else if($row_registros_busqueda['archivos_tipo'] == 'a') { if(isset($row_registros_busqueda['archivos_nombre'])) { echo $row_registros_busqueda['archivos_nombre']; }}?>
                </div>
              </div>
            </div>
          </div>
          <?php if($row_registros_busqueda['archivos_tipo'] == 'c') { $url_carpeta_temp = $archivos_url.'/'.$row_registros_busqueda['archivos_nombre']; $url_carpeta = '?r='.urlencode( base64_encode( $url_carpeta_temp ) ); echo '</a>'; } else if($row_registros_busqueda['archivos_tipo'] == 'a') { echo '</a>'; }?>
          <input type="hidden" id="id-input-archivos-nombre-<?php echo $uid_archivo; ?>" name="archivos_nombre" value="<?php if(isset($row_registros_busqueda['archivos_nombre'])) { $nombre_archivo_fix = mb_strimwidth($row_registros_busqueda['archivos_nombre'], 0, 24, "... "); echo preg_replace('/\\.[^.\\s]{3,4}$/', '', $nombre_archivo_fix); } ?>">
          <input type="hidden" id="id-input-archivos-extension-<?php echo $uid_archivo; ?>" name="archivos_extension" value="<?php echo $row_registros_busqueda['archivos_extension']; ?>">
          <input type="hidden" id="id-input-archivos-tamano-<?php echo $uid_archivo; ?>" name="archivos_tamano" value="<?php if($row_registros_busqueda['archivos_tipo'] == 'a') { $archivo_tamano_temp = filesize(''.$row_registros_busqueda['archivos_url'].'/'.$row_registros_busqueda['archivos_nombre']); if ($archivo_tamano_temp >= 1073741824) {
            echo $archivo_tamano_temp = number_format($archivo_tamano_temp / 1073741824, 2) . ' GB'; } else if ($archivo_tamano_temp >= 1048576) { echo $archivo_tamano_temp = number_format($archivo_tamano_temp / 1048576, 2) . ' MB'; } else if ($archivo_tamano_temp >= 1024) { echo $archivo_tamano_temp = number_format($archivo_tamano_temp / 1024, 2) . ' KB'; } else if ($archivo_tamano_temp > 1) { echo $archivo_tamano_temp = $archivo_tamano_temp . ' bytes'; } else if ($archivo_tamano_temp == 1) { echo $archivo_tamano_temp = $archivo_tamano_temp . ' byte'; } else { echo $archivo_tamano_temp = '0 bytes'; } } ?>">
          <input type="hidden" id="id-input-archivos-modificacion-<?php echo $uid_archivo; ?>" name="archivos_modificacion" value="<?php echo $row_registros_busqueda['archivos_modificacion']; ?>">
        </div>
        <div id="id-div-submenu-archivos-<?php echo $uid_archivo; ?>" class="div-submenu-archivos">
          <svg class="svg-submenu-archivos" viewBox="0 0 24 24">
            <circle cx="12" cy="2" r="2"/>
            <circle cx="12" cy="12" r="2"/>
            <circle cx="12" cy="22" r="2"/>
          </svg>
        </div>
        <div id="id-div-subherramientas-archivos-<?php echo $uid_archivo; ?>" class="div-subherramientas-archivos">
          <div class="<?php if($row_registros_busqueda['archivos_tipo'] == 'c') { echo 'div-oculto'; } else { echo 'div-herramientas-archivos'; } ?>" title="Copiar" onClick="copiar_<?php echo $uid_archivo; ?>();lista_navegador_copiar()">
            <svg class="svg-herramientas-archivos" viewBox="0 0 24 24">
              <path d="M21.155,3.272,18.871.913A3.02,3.02,0,0,0,16.715,0H12A5.009,5.009,0,0,0,7.1,4H7A5.006,5.006,0,0,0,2,9V19a5.006,5.006,0,0,0,5,5h6a5.006,5.006,0,0,0,5-5v-.1A5.009,5.009,0,0,0,22,14V5.36A2.988,2.988,0,0,0,21.155,3.272ZM13,22H7a3,3,0,0,1-3-3V9A3,3,0,0,1,7,6v8a5.006,5.006,0,0,0,5,5h4A3,3,0,0,1,13,22Zm4-5H12a3,3,0,0,1-3-3V5a3,3,0,0,1,3-3h4V4a2,2,0,0,0,2,2h2v8A3,3,0,0,1,17,17Z"/>
            </svg>
          </div>
          <div class="<?php if($row_registros_busqueda['archivos_tipo'] == 'c') { echo 'div-oculto'; } else { echo 'div-herramientas-archivos'; } ?>" title="Mover" onClick="mover_<?php echo $uid_archivo; ?>();lista_navegador_mover()">
            <svg class="svg-herramientas-archivos" viewBox="0 0 24 24">
              <path d="M16.9,14.723a1,1,0,0,0,1.414,0l4.949-4.95a2.5,2.5,0,0,0,0-3.536l-4.95-4.949A1,1,0,0,0,16.9,2.7L21.2,7,5,7H5a5,5,0,0,0-5,5v7a5.006,5.006,0,0,0,5,5H19a1,1,0,0,0,0-2H5a3,3,0,0,1-3-3V12A3,3,0,0,1,5,9H5L21.212,9,16.9,13.309A1,1,0,0,0,16.9,14.723Z"/>
            </svg>
          </div>
          <div class="div-herramientas-archivos" title="Renombrar" onClick="renombrar_<?php echo $uid_archivo; ?>()">
            <svg class="svg-herramientas-archivos" viewBox="0 0 24 24">
              <path d="M22.853,1.148a3.626,3.626,0,0,0-5.124,0L1.465,17.412A4.968,4.968,0,0,0,0,20.947V23a1,1,0,0,0,1,1H3.053a4.966,4.966,0,0,0,3.535-1.464L22.853,6.271A3.626,3.626,0,0,0,22.853,1.148ZM5.174,21.122A3.022,3.022,0,0,1,3.053,22H2V20.947a2.98,2.98,0,0,1,.879-2.121L15.222,6.483l2.3,2.3ZM21.438,4.857,18.932,7.364l-2.3-2.295,2.507-2.507a1.623,1.623,0,1,1,2.295,2.3Z"/>
            </svg>
          </div>
          <a class="a-subherramienta" href="bf-php/bf-descargar-archivo.php?u=<?php echo $uid_archivo; ?>">
          <div class="<?php if($row_registros_busqueda['archivos_tipo'] == 'c') { echo 'div-oculto'; } else { echo 'div-herramientas-archivos'; } ?>" title="Descargar">
            <svg class="svg-herramientas-archivos" viewBox="0 0 24 24">
              <path d="M9.878,18.122a3,3,0,0,0,4.244,0l3.211-3.211A1,1,0,0,0,15.919,13.5l-2.926,2.927L13,1a1,1,0,0,0-1-1h0a1,1,0,0,0-1,1l-.009,15.408L8.081,13.5a1,1,0,0,0-1.414,1.415Z"/>
              <path d="M23,16h0a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V17a1,1,0,0,0-1-1H1a1,1,0,0,0-1,1v4a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V17A1,1,0,0,0,23,16Z"/>
            </svg>
          </div>
          </a><a class="a-subherramienta" onClick="eliminar_archivo_<?php echo $uid_archivo; ?>()" id="a-eliminar-archivo-<?php echo $uid_archivo; ?>">
          <div class="<?php if($row_registros_busqueda['archivos_tipo'] == 'c') { echo 'div-oculto'; } else { echo 'div-herramientas-archivos'; } ?>" title="Eliminar">
            <svg class="svg-herramientas-archivos" viewBox="0 0 24 24">
              <path d="M21,4H17.9A5.009,5.009,0,0,0,13,0H11A5.009,5.009,0,0,0,6.1,4H3A1,1,0,0,0,3,6H4V19a5.006,5.006,0,0,0,5,5h6a5.006,5.006,0,0,0,5-5V6h1a1,1,0,0,0,0-2ZM11,2h2a3.006,3.006,0,0,1,2.829,2H8.171A3.006,3.006,0,0,1,11,2Zm7,17a3,3,0,0,1-3,3H9a3,3,0,0,1-3-3V6H18Z"/>
              <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18Z"/>
              <path d="M14,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/>
            </svg>
          </div>
          </a> </div>
      </div>
      <input type="hidden" id="id-nombre-archivo-<?php echo $uid_archivo; ?>" value="<?php $nombre_archivo = pathinfo('../'.$row_registros_busqueda['archivos_url'].'/'.$row_registros_busqueda['archivos_nombre']); echo $nombre_archivo['filename']; ?>">
      <input type="hidden" id="id-tipo-archivo-<?php echo $uid_archivo; ?>" value="<?php echo $row_registros_busqueda['archivos_tipo']; ?>">
      <input type="hidden" id="id-extension-archivo-<?php echo $uid_archivo; ?>" value="<?php echo $row_registros_busqueda['archivos_extension']; ?>">
      <script language="JavaScript" type="text/javascript">
    $("#id-archivo-detalles-<?php echo $uid_archivo; ?>").mouseover(function () {
      var ancho_pagina = window.outerWidth;
      if (ancho_pagina > 768) {
        $('#id-div-subherramientas-archivos-<?php echo $uid_archivo; ?>').show();
        $('.div-subherramientas-archivos:not(#id-div-subherramientas-archivos-<?php echo $uid_archivo; ?>)').hide();
      }
    }).mouseout(function () {
      var ancho_pagina = window.outerWidth;
      if (ancho_pagina > 768) {
        $('#id-div-subherramientas-archivos-<?php echo $uid_archivo; ?>').hide();
      }
    });

    $("#id-div-submenu-archivos-<?php echo $uid_archivo; ?>").click(function () {
      var ancho_pagina = window.outerWidth;
      if (ancho_pagina <= 768) {
        $('#id-div-subherramientas-archivos-<?php echo $uid_archivo; ?>').toggle();
        $('.div-subherramientas-archivos:not(#id-div-subherramientas-archivos-<?php echo $uid_archivo; ?>)').hide();
      }
    });

    function eliminar_archivo_<?php echo $uid_archivo; ?>() {
      $('#id-img-vista-previa').hide();
      $('#id-audio-vista-previa').hide();
      $('#id-video-vista-previa').hide();
      $('#id-pdf-vista-previa').hide();
      $('#id-audio-vista-previa').get(0).pause();
      $('#id-audio-vista-previa').get(0).currentTime = 0;
      $('#id-video-vista-previa').get(0).pause();
      $('#id-video-vista-previa').get(0).currentTime = 0;
      $('#id-div-mover').hide();
      $('#id-div-copiar').hide();
      $('#id-div-renombrar').hide();
      $('#id-div-alerta').show();
      $('#id-div-vista-previa-contenedor').hide();
      $('#id-div-alerta-contenedor').show();
      $('.div-alerta').css('width', '18%');
      $("#id-span-titulo-alerta").text('¿Quieres eliminar este archivo?');
      $("#id-alerta-aceptar").click(function () {
        $('#id-div-carga').show();
        location.href = 'bf-php/bf-eliminar-archivos.php?e=s&u=<?php echo $uid_archivo; ?>';
      });
      $("#id-alerta-cancelar").click(function () {
        $("#id-span-alerta").text('');
        $('#id-div-alerta').hide();
        $('#id-div-alerta-contenedor').hide();
      });
    }

    function copiar_<?php echo $uid_archivo; ?>() {
      $("body").css("overflow", "hidden");
      $('#id-img-vista-previa').hide();
      $('#id-audio-vista-previa').hide();
      $('#id-video-vista-previa').hide();
      $('#id-pdf-vista-previa').hide();
      $('#id-audio-vista-previa').get(0).pause();
      $('#id-audio-vista-previa').get(0).currentTime = 0;
      $('#id-video-vista-previa').get(0).pause();
      $('#id-video-vista-previa').get(0).currentTime = 0;
      $('#id-div-alerta-contenedor').hide();
      $('#id-div-mover').hide();
      $('#id-div-alerta').show();
      $('#id-div-copiar').show();
      $('#id-div-renombrar').hide();
      $('#id-div-vista-previa-contenedor').hide();
      $('.div-alerta').css('width', '30%');
      $('#id-span-copiar').text('Copiar');
      var directorio_copia_archivo_original = '../<?php echo $row_registros_busqueda['archivos_url']; ?>/<?php echo $row_registros_busqueda['archivos_nombre']; ?>';
      var uid_copiar = '<?php echo $uid_archivo; ?>';
      $('#id-input-directorio-copia-origen').val(directorio_copia_archivo_original);
      $('#id-input-nuevo-nombre').val('<?php echo $row_registros_busqueda['archivos_nombre']; ?>');
      $('#id-input-id-renombrar').val(uid_copiar);
    }

    function mover_<?php echo $uid_archivo; ?>() {
      $('#id-img-vista-previa').hide();
      $('#id-audio-vista-previa').hide();
      $('#id-video-vista-previa').hide();
      $('#id-pdf-vista-previa').hide();
      $('#id-audio-vista-previa').get(0).pause();
      $('#id-audio-vista-previa').get(0).currentTime = 0;
      $('#id-video-vista-previa').get(0).pause();
      $('#id-video-vista-previa').get(0).currentTime = 0;
      $('#id-div-alerta-contenedor').hide();
      $('#id-div-copiar').hide();
      $('#id-div-alerta').show();
      $('#id-div-mover').show();
      $('#id-div-renombrar').hide();
      $('#id-div-vista-previa-contenedor').hide();
      $('.div-alerta').css('width', '30%');
      $('#id-span-mover').text('Mover');
      var directorio_mover_archivo_original = '../<?php echo $row_registros_busqueda['archivos_url']; ?>/<?php echo $row_registros_busqueda['archivos_nombre']; ?>';
      var uid_mover = '<?php echo $uid_archivo; ?>';
      $('#id-input-directorio-copia-origen').val(directorio_mover_archivo_original);
      $('#id-input-nuevo-nombre').val('<?php echo $row_registros_busqueda['archivos_nombre']; ?>');
      $('#id-input-id-renombrar').val(uid_mover);
    }

    function renombrar_<?php echo $uid_archivo; ?>() {
      $('#id-img-vista-previa').hide();
      $('#id-audio-vista-previa').hide();
      $('#id-video-vista-previa').hide();
      $('#id-pdf-vista-previa').hide();
      $('#id-audio-vista-previa').get(0).pause();
      $('#id-audio-vista-previa').get(0).currentTime = 0;
      $('#id-video-vista-previa').get(0).pause();
      $('#id-video-vista-previa').get(0).currentTime = 0;
      $('#id-div-alerta-contenedor').hide();
      $('#id-div-alerta').show();
      $('#id-div-copiar').hide();
      $('#id-div-mover').hide();
      $('#id-div-renombrar').show();
      $('#id-div-vista-previa-contenedor').hide();
      $('.div-alerta').css('width', '21%');
      $('#id-span-nuevo-nombre').text('Reenombrar');
      var uid_renombrar = '<?php echo $uid_archivo; ?>';
      var tipo_renombrar = $('#id-tipo-archivo-<?php echo $uid_archivo; ?>').val();
      var nombre_actual = $('#id-nombre-archivo-<?php echo $uid_archivo; ?>').val();
      var extension_actual = $('#id-extension-archivo-<?php echo $uid_archivo; ?>').val();
      $('#id-input-id-renombrar').val(uid_renombrar);
      $('#id-input-tipo-renombrar').val(tipo_renombrar);
      $('#id-input-extension-renombrar').val(extension_actual);
      $('#id-renombrar-nuevo-nombre').attr("placeholder", nombre_actual);
    }
     
function vista_previa_<?php echo $uid_archivo; ?>() {
  var posicion_scrollbar = this.scrollY;
  if (posicion_scrollbar < 768) {
    $("#id-div-vista-previa-contenedor").css('top', posicion_scrollbar);
  }
  $('#id-div-alerta').show();
  $('#id-div-vista-previa-contenedor').show();
  $('#id-div-renombrar').hide();
  $('#id-div-copiar').hide();
  $('#id-div-mover').hide();
  $('#id-div-alerta-contenedor').hide();
  var archivo_nombre_<?php echo $uid_archivo; ?> = $('#id-input-archivos-nombre-<?php echo $uid_archivo; ?>').val();
  var archivo_extension_<?php echo $uid_archivo; ?> = $('#id-input-archivos-extension-<?php echo $uid_archivo; ?>').val();
  var archivo_tamano_<?php echo $uid_archivo; ?> = $('#id-input-archivos-tamano-<?php echo $uid_archivo; ?>').val();
  var archivo_modificacion_<?php echo $uid_archivo; ?> = $('#id-input-archivos-modificacion-<?php echo $uid_archivo; ?>').val();
  if (archivo_extension_<?php echo $uid_archivo; ?> == 'jpg' || archivo_extension_<?php echo $uid_archivo; ?> == 'jpeg' || archivo_extension_<?php echo $uid_archivo; ?> == 'png') {
    $('#id-img-vista-previa').attr('src', '<?php echo '../'.$row_registros_busqueda['archivos_url'].'/'.$row_registros_busqueda['archivos_nombre']; ?>');
    <?php $tipo_archivo = $row_registros_busqueda[ 'archivos_extension' ]; if( $tipo_archivo == 'jpg') { list($ancho_img, $alto_img) = getimagesize('../'.$row_registros_busqueda['archivos_url'].'/'.$row_registros_busqueda['archivos_nombre']); } ?>
    var archivo_ancho_<?php echo $uid_archivo; ?> = <?php if(isset($ancho_img)) { echo $ancho_img; } else { echo '0'; } ?>;
    var archivo_alto_<?php echo $uid_archivo; ?> = <?php if(isset($alto_img)) { echo $alto_img; } else { echo '0'; } ?>;
    if (archivo_ancho_<?php echo $uid_archivo; ?> > archivo_alto_<?php echo $uid_archivo; ?>) {
      $("#id-img-vista-previa").addClass('img-vista-previa-landscape');
      $("#id-img-vista-previa").removeClass('img-vista-previa-portrait');
      $("#id-div-contenedor-descripcion").addClass('div-contenedor-descripcion-landscape');
      $("#id-div-contenedor-descripcion").removeClass('div-contenedor-descripcion-portrait');
      if (posicion_scrollbar <= 768) {
        $('.div-alerta').css('width', '60%');
      } else {
        $('.div-alerta').css('width', '100%');
      }
    } else {
      $("#id-img-vista-previa").removeClass('img-vista-previa-landscape');
      $("#id-img-vista-previa").addClass('img-vista-previa-portrait');
      $("#id-div-contenedor-descripcion").removeClass('div-contenedor-descripcion-landscape');
      $("#id-div-contenedor-descripcion").addClass('div-contenedor-descripcion-portrait');
      if (posicion_scrollbar <= 768) {
        $('.div-alerta').css('width', '60%');
      } else {
        $('.div-alerta').css('width', '100%');
      }
    }
    $('#id-img-vista-previa').show();
    $('#id-audio-vista-previa').hide();
    $('#id-video-vista-previa').hide();
    $('#id-pdf-vista-previa').hide();
  } else if (archivo_extension_<?php echo $uid_archivo; ?> == 'mp3') {
    var archivo_ancho_<?php echo $uid_archivo; ?> = <?php echo '0'; ?>;
    var archivo_alto_<?php echo $uid_archivo; ?> = <?php echo '0'; ?>;
    $('#id-img-vista-previa').hide();
    $('#id-video-vista-previa').hide();
    $('#id-audio-vista-previa').show();
    $('#id-pdf-vista-previa').hide();
    $("#id-audio-vista-previa").attr('src', '<?php echo '../'.$row_registros_busqueda['archivos_url'].'/'.$row_registros_busqueda['archivos_nombre']; ?>');
    $('.div-alerta').css('width', '60%');
  } else if (archivo_extension_<?php echo $uid_archivo; ?> == 'mp4' || archivo_extension_<?php echo $uid_archivo; ?> == 'mkv' || archivo_extension_<?php echo $uid_archivo; ?> == 'ogg' || archivo_extension_<?php echo $uid_archivo; ?> == 'webm') {
    var archivo_ancho_<?php echo $uid_archivo; ?> = <?php echo '0'; ?>;
    var archivo_alto_<?php echo $uid_archivo; ?> = <?php echo '0'; ?>;
    $('#id-img-vista-previa').hide();
    $('#id-audio-vista-previa').hide();
    $('#id-video-vista-previa').show();
    $('#id-pdf-vista-previa').hide();
    $("#id-video-vista-previa").attr('src', '<?php echo '../'.$row_registros_busqueda['archivos_url'].'/'.$row_registros_busqueda['archivos_nombre']; ?>');
    $("#id-video-vista-previa").attr('type', 'video/mp4');
    $('.div-alerta').css('width', '60%');
  } else if (archivo_extension_<?php echo $uid_archivo; ?> == 'pdf') {
    var archivo_ancho_<?php echo $uid_archivo; ?> = <?php echo '0'; ?>;
    var archivo_alto_<?php echo $uid_archivo; ?> = <?php echo '0'; ?>;
    $('#id-img-vista-previa').hide();
    $('#id-audio-vista-previa').hide();
    $('#id-video-vista-previa').hide();
    $('#id-pdf-vista-previa').show();
    $("#id-pdf-vista-previa").attr('src', '<?php echo '../'.$row_registros_busqueda['archivos_url'].'/'.$row_registros_busqueda['archivos_nombre']; ?>');
    $("#id-video-vista-previa").attr('type', 'application/pdf');
    $('.div-alerta').css('width', '60%');
  } else {
    var archivo_ancho_<?php echo $uid_archivo; ?> = <?php echo '0'; ?>;
    var archivo_alto_<?php echo $uid_archivo; ?> = <?php echo '0'; ?>;
    $('#id-img-vista-previa').hide();
    $('#id-audio-vista-previa').hide();
    $('#id-video-vista-previa').hide();
    $('.div-alerta').css('width', '60%');
  }
  $('#id-span-archivo-nombre').text(archivo_nombre_<?php echo $uid_archivo; ?>);
  $('#id-span-archivo-extension').text('Extensión: ' + archivo_extension_<?php echo $uid_archivo; ?>);
  $('#id-span-archivo-tamano').text('Tamaño: ' + archivo_tamano_<?php echo $uid_archivo; ?>);
  if (archivo_extension_<?php echo $uid_archivo; ?> == 'jpg' || archivo_extension_<?php echo $uid_archivo; ?> == 'jpeg' || archivo_extension_<?php echo $uid_archivo; ?> == 'png') {
    $('#id-span-archivo-ancho').text('Ancho: ' + archivo_ancho_<?php echo $uid_archivo; ?> + 'px');
    $('#id-svg-ancho').show();
  } else {
    $('#id-svg-ancho').hide();
  }
  if (archivo_extension_<?php echo $uid_archivo; ?> == 'jpg' || archivo_extension_<?php echo $uid_archivo; ?> == 'jpeg' || archivo_extension_<?php echo $uid_archivo; ?> == 'png') {
    $('#id-span-archivo-alto').text('Alto: ' + archivo_alto_<?php echo $uid_archivo; ?> + 'px');
    $('#id-svg-alto').show();
  } else {
    $('#id-svg-alto').hide();
  }
  $('#id-audio-vista-previa').get(0).pause();
  $('#id-audio-vista-previa').get(0).currentTime = 0;
  $('#id-video-vista-previa').get(0).pause();
  $('#id-video-vista-previa').get(0).currentTime = 0;
}
    </script>
      <?php } while ($row_registros_busqueda = mysqli_fetch_assoc($sql_registros_busqueda)); ?>
      <input type="hidden" id="id-input-retorno-carpeta" name="retorno-carpeta" value="<?php $url_directorio = explode('/', $archivos_url); $directorios = $url_directorio; $directorios_texto = array_slice($directorios, 0, -1); echo implode('/', $directorios_texto); ?>">
      <input type="hidden" id="id-input-dominio" name="input-dominio" value="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/?r="; ?>">
      <input type="hidden" id="id-input-orden" name="input-orden">
      <input type="hidden" id="id-input-id-renombrar" name="input-id-renombrar">
      <input type="hidden" id="id-input-tipo-renombrar" name="input-tipo-renombrar">
      <input type="hidden" id="id-input-extension-renombrar" name="input-extension-renombrar">
      <input type="hidden" id="id-input-nuevo-nombre" name="nombre-nuevo-archivo">
      <input type="hidden" id="id-input-directorio-copia-origen" name="directorio-copia-origen">
      <input type="hidden" id="id-input-directorio-copia-destino" name="directorio-copia-destino">
      <input type="hidden" id="id-input-directorio-copia-registro" name="directorio-copia-registro">
    </form>
  </div>
</div>
