<?php
session_start();

if($_SESSION['usuario']===null){
    header("Location:src/view/login/form_loginUsuario.php");
    exit;
}

if($_SESSION['usuario']==="admin sistema"){
    header("Location:src/view/painel_adm/painel_adm.php");
}else{
    header("Location:src/view/inicial.php");
}


