<?php include ("includes/cur_header.php");
ini_set("display_errors", "0");
require ("includes/conexion.php");

$db = new Conexion();
$con = $db->conectar();
?>


<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src='https://www.googletagmanager.com/ns.html?id=GTM-WMZMQHZ'
height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <!-- Contenido -->
    <main class="page">

        <div class="bottom-buffer"></div>
        <div class="container">
            <!--Inicia Container-->
            <div>&nbsp;</div>
            <?php
            $comando = $con->query("SELECT * FROM actividades WHERE id_actividad=6");
            $comando->execute();
            $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php foreach($resultado AS $row){?>
            <h2 align="center"><?php echo $row ['nombre_actividad']?></h2>
            <?php }?>
            <div>&nbsp;</div>

            <div class="alert alert-info">
                <p><strong>Nos interesa conocer tu opinión del Curso de Emprendimiento, por favor responde de
                        forma objetiva la siguiente encuesta.
                    </strong> </p>
            </div>
            <p><strong>Instrucciones: </strong>Marca la opción que consideres correcta, teniendo en cuenta que 5 es Totalmente de acuerdo y 1 es Totalmente en desacuerdo.</p>
            <div>&nbsp;</div>

            <form role="form" name="actividad4">
                <div class="form-group pregunta1">
                    <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=48");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                    <?php foreach($resultado AS $row){?>
                    <label><?php echo $row ['pregunta']?><span id="asterisco_r1" class="form-text">:</span>*</label>
                    <?php }?>
                    <div class="container">
                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=6 AND id_pregunta=1");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><input class="radio-inline" type="radio" name="r1" id="r1_<?=$i?>" value="<?php echo $row ['id_opciones']?>"
                                    <?=($_POST["r1"]==$row ['id_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        
                        <?php $i++; }?>
</label>
                        <div id="r1_evalua"></div>
                        <div id="err_asterisco_r1"></div>
                    </div>
                </div>
                </div>

                <div class="form-group pregunta2">
                    <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=49 ");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                    <?php  
                         foreach($resultado AS $row){?>
                    <label><?php echo $row ['pregunta']?><span id="asterisco_r2"
                            class="form-text">*</span>:</label></label>
                    <?php  }?>
                    <div class="container">
                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=6 AND id_pregunta=2");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><input class="radio-inline" type="radio" name="r2" id="r2_<?=$i?>" value="<?php echo $row ['id_opciones']?>"
                                    <?=($_POST["r2"]==$row ['id_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>
                        
                        <?php $i++; }?>
                    </label>
                        <div id="err_asterisco_r2"></div>
                        <div id="r2_evalua"></div>

                    </div>
                </div>
                </div>

                <div class="form-group pregunta3">
                    <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=50");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                    <?php foreach($resultado AS $row){?>
                    <label><?php echo $row ['pregunta']?><span id="asterisco_r3" class="form-text">:</span>*</label>
                    <?php }?>
                    <div class="container">
                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=6 AND id_pregunta=3");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><input class="radio-inline" type="radio" name="r3" id="r3_<?=$i?>" value="<?php echo $row ['id_opciones']?>"
                                    <?=($_POST["r3"]==$row ['id_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        
                        <?php $i++; }?>
                    </label>
                        <div id="err_asterisco_r3"></div>
                        <div id="r3_evalua"></div>
                    </div>
                    </div>
                </div>



                <div class="form-group pregunta4">
                    <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=51");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                    <?php foreach($resultado AS $row){?>
                    <label><?php echo $row ['pregunta']?><span id="asterisco_r4" class="form-text">:</span>*</label>
                    <?php }?>
                    <div class="container">
                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=6 AND id_pregunta=4");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><input class="radio-inline" type="radio" name="r4" id="r4_<?=$i?>" value="<?php echo $row ['id_opciones']?>"
                                    <?=($_POST["r4"]==$row ['id_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        
                        <?php $i++; }?>
                    </label>
                        <div id="err_asterisco_r4"></div>
                        <div id="r4_evalua"></div>
                    </div>
                    </div>
                </div>


                <div class="form-group pregunta5">
                    <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=52");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                    <?php foreach($resultado AS $row){?>
                    <label><?php echo $row ['pregunta']?><span id="asterisco_r5" class="form-text">:</span>*</label>
                    <?php }?>
                    <div class="container">
                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=6 AND id_pregunta=5");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><input class="radio-inline" type="radio" name="r5" id="r5_<?=$i?>" value="<?php echo $row ['id_opciones']?>"
                                    <?=($_POST["r5"]==$row ['id_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        
                        <?php $i++; }?></label>

                        <div id="r5_evalua"></div>
                        <div id="err_asterisco_r5"></div>
                    </div>
                    </div>
                    </div>

                    <div class="form-group pregunta6">
                        <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=53");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                        <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r6" class="form-text">:</span>*</label>
                        <?php }?>
                        <div class="container">
                        <div class="checkbox">
                            <label class="radio-inline">
                                <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=6 AND id_pregunta=6");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                                <p><input class="radio-inline" type="radio" name="r6" id="r6_<?=$i?>"
                                        value="<?php echo $row ['id_opciones']?>"
                                        <?=($_POST["r6"]==$row ['id_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                                </p>

                            
                            <?php $i++; }?></label>

                            <div id="r6_evalua"></div>
                            <div id="err_asterisco_r6"></div>
                        </div>
                        </div>
                        </div>
                        <div class="form-group pregunta7">
                            <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=54");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                            <?php foreach($resultado AS $row){?>
                            <label><?php echo $row ['pregunta']?><span id="asterisco_r7"
                                    class="form-text">:</span>*</label>
                            <?php }?>
                            <div class="container">
                            <div class="checkbox">
                                <label class="radio-inline">
                                    <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=6 AND id_pregunta=7 ORDER BY id_opciones DESC");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                    <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                                    <p><input class="radio-inline" type="radio" name="r7" id="r7_<?=$i?>"
                                            value="<?php echo $row ['id_opciones']?>"
                                            <?=($_POST["r7"]==$row ['id_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                                    </p>

                                
                                <?php $i++; }?></label>

                                <div id="r7_evalua"></div>
                                <div id="err_asterisco_r7"></div>
                            </div>
                            </div>
                        </div>

                        <div class="form-group pregunta8">
                            <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=55");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                            <?php foreach($resultado AS $row){?>
                            <label><?php echo $row ['pregunta']?><span id="asterisco_r8"
                                    class="form-text">:</span>*</label>
                            <?php }?>
                            <div class="container">
                            <div class="checkbox">
                                <label class="radio-inline">
                                    <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=6 AND id_pregunta=8 ORDER BY id_opciones DESC");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                    <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                                    <p><input class="radio-inline" type="radio" name="r8" id="r8_<?=$i?>"
                                            value="<?php echo $row ['id_opciones']?>"
                                            <?=($_POST["r8"]==$row ['id_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                                    </p>

                                
                                <?php $i++; }?></label>

                                <div id="r8_evalua"></div>
                                <div id="err_asterisco_r8"></div>
                            </div>
                            </div>
                        </div>

                        <div class="form-group pregunta9">
                            <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=56");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                            <?php foreach($resultado AS $row){?>
                            <label><?php echo $row ['pregunta']?><span id="asterisco_r9"
                                    class="form-text">:</span>*</label>
                            <?php }?>
                            <div class="container">
                            <div class="checkbox">
                                <label class="radio-inline">
                                    <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=6 AND id_pregunta=9 ORDER BY id_opciones DESC");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                    <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                                    <p><input class="radio-inline" type="radio" name="r9" id="r9_<?=$i?>"
                                            value="<?php echo $row ['id_opciones']?>"
                                            <?=($_POST["r9"]==$row ['id_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                                    </p>

                                
                                <?php $i++; }?></label>

                                <div id="r9_evalua"></div>
                                <div id="err_asterisco_r9"></div>
                            </div>
                            </div>
                        </div>


                        <div class="form-group pregunta10">
                            <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=57");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                            <?php foreach($resultado AS $row){?>
                            <label><?php echo $row ['pregunta']?><span id="asterisco_r10"
                                    class="form-text">:</span>*</label>
                            <?php }?>
                            <div class="container">
                            <div class="checkbox">
                                <label class="radio-inline">
                                    <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=6 AND id_pregunta=10 ORDER BY id_opciones DESC");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                    <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                                    <p><input class="radio-inline" type="radio" name="r10" id="r10_<?=$i?>"
                                            value="<?php echo $row ['id_opciones']?>"
                                            <?=($_POST["r10"]==$row ['id_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                                    </p>

                                
                                <?php $i++; }?></label>

                                <div id="r10_evalua"></div>
                                <div id="err_asterisco_r10"></div>
                            </div>
                            </div>
                        </div>

                        <div>&nbsp;</div>
                        <DIV class="pull-left"> * Campos obligatorios </DIV>
                        <br>
                        <div id="msg" class="alert alert-danger" style="visibility:hidden"></div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <p class="pull-right">

                                    <button class="btn btn-primary" type="button" onClick="return fenvia()"
                                        id="valida">Validar</button>
                                </p>
                            </div>
                        </div>

                        <div>&nbsp;</div>
                        <input type="hidden" id="idAl" name="idAl" value="<?php echo $_SESSION['idAlumno']?>">
                        <input type="hidden" id="idGen" name="idGen" value="<?php echo $_SESSION['id_generacion']?>">
            </form>
            <script language="javascript">
            function fenvia() {

                form = document.actividad4;
                var error_msg = 0;

                if (!document.getElementById('r1_0').checked && !document.getElementById('r1_1').checked && !document
                    .getElementById('r1_2').checked && !document.getElementById('r1_3').checked && !document
                    .getElementById('r1_4').checked) {
                    texto_error("asterisco_r1", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r1", 4, "msg");
                }

                if (!document.getElementById('r2_0').checked && !document.getElementById('r2_1').checked && !document
                    .getElementById('r2_2').checked && !document.getElementById('r2_3').checked && !document
                    .getElementById('r2_4').checked) {
                    texto_error("asterisco_r2", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r2", 4, "msg");
                }

                if (!document.getElementById('r3_0').checked && !document.getElementById('r3_1').checked && !document
                    .getElementById('r3_2').checked && !document.getElementById('r3_3').checked && !document
                    .getElementById('r3_4').checked) {
                    texto_error("asterisco_r3", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r3", 4, "msg");
                }

                if (!document.getElementById('r4_0').checked && !document.getElementById('r4_1').checked ) {
                    texto_error("asterisco_r4", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r4", 1, "msg");
                }

                if (!document.getElementById('r5_0').checked && !document.getElementById('r5_1').checked && !document
                    .getElementById('r5_2').checked && !document.getElementById('r5_3').checked&& !document.getElementById('r5_4').checked) {
                    texto_error("asterisco_r5", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r5", 3, "msg");
                }
                if (!document.getElementById('r6_0').checked && !document.getElementById('r6_1').checked && !document
                    .getElementById('r6_2').checked && !document.getElementById('r6_3').checked && !document
                    .getElementById('r6_4').checked) {
                    texto_error("asterisco_r6", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r6", 4, "msg");
                }
                if (!document.getElementById('r7_0').checked && !document.getElementById('r7_1').checked && !document
                    .getElementById('r7_2').checked && !document.getElementById('r7_3').checked && !document
                    .getElementById('r7_4').checked) {
                    texto_error("asterisco_r7", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r7", 4, "msg");
                }
                if (!document.getElementById('r8_0').checked && !document.getElementById('r8_1').checked && !document
                    .getElementById('r8_2').checked && !document.getElementById('r8_3').checked && !document
                    .getElementById('r8_4').checked) {
                    texto_error("asterisco_r8", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r8", 4, "msg");
                }

                if (!document.getElementById('r9_0').checked && !document.getElementById('r9_1').checked && !document
                    .getElementById('r9_2').checked && !document.getElementById('r9_3').checked ) {
                    texto_error("asterisco_r9", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r9", 3, "msg");
                }

                if (!document.getElementById('r10_0').checked && !document.getElementById('r10_1').checked && !document
                    .getElementById('r10_2').checked && !document.getElementById('r10_3').checked && !document
                    .getElementById('r10_4').checked && !document
                    .getElementById('r10_5').checked) {
                    texto_error("asterisco_r10", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r10", 6, "msg");
                }

                if (error_msg == 1) {
                    document.getElementById("msg").style.visibility = "visible";
                    document.getElementById("msg").innerHTML =
                        "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
                    return false;
                }

                form.action = "Evsatisfaccion.php";
                form.method = "post";
                form.submit();
            }

            function campo_error(element, tipo, msg) {

                if (tipo == 1) {
                    document.getElementById(element).className = "form-control form-control-error";
                    document.getElementById(element).focus();
                } else {
                    document.getElementById(element).className = "form-control";
                }
            }

            function texto_error(element, tipo, msg) {

                if (tipo == 1) {
                    //document.getElementById(msg).style.visibility ="visible";
                    //document.getElementById(element).className="form-text form-text-error";
                    document.getElementById("err_" + element).innerHTML =
                        '<small class="form-text form-text-error">Este campo es obligatorio</small>';
                } else {
                    //document.getElementById(element).className="";
                    //document.getElementById(msg).style.visibility ="hidden";
                    document.getElementById("err_" + element).innerHTML = '';
                }
            }
            </script>




        </div>
        <!--Termina Container-->
    </main>

    <?php include ("includes/cur_footer.php");?>