<?php
session_start();
 require ("includes/conexion.php");

$correo = strip_tags(htmlentities($_POST['correo']));
#$usuario= strip_tags(htmlentities($_POST['user']));
$pass = strip_tags(htmlentities($_POST['password']));
$idAl = strip_tags(htmlentities($_POST['idAlumno']));
$url=strip_tags(htmlentities($_POST['url']));
$navegador=strip_tags(htmlentities($_POST['navegador']));
$ip=strip_tags(htmlentities($_POST['ip']));
$sisOp=strip_tags(htmlentities($_POST['sisOp']));
$f_registro=date('d-m-Y');
  
      $query = Conexion::conectar()->prepare("SELECT idAlumno FROM alumno WHERE correo = :correo AND pass = :pass AND autorizado=1");
      $query->bindParam(':correo', $correo, PDO::PARAM_STR);
      $query->bindParam(':pass', $pass, PDO::PARAM_STR);
      $query->execute();
      $_SESSION['correo']=$correo;

      //descomponer la consulta
        $row = $query->fetch();
        /*if ($row >0) {
          $row=$query->fetch_assoc();
          $_SESSION['id_Alumno']=$row["idAlumno"];
          header("Location:Ex_Diagnostico1.php")
        }*/
        $idAlumno=$row['idAlumno'];
       $total = $query->rowCount();
       
       if($total == 1){
        $query1 = Conexion::conectar()->prepare("INSERT INTO monitoreo (idAlumno, url_, ip, fechaRegistro, navegador) 
        VALUES (:idAlumno,:url_, :ip, :fecha, :browser)" );
       
        $query1->bindParam(':idAlumno', $idAlumno, PDO::PARAM_STR);
        $query1->bindParam(':url_', $url, PDO::PARAM_STR);
        $query1->bindParam(':ip', $ip, PDO::PARAM_STR);
        $query1->bindParam(':fecha', $f_registro, PDO::PARAM_STR);
        $query1->bindParam(':browser', $navegador, PDO::PARAM_STR);
        
         $query1->execute();
      header ("location:Ex_Diagnostico1.php");
       }
       else{
        header ("location:ejmplo.php");
       }
?>
