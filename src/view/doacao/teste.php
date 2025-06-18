<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulário de Doação</title>
</head>
<body>
    <h1>Doação de Livro</h1>
    <form action="../../controllers/inserirDoacao.php" method="post">
        <label for="nome">Nome do Livro:</label><br>
        <input type="text" id="nome_livro" name="nome_livro"><br><br>

        <label for="autor">Autor:</label><br>
        <input type="text" id="autor_livro" name="autor_livro"><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao"></textarea><br><br>

        <label for="quantidade">Quantidade:</label><br>
        <input type="number" id="qtd_doacao" name="qtd_doacao"><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>