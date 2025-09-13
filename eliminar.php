<?php
require ("includes/conexion.php");

$db = new Conexion();
$con = $db->conectar();

$id = $_GET['id'];
$query= $con->prepare("DELETE FROM grupo WHERE idGrupo=?");
if ($query->execute([$id])){
    echo"Se eliminará el grupo";
}else {
    echo "Error al eliminar el grupo";
}


?>