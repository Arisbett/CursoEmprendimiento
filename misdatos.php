<?php
include("includes/cur_header_index.php");

require ("includes/conexion.php");

$db = new Conexion();
$con = $db->conectar();

$id = $_GET['ida'];
                        $query= $con->prepare("SELECT a.CalificacionFinal, b.nombre, b.apaterno, b.amaterno, b.correo, b.telefono
                        FROM boleta a, alumno b WHERE a.idAlumno=b.idAlumno AND a.idAlumno= :id");
                        $query->execute(['id' => $id]);
                        
                       $resultado = $query->fetch(PDO::FETCH_ASSOC); 

                       $nombre = $resultado['nombre']; 
                       $apaterno = $resultado['apaterno'];
                       $amaterno = $resultado['amaterno'];
                       $cal = $resultado['CalificacionFinal'];
                       $correo = $resultado['correo'];

                        $total = $query->rowCount();
                        
                      
                        if($total>=1){
                         echo '
                         <div class="container">
                         <center>
                         <div class="alert alert-success">Felicidades has terminado el Curso de Emprendimiento, a continuación te mostramos tus datos generales.<br>
                          <strong> Nombre del usuario: '.$nombre.' '. $apaterno.' '. $amaterno.'<br>
                          Calificación Final del Curso: '.$cal.'<br>
                          Correo: '.$correo.'<br>
                          </strong>
                          </div>
                          </center
                          <p class="pull-right"><button class="btn btn-primary" type="button" onClick="document.location.href=\'Modulos.php\'">Regresar</button>
                          </div>

                         
                         ';   
                        }else{
                            echo '<div class="alert alert-info">Lo sentimos, No se encontraron datos</div>
                            <p class="pull-right"><button class="btn btn-primary" type="button" onClick="document.location.href=\'Modulos.php\'">Regresar</button>';
                        }

include("includes/cur_footer.php");

?>