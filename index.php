<?php
session_start();

if($_SESSION['usuario']===null){
    header("Location:src/view/login/form_loginUsuario.php");
    exit;
}else{
    echo 'Bem vindo '.$_SESSION['usuario'];
}
?>

<br>
<br>

<a href="src/controllers/deslogarUsuario.php">Sair</a></p>


