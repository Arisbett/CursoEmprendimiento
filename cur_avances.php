<?php

/**/ini_set("display_errors", "0");
error_reporting(E_ALL);
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

date_default_timezone_set("America/Mexico_City");
$lim_c3_i = mktime(0,0,0,date("m"),date("d"),date("Y")) - mktime(0,0,0,11,15,2022);
$calendario = select("*", "generaciones", "generacion=$id_generacion", "");
//include ("includes/funcionMod3.php");

        ?>

<h3><?php echo $nombre; ?></h3>
<h3>Avances y Calificaciones</h3><hr class="red">
<div id="parte1">
<div class="row">
    <div class="col-sm-12">
    <div class="alert alert-info"><!--<h3>Acreditación</h3>-->
		El promedio <strong>mínimo aprobatorio será de 7.0</strong>, tomando en consideración las calificaciones finales obtenidas en cada uno de los módulos.
        <br>La sumatoria de éstas calificaciones divididas entre los 3 módulos, nos darán el promedio general del Curso.
    <br><i>Recuerda que solo podr&aacute;s realizar la <b>Evaluaci&oacute;n Final del M&oacute;dulo</b> si obtienes la m&aacute;xima puntuaci&oacute;n en todas las actividades </i></div>
</div>
</div>
<div class="row">
    <div class="col-sm-2">
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>
</div><div class="col-sm-2">
    Aprobado
</div><div class="col-sm-2">
        <div class="alert alert alert-warning"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></div>
</div><div class="col-sm-2">
    Pendiente
</div><div class="col-sm-2">
        <div class="alert alert alert-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
</div><div class="col-sm-2">
    No Aprobado
</div>
</div>






<?php
 $idAl=$_SESSION['idAlumno'];       
 $comando = $con->prepare("SELECT * FROM `examendiag` WHERE idAlumno=$idAl");
 $comando->execute();
 $total = $comando->rowCount();
 
 if ($total>=1){
    echo "<div class=\"alert alert-success\">Estudio Diagn&oacute;stico</div>";
 }else{
    echo "<div class=\"alert alert-warning\">Estudio Diagn&oacute;stico</div>";
 }


 $cal1 = 0;
 $cal2 = 0;
 $cal3 = 0;
 $cal4 = 0;

 
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
                                        <td align="center"><strong>M&oacute;dulo</strong></td>
                                        <td align="center"><strong>Actividad 1<br>10 %</strong></td>
                                        <td align="center"><strong>Actividad 2<br>10 %</strong></td>
                                        <td align="center"><strong>Actividad 3<br>10 %</strong></td>
                                        <td align="center"><strong>Actividad 4<br>10 %</strong></td>
                                        <td align="center"><strong>Examen<br>60 %</strong></td>
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
                                        
                                        
                                    </tr><tr align="left">
                                        <td align="center" valign="middle"><strong>I</strong></td>

                                        <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `actividad_1` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle"> 
                                        <?php foreach ($resultado AS $row){ ?>
                                            <?php $cal1 = $row ['Calificacion']?>
                                            <?php } ?>
                                        <?php
                                        if ($cal1 == 10) {
                                            echo "<div class=\"alert alert-success\"> $cal1 %</div>";
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                      
                                        }
                                        ?>
                                    </td>




                                    <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `actividad_2` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle">
                                        <?php foreach ($resultado AS $row){?>
                                            <?php $cal2 = $row ['Calificacion']?><?php } ?>                                          
                                        <?php
                                        if ($cal2 == 10) {
                                            echo "<div class=\"alert alert-success\"> $cal2 %</div>";  
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                     
                                        }
                                        ?>
                                    </td>

                                       
                                    <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `actividad_3` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle">
                                        <?php foreach ($resultado AS $row){?>
                                            <?php $cal3 = $row ['Calificacion']?><?php } ?>                                          
                                        <?php
                                        if ($cal3 == 10) {
                                            echo "<div class=\"alert alert-success\"> $cal3 %</div>";  
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* </strong>%</div>";                     
                                        }
                                        ?>
                                    </td>

                                    <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `actividad_4` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle">
                                        <?php foreach ($resultado AS $row){?>
                                            <?php $cal4 = $row ['Calificacion']?><?php } ?>                                          
                                        <?php
                                        if ($cal4 == 10) {
                                            echo "<div class=\"alert alert-success\"> $cal4 %</div>";  
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                     
                                        }
                                        ?>
                                    </td>




                                    <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `examen_m1` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle">
                                        <?php foreach ($resultado AS $row){?>
                                            <?php $cal5 = $row ['Calificacion']?><?php } ?>
                                                                                     
                                        <?php
                                        $calEx = 60*$cal5/15;
                                        if ($calEx >= 28) {
                                            echo "<div class=\"alert alert-success\"> $calEx %</div>";  
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>$calEx %</strong></div>";                     
                                        }
                                        
                                        ?>
                                    </td>

                                    <td align="center" valign="middle">

                                    <?php $calPor= $cal1+$cal2+$cal3+$cal4+$calEx ;

                                    if ($calPor >= 66) {
                                        echo "<div class=\"alert alert-success\"> $calPor %</div>";  
                                    }else{
                                         echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>$calPor %</strong></div>";                     
                                        }
                                    
                                    ?>

                                    </td>

                                    
                                        <td align="center" valign="middle">
                                         <?php
                                    $calFinal=round($calPor*10/100);
                                    if ($calFinal >= 7) {
                                        echo "<div class=\"alert alert-success\"> $calFinal </div>";  
                                    }else{
                                         echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>$calFinal </strong></div>";                     
                                        }
                                    ?>   
                                        </td>
                                       
                                    </tr>

                                    <tr align="left">
                                        <td align="center" valign="middle"><strong>II</strong></td>

                                        <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `actividad1_m2` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle"> 
                                        <?php foreach ($resultado AS $row){ ?>
                                            <?php $cal1m2 = $row ['Calificacion']?>
                                            <?php } ?>
                                        <?php
                                        if ($cal1m2 == 10) {
                                            echo "<div class=\"alert alert-success\"> $cal1m2 %</div>";
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                      
                                        }
                                        ?>
                                    </td>




                                    <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `actividad2_m2` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle">
                                        <?php foreach ($resultado AS $row){?>
                                            <?php $cal2m2 = $row ['Calificacion']?><?php } ?>                                          
                                        <?php
                                        if ($cal2m2 == 10) {
                                            echo "<div class=\"alert alert-success\"> $cal2m2 %</div>";  
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                     
                                        }
                                        ?>
                                    </td>

                                       
                                    <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `actividad3_m2` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle">
                                        <?php foreach ($resultado AS $row){?>
                                            <?php $cal3m2 = $row ['Calificacion']?><?php } ?>                                          
                                        <?php
                                        if ($cal3m2 == 10) {
                                            echo "<div class=\"alert alert-success\"> $cal3m2 %</div>";  
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* </strong>%</div>";                     
                                        }
                                        ?>
                                    </td>

                                    <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `actividad4_m2` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle">
                                        <?php foreach ($resultado AS $row){?>
                                            <?php $cal4m2 = $row ['Calificacion']?><?php } ?>                                          
                                        <?php
                                        if ($cal4m2 == 10) {
                                            echo "<div class=\"alert alert-success\"> $cal4m2 %</div>";  
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                     
                                        }
                                        ?>
                                    </td>




                                    <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `examen_m2` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle">
                                        <?php foreach ($resultado AS $row){?>
                                            <?php $cal5m2 = $row ['Calificacion']?><?php } ?>
                                                                                     
                                        <?php
                                        $calExm2 = 60*$cal5m2/15;
                                        if ($calExm2 >= 28) {
                                            echo "<div class=\"alert alert-success\"> $calExm2 %</div>";  
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>$calExm2 %</strong></div>";                     
                                        }
                                        
                                        ?>
                                    </td>

                                    <td align="center" valign="middle">

                                    <?php $calPorM2= $cal1m2+$cal2m2+$cal3m2+$cal4m2+$calExm2 ;

                                    if ($calPorM2 >= 66) {
                                        echo "<div class=\"alert alert-success\"> $calPorM2 %</div>";  
                                    }else{
                                         echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>$calPorM2 %</strong></div>";                     
                                        }
                                    
                                    ?>

                                    </td>
                                  
                                        <td align="center" valign="middle">
                                         <?php
                                    $calFinalM2=round($calPorM2*10/100);
                                    if ($calFinalM2 >= 7) {
                                        echo "<div class=\"alert alert-success\"> $calFinalM2 </div>";  
                                    }else{
                                         echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>$calFinalM2 </strong></div>";                     
                                        }
                                    ?>   
                                        </td>
                                        
                                    </tr>
                                    
                                    <tr align="left">
                                        <td align="center" valign="middle"><strong>III</strong></td>

                                        <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `actividad1_m3` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle"> 
                                        <?php foreach ($resultado AS $row){ ?>
                                            <?php $cal1m3 = $row ['Calificacion']?>
                                            <?php } ?>
                                        <?php
                                        if ($cal1m3 == 10) {
                                            echo "<div class=\"alert alert-success\"> $cal1m3 %</div>";
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                      
                                        }
                                        ?>
                                    </td>

                                    <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `actividad2_m3` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle">
                                        <?php foreach ($resultado AS $row){?>
                                            <?php $cal2m3 = $row ['Calificacion']?><?php } ?>                                          
                                        <?php
                                        if ($cal2m3 == 10) {
                                            echo "<div class=\"alert alert-success\"> $cal2m3 %</div>";  
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                     
                                        }
                                        ?>
                                    </td>

                                       
                                    <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `actividad3_m3` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle">
                                        <?php foreach ($resultado AS $row){?>
                                            <?php $cal3m3 = $row ['Calificacion']?><?php } ?>                                          
                                        <?php
                                        if ($cal3m3 == 10) {
                                            echo "<div class=\"alert alert-success\"> $cal3m3%</div>";  
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* </strong>%</div>";                     
                                        }
                                        ?>
                                    </td>

                                    <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `actividad4_m3` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle">
                                        <?php foreach ($resultado AS $row){?>
                                            <?php $cal4m3 = $row ['Calificacion']?><?php } ?>                                          
                                        <?php
                                        if ($cal4m3 == 10) {
                                            echo "<div class=\"alert alert-success\"> $cal4m3 %</div>";  
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>* %</strong></div>";                     
                                        }
                                        ?>
                                    </td>




                                    <?php
                                        $idAl=$_SESSION['idAlumno'];       
                                        $comando = $con->prepare("SELECT Calificacion FROM `examen_m3` WHERE idAlumno=$idAl");
                                        $comando->execute();
                                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         <td align="center" valign="middle">
                                        <?php foreach ($resultado AS $row){?>
                                            <?php $cal5m3 = $row ['Calificacion']?><?php } ?>
                                                                                     
                                        <?php
                                        $calExm3 = 60*$cal5m3/15;
                                        if ($calExm3 >= 28) {
                                            echo "<div class=\"alert alert-success\"> $calExm3 %</div>";  
                                        }else{
                                            echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>$calExm3 %</strong></div>";                     
                                        }
                                        
                                        ?>
                                    </td>

                                    <td align="center" valign="middle">

                                    <?php $calPorM3= $cal1m3+$cal2m3+$cal3m3+$cal4m3+$calExm3 ;

                                    if ($calPorM3 >= 66) {
                                        echo "<div class=\"alert alert-success\"> $calPorM3 %</div>";  
                                    }else{
                                         echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>$calPorM3 %</strong></div>";                     
                                        }
                                    
                                    ?>

                                    </td>
                                    

                                        <td align="center" valign="middle">
                                         <?php
                                    $calFinalM3=round($calPorM3*10/100);
                                    if ($calFinalM3 >= 7) {
                                        echo "<div class=\"alert alert-success\"> $calFinalM3 </div>";  
                                    }else{
                                         echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>$calFinalM3 </strong></div>";                     
                                        }
                                    ?>   
                                        </td>
                                    </tr>
                                <?php if($lim_c3_e>=0){ ?>
                                    <table class="table" style="max-width:90%;">
                                <tbody>
                                <tr align="center">
                                       
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center"></td>
                                        <td align="center" ></td>
                                        <td align="center" valign="middle"><strong><?php  if($lim_c3_e>=0 && $resultadoMod3[0]["CalTotal"]>=40 && $calexm3==1){ echo "Promedio General"; } ?></strong></td>
                                        <td align="center" valign="middle">
                                        <?php
                                            $pg=round(($calFinal+$calFinalM2+$calFinalM3)/3);
                                            if($lim_c3_e>=0 && $resultadoMod3[0]["CalTotal"]>=40 && $calexm3==1){ 
                                            if ($pg >= 7) {
                                                echo "<div class=\"alert alert-success\"> $pg </div>";  
                                            }else{
                                                echo "<div class=\"alert ".(empty($resultado)?"alert-warning":"alert-danger")."\"><strong>$pg </strong></div>";                     
                                            }
                                        }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php } ?>
                            <?php
                            


   
        $idAl=$_SESSION['idAlumno'];
        $exam= Conexion::conectar()->prepare("SELECT Sum(Calificacion) CalTotal from ( SELECT sum(Calificacion) Calificacion from actividad_1 WHERE actividad_1.idAlumno=$idAl union all 
        SELECT sum(Calificacion) from actividad_2 WHERE actividad_2.idAlumno=$idAl union all 
        SELECT sum(Calificacion) from actividad_3 WHERE actividad_3.idAlumno=$idAl union all 
        SELECT sum(Calificacion) from actividad_4 WHERE actividad_4.idAlumno=$idAl union all 
        SELECT sum(Calificacion) from actividad1_m2 WHERE actividad1_m2.idAlumno=$idAl union all
        SELECT sum(Calificacion) from actividad2_m2 WHERE actividad2_m2.idAlumno=$idAl union all
        SELECT sum(Calificacion) from actividad3_m2 WHERE actividad3_m2.idAlumno=$idAl union all
        SELECT sum(Calificacion) from actividad4_m2 WHERE actividad4_m2.idAlumno=$idAl union all
        SELECT sum(Calificacion) from actividad1_m3 WHERE actividad1_m3.idAlumno=$idAl union all
        SELECT sum(Calificacion) from actividad2_m3 WHERE actividad2_m3.idAlumno=$idAl union all
        SELECT sum(Calificacion) from actividad3_m3 WHERE actividad3_m3.idAlumno=$idAl union all
        SELECT sum(Calificacion) from actividad4_m3 WHERE actividad4_m3.idAlumno=$idAl union all
        SELECT sum(Calificacion) from examen_m1 WHERE examen_m1.idAlumno=$idAl union all 
        SELECT sum(Calificacion) from examen_m2 WHERE examen_m2.idAlumno=$idAl union all 
        SELECT sum(Calificacion) from examen_m3 WHERE examen_m3.idAlumno=$idAl) as Total");
        $exam->execute();
        $resultadoEx = $exam->fetchAll(PDO::FETCH_ASSOC);
        $calff=$resultadoEx[0]["CalTotal"];
        
        $totalF=round(($calFinal+$calFinalM2+$calFinalM3)/3); 

        if ($calff>1) {
            $querym = Conexion::conectar()->prepare("SELECT idAlumno FROM calificacionfinal WHERE idAlumno =:idAl");
            $querym->bindParam(':idAl', $idAl, PDO::PARAM_STR);
            $querym->execute();
            $total = $querym->rowCount();
            $original = base64_encode($idAl.'|'.$totalF.'|'.date("Y-m-d"));
        
            if ($total>=1) {
                $actualiza=Conexion::conectar()->prepare("UPDATE calificacionfinal SET Calificacion = :totalF, cadena_original= :Original WHERE calificacionfinal.idAlumno = :idAl");
                $actualiza->bindParam(':idAl', $idAl, PDO::PARAM_STR);
                $actualiza->bindParam(':totalF', $totalF, PDO::PARAM_STR);
                $actualiza->bindParam(':Original', $original, PDO::PARAM_STR);
                $actualiza->execute();
            }else{
            $Cal = Conexion::conectar()->prepare("INSERT INTO calificacionfinal( idAlumno, Calificacion,cadena_original) VALUES (:idAl, :totalF,:Original)");
            $Cal->bindParam(':idAl', $idAl, PDO::PARAM_STR);
            $Cal->bindParam(':totalF', $totalF, PDO::PARAM_STR);
            $Cal->bindParam(':Original', $original, PDO::PARAM_STR);
            $Cal->execute();
            }
        
        }
                                   
         $querypg = Conexion::conectar()->prepare("SELECT Calificacion FROM calificacionfinal WHERE idAlumno =:idAl");
         $querypg->bindParam(':idAl', $idAl, PDO::PARAM_STR);
         $querypg->execute();
         $resultadofinal = $querypg->fetchAll(PDO::FETCH_ASSOC);
         $final=round($resultadofinal[0]["Calificacion"]);

         
        //var_dump($calexm3);

                    if($lim_c3_e>=0 && $resultadoMod3[0]["CalTotal"]>=40 && $calexm3==1 ){    
                    if ($final >= 7 ) {
                        echo "<div class=\"alert alert-success\"> ¡Felicidades!, has aprobado el Curso en Educación Financiera, Generación 42, por lo que eres acreedor(a) a un 
                        Diploma que sustenta los estudios realizados, el cual podrás descargar desde el MENÚ PRINCIPAL DE TU SESIÓN </div>";  
                    }else{
                        echo "<div class=\"alert alert-warning\">El promedio general para aprobar el Curso en Educación Financiera es de 7, 
                        por lo cual no fuiste acreedor(a) al diploma que sustenta los estudios realizados. Te invitamos a inscribirte 
                        en la siguiente generación.</div>";                     
                    }
                    }

                            
                           
                                        ?>
                                    
                                </tbody>
                            </table>
                       
                            <div id="parte1">
                            <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	<p class="pull-right">  
<button class="btn btn-default" type="button" onClick="document.location.href='Modulos.php'">Regresar</button>
<button class="btn btn-danger" type="button" onClick="window.print()" >Descargar Calificaciones</button>
        </p>
    </div>
</div>
                </div><!--fin parte1-->
</center>



                                       


