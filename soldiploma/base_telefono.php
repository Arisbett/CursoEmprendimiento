<?php
ini_set("display_errors", "0");
/*error_reporting(E_ALL);
ini_set("display_errors", "1");*/
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Disposition: attachment; filename=\"Base_Telefonos_CursoEmprendedores".date("YmdHis").".xls\"");
header("Content-Type: application/vnd.ms-excel");

include("includes/funciones.php");
include("includes/seguridad.php");

$fecha1_registro = $_SESSION["fecha1_registro"];
$fecha2_registro = $_SESSION["fecha2_registro"];
$id_coordinador = $_SESSION["id_coordinador"];
$id_grupo = $_SESSION["id_grupo"];
$id_super_admin = 18;

//echo "b.estado as nombreestado,upper(c.nombreUniv_Inst) as nombreUniv_Inst,DATE_FORMAT(a.falta,'%d-%m-%Y') as fregistro,upper(nombre) as nombre1, upper(apaterno) as apaterno1,upper(amaterno) as amaterno1,a.* from alumno a,states b,grupo c where". ($id_coordinador==$id_super_admin?" (a.idGrupo=1 or a.idGrupo=2 or a.idGrupo=11 or a.idGrupo=21) and ":"  a.idGrupo=$id_grupo and ")." a.estado=b.id_estado and a.falta>='$fecha1_registro' and a.falta<='$fecha2_registro' AND c.idGrupo=a.idGrupo";
$lista = select("a.nombre, a.apaterno, a.amaterno,a.registros, a.telefono, a.informacion, DATE_FORMAT(a.falta,'%d-%m-%Y'), b.estado, b.id_estado","alumno a, states b"," a.estado=b.id_estado  ".($id_coordinador==1?" and (upper(nombre) like '$letra%' or upper(apaterno) like '$letra%' or upper(amaterno) like '$letra%') ":""), "", "");
//select("b.estado AS nombreestado,c.nombreUniv_Inst,a.idGrupo,a.sexo,a.nivelMaximo,a.edad,a.tipoCandidato,a.autorizado,DATE_FORMAT(a.falta,'%Y-%m-%d') AS fecha,COUNT(a.idAlumno) AS total", "alumno a,states b,grupo c ", ($id_coordinador==$id_super_admin?"":"  a.idGrupo=$id_grupo and ")." c.idGrupo=a.idGrupo and  a.estado=b.id_estado and a.falta>='$fecha1_registro' and a.falta<='$fecha2_registro 23:59:59' GROUP BY b.estado,c.nombreUniv_Inst,a.sexo,a.nivelMaximo,a.edad,tipoCandidato,a.autorizado,fecha", "", ""); 
//var_export($lista);

if(count($lista)>0){
?>


    <table border="1">
    <tr>
    <th>Nombre</th>
    <th>Fecha de registro</th>
                
                <th>Desea recibir información</th>
                <th>Número telefonico</th>
               <th>Estado</th>
    </tr>
    <tbody>
        <?php  $ids = "";
            for($i=0;$i<count($lista);$i++){ 
                $ids .= $lista[$i]["idAlumno"].',';
        ?>
            <tr>
                <td><?php echo utf8_decode(trim($lista[$i]["nombre"].' '.$lista[$i]["apaterno"].' '.$lista[$i]["amaterno"])); ?></td>
                <td><?php echo ($lista[$i]["DATE_FORMAT(a.falta,'%d-%m-%Y')"]); ?></td>
                <td><?php if($lista[$i]["informacion"]==1) {echo'SI'; } elseif ($lista[$i]["informacion"]==2) {echo'NO'; }?> </td>
                <td><?php echo ($lista[$i]["telefono"]); ?></td>
                <td><?php echo utf8_decode($lista[$i]["estado"]); ?></td>
            </tr>
    <?php  } ?>
    </table>

    <?php } ?>
    
