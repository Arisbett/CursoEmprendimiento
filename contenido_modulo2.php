<?php
ini_set("display_errors", "0");
//require ("includes/conexion.php");
$db = new Conexion();
$con = $db->conectar();
$id_modulo = 2;

$idAl=$_SESSION['idAlumno'];
$actividad=$con->query("SELECT intentos FROM `actividad1_m1` WHERE idAlumno=$idAl");
$actividad->execute();
$resultadoA = $actividad->fetchAll(PDO::FETCH_ASSOC);
$intento_actividad1 = $resultadoA[0]["intentos"];

//var_export($intento_actividad1);
echo '<script type="text/javascript" src="js/libreriaAjax.js"></script>';
echo '<h3>M&oacute;dulo II</h3><hr class="red">';

if ($intento_actividad1>=1){
$comando = $con->query("SELECT a.id_tema,a.tema,b.id_subtema,b.subtema,c.titulo,c.contenido,status_contenido
FROM temas a,subtemas b,contenido c
WHERE a.id_tema=b.id_tema AND c.id_subtema=b.id_subtema AND id_modulo=$id_modulo");
                            $comando->execute();
                            $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                            $id_tema = 0;
                            $contador = 1;

                            $idAl=$_SESSION['idAlumno'];
                            $actividad=$con->query("SELECT Calificacion,intentos FROM `actividad1_m2` WHERE idAlumno=$idAl");
                            $actividad->execute();
                            $resultadoA = $actividad->fetchAll(PDO::FETCH_ASSOC);
                            $intentos = $resultadoA[0]["intentos"];
                            $calificacion_actividad1 = $resultadoA[0]["Calificacion"];
                          
                            
                            foreach($resultado AS $row){ //var_export($row);

                                $id_subtema = $row["id_subtema"];
                                 
                                if($id_tema==0 ||  $id_tema != $row["id_tema"]){
                                    echo "<h3 style='color:#fdc52a'>".$row["tema"]."</span></h3>";
                                    
                                }

                            ?>
                            <div class="collapse<?php echo $contador; ?>">
                            <div class="panel-group ficha-collapse" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a data-parent="#accordion" data-toggle="collapse" href="#panel-m<?php echo $contador; ?>" aria-expanded="true" aria-controls="panel-m<?php echo $contador; ?>" onclick="FAjax('alumnoReviso.php','avance<?php echo $contador; ?>','idSub=<?php echo $id_subtema; ?>','POST');">
                                        <?php echo $row["titulo"]; ?>
                                        </a>
                                        </h4>
                                        <button type="button" class="collpase-button collapsed" data-parent="#accordion" data-toggle="collapse" href="#panel-m<?php echo $contador; ?>" onclick="FAjax('alumnoReviso.php','avance<?php echo $contador; ?>','idSub=<?php echo $id_subtema; ?>','POST');"></button>
                                    </div>
                                    <div class="panel-collapse collapse" id="panel-m<?php echo $contador; ?>">
                                        <div class="panel-body"><div id='avance<?php echo $contador; ?>'></div><?php echo $row["contenido"]; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($row["id_subtema"]==9 && $calificacion_actividad2 >= 4) {
                            echo '<div class="alert alert-success"><strong>Evaluación Realizada</strong></div>'; 
                            
                        }else if($row["id_subtema"]==9 && $calificacion_actividad2 < 5){
                            echo '<a href="actividad1_M2.php"><button type="button" class="btn btn-primary">Evaluación</button></a>';

                        }
                        $contador++;
                            $id_tema = $row["id_tema"]; 
                            } 
                        }
                            ?>