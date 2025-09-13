<?php
//require_once('./html2pdf_v4.03/html2pdf.class.php');
require ('includes/conexion.php');
$db = new Conexion();
$con = $db->conectar();
session_start();
$idAl=$_SESSION['idAlumno'];
$nombre=$_SESSION['nombre'];


$exam= Conexion::conectar()->prepare("SELECT Calificacion FROM calificacionfinal WHERE idAlumno =:idAl");
$exam->bindParam(':idAl', $idAl, PDO::PARAM_STR);
$exam->execute();
$resultadoEx = $exam->fetchAll(PDO::FETCH_ASSOC);
//var_export($resultadoEx);
//$cal=$resultadoEx[0]["CalTotal"];
//var_dump($cal);
$final=$resultadoEx;
//var_dump($finl);
echo"<center>
<table border='0' cellspacing='0' cellpadding='0'  height='792' width='612' background='./imagenes/153243.png' class='table table-bordered table-responsive'>
  <tr >
    <th>
    <p style='text-align:center margin-top:0; margin-bottom:0;'><img class='img-responsive' src='imagenes/logo1.png' alt='logo' width='300' ></p>
    </th>
  </tr>
  <tr align='center'>
    <td><p style='text-align:center; margin-top:0; margin-bottom:0;'><img class='img-responsive' src='imagenes/logo.png' width='300' alt='logo' ></p>
    <font size='2pt' color='grey'> <b>LA COMISIÓN NACIONAL PARA LA PROTECCIÓN Y DEFENSA <br> DE LOS USUARIOS DE SERVICIOS FINANCIEROS OTORGA EL PRESENTE</b></font>
    <br><br>
    <font size='30pt' color='#0A497B' face='arial'><b>DIPLOMA</b></font>
    <br><br>
    <font size='3pt' color='grey'>A</font>
    <br><br>
    <font size='5pt' color='#852e2e' face='arial'>$nombre</font>
    <br><br><br>
    <font size='2pt' color='#af5700' face='arial' >POR HABER ACREDITADO CON UN PROMEDIO DE <b>".round($final)." </b>LA GENERACIÓN 42 <br>DEL DIPLOMADO EN EDUCACIÓN FINANCIERA EN LÍNEA, CON UNA DURACIÓN DE 150 HORAS<br>
    OCTUBRE - DICIEMBRE 2022.</font>
<br><br><br><br><br>
    _________________________<br>
    <font size='3pt' color='#515151' ><b>OSCAR ROSADO JIMÉNEZ</b> <br></font>
    <font size='2pt' color='grey' >PRESIDENTE DE LA CONDUSEF</font><br><br><br><br><br><br>
    <font size='3pt' color='#af5700' >CIUDAD DE MÉXICO, DICIEMBRE 2022</font>
  
    </td>
  </tr>

</table>
</center>
";

//var_export($diploma);
?>