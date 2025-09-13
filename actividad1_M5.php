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
            $comando = $con->query("SELECT * FROM actividades WHERE id_actividad=5");
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
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=40");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r1" class="form-text">*</span></label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=5 AND id_pregunta=1");
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
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=41");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php  
                         foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r2" class="form-text">*</span></label></label>
                        <?php  }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=5 AND id_pregunta=2");
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
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=42");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r3" class="form-text">:</span>*</label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=5 AND id_pregunta=4");
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
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=43");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r4" class="form-text">:</span>*</label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=5 AND id_pregunta=4");
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
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=44");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r5" class="form-text">:</span>*</label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=5 AND id_pregunta=5");
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
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=45");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r6" class="form-text">:</span>*</label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=5 AND id_pregunta=6");
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
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=46");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r7" class="form-text">:</span>*</label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=5 AND id_pregunta=7");
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
                             $comando = $con->query("SELECT pregunta FROM actividad_preguntas WHERE id_pregunta=47");
                             $comando->execute();
                             $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                         <?php foreach($resultado AS $row){?>
                        <label><?php echo $row ['pregunta']?><span id="asterisco_r8" class="form-text">*</span></label>
                        <?php }?>
                        <div class="checkbox">
                        
                            <?php
                                $comando = $con->query("SELECT * FROM actividad_opciones WHERE id_actividad=5 AND id_pregunta=8");
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


               



                <div>&nbsp;</div>
                <DIV class="pull-left">            * Campos obligatorios         </DIV>
                <br>
                <div id="msg" class="alert alert-danger" style="visibility:hidden"></div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	<p class="pull-right">    
        
        <button class="btn btn-default" type="button" onClick="document.location.href='Modulos.php?p=5'">Regresar</button>
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

    if(!document.getElementById('r3_0').checked && !document.getElementById('r3_1').checked ){
    texto_error("asterisco_r3",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r3",2,"msg");
    }

    if(!document.getElementById('r4_0').checked && !document.getElementById('r4_1').checked ){
    texto_error("asterisco_r4",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r4",2,"msg");
    }

    if(!document.getElementById('r5_0').checked && !document.getElementById('r5_1').checked && !document.getElementById('r5_2').checked && !document.getElementById('r5_3').checked){
    texto_error("asterisco_r5",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r5",2,"msg");
    }
    if(!document.getElementById('r6_0').checked && !document.getElementById('r6_1').checked ){
    texto_error("asterisco_r6",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r6",2,"msg");
    }
    if(!document.getElementById('r7_0').checked && !document.getElementById('r7_1').checked ){
    texto_error("asterisco_r7",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r7",2,"msg");
    }

    if(!document.getElementById('r8_0').checked && !document.getElementById('r8_1').checked && !document.getElementById('r8_2').checked && !document.getElementById('r8_3').checked){
    texto_error("asterisco_r8",1,"");
    
    error_msg = 1;
    } else {
            texto_error("asterisco_r8",2,"msg");
    }

   if(error_msg == 1){
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
        return false;
    } 
   
   form.action="actividad1_M5.php"; 
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
              
               $c =0;
               $i=0;
                if ($r1 == 146) {
                echo "<script> document.getElementById('r1_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_1 =1;
            }else{
                echo "<script> document.getElementById('r1_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_1 = 0;                    
            }if ($r2 == 150) {
                echo "<script> document.getElementById('r2_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_2 =1;
            }else{
                echo "<script> document.getElementById('r2_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_2 = 0;                    
            }

            if ($r3 == 155) {
                echo "<script> document.getElementById('r3_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_3 =1;
            }else{
                echo "<script> document.getElementById('r3_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_3 = 0;                    
            }

            if ($r4 == 154) {
                echo "<script> document.getElementById('r4_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_4 =1;
            }else{
                echo "<script> document.getElementById('r4_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_4 = 0;                    
            }
            if ($r5 == 158) {
                echo "<script> document.getElementById('r5_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_5 =1;
            }else{
                echo "<script> document.getElementById('r5_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_5 = 0;                    
            }

            if ($r6 == 160) {
                echo "<script> document.getElementById('r6_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_6 =1;
            }else{
                echo "<script> document.getElementById('r6_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_6 = 0;                    
            }

            if ($r7 == 162) {
                echo "<script> document.getElementById('r7_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_7 =1;
            }else{
                echo "<script> document.getElementById('r7_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_7 = 0;                    
            }

            if ($r8 == 165) {
                echo "<script> document.getElementById('r8_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
                $c+=1;
                $puntaje_8 =1;
            }else{
                echo "<script> document.getElementById('r8_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
                $i+=1;
                $puntaje_8 = 0;                    
            }
           
    
           $suma = $puntaje_1 + $puntaje_2 + $puntaje_3 + $puntaje_4 + $puntaje_5 + $puntaje_6 + $puntaje_7 + $puntaje_8 ;
           $por=round(8*$suma/8);

           $idAl=$_SESSION['idAlumno'];
           $actividad=$con->query("SELECT intentos FROM `actividad1_m5` WHERE idAlumno=$idAl");
           $actividad->execute();
           $resultadoA = $actividad->fetchAll(PDO::FETCH_ASSOC);
           $calificacion_actividad5 = $resultadoA[0]["intentos"];

if ($calificacion_actividad5>=4) {
             echo "<div class=\"alert alert-info\"><strong>Obtuviste ".$suma." respuestas correctas de 8 preguntas.
             </strong> </div>";
             echo "<script>document.getElementById('valida').style.visibility = 'hidden';</script>";
             //Acumulaste $por %  para tu promedio final del Módulo V, ¡prepárate para tu evaluación!
 
          } else{
             echo "<div class=\"alert alert-warning\"> <strong>Obtuviste ".$suma." respuesta correcta de 8 preguntas. <br>
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
               
                $por;
                $idAl;
                $idGen;
                $intentos=1;
                $query = Conexion::conectar()->prepare("SELECT idAlumno FROM actividad1_m5 WHERE idAlumno =:idAl");
              $query->bindParam(':idAl', $idAl, PDO::PARAM_STR);
              $query->execute();
              $total = $query->rowCount();

              if ($total>=1) {
                $query = Conexion::conectar()->prepare("UPDATE actividad1_m5 SET Respuesta1 = :r1, Respuesta2 = :r2, Respuesta3 = :r3, Respuesta4 = :r4, Respuesta5 = :r5, Respuesta6 = :r6, Respuesta7 = :r7, Respuesta8 = :r8, 
                Calificacion = :cal, fecha_registro=NOW(), intentos = (intentos + 1) WHERE actividad1_m5.IdAlumno = :idAl");
                $query->bindParam(':r1', $r1, PDO::PARAM_STR);
                $query->bindParam(':r2', $r2, PDO::PARAM_STR);
                $query->bindParam(':r3', $r3, PDO::PARAM_STR);
                $query->bindParam(':r4', $r4, PDO::PARAM_STR);
                $query->bindParam(':r5', $r5, PDO::PARAM_STR);
                $query->bindParam(':r6', $r6, PDO::PARAM_STR);
                $query->bindParam(':r7', $r7, PDO::PARAM_STR);
                $query->bindParam(':r8', $r8, PDO::PARAM_STR);
                $query->bindParam(':cal', $por, PDO::PARAM_STR);
                $query->bindParam(':idAl', $idAl, PDO::PARAM_STR);
                $query->execute();

                

              }else {
                $query = Conexion::conectar()->prepare("INSERT INTO actividad1_m5 (Respuesta1, Respuesta2, Respuesta3, Respuesta4, Respuesta5, Respuesta6, Respuesta7, Respuesta8, Calificacion,idAlumno, idGeneracion, intentos) VALUES(:r1,:r2,:r3,:r4,:r5,:r6,:r7,:r8,:cal,:idAl,:idGen,:intentos)");
                $query->bindParam(':r1', $r1, PDO::PARAM_STR);
                $query->bindParam(':r2', $r2, PDO::PARAM_STR);
                $query->bindParam(':r3', $r3, PDO::PARAM_STR);
                $query->bindParam(':r4', $r4, PDO::PARAM_STR);
                $query->bindParam(':r5', $r5, PDO::PARAM_STR);
                $query->bindParam(':r6', $r6, PDO::PARAM_STR);
                $query->bindParam(':r7', $r7, PDO::PARAM_STR);
                $query->bindParam(':r8', $r8, PDO::PARAM_STR);
                $query->bindParam(':cal', $por, PDO::PARAM_STR);
                $query->bindParam(':idAl', $idAl, PDO::PARAM_STR);
                $query->bindParam(':idGen', $idGen, PDO::PARAM_STR);
                $query->bindParam(':intentos', $intentos, PDO::PARAM_STR);
                $query->execute();

                
                }

                $query=Conexion::conectar()->prepare("SELECT idAlumno FROM `boleta` WHERE idAlumno=:idAl");
                $query->bindParam(':idAl', $idAl, PDO::PARAM_STR);
                $query->execute();
                $totalc = $query->rowCount();

                if ($totalc>=1) {
                    $queryAc = Conexion::conectar()->prepare("UPDATE `boleta` SET `Calificacion5` = :cal WHERE boleta.IdAlumno = :idAl");
                $queryAc->bindParam(':cal', $por, PDO::PARAM_STR);
                $queryAc->bindParam(':idAl', $idAl, PDO::PARAM_STR);
                $queryAc->execute();
                }else{
                    $queryIn = Conexion::conectar()->prepare("INSERT INTO boleta (idAlumno,Calificacion5) VALUES(:idAl,:cal)");
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