<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>LerMais - Biblioteca Comunitária</title>
    <link rel="stylesheet" href="components/style-catalogoLivros.css">
    <link rel="icon" type="image/png" href="../public/image/logo.png">
</head>
<body>
    <header>
        <h1>📚 LerMais - Biblioteca Comunitária</h1>
    </header>

    <nav>
        <span id="userName">Olá, <?php echo $_SESSION['usuario'] ?> !</span>
        <button onclick="mostrarSecao('livros')" style="margin-right: 20px;">📖 Livros</button>
        <a href = "view/aluguel/listarAlugueisPerfilUsuario.php">📋 Aluguéis</button>
    </nav>

    <section id="livros" class="active">
        <h2>📚 Livros Disponíveis</h2>
        <input type="text" id="busca" placeholder="Buscar por título ou autor..." oninput="filtrarLivros()">
        <div class="livros-container" id="livrosContainer"></div>
    </section>

    <section id="alugueis">
        <h2>📋 Seus Aluguéis</h2>
        <div class="alugueis-container" id="alugueisContainer">
            </div>
    </section>

    <button id="abrirCarrinho" onclick="toggleCarrinho()">🛒</button>
    <div id="carrinhoLateral">
        <h3>Carrinho de Aluguel</h3>
        <ul id="listaCarrinhoLateral"></ul>
        <button id="botaoFinalizar" onclick="finalizarAluguel()">📦 Finalizar</button>
    </div>

    <a href = "controllers/deslogarUsuario.php">Sair</a>

    <script src="components/script.js"></script>
</body>
</html>