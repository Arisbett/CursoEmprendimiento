<?php
require ("includes/conexion.php");

$db = new Conexion();
$con = $db->conectar();
?>

<!DOCTYPE html>
<html lang="es">

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

    <!-- Respond.js soporte de media queries para Internet Explorer 8 -->
    <!-- ie8.js EventTarget para cada nodo en Internet Explorer 8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ie8/0.2.2/ie8.js"></script>
    <![endif]-->
    <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
	<script type="text/javascript" src="js/libreriaAjax.js"></script>
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

<?php require_once ('seguimiento.php');?>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src='https://www.googletagmanager.com/ns.html?id=GTM-WMZMQHZ'
height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>
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
                    <a class="navbar-brand" href="index.php">Curso de Emprendimiento</a>
                </div>
                <!--<div class="collapse navbar-collapse" id="subenlaces">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Calendario</a></li>
                        <li><a href="#">Manual</a></li>
                        <li><a href="preguntas-frecuentes.php">Preguntas Frecuentes</a></li><li><a href="index.php">Regresar <span class="glyphicon glyphicon-log-out"
                                    aria-hidden="true"></span></a></li>
                    </ul>
                </div>-->
            </div>
        </nav>
        <div class="bottom-buffer"></div>
        <div class="container">
            <!--Inicia Container-->
            <div>&nbsp;</div>

            <h3 align="center">Registro para el Curso de Emprendimiento para Público en General</h3>


            <div>&nbsp;</div>
            <form role="form1" name="form_registro">
                <div id="msg" class="alert alert-danger" style="visibility:hidden"></div>
                <div id="existe_correo"><input type="hidden" id="respuesta_correo"></div>
                <div class="contenedor_registro">
                    <div class="alert alert-warning">Revisa que todos tus datos sean correctos antes de enviar tu
                        registro, recuerda que si el nombre está mal capturado así aparecerá en tu diploma</div>


                    <div class="form-group col-md-4">
                        <label class="control-label" for="text">Nombre (s):</label> <abbr title="Este campo es obligatorio"
                            aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <input class="form-control" id="nombre" name="nombre" placeholder="Nombre" type="text" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label" for="text">Apellido Paterno:</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <input class="form-control" id="apaterno" name="apaterno" placeholder="Apellido Paterno"
                            type="text" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="text">Apellido Materno:</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <input class="form-control" id="amaterno" name="amaterno" placeholder="Apellido Materno"
                            type="text" required>
                    </div>

                    

                    <div class="form-group col-md-2">
                        <label for="edad">Edad:</label> <abbr title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <?php
                        $edad = $con->query("SELECT * FROM edad WHERE estatus=1");
                        $edad->execute();
                        $resultadoEdad = $edad->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <select name="edad" id="edad" class="form-control" required>
                            <option value="">Elige una opción</option>
                            <?php foreach($resultadoEdad as $rowe){?>
                            <option value="<?php echo $rowe ['id_edad']?>"><?php echo $rowe ['edad']?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="sexo">Género:</label> <abbr title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <select name="sexo" id="sexo" class="form-control" required>
                            <option value="">Elige una opción</option>
                            <option value="F">Femenino</option>
                            <option value="M">Masculino</option>
                            <option value="n/d">N/D</option>
                        </select>

                    </div>

                    <div class="form-group col-md-6">
                        <label for="sexo">Entidad Federativa:</label> <abbr title="Este campo es obligatorio" aria-label="required">
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

                    <div class="form-group col-md-6">
                        <label class="control-label" for="correo">Correo electrónico (Usuario): </label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <input class="form-control" id="correo" name="correo" placeholder="Correo electrónico"
                            type="email" onpaste="alert('Ingresa nuevamente tu correo');return false" onchange="FAjax('correo2.php','existe_correo','c='+this.value,'POST');" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="correo2">Confirma tu correo electrónico:</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <input class="form-control" id="correo2" name="correo2"
                            placeholder="Confirma tu correo electrónico" type="email"
                            onpaste="alert('Ingresa nuevamente tu correo');return false" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="text">Número de celular (10 dígitos):</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <input class="form-control" id="telefono" name="telefono" placeholder="0123456789" type="text"   
                        minlength="10" maxlength="10" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" 
                        onpaste="alert('Ingresa tu número de celular');return false" required> 

                    </div>

                    <!--<div class="form-group col-md-4">
                        <label for="tCand">Ocupación:</label> <abbr title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <?php
                                     /*$comando1 = $con->query("SELECT * FROM `ocupacion` WHERE status=1 ORDER BY idOcupacion ASC");
                                    $comando1->execute();
                                    $resultado1 = $comando1->fetchAll(PDO::FETCH_ASSOC);*/
                                    ?>
                        <select name="tCand" id="tCand" class="form-control" required>
                            <option value="">Elige una opción</option>
                            <?php 
                        //foreach($resultado1 AS $row){
                        ?>

                            <option value="<?php //echo $row ['idOcupacion']?>"><?php //echo $row ['ocupacion']?></option>

                            <?php //}?>
                        </select>

                    </div>-->

                    <!--<div class="form-group col-md-4">
                        <label for="nEst">Nivel máximo de estudios:</label> <abbr title="Este campo es obligatorio" aria-label="required">
                            <font color="black">*</font>
                        </abbr>
                        <?php
                                     $comando2 = $con->query("SELECT * FROM `nivelestudio` WHERE status=1 ORDER BY idNivelEst ASC");
                                    $comando2->execute();
                                    $resultado2 = $comando2->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                        <select name="nEst" id="nEst" class="form-control" required>
                            <option value="">Elige una opción</option>
                            <?php 
                        foreach($resultado2 AS $row){
                        ?>

                            <option value="<?php echo $row ['nivel_Estudios']?>"><?php echo $row ['nivel_Estudios']?></option>

                            <?php }?>
                        </select>

                    </div>-->

                   

                    <div class="form-group col-md-8">
                        <label class="control-label" for="pass">Contraseña:</label> <abbr title="Solo letras y números"
                            aria-label="required">
                            <font color="black">*Solo letras y números (Mínimo 8 y máximo 12 caracteres)</font>
                        </abbr>
                        <input class="form-control" id="pass" name="pass"
                            onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))"
                            placeholder="Contraseña" type="password" minlength="8" maxlength="12" required>
                    </div> 
                    <?php
                        $comando = $con->query("SELECT * FROM grupo WHERE idGrupo=1");
                        $comando->execute();
                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                    <?php 
                        foreach($resultado AS $row){
                        ?>
                    <input id="grupo" name="grupo" type="hidden" value="<?php echo $row['idGrupo']; ?>">
                    <?php }?>
                    <?php
                        $comando = $con->query("SELECT * FROM `generaciones` WHERE generacion=1");
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
                    
                    <!--<div class="checkboxcol-md-12" align="center">
                        <strong>He leído el Reglamento General del Diplomado. </strong><a href="documentos/REGLAMENTO INTERNO 2022 FINAL.pdf"
                            target="_blank" rel="noopener noreferrer">
                            Click aquí para leerlo </a><input type="checkbox" id="myCheck2" name="test" required>
                    </div>-->
                    <p align="center">
                           <strong>Deseo recibir consejos prácticos de Educación Financiera en mi celular:<br></strong> 
                            <label><input type="radio" name="info" id="info1" value="1" required> Sí</label><br>
                            <label><input type="radio" name="info" id="info2" value="2"> No</label><br>
                        </p>
                        <div class="checkboxcol-md-12" align="center">
                        <strong>He leído el Aviso de Privacidad. </strong><a
                            href="documentos/AVISO_DE_PRIVACIDAD_INTEGRAL_CURSO_DE_EMPRENDIMIENTO_Final.pdf" target="_blank"
                            rel="noopener noreferrer"> Click
                            aquí para leerlo </a> <input type="checkbox" id="myCheck" name="myCheck" required>

                    </div>
                </div>
                <p class="pull-right">
                    <a href="index.php"><button class="btn btn-primary" type="button">Regresar</button></a>
                    <!--<button class="btn btn-primary" name="registro" onclick="return fenvia()">Enviar</button>-->
                    <button class="btn btn-primary" type="button" onClick="return fenvia()">Enviar</button>
                </p>

            </form>

        </div>
<script>
function fenvia(){ 

form = document.form_registro;

//validarCorreo(document.getElementById('correo').value);

if(document.getElementById("nombre").value==""){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "El nombre esta vacío";
        return false;
} 

if(document.getElementById("apaterno").value==""){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "Apellido paterno esta vacío";
        return false;
} 

if(document.getElementById("amaterno").value==""){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "Apellido materno esta vacío";
        return false;
} 

if(document.getElementById("estado").value==""){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "El estado esta vacío";
        return false;
} 

if(document.getElementById("sexo").value==""){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "Elije una opción en el campo sexo";
        return false;
} 

if(document.getElementById("edad").value==""){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "Elije una opción en el campo edad";
        return false;
} 

if(document.getElementById("correo").value==""){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "El correo esta vacío";
        return false;
} 

if(document.getElementById("correo2").value==""){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "Confirma el correo";
        return false;
} 

if(document.getElementById("telefono").value==""){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "El campo teléfono esta vacío";
        return false;
} 
/*
if(document.getElementById("tCand").value==""){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "Elije una opción para tipo de candidato";
        return false;
} 

if(document.getElementById("nEst").value==""){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "Elije una opción para nivel de estudios";
        return false;
} */

if(document.getElementById("pass").value==""){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "Escribe una contraseña";
        return false;
} 

if(!document.getElementById("myCheck").checked){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "Es necesario marcar el Aviso de Privacidad";
        return false;
}

/*if(!document.getElementById("myCheck2").checked){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "Es necesario marcar el Reglamento General del Diplomado";
        return false;
}*/
if(!document.getElementById('info1').checked && !document.getElementById('info2').checked){
    document.getElementById("msg").style.visibility ="visible";
    document.getElementById("msg").innerHTML = "Es necesario marcar la opción para recibir información";
        return false;
}

if(document.getElementById("correo").value!=document.getElementById("correo2").value){

document.getElementById("msg").style.visibility ="visible";
  document.getElementById("msg").innerHTML = "Los correos no son iguales";
    return false;
} 

if(document.getElementById("respuesta_correo").value==1){

    document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "El correo ya existe";
        return false;
} 

try{
if(document.getElementById("msg").style.visibility =="visible")
document.getElementById("msg").style.visibility ="hidden";
} catch (error) {}

form.action="registrar2.php"; 
form.method="post";
form.submit();
}



</script>
        <!--Termina Container-->
    </main>
    <div>&nbsp;</div>

    <!-- JS -->
    <script src="js/formulario.js"></script>
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

    <script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
</body>

</html>