<?php
    require __DIR__ . "/dao/daoLivro.php";
    require __DIR__ . "/dao/daLivroAluguel.php";
    if($_GET['tipo'] == 'todos'){
        $l = new DaoLivro($conexao);
        $dados = $l->listarLivros();
    }elseif($_GET['tipo'] == 'seus'){
        $l = new daoAluguel($conexao);
        var_dump($_SESSION['id']);
        $dados = $l->listAlugueisByUsername($_SESSION['id']);
        var_dump($dados);
    }
    $sacola = $_SESSION['sacola'] ?? [];
    $qtdSacola = count($sacola);
    $_SESSION['livros'] = [];
    $_SESSION['quantidade'] = [];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>LerMais - Biblioteca Comunitária</title>
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
        card.method = 'POST';
        card.action = 'src/controllers/sacolaDeLivros.php';
        card.classList.add('livro-card');

        const nomeImagem = normalizarTitulo(livro.nome_livro) + '.png';

        card.innerHTML = `
            <img src="view/livro/capas/${nomeImagem}" alt="${livro.nome_livro}" onerror="this.onerror=null; this.src='imagens/imagem_padrao.png';"> 
            <input type="hidden" name='img' value="${nomeImagem}">
            <h3>${livro.nome_livro}</h3>
            <input type="hidden" name="titulo" value="${livro.nome_livro}">
            <p>Autor: ${livro.autor_livro}</p>
            <p>Gênero: ${livro.nome_categoria}</p>
            <p>Estoque: ${livro.estoque_livro}</p>
            <button type="submit" name="id_livro" value="${livro.id_livro}">Alugar</button>
        `;

        return card;
    }

        

        function exibirLivros(lista = livros) {
            const container = document.getElementById("livrosContainer");
            container.innerHTML = "";

            const livrosFiltrados = lista.filter(livro => livro.estoque_livro > 0);

            if (livrosFiltrados.length === 0) {
                container.innerHTML = "<p>Nenhum livro encontrado.</p>";
                return;
            }

            livrosFiltrados.forEach((livro, index) => {
                const card = criarCardLivro(livro, index);
                container.appendChild(card);
            });
        }

        function filtrarLivros() {
            const termoBusca = document.getElementById('busca').value.toLowerCase();
            const livrosFiltrados = livros.filter(livro =>
                (livro.nome_livro.toLowerCase().includes(termoBusca) ||
                livro.autor_livro.toLowerCase().includes(termoBusca)) &&
                livro.estoque_livro > 0
            );
            exibirLivros(livrosFiltrados);
        }

        window.onload = () => exibirLivros();

        function toggleCarrinho() {
            const carrinhoDiv = document.getElementById("carrinhoLateral");
            carrinhoDiv.classList.toggle("aberto");
        }

        function atualizarNomeUsuario(nome) {
            const userNameElement = document.getElementById("userName");
            userNameElement.textContent = "Olá, " + nome + "!";
        }
    </script>
    <?php if ((isset($_GET['verificacao']) && $_GET['verificacao'] === "sim") && !empty($sacola)) { ?>
        <script>
            window.addEventListener('load', toggleCarrinho);
        </script>
    <?php } ?>
</head>
<body>
    <header>
        <h1> LerMais - Biblioteca Comunitária</h1>
    </header>
    <nav id="rodape_inicial">
        <p><?php echo $_SESSION['usuario'] ?></p>
        <button type="button" onclick="location.href='index.php?navegation=1&&tipo=todos'">Livros</button>
        <button type="button" onclick="location.href='index.php?navegation=1&&tipo=seus'">Livros Alugados</button>
        <button type="button" onclick="location.href='src/controllers/deslogarUsuario.php'">Sair</button>
    </nav>
    <section id="livros" class="active">
        <h2> Livros Disponíveis</h2>
        <form onsubmit="event.preventDefault();">
            <input type="text" id="busca" placeholder="Buscar por título ou autor..." oninput="filtrarLivros()">
            <button type="submit" class="button_pesquisa">🔍</button>
        </form>
        <div class="livros-container" id="livrosContainer"></div>
    </section>

    <section id="alugueis">
        <h2> Seus Aluguéis</h2>
        <div class="alugueis-container" id="alugueisContainer"></div>
    </section>

    <?php if (!empty($sacola)) { ?>
        <button id="abrirCarrinho" onclick="toggleCarrinho()">🛒</button>
    <?php } else { ?>
        <button id="abrirCarrinho" onclick="">🛒</button>
    <?php } ?>

    <form id="carrinhoLateral" method="POST" action="src/controllers/alugarLivros.php">
        <h3>Carrinho de Aluguel</h3>
        <input type="hidden" name="qtdSacola" value="<?php echo $qtdSacola; ?>">
        <?php foreach ($sacola as $alugado) {
            $_SESSION['livros'][] = $alugado['id_livro'];
            $_SESSION['quantidade'][] = $alugado['quantidade'];
        ?>
            <input type="hidden" name='quantidade' value="<?php echo $alugado['quantidade']; ?>">
            <input type="hidden" name='id_usuario' value="<?php echo $_SESSION['id']; ?>">
            <p><?php echo $alugado['titulo']; ?></p>
            <button class="plin mais"  type="button" onclick="location.href='src/controllers/sacolaDeLivros.php?tipo=adicao&id_livro=<?php echo $alugado['id_livro']; ?>'">+</button>
            <?php echo $alugado['quantidade']; ?>
            <button class="plin menos" type="button" onclick="location.href='src/controllers/sacolaDeLivros.php?tipo=subtracao&id_livro=<?php echo $alugado['id_livro']; ?>'">-</button>
            <p>_______________________________</p>
        <?php } ?>
        <button id="botaoFinalizar">📦 Finalizar</button>
    </form>
</body>
</html>