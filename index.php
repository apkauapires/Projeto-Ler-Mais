<?php
session_start();

if($_SESSION['usuario']===null){
    header("Location:frontassets/forms/form_inserirUsuario.html");
}

?>