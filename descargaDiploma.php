<?php
ini_set("display_errors", "0");
$desc=$_POST["c"];
require_once ("includes/conexion.php");
$verifica = Conexion::conectar()->prepare("SELECT COUNT(idAlumno) AS Total FROM `alumno` WHERE correo='ulises@hotmail.com'");
$verifica->bindParam(':desc', $desc, PDO::PARAM_STR);
$verifica->execute();

$row = $verifica->fetch();
$total=$row['Total'];
$total ='<input type="text" name="idv" value="'.$total.'">';
echo $total;

?>
