<?php
require '../includes/conexion.php';
$db = new Conexion();
$con = $db->conectar();
$estado = $_POST['id_estado'];
$municipio = $con->query("SELECT id, id_estado, municipio FROM municipio WHERE id_estado = '$estado' ORDER BY municipio ASC");
$municipio->execute();
$municipios = $municipio->fetchAll(PDO::FETCH_ASSOC);

$html = "<option>Seleccionar Municipio... </option>";
foreach ($municipios AS $rowM) {
    echo "<option value='$rowM[id]'>".$rowM['municipio']."</option>";
}
#return $html;
?>