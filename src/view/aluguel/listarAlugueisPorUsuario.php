<?php
    require __DIR__ . "/../../dao/daLivroAluguel.php";

    $a = new daoAluguel($conexao);
    $nome = $_POST['nome'];
    $alugueis = $a->listAlugueisByUsername($nome);

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
                <th class="tnomeUsuario">Nome do usuario</th>
                <th class="tdata">Data aluguel</th>
                <th>Baixar aluguel</th>
                </tr>
                </thead>
                <tbody>
                <br><br>
                <?php foreach($alugueis as $a): ?>
                <tr>
                    <td><?php echo $a['nome_usuario']; ?></td>
                    <td><?php echo $a['data_coleta']; ?></td>
                    <td>
                        <a href="../../controllers/baixarAluguel.php?id_aluguel=<?= $a['id_aluguel'] ?>" 
                          class="baixarAlu" onclick="return confirm('Tem certeza que deseja baixar este aluguel?');">Dar baixa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
</body>
</html>