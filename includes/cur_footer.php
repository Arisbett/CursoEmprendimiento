<?php
ini_set("display_errors", "0");
  //error_reporting(E_ALL);
?>
    </div>
    </main>
<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
<script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<script language="javascript">
      $gmx(document).ready(function() {
	$('[data-toggle="popover"]').popover();
	$('[data-toggle="tooltip"]').tooltip();
	 });
    </script>
</body>
</html>
<?php

include ("detecta_so_n_v.php");
require_once ("funciones.php");
$id_grupo     = (!$_SESSION["idGrupo"]?0:$_SESSION["idGrupo"]);
$id_alumno = (!$_SESSION["idAlumno"]?0:$_SESSION["idAlumno"]);

function dameURL(){
$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
return $url;
}

$url = dameURL();
$info= detect();
$ip = $_SERVER['REMOTE_ADDR'];


//if($link)
insert ("monitoreo_alumnos", "id_grupo, id_alumno, url, explorador, ip, fecha_registro", "$id_grupo, $id_alumno, '$url', '$info', '$ip', now()");

?>
