<?php
include ("includes/cur_header.php");
require ("includes/conexion.php");
ini_set("display_errors", "0");
include ("includes/funcionEx3.php");

$r1=strip_tags($_POST['r1']);
$r2=strip_tags($_POST['r2']);
$r3=strip_tags($_POST['r3']);
$r4=strip_tags($_POST['r4']);
$r5=strip_tags($_POST['r5']);
$r6=strip_tags($_POST['r6']);
$r7=strip_tags($_POST['r7']);
$r8=strip_tags($_POST['r8']);
$r9=strip_tags($_POST['r9']);
$r10=strip_tags($_POST['r10']);
$r11=strip_tags($_POST['r11']);
$r12=strip_tags($_POST['r12']);
$idAl=strip_tags($_POST['idAl']);
$idGen=strip_tags($_POST['idGen']);

if(empty($r1)){
    echo '<script>alert("Proporciona una respuesta")';
    #header ('location:registro.php');
    echo '</script>';
   }
   if(empty($r2)){
    echo '<script>alert("Proporciona una respuesta")';
    #header ('location:registro.php');
    echo '</script>';
   }
   if(empty($r3)){
    echo '<script>alert("Proporciona una respuesta")';
    #header ('location:registro.php');
    echo '</script>';
   }
   if(empty($r4)){
    echo '<script>alert("Proporciona una respuesta")';
    #header ('location:registro.php');
    echo '</script>';
   }
   if(empty($r5)){
    echo '<script>alert("Proporciona una respuesta")';
    #header ('location:registro.php');
    echo '</script>';
   }
   if(empty($r6)){
    echo '<script>alert("Proporciona una respuesta")';
    #header ('location:registro.php');
    echo '</script>';
   }
   if(empty($r7)){
    echo '<script>alert("Proporciona una respuesta")';
    #header ('location:registro.php');
    echo '</script>';
   }
   if(empty($r8)){
    echo '<script>alert("Proporciona una respuesta")';
    #header ('location:registro.php');
    echo '</script>';
   }if(empty($r9)){
    echo '<script>alert("Proporciona una respuesta")';
    #header ('location:registro.php');
    echo '</script>';
   }
   if(empty($r10)){
    echo '<script>alert("Proporciona una respuesta")';
    #header ('location:registro.php');
    echo '</script>';
   }
   if(empty($r11)){
    echo '<script>alert("Proporciona una respuesta")';
    #header ('location:registro.php');
    echo '</script>';
   }
   if(empty($r12)){
    echo '<script>alert("Proporciona una respuesta")';
    #header ('location:registro.php');
    echo '</script>';
   }

   $query = Conexion::conectar()->prepare("SELECT idAlumno FROM examendiag WHERE idAlumno =:idAl");
              $query->bindParam(':idAl', $idAl, PDO::PARAM_STR);
              $query->execute();
              $total = $query->rowCount();

              if ($total>=1) {
              
   
        $query = Conexion::conectar()->prepare("INSERT INTO examendiag (idAlumno ,Respuesta1, Respuesta2, Respuesta3, Respuesta4, Respuesta5, Respuesta6, Respuesta7, Respuesta8, Respuesta9, Respuesta10, Respuesta11, Respuesta12, id_generacion)
        VALUES (:idAl, :r1, :r2, :r3, :r4, :r5, :r6, :r7, :r8, :r9, :r10, :r11, :r12, :idGen)" );

        $query->bindParam(':idAl', $idAl, PDO::PARAM_STR);
        $query->bindParam(':r1', $r1, PDO::PARAM_STR);
        $query->bindParam(':r2', $r2, PDO::PARAM_STR);
        $query->bindParam(':r3',$r3, PDO::PARAM_STR);
        $query->bindParam(':r4', $r4, PDO::PARAM_STR);
        $query->bindParam(':r5', $r5, PDO::PARAM_STR);
        $query->bindParam(':r6', $r6, PDO::PARAM_STR);
        $query->bindParam(':r7', $r7, PDO::PARAM_STR);
        $query->bindParam(':r8', $r8, PDO::PARAM_STR);
        $query->bindParam(':r9', $r9, PDO::PARAM_STR);
        $query->bindParam(':r10', $r10, PDO::PARAM_STR);
        $query->bindParam(':r11', $r11, PDO::PARAM_STR);
        $query->bindParam(':r12', $r12, PDO::PARAM_STR);
        $query->bindParam(':idGen', $idGen, PDO::PARAM_STR);
            
             $query->execute();
              //header ('location:Modulos.php');
              $_SESSION["ExamDiag".$idAl]= 1;
              
              }
              $verifica = Conexion::conectar()->prepare("SELECT Calificacion FROM `calificacionfinal` WHERE idAlumno=:idAl");
$verifica->bindParam(':idAl', $idAl, PDO::PARAM_STR);
$verifica->execute();
$resultado = $verifica->fetchAll(PDO::FETCH_ASSOC);
$final=$resultado[0]["Calificacion"];
//var_dump($resultado);
echo'';




              echo '<div>&nbsp;</div><div>&nbsp;</div><div class="alert alert-info"><strong>'.($mensaje?$mensaje:'Se han guardado las respuestas del Estudio Diagn&oacute;stico').' </strong></div>';
              echo '<div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              <a href="Modulos.php?final='.$final.'">
              <p class="pull-right"><button class="btn btn-primary" type="button">Regresar</button></a>
              </p>
              </div>
          </div>';   


          if ($calff>1) {
            $querym = Conexion::conectar()->prepare("SELECT idAlumno FROM calificacionfinal WHERE idAlumno =:idAl");
            $querym->bindParam(':idAl', $idAl, PDO::PARAM_STR);
            $querym->execute();
            $total = $querym->rowCount();
        
            if ($total>=1) {
                $actualiza=Conexion::conectar()->prepare("UPDATE calificacionfinal SET Calificacion = :totalF WHERE calificacionfinal.idAlumno = :idAl");
                $actualiza->bindParam(':idAl', $idAl, PDO::PARAM_STR);
                $actualiza->bindParam(':totalF', $totalF, PDO::PARAM_STR);
                $actualiza->execute();
            }else{
            $Cal = Conexion::conectar()->prepare("INSERT INTO calificacionfinal( idAlumno, Calificacion) VALUES (:idAl, :totalF)");
            $Cal->bindParam(':idAl', $idAl, PDO::PARAM_STR);
            $Cal->bindParam(':totalF', $totalF, PDO::PARAM_STR);
            $Cal->execute();
            }
        }
            
           

?>
<?php include ("includes/cur_footer.php");?>