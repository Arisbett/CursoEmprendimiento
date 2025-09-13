<?php
require ("includes/conexion.php");

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
$r11=strip_tags(htmlentities($_POST['r11']));
$r12=strip_tags(htmlentities($_POST['r12']));
$idAl=strip_tags($_POST['idAl']);

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
      
      
        $query = Conexion::conectar()->prepare("INSERT INTO examendiag (idAlumno,Respuesta1, Respuesta2, Respuesta3, Respuesta4, Respuesta5, Respuesta6, Respuesta7, Respuesta8, Respuesta9, Respuesta10, Respuesta11, Respuesta12)
        VALUES ( :idAl,:r1, :r2, :r3, :r4, :r5, :r6, :r7, :r8, :r9, :r10, :r11, :r12)" );

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
            
             $query->execute();
              header ('location:Modulos.php');
       $total = $query->rowCount();
?>