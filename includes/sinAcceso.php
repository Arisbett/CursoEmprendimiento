<?php
require '../includes/conexion.php';

$db = new Conexion();
$con = $db->conectar();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso</title>
    <!-- CSS -->
    <link href="/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">

    <!-- Respond.js soporte de media queries para Internet Explorer 8 -->
    <!-- ie8.js EventTarget para cada nodo en Internet Explorer 8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ie8/0.2.2/ie8.js"></script>
    <![endif]-->
    <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WMZMQHZ');</script>
<!-- End Google Tag Manager -->

</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WMZMQHZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <!-- Contenido -->
    <main class="page">
        <nav class="navbar navbar-inverse sub-navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#subenlaces">
                        <span class="sr-only">Interruptor de Navegación</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Diplomado en Educación Financiera</a>
                </div>
                <div class="collapse navbar-collapse" id="subenlaces">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Calendario</a></li>
                        <li><a href="#">Manual</a></li>
                        <li><a href="#">Preguntas Frecuentes</a></li>
                        <!--<li><a href="#">Iniciar Sesión <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a></li>-->
                        <li><a href="#">Cerrar Sesión <span class="glyphicon glyphicon-log-out"
                                    aria-hidden="true"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="bottom-buffer"></div>
        <div class="container">
            <!--Inicia Container-->
            <div>&nbsp;</div><div>&nbsp;</div>
            <img src="../imagenes/logo.png" alt="" style="display: block; margin-left: auto;margin-right: auto;width: 50%;" >
            <div class="card" align="center">
                <div class="card-header">
                    Ocurrio un problema
                </div>
                <div class="card-body">
                    <h5 class="card-title">El grupo al que deseas ingresar ya esta lleno</h5>
                    <p class="card-text">Mantente al pendiente proximos grupos</p>
                    <a href="../index.php" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>
        <div>&nbsp;</div><div>&nbsp;</div>
    </main>

    <!-- JS -->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

    <script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
</body>

</html>