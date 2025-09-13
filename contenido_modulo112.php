<?php  
//ini_set("display_errors", "0");
//error_reporting(E_ALL);
require ("includes/conexion.php");
$db = new Conexion();
$con = $db->conectar();
$id_modulo = 1;

$mod1_inicio = $_SESSION["mod1_inicio"];
$mod1_fin = $_SESSION["mod1_fin"];
$evaluacion1_inicio = $_SESSION["evaluacion1_inicio"];
$evaluacion1_fin = $_SESSION["evaluacion1_fin"];

$e1i_arr = explode('-',$evaluacion1_inicio);
$e1f_arr = explode('-',$evaluacion1_fin);
//echo 'server:'.date("Y-m-d H:i");

$lim_e1_i = mktime(date("H"),0,0,date("m"),date("d"),date("Y")) - mktime(7,0,0,$e1i_arr[1],$e1i_arr[2],$e1i_arr[0]);
$lim_e1_f = mktime(6,58,0,$e1f_arr[1],$e1f_arr[2]+1,$e1f_arr[0]) - mktime(date("H"),date("i"),0,date("m"),date("d"),date("Y"));
$contenido_fin = mktime(0,0,0,date("m"),date("d"),date("Y")) - mktime(0,0,0,12,14,2022);
if($contenido_fin>=0) $id_modulo = -1;
//print "<br>-->i:$lim_e1_i, f:$lim_e1_f";
//echo '<br>'. (mktime(date("H"),0,0,date("m"),date("d"),date("Y")) - mktime(7,0,0,10,18,2022));
//if($lim_e1_i>=0) echo "<br>examen";
echo '<script type="text/javascript" src="js/libreriaAjax.js"></script>';
echo '<h3>M&oacute;dulo I</h3><hr class="red">';

                            $comando = $con->query("SELECT a.id_tema,a.tema,b.id_subtema,b.subtema,c.titulo,c.contenido,status_contenido
                            FROM temas a,subtemas b,contenido c
                            WHERE a.id_tema=b.id_tema AND c.id_subtema=b.id_subtema AND id_modulo=$id_modulo
                            ORDER BY tema,titulo");
                            $comando->execute();
                            $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                            $id_tema = 0;
                            $contador = 1;

                            $idAl=$_SESSION['idAlumno'];
                            $actividad=$con->query("SELECT idAlumno,Calificacion FROM `actividad_1` WHERE idAlumno= $idAl");
                            $actividad->execute();
                        $resultadoA = $actividad->fetchAll(PDO::FETCH_ASSOC);
                        
                            $calificacion_actividad1 = $resultadoA[0]["Calificacion"];


                            $actividad2=$con->query("SELECT idAlumno,Calificacion FROM `actividad_2` WHERE idAlumno= $idAl");
                            $actividad2->execute();
                        $resultadoA2 = $actividad2->fetchAll(PDO::FETCH_ASSOC);
                        
                            $calificacion_actividad2 = $resultadoA2[0]["Calificacion"];

                            $actividad3=$con->query("SELECT idAlumno,Calificacion FROM `actividad_3` WHERE idAlumno= $idAl");
                            $actividad3->execute();
                        $resultadoA3 = $actividad3->fetchAll(PDO::FETCH_ASSOC);
                        
                            $calificacion_actividad3 = $resultadoA3[0]["Calificacion"];


                            $actividad4=$con->query("SELECT idAlumno,calificacion FROM `actividad_4` WHERE idAlumno= $idAl");
                            $actividad4->execute();
                        $resultadoA4 = $actividad4->fetchAll(PDO::FETCH_ASSOC);
                        
                            $calificacion_actividad4 = $resultadoA4[0]["calificacion"];

                            foreach($resultado AS $row){ //var_export($row);

                                $id_subtema = $row["id_subtema"];
                                 
                                if($id_tema==0 ||  $id_tema != $row["id_tema"]){
                                    echo "<h3>".$row["tema"]."</h3>";
                                    
                                }

                                
                        ?>

    
                        <div class="collapse<?php echo $contador; ?>">
                            <div class="panel-group ficha-collapse" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a data-parent="#accordion" data-toggle="collapse" href="#panel-<?php echo $contador; ?>" aria-expanded="true" aria-controls="panel-<?php echo $contador; ?>" onclick="FAjax('alumnoReviso.php','avance<?php echo $contador; ?>','idSub=<?php echo $id_subtema; ?>','POST');">
                                        <?php echo $row["titulo"]; ?>
                                        </a>
                                        </h4>
                                        <button type="button" class="collpase-button collapsed" data-parent="#accordion" data-toggle="collapse" href="#panel-<?php echo $contador; ?>" onclick="FAjax('alumnoReviso.php','avance<?php echo $contador; ?>','idSub=<?php echo $id_subtema; ?>','POST');"></button>
                                    </div>
                                    <div class="panel-collapse collapse" id="panel-<?php echo $contador; ?>">
                                        <div class="panel-body"><div id='avance<?php echo $contador; ?>'></div><?php echo $row["contenido"]; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            

                        if ($row["id_subtema"]==4 && $calificacion_actividad1 == 10) {
                            echo '<div class="alert alert-success"><strong>Actividad Realizada</strong></div>'; 
                            
                        }else if($row["id_subtema"]==4 && $calificacion_actividad1 < 10){
                            echo '<a href="actividad1.php"><button type="button" class="btn btn-primary">Actividad</button></a>';

                        }
                        if ($row["id_subtema"]==13 && $calificacion_actividad2 == 10) {
                            echo '<div class="alert alert-success"><strong>Actividad Realizada</strong></div>'; 
                            
                        }else if($row["id_subtema"]==13 && $calificacion_actividad2 < 10){
                            echo '<a href="actividad2.php"><button type="button" class="btn btn-primary">Actividad</button></a>';

                        }
                        if ($row["id_subtema"]==24 && $calificacion_actividad3 == 10) {
                            echo '<div class="alert alert-success"><strong>Actividad Realizada</strong></div>'; 
                            
                        }else if($row["id_subtema"]==24 && $calificacion_actividad3 < 10){
                            echo '<a href="actividad3.php"><button type="button" class="btn btn-primary">Actividad</button></a>';

                        }
                        if ($row["id_subtema"]==21 && $calificacion_actividad4 == 10) {
                            echo '<div class="alert alert-success"><strong>Actividad Realizada</strong></div>';
                            
                        }else if($row["id_subtema"]==21 && $calificacion_actividad4 < 10){
                            echo '<a href="actividad4.php"><button type="button" class="btn btn-primary">Actividad</button></a>';

                        }       
                            
                            $contador++;
                            $id_tema = $row["id_tema"]; 
                            } 
                           
                        ?>
                        <div>&nbsp;</div>
                       
                       <?php
                       
                       $idAl=$_SESSION['idAlumno'];
              
                       $comando = $con->query("SELECT Sum(Calificacion) CalTotal from (
                        SELECT sum(Calificacion) Calificacion from actividad_1 WHERE actividad_1.idAlumno=$idAl
                        union all
                        SELECT sum(Calificacion) from actividad_2  WHERE actividad_2.idAlumno=$idAl
                        union all
                        SELECT sum(Calificacion) from actividad_3  WHERE actividad_3.idAlumno=$idAl
                        union all 
                        SELECT sum(calificacion) from actividad_4 WHERE actividad_4.idAlumno=$idAl)  
                        as Total");
                        $comando->execute();
                        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                        //var_export($resultado);

                        $comandoEF = $con->query("SELECT idExamen from examen_m1 WHERE idAlumno=$idAl");
                        $comandoEF->execute();
                        $resultadoEF = $comandoEF->fetchAll(PDO::FETCH_ASSOC);
                      
                //if ($resultado[0]["CalTotal"] == 40 && count($resultadoEF)==0 && $lim_e1_i>=0) {
                    if ($resultado[0]["CalTotal"] == 40 && count($resultadoEF)==0 && $contenido_fin<0) {
                    echo '<center><a href="examenModulo1.php" class="btn btn-primary btn-lg">EVALUACIÓN FINAL</a></center>'; 
                    
                }
                        





                        ?>

                                                                                                                                                                                        

    