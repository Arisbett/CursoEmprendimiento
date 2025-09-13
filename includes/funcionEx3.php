<?php
ini_set("display_errors", "1");
require ("includes/conexion.php");
session_start();

   
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
        //var_dump($calff);

        $modAct=Conexion::conectar()->prepare("SELECT Sum(Calificacion) CalTotalM1 from ( SELECT sum(Calificacion) Calificacion from actividad_1 WHERE actividad_1.idAlumno=$idAl union all SELECT sum(Calificacion) from actividad_2 WHERE actividad_2.idAlumno=$idAl union all SELECT sum(Calificacion) from actividad_3 WHERE actividad_3.idAlumno=$idAl union all SELECT sum(Calificacion) from actividad_4 WHERE actividad_4.idAlumno=$idAl) as Total");
        $modAct->execute();
        $resultadoSum= $modAct->fetchAll(PDO::FETCH_ASSOC);
        $modActSum=$resultadoSum[0]["CalTotalM1"];

        $m1cal=Conexion::conectar()->prepare("SELECT Calificacion from examen_m1 WHERE examen_m1.idAlumno=$idAl");
        $m1cal->execute();
        $rm1 = $m1cal->fetchAll(PDO::FETCH_ASSOC);
        $rm1ex= $rm1[0]["Calificacion"];
        //var_dump($rm1ex);

        $calFinal=$modActSum+($rm1ex*4);

        $modAct2=Conexion::conectar()->prepare("SELECT Sum(Calificacion) CalTotalM2 from ( SELECT sum(Calificacion) Calificacion from actividad1_m2 WHERE actividad1_m2.idAlumno=$idAl union all SELECT sum(Calificacion) from actividad2_m2 WHERE actividad2_m2.idAlumno=$idAl union all SELECT sum(Calificacion) from actividad3_m2 WHERE actividad3_m2.idAlumno=$idAl union all SELECT sum(Calificacion) from actividad4_m2 WHERE actividad4_m2.idAlumno=$idAl) as Total");
        $modAct2->execute();
        $resultadoSum2= $modAct2->fetchAll(PDO::FETCH_ASSOC);
        $modActSum2=$resultadoSum2[0]["CalTotalM2"];

        $m2cal=Conexion::conectar()->prepare("SELECT Calificacion from examen_m2 WHERE examen_m2.idAlumno=$idAl");
        $m2cal->execute();
        $rm2 = $m2cal->fetchAll(PDO::FETCH_ASSOC);
        $rm2ex= $rm2[0]['Calificacion'];
        //var_export($rm2ex);

        $calFinalM2=$modActSum2+($rm2ex*4);


        $modAct3=Conexion::conectar()->prepare("SELECT Sum(Calificacion) CalTotalM3 from ( SELECT sum(Calificacion) Calificacion from actividad1_m3 WHERE actividad1_m3.idAlumno=$idAl union all SELECT sum(Calificacion) from actividad2_m3 WHERE actividad2_m3.idAlumno=$idAl union all SELECT sum(Calificacion) from actividad3_m3 WHERE actividad3_m3.idAlumno=$idAl union all SELECT sum(Calificacion) from actividad4_m3 WHERE actividad4_m3.idAlumno=$idAl) as Total");
        $modAct3->execute();
        $resultadoSum3= $modAct3->fetchAll(PDO::FETCH_ASSOC);
        $modActSum3=$resultadoSum3[0]["CalTotalM3"];

        $m3cal=Conexion::conectar()->prepare("SELECT Calificacion from examen_m3 WHERE examen_m3.idAlumno=$idAl");
        $m3cal->execute();
        $rm3 = $m3cal->fetchAll(PDO::FETCH_ASSOC);
        $rm3ex= $rm3[0]['Calificacion'];
        //var_export($rm3ex);

        $calFinalM3=$modActSum3+($rm3ex*4);

       
        
        $totalF=round(($calFinal+$calFinalM2+$calFinalM3)/3); 

        /*if ($calff>1) {
            $querym = Conexion::conectar()->prepare("SELECT idAlumno FROM calificacionfinal WHERE idAlumno =:idAl");
            $querym->bindParam(':idAl', $idAl, PDO::PARAM_STR);
            $querym->execute();
            $total = $querym->rowCount();
        
            if ($total>=1) {
                $actualiza=Conexion::conectar()->prepare("UPDATE calificacionfinal SET Calificacion = :totalF WHERE calificacionfinal.idAlumno = :idAl");
                $actualiza->bindParam(':idAl', $idAl, PDO::PARAM_STR);
                $actualiza->bindParam(':totalF', $totalF, PDO::PARAM_STR);
                $actualiza->execute();
            }else{
            $Cal = Conexion::conectar()->prepare("INSERT INTO calificacionfinal( idAlumno, Calificacion) VALUES (:idAl, :totalF)");
            $Cal->bindParam(':idAl', $idAl, PDO::PARAM_STR);
            $Cal->bindParam(':totalF', $totalF, PDO::PARAM_STR);
            $Cal->execute();
            }
        
        }*/
                                               
        
                                                
        /* $querypg = Conexion::conectar()->prepare("SELECT Calificacion FROM calificacionfinal WHERE idAlumno =:idAl");
         $querypg->bindParam(':idAl', $idAl, PDO::PARAM_STR);
         $querypg->execute();
         $resultadofinal = $querypg->fetchAll(PDO::FETCH_ASSOC);
         $final=round($resultadofinal[0]["Calificacion"]);
         
                        
                    if ($final >= 7 ) {
                        echo "<div class=\"alert alert-success\"> ¡Felicidades!, has aprobado el Diplomado en Educación Financiera, Generación 42, por lo que eres acreedor(a) a un 
                        Diploma que sustenta los estudios realizados, el cual podrás descargar desde el MENÚ PRINCIPAL DE TU SESIÓN </div>";  
                    }else{
                        echo "<div class=\"alert alert-warning\">El promedio general para aprobar el Diplomado en Educación Financiera es de 7, 
                        por lo cual no fuiste acreedor(a) al diploma que sustenta los estudios realizados. Te invitamos a inscribirte 
                        en la siguiente generación.</div>";                     
                    }*/
                  

                            
                           
                                        ?>