<?php
session_start();

if($_SESSION['usuario']===null){
    header("Location:frontassets/forms/form_loginUsuario.php");
    exit;
}else{
    echo 'Bem vindo '.$_SESSION['usuario'];
}
?>

<br>
<br>

<a href="frontassets/forms/logoutUsuario_action.php">Sair</a></p>


