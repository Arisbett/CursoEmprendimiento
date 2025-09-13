<?php 
ini_set("display_errors", "0");
include ("includes/cur_header.php");
include ("includes/funciones.php");
/*require ("includes/conexion.php");
$db = new Conexion();
$con = $db->conectar();*/

header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


$p =$_GET["p"];
date_default_timezone_set("America/Mexico_City");
//echo '>'.date("dmY H:i");
    //echo '<br>'.$lim_fin = mktime(0,0,0,date("m"),date("d"),date("Y")) - mktime(0,0,0,12,1,2022);
?>

<style>
.process-step .btn:focus {
    outline: none
}

.process {
    display: table;
    width: 100%;
    position: relative
}

.process-row {
    display: table-row
}

.process-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important
}

.process-row:before {
    top: 40px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0
}

.process-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.process-step p {
    margin-top: 4px;
}

.btn-circle {
    width: 80px;
    height: 80px;
    text-align: center;
    font-size: 12px;
    border-radius: 50%;
    padding: 10px 12px;
}
</style>


<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div class="row">
<div id="parte1">

    <div class="process">
        <div class="process-row nav nav-tabs">
            
            <!--<div class="process-step">
                <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><i
                        class="glyphicon glyphicon-calendar fa-3x"></i></button>
                <p>Calendario</p>
                
            </div>-->

            <div class="process-step"
                <?php if(($hoy >= $d_inicio) or ($hoy <= $d_fin)) {echo "style='inline-block'";} else {echo "style='display:none'";} ?>>
                <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2"><i
                        class="glyphicon glyphicon-book fa-3x"></i></button>
                <p>Módulo I</p>
            </div>
            <div class="process-step"
                <?php if(($hoy >= $d_inicioM2) or ($hoy <= $d_finM2)) {echo "style='inline-block'";} else {echo "style='display:none'";} ?>>
                <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i
                        class="glyphicon glyphicon-book fa-3x"></i></button>
                <p>Módulo II</p>
            </div>
            <div class="process-step"
                <?php if(($hoy >= $d_inicioM3) or ($hoy <= $d_finM3)) {echo "style='inline-block'";} else {echo "style='display:none'";} ?>>
                <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu4"><i
                        class="glyphicon glyphicon-book fa-3x"></i></button>
                <p>Módulo III</p>
            </div>
            <div class="process-step">
                <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu5"><i
                        class="glyphicon glyphicon-book fa-3x"></i></button>
                <p>Módulo IV</p>
            </div>
            
            <div class="process-step">
                <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu6"><i
                        class="glyphicon glyphicon-book fa-3x"></i></button>
                <p>Módulo V</p>
            </div>
            <div class="process-step">
                <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu7"><i
                        class="glyphicon glyphicon-file fa-3x"></i></button>
                <p>Avance</p>
            </div>

            <?php 
            //$final=($_GET['final']);
            #&& $lim_c3_e>=0
            $idAl=$_SESSION['idAlumno'];

            $final=select("CalificacionFinal","boleta","idAlumno=$idAl", "","");
           // var_export($final[0]["CalificacionFinal"]);
         
         if ( $final[0]["CalificacionFinal"]>7 ) {
            echo '<div class="process-step">
                <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu8"><i
                        class="glyphicon glyphicon-file fa-3x"></i></button>
                <p>Diploma</p>
            </div>';
            }
            ?>
        </div>
    </div>
        </div><!--fin parte1-->
    <div class="tab-content">
    
        <div id="menu2" class="tab-pane fade  <?=(!$p==1?"active in":"")?>">
            <!--Menú 2-->
            <?php include ("contenido_modulo1.php");             ?>
            <!--Fin menú 2-->
        </div>

        <div id="menu3" class="tab-pane fade <?=($p==2?"active in":"")?>">
            <!--Menú 3-->
            <?php include ("contenido_modulo2.php"); ?>
            <!--Fin Menú 3-->
        </div>

        <div id="menu4" class="tab-pane fade <?=($p==3?"active in":"")?>">
            <!--Menú 4-->
            <?php //if($lim_c3_i>=0)
                    include ("contenido_modulo3.php");
                
            ?>
        </div>
        <!--Fin Menú 4-->

        <div id="menu5" class="tab-pane fade <?=($p==4?"active in":"")?>">
            <?php 
              include ("contenido_modulo4.php"); ?>
        </div>

       <div id="menu6" class="tab-pane fade <?=($p==5?"active in":"")?>">
            <?php include ("contenido_modulo5.php"); 
            ?>
        </div>
        <div id="menu7" class="tab-pane">
            <?php include ("cur_avancescopia.php"); ?>
        </div>

        <div id="menu8" class="tab-pane">
            <?php include ("cur_diploma.php"); ?>
        </div>
    </div>
</div>

<?php include ("includes/cur_footer.php");?>