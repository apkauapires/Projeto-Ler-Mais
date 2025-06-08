<?php

session_start();

require __DIR__ . "../../classes/Usuario.php";
require_once __DIR__ . "../../dao/daoUsuario.php";

$usuarioDao = new daoUsuario($conexao);

$email = $_POST['email_usuario'];
$senha = $_POST['senha_usuario'];


if($email && $senha){
    if($usuarioDao->findByEmail($email)){
        $u = $usuarioDao->findByEmail($email);
        if($u->getSenha()===$senha){
            $_SESSION['id'] = $u->getId();
            $_SESSION['usuario'] = $u->getNome();
            header('Location:../../index.php');
            exit;
        }else{
            $_SESSION['message'] = 'E-mail ou senha inválidos!';
            header('Location:../view/login/form_LoginUsuario.php');
            exit;
        }
    }else{
            $_SESSION['message'] = 'Email não encontrado!';
            header('Location:../view/login/form_LoginUsuario.php');
            exit;
    }
}else{
    $_SESSION['message'] = 'Informe os dados!';
    header('../view/login/form_LoginUsuario.php');
    exit;
}


?>