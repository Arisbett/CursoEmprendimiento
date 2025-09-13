<?php include ("includes/cur_header.php");
ini_set("display_errors", "0");
require ("includes/conexion.php");
$db = new Conexion();
$con = $db->conectar();
?>


<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WMZMQHZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <!-- Contenido -->
    <main class="page">
       
        <div class="bottom-buffer"></div>
        <div class="container">
            <!--Inicia Container-->
            <div>&nbsp;</div>
            <?php
            $comando = $con->query("SELECT * FROM actividades WHERE id_actividad=4");
            $comando->execute();
            $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php foreach($resultado AS $row){?>
            <h2 align="center"><?php echo $row ['nombre_actividad']?></h2>
            <?php }?>
            <div>&nbsp;</div>
            
            <p><strong>Instrucciones: </strong> A continuación, se presentan una serie de preguntas en la modalidad de opción múltiple. De cada pregunta responde indicando en el espacio correspondiente la respuesta que consideres es la correcta.</p>

<p>Tienes 5 oportunidades para obtener un mínimo de 80% o más, de respuestas correctas a fin de aprobar la actividad.</p>

<p>Obtenido este resultado, podrás pasar a cursar el siguiente nivel. </p>
            <div>&nbsp;</div>
            
            <form role="form" name="actividad7">
                <div class="form-group pregunta1">
                             <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=30");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r1" class="form-text">*</span></label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=4 AND id_pregunta=1");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><label class="radio-inline"><input type="radio" name="r1" id="r1_<?=$i?>"
                                value="<?php echo $row ['id_opciones']?>" <?=($_POST["r1"]==$row ['id_opciones']?"checked":"")?> ><?php echo $row ['opcion']?>
                                
                        </label></p>
                        <?php $i++; }?>
                        
                        <div id="r1_evalua"></div>
                        <div id="err_asterisco_r1"></div>
                    </div>
                </div>

                <div class="form-group pregunta2">
                             <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=31");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php  
                         foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r2" class="form-text">*</span></label></label>
                        <?php  }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=4 AND id_pregunta=2");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><label class="radio-inline"><input  type="radio" name="r2" id="r2_<?=$i?>"
                                value="<?php echo $row ['id_opciones']?>" <?=($_POST["r2"]==$row ['id_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                        </label></p>
                        <?php $i++; }?>
                        <div id="err_asterisco_r2"></div>
                        <div id="r2_evalua"></div>

                    </div>
                </div>
                <div class="form-group pregunta3">
                             <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=32");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r3" class="form-text">*</span></label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=4 AND id_pregunta=3");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><label class="radio-inline"><input type="radio" name="r3" id="r3_<?=$i?>"
                                value="<?php echo $row ['id_opciones']?>" <?=($_POST["r3"]==$row ['id_opciones']?"checked":"")?> ><?php echo $row ['opcion']?>
                                
                        </label></p>
                        <?php $i++; }?>
                        <div id="err_asterisco_r3"></div>
                        <div id="r3_evalua"></div>
                    </div>
                </div>



                <div class="form-group pregunta4">
                             <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=33");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r4" class="form-text">*</span></label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=4 AND id_pregunta=4");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><label class="radio-inline"><input type="radio" name="r4" id="r4_<?=$i?>"
                                value="<?php echo $row ['id_opciones']?>" <?=($_POST["r4"]==$row ['id_opciones']?"checked":"")?> ><?php echo $row ['opcion']?>
                                
                        </label></p>
                        <?php $i++; }?>
                        <div id="err_asterisco_r4"></div>
                        <div id="r4_evalua"></div>
                    </div>
                </div>


                <div class="form-group pregunta5">
                             <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=34");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r5" class="form-text">*</span></label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=4 AND id_pregunta=5");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><label class="radio-inline"><input type="radio" name="r5" id="r5_<?=$i?>"
                                value="<?php echo $row ['id_opciones']?>" <?=($_POST["r5"]==$row ['id_opciones']?"checked":"")?> ><?php echo $row ['opcion']?>
                                
                        </label></p>
                        <?php $i++; }?>
                      
                        <div id="r5_evalua"></div>
                        <div id="err_asterisco_r5"></div>
                    </div>
                </div>

                <div class="form-group pregunta6">
                             <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=35");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r6" class="form-text">*</span></label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=4 AND id_pregunta=6");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><label class="radio-inline"><input type="radio" name="r6" id="r6_<?=$i?>"
                                value="<?php echo $row ['id_opciones']?>" <?=($_POST["r6"]==$row ['id_opciones']?"checked":"")?> ><?php echo $row ['opcion']?>
                                
                        </label></p>
                        <?php $i++; }?>
                      
                        <div id="r6_evalua"></div>
                        <div id="err_asterisco_r6"></div>
                    </div>
                </div>


                <div class="form-group pregunta7">
                             <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=36");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r7" class="form-text">*</span></label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=4 AND id_pregunta=7");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><label class="radio-inline"><input type="radio" name="r7" id="r7_<?=$i?>"
                                value="<?php echo $row ['id_opciones']?>" <?=($_POST["r7"]==$row ['id_opciones']?"checked":"")?> ><?php echo $row ['opcion']?>
                                
                        </label></p>
                        <?php $i++; }?>
                      
                        <div id="r7_evalua"></div>
                        <div id="err_asterisco_r7"></div>
                    </div>
                </div>


                <div class="form-group pregunta8">
                             <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=37");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r8" class="form-text">*</span></label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=4 AND id_pregunta=8");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><label class="radio-inline"><input type="radio" name="r8" id="r8_<?=$i?>"
                                value="<?php echo $row ['id_opciones']?>" <?=($_POST["r8"]==$row ['id_opciones']?"checked":"")?> ><?php echo $row ['opcion']?>
                                
                        </label></p>
                        <?php $i++; }?>
                      
                        <div id="r8_evalua"></div>
                        <div id="err_asterisco_r8"></div>
                    </div>
                </div>


                <div class="form-group pregunta9">
                             <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=38");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r9" class="form-text">*</span></label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=4 AND id_pregunta=9");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><label class="radio-inline"><input type="radio" name="r9" id="r9_<?=$i?>"
                                value="<?php echo $row ['id_opciones']?>" <?=($_POST["r9"]==$row ['id_opciones']?"checked":"")?> ><?php echo $row ['opcion']?>
                                
                        </label></p>
                        <?php $i++; }?>
                      
                        <div id="r9_evalua"></div>
                        <div id="err_asterisco_r9"></div>
                    </div>
                </div>

                <div class="form-group pregunta10">
                             <?php
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=39");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r10" class="form-text">*</span></label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=4 AND id_pregunta=10");
                                $comando->execute();
                                $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                            <?php   $i=0;
                                        foreach($resultado AS $row){
                                            ?>
                            <p><label class="radio-inline"><input type="radio" name="r10" id="r10_<?=$i?>"
                                value="<?php echo $row ['id_opciones']?>" <?=($_POST["r10"]==$row ['id_opciones']?"checked":"")?> ><?php echo $row ['opcion']?>
                                
                        </label></p>
                        <?php $i++; }?>
                      
                        <div id="r10_evalua"></div>
                        <div id="err_asterisco_r10"></div>
                    </div>
                </div>




                <div>&nbsp;</div>
                <DIV class="pull-left">            * Campos obligatorios         </DIV>
                <br>
                <div id="msg" class="alert alert-danger" style="visibility:hidden"></div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	<p class="pull-right">    
        
        <button class="btn btn-default" type="button" onClick="document.location.href='Modulos.php?p=4'">Regresar</button>
        <button class="btn btn-primary" type="button" onClick="return fenvia()" id="valida">Validar</button>
    </p>
    </div>
</div>
                
                <div>&nbsp;</div>
                <?php
                $idAl=$_SESSION['idAlumno'];
                $idGen=$_SESSION['id_generacion'];               
                ?>
            </form>
            <script language="javascript">
function fenvia(){
   
   form = document.actividad7;
   var error_msg = 0;
    
   if(!document.getElementById('r1_0').checked && !document.getElementById('r1_1').checked && !document.getElementById('r1_2').checked && !document.getElementById('r1_3').checked){
    texto_error("asterisco_r1",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r1",2,"msg");
    }

    if(!document.getElementById('r2_0').checked && !document.getElementById('r2_1').checked && !document.getElementById('r2_2').checked && !document.getElementById('r2_3').checked){
    texto_error("asterisco_r2",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r2",2,"msg");
    }

    if(!document.getElementById('r3_0').checked && !document.getElementById('r3_1').checked && !document.getElementById('r3_2').checked && !document.getElementById('r3_3').checked ){
    texto_error("asterisco_r3",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r3",2,"msg");
    }

    if(!document.getElementById('r4_0').checked && !document.getElementById('r4_1').checked && !document.getElementById('r4_2').checked && !document.getElementById('r4_3').checked){
    texto_error("asterisco_r4",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r4",2,"msg");
    }

    if(!document.getElementById('r5_0').checked && !document.getElementById('r5_1').checked ){
    texto_error("asterisco_r5",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r5",2,"msg");
    }
    if(!document.getElementById('r6_0').checked && !document.getElementById('r6_1').checked && !document.getElementById('r6_2').checked && !document.getElementById('r6_3').checked){
    texto_error("asterisco_r6",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r6",2,"msg");
    }
    if(!document.getElementById('r7_0').checked && !document.getElementById('r7_1').checked && !document.getElementById('r7_2').checked && !document.getElementById('r7_3').checked){
    texto_error("asterisco_r7",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r7",2,"msg");
    }

    if(!document.getElementById('r8_0').checked && !document.getElementById('r8_1').checked && !document.getElementById('r8_2').checked && !document.getElementById('r8_3').checked && !document.getElementById('r8_4').checked){
    texto_error("asterisco_r8",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r8",2,"msg");
    }

    if(!document.getElementById('r9_0').checked && !document.getElementById('r9_1').checked && !document.getElementById('r9_2').checked && !document.getElementById('r9_3').checked){
    texto_error("asterisco_r9",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r9",2,"msg");
    }
    if(!document.getElementById('r10_0').checked && !document.getElementById('r10_1').checked && !document.getElementById('r10_2').checked && !document.getElementById('r10_3').checked){
    texto_error("asterisco_r10",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r10",2,"msg");
    }

   if(error_msg == 1){
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
        return false;
    } 
   
   form.action="actividad1_M4.php"; 
   form.method="post";
   form.submit();
   }

    function campo_error(element,tipo,msg){

        if(tipo==1){
            document.getElementById(element).className="form-control form-control-error";
            document.getElementById(element).focus();
        }else{
            document.getElementById(element).className="form-control";
        }
    }

function texto_error(element,tipo,msg){

if(tipo==1){
    //document.getElementById(msg).style.visibility ="visible";
    //document.getElementById(element).className="form-text form-text-error";
    document.getElementById("err_"+element).innerHTML='<small class="form-text form-text-error">Este campo es obligatorio</small>';
}else{
    //document.getElementById(element).className="";
    //document.getElementById(msg).style.visibility ="hidden";
    document.getElementById("err_"+element).innerHTML='';
}
}
</script>

            <?php
                require_once ("includes/conexion.php");
           
           if ($_POST) { 
               $r1=$_POST["r1"];
               $r2=$_POST["r2"];
               $r3=$_POST["r3"];
               $r4=$_POST["r4"];
               $r5=$_POST["r5"];
               $r6=$_POST["r6"];
               $r7=$_POST["r7"];
               $r8=$_POST["r8"];
               $r9=$_POST["r9"];
               $r10=$_POST["r10"];
               $c =0;
               $i=0;
                if ($r1 == 106) {
                echo "<script> document.getElementById('r1_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_1 =1;
            }else{
                echo "<script> document.getElementById('r1_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_1 = 0;                    
            }if ($r2 == 113) {
                echo "<script> document.getElementById('r2_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_2 =1;
            }else{
                echo "<script> document.getElementById('r2_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_2 = 0;                    
            }

            if ($r3 == 115) {
                echo "<script> document.getElementById('r3_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_3 =1;
            }else{
                echo "<script> document.getElementById('r3_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_3 = 0;                    
            }

            if ($r4 == 119) {
                echo "<script> document.getElementById('r4_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_4 =1;
            }else{
                echo "<script> document.getElementById('r4_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_4 = 0;                    
            }
            if ($r5 == 122) {
                echo "<script> document.getElementById('r5_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_5 =1;
            }else{
                echo "<script> document.getElementById('r5_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_5 = 0;                    
            }

            if ($r6 == 125) {
                echo "<script> document.getElementById('r6_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_6 =1;
            }else{
                echo "<script> document.getElementById('r6_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_6 = 0;                    
            }

            if ($r7 == 131) {
                echo "<script> document.getElementById('r7_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_7 =1;
            }else{
                echo "<script> document.getElementById('r7_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_7 = 0;                    
            }

            if ($r8 == 132) {
                echo "<script> document.getElementById('r8_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_8 =1;
            }else{
                echo "<script> document.getElementById('r8_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_8 = 0;                    
            }
            if ($r9 == 137) {
                echo "<script> document.getElementById('r9_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_9 =1;
            }else{
                echo "<script> document.getElementById('r9_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_9 = 0;                    
            }
            if ($r10 == 141) {
                echo "<script> document.getElementById('r10_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_10 =1;
            }else{
                echo "<script> document.getElementById('r10_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_10 = 0;                    
            }
    
           $suma = $puntaje_1 + $puntaje_2 + $puntaje_3 + $puntaje_4 + $puntaje_5 + $puntaje_6 + $puntaje_7 + $puntaje_8 + $puntaje_9 + $puntaje_10;
           $por=10*$suma/10;

           $idAl=$_SESSION['idAlumno'];
           $actividad=$con->query("SELECT intentos FROM `actividad1_m4` WHERE idAlumno=$idAl");
           $actividad->execute();
           $resultadoA = $actividad->fetchAll(PDO::FETCH_ASSOC);
           $calificacion_actividad4 = $resultadoA[0]["intentos"];

if ($calificacion_actividad4>=4) {
            echo "<div class=\"alert alert-info\"><strong>Obtuviste ".$suma." respuestas correctas de 10 preguntas.
            </strong> </div>";
            echo "<script>document.getElementById('valida').style.visibility = 'hidden';</script>";
            //Acumulaste $por %  para tu promedio final del Módulo IV, ¡prepárate para tu evaluación!

         } else{
            echo "<div class=\"alert alert-warning\"> <strong>Obtuviste ".$suma." respuesta correcta de 10 preguntas. <br>
            </strong> </div>";

            //Para que la actividad sea promediada, se requiere que TODAS LAS RESPUESTAS SEAN CORRECTAS, si es necesario vuelva a leer la información e intente nuevamente las veces que sea necesario.
                               
        }
               $r1=strip_tags(htmlentities($_POST['r1']));
               $r2=strip_tags(htmlentities($_POST['r2']));
               $r3=strip_tags(htmlentities($_POST['r3']));
               $r4=strip_tags(htmlentities($_POST['r4']));
               $r5=strip_tags(htmlentities($_POST['r5']));
               $r6=strip_tags(htmlentities($_POST['r6']));
               $r7=strip_tags(htmlentities($_POST['r7']));
               $r8=strip_tags(htmlentities($_POST['r8']));
               $r9=strip_tags(htmlentities($_POST['r9']));
               $r10=strip_tags(htmlentities($_POST['r10']));
               $por;
               $idAl;
               $idGen;
               
               $query = Conexion::conectar()->prepare("SELECT idAlumno FROM actividad1_m4 WHERE idAlumno =:idAl");
             $query->bindParam(':idAl', $idAl, PDO::PARAM_STR);
             $query->execute();
             $total = $query->rowCount();

             if ($total>=1) {
               $query = Conexion::conectar()->prepare("UPDATE actividad1_m4 SET Respuesta1 = :r1, Respuesta2 = :r2, Respuesta3 = :r3, Respuesta4 = :r4, Respuesta5 = :r5, Respuesta6 = :r6, Respuesta7 = :r7, Respuesta8 = :r8, Respuesta9 = :r9, Respuesta10 = :r10, 
               Calificacion = :cal, fecha_registro=NOW(), intentos = (intentos + 1) WHERE actividad1_m4.IdAlumno = :idAl");
               $query->bindParam(':r1', $r1, PDO::PARAM_STR);
               $query->bindParam(':r2', $r2, PDO::PARAM_STR);
               $query->bindParam(':r3', $r3, PDO::PARAM_STR);
               $query->bindParam(':r4', $r4, PDO::PARAM_STR);
               $query->bindParam(':r5', $r5, PDO::PARAM_STR);
               $query->bindParam(':r6', $r6, PDO::PARAM_STR);
               $query->bindParam(':r7', $r7, PDO::PARAM_STR);
               $query->bindParam(':r8', $r8, PDO::PARAM_STR);
               $query->bindParam(':r9', $r9, PDO::PARAM_STR);
               $query->bindParam(':r10', $r10, PDO::PARAM_STR);
               $query->bindParam(':cal', $por, PDO::PARAM_STR);
               $query->bindParam(':idAl', $idAl, PDO::PARAM_STR);
               $query->execute();

              

             }else {
               $intentos=1;
               $query = Conexion::conectar()->prepare("INSERT INTO actividad1_m4 (Respuesta1, Respuesta2, Respuesta3, Respuesta4, Respuesta5, Respuesta6, Respuesta7, Respuesta8, Respuesta9, Respuesta10, Calificacion, idAlumno, idGeneracion, intentos) VALUES(:r1,:r2,:r3,:r4,:r5,:r6,:r7,:r8,:r9,:r10,:cal,:idAl,:idGen, :intent)");
               $query->bindParam(':r1', $r1, PDO::PARAM_STR);
               $query->bindParam(':r2', $r2, PDO::PARAM_STR);
               $query->bindParam(':r3', $r3, PDO::PARAM_STR);
               $query->bindParam(':r4', $r4, PDO::PARAM_STR);
               $query->bindParam(':r5', $r5, PDO::PARAM_STR);
               $query->bindParam(':r6', $r6, PDO::PARAM_STR);
               $query->bindParam(':r7', $r7, PDO::PARAM_STR);
               $query->bindParam(':r8', $r8, PDO::PARAM_STR);
               $query->bindParam(':r9', $r9, PDO::PARAM_STR);
               $query->bindParam(':r10', $r10, PDO::PARAM_STR);
               $query->bindParam(':cal', $por, PDO::PARAM_STR);
               $query->bindParam(':idAl', $idAl, PDO::PARAM_STR);
               $query->bindParam(':idGen', $idGen, PDO::PARAM_STR);
               $query->bindParam(':intent', $intentos, PDO::PARAM_STR);
               $query->execute();

               
               }

               $query=Conexion::conectar()->prepare("SELECT idAlumno FROM `boleta` WHERE idAlumno=:idAl");
               $query->bindParam(':idAl', $idAl, PDO::PARAM_STR);
               $query->execute();
               $totalc = $query->rowCount();

               if ($totalc>=1) {
                   $queryAc = Conexion::conectar()->prepare("UPDATE `boleta` SET `Calificacion4` = :cal WHERE boleta.IdAlumno = :idAl");
                   $queryAc->bindParam(':cal', $por, PDO::PARAM_STR);
                   $queryAc->bindParam(':idAl', $idAl, PDO::PARAM_STR);
                   $queryAc->execute();
               }else {
                   $queryIn = Conexion::conectar()->prepare("INSERT INTO boleta (idAlumno, Calificacion4) VALUES(:idAl,:cal)");
               $queryIn->bindParam(':idAl', $idAl, PDO::PARAM_STR);
               $queryIn->bindParam(':cal', $suma, PDO::PARAM_STR);
               $queryIn->execute();
               }
           
          }
           

      ?>
           

       </div>
       <!--Termina Container-->
   </main>

   <?php include ("includes/cur_footer.php");?>