<?php
/*ini_set("display_errors", "1");
error_reporting(E_ALL);*/
include ("includes/funciones.php");

 $cextranio = 0;
$permitidos = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_@.#()¡!¿?;$&/*+,%:<>";
foreach ($_POST as $keyy => &$vall) {echo '<br>'.substr($val,$i,1).' '.strpos($permitidos, substr($val,$i,1));
 if($keyy!="g-recaptcha-response"){
    for ($i=0; $i<strlen($vall); $i++){ 
      if (strpos($permitidos, substr($vall,$i,1))===false){ 
        $cextranio = 1;
        break;
      }
    }
  }
}

$secret = "6LdkZ-kkAAAAAKuRe7ZskwEpJ2x2NRmsr7Sh6TW6";
$ip = $_SERVER['REMOTE_ADDR'];
$captcha = $_POST['g-recaptcha-response'];
$rsp = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$ip);
$arr = json_decode($rsp,true);
//Aquí esta el comentario para el captcha
if($arr["success"]==false) $cextranio=1;
//echo '>'.$cextranio;
if($cextranio==0){

$usuario = trim($_POST["user"]?$_POST["user"]:"");
$usuario = strip_tags(filter_var($usuario, FILTER_SANITIZE_EMAIL));

$pswd = trim($_POST["password"]?$_POST["password"]:"");
$pswd = strip_tags(filter_var($pswd, FILTER_SANITIZE_STRING));

//print "$usuario && $pswd";
if($usuario && $pswd){ 
  
    //$info= detect();

    $id_generacion = 1;
//echo "c.nombreUniv_Inst,c.imagen,a.idGrupo,a.idAlumno,upper(a.nombre) as nombre,upper(a.apaterno) as apaterno,upper(a.amaterno) as amaterno from alumno a,grupo c,expedientes d where  c.idGrupo=a.idGrupo AND a.idAlumno=d.id_alumno and d.autorizado='1' and d.id_generacion=$id_generacion and a.autorizado='1' AND TRIM(a.correo)='$usuario' and TRIM(a.pass)='$pswd'";
    //$info_usuario = select("c.nombreUniv_Inst,upper(a.nombre) as nombre,upper(a.apaterno) as apaterno,upper(a.amaterno) as amaterno", "alumno a,grupo c", " c.idGrupo=a.idGrupo and a.autorizado='1' AND TRIM(a.correo)='$usuario' and TRIM(a.pass)='$pswd'", "");
    $info_usuario = select("c.nombreUniv_Inst,a.idGrupo,a.idAlumno,upper(a.nombre) as nombre,upper(a.apaterno) as apaterno,upper(a.amaterno) as amaterno, upper(a.registros) as registros", "alumno a,grupo c", " c.idGrupo=a.idGrupo and a.autorizado='1' AND TRIM(a.correo)='$usuario' and TRIM(a.pass)='$pswd'", "");
    $id_alumno=$info_usuario[0]["idAlumno"];
    $id_grupo = $info_usuario[0]["idGrupo"];
    $nombre = $info_usuario[0]["nombre"].' '.$info_usuario[0]["apaterno"].' '.$info_usuario[0]["amaterno"];
    $nombre_grupo = $info_usuario[0]["nombreUniv_Inst"];
    $imagen_grupo = $info_usuario[0]["imagen"];
//var_export($info_usuario);

    $generacion = select("*", "generaciones", "generacion=$id_generacion", "");
    
    if($id_alumno>0){

        session_start();
        $_SESSION["autentificado"] 	= "SI";
        $_SESSION["idAlumno"] = $id_alumno;
        $_SESSION["nombre"] 		= $nombre;
        $_SESSION["idGrupo"]   	  = $id_grupo;
        $_SESSION["nombre_grupo"]       = $nombre_grupo;
        $_SESSION["fecha_inicio"]    = "2023-01-02"; 
        $_SESSION["fecha_fin"]    = "2023-12-13";
        $_SESSION["id_generacion"]  =   $id_generacion;
        /*$_SESSION["mod1_inicio"] = $generacion[0]["mod1_inicio"];
        $_SESSION["mod1_fin"] = $generacion[0]["mod1_fin"];
        $_SESSION["evaluacion1_inicio"] = $generacion[0]["evaluacion1_inicio"];
        $_SESSION["evaluacion1_fin"] = $generacion[0]["evaluacion1_fin"];
        $_SESSION["mod2_inicio"] = $generacion[0]["mod2_inicio"];
        $_SESSION["mod2_fin"] = $generacion[0]["mod2_fin"];
        $_SESSION["evaluacion2_inicio"] = $generacion[0]["evaluacion2_inicio"];
        $_SESSION["evaluacion2_fin"] = $generacion[0]["evaluacion2_fin"];
        $_SESSION["mod3_inicio"] = $generacion[0]["mod3_inicio"];
        $_SESSION["mod3_fin"] = $generacion[0]["mod3_fin"];
        $_SESSION["evaluacion3_inicio"] = $generacion[0]["evaluacion3_inicio"];
        $_SESSION["evaluacion3_fin"] = $generacion[0]["evaluacion3_fin"]; */
        $_SESSION["registros"] = $registros;    


        inserti(array("iis",$id_alumno,$id_grupo,$nombre),"tiradas_login_alumnos", "id_alumno,id_grupo,nombre", "?,?,?");
        
        //diagnostico
        /*$diagnostico = select("IdExamDiag,fecha_registro", "examendiag", "idAlumno=$id_alumno and id_generacion=$id_generacion", "");
        if($diagnostico[0]["IdExamDiag"]>0)
        $_SESSION["ExamDiag".$id_alumno]= 1;
        else
        $_SESSION["ExamDiag".$id_alumno]= 0;*/
 
        header("Location: Modulos.php");

    }  else {
         //echo "no hay alumno"; 
         header("Location: cur_login.php?m=1"); 
        }    

    }  else {
            //echo "no hay usuario y pass"; 
            header("Location: cur_login.php"); 
           }
 } //end extranio
 else  { 
    //echo "extraño"; 
    header("Location: cur_login.php?m=2"); 
}

?>