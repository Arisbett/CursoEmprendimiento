<?php
ini_set("display_errors", "0");
$correo=$_POST["c"];
$registros=$_POST["g"];

require_once ("includes/conexion.php");

$verifica = Conexion::conectar()->prepare("SELECT COUNT(a.idAlumno) AS Total FROM alumno a, boleta b WHERE a.correo=:correo  AND a.idAlumno=b.idAlumno ");
$verifica->bindParam(':correo', $correo, PDO::PARAM_STR);
$verifica->execute();

$row = $verifica->fetch(); 
$total=$row['Total'];

if($total>=0){
      $verifica = Conexion::conectar()->prepare("SELECT COUNT(idAlumno) AS Total FROM `alumno` WHERE correo=:correo and registros=2");
      $verifica->bindParam(':correo', $correo, PDO::PARAM_STR);
      $verifica->execute();

      $row = $verifica->fetch(); 
      $total=$row['Total'];
}

$httml ='<input type="hidden" name="respuesta_correo" id="respuesta_correo" value="'.$total.'">';
echo $httml;

?>

