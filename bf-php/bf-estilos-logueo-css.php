<?php
include_once( 'bf-php/bf-conexion.php' );
$sql_configuracion = $mysqli->query( "SELECT * FROM bluefoox_configuracion WHERE uid = '1'" );
$row_configuracion = mysqli_fetch_array( $sql_configuracion );
?>
<style>
@charset "utf-8";
@font-face {
    font-family: "Roboto-Regular";
    src: url("/bf-archivos/bf-fuente/Roboto-Regular.ttf");
}
@font-face {
    font-family: "Roboto-Bold";
    src: url("/bf-archivos/bf-fuente/Roboto-Bold.ttf");
}
body {
    margin: 0px;
    padding: 0px;
    background-color: #ffffff !important;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: url("/bf-archivos/bf-png/bg.jpg");
    background-position: center;
    background-attachment: fixed;
    background-size: contain;
    background-repeat: no-repeat;
}
input {
    font-family: "Roboto-Regular";
    outline: none;
}
.svg-logo-icono {
    width: 21%;
    padding: 12px 0px 12px 0px;
    fill: #8c8c8c;
}

@media only screen and (max-width: 460px) {
.svg-logo-icono {
    width: 18% !important;
}
}

@media only screen and (max-width: 920px) {
.svg-logo-icono {
    width: 12%;
}
}
/*DIV*/
.div-introduccion-legales {
    position: absolute;
    bottom: 9px;
    text-align: center;
    font-size: 0.70em;
    font-family: "Roboto-Regular";
    color: #666666;
    margin: 0px auto;
    width: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.div-introduccion-configuracion {
    width: 380px;
    text-align: center;
    padding: 12px 18px;
    background-color: transparent;
    position: absolute;
    left: 50%;
    top: 46%;
    transform: translate(-50%, -50%);
}
/*SPAN*/
.span-texto-configuracion {
    font-size: 0.90em;
    font-family: "Roboto-Regular";
    color: #19334d;
    display: block;
    padding: 21px 0px;
}
.input-introduccion-configuracion-boton {
    border-radius: 30px;
    font-size: 0.90em;
    padding: 9px 0px;
    width: 101%;
    display: block;
    margin: 0px 0px 0px 0px;
    color: #ffffff;
background-color:<?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
border: 2px solid <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
    transition: all .3s ease;
}
.input-introduccion-configuracion-boton:hover {
background-color:<?php echo $row_configuracion['configuracion_interfaz_color_secundario'];
?>;
border: 2px solid <?php echo $row_configuracion['configuracion_interfaz_color_secundario'];
?>;
    color: #ffffff;
    cursor: pointer;
}
/*INPUT*/
.input-introduccion-configuracion-contrasena {
    border-radius: 30px;
    font-size: 0.90em;
    padding: 9px 0px;
    width: 100%;
    display: block;
    margin: 0px 0px 12px 0px;
    color: #000000;
    text-align: center;
    background-color: #ffffff;
border: 2px solid <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
    transition: all .3s ease;
}
.input-introduccion-configuracion-contrasena:hover {
border: 2px solid <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
.input-introduccion-configuracion-usuario {
    border-radius: 30px;
    font-size: 0.90em;
    padding: 9px 0px;
    width: 100%;
    display: block;
    margin: 0px 0px 12px 0px;
    color: #000000;
    text-align: center;
    background-color: #ffffff;
border: 2px solid <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
    transition: all .3s ease;
}
.input-introduccion-configuracion-usuario:hover {
border: 2px solid <?php echo $row_configuracion['configuracion_interfaz_color_primario'];
?>;
}
</style>
