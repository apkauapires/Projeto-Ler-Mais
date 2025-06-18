<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Doação de Livro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 20px;
            max-width: 400px;
            margin: auto;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        h2 {
            text-align: center;
        }
        label, input {
            display: block;
            width: 100%;
        }
        input[type="text"] {
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
        }
        button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }
        .btn-inserir {
            background-color: #4CAF50;
        }
        .btn-cadastrar {
            background-color: #2196F3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Doação de Livro</h2>

        <label for="nomeLivro">Nome do Livro:</label>
        <input type="text" id="nomeLivro" name="nomeLivro" placeholder="Digite o nome do livro">

        <div class="buttons">
            <button class="btn-inserir">Inserir Livro Existente</button>
            <button class="btn-cadastrar" onclick="window.location.href='cadastro_livro.php'">Cadastrar Novo Livro</button>
        </div>
    </div>

</body>
</html>
