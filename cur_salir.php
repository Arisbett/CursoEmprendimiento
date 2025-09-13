<?php
session_start();
unset($_SESSION["nombre"], $_SESSION["idGrupo"], $_SESSION["autentificado"]);
session_destroy();
header("Location: cur_login.php");
?>