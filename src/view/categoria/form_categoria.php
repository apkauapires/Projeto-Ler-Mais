
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Categoria</title>
    <link rel="stylesheet" href="../../components/style-cadastroCategoria.css">
</head>
<body>
    <form action="../../controllers/insertCategoria.php" method="POST">
        <div class="text-button">
            <h1>Insira nova categoria</h1>
            <label>Nome da categoria: 
            </label><input placeholder="Categoria..."type="text" name = "nome_categoria" id = "nome_categoria" >
            </label>
            <button type="submit">Salvar</button>
        </div>
    </form>
</body>
</html>