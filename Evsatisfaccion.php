<?php
include ("includes/cur_header.php");
                require_once ("includes/conexion.php");
           
           if ($_POST) { 

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
                $idAl=strip_tags($_POST['idAl']);
                  $idGen=1;
               
                $query = Conexion::conectar()->prepare("INSERT INTO ev_satisfaccion (Respuesta1, Respuesta2, Respuesta3, Respuesta4, Respuesta5, Respuesta6, Respuesta7, Respuesta8, Respuesta9,  Respuesta10, idGeneracion, idAlumno) VALUES(:r1,:r2,:r3,:r4,:r5,:r6,:r7,:r8,:r9,:r10,:idGen,:idAl)");
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
                $query->bindParam(':idGen', $idGen, PDO::PARAM_STR);
                $query->bindParam(':idAl', $idAl, PDO::PARAM_STR);
                
                $query->execute();
                //header ('location:Modulos.php');
      }          
                echo '<div>&nbsp;</div><div>&nbsp;</div><div class="alert alert-info">Se han guardado las respuestas de la Encuesta de Satisfacción</div>';
                echo '<div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <p class="pull-right"><button class="btn btn-primary" type="button" onClick="document.location.href=\'Modulos.php\'">Regresar</button>
                </p>
                </div>
            </div>'

       ?>
<?php include ("includes/cur_footer.php");?>