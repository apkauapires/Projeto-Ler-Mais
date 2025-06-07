<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Inserir Categoria</title>
    <link rel="stylesheet" href="style-cadastroCategoria.css">
</head>
<body>
    
    <h1>Inserir Nova Categoria</h1>
    <div class="insert-categoria>
    <form action="../../controllers/insertCategoria.php" method="post">
        <label for="nome">Nome da Categoria:</label>
        <input type="text" id="nome_categoria" name="nome_categoria" required>
        <br><br>
        <input type="submit" value="Salvar">
    </form>
    </div>
</body>
</html>