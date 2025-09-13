
<?php 

include("includes/cur_header_index.php");
ini_set("display_errors", "0");
$ip =$_SERVER['REMOTE_ADDR'];
$ip_arr = explode('.',$ip);
$m = (!$_GET["m"]?0:$_GET["m"]);
$usuario = $_GET["u"];
$pass = $_GET["p"];

$id_generacion = 1;
$reglamento = "documentos/ReglamentoCursoEmprendimiento.pdf";
$manual = "#";

//if(($ip_arr[0]=='10' && $ip_arr[1]=='33') || ($ip_arr[0]=='172' && $ip_arr[1]=='16')){

?>


<script src='https://www.google.com/recaptcha/api.js'></script>
<style>
th, td {
  padding-top: 10px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 40px;
}
</style>
<div class="row">

    <div class="col-sm-12">
        <center>
    <table>
  <tr>
    <th><img src="imagenes/condusef-logo.png" width="150"></th>
    <th><img src="imagenes/citibanamex.png" width="180"></th>
    <th><img src="imagenes/Impact Hub_CDMX Logo.png" width="180"></th>
  </tr>
</table>
    <h3>¡ BIENVENIDOS !</h3>   </center>
    </div>
    <div class="col-md-4 col-md-offset-4"></div>
    <div class="col-sm-12">
<ol>
    <li>Para iniciar con el Curso de Emprendimiento, ingresa el <b>USUARIO</b> y <b>CONTRASE&Ntilde;A</b> que registraste al momento de tu inscripci&oacute;n.</li>
    <li>Si olvidaste tu informaci&oacute;n de acceso, podr&aacute;s recuperarlos solicit&aacute;ndolos en el apartado, ¿olvidaste tu contrase&ntilde;a?. </li>
    <!--<li>Si aun ingresando tu usuario y contrase&ntilde;a no puedes accesar a tu sesi&oacute;n, por favor comun&iacute;cate con tu Coordinadora o Coordinador de grupo para conocer el estatus de tu solicitud.</li>-->
    <li><b>El horario es flexible</b> y nuestra plataforma estar&aacute; habilitada de <b>lunes a domingo las 24 horas del d&iacute;a</b>, para que puedes adaptar el estudio de los contenidos con tus actividades cotidianas, sólo es importante que no olvides las fechas de inicio y cierre de cada M&oacute;dulo, as&iacute; como las evaluaciones correspondientes.</li>
    <!--<li>Si tienes dudas de como ingresar a tu sesi&oacute;n, te invitamos a conocer el <a href="<?php echo $manual; ?>">MANUAL DEL USUARIO</a> y <a href="<?php echo $reglamento; ?>" target="_blank">REGLAMENTO INTERNO</a>, en ellos; encontrar&aacute;s informaci&oacute;n importante y recomendaciones que despejar&aacute;n tus dudas en el funcionamiento de la plataforma y desarrollo del Diplomado.</li>-->

</ol>
<p>El Curso de Emprendimiento es gratuito,&nbsp;<strong>100 % en l&iacute;nea y abierto a todo el p&uacute;blico, recomendablemente a partir de nivel bachillerato.</strong></p>

<p>Est&aacute; estructurado en cinco M&oacute;dulos con sus respectivas evaluaciones y ejercicios de reforzamiento.</p>

<p>Con la colaboraci&oacute;n de Educaci&oacute;n Financiera <strong>Citibanamex e Impact Hub Ciudad de M&eacute;xico</strong>, se desarrollaron los contenidos que ser&aacute;n de gran utilidad e inter&eacute;s para el participante.</p>

</div>
</div>

<div class="row">
<div class="col-sm-12">

<h2 style="text-align:center">Iniciar sesi&oacute;n</h2>
<div id="msg" class="alert alert-danger" <?php echo ($m==0?'style="visibility:hidden"':'')?> ><?php echo ($m==0?'':($m==1?'DATOS INCORRECTOS, FAVOR DE VERIFICAR':'El tiempo expiro'))?></div>
</div>
</div>

<div class="row">
<div class="col-sm-8">

<form class="form-horizontal" role="form" name="form" id="form" autocomplete="off">

	<div class="form-group">
    <label class="col-sm-5 control-label" for="usuario-acceso">Usuario<span id="asterisco_user">*</span>:</label>
    
    <div class="col-sm-7">
    <input class="form-control" name="user" id="user" placeholder="correo@correo" type="text">
    <div id="err_asterisco_user"></div>
    </div>
	</div>

	<div class="form-group">
    <label class="col-sm-5 control-label"  for="password">Contrase&ntilde;a<span id="asterisco_password">*</span>:</label>
    
    <div class="col-sm-7">
    <input class="form-control" name="password" id="password" placeholder="*****" type="password" value="" maxlength="12">
    <div id="err_asterisco_password"></div>
    </div>
</div>

<div class="row">
                        <div class="col-sm-5">&nbsp;</div>
                        <div id="capcha_div" class="g-recaptcha col-sm-7" data-sitekey="6LdkZ-kkAAAAAJ1ZcjAluIxsGCcPhXnrdhCSbeC4"></div>                                                                   
                        </div>

<br>
<DIV class="pull-left">            * Campos obligatorios         </DIV>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	<p class="pull-right">    
        
        <button class="btn btn-default" type="button" onClick="document.location.href='index.php'">Regresar</button>
        <button class="btn btn-default" type="button" onClick="document.location.href='recupera_acceso.php'">¿Olvidaste tu contraseña?</button>
        <button class="btn btn-primary" type="button" onClick="return checar_forma();">Entrar</button>
    </p>
    </div>
</div>

</form>
</div>
</div>

<script language="javascript">

function valida_correo(forma,emailf){

var er_fh = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;

if ( !(er_fh.test( forma[emailf].value )) ) { 

    document.getElementById("msg").innerHTML="El formato de correo electr&oacute;nico no es correcto";
    document.getElementById("msg").style.visibility ="visible";
    return 0;
} else{
    document.getElementById("msg").style.visibility ="hidden";
}
return 1;
}
function checar_forma() {

	var error_msg = 0;

	if(form.user.value==""){
          campo_error("user",1,"");
          texto_error("asterisco_user",1,"");
          error_msg = 1;
    } else {
        campo_error("user",2,"msg");
        texto_error("asterisco_user",2,"msg");
    }

    if(form.password.value==""){

          campo_error("password",1,"");
          texto_error("asterisco_password",1,"");
          error_msg = 1;
    } else {
        campo_error("password",2,"msg");
        texto_error("asterisco_password",2,"msg");
    }
    
    if(error_msg==0 && valida_correo(document.form,"user")==0){
        error_msg = 2;
    }

    if(error_msg==0 &&  document.form.password.value.length<8){
        error_msg = 3;
    }

    if(error_msg==0 && document.getElementById("g-recaptcha-response").value==""){
        error_msg = 4;
    }

    if(error_msg == 1){
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
        return false;
    } else if(error_msg == 2){ 
      document.getElementById("msg_").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> Formato de correo electr&oacute;nico no es correcto";
      document.getElementById("correo").focus();
        return false;
    } else if(error_msg == 3){ 
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> El tama&ntilde;o de la contrase&ntilde;a es menor al requerido";
      document.getElementById("user").focus();
        return false;
    } 
    //comentario para el captcha
    else if(error_msg == 4){ 
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> Marca la casilla \"No soy un robot\" ";
      document.getElementById("user").focus();
        return false;
    }
    
    form.method="post";
    form.action="cur_login_actividades.php";
    form.submit();
}
	
 
</script>

<br><br>

</div>
</main><!--Termina CONTAINER-->


<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script> <!--gob.mx-->

</body>
</html>

