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
    <script languaje="javascript" src="js/jquery-3.1.1.min.js"></script>

    <script language="javascript">
    $(document).ready(function() {
        $("#estado").change(function() {
            $("#estado option:selected").each(function() {
                id_estado = $(this).val();
                $.post("includes/getMunicipio.php", {
                    id_estado: id_estado
                }, function(data) {
                    $("#municipio").html(data);
                });
            });
        })
    });
    </script>

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
function ConfirmaAviso() {
    var respuesta = confirm("¿Aceptas los términos y condiciones?");
    if (respuesta == true) {
        return true;
    } else {
        return false;
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
                        <li><a href="#">Cerrar Sesión <span class="glyphicon glyphicon-log-out"
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
            <form role="form" action="registrarGrupos.php" method="post" enctype="multipart/form-data">
                <div class="contenedor_registro">
                    <div class="alert alert-warning">Revisa que todos tus datos sean correctos antes de enviar tu
                        registro, recuerda que si el nombre está mal capturado así aparecerá en tu diploma</div>

                    <?php
                        $id = $_GET['id'];
                        $query= $con->prepare("SELECT * FROM grupo WHERE idGrupo = :id");
                        $query->execute(['id' => $id]);
                        $resultado = $query->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <input type="hidden" id="idGrupo" name="idGrupo" value="<?php echo $id;?> ">



                    <div class="form-group col-md-6">
                        <?php
                        $comando = $con->query("SELECT id_estado, estado FROM `states` ORDER BY id_estado ASC");
                        $comando->execute();
                        $resultado_edo = $comando->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <label for="sexo">Estado</label> <abbr title="Este campo es obligatorio" aria-label="required">
                            <font color="red">*</font>
                        </abbr>
                        <select name="estado" id="estado" class="form-control" required>
                            <!--option value="0" selected>Selecciona tu Estado...</option-->
                            <?php
                                foreach ($resultado_edo AS $row) {
                                    if($resultado['estado']==$row['id_estado']){
                                        echo "<option value=".$row['id_estado']." selected>".$row['estado']."</option>";
                                    }else{
                                        echo "<option value=".$row['id_estado'].">".$row['estado']."</option>";
                                    }
                                }
                           ?>

                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="sexo">Municipio</label> <abbr title="Este campo es obligatorio"
                            aria-label="required">
                            <font color="red">*</font>
                        </abbr>
                        <select name="municipio" id="municipio" class="form-control" required>
                            <option value="0" selected>Selecciona tu Municipio...</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label" for="text">Nombre completo de la universidad o institución</label>
                        <abbr title="Este campo es obligatorio" aria-label="required">
                            <font color="red">*</font>
                        </abbr>
                        <input class="form-control" id="nombreUn" name="nombreUn" placeholder="Nombre de la institución"
                            type="text" value="<?php echo $resultado['nombreUniv_Inst'];?> " required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="text">Siglas de la universidad o de la institución </label>
                        <abbr title="Este campo es obligatorio" aria-label="required">
                            <font color="red">*</font>
                        </abbr>
                        <input class="form-control" id="sigla" name="sigla" placeholder="Siglas" type="text"
                            value="<?php echo $resultado['siglas'];?> " required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="text">Número de lugares solicitados para el grupo </label>
                        <abbr title="Este campo es obligatorio" aria-label="required">
                            <font color="red">*</font>
                        </abbr>
                        <input class="form-control" id="numLug" name="numLug"
                            placeholder="Número de lugares solicitados" type="number"
                            value="<?php echo $resultado['numeroLugares'];?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="nomCoor">Nombre del coordinador del grupo</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="red">*</font>
                        </abbr>
                        <input class="form-control" id="nomCoor" name="nomCoor" placeholder="Nombre del Coordinador"
                            type="text" value="<?php echo $resultado['nombreCoordinador'];?> " required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="puesto">Puesto</label> <abbr title="Este campo es obligatorio"
                            aria-label="required">
                            <font color="red">*</font>
                        </abbr>
                        <input class="form-control" id="puesto" name="puesto" placeholder="Puesto del Coordinador"
                            type="text" value="<?php echo $resultado['puesto'];?> " required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="text">Correo</label> <abbr title="Este campo es obligatorio"
                            aria-label="required">
                            <font color="red">*</font>
                        </abbr>
                        <input class="form-control" id="correo" name="correo" placeholder="Correo" type="text"
                            value="<?php echo $resultado['correo'];?> " required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="correo2">Confirma tu correo electrónico:</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="red">*</font>
                        </abbr>
                        <input class="form-control" id="correo2" name="correo2"
                            placeholder="Confirma tu correo electrónico" type="text"
                            value="<?php echo $resultado['correo'];?> " required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label" for="text">Teléfono<abbr title="Este campo es obligatorio"
                                aria-label="required">
                                <font color="red">*</font>
                            </abbr></label>
                        <input class="form-control" id="tel" name="tel" placeholder="Teléfono" type="text"
                            value="<?php echo $resultado['telefono'];?> " required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label" for="text">Nombre del coordinador(a) suplente</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="red">*</font>
                        </abbr>
                        <input class="form-control" id="nombCoS" name="nombCoS"
                            placeholder="Nombre Coordinador Suplente" type="text"
                            value="<?php echo $resultado['nombreCoordinadorSuplente'];?> " required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label" for="puestoS">Puesto</label> <abbr
                            title="Este campo es obligatorio" aria-label="required">
                            <font color="red">*</font>
                        </abbr>
                        <input class="form-control" id="puestoS" name="puestoS" placeholder="Puesto del Coordinador"
                            type="text" value="<?php echo $resultado['puestoSuplente'];?>" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label" for="text">Correo</label> <abbr title="Este campo es obligatorio"
                            aria-label="required">
                            <font color="red">*</font>
                        </abbr>
                        <input class="form-control" id="correoS" name="correoS" placeholder="Correo" type="text"
                            value="<?php echo $resultado['correoSuplente'];?> " required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label" for="text">Teléfono<abbr title="Este campo es obligatorio"
                                aria-label="required">
                                <font color="red">*</font>
                            </abbr></label>
                        <input class="form-control" id="telS" name="telS" placeholder="Teléfono" type="text"
                            value="<?php echo $resultado['telefonoSuplente'];?> " required>
                    </div>


                    <div class="form-group col-md-4">
                        <label class="control-label" for="file-01">Cargar archivo:</label>
                        <input id="imagen" name="imagen" type="file">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="control-label" for="password-01">Contraseña </label> <abbr
                            title="Solo letras y números" aria-label="required">
                            <font color="red">*/Solo letras y números</font>
                        </abbr>
                        <input class="form-control" id="pass" name="pass"
                            onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))"
                            placeholder="Contraseña" type="password" value="<?php echo $resultado['password'];?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="password-01">Confirma tu Contraseña</label> <abbr
                            title="Solo letras y números" aria-label="required">
                            <font color="red">*</font>
                        </abbr>
                        <input class="form-control" id="password2" name="password2"
                            onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))"
                            placeholder="Confirma tu Contraseña" type="password" value="<?php echo $resultado['password'];?>" required>
                    </div>



                    <div>&nbsp;</div>
                    <div>&nbsp;</div>

                    <button class="btn btn-primary pull-right" name="registro" type="submit"
                        onclick="validarCorreo(document.getElementById('correo').value)">Enviar</button>

                </div>

            </form>

        </div>

        <form role="form" action="registrar.php" method="post">
            <div class="checkbox" align="center">
                <label>
                    <input type="checkbox" value="acepto" name="acepto[]" id="acepto" onclick="return ConfirmaAviso()">
                    Acepto los términos y condiciones
                </label>
            </div>
        </form>

        <script>
        function validarCorreo(correo) {
            var expReg =
                /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
            var esValido = expReg.test(correo);
            if (esValido == true) {
                alert('El correo es válido');
            } else {
                header('location:registro.php');

            }
        }
        </script>

        <!--Termina Container-->
    </main>
    <div>&nbsp;</div>

    <!-- JS -->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

    <script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
</body>

</html>