<?php

require_once __DIR__ . "../../classes/Livro.php";
require_once __DIR__ . "../../dao/daoLivro.php";

$nome = $_POST['nome_livro'];
$autor = $_POST['autor_livro'];
$estoque = $_POST['estoque_livro'];
$categoria = $_POST['fk_id_categoria'];
$descricao = $_POST['descricao_livro'];

$nomeImagem = $_FILES['capa_livro']['name'];
$tmpImagem = $_FILES['capa_livro']['tmp_name'];
$caminhoImagem = "../view/livro/capas/" . basename($nomeImagem);


if (!$nome || !$autor || !$estoque || !$descricao || !$nomeImagem) {
    header("Location: ../view/livro/form_livro.php");
    exit;
}

move_uploaded_file($tmpImagem, $caminhoImagem);



$livro = new Livro($nome, $autor, $categoria, $estoque, $descricao, $caminhoImagem);

$livroDao = new daoLivro($conexao);
$livroDao->insert($livro);