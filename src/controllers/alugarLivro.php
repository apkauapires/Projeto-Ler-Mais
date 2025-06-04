<?php
    require_once __DIR__ . "/../dao/daoLivro.php";
    $id_livro = $_POST['id_livro'];
    $le = new daoLivro($conexao);
    $alugado = $le->buscarLivro($id_livro);
    var_dump($alugado[0]['id_categoria']) ;
    require_once __DIR__ . "../../classes/LivroAluguel.php";
    require __DIR__ . "/../dao/daoLivroAlugel.php";
    $fk_id_usuario = $_SESSION['id_usuario'];
    $fk_id_livros[] = $alugado['id_livro'];
    $data_coleta = date('d-m-Y');
    $daoAluguel = new daoAluguel($conexao);

    if (!$fk_id_usuario || !$fk_id_livro || !$data_coleta) {
        header("Location: ../view/categoria/form_livro.php?error=missing_data");
        exit();
    }else{
        $aluguel = new LivroAluguel(
            $fk_id_usuario,
            $data_coleta,
            $fk_id_livros
        );
        $daoAluguel->insert($aluguel);
    }
