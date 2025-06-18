<?php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Efetivar Doação</title>
  <link rel="stylesheet" href="../../components/style-painelDoacao.css">
</head>
<body>
  <div class="container">
    <div class="form-container">

      <h1 class="titulo-doacao">Efetivar Doação</h1>

      <form action="#" method="POST">
        <label for="nome_livro"><b>Nome do Livro:</b></label>
        <input type="text" id="nome_livro" name="nome_livro" placeholder="Digite o nome do livro" required>
        <input type="hidden" name="id_doacao" value="<?= $_GET['id_aluguel']?>">
        <div class="buttons">
          <button type="submit" class="btn-inserir" formaction="listaLivroDoacao.php" >Inserir Livro Existente</button>
          <button type="button" class="btn-cadastrar" onclick="window.location.href='form_doacao.php'">Cadastrar Novo Livro</button>
        </div>
      </form>
      
    </div>
    <div class="image-container">
      <div class="overlay"></div>
    </div>
  </div>
</body>
</html>