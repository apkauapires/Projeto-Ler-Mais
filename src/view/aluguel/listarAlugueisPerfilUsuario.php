<?php
    session_start();
    require __DIR__ . "/../../dao/daLivroAluguel.php";

    $a = new daoAluguel($conexao);
    $alugueis = $a->listAlugueisByUsername($_SESSION['usuario']);

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
    <h1></h1>
        <table>
            <thead>
                <tr>
                <th class="tnomeUsuario">Nome do usuario</th>
                <th class="tdata">Data aluguel</th>
                </tr>
                </thead>
                <tbody>
                <br><br>
                <?php foreach($alugueis as $a): ?>
                <tr>
                    <td><?php echo $a['nome_usuario']; ?></td>
                    <td><?php echo $a['data_coleta']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
</body>
</html>