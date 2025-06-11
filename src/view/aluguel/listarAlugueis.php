<?php
    require __DIR__ . "/../../dao/daLivroAluguel.php";

    $a = new daoAluguel($conexao);
    $alugueis = $a->listAlugueis();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListaAlugueis</title>
    <link rel="stylesheet" href="../../components/style-listarAlugueis.css">
</head>
<body>
    <div>
    <form action = "listarAlugueisPorUsuario.php" method="post">
    <label for="nome"></label>
        <h1 class="cabeçalho">Alugueis</h1>
      <input type="text" id="nome" name="nome" placeholder="Nome do usuário">
     <input type="submit" class="buscarAlu" value="Buscar">
    </form>    
    <h1></h1>
        <table>
            <thead>
                <tr>
                <th width="220" class="tnomeUsuario">Nome do usuario</th>
                <th width="220" class="tdata">Data aluguel</th>
                <th width="220" class="tdata">Livro Alugado</th>
                <th width="220" class="tdata">Quantidade Alugada</th>
                <th width="220">Baixar aluguel</th>
                </tr>
                </thead>
                <tbody>
                <br><br>
                <?php foreach($alugueis as $a): ?>
                <tr>
                    <td><?php echo $a['nome_usuario']; ?></td>
                    <td><?php echo $a['data_coleta']; ?></td>
                    <td><?php echo $a['nome_livro']; ?></td>
                    <td><?php echo $a['qtd_aluguel']; ?></td>
                    <td>
                         <a href="../../controllers/baixarAluguel.php?id_aluguel=<?= $a['id_aluguel']?>&id_livro=<?= $a['id_livro']?>&qtd_aluguel=<?= $a['qtd_aluguel']?>" 
                          class="baixarAlu" onclick="return confirm('Tem certeza que deseja baixar este aluguel?');">Dar baixa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
</body>
</html>