const livros = [
    { titulo: "Dom Casmurro", autor: "Machado de Assis", genero: "Romance", },
    { titulo: "A Guerra dos Tronos: As Crônicas de Gelo e Fogo", autor: "George R.R Martin", genero: "Ficção Científica" },
    { titulo: "O Pequeno Príncipe", autor: "Antoine de Saint-Exupéry", genero: "Fábula" },
    { titulo: "O Hobbit", autor: "J.R.R Tolkien", genero: "Ficção Científica" },
    { titulo: "Ladrão de Casaca", autor: "Maurice Leblanc", genero: "Mistério" },
    { titulo: "Jogador Nº 1", autor: "Ernest Cline", genero: "Ficção Científica" },
    { titulo: "Código Limpo: Habilidades Práticas do Agile Software", autor: " Robert C. Martin", genero: "Computação" },
    { titulo: "It - A Coisa", autor: "Stephen King", genero: "Terror" },
    { titulo: "Misery: Louca Obsessão", autor: "Stephen King", genero: "Terror" },
    { titulo: "A hora da estrela", autor: " Clarice Lispector", genero: "Romance" },
    { titulo: "Um sopro de vida", autor: "Clarice Lispector", genero: "Romance" },
    { titulo: "Você Fica Tão Sozinho às Vezes que Até faz Sentido", autor: " Charles Bukowski", genero: "Literatura e Ficção" },
    { titulo: "Verity", autor: " Colleen Hoover", genero: "Mistério" },
    { titulo: "A paciente silenciosa", autor: " Alex Michaelides", genero: "Mistério" },
    { titulo: "Quarta asa", autor: " Rebecca Yarros", genero: "Ficção Científica" },
    { titulo: "Orgulho e Preconceito", autor: " Jane Austen", genero: "Romance" },
    { titulo: "A Arte da Guerra - Sun Tzu", autor: "Sun Tzu", genero: "Motivacional" },
    { titulo: "Hábitos Atômicos: um Método Fácil e Comprovado de Criar Bons Hábitos e se Livrar dos Maus", autor: "James Clear", genero: "Motivacional" },
    { titulo: "A psicologia financeira: lições atemporais sobre fortuna, ganância e felicidade", autor: "Morgan Housel", genero: "Motivacional" },
    { titulo: "O poder do hábito: Por que fazemos o que fazemos na vida e nos negócios", autor: " Charles Duhigg", genero: "Motivacional" },
    { titulo: "Torto arado", autor: " Itamar Vieira Junior", genero: "Drama" },
    { titulo: "Tudo é rio", autor: " Carla Madeira", genero: "Literatura e Ficção" },
    { titulo: "O Príncipe", autor: " Nicolau Maquiavel", genero: "Filosofia" },
    { titulo: "O Diário de Anne Frank", autor: " Anne Frank", genero: "Bibliografia" },
    { titulo: "O alquimista", autor: " Paulo Coelho", genero: "Literatura e Ficção" },
    { titulo: "Ayrton Senna: Uma Lenda a Toda Velocidade: Uma Jornada Interativa", autor: " Christopher Hilton", genero: "Bibliografia" },
    { titulo: "A Odisseia", autor: " Homero", genero: "Literatura e Ficção" },
    { titulo: "A divina comédia", autor: "Dante Alighieri", genero: "Literatura e Ficção" },
    { titulo: "O Mercador de Veneza", autor: "William Shakespeare", genero: "Literatura e Ficção" },
];

let alugueis = [];
let carrinho = [];

function normalizarTitulo(titulo) {
    return titulo
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '') // remove acentos
        .toLowerCase()
        .replace(/[^a-z0-9]/g, '_'); // substitui espaços e pontuação
}

//função criar card livro (usada para exibir livros disponíveis)
function criarCardLivro(livro, index) {
    const card = document.createElement('div');
    card.classList.add('livro-card');

    const nomeImagem = normalizarTitulo(livro.titulo) + '.png';

    card.innerHTML = `
        <img src="view/livro/capas/${nomeImagem}" alt="${livro.titulo}"
             onerror="this.onerror=null; this.src='imagens/imagem_padrao.png';">
        <h3>${livro.titulo}</h3>
        <p>Autor: ${livro.autor}</p>
        <p>Gênero: ${livro.genero}</p>
        <button onclick="adicionarAoCarrinho(${index})">Alugar</button>
    `;

    return card;
}

//Função exibir livros (principal para a seção de livros)
function exibirLivros(lista = livros) {
    const container = document.getElementById("livrosContainer");
    container.innerHTML = "";

    if (lista.length === 0) {
        container.innerHTML = "<p>Nenhum livro encontrado.</p>";
        return;
    }

    lista.forEach((livro, index) => {
        const card = criarCardLivro(livro, index); // Passa o índice para o botão de alugar
        container.appendChild(card);
    });
}

//Chama a função para exibir os livros ao carregar a página
window.addEventListener('load', exibirLivros);

//Exemplo de função para filtrar livros
function filtrarLivros() {
    const termoBusca = document.getElementById('busca').value.toLowerCase();
    const livrosFiltrados = livros.filter(livro =>
        livro.titulo.toLowerCase().includes(termoBusca) ||
        livro.autor.toLowerCase().includes(termoBusca)
    );
    exibirLivros(livrosFiltrados);
}

// Alternar visibilidade de seções
function mostrarSecao(id) {
    document.querySelectorAll("section").forEach(secao => {
        secao.classList.remove("active");
    });
    document.getElementById(id).classList.add("active");
}

// Adicionar ao carrinho
function adicionarAoCarrinho(index) {
    const livro = livros[index];

    if (carrinho.some(l => l.titulo === livro.titulo)) {
        alert("Este livro já está no carrinho.");
        return;
    }

    carrinho.push(livro);
    alert(`"${livro.titulo}" adicionado ao carrinho.`);
    atualizarCarrinhoLateral();
}

// Remover item do carrinho
function removerDoCarrinho(index) {
    carrinho.splice(index, 1);
    atualizarCarrinhoLateral();
}

// Finalizar aluguel
function finalizarAluguel() {
    if (carrinho.length === 0) {
        alert("Carrinho vazio.");
        return;
    }

    const usuario = "Anônimo"; // Pode ser obtido de um campo de input, por exemplo

    const hoje = new Date();
    const devolucao = new Date();
    devolucao.setDate(hoje.getDate() + 14);

    const dataAluguel = hoje.toISOString().split('T')[0];
    const dataDevolucao = devolucao.toISOString().split('T')[0];

    const mensagemAluguel = `Aluguel finalizado com sucesso! Você tem 14 dias para devolver os livros.`;

    carrinho.forEach(itemCarrinho => { // Use 'itemCarrinho' para evitar conflito com 'livro' global
        // Encontre o livro completo na lista 'livros' para pegar autor/genero
        const livroCompleto = livros.find(l => l.titulo === itemCarrinho.titulo);
        if (livroCompleto) {
            alugueis.push({
                usuario,
                titulo: livroCompleto.titulo, // Guarda o título completo
                autor: livroCompleto.autor,   // Guarda o autor
                genero: livroCompleto.genero, // Guarda o gênero
                dataAluguel,
                dataDevolucao
            });
        }
    });

    carrinho = [];
    alert(mensagemAluguel);
    listarAlugueis(); // Chama a função para exibir os aluguéis com o novo formato
    atualizarCarrinhoLateral();
}


// NOVO: Função para criar um card de aluguel (similar ao card de livro)
function criarCardAluguel(aluguel) {
    const card = document.createElement('div');
    card.classList.add('livro-card', 'aluguel-card-display'); // Adiciona classe para estilização específica

    const nomeImagem = normalizarTitulo(aluguel.titulo) + '.png';

    card.innerHTML = `
        <img src="view/livro/capas/${nomeImagem}" alt="${aluguel.titulo}"
             onerror="this.onerror=null; this.src='imagens/imagem_padrao.png';">
        <h3>${aluguel.titulo}</h3>
        <p><strong>Autor:</strong> ${aluguel.autor}</p>
        <p><strong>Gênero:</strong> ${aluguel.genero}</p>
        <p class="aluguel-info"><strong>Usuário:</strong> ${aluguel.usuario}</p>
        <p class="aluguel-info"><strong>Alugado em:</strong> ${aluguel.dataAluguel}</p>
        <p class="aluguel-info"><strong>Devolução:</strong> ${aluguel.dataDevolucao}</p>
        `;
    return card;
}


// Listar aluguéis
function listarAlugueis() {
    const containerAlugueis = document.getElementById("alugueisContainer");
    containerAlugueis.innerHTML = "";

    if (alugueis.length === 0) {
        containerAlugueis.innerHTML = "<p>Nenhum aluguel registrado.</p>";
        mostrarSecao("alugueis");
        return;
    }

    alugueis.forEach(aluguel => {
        const card = criarCardAluguel(aluguel);
        containerAlugueis.appendChild(card);
    });

    mostrarSecao("alugueis");
}


// Exibe livros ao carregar a página
window.onload = () => exibirLivros();

function toggleCarrinho() {
    const carrinhoDiv = document.getElementById("carrinhoLateral");
    carrinhoDiv.classList.toggle("aberto");
    atualizarCarrinhoLateral();
}

function atualizarCarrinhoLateral() {
    const lista = document.getElementById("listaCarrinhoLateral");
    lista.innerHTML = "";

    if (carrinho.length === 0) {
        lista.innerHTML = "<li>Seu carrinho está vazio.</li>";
        return;
    }

    carrinho.forEach((livro, index) => {
        const item = document.createElement("li");
        item.innerHTML = `
            ${livro.titulo}
            <button onclick="removerDoCarrinho(${index})">❌</button>
        `;
        lista.appendChild(item);
    });
}

function atualizarNomeUsuario(nome) {
    const userNameElement = document.getElementById("userName");
    userNameElement.textContent = "Olá, " + nome + "!";
}





function logout() {
    sessionStorage.clear();
    localStorage.clear();
    window.location.href = 'login.html';
}