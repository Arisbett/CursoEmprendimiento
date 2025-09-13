<?php
/**/ini_set("display_errors", "0");
error_reporting(E_ALL);
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//include("includes/cur_header.php");
//include ("includes/funciones.php");

/*$calendario = select("*", "generaciones", "generacion=$id_generacion", "");
$m1i = explode('-',$calendario[0]["mod1_inicio"]);
$m1f = explode('-',$calendario[0]["mod1_fin"]);
$me1i = explode('-',$calendario[0]["evaluacion1_inicio"]);
$me1f = explode('-',$calendario[0]["evaluacion1_fin"]);

$m2i = explode('-',$calendario[0]["mod2_inicio"]);
$m2f = explode('-',$calendario[0]["mod2_fin"]);
$me2i = explode('-',$calendario[0]["evaluacion2_inicio"]);
$me2f = explode('-',$calendario[0]["evaluacion2_fin"]);

$m3i = explode('-',$calendario[0]["mod3_inicio"]);
$m3f = explode('-',$calendario[0]["mod3_fin"]);
$me3i = explode('-',$calendario[0]["evaluacion3_inicio"]);
$me3f = explode('-',$calendario[0]["evaluacion3_fin"]);*/


 session_start();
 $idAl=$_SESSION['idAlumno'];
 $nombre=$_SESSION['nombre'];
 $query=Conexion::conectar()->prepare("SELECT * FROM `boleta` WHERE idAlumno=:idAl");
 $query->bindParam(':idAl', $idAl, PDO::PARAM_STR);
 $query->execute();
 $resultadoEx = $query->fetchAll(PDO::FETCH_ASSOC); 
 
 if ($resultadoEx[0]["CalificacionFinal"]>7 ) {
    
 echo'
    <p>Para poder descargar tu constancia, ingresa al link adjunto:</p>
    <center><font size="6pt"><a data-toggle="modal" data-target="#exampleModal " style="cursor:pointer;">Constancia</a></font></center>
    <div id="div_descarga"></div><br />
    <ul>
   <li>Recuerda que eres responsable de la informaci&oacute;n proporcionada por lo que&nbsp;<strong>NO SE REALIZAR&Aacute; CAMBIO NI MODIFICACI&Oacute;N DE NOMBRE</strong>&nbsp;una vez emitido la constancia.</li>
   <li>El enlace proporcionado solo estar&aacute; disponible por 3 meses y posteriormente quedar&aacute; deshabilitada la sesi&oacute;n y no se podr&aacute; reenviar nuevamente la constancia o recuperar.</li>
</ul>
<center>
<p>Gracias por tu participaci&oacute;n y compromiso.<br />
<br />
Permanecemos a tus &oacute;rdenes,<br />
<br />
<strong>Curso de Emprendedores</strong></p>
</center>

<div class="modal fullscreen-modal fade" id="exampleModal" tabindex="-1" role="dialog"
               aria-labelledby="gridSystemModalLabel">
               <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                   aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title" id="gridSystemModalLabel">Curso de Emprendedores</h4>
                       </div>
                       <div class="modal-body">
                           <div class="row">
                               <center>
                               <p><em>Estimado(a) alumno:</em> Tú opinión es importante para nosostros y puedes hacer la Encuesta de Satisfacción para mejorar cada día. </p>

                               <a  class="btn btn-primary" type="button" href="certificado.php" target="_blank" class="glyphicon glyphicon-download-alt" onclick="FAjax(\'alumnoDescarga.php\',\'div_descarga\',\'\',\'POST\'); ">
                                       <p>Descargar la Constancia</p> 
                                   </a>

                                   <a class="btn btn-primary" type="button" href="evaluacionSatisfaccion.php">
                                       <p>Encuesta de Satisfacción</p>
                                   </a>
                               </center>
                           </div>
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                       </div>
                   </div><!-- /.modal-content -->
               </div><!-- /.modal-dialog -->
           </div>

'


;
}
                


?>
