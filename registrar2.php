<?php
ini_set("display_errors", "1");
    session_start();
    $_SESSION["user"]=$_POST["correo"];

    $inicio = 2;
    //mktime(date("H"),0,0,date("m"),date("d"),date("Y")) - mktime(7,0,0,9,22,2024);

if($inicio>=0){
?>
<script> 	//window.location ='index.php';     </script>
<?php } 
    
    require_once ("includes/conexion.php");
    $nombre=strip_tags($_POST['nombre']);
    $apaterno=strip_tags($_POST['apaterno']);
    $amaterno=strip_tags($_POST['amaterno']);
    $correo=strip_tags($_POST['correo']);
    $correo2=strip_tags($_POST['correo2']);
    $pass=strip_tags(trim($_POST['pass']));
    $telefono=strip_tags(trim($_POST['telefono']));   
    $sexo=strip_tags($_POST['sexo']);
    //$tCand=strip_tags($_POST['tCand']);
    //$nEst=strip_tags($_POST['nEst']);
    $estado=strip_tags($_POST['estado']);
    $grupo=1;
    $gen=1;
    $edad=strip_tags($_POST['edad']);
    $info=strip_tags($_POST['info']);
  
    if(empty($nombre)){
      $mensaje = "Debes propocionar un nombre";
    }
    if(empty($apaterno)){
      $mensaje="Debes proporcionar un apellido Paterno";
    }
    if(empty($amaterno)){
      $mensaje="Debes proporcionar un apellido Materno";
    }

   if(empty($telefono)){
      $mensaje="Debes proporcionar un Número de telefono";
    }

    if(empty($sexo)){
      $mensaje="Debes seleccionar el sexo";
    }

    /*if(empty($tCand)){ 
      $mensaje="Proporciona el tipo de candidato";
    }
    
    if(empty($nEst)){
      $mensaje="Proporciona el nivel de estudios";
    }*/
    
    if(empty($estado)){
      $mensaje="Proporciona el nivel de estudios";
    }
    if(empty($edad)){
      $mensaje="Proporciona tu edad";
    }
        
    if(empty($pass)){
      $mensaje="Debes proporcionar un password";
    }
    
    if($_POST["correo"] != $_POST["correo2"]) {
      $mensaje="El correo no coincide";
      
    }  
     else{
      $verifica = Conexion::conectar()->prepare("SELECT * FROM alumno WHERE correo = :correo and registros=1");
      $verifica->bindParam(':correo', $correo, PDO::PARAM_STR);
      $verifica->execute();
      $total = $verifica->rowCount();
      $row = $verifica->fetch();
     
      
      if ($total ==1) {
        
        $query = Conexion::conectar()->prepare("INSERT INTO alumno(nombre, apaterno, amaterno, correo, pass, telefono,  sexo, estado, edad, idGrupo, idGeneracion, informacion, registros)
                                                VALUES (:nom, :apat, :amat, :correo, :pass, :tel, :sex, :estado, :edad, :idGrupo, :gen, :info, 2)" );
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
  
        $query = Conexion::conectar()->prepare("SELECT * FROM alumno WHERE nombre=:nom" );
        $query->bindParam(':nom', $nombre, PDO::PARAM_STR);
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
        /*echo"<b><br>Es importante comunicarte sino recibes en las próximas 24 horas el correo de registro exitoso, no será inconveniente para cursar el Curso el  22 de septiembre, ya que el correo es meramente informativo, con que tengas a la mano tu usuario (correo electrónico registrado) y contraseña podrás ingresar a la plataforma. Si por algún motivo no puedes ingresar a tu sesión una
        vez iniciado el Curso, ponte en contacto con tu Coordinador(a) de grupo para conocer el estatus de tu solicitud.<b><br>";*/
        echo "<b><br>Liga de acceso a la plataforma:</b> https://emprendimiento.condusef.gob.mx/ ";
        echo "<center><b><br>¡Gracias por inscribirte al Curso de Emprendimiento!</b></center> ";
        echo "<center><b><br>DIRECCIÓN DE FOMENTO AL DESARROLLO DE CAPACIDADES FINANCIERAS</b></center> ";
      } 
   
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
  
  
  </div>';
  }
  require("funcion_reg.php");
  ?>
  </div>
  <div class="container">
  <center><a href="index.php"><button type="button" class="btn btn-primary">Regresar</button></a></center>
  </div>
  <div>&nbsp;</div>
   <div>&nbsp;</div>
  <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
  <script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
  </body>
  </html>
  
