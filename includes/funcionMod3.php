<?php
$mod3= Conexion::conectar()->prepare("SELECT Sum(Calificacion) CalTotal from( SELECT sum(Calificacion) Calificacion from actividad1_m3 WHERE actividad1_m3.idAlumno=$idAl union all 
         SELECT sum(Calificacion) from actividad2_m3 WHERE actividad2_m3.idAlumno=$idAl union all SELECT sum(Calificacion) from actividad3_m3 WHERE actividad3_m3.idAlumno=$idAl union all 
         SELECT sum(Calificacion) from actividad4_m3 WHERE actividad4_m3.idAlumno=$idAl union all SELECT sum(Calificacion) from examen_m3 WHERE examen_m3.idAlumno=$idAl) as Total");
        $mod3->execute();
        $resultadoMod3 = $mod3->fetchAll(PDO::FETCH_ASSOC);
        $calMod3=$resultadoMod3[0]["CalTotal"];

    $exm3=Conexion::conectar()->prepare("SELECT idAlumno FROM `examen_m3` WHERE idAlumno=$idAl");
    $exm3->execute();
    $resultadoexm3 = $exm3->fetchAll(PDO::FETCH_ASSOC);
        $calexm3=$resultadoexm3[0]["idAlumno"];

        ?>