<?php
ini_set("display_errors", "0");
$correo=$_POST["c"];
require_once ("includes/conexion.php");
$verifica = Conexion::conectar()->prepare("SELECT COUNT(idAlumno) AS Total FROM `alumno` WHERE correo=:correo");
$verifica->bindParam(':correo', $correo, PDO::PARAM_STR);
$verifica->execute();

$row = $verifica->fetch(); 
      $total=$row['Total'];
$httml ='<input type="hidden" name="respuesta_correo" id="respuesta_correo" value="'.$total.'">';
echo $httml;

?>