<?php
require '../includes/conexion.php';
$db = new Conexion();
$con = $db->conectar();
$estadoG = $_POST['id_estado'];
$grupo = $con->query(" SELECT * FROM grupo a, relacion_grupo_estado b
WHERE a.idGrupo=b.idGrupo AND (b.estado='$estadoG' OR b.estado=33)");
$grupo->execute();
$grupos = $grupo->fetchAll(PDO::FETCH_ASSOC);

$html = "<option>Seleccionar ... </option>";
foreach ($grupos AS $rowM) {
    echo "<option value='$rowM[idGrupo]'>".$rowM['nombreUniv_Inst']."</option>";
}
?>