<?php

require_once __DIR__ . "../../classes/Categoria.php";
require_once __DIR__ . "../../dao/daoCategoria.php";

$nome = $_POST['nome_categoria'];

$categoriaDao = new daoCategoria($conexao);

if(!$nome){
    header("Location: ../view/categoria/form_categoria.php");   
}else{
    $categoria = new Categoria($nome);
    $categoriaDao->insert($categoria);
}