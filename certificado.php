<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('dompdf/autoload.inc.php');
require ('includes/conexion.php');
require ('generar_codigo_qr.php');
//require ('generar_codigo_qr.php');
$db = new Conexion();
$con = $db->conectar();
session_start();
$idAl=$_SESSION['idAlumno'];
$nombre=$_SESSION['nombre'];
$id_generacion = $_SESSION["id_generacion"];

$descarga= Conexion::conectar()->query("SELECT fecha_registro FROM descarga WHERE idAlumno =$idAl");
$descarga->execute();
$resultadod = $descarga->fetchAll(PDO::FETCH_ASSOC);
$fecha=$resultadod[0]["fecha_registro"];



$exam= Conexion::conectar()->query("SELECT CalificacionFinal, cadena_original FROM boleta WHERE idAlumno =$idAl");
$exam->execute();
$resultado = $exam->fetchAll(PDO::FETCH_ASSOC);
$final=$resultado[0]["CalificacionFinal"];
$codigo = $resultado[0]["cadena_original"];
//var_export($final);
if ($final>=8) {


$nombreImagenFondo = "imagenes/DiplomaCurso.jpg";
$imagenBase64f = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagenFondo));

$nombreImagenQR = genera_imagen_qr($idAl,$id_generacion);
$imagenBase64QR = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagenQR));

$httml ="
<!DOCTYPE html>
<html>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WMZMQHZ');</script>
<!-- End Google Tag Manager -->

<link href='http://fonts.googleapis.com/css?family=Montserrat:light' rel='stylesheet' type='text/css'>


<style  type='text/css'>

	@page {
		margin-left: 0;
		margin-right: 0;
    margin-bottom: 0;
		margin-top: 0;
	}

body {
  background-image: url('".$imagenBase64f."');
  font-family: 'Montserrat', sans-serif; 
  background-repeat: no-repeat;
  background-attachment: local; 
  background-position: center;
  background-size: cover;
 
  background-size: 90%;
  width:99%;
}
.nombre {

  position: absolute;
  top: 61%;
  left: 17%;
  right: 30%;
  margin: -25px 0 0 -25px; 
}
          

</style>
</head>
<body >
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src='https://www.googletagmanager.com/ns.html?id=GTM-WMZMQHZ'
height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class='container'>

<div class='container'>
<div class='nombre'>

<table border=0 width=550 cellpadding=10 cellspacing='1' class='table table-bordered table-responsive' align='center'>


 
  <tr align='center'>
  <td colspan=1>
  <font size='22pt'><b>$nombre<b></font>
  
  </td>
</tr>

<tr align='left'>
<td>
<p class='w400' style='text-align:left margin-top:0; margin-bottom:0;'><br><br><br><br><img class='img-responsive' src='".$imagenBase64QR."' alt='codigo_qr' width='100'><br>".$codigo."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ".$fecha."</p>
</td>
</tr>
</table>





</div>
</div>
</body>
</html>";
}



use Dompdf\Dompdf;
use Dompdf\Options;

if ($final>=8) {
  

    //$dompdf = new Dompdf();

    $options = new Options();
    $options->set('defaultFont', 'Montserrat');
    $options->set('fontDir', 'https://fonts.googleapis.com/css?family=Montserrat');
    $dompdf = new Dompdf($options);

    // Load HTML content 
    // $dompdf->loadHtml('<h1>Welcome to niceshipest.com</h1>'); 
     
    // Load html file 
    //$html = file_get_contents("diploma.php");
    
    $dompdf->loadHtml($httml); 
     
    $dompdf->setPaper('A4','landscape'); 
    $dompdf->render(); 
    $dompdf->stream("constancia", array("Attachment" => 0));
}else {
  $dompdf = new Dompdf();

    // Load HTML content 
    // $dompdf->loadHtml('<h1>Welcome to niceshipest.com</h1>'); 
     
     //Load html file 
    //$html = file_get_contents("diploma.php");
    
    $dompdf->loadHtml(""); 
     
    $dompdf->setPaper('A4'); 
    $dompdf->render(); 
    $dompdf->stream("niceshipest", array("Attachment" => 0));
}
?>