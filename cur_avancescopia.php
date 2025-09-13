<?php

/**/ ini_set("display_errors", "0");
error_reporting(E_ALL);
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

date_default_timezone_set("America/Mexico_City");
$lim_c3_i = mktime(0, 0, 0, date("m"), date("d"), date("Y")) - mktime(0, 0, 0, 11, 15, 2022);
$calendario = select("*", "generaciones", "generacion=$id_generacion", "");
$idAl = $_SESSION['idAlumno'];
?>

<h3><?php echo $nombre; ?></h3>
<h3>Avances y Calificaciones </h3>
<hr class="red">
<div id="parte1">
    <!-- <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-info"><h3>Acreditación</h3>
                El promedio <strong>mínimo aprobatorio será de 7.0</strong>, tomando en consideración las calificaciones finales obtenidas en cada uno de los módulos.
                <br>La sumatoria de éstas calificaciones divididas entre los 5 módulos, nos darán el promedio general del Diplomado.
                
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-sm-2">
            <div class="alert alert-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>
        </div>
        <div class="col-sm-2">
            Aprobado
        </div>
        <div class="col-sm-2">
            <div class="alert alert alert-warning"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></div>
        </div>
        <div class="col-sm-2">
            Pendiente
        </div>
        <div class="col-sm-2">
            <div class="alert alert alert-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
        </div>
        <div class="col-sm-2">
            No Aprobado
        </div>
    </div>

    <?php
    /*$idAl = $_SESSION['idAlumno'];
    $comando = $con->prepare("SELECT * FROM `examendiag` WHERE idAlumno=$idAl");
    $comando->execute();
    $total = $comando->rowCount();

    if ($total >= 1) {
        echo "<div class=\"alert alert-success\">Estudio Diagn&oacute;stico</div>";
    } else {
        echo "<div class=\"alert alert-warning\">Estudio Diagn&oacute;stico</div>";
    }
    $cal1 = 0;
    $cal2 = 0;
    $cal3 = 0;
    $cal4 = 0;*/

    //$guardar=$conecta->query($consulta);
    ?>
</div><!--div parte1-->

<!--<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-warning"><strong>Estudio Diagn&oacute;stico</strong></div>
    </div>
</div>-->

<center>
    <table class="table" style="max-width:90%;" cellpadding="2" cellspacing="2">

        <tbody>
            <tr align="center">

                <!-- <td align="center"><strong>M&oacute;dulo</strong></td> -->
                <td align="center"><strong>Actividad 1<br>20 %</strong></td>
                <td align="center"><strong>Actividad 2<br>20 %</strong></td>
                <td align="center"><strong>Actividad 3<br>20 %</strong></td>
                <td align="center"><strong>Actividad 4<br>20 %</strong></td>
                <td align="center"><strong>Actividad 5<br>20 %</strong></td>
                <td align="center"><strong>Total</strong></td>
                <td align="center"><strong>Calificaci&oacute;n Final</strong></td>
            </tr>
            <tr align="left">
                <td align="center" valign="middle"></td>
                <td align="center" valign="middle"></td>
                <td align="center" valign="middle"></td>
                <td align="center" valign="middle"></td>
                <td align="center" valign="middle"></td>
                <td align="center" valign="middle"></td>
                <td align="center" valign="middle"></td>
                <td align="center" valign="middle"></td>


            </tr>
            
            <tr align="left">
            <?php $consulta = $con->prepare("SELECT Calificacion FROM `actividad1_m1` WHERE idAlumno=$idAl");
                $consulta->execute();
                $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <td align="center" valign="middle"> 
                                        <?php foreach ($resultado AS $row){ ?>
                                            <?php $cal1 = $row ['Calificacion']                                           
                                            ?>
                                            <?php } ?>
                                        <?php
                                        $cal1por=round($cal1*100/10);
                                        if ($cal1por >= 80) {
                                            echo "<div class=\"alert alert-success\"> $cal1por %</div>";
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                      
                                        }
                                        //var_export($cal1);
                                        ?>

                </td>
                <?php $consulta = $con->prepare("SELECT Calificacion FROM `actividad1_m2` WHERE idAlumno=$idAl");
                $consulta->execute();
                $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <td align="center" valign="middle"> 
                                        <?php foreach ($resultado AS $row){ ?>
                                            <?php $cal2 = $row ['Calificacion']?>
                                            <?php } ?>
                                        <?php
                                         $cal2por=round($cal2*100/10);
                                        if ($cal2por >= 80) {
                                            echo "<div class=\"alert alert-success\"> $cal2por %</div>";
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                      
                                        }
                                        ?>
                </td>
                <?php $consulta = $con->prepare("SELECT Calificacion FROM `actividad1_m3` WHERE idAlumno=$idAl");
                $consulta->execute();
                $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            ?>

                <td align="center" valign="middle"> 
                                        <?php foreach ($resultado AS $row){ ?>
                                            <?php $cal3 = $row ['Calificacion']?>
                                            <?php } ?>
                                        <?php
                                         $cal3por=round($cal3*100/10);
                                         if ($cal3por >= 80) {
                                            echo "<div class=\"alert alert-success\"> $cal3por %</div>";
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                      
                                        }
                                        ?>
                </td>
                <?php $consulta = $con->prepare("SELECT Calificacion FROM `actividad1_m4` WHERE idAlumno=$idAl");
                $consulta->execute();
                $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            ?>

                <td align="center" valign="middle"> 
                                        <?php foreach ($resultado AS $row){ ?>
                                            <?php $cal4 = $row ['Calificacion']?>
                                            <?php } ?>
                                        <?php
                                         $cal4por=round($cal4*100/10);
                                         if ($cal4por >= 80) {
                                            echo "<div class=\"alert alert-success\"> $cal4por %</div>";
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                      
                                        }
                                        ?>
                </td>
                <?php $consulta = $con->prepare("SELECT Calificacion FROM `actividad1_m5` WHERE idAlumno=$idAl");
                $consulta->execute();
                $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            ?>

                <td align="center" valign="middle"> 
                                        <?php foreach ($resultado AS $row){ ?>
                                            <?php $cal5 = $row ['Calificacion']?>
                                            <?php } ?>
                                        <?php
                                         $cal5por=round($cal5*100/8);
                                         if ($cal5por >= 80) {
                                            echo "<div class=\"alert alert-success\"> $cal5por %</div>";
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                      
                                        }
                                        ?>
                </td>
                <td align="center" valign="middle">
                <?php $suma= $cal1por+$cal2por+$cal3por+$cal4por+$cal5por;
                $sumapor=$suma/5;
                $sumafin=$sumapor/5;
              

                                    if ($suma >= 80) {
                                        echo "<div class=\"alert alert-success\"> $sumapor %</div>";  
                                    }else{
                                         echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>$suma %</strong></div>";                     
                                        }
                                    
                                    ?>
                </td>
                <td align="center" valign="middle">
                                        <?php
                                            $promedio=round(($sumapor)/10);
                                            
                                            if ($promedio >= 8) {
                                                echo "<div class=\"alert alert-success\"> $promedio </div>";  
                                            }else{
                                                echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>$promedio </strong></div>";                     
                                            }
                                        
                                            ?>
                                        </td>
            </tr>

        </tbody>
    </table>

</center>



<?php 
                $promedio;
                $query=Conexion::conectar()->prepare("SELECT idAlumno FROM `boleta` WHERE idAlumno=:idAl");
                $query->bindParam(':idAl', $idAl, PDO::PARAM_STR);
                $query->execute();
                $total = $query->rowCount();
                $original = base64_encode($idAl.'|'.$promedio.'|'.date("Y-m-d"));
                
                if($total>=1){
                $queryAc = Conexion::conectar()->prepare("UPDATE `boleta` SET `CalificacionFinal` = :cal, `cadena_original` = :Original WHERE boleta.IdAlumno = :idAl");
                $queryAc->bindParam(':cal', $promedio, PDO::PARAM_STR);
                $queryAc->bindParam(':idAl', $idAl, PDO::PARAM_STR);
                $queryAc->bindParam(':Original', $original, PDO::PARAM_STR);
                $queryAc->execute();
                }else{
                    $queryIn = Conexion::conectar()->prepare("INSERT INTO boleta (idAlumno, Calificacion1, Calificacion2, Calificacion3, Calificacion4, Calificacion5, CalificacionFinal, cadena_original) 
                    VALUES(:idAl,'','','','','',:cal, :Original)");
                $queryIn->bindParam(':idAl', $idAl, PDO::PARAM_STR);
                $queryIn->bindParam(':cal', $promedio, PDO::PARAM_STR);
                $queryIn->bindParam(':Original', $original, PDO::PARAM_STR);
                $queryIn->execute();
                }

               
                ?>