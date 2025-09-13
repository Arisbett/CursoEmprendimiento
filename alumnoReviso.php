<?php
ini_set("display_errors", "0");

require ("includes/conexion.php");
$db = new Conexion();
$con = $db->conectar();
session_start();

$idAl=$_SESSION['idAlumno'];
$idGen=$_SESSION['id_generacion'];
$id_subtema=$_POST['idSub'];

$cextranio = 0;
$permitidos = "0123456789";
for ($i=0; $i<strlen($idAl); $i++){//
          if (strpos($permitidos, substr($idAl,$i,1))===false){ //echo substr($parametros,$i,1);
            $cextranio = 1;
            break;
          }
}

for ($i=0; $i<strlen($id_subtema); $i++){//
    if (strpos($permitidos, substr($id_subtema,$i,1))===false){ //echo substr($parametros,$i,1);
      $cextranio = 1;
      break;
    }
}

if($idAl>0 && $cextranio==0){
$comando = $con->query("SELECT idReviso,id_subtema FROM reviso_contenido WHERE idAlumno=$idAl AND idGeneracion=$idGen AND id_subtema=$id_subtema");
$comando->execute();
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC); 

if(!$resultado){
$query=Conexion::conectar()->prepare("INSERT INTO reviso_contenido(idAlumno, idGeneracion, id_subtema, fecha_registro)
 VALUES(:idAlumno, :idGen, :idSub, current_timestamp)");
$query->bindParam(':idAlumno', $idAl, PDO::PARAM_STR);
$query->bindParam(':idGen', $idGen, PDO::PARAM_STR);
$query->bindParam(':idSub', $id_subtema, PDO::PARAM_STR);
$query->execute();
//var_dump($query);
}
echo '';
}


?>