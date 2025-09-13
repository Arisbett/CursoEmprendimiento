<?php
ini_set("display_errors", "0");
/*error_reporting(E_ALL);
ini_set("display_errors", "1");*/
set_time_limit(0);
ini_set('memory_limit', '1024M');
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
/**/header("Content-Disposition: attachment; filename=\"Avances_".date("YmdHis").".xls\"");
header("Content-Type: application/vnd.ms-excel");

include("includes/funciones.php");
include("includes/seguridad.php");

$id_coordinador = $_SESSION["id_coordinador"];
$id_grupo = $_SESSION["id_grupo"];
$id_super_admin = $_SESSION["id_super_admin"];
$generacion = $_SESSION["id_generacion"];

//temas m1
$temasm1 =  select("a.id_tema,a.tema,b.id_subtema,b.subtema", "temas a,subtemas b", "a.id_tema=b.id_tema AND a.id_modulo=1", " a.id_tema,b.id_subtema", ""); 
for($t=0;$t<count($temasm1);$t++){ 
    $indicem1[$temasm1[$t]["id_subtema"]] = '<b>'.$temasm1[$t]["tema"].'</b>-'.$temasm1[$t]["subtema"];
}

$avances1 = select("b.idAlumno,b.id_subtema,b.fecha_registro ", "alumno a,grupo c,reviso_contenido b ", ($id_coordinador==$id_super_admin?"a.idGrupo=c.idGrupo and ":"  a.idGrupo=$id_grupo and ")."  a.autorizado=1 AND a.idAlumno=b.idAlumno AND b.idGeneracion=$generacion", "b.idAlumno,b.fecha_registro ", ""); 
for($t=0;$t<count($avances1);$t++){ 
    $avance_alumno[$avances1[$t]["idAlumno"]] .= ($indicem1[$avances1[$t]["id_subtema"]]?$indicem1[$avances1[$t]["id_subtema"]].'<br>':"");
}

$actividad1 = select("b.idAlumno,b.Calificacion", "alumno a,grupo c,actividad_1 b ", ($id_coordinador==$id_super_admin?"":"  a.idGrupo=$id_grupo and ")."  a.autorizado=1 AND a.idAlumno=b.idAlumno AND b.idGeneracion=$generacion", "", ""); 
for($t=0;$t<count($actividad1);$t++){ 
    $cal1[$actividad1[$t]["idAlumno"]] = $actividad1[$t]["Calificacion"];
}

$actividad2 = select("b.idAlumno,b.Calificacion", "alumno a,grupo c,actividad_2 b ", ($id_coordinador==$id_super_admin?"":"  a.idGrupo=$id_grupo and ")."  a.autorizado=1 AND a.idAlumno=b.idAlumno AND b.idGeneracion=$generacion", "", ""); 
for($t=0;$t<count($actividad2);$t++){ 
    $cal2[$actividad2[$t]["idAlumno"]] = $actividad2[$t]["Calificacion"];
}

$actividad3 = select("b.idAlumno,b.Calificacion", "alumno a,grupo c,actividad_3 b ", ($id_coordinador==$id_super_admin?"":"  a.idGrupo=$id_grupo and ")."  a.autorizado=1 AND a.idAlumno=b.idAlumno AND b.idGeneracion=$generacion", "", ""); 
for($t=0;$t<count($actividad3);$t++){ 
    $cal3[$actividad3[$t]["idAlumno"]] = $actividad3[$t]["Calificacion"];
}

$actividad4 = select("b.idAlumno,b.calificacion", "alumno a,grupo c,actividad_4 b ", ($id_coordinador==$id_super_admin?"":"  a.idGrupo=$id_grupo and ")."  a.autorizado=1 AND a.idAlumno=b.idAlumno AND b.idGeneracion=$generacion", "", ""); 
for($t=0;$t<count($actividad4);$t++){ 
    $cal4[$actividad4[$t]["idAlumno"]] = $actividad4[$t]["calificacion"];
}

$examen1 = select("b.idAlumno,b.Calificacion", "alumno a,grupo c,examen_m1 b ", ($id_coordinador==$id_super_admin?"":"  a.idGrupo=$id_grupo and ")."  a.autorizado=1 AND a.idAlumno=b.idAlumno AND b.idGeneracion=$generacion", "", ""); 
for($t=0;$t<count($examen1);$t++){ 
    $cal_exa1[$examen1[$t]["idAlumno"]] = $examen1[$t]["Calificacion"];
}

//echo "c.nombreUniv_Inst,a.idAlumno,a.nombre,a.amaterno,a.apaterno from alumno a,states b,grupo c where ".($id_coordinador==$id_super_admin?"":"  a.idGrupo=$id_grupo and ")." c.idGrupo=a.idGrupo and a.autorizado=1";
$lista = select("c.nombreUniv_Inst,a.idAlumno,upper(a.nombre) as nombre,upper(a.amaterno) as amaterno, upper(a.apaterno) as apaterno", "alumno a,grupo c ", ($id_coordinador==$id_super_admin?"":"  a.idGrupo=$id_grupo and ")." c.idGrupo=a.idGrupo and a.autorizado=1", "", ""); 
//var_export($lista);

if(count($lista)>0){
?>


    <table border="1">
    <tr>
    <th>ID</th>  
    <th>GRUPO</th>
    <th>NOMBRE</th>
    <th>CONTENIDO</th>
    <th>CALIFICACI&Oacute;N ACTIVIDAD 1</th>
    <th>CALIFICACI&Oacute;N ACTIVIDAD 2</th>
    <th>CALIFICACI&Oacute;N ACTIVIDAD 3</th>
    <th>CALIFICACI&Oacute;N ACTIVIDAD 4</th>
    <th>CALIFICACI&Oacute;N EXAMEN 1</th>
    <th>TOTAL M&Oacute;DULO 1</th>
    <th>FINAL M&Oacute;DULO 1</th>
    </tr>
    <?php for($i=0;$i<count($lista);$i++){ 
        $id_alumno_lista = $lista[$i]["idAlumno"];
        $C1 = $cal1[$id_alumno_lista];
        $C2 = $cal2[$id_alumno_lista];
        $C3 = $cal3[$id_alumno_lista];
        $C4 = $cal4[$id_alumno_lista];
        $E1 = 60*$cal_exa1[$id_alumno_lista]/15;
    ?>
    <tr>
    <td><?php echo $id_alumno_lista; ?></td>
    <td><?php echo utf8_decode($lista[$i]["nombreUniv_Inst"]); ?></td>
    <td><?php echo utf8_decode($lista[$i]["nombre"].' '.$lista[$i]["apaterno"].' '.$lista[$i]["amaterno"]); ?></td>
    <td><?php echo utf8_decode($avance_alumno[$id_alumno_lista]); ?></td>
    <td align="center"><?php echo $C1;?></td>
    <td align="center"><?php echo $C2;?></td>
    <td align="center"><?php echo $C3;?></td>
    <td align="center"><?php echo $C4;?></td>
    <td align="center"><?php echo $E1;?></td>
    <td align="center"><?php echo ($C1+$C2+$C3+$C4+$E1);?></td>
    <td align="center"><?php echo round(($C1+$C2+$C3+$C4+$E1)*10/100);?></td>
    </tr>
    <?php } ?>
    </table>

    <?php } ?>
    
