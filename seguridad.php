<?php

session_start();
if (verifica_pass($pswd,$_SESSION['token']))
{
    header("Location:index.php");
    exit();
}

?>

