<?php
require_once __DIR__ . "../../dao/daLivroAluguel.php";

$daoAluguel = new daoAluguel($conexao);

$id = $_GET['id_aluguel'];

$daoAluguel->baixarAluguel($id);

header("Location: ../view/aluguel/listarAlugueis.php");



?>
