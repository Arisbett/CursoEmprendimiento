<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/estilo.css">
    <link href="/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">


    <title>Diplomado</title>
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
                        <li><a href="index.php">Registrate <span class="glyphicon glyphicon-user"
                                    aria-hidden="true"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div>&nbsp;</div>

        <div>&nbsp;</div>
        <h1 align="center">Inicio de Sesión</h1>
        <div class="container">

            <strong>¡ BIENVENIDOS PARTICIPANTES DE LA GENERACIÓN 42 !</strong>
                <ul>
                    <li>Para iniciar con el Diplomado, ingresa en el recuadro líneas abajo el CORREO y CONTRASEÑA que
                    registraste al momento de tu inscripción, estos datos también se encuentran incluidos en el correo que
                    recibiste de “REGISTRO EXITOSO”.</li>

                    <li>Si marca datos erróneos u olvidaste tu información de acceso, comunícate con tu Coordinadora o
                    Coordinador de grupo para el reenvío correspondiente.</li>

                    <li>El horario es flexible y nuestra plataforma estará habilitada de lunes a domingo las 24 horas del día, para
                    que puedes adaptar el estudio de los contenidos con tus actividades cotidianas, sólo es importante que no
                    olvides las fechas de inicio y cierre de cada Módulo, así como las evaluaciones correspondientes.</li>

                    <li>Si tienes dudas de como ingresar a tu sesión, te invitamos a conocer el MANUAL DEL USUARIO y
                    REGLAMENTO INTERNO, en ellos; encontrarás información importante y recomendaciones que
                    despejarán tus dudas en el funcionamiento de la plataforma y desarrollo del Diplomado.</li>
                </ul>
                
            </div>
        <form class="form-horizontal" role="form" action="validar.php" method="post" align="right">
            <?php 
            
            function dameURL(){
            $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
            return $url;
        }

            function detect() {
                $browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
                      $os=array("WIN","MAC","LINUX");     
                      # definimos unos valores por defecto para el navegador y el sistema operativo         
                      $info['browser'] = "OTHER";          
                      $info['os'] = "OTHER"; 
                      # buscamos el navegador con su sistema operativo          
                      foreach($browser as $parent) {
                        $s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
                        $f = $s + strlen($parent);
                        $version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
                        $version = preg_replace('/[^0-9,.]/','',$version);
                        if ($s) {
                             $info['browser'] = $parent;
                             $info['version'] = $version;
                             break;
                            }
                        }
                      foreach($os as $val) {
                        if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
                                    $info['os'] = $val;
                                    break;
            }
            # devolvemos el array de valores
            $info['browser'] = $parent;
            $info['version'] = $version;
            $info['os'] = $val;
            $variable = $parent."--".$version."--".$val;  
            return $variable;
        }
        $url = dameURL();
        $info= detect();
        $ip = $_SERVER['REMOTE_ADDR'];
        ?>
            <div>&nbsp;</div>
           
            <div>&nbsp;</div>

            <div class="form-group ">
                <label class="col-sm-3 control-label" for="text">Correo:</label>
                <div class="col-sm-4">
                    <input class="form-control" id="correo" name="correo" placeholder="correo" type="text">
                </div>
            </div>
            <div class="form-group ">
                <label class="col-sm-3 control-label" for="password-03">Contraseña:</label>
                <div class="col-sm-4">
                    <input class="form-control" id="password" name="password" placeholder="Contraseña" type="password">
                </div>
            </div>
            <input type="hidden" name="idAl" id="idAl" value="<?php echo $idAlumno;?>">

            </div>
            <button class="btn btn-primary" name="registo" type="submit" style="margin-right:45%">Enviar</button>
              
            <input id="navegador" name="navegador" type="hidden" value="<?php echo $parent; ?>">
            <input id="sisOp" name="sisOp" type="hidden" value="<?php echo $val; ?>">
            <input id="url" name="url" type="hidden" value="<?php echo $url; ?>">
            <input id="ip" name="ip" type="hidden" value="<?php echo $url; ?>">
        </form>
    


        <div class="container"><br>
            <div class="row">
                <div class="col-md-12">
                    <div id="sobre">
                        <br />
                        <h4>SOBRE EL DIPLOMADO:</h4>
                        <hr class="red">
                        <p>El Diplomado en Educación Financiera <b>es gratuito, 100 % en línea y abierto a todo el
                                público a
                                partir del nivel bachillerato.</b><br>&nbsp;<br>
                            Cuenta con un método de estudio dinámico por medio de una plataforma que posee una
                            combinación
                            de elementos audiovisuales, actividades didácticas y contenidos actualizados.<br>&nbsp;<br>
                            Está estructurado en tres Módulos con sus respectivas evaluaciones y ejercicios de
                            reforzamiento.<br>&nbsp;<br>
                            Con la colaboración de la Bolsa Institucional de Valores (BIVA), Instituto Nacional de la
                            Economía Social (INAES) y Banco de México, se desarrollaron nuevos contenidos que serán de
                            gran
                            utilidad e interés para el participante.<br>&nbsp;<br>
                            Podrás cursar el Diplomado incluso si ya fuiste parte de alguna Generación anterior.</p><br>
                    </div>
                    <div id="requesitos">
                        <br />
                        <h4>REQUISITOS DEL DIPLOMADO:</h4>
                        <hr class="red">
                        <p>....</p><br>
                    </div>
                </div>
            </div>
        </div>



    </main>

    <div>&nbsp;</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
    <script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>

</body>

</html>