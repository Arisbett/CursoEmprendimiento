<?php
ini_set("display_errors", "0");

header("X-XSS-Protection: 1");
header('X-Frame-Options: DENY');
header('X-Frame-Options: SAMEORIGIN');
//header("Cache-Control: no-store, no-cache, must-revalidate");
//header("Pragma: no-cache");
header( 'X-Content-Type-Options: nosniff' );
session_start();


ini_set('default_charset','utf8');

include("includes/cur_seguridad.php");

$idAlumno = $_SESSION["idAlumno"];
$nombre = $_SESSION["nombre"];
$idGrupo = $_SESSION["idGrupo"];
$nombre_grupo = $_SESSION["nombre_grupo"];
$fecha_inicio = $_SESSION["fecha_inicio"]; 
$fecha_fin = $_SESSION["fecha_fin"];
$id_generacion = $_SESSION["id_generacion"];

?>
<!DOCTYPE html>
<html lang="es">
<style type="text/css" media="print">
	@media print {
		#parte1 {display:none;}
}
</style>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WMZMQHZ');</script>
<!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CONDUSEF | CURSO DE EMPRENDIMIENTO</title>
    <!-- CSS -->
    <link href="/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">
    <?php require_once ('seguimiento.php');?>
</head>


<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WMZMQHZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<main class="page">

<nav class="navbar navbar-inverse sub-navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subenlaces">
        <span class="sr-only">Interruptor de Navegaci&oacute;n</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="Modulos.php">Inicio</a>
    </div>
    <div class="collapse navbar-collapse" id="subenlaces">
      <ul class="nav navbar-nav navbar-right">
      <!--<li><a href="documentos/temarioFinal2022.pdf" target="_blank">XXXXX</a></li>
      <li><a href="documentos/ABCFinanciero.pdf" target="_blank">XXXXX</a></li>
      <li><a href="documentos/REGLAMENTOINTERNOFINAL.pdf" target="_blank">XXXXXX</a></li>-->
        <?php if($id_grupo>0){?>
        <!--<li><a href="firma_documentos.php">e-Firma</a> </li>
        <li><a href="carga_plantilla.php">Solicitud con Plantilla</a> </li>
        <li  class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Solicitud</a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="registro_datos_if.php">Individual</a></li>
                <li><a href="carga_plantilla.php">Plantilla</a></li>
            </ul>
        </li>-->
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container top-buffer-submenu">
<div id="parte1">
<div class="row">
          <div class="col-sm-6">

          </div>
          <br><br>
          <div class="col-sm-6 pull-left">
          <img src="imagenes/logo-emprendimiento.jpg" width="350" border="1">
        </div>
          <div class="col-sm-6 pull-right">
            <div class="user-credencials">
              <ul class="list-unstyled">
                <li>
                  <span class="user-credencials__name"><span class="icon-user" aria-hidden="true"></span> <?php echo ('<b>'.$nombre.'</b><br>'.$nombre_grupo)?></span>
                  <a href="cur_salir.php"><button type="button" class="btn btn-link pull-right">Salir</button></a>
                </li>
              </ul>
            </div>
          </div>
</div>
        </div><!--fin parte1-->
</div>
      <div class="container"><div id="parte1"></div>

