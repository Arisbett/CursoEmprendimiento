<?php session_start();
//$usu=$_SESSION["user"];
$inicio = mktime(date("H"),0,0,date("m"),date("d"),date("Y")) - mktime(7,0,0,9,22,2022);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WMZMQHZ');</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso Emprendedores</title>
    <!-- CSS -->
    <link href="/favicon2.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">
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
    <?php require_once ('seguimiento.php');?>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src='https://www.googletagmanager.com/ns.html?id=GTM-WMZMQHZ'
height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <!-- Contenido -->
    <main class="page">
        <?php require_once ('menu-d.php');?>
        <div class="bottom-buffer"></div>
        <div class="container"><!--Inicia Container-->
        <p align="center"><img src="imagenes/logo-emprendimiento.jpg"  ></p>
            <br>
            <!--<div class="row">
            <div class="col-md-12">
            <center><img src="imagenes/logox.png" alt="" class="img-responsive"><h1>LOGO</h1></center>
            </div>-->
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a data-toggle="tab" href="#tab-sdp">SOBRE EL CURSO </a></li>
                        <li><a data-toggle="tab" href="#tab-reg">TEMARIO</a></li>
                        <li><a data-toggle="tab" href="#tab-dip">CONSTANCIA</a></li>
                        <!--<li><a data-toggle="tab" href="#tab-cal">CALENDARIO</a></li>-->
                        <li><a data-toggle="tab" href="#tab-req">REQUERIMIENTOS ACADÉMICOS Y TÉCNICOS</a></li>
                        <li><a data-toggle="tab" href="#tab-contacto">CONTACTO</a></li>
                    </ul>

                    

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-sdp" style="text-align:justify;">
                            <p>El curso de Emprendimiento es gratuito, <strong>100 % en línea y abierto a todo el público, recomendablemente a partir de nivel bachillerato.</strong></p>
                            <p>Está estructurado en cinco Módulos con sus respectivas evaluaciones y ejercicios de reforzamiento.</p>
                            <p>Con la colaboración de Educación Financiera Citibanamex e Impact Hub Ciudad de México, se desarrollaron los contenidos que serán de gran utilidad e interés para el participante.</p>
                            <p>&nbsp;</p>
                            <h3>Objetivo General</h3>
<hr class="red">
							<p>Que el público interesado adquiera conocimientos y competencias para el desarrollo de sus ideas de negocio y proyectos emprendedores, que fortalezcan sus capacidades en la gestión de una empresa y para que puedan encontrar oportunidades que les brinden una mayor independencia financiera.</p>
                            <p>&nbsp;</p>
                            <h3>Duración del Curso</h3>
<hr class="red">
							<p>La duración del Curso es de <strong>50 horas (aproximadamente 2 meses).</strong></p>
                            <p>Aunque es un Curso en línea, se recomienda un promedio de 2 a 3 horas semanales de estudio para distribuir adecuadamente el tiempo entre el inicio del módulo y el periodo de evaluación del mismo.</p>
                            <p>&nbsp;</p>
                            <h3>Horario</h3>
<hr class="red">
							<p><strong>El horario es flexible</strong> y una vez que se habilitan los módulos, tu sesión estará disponible de lunes a domingo las 24 horas del día. Sólo es importante considerar los tiempos de apertura de contenidos y periodos de evaluación.</p>
                            <p>&nbsp;</p>
                            <h3>Acreditación</h3>
<hr class="red">
							<p>El promedio <strong>mínimo aprobatorio será de 8.0</strong>, tomando en consideración las calificaciones finales obtenidas en cada uno de los módulos.</p>
                            <p>La sumatoria de éstas calificaciones divididas entre los 5 módulos, nos darán el promedio general del Curso.</p>
                            <p>Deberás acreditar todos los módulos, con un mínimo de 8.0 de calificación, para tener derecho a la Constancia de Aprobación que expedimos. </p>
                        </div>
                        <div class="tab-pane" id="tab-reg">
                            <div class="collapse1">
                            <!--<p><a align="center" href="documentos/temarioFinal2022.pdf" target="_blank">Descarga el temario completo <span class="glyphicon glyphicon glyphicon-download-alt" aria-hidden="true"></span></a></p>-->
                                <div class="panel-group ficha-collapse" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#panel-01">
                                                    Módulo I. Introducción al Emprendimiento
                                                </a>
                                            </h4>
                                            <button type="button" class="collpase-button collapsed"
                                                data-toggle="collapse" data-parent="#resolution" href="#panel-01"
                                                aria-expanded="true" aria-controls="panel-01"></button>
                                        </div>
                                        <div class="panel-collapse collapse" id="panel-01" style="height: 0px;">
                                            <div class="panel-body">
                                                <p><strong>Objetivo:</strong> Conocer los conceptos básicos para emprender, así como el contexto que existe en México.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="collapse2">
                                <div class="panel-group ficha-collapse" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#panel-02">
                                                    Módulo II. Ideación
                                                </a>
                                            </h4>
                                            <button type="button" class="collpase-button collapsed"
                                                data-toggle="collapse" data-parent="#resolution" href="#panel-02"
                                                aria-expanded="true" aria-controls="panel-02"></button>
                                        </div>
                                        <div class="panel-collapse collapse" id="panel-02" style="height: 0px;">
                                            <div class="panel-body">
                                                <p><strong>Objetivo:</strong> Identificar las oportunidades que existen para crear un emprendimiento, y desarrollar las ideas para aprovechar dichas oportunidades.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="collapse3">
                                <div class="panel-group ficha-collapse" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#panel-03">
                                                    Módulo III. Modelo de Negocio
                                                </a>
                                            </h4>
                                            <button type="button" class="collpase-button collapsed"
                                                data-toggle="collapse" data-parent="#resolution" href="#panel-03"
                                                aria-expanded="true" aria-controls="panel-03"></button>
                                        </div>
                                        <div class="panel-collapse collapse" id="panel-03" style="height: 0px;">
                                            <div class="panel-body">
                                                <p><strong>Objetivo: </strong>Trabajar en los componentes principales de la idea de negocio identificada, para definir la manera en la cual se va a operar el emprendimiento.</p>

                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                            <div class="collapse4">
                                <div class="panel-group ficha-collapse" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#panel-04">
                                                    Módulo IV. Lanzamiento
                                                </a>
                                            </h4>
                                            <button type="button" class="collpase-button collapsed"
                                                data-toggle="collapse" data-parent="#resolution" href="#panel-04"
                                                aria-expanded="true" aria-controls="panel-04"></button>
                                        </div>
                                        <div class="panel-collapse collapse" id="panel-04" style="height: 0px;">
                                            <div class="panel-body">
                                                <p><strong>Objetivo: </strong>Desarrollar la estrategia de lanzamiento del negocio, entendiendo cuál va a ser el público objetivo, así como la inversión necesaria.</p>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                            <div class="collapse5">
                                <div class="panel-group ficha-collapse" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#panel-05">
                                                    Módulo V. Formalidad Empresarial
                                                </a>
                                            </h4>
                                            <button type="button" class="collpase-button collapsed"
                                                data-toggle="collapse" data-parent="#resolution" href="#panel-05"
                                                aria-expanded="true" aria-controls="panel-05"></button>
                                        </div>
                                        <div class="panel-collapse collapse" id="panel-05" style="height: 0px;">
                                            <div class="panel-body">
                                                <p><strong>Objetivo: </strong>Brindar al cursante la informaci&oacute;n necesaria para que entienda la importancia de avanzar en la formalidad empresarial, a trav&eacute;s del cumplimiento de las obligaciones legales en materia laboral y fiscal, conociendo las distintas modalidades de construcci&oacute;n de empresa y las diferentes obligaciones legales que conllevan.</p>

                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--<div class="tab-pane" id="tab-cal">
                            <p>Usted puede ingresar a los contenidos del Curso conforme las siguientes fechas:
                            </p>
                            <table class="table" style="max-width:80%;">
                                <tbody>
                                    <tr align="center">
                                        <td align="center"><strong>Módulo</strong></td>
                                        <td align="center"><strong>Periodo</strong></td>
                                        <td align="center"><strong>Evaluación</strong></td>
                                    </tr>
                                    <tr align="left">
                                        <td align="center" valign="middle"><strong>Módulo I</strong></td>
                                        <td align="center" valign="middle"></td>
                                        <td align="center" valign="middle"> </td>
                                    </tr>
                                    <tr align="left">
                                        <td align="center" valign="middle"><strong>Módulo II</strong></td>
                                        <td align="center" valign="middle"></td>
                                        <td align="center" valign="middle"></td>
                                    </tr>
                                    <tr align="left">
                                        <td align="center" valign="middle"><strong>Módulo III</strong></td>
                                        <td align="center" valign="middle"></td>
                                        <td align="center" valign="middle"></td>
                                    </tr>
                                    <tr align="left">
                                        <td align="center" valign="middle"><strong>Módulo IV</strong></td>
                                        <td align="center" valign="middle"></td>
                                        <td align="center" valign="middle"></td>
                                    </tr>
                                    <tr align="left">
                                        <td align="center" valign="middle"><strong>Módulo V</strong></td>
                                        <td align="center" valign="middle"></td>
                                        <td align="center" valign="middle"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>-->
                        <div class="tab-pane" id="tab-crit">
                            <p>El <strong> promedio mínimo aprobatorio será de 7.0</strong>, tomando en consideración
                                las calificaciones finales obtenidas en cada uno de los módulos.</p>

                            <p>La sumatoria de éstas calificaciones divididas entre los 3 módulos, nos darán el promedio
                                general del Curso.</p>
                        </div>
                        <div class="tab-pane" id="tab-dip">
                        <p>Si la alumna o alumno aprueba el Curso, tendrá derecho a recibir una Constancia de Aprobación que respalde y sustente los estudios realizados.</p>
                        <p>La constancia podrá ser descargado de forma automática una vez que concluya la generación.</p>
                        </div>
                        <div class="tab-pane" id="tab-req">
                            <ol type="a">
                            <li>Abierto al público en general a partir de los 17 años.</li>
                            <li>Aceptar los términos y condiciones del Curso.</li>
                            <li>Contar preferentemente con nivel académico mínimo de bachillerato (terminado o en curso).</li>
                            <li>Contar con cuenta de correo electrónico personal.</li>
                            <li>Leer y aceptar lo establecido en el Reglamento General del Curso.</li>
                            </ol>

                            <p>Se consideran requisitos técnicos, aquellos necesarios para que el aspirante
                                desarrolle su estudio del curso, siendo los siguientes:</p>
                                <ol>
                                <li>Equipo de escritorio preferible.</li>
                                <li>Conexión a Internet.</li>
                                <li>Utilizar de preferencia navegadores como: Chrome, Mozilla o Microsof Edge.</li>
                                </ol>
                        </div>
                        <div class="tab-pane" id="tab-contacto" style="text-align:center">
                            <p><center><strong>Para cualquier duda o comentario, escríbenos al correo de:</strong></center></p>
                            <p><img src="imagenes/correo.png" alt="correologo.png"><a href="mailto:cursoemprendimiento@condusef.gob.mx" style="text-decoration:none">cursoemprendimiento@condusef.gob.mx</a></p>
                           
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
            	<div class="col-md-12" >
                <p>&nbsp;</p>
                <p style="text-align:center" class="alert alert-success">
                	<a href="documentos/AVISO_DE_PRIVACIDAD_INTEGRAL_CURSO_DE_EMPRENDIMIENTO_Final.pdf" target="_blank"><strong>AVISO DE PRIVACIDAD</strong></a>
                        </p>
                </div>
            </div>
        </div><!--Cierra container-->
    </main>
    
<!--MODALS-->
<div class="modal fullscreen-modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="gridSystemModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel">Inscríbete  al Curso en Educación
                                Financiera</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <center>
                                <p><em>Estimado(a) aspirante:</em> Para un registro exitoso, selecciona el grupo donde efectuarás tu inscripción, no olvides apuntar los datos de tu Coordinadora o Coordinador de grupo para cualquier duda o aclaración. </p>
<p>¡Tu inscripción la puedes realizar desde cualquier dispositivo!
</p>
                                 <a class="btn btn-primary" type="button" href="registroEmpresarial.php">
                                 <strong>INSTITUCIÓN</strong> QUE TIENE <p>REGISTRADO UN GRUPO<br>INGRESA AQUÍ</p>
                                  </a>
                                    <a class="btn btn-primary" type="button" href="registro.php">
                                        <p><strong>PÚBLICO EN GENERAL</strong> <br><br>INGRESA AQUÍ</p> 
                                    </a>

                                    <a class="btn btn-primary" type="button" href="registroAreaCond.php">
                                        <p><strong>CONDUSEF:</strong> ERES EMPLEADO(A) <br /> O PRESTAS TUS SERVICIOS<br> INGRESA AQUÍ</p>
                                    </a>
                                </center>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

    <!-- JS -->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

    <script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
    <script type="text/javascript" src="js/link-tabs.js"></script>
</body>

</html>