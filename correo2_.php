<?php
ini_set("display_errors", "0");


require_once ("includes/conexion.php");
$db = new Conexion();
$con = $db->conectar();
session_start();
$idAl=$_SESSION['idAlumno'];
$verifica = Conexion::conectar()->prepare("SELECT Calificacion FROM `calificacionfinal` WHERE idAlumno=:idAl");
$verifica->bindParam(':idAl', $idAl, PDO::PARAM_STR);
$verifica->execute();
$resultado = $verifica->fetchAll(PDO::FETCH_ASSOC);
$final=$resultado[0]["Calificacion"];
//var_dump($resultado);
echo'';

?>
<a href="Moduloscopia.php?final=<?php echo $final ?>">Ver la otra Pagina</a>
