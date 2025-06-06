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
<link rel="stylesheet" href="../../components/style-cadastroLivro.css">
<body>
    <div class="principal">
        <h1>Cadastro de Livro</h1>
        <form action="../../controllers/insertLivro.php" method="post">
            <label for="nome">Nome do Livro:</label><br>
            <input type="text" placeholder="Livro..." id="nome_livro" name="nome_livro" required><br><br>

            <label for="autor">Autor:</label><br>
            <input  type="text" placeholder="Autor..." id="autor_livro" name="autor_livro" required>

            <label for="categoria">Categoria:</label><br>
            <select class="categoria_select" name="fk_id_categoria" id="fk_id_categoria">
                 <option value="" disabled selected>Selecione uma categoria</option>
                    <?php foreach ($livros as $livro){ ?>
                <option value="<?php echo $livro['id_categoria']; ?>">
                    <?php echo $livro['nome_categoria']; ?>
                </option>
                <?php } ?>
            </select>
            <label>Capa do livro:
            <input class="file_img"type="file">
            </label>
            <label for="estoque">Estoque:</label><br>
            <input type="number" class="estoque_livro" id="estoque_livro" name="estoque_livro" placeholder="0" required>
            <label>Descrição do livro: <br>
            <textarea placeholder="Descrição do livro..." class="texto_descricao"></textarea>
            </label>
            <input type="submit" value="Cadastrar Livro">
        </form>
    </div>
</body>
</html>