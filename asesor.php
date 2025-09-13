<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>página</title>
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
</head>

<body>

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
                    <a class="navbar-brand" href="index.php">CURSO EMPRENDIMIENTO</a>
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

            <div class="list-group col-md-4">
                <div class="list-group-item list-group-item-action active">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Solicitudes</h5>
                    </div>
            </div>
                <div class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">List group item heading</h5>
                        <small class="text-muted">3 days ago</small>
                    </div>
                    <p class="mb-1">Some placeholder content in a paragraph.</p>
                    <button type="button" class="btn btn-danger">Aceptar</button>
                    <button class="btn btn-default" type="submit"> Declinar</button>
                </div>
            </div>

        </div>
        <!--Termina Container-->
    </main>

    <!-- JS -->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

    <script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
</body>

</html>