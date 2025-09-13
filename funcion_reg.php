
<?php

      if ($total == 0) {
       
     
        $query = Conexion::conectar()->prepare("INSERT INTO alumno(nombre, apaterno, amaterno, correo, pass, telefono, sexo, estado, edad, idGrupo, idGeneracion, informacion, registros)
                                                VALUES (:nom, :apat, :amat, :correo, :pass, :tel,  :sex, :estado, :edad, :idGrupo, :gen, :info, 1)" );
        $query->bindParam(':nom', $nombre, PDO::PARAM_STR);
        $query->bindParam(':apat', $apaterno, PDO::PARAM_STR);
        $query->bindParam(':amat', $amaterno, PDO::PARAM_STR);
        $query->bindParam(':correo',$correo, PDO::PARAM_STR);
        $query->bindParam(':pass', $pass, PDO::PARAM_STR);
        $query->bindParam(':tel', $telefono, PDO::PARAM_STR);
        //$query->bindParam(':fecnac', $fnacimiento, PDO::PARAM_STR);
        $query->bindParam(':sex', $sexo, PDO::PARAM_STR);
        //$query->bindParam(':falta', $falta, PDO::PARAM_STR);
        //$query->bindParam(':tCand', $tCand, PDO::PARAM_STR);
        //$query->bindParam(':nEst', $nEst, PDO::PARAM_STR);
        $query->bindParam(':estado', $estado, PDO::PARAM_STR);
        $query->bindParam(':edad', $edad, PDO::PARAM_STR);
        $query->bindParam(':idGrupo', $grupo, PDO::PARAM_STR);
        $query->bindParam(':gen', $gen, PDO::PARAM_STR);
        $query->bindParam(':info', $info, PDO::PARAM_STR);
       //$query->bindParam(':reg', $reg, PDO::PARAM_STR);

        $query->execute();
  
        $query = Conexion::conectar()->prepare("SELECT * FROM alumno WHERE correo=:correo" );
        $query->bindParam(':correo', $correo, PDO::PARAM_STR);
        $query->execute();
  
        $row = $query->fetch();
        $idAlumno=$row['idAlumno'];
              
        ?>
   <!DOCTYPE html>
   <html lang="es">
  
   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Curso Emprendedores</title>
       <!-- CSS -->
       <link href="/favicon.ico" rel="shortcut icon">
       <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
       <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">
   </head>
   <body>
   <div>&nbsp;</div>
   <div>&nbsp;</div>
   <div class="container">
   <center>
  
  <div class="col-md-12">
           <img src="imagenes/logo-emprendimiento.jpg" alt="" class="img-responsive" width="350" style="vertical-align:middle">
           </div>
   </center>
   <?php
        echo "<b>$nombre $apaterno $amaterno </b> ";
        echo "<br>La Comisión Nacional para Protección y Defensa de los Usuarios de Servicios Financieros, agradece tu interés en participar en el <b>“Curso de Emprendimiento”.</b></br>";
        echo "<br>Te recordamos que los datos que registraste para ingresar a tu sesión son:</br>";
        echo "<b><br>Correo registrado:</b> $correo </br> ";
        echo "<b><br>Contraseña:</b> $pass ";
        //echo "<b><br>Liga de acceso a la plataforma:</b> https://emprendimiento.condusef.gob.mx/ ";
        /*echo"<b><br>Es importante comunicarte sino recibes en las próximas 24 horas el correo de registro exitoso, no será inconveniente para cursar el Diplomado el  22 de septiembre, ya que el correo es meramente informativo, con que tengas a la mano tu usuario (correo electrónico registrado) y contraseña podrás ingresar a la plataforma. Si por algún motivo no puedes ingresar a tu sesión una
        vez iniciado el diplomado, ponte en contacto con tu Coordinador(a) de grupo para conocer el estatus de tu solicitud.<b><br>";*/
        echo "<b><br>Liga de acceso a la plataforma:</b> https://emprendimiento.condusef.gob.mx/ ";
        echo "<center><b><br>¡Gracias por inscribirte al Curso de Emprendimiento!</b></center> ";
        echo "<center><b><br>DIRECCIÓN DE FOMENTO AL DESARROLLO DE CAPACIDADES FINANCIERAS</b></center> ";
      } 
    
  
  if(empty($idAlumno)) {
  echo '<html lang="es">
  
   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Curso</title>
       <!-- CSS -->
       <link href="/favicon.ico" rel="shortcut icon">
       <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
       <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">
   </head>
   <body>
   <div>&nbsp;</div>
   <div>&nbsp;</div>
   <div class="container"><div class="row">
      <div class="col-sm-8">
  

      </div>
  </div>';
  }
  ?>
  </div>
  <div class="container">
 
  </div>
  <div>&nbsp;</div>
   <div>&nbsp;</div>
  <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
  <script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
  </body>
  </html>


