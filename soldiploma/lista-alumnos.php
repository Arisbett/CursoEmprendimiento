<?php
/**/ini_set("display_errors", "1");
error_reporting(E_ALL);
set_time_limit(0);
ini_set('memory_limit', '1024M');


header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include("includes/header.php");
include("includes/funciones.php");

$cextranio = 0;
$permitidos = "0123456789-/ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
foreach ($_POST as $keyy => &$vall) {
  for ($i=0; $i<strlen($vall); $i++){ //echo '<br>'.substr($val,$i,1).' '.strpos($permitidos, substr($val,$i,1));
    if (strpos($permitidos, substr($vall,$i,1))===false){ 
      $cextranio = 1;
      break;
    }
  }
} 


if($cextranio==0){

    $id_autorizacion = (!$_POST["id_autorizacion"]?"3":$_POST["id_autorizacion"]);
    
    $letra = $_POST["letra"];
    
    if(($id_coordinador==1 && $letra)){
        
       //$lista1 = select("b.estado as nombreestado,c.nombreUniv_Inst,DATE_FORMAT(a.falta,'%d-%m-%Y') as fregistro,upper(nombre) as nombre1, upper(apaterno) as apaterno1,upper(amaterno) as amaterno1,a.*", "alumno a,states b,grupo c ", ($id_autorizacion==1?"":" a.autorizado=".($id_autorizacion==1?$id_autorizacion:0)." and ").($id_coordinador==$id_super_admin?" (a.idGrupo=1) and ":"  a.idGrupo=$id_grupo and ")." a.estado=b.id_estado and a.falta>='$fecha1_registro' and a.falta<='$fecha2_registro 23:59:59' AND c.idGrupo=a.idGrupo ".($id_coordinador==1?" and (upper(nombre) like '$letra%' or upper(apaterno) like '$letra%' or upper(amaterno) like '$letra%') ":""), "", ""); 

        $lista=select("a.nombre, a.apaterno, a.amaterno,a.registros, DATE_FORMAT(a.falta,'%d-%m-%Y'), b.estado, b.id_estado, c.idAlumno, c.Calificacion1,c.Calificacion2, c.Calificacion3, c.Calificacion4,c.Calificacion5,c.CalificacionFinal ","alumno a, states b, boleta c","a.idAlumno=c.idAlumno and a.estado=b.id_estado  ".($id_coordinador==1?" and (upper(nombre) like '$letra%' or upper(apaterno) like '$letra%' or upper(amaterno) like '$letra%') ":""), "", "");
       
        #and a.falta>='$fecha1_registro' and a.falta<='$fecha2_registro 23:59:59'
        
    }

?>

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="js/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<div class="row">
<div class="col-sm-12">
    <form name="formalumnos" action="lista-alumnos.php" method="POST">
    <p>Estado:
    <select name="id_autorizacion" onchange='document.formalumnos.submit()'>
    <option value="3" <?php echo ($id_autorizacion==3?"selected":""); ?>>Todos los Registrados</option>
    <option value="2" <?php echo ($id_autorizacion==2?"selected":""); ?>>No Autorizados</option>
    <option value="1" <?php echo ($id_autorizacion==1?"selected":""); ?>>Autorizados</option>
    </select>
    </p>
    <?php if($id_coordinador==1){?>
    <p>Nombre, apellido paterno o materno que comience con:
    <select name="letra" onchange='document.formalumnos.submit()'>
    <option value="" ></option>
    <option value="A" <?php echo ($letra==A?"selected":""); ?>>A</option>
    <option value="B" <?php echo ($letra==B?"selected":""); ?>>B</option>
    <option value="C" <?php echo ($letra==C?"selected":""); ?>>C</option>
    <option value="D" <?php echo ($letra==D?"selected":""); ?>>D</option>
    <option value="E" <?php echo ($letra==E?"selected":""); ?>>E</option>
    <option value="F" <?php echo ($letra==F?"selected":""); ?>>F</option>
    <option value="G" <?php echo ($letra==G?"selected":""); ?>>G</option>
    <option value="H" <?php echo ($letra==H?"selected":""); ?>>H</option>
    <option value="I" <?php echo ($letra==I?"selected":""); ?>>I</option>
    <option value="J" <?php echo ($letra==J?"selected":""); ?>>J</option>
    <option value="K" <?php echo ($letra==K?"selected":""); ?>>K</option>
    <option value="L" <?php echo ($letra==L?"selected":""); ?>>L</option>
    <option value="M" <?php echo ($letra==M?"selected":""); ?>>M</option>
    <option value="N" <?php echo ($letra==N?"selected":""); ?>>N</option>
    <option value="Ñ" <?php echo ($letra==Ñ?"selected":""); ?>>Ñ</option>
    <option value="O" <?php echo ($letra==O?"selected":""); ?>>O</option>
    <option value="P" <?php echo ($letra==P?"selected":""); ?>>P</option>
    <option value="Q" <?php echo ($letra==Q?"selected":""); ?>>Q</option>
    <option value="R" <?php echo ($letra==R?"selected":""); ?>>R</option>
    <option value="S" <?php echo ($letra==S?"selected":""); ?>>S</option>
    <option value="T" <?php echo ($letra==T?"selected":""); ?>>T</option>
    <option value="U" <?php echo ($letra==U?"selected":""); ?>>U</option>
    <option value="V" <?php echo ($letra==V?"selected":""); ?>>V</option>
    <option value="W" <?php echo ($letra==W?"selected":""); ?>>W</option>
    <option value="X" <?php echo ($letra==X?"selected":""); ?>>X</option>
    <option value="Y" <?php echo ($letra==Y?"selected":""); ?>>Y</option>
    <option value="Z" <?php echo ($letra==Z?"selected":"");?>>Z</option>
    </select>
    </p>
    <?php } ?>
</form>
    </div>
</div>    
<div class="row">
    <div class="col-sm-12"><br><br><h2>ALUMNOS REGISTRADOS</h2></div>
</div>

<div class="row top-buffer table-responsive">
		<div class="col-xs-12">
    
<?php if(count($lista)>0){?>
   
    <form name="autoriza">
        <input type="hidden" name="arr_ids">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>

                <th>Estado</th>

                <th>Calificación I</th>
                <th>Calificación II</th>
                <th>Calificación III</th>
                <th>Calificación IV</th>
                <th>Calificación V</th>
                <th>Calificación Final</th>
            </tr>
        </thead>
        <tbody>
        <?php  $ids = "";
            for($i=0;$i<count($lista);$i++){ 
                $ids .= $lista[$i]["idAlumno"].',';
        ?>
            <tr>
                <td><?php echo (trim($lista[$i]["nombre"].' '.$lista[$i]["apaterno"].' '.$lista[$i]["amaterno"])); ?></td>

                <td><?php echo ($lista[$i]["estado"]); ?></td>

                <td><?php echo ($lista[$i]["Calificacion1"]); ?></td>
                <td><?php echo ($lista[$i]["Calificacion2"]); ?></td>
                <td><?php echo ($lista[$i]["Calificacion3"]); ?></td>
                <td><?php echo ($lista[$i]["Calificacion4"]); ?></td>
                <td><?php echo ($lista[$i]["Calificacion5"]); ?></td>
                <td><?php echo ($lista[$i]["CalificacionFinal"]); ?></td>
            </tr>
        <?php } ?>
        </tfoot>
    </table>
    <p class="pull-right">    
        <a type="button" class="btn btn-default" href="reporte.php">Descargar todos los registros</a>
    </p>
        </form>
    <?php } else{ ?><br><br>
    <div id="msg" class="alert alert-info">No hay alumnos registrados.</div>
    
    <?php } ?>
		</div>
</div>

<script language="javascript">
    function checar_forma(all){

        form = document.autoriza;
        
      
        form.arr_ids.value="<?php echo $ids; ?>";
        form.action="lista-alumnos_autoriza.php";
        form.method="POST";
        form.submit();
    }

$(document).ready(function() {
    $('#example').DataTable(
    {
      "order": [ 0, 'asc' ],
      "pageLength": 150,
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
      }
    );
} );


</script>
<?php } //end extranio ?>
<?php  include("includes/footer.php"); ?>
