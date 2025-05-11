<?php

session_start();

require __DIR__ . "/../../classes/Usuario.php";
require __DIR__ . "/../../dao/UsuarioDaoMysql.php";
require __DIR__ . "/../../config.php";

$usuarioDao = new UsuarioDaoMysql($conexao);



$nome = $_POST['nome_usuario'];
$email = $_POST['email_usuario'];
$contato = $_POST['contato_usuario'];
$senha = $_POST['senha_usuario'];
$senhaRepeticao = $_POST['repetir_senha'];

if(!$usuarioDao->findByEmail($email)){
    if($senha===$senhaRepeticao){
        $u = new Usuario();
        $u->setNome($nome);
        $u->setEmail($email);
        $u->setContato($contato);
        $u->setSenha($senha);
        $usuarioDao->insert($u);
        $_SESSION['message'] = "Usuario cadastrado com SUCESSO!";
        header("Location: form_inserirUsuario.php");
    }else{
        $_SESSION['message'] = "As senhas NÃO conferem!";
        header("Location: form_inserirUsuario.php");
    }
}else{
    $_SESSION['message'] = "E-mail já cadastrado!";
    header("Location: form_inserirUsuario.php");
}





