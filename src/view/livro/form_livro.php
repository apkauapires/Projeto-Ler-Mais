<?php

require __DIR__ . "/../../dao/daoCategoria.php";

$l = new daoCategoria($conexao);
    $livros = $l->listaCategoria();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Livro</title>
</head>
<body>
    <h1>Cadastro de Livro</h1>
    <form action="../../controllers/insertLivro.php" method="post">
        <label for="nome">Nome do Livro:</label><br>
        <input type="text" id="nome_livro" name="nome_livro" required><br><br>

        <label for="autor">Autor:</label><br>
        <input type="text" id="autor_livro" name="autor_livro" required><br><br>

        <label for="categoria">Categoria:</label><br>
        <select name="fk_id_categoria" id="fk_id_categoria">
                <?php foreach ($livros as $livro){ ?>
            <option value="<?php echo $livro['id_categoria']; ?>">
                <?php echo $livro['nome_categoria']; ?>
            </option>
            <?php } ?>
        </select><br></br>
        <label for="estoque">Estoque:</label><br>
        <input type="number" id="estoque_livro" name="estoque_livro" placeholder="0" required><br><br>

        <input type="submit" value="Cadastrar Livro">
    </form>
</body>
</html>