
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">

    <title>Curso</title>
    <style>
    /*
	Full screen Modal 
	*/
    .fullscreen-modal .modal-dialog {
        margin: 0;
        margin-right: auto;
        margin-left: auto;
        width: 100%;
    }

    @media (min-width: 768px) {
        .fullscreen-modal .modal-dialog {
            width: 750px;
        }
    }

    @media (min-width: 992px) {
        .fullscreen-modal .modal-dialog {
            width: 970px;
        }
    }

    @media (min-width: 1200px) {
        .fullscreen-modal .modal-dialog {
            width: 1170px;
        }
    }
    </style>
</head>

<body>

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
                        <li><a href="preguntas-frecuentes.php">Preguntas Frecuentes</a></li>
                        <!--<li><a href="#">Iniciar Sesión <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a></li>-->
                        <li><a href="registro.php">Registrate <span class="glyphicon glyphicon-user"
                                    aria-hidden="true"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="bottom-buffer"></div>
        <div class="container">
            <div>&nbsp;</div>
            <h3>Si has olvidado tu usuario o contraseña ingresa tu correo de inscripción</h3>

            <form class="form-horizontal" role="form" action="validar.php" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="text">Correo:</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="correo" name="correo" placeholder="Correo" type="text">
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button class="btn btn-primary pull-right" name="recuperar" type="submit">Enviar</button>
                    </div>
                </div>
            </form>

        </div>
    </main>

    <div>&nbsp;</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
    <script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>

</body>

</html> 