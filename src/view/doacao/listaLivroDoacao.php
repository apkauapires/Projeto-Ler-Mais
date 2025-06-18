<?php
    require __DIR__ . "../../../dao/daoLivro.php";

    $l = new daoLivro($conexao);
    $livros = $l->buscarLivroPorNome($_POST['nome_livro']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../components/style-listarAlugueis.css">
    <title>Doaçoes</title>
</head>
<body>
    <a href="index.php?navegation=1" class="sair_button">
        Voltar
    </a>
    <div>
        <form action = "src/view/aluguel/listarAlugueisPorUsuario.php" method="post">
            <label for="nome"></label>
            <h1 class="cabeçalho">Selecione o livro que voce quer receber</h1>
        </form>    
        <table>
            <thead>
                <tr>
                <th width="220" class="tnomeUsuario">Nome do livro</th>
                <th width="220" class="tdata">Autor</th>
                <th width="220" class="tdata">Estoque atual</th>
                <th width="220">Doar</th>
                </tr>
                </thead>
                <tbody>
                <br><br>
                <?php foreach($livros as $li): ?>
                <tr>
                    <td><?php echo $li['nome_livro']; ?></td>
                    <td><?php echo $li['autor_livro']; ?></td>
                    <td><?php echo $li['estoque_livro']; ?></td>
                    <td><a href = "../../controllers/receberDoacao.php?id=<?= $_POST['id_doacao'] ?>" class="baixarAlu">Receber</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
</body>
</html>