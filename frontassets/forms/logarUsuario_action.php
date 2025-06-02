<?php

session_start();

require __DIR__ . "/../../classes/Usuario.php";
require __DIR__ . "/../../dao/UsuarioDaoMysql.php";
require __DIR__ . "/../../config.php";

$usuarioDao = new UsuarioDaoMysql($conexao);

$email = $_POST['email_usuario'];
$senha = $_POST['senha_usuario'];


if($email && $senha){
    if($usuarioDao->findByEmail($email)){
        $u = $usuarioDao->findByEmail($email);
        if($u->getSenha()===$senha){
            $_SESSION['usuario'] = $u->getNome();
            header('Location:../../index.php');
            exit;
        }else{
            $_SESSION['message'] = 'E-mail ou senha inválidos!';
            header('Location:form_LoginUsuario.php');
            exit;
        }
    }else{
            $_SESSION['message'] = 'Email não encontrado!';
            header('Location:form_LoginUsuario.php');
            exit;
    }
}else{
    $_SESSION['message'] = 'Informe os dados!';
    header('Location:form_LoginUsuario.php');
    exit;
}


?>