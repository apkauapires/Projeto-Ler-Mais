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

// Exibir livros com suporte a lista filtrada
function exibirLivros(lista = livros) {
  const container = document.getElementById("livrosContainer");
  container.innerHTML = "";

  if (lista.length === 0) {
    container.innerHTML = "<p>Nenhum livro encontrado.</p>";
    return;
  }

  lista.forEach((livro, index) => {
    const card = document.createElement("div");
    card.classList.add("livro-card");
    card.innerHTML = `
      <h3>${livro.titulo}</h3>
      <p><strong>Autor:</strong> ${livro.autor}</p>
      <p><strong>Gênero:</strong> ${livro.genero}</p>
      <button onclick="adicionarAoCarrinho(${index})">🛒 Alugar</button>
    `;
    container.appendChild(card);
  });
}

// Busca por título ou autor
function filtrarLivros() {
  const termo = document.getElementById("busca").value.toLowerCase();

  const filtrados = livros.filter(livro =>
    livro.titulo.toLowerCase().includes(termo) ||
    livro.autor.toLowerCase().includes(termo)
  );

  exibirLivros(filtrados);
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
}

// Exibir carrinho
function mostrarCarrinho() {
  const lista = document.getElementById("listaCarrinho");
  lista.innerHTML = "";

  carrinho.forEach((livro, index) => {
    const item = document.createElement("li");
    item.innerHTML = `${livro.titulo} <button onclick="removerDoCarrinho(${index})">❌</button>`;
    lista.appendChild(item);
  });

  mostrarSecao("carrinho");
}

// Remover item do carrinho
function removerDoCarrinho(index) {
  carrinho.splice(index, 1);
  mostrarCarrinho();
  function removerDoCarrinho(index) {
  carrinho.splice(index, 1); // remove o livro pelo índice
  atualizarCarrinhoLateral(); // atualiza a lista na lateral
}

}

// Finalizar aluguel
function finalizarAluguel() {
  if (carrinho.length === 0) {
    alert("Carrinho vazio.");
    return;
  }

  // Removendo a solicitação do nome do usuário
  // const usuario = prompt("Você tem certeza que deseja alugar?");
  const usuario = "Anônimo"; // Define um usuário padrão ou obtém de outra forma (ex: sessão)

  
  const hoje = new Date();
  const devolucao = new Date();
  devolucao.setDate(hoje.getDate() + 14);

  const dataAluguel = hoje.toISOString().split('T')[0];
  const dataDevolucao = devolucao.toISOString().split('T')[0];

  const mensagemAluguel = `Aluguel finalizado com sucesso! Você tem 14 dias para devolver os livros.`;

  carrinho.forEach(livro => {
    alugueis.push({
      usuario,
      livro: livro.titulo,
      dataAluguel,
      dataDevolucao
    });
  });

  carrinho = [];
  alert(mensagemAluguel);
  listarAlugueis();
}



// Listar aluguéis
function listarAlugueis() {
  const tabela = document.getElementById("tabelaAlugueis");
  tabela.innerHTML = "";

  alugueis.forEach(aluguel => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${aluguel.usuario}</td>
      <td>${aluguel.livro}</td>
      <td>${aluguel.dataAluguel}</td>
      <td>${aluguel.dataDevolucao}</td>
    `;
    tabela.appendChild(row);
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
      <button onclick="removerDoCarrinho(${index}); atualizarCarrinhoLateral()">❌</button>
    `;
    lista.appendChild(item);
  });
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





