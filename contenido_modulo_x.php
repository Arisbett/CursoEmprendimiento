<?php  ini_set("display_errors", "1");
error_reporting(E_ALL);
include ("includes/cur_header.php");

require ("includes/conexion.php");
$db = new Conexion();
$con = $db->conectar();
$id_modulo = 1;

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
                                        <div class="panel-body"><div id='avance<?php echo $contador; ?>'>xx</div><?php //echo $row["contenido"]; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            if($row["id_subtema"]==4)
                                echo '<a href="actividad1.php"><button type="button" class="btn btn-primary">Actividad</button></a>';
                            else if($row["id_subtema"]==13)
                                echo '<a href="actividad2.php"><button type="button" class="btn btn-primary">Actividad</button></a>';
                            else if($row["id_subtema"]==24)
                                echo '<a href="actividad3.php"><button type="button" class="btn btn-primary">Actividad</button></a>';
                            else if($row["id_subtema"]==21)
                                    echo '<a href="actividad4.php"><button type="button" class="btn btn-primary">Actividad</button></a>';
                                
                            
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
                      
                if ($resultado[0]["CalTotal"] == 40 && count($resultadoEF)==0) {
                    echo '<center><a href="examenModulo1.php" class="btn btn-primary">Éxamen Final</a></center>'; 
                    
                }
                        

                include ("includes/cur_footer.php");



                        ?>

                                                                                                                                                                                         

    