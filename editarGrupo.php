<?php
 require_once ("includes/conexion.php");

 if (isset($_POST['id'])) {
  $id=strip_tags(htmlentities($_POST['id']));
  $estado=strip_tags(htmlentities($_POST['estado']));
 $municipio=strip_tags(htmlentities($_POST['municipio']));
 $nombreUn=strip_tags(htmlentities($_POST['nombreUn']));
 $sigla=strip_tags(htmlentities($_POST['sigla']));
 $numLug=strip_tags(htmlentities($_POST['numLug']));
 $nomCoor=strip_tags(htmlentities($_POST['nomCoor']));
 $puesto=strip_tags(htmlentities($_POST['puesto']));
 $correo=strip_tags(htmlentities($_POST['correo']));
 $correo2=strip_tags(htmlentities($_POST['correo2']));
 $tel=strip_tags(htmlentities($_POST['tel']));
 $nombCoS=strip_tags(htmlentities($_POST['nombCoS']));   
 $puestoS=strip_tags(htmlentities($_POST['puestoS']));
 $correoS=strip_tags(htmlentities($_POST['correoS']));
 $telS=strip_tags(htmlentities($_POST['telS']));
 $pass=strip_tags(htmlentities($_POST['pass']));
 #$imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
 $password2=strip_tags(htmlentities($_POST['password2']));
 $falta=date('d-m-Y');

 if(empty($estado)){
  echo '<script>alert("Debes propocionar un Estado")';
  #header ('location:registro.php');
  echo '</script>';
 }
 if(empty($municipio)){
  echo '<script>alert("Debes proporcionar un Municipio")';
  #header ('location:registro.php');
  echo '</script>';
 }
 if(empty($nombreUn)){
  echo '<script>alert("Debes proporcionar la universidad o la institución")';
  #header ('location:registro.php');
  echo '</script>';
 }
 if(empty($sigla)){
  echo '<script>alert("Debes proporcionar las siglas")';
  #header ('location:registro.php');
  echo '</script>';
 }
 
 if(empty($numLug)){
  echo '<script>alert("Agrega el número de lugares")';
  #header ('location:registro.php');
  echo '</script>';
 }

 if(empty($puesto)){
  echo '<script>alert("Debes proporcionar un puesto")';
  #header ('location:registro.php');
  echo '</script>';
 }
 if(empty($correo)){
  echo '<script>alert("Debes proporcionar un correo")';
  #header ('location:registro.php');
  echo '</script>'; }
 if(empty($correo2)){
  echo '<script>alert("Debe confirmar el correo")';
  #header ('location:registro.php');
  echo '</script>';
 }
 if(empty($tel)){
  echo '<script>alert("Debes proporcionar un teléfono")';
  #header ('location:registro.php');
  echo '</script>';
 }
 if(empty($nombCoS)){
  echo '<script>alert("Proporciona el el nombre del Coordinador Suplente")';
  #header ('location:registro.php');
  echo '</script>';
 }
 if(empty($puestoS)){
  echo '<script>alert("Proporciona el puestoto del Coordinador Suplente")';
  #header ('location:registro.php');
  echo '</script>';
 }
 if(empty($correoS)){
   echo '<script>alert("Proporciona el correo del Coordinador Suplente")';
   #header ('location:registro.php');
   echo '</script>';
  }
 if(empty($telS)){
  echo '<script>alert("Debes proporcionar un número teléfonico ")';
  #header ('location:registro.php');
  echo '</script>';
 }
 if(empty($pass )){
  echo '<script>alert("Debes proporcionar un password")';
  #header ('location:registro.php');
  echo '</script>';
 }
 if(empty($password2)){
  echo '<script>alert("Debes de Validar el passowrd")';
  #header ('location:registro.php');
  echo '</script>';
 }
if($pass != $password2 ){
echo'<script>alert("El Password proporcionado es diferente")';
#header ('location:registro.php');
echo '</script>';
}

if($correo != $correo2 ){
  echo'<script>alert("El correo proporcionado es diferente")';
  #header ('location:registro.php');
  echo '</script>';
  } 
  
  $query = Conexion::conectar()->prepare("UPDATE grupo SET estado =?, municipio =?, nombreUniv_Inst =?, 
  siglas =?, numeroLugares =?, nombreCoordinador =?, puesto =?, correo =?, telefono =?,
   nombreCoordinadorSuplente =?, correoSuplente =?, telefonoSuplente =?, puestoSuplente =? WHERE grupo idGrupo =?");
   $resultado = $query->execute(array($estado, $municipio, $nombreUn, $sigla, $numLug, $nomCoor, $puesto, $correo, $tel, 
   $nombCoS,$correoS, $telS, $puestoS, $id));

   if ($resultado) {
    $correcto = true;
   }
   header ('location:MenuAdmin.php');
  }
   ?>