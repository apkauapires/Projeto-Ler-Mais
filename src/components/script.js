<?php
    session_start();
    require __DIR__ . "/dao/daoLivro.php";
    $l = new DaoLivro($conexao);
    $dados = $l->listarLivros();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>LerMais - Biblioteca Comunitária</title>
    <link rel="stylesheet" href="components/style-catalogoLivros.css">
    <link rel="icon" type="image/png" href="../public/image/logo.png">
    <script>
        const livros = <?php echo json_encode($dados); ?>;

        function normalizarTitulo(titulo) {
            return titulo
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .replace(/[^a-z0-9]/g, '_');
        }

        function criarCardLivro(livro, index) {
            const card = document.createElement('form');
            card.classList.add('livro-card');

            const nomeImagem = normalizarTitulo(livro.nome_livro) + '.png';

            card.innerHTML = `
                <img src="view/livro/capas/${nomeImagem}" alt="${livro.nome_livro}"
                     onerror="this.onerror=null; this.src='imagens/imagem_padrao.png';">
                <h3>${livro.nome_livro}</h3>
                <p>Autor: ${livro.autor_livro}</p>
                <p>Gênero: ${livro.fk_id_categoria}</p>
                <button onclick="adicionarAoCarrinho(${index})">Alugar</button>
            `;

            return card;
        }

        function exibirLivros(lista = livros) {
            const container = document.getElementById("livrosContainer");
            container.innerHTML = "";

            if (lista.length === 0) {
                container.innerHTML = "<p>Nenhum livro encontrado.</p>";
                return;
            }

            lista.forEach((livro, index) => {
                const card = criarCardLivro(livro, index);
                container.appendChild(card);
            });
        }

        function filtrarLivros() {
            const termoBusca = document.getElementById('busca').value.toLowerCase();
            const livrosFiltrados = livros.filter(livro =>
                livro.nome_livro.toLowerCase().includes(termoBusca) ||
                livro.autor_livro.toLowerCase().includes(termoBusca)
            );
            exibirLivros(livrosFiltrados);
        }

        window.onload = () => exibirLivros();

        function toggleCarrinho() {
            const carrinhoDiv = document.getElementById("carrinhoLateral");
            carrinhoDiv.classList.toggle("aberto");
            atualizarCarrinhoLateral();
        }

        function atualizarNomeUsuario(nome) {
            const userNameElement = document.getElementById("userName");
            userNameElement.textContent = "Olá, " + nome + "!";
        }
    </script>
</head>
<body>
    <header>
        <h1>📚 LerMais - Biblioteca Comunitária</h1>
    </header>

    <nav>
        <span id="userName" style="color: white;">Olá, <?php echo $_SESSION['usuario'] ?> !</span>
        <button onclick="mostrarSecao('livros')" style="margin-right: 20px;">📖 Livros</button>
        <!-- <a href = "view/aluguel/listarAlugueisPerfilUsuario.php">📋 Aluguéis</a>-->
    </nav>

    <section id="livros" class="active">
        <h2>📚 Livros Disponíveis</h2>
        <form onsubmit="event.preventDefault();">
            <input type="text" id="busca" placeholder="Buscar por título ou autor..." oninput="filtrarLivros()">
            <button type="submit">🔍</button>
        </form>
        <div class="livros-container" id="livrosContainer"></div>
    </section>

    <section id="alugueis">
        <h2>📋 Seus Aluguéis</h2>
        <div class="alugueis-container" id="alugueisContainer"></div>
    </section>

    <button id="abrirCarrinho" onclick="toggleCarrinho()">🛒</button>
    <div id="carrinhoLateral">
        <h3>Carrinho de Aluguel</h3>
        <ul id="listaCarrinhoLateral"></ul>
        <button id="botaoFinalizar" onclick="finalizarAluguel()">📦 Finalizar</button>
    </div>

    <a href="controllers/deslogarUsuario.php">Sair</a>
</body>
</html>