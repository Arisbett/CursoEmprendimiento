<?php 
include ("includes/cur_header.php");
require ("includes/conexion.php");

$idAl=$_SESSION['idAlumno'];
$idGen=$_SESSION['id_generacion']; 




$nuevowhere = "";
if($_POST){
    $nuevowhere = "(";
    for($i=1;$i<=15;$i++){
        ${"r".$i} = $_POST["r".$i];
        $tmp = explode('_',${"r".$i});
        ${"id_pregunta".$i} = $tmp[0];

        $nuevowhere .= "SELECT * FROM actividad_preguntas WHERE id_pregunta=".${"id_pregunta".$i}.($i<15?" union ":")");
         //echo '<br>'.$i.' id_pregunta:<b>'. ${"id_pregunta".$i}.'</b> respuesta:<b>'.${"id_respuesta".$i}.'</b>'.($correctas[${"id_pregunta".$i}]==${"id_respuesta".$i}?"Bien":"Mal");
      
    } 
}
            $comando = Conexion::conectar()->query("SELECT * FROM actividades WHERE id_actividad=2");
            $comando->execute();
            $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($resultado AS $row){
                echo '<br><h2 align="center">'.$row["nombre_actividad"].'</h2>';
            }?>
            <div class="alert alert-info"><strong>Recuerda que solo tienes una oportunidad para realizar esta evaluaci&oacute;n</strong>
        <p><strong>¡Una vez habilitado el examen se deberá de responder de manera continua, de lo contrario la sesión expirará y se tendrá que realizar nuevamente!</strong></p></div>
            <div><p>La presente evaluaci&oacute;n permite evidenciar los conocimientos adquiridos en el M&oacute;dulo I, cuenta con el 60% que se suma a la calificación final.</p>
            <p><b>Instrucciones:</b> Seleccione la respuesta que mejor responda a cada pregunta de opci&oacute;n m&uacute;ltiple.</p> </div>
            <form role="form" name="examen">
            
                <div class="Pregunta">
                <?php
                    if(!$nuevowhere){ 
                    $comando = Conexion::conectar()->query("SELECT * FROM actividad_preguntas WHERE id_actividad='2' ");
                    } else { 
                    $comando = Conexion::conectar()->query($nuevowhere);
                    }
                    $comando->execute();
                    $total= $comando->rowCount();
                    $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                    $i=1;
                    //var_dump($total);
                    $t=1;
   
                    foreach($resultado AS $row){ 
                       
                                     
                        echo '<div class="form-group"> <label>'.$t++.'.-' .$row ["pregunta"].'<span id="asterisco_r'.$i.'" class="form-text">*</span>:</label>';
                        
                        echo '<div class="checkbox">';
                        $comando1 = Conexion::conectar()->query("SELECT id_opciones,id_pregunta, opcion FROM actividad_opciones WHERE id_actividad='6' AND id_pregunta=$row[id_pregunta]");
                        $comando1->execute();
                        
                        $resultado1= $comando1->fetchAll(PDO::FETCH_ASSOC);
                        $j=1;
                        foreach($resultado1 as $row1){
                            
                            echo '<p><label class="radio-inline"><input name="r'.$i.'" type="radio" id="r'.$i.'_'.$j.'" value="'.$row1["id_pregunta"].'_'.$row1["id_opciones"].'"'.(${"r".$i}==$row1["id_pregunta"].'_'.$row1["id_opciones"]?"checked":"").'>'.$row1["opcion"].'</label></p>';
                            
                        $j++;
                        } 
                        echo '<div id="err_asterisco_r'.$i.'"></div>';
                        echo '</div></div><div id="r'.$i.'_evalua"></div>';
                        $i++;
                        
                    }
                    

                    
                    
                ?>
                </div>
                <div>&nbsp;</div>
                <div id="msg" class="alert alert-danger" style="visibility:hidden"></div>
                <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	<p class="pull-right">    
        
        <button class="btn btn-default" type="button" onClick="document.location.href='Modulos.php?p=1'">Regresar</button>
        <?php if(!$_POST){?>
        <button class="btn btn-primary" type="button"  onclick=" valida(); ">Enviar</button>
        <?php } ?>
        </p>
    </div>
</div>


                
                
<div>&nbsp;</div><div>&nbsp;</div>
            </form>
           
            
            <!--Termina Container-->
            <script>
                document.addEventListener("DOMContentLoaded", function(){
                // Invocamos cada 5 segundos ;)
                const milisegundos = 5 *1000;
                setInterval(function(){
                    // No esperamos la respuesta de la petición porque no nos importa
                    fetch("./refrescar.php");
                },milisegundos);
            });

    function valida(){

        var error_msg = 0;
        form = document.examen;
//alert(document.getElementById("r1_1")+"*"+document.getElementById("r1_2")+"*"+document.getElementById("r1_3"))
        for(i=1;i<=15;i++){

            
            if(!document.getElementById('r'+i+"_1").checked && !document.getElementById('r'+i+"_2").checked){
              texto_error("asterisco_r"+i,1,"msg");
              document.getElementById('r'+i+"_1").focus();
              error_msg = 1;
            } else {
              texto_error("asterisco_r"+i,2,"msg");
            }
        

            try {
                if(error_msg==1 && !document.getElementById('r'+i+"_3").checked){
                texto_error("asterisco_r"+i,1,"msg");
                document.getElementById('r'+i+"_1").focus();
                error_msg = 1;
                } else {
                texto_error("asterisco_r"+i,2,"msg");
                error_msg = 0;
                }
            } catch (error) {}
        }

        if(error_msg == 1){
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
        return false;
    } 

    if (!confirm ("¿Estas seguro de enviar la evaluación final del Módulo 1?\nConsidera que una vez enviada la evaluación final ya no podrás hacer modificaciones. \n\n-Haz clic en el botón \"Cancelar\" si deseas realizar algún cambio en las respuestas.")){
		return false;
	} else {
        form.action="examenModulo1.php"; 
   form.method="post";
   form.submit();
    }

        
    }
    

    function texto_error(element,tipo,msg){

      if(tipo==1){
          document.getElementById(msg).style.visibility ="visible";
          document.getElementById("err_"+element).innerHTML='<small class="form-text form-text-error">Este campo es obligatorio</small>';
      }else{
          document.getElementById(msg).style.visibility ="hidden";
          document.getElementById("err_"+element).innerHTML='';
      }
    }

    function myFunction() {
  confirm("¿Estas seguro de enviar el examen del Módulo 1?");
}
    </script>

<?php
    //} 
    if($_POST){    
        $total_bien = 0;
        for($i=1;$i<=15;$i++){
            ${"r".$i} = $_POST["r".$i];
            $tmp = explode('_',${"r".$i});
            ${"id_pregunta".$i} = $tmp[0];
            ${"id_respuesta".$i} = $tmp[1];
            $cadena= ${"id_respuesta".$i};
    
            $camposr .= "Respuesta".$i.($i<15?",":"");
            $valoresr .= ${"id_respuesta".$i}.($i<15?",":"");
    
            $camposp .= "Pregunta".$i.($i<15?",":"");
            $valoresp .= ${"id_pregunta".$i}.($i<15?",":"");
             //echo '<br>'.$i.' id_pregunta:<b>'. ${"id_pregunta".$i}.'</b> respuesta:<b>'.${"id_respuesta".$i}.'</b>'.($correctas[${"id_pregunta".$i}]==${"id_respuesta".$i}?"Bien":"Mal");
          
        }    
    $query_respuestas = Conexion::conectar()->prepare("SELECT * FROM actividad_opciones WHERE id_pregunta IN ($valoresp) AND correcta='1'");
    $query_respuestas->execute();
    $resultado_respuestas = $query_respuestas->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($resultado_respuestas AS $row_res){ 
        $correctas[$row_res["id_pregunta"]] = $row_res["id_opciones"];
    }
    
    for($i=1;$i<=15;$i++){
        ${"r".$i} = $_POST["r".$i];
        $tmp = explode('_',${"r".$i});
        ${"id_pregunta".$i} = $tmp[0];
        ${"id_respuesta".$i} = $tmp[1];
        $cadena= ${"id_respuesta".$i};
    
        if($correctas[${"id_pregunta".$i}]==${"id_respuesta".$i}){
        $total_bien++;
        echo "<script> document.getElementById('r".$i."_evalua').innerHTML ='<div class=\"alert alert-success\">Correcto</div>';</script>";
        } else {
            echo "<script> document.getElementById('r".$i."_evalua').innerHTML ='<div class=\"alert alert-danger\">Incorrecto</div>';</script>";
        }
    } 
    $calEx=60*$total_bien/15;
    if ($total_bien==15) {
        echo "<div>&nbsp;</div><div>&nbsp;</div><div class=\"alert alert-success\"><b>Tienes " .$total_bien." respuestas correctas de 15 preguntas.<br> Obtuviste el $calEx % de la calificación final</b></div>";
    
     } else{
        echo "<div>&nbsp;</div><div>&nbsp;</div><div class=\"alert alert-warning\"><b>Tienes " .$total_bien." respuestas correctas de 15 preguntas.<br> Obtuviste el $calEx % de la calificación final</b></div>";
                           
    }
     //echo "INSERT INTO examen_m1 (idAlumno,$camposr,$camposp,Calificacion,idGeneracion) VALUES (:idAl, $valoresr,$valoresp, :cal, :idGen)";
    $query = Conexion::conectar()->prepare("INSERT INTO examen_m1 (idAlumno,$camposr,$camposp,Calificacion,idGeneracion) VALUES (:idAl, $valoresr,$valoresp, :cal, :idGen)");
    $query->bindParam(':idAl', $idAl, PDO::PARAM_STR); 
    $query->bindParam(':cal', $total_bien, PDO::PARAM_STR);
     $query->bindParam(':idGen', $idGen, PDO::PARAM_STR);
    $query->execute();
    
        
    } 
  
    ?>
 


            <?php include ("includes/cur_footer.php"); ?>

