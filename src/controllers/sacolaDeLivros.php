<?php
    session_start();

    if (!isset($_SESSION['sacola'])) {
        $_SESSION['sacola'] = [];
    }
    $id_livro = $_POST['id_livro'];
    // Dados recebidos
        $src_img = $_POST['img'] ?? 'default.jpg';
        $id_livro = $_POST['id_livro'] ?? null;
        $titulo = $_POST['titulo'] ?? 'Livro desconhecido';

    if ($id_livro !== null) {
    // Verifica se o livro já está na sacola
        if (!isset($_SESSION['sacola'][$id_livro])) {
                $_SESSION['sacola'][$id_livro] = [
                    'src_img' => $src_img,
                    'titulo' => $titulo,
                    'quantidade' => 1
                ];
            } else {
                // Aumenta a quantidade se já estiver na sacola
                $_SESSION['sacola'][$id_livro]['quantidade']++;
            }
    }

    // Redireciona de volta ou para a sacola
        header('Location: ../view/inicial.php');
        exit;
?>