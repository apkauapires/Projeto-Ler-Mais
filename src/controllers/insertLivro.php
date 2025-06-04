<?php

require_once __DIR__ . "../../classes/Livro.php";
require_once __DIR__ . "../../dao/daoLivro.php";

$nome = $_POST['nome_livro'];
$autor = $_POST['autor_livro'];
$estoque = $_POST['estoque_livro'];
$categoria = $_POST['fk_id_categoria'];

$livroDao = new daoLivro($conexao);

if(!$nome && $autor && $estoque){
    header("Location: ../view/categoria/form_livro.php");   
}else{
    $livro = new Livro($nome, $autor, $categoria, $estoque);
    $livroDao->insert($livro);
}