<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>LerMais - Biblioteca Comunitária</title>
  <link rel="stylesheet" href="components/style-catalogoLivros.css">
      <link rel="icon" type="image/png" href="logo.png">
</head>
<body>
  <header>
    <h1>📚 LerMais - Biblioteca Comunitária</h1>
  </header>

  <nav>
     <button onclick="mostrarSecao('livros')" style="margin-right: 20px;">📖 Livros</button>

  </nav>

  <!-- LIVROS -->
  <section id="livros" class="active">
    <h2>📚 Livros Disponíveis</h2>
    <input type="text" id="busca" placeholder="Buscar por título ou autor..." oninput="filtrarLivros()">
    <div class="livros-container" id="livrosContainer"></div>
  </section>

  <script src="components/script.js"></script>
</body>
</html>
<nav>
  <button onclick="mostrarSecao('livros')">📖 Livros</button>
  <button onclick="mostrarCarrinho()">🛒 Carrinho</button>
  <button onclick="listarAlugueis()">📋 Aluguéis</button>
</nav>

<!-- Botão para abrir/fechar carrinho -->
<button id="abrirCarrinho" onclick="toggleCarrinho()">🛒</button>

<!-- Aba lateral do carrinho -->
<div id="carrinhoLateral">
  <h3>Carrinho de Aluguel</h3>
  <ul id="listaCarrinhoLateral"></ul>
  <button onclick="finalizarAluguel()">📦 Finalizar</button>
</div>

