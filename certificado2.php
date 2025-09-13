<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('dompdf/autoload.inc.php');

require ('includes/conexion.php');
require ('generar_codigo_qr.php');
$db = new Conexion();
$con = $db->conectar();
session_start();

$id_alumno=$_SESSION["idAlumno"];
$nombre;
$id_generacion = 1;
var_export($id_alumno);
echo $id_alumno;
$exam= Conexion::conectar()->query("SELECT CalificacionFinal,cadena_original FROM boleta WHERE idAlumno =$id_alumno");
$exam->execute();
$resultado = $exam->fetchAll(PDO::FETCH_ASSOC);
$final=$resultado[0]["Calificacion"];
$codigo = $resultado[0]["cadena_original"];

if ($final>=7) {
/*$nombreImagen = "imagenes/logo1.png";
$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));

$nombreImagenlog = "imagenes/logo.png";
$imagenBase64log = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagenlog));

$nombreImagenFirma = "imagenes/FIRMA-completa.png";
$imagenBase64Firma = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagenFirma));

$nombreImagenFondo = "imagenes/fondo1.png";
$imagenBase64f = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagenFondo));*/

$nombreImagenQR = genera_imagen_qr($idAl,$id_generacion);
$imagenBase64QR = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagenQR));

$httml ="
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

<style>
body {
  font-family: Montserrat;
  background-image: url('".$imagenBase64f."');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  width:100%;
}

@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: normal;
  src: url(http://" . $_SERVER['SERVER_NAME']."/diplomado/dompdf/vendor/dompdf/dompdf/lib/fonts/Montserrat-Regular.ttf) format('truetype');
}
@font-face {
  font-family: 'Montserrat-bold;
  font-style: bold;
  font-weight: 700;
  src: url(http://" . $_SERVER['SERVER_NAME']."/diplomado/dompdf/vendor/dompdf/dompdf/lib/fonts/Montserrat-Bold.ttf) format('truetype');
}

table td, table th {
  font-family: 'Montserrat';
}

</style>
</head> CIUDAD
<body style='font-family: \'Montserrat\', monospace;'> CIUDAD
<font size='14pt' color='grey'  face='Montserrat'>DIPLOMADO</font>
<center>
<table border='0' cellspacing='0' cellpadding='0' class='table table-bordered table-responsive' >
  <tr >
    <th> 
    <p style='text-align:center margin-top:0; margin-bottom:0;'><img class='img-responsive' src='".$imagenBase64."' alt='logo' width='350' ></p>
    </th>
  </tr>
  <tr align='center'>
    <td style='font-family: \'Montserrat\';'><p style='text-align:center; margin-top:0; margin-bottom:0;'><img class='img-responsive' src='".$imagenBase64log."' width='450' alt='logo' ></p><br>
    <font size='14pt' color='grey' face='Montserrat-bold'> <b>LA COMISIÓN NACIONAL PARA LA PROTECCIÓN Y DEFENSA <br> DE LOS USUARIOS DE SERVICIOS FINANCIEROS OTORGA EL PRESENTE</b></font>
    <br><br>
    <font size='30pt' color='#0A497B' face='Montserrat-bold'><b>DIPLOMA</b></font>
    <br>
    <font size='14pt' color='grey'  face='Montserrat'>A</font>
    <br>
    <font size='28pt' color='#852e2e'  face='Montserrat' ><b>$nombre<b></font>
    <br><p style='text-align:center margin-top:0; margin-bottom:0;'><img class='img-responsive' src='".$imagenBase64QR."' alt='codigo_qr'><br>".$codigo."</p>
    <br>
    <font size='12pt' color='#e4bd93'  face='Montserrat-bold'><b>POR HABER ACREDITADO CON UN PROMEDIO DE <b>".round($final)." </b>LA GENERACIÓN 42 DEL <br> DIPLOMADO  EN EDUCACIÓN FINANCIERA EN LÍNEA, CON UNA DURACIÓN DE 150 HORAS<br>
    OCTUBRE - DICIEMBRE 2022</b></font>
<br>
<center><img src='".$imagenBase64Firma."' alt='logo' width='270'/>
 
<br><br>
    
    <font size='14pt' color='#e4bd93'  face='Montserrat' style='font-family: \'Montserrat\';'>CIUDAD DE MÉXICO, DICIEMBRE 2022</font>
   </center>
    </td>
  </tr>

</table>
</body>";
}



use Dompdf\Dompdf;
use Dompdf\Options;

if ($final>=7) {
  

    //$dompdf = new Dompdf();

    $options = new Options();
    $options->setFontDir(__DIR__.'vendor/dompdf/dompdf/lib/fonts');
    $options->set('defaultFont', 'Montserrat-Regular.ttf');
    //$options->set('fontDir', 'vendor/dompdf/dompdf/lib/fonts');
    $dompdf = new Dompdf($options);

    // Load HTML content 
    // $dompdf->loadHtml('<h1>Welcome to niceshipest.com</h1>'); 
     
    // Load html file 
    //$html = file_get_contents("diploma.php");
    
    $dompdf->loadHtml($httml); 
     
    $dompdf->setPaper('A4'); 
    $dompdf->render(); 
    $dompdf->stream("constancia", array("Attachment" => 0));
}else {
  $dompdf = new Dompdf();

    // Load HTML content 
    // $dompdf->loadHtml('<h1>Welcome to niceshipest.com</h1>'); 
     
    // Load html file 
    //$html = file_get_contents("diploma.php");
    
    $dompdf->loadHtml(""); 
     
    $dompdf->setPaper('A4'); 
    $dompdf->render(); 
    $dompdf->stream("niceshipest", array("Attachment" => 0));
}
?>