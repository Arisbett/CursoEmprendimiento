<?php
ini_set("display_errors", "0");
require_once ('../dompdf/autoload.inc.php');

require ('includes/conexion.php');
$db = new Conexion();
$con = $db->conectar();
session_start();
$idAl=$_SESSION['idAlumno'];
$nombre=$_SESSION['nombre'];
 
$a1m1= Conexion::conectar()->query("SELECT Calificacion FROM `actividad_1` WHERE idAlumno=$idAl");
$a1m1->execute();
$r1m1 = $a1m1->fetchAll(PDO::FETCH_ASSOC);
$ar1m1=$r1m1[0]['Calificacion'];


$a2m1= Conexion::conectar()->query("SELECT Calificacion FROM `actividad_2` WHERE idAlumno=$idAl");
$a2m1->execute();
$r2m1 = $a2m1->fetchAll(PDO::FETCH_ASSOC);
$ar2m1=$r2m1[0]['Calificacion'];


$a3m1= Conexion::conectar()->query("SELECT Calificacion FROM `actividad_3` WHERE idAlumno=$idAl");
$a3m1->execute();
$r3m1 = $a3m1->fetchAll(PDO::FETCH_ASSOC);
$ar3m1=$r3m1[0]['Calificacion'];

$a4m1= Conexion::conectar()->query("SELECT Calificacion FROM `actividad_4` WHERE idAlumno=$idAl");
$a4m1->execute();
$r4m1 = $a4m1->fetchAll(PDO::FETCH_ASSOC);
$ar4m1=$r4m1[0]['Calificacion'];

$aem1= Conexion::conectar()->query("SELECT Calificacion FROM `examen_m1` WHERE idAlumno=$idAl");
$aem1->execute();
$rem1 = $aem1->fetchAll(PDO::FETCH_ASSOC);
$arem1=$rem1[0]['Calificacion'];
if ($arem1 == 0) {
    $calExm1 = 60*0/15;
}else{
$calExm1 = 60*$arem1/15;
}

if ($ar1m1==0 || $ar2m1==0 || $ar3m1 ==0 || $ar4m1==0 || $calExm1==0) {
    $fm1= $ar1m1 + $ar2m1 +$ar3m1 + $ar4m1 + $calExm1;
}else{
$fm1= $ar1m1 + $ar2m1 +$ar3m1 + $ar4m1 + $calExm1;}


$calFinalm1=round($fm1*10/100);

$a1m2= Conexion::conectar()->query("SELECT Calificacion FROM `actividad1_m2` WHERE idAlumno=$idAl");
$a1m2->execute();
$r1m2 = $a1m2->fetchAll(PDO::FETCH_ASSOC);
$ar1m2=$r1m2[0]['Calificacion'];

$a2m2= Conexion::conectar()->query("SELECT Calificacion FROM `actividad2_m2` WHERE idAlumno=$idAl");
$a2m2->execute();
$r2m2 = $a2m2->fetchAll(PDO::FETCH_ASSOC);
$ar2m2=$r2m2[0]['Calificacion'];

$a3m2= Conexion::conectar()->query("SELECT Calificacion FROM `actividad3_m2` WHERE idAlumno=$idAl");
$a3m2->execute();
$r3m2 = $a3m2->fetchAll(PDO::FETCH_ASSOC);
$ar3m2=$r3m2[0]['Calificacion'];

$a4m2= Conexion::conectar()->query("SELECT Calificacion FROM `actividad4_m2` WHERE idAlumno=$idAl");
$a4m2->execute();
$r4m2 = $a4m2->fetchAll(PDO::FETCH_ASSOC);
$ar4m2=$r4m2[0]['Calificacion'];

$aem2= Conexion::conectar()->query("SELECT Calificacion FROM `examen_m2` WHERE idAlumno=$idAl");
$aem2->execute();
$rem2 = $aem2->fetchAll(PDO::FETCH_ASSOC);
$arem2=$rem2[0]['Calificacion'];

if ($arem2 == 0) {
    $calExm2 = 60*0/15;
}else{
$calExm2 = 60*$arem2/15;
}

if ($ar1m2==0 || $ar2m2==0 || $ar3m2 ==0 || $ar4m2==0 || $calExm2==0) {
    $fm2= $ar1m2 + $ar2m2 +$ar3m2 + $ar4m2 + $calExm2;
}else{
$fm2= $ar1m2 + $ar2m2 +$ar3m2 + $ar4m2 + $calExm2;}

/*$calFinalm1=round($fm1*10/100);
$calExm2 = 60*$arem2/15;
//var_export($calExm2);
$fm2= $ar1m2 + $ar2m2 +$ar3m2 + $ar4m2 + $calExm2;*/
$calFinalm2=round($fm2*10/100);

$a1m3= Conexion::conectar()->query("SELECT Calificacion FROM `actividad1_m3` WHERE idAlumno=$idAl");
$a1m3->execute();
$r1m3 = $a1m3->fetchAll(PDO::FETCH_ASSOC);
$ar1m3=$r1m3[0]['Calificacion'];

$a2m3= Conexion::conectar()->query("SELECT Calificacion FROM `actividad2_m3` WHERE idAlumno=$idAl");
$a2m3->execute();
$r2m3 = $a2m3->fetchAll(PDO::FETCH_ASSOC);
$ar2m3=$r2m3[0]['Calificacion'];

$a3m3= Conexion::conectar()->query("SELECT Calificacion FROM `actividad3_m3` WHERE idAlumno=$idAl");
$a3m3->execute();
$r3m3 = $a3m3->fetchAll(PDO::FETCH_ASSOC);
$ar3m3=$r3m3[0]['Calificacion'];

$a4m3= Conexion::conectar()->query("SELECT Calificacion FROM `actividad4_m3` WHERE idAlumno=$idAl");
$a4m3->execute();
$r4m3 = $a4m3->fetchAll(PDO::FETCH_ASSOC);
$ar4m3=$r4m3[0]['Calificacion'];

$aem3= Conexion::conectar()->query("SELECT Calificacion FROM `examen_m3` WHERE idAlumno=$idAl");
$aem3->execute();
$rem3 = $aem3->fetchAll(PDO::FETCH_ASSOC);
$arem3=$rem3[0]['Calificacion'];
/*$calExm3 = 60*$arem3/15;
$fm3= $ar1m3 + $ar2m3 +$ar3m3 + $ar4m3 + $calem3;*/


if ($arem3 == 0) {
    $calExm3 = 60*0/15;
}else{
$calExm3 = 60*$arem3/15;
}

if ($ar1m3==0 || $ar2m3==0 || $ar3m3 ==0 || $ar4m3==0 || $calExm3==0) {
    $fm3= $ar1m3 + $ar2m3 +$ar3m3 + $ar4m3 + $calExm3;
}else{
$fm3= $ar1m3 + $ar2m3 +$ar3m3 + $ar4m3 + $calExm3;}


$calFinalm3=round($fm3*10/100);
$pg=round(($calFinalm1+$calFinalm2+$calFinalm3)/3);

if ($ar1m1==10) {
    $mensaje= "<td style='background-color: green;' align='center' valign='middle'>".$ar1m1." %</td>";
}else{
    $mensaje1= "<td style='background-color: red;' align='center' valign='middle'>0 %</td>";
}

$dato="
<p>Calificaciones Generación 42 del Diplomado en Educación Financiera</p>
<p>$nombre</p>
<center>
<table border='1' class='table' style='max-width:100%; border-collapse: collapse; border-spacing: 50px;'>

                            <tbody>    
                                <tr align='center'>
                                    <td align='center'><strong>M&oacute;dulo</strong></td>
                                    <td align='center'><strong>Actividad 1<br>10 %</strong></td>
                                    <td align='center'><strong>Actividad 2<br>10 %</strong></td>
                                    <td align='center'><strong>Actividad 3<br>10 %</strong></td>
                                    <td align='center'><strong>Actividad 4<br>10 %</strong></td>
                                    <td align='center'><strong>Examen<br>60 %</strong></td>
                                    <td align='center'><strong>Total</strong></td>
                                    <td align='center'><strong>Calificacion Final</strong></td>
                                </tr>
                                <tr align='left'>
                                    <td align='center' valign='middle'></td>
                                    <td align='center' valign='middle'></td>
                                    <td align='center' valign='middle'></td>
                                    <td align='center' valign='middle'></td>
                                    <td align='center' valign='middle'></td>
                                    <td align='center' valign='middle'></td>
                                    <td align='center' valign='middle'></td>
                                    <td align='center' valign='middle'></td>
                
                                </tr>
                                <tr align='left'>
                                    <td align='center' valign='middle'><strong>I</strong></td>
                                    <td ><strong>".($mensaje?$mensaje1:'%')."</strong></td>
                                    <td align='center' valign='middle'>".$ar2m1." %</td>
                                    <td align='center' valign='middle'>".$ar3m1." %</td>
                                    <td align='center' valign='middle'>".$ar4m1." %</td>
                                    <td align='center' valign='middle'>".$calExm1." %</td>
                                    <td align='center' valign='middle'>".$fm1." %</td>
                                    <td align='center' valign='middle'>".$calFinalm1." </td>
                            </tr>

                            <tr align='left'>
                                    <td align='center' valign='middle'><strong>II</strong></td>
                                    <td align='center' valign='middle'>".$ar1m2." %</td>
                                    <td align='center' valign='middle'>".$ar2m2." %</td>
                                    <td align='center' valign='middle'>".$ar3m2." %</td>
                                    <td align='center' valign='middle'>".$ar4m2." %</td>
                                    <td align='center' valign='middle'>".$calExm2." %</td>
                                    <td align='center' valign='middle'>".$fm2." %</td>
                                    <td align='center' valign='middle'>".$calFinalm2." </td>
                            </tr>

                            <tr align='left'>
                                    <td align='center' valign='middle'><strong>III</strong></td>
                                    <td align='center' valign='middle'>".$ar1m3." %</td>
                                    <td align='center' valign='middle'>".$ar2m3." %</td>
                                    <td align='center' valign='middle'>".$ar3m3." %</td>
                                    <td align='center' valign='middle'>".$ar4m3." %</td>
                                    <td align='center' valign='middle'>".$calExm3." %</td>
                                    <td align='center' valign='middle'>".$fm3." %</td>
                                    <td align='center' valign='middle'>".$calFinalm3." </td>
                            </tr>
                            <tr style='text-align: right;'>
                            <td colspan='8'><strong> Promedio General</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $pg &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                            </tr>
                        </tbody>
                        </table>
                        
                   
</center> ";
   use Dompdf\Dompdf;
   $dompdf = new Dompdf();
    $dompdf->loadHtml($dato); 
    $dompdf->setPaper('A4'); 
    $dompdf->render(); 
    $dompdf->stream('niceshipest', array('Attachment' => 0));
?>