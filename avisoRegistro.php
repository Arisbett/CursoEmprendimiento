<?php
require ("includes/conexion.php");

$db = new Conexion();
$con = $db->conectar();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diplomado</title>
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
    <link rel="stylesheet" href="css/estilos.css">
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
<script type="text/javascript">
function myFunction() {
    var x = document.getElementById("myCheck").required;
    document.getElementById("demo").innerHTML = x;
}

function myFunction2() {
    var x = document.getElementById("myCheck2").required;
    document.getElementById("demo2").innerHTML = x;
}

function myFunction3() {
    var x = document.getElementById("myCheck3").required;
    document.getElementById("demo3").innerHTML = x;
}
</script>


<script>
function validarCorreo(correo) {
    var expReg =
        /^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/;
    var esValido = expReg.test(correo);
    if (esValido != true) {
        //alert('El correo No es válido');
        header('location:index.php');
    }
}
</script>

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
                    <a class="navbar-brand" href="index.php">Diplomado en Educación Financiera</a>
                </div>
                <div class="collapse navbar-collapse" id="subenlaces">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Calendario</a></li>
                        <li><a href="#">Manual</a></li>
                        <li><a href="preguntas-frecuentes.php">Preguntas Frecuentes</a></li>
                        <!--<li><a href="#">Iniciar Sesión <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a></li>-->
                        <li><a href="index.php">Cerrar Sesión <span class="glyphicon glyphicon-log-out"
                                    aria-hidden="true"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="bottom-buffer"></div>
        <div class="container">
            <!--Inicia Container-->
            <div>&nbsp;</div>

            <h3 align="center">Registro para el Diplomado de Educación Financiera para público en general</h3>


            <div>&nbsp;</div>
            <form role="form" action="registrar.php" method="post">
                <div class="contenedor_registro">
                    <div class="alert alert-danger">Algunos campos no fueron iguales o quedaron incompletos</div>


                    <div class="form-group col-md-4">
                        <label class="control-label" for="text">Nombre:</label> <abbr title="Este campo es obligatorio"
                            aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <input class="form-control" id="nombre" name="nombre" placeholder="Nombre" type="text" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label" for="text">Primer apellido:</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <input class="form-control" id="apaterno" name="apaterno" placeholder="Apellido Paterno"
                            type="text" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="text">Segundo apellido:</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <input class="form-control" id="amaterno" name="amaterno" placeholder="Apellido Materno"
                            type="text" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="sexo">Estado:</label> <abbr title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <?php
                                     $comando = $con->query("SELECT * FROM `states` WHERE status=1 ORDER BY id_estado ASC");
                                    $comando->execute();
                                    $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="">Elige una opción</option>
                            <?php 
                        foreach($resultado AS $row){
                        ?>

                            <option value="<?php echo $row ['id_estado']?>"><?php echo $row ['estado']?></option>

                            <?php }?>
                        </select>

                    </div>

                    <div class="form-group col-md-4">
                        <label for="sexo">Sexo:</label> <abbr title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <select name="sexo" id="sexo" class="form-control" required>
                            <option value="">Elige una opción</option>
                            <option value="F">Femenino</option>
                            <option value="M">Masculino</option>
                            <option value="O">Otro</option>
                        </select>

                    </div>

                    <div class="form-group col-md-2">
                        <label for="edad">Edad:</label> <abbr title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <select name="edad" id="edad" class="form-control" required>
                            <option value="">Elige una opción</option>
                            <option value="15-20">15-20</option>
                            <option value="21-25">21-25</option>
                            <option value="26-30">26-30</option>
                            <option value="31-35">31-35</option>
                            <option value="36-40">36-40</option>
                            <option value="41-45">41-45</option>
                            <option value="46-50">46-50</option>
                            <option value="51-55">51-55</option>
                            <option value="56-60">56-60</option>
                            <option value="61+">61+</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label" for="correo">Correo electrónico:</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <input class="form-control" id="correo" name="correo" placeholder="Correo electrónico"
                            type="email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="correo2">Confirma tu correo electrónico:</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <input class="form-control" id="correo2" name="correo2"
                            placeholder="Confirma tu correo electrónico" type="email" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="text">Ingresa tu número de celular:</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <input class="form-control" id="telefono" name="telefono" placeholder="0123456789" type="text"
                            required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tCand">Tipo de Candidato:</label> <abbr title="Este campo es obligatorio"
                            aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <select name="tCand" id="tCand" class="form-control" required>
                            <option value="">Elige una opción</option>
                            <option value="Profesionista independiente">Profesionista independiente</option>
                            <option value="Empleado">Empleado</option>
                            <option value="Estudiante">Estudiante</option>
                            <option value="Jubilado / Pensionado">Jubilado / Pensionado</option>

                        </select>

                    </div>

                    <div class="form-group col-md-4">
                        <label for="nEst">Nivel de estudio:</label> <abbr title="Este campo es obligatorio"
                            aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <select name="nEst" id="nEst" class="form-control" required>
                            <option value="">Elige una opción</option>
                            <option value="Doctorado">Doctorado</option>
                            <option value="Empleado">Maestría</option>
                            <option value="Educación Superior">Educación Superior</option>
                            <option value="Educación Media Superior">Educación Media Superior</option>
                            <option value="Otro">Otro..</option>

                        </select>

                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label" for="pass">Contraseña:</label> <abbr title="Solo letras y números"
                            aria-label="required">
                            <font color="black">*Solo letras y números</font>
                        </abbr>
                        <input class="form-control" id="pass" name="pass"
                            onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))"
                            placeholder="Contraseña" type="password" required>
                    </div>

                    <!--<div class="form-group col-md-4">
                        <label class="control-label" for="date">Ingresa tu fecha de nacimiento:</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <input class="form-control" id="fnacimiento" name="fnacimiento" placeholder="" type="date"
                            required>
                    </div>-->

                    <?php
                        $comando = $con->query("SELECT * FROM grupo WHERE idGrupo=2");
                        $comando->execute();
                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                    <?php 
                        foreach($resultado AS $row){
                        ?>
                    <input id="grupo" name="grupo" type="hidden" value="<?php echo $row['idGrupo']; ?>">
                    <?php }?>
                    <?php
                        $comando = $con->query("SELECT * FROM `generaciones` WHERE generacion=42");
                        $comando->execute();
                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                    <?php 
                        foreach($resultado AS $row){
                        ?>
                    <input id="gen" name="gen" type="hidden" value="<?php echo $row['idGeneracion']; ?>">
                    <?php }?>
                </div>

                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div class="form-group">
                    <div class="checkboxcol-md-12" align="center">
                        <strong>He leído el aviso de privacidad. </strong><a
                            href="documentos/AvisoPrivacidadIntegralDiplomadoEF-2022.pdf" target="_blank" rel="noopener noreferrer"> Click
                            aquí para leerlo </a> <input type="checkbox" id="myCheck" name="test" required>

                    </div>
                    <div class="checkboxcol-md-12" align="center">
                        <strong>He leído el reglamento. </strong><a href="documentos/REGLAMENTO INTERNO 2022 FINAL.pdf" target="_blank" rel="noopener noreferrer">
                            Click aquí para leerlo </a><input type="checkbox" id="myCheck2" name="test" required>
                    </div>
                    <div align="center">
                        <label for="info" name=""  required>Deseo recibir información de Educación Financiera.</label> <br />
                        <input type='checkbox' name="info[]" value="1">Si
                        <input type='checkbox' name="info[]" value="0">No

                    </div>
                </div>
                <button class="btn btn-primary pull-right" name="registro" type="submit"
                    onclick="validarCorreo(document.getElementById('correo').value)">Enviar</button>

            </form>


        </div>

        <!--Termina Container-->
    </main>
    <div>&nbsp;</div>

    <!-- JS -->
    <script src="js/formulario.js"></script>
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

    <script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
</body>

</html>