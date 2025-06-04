<?php
    require __DIR__ .  "/../../src/dao/daoLivro.php";
    $l = new daoLivro($conexao);
    $livros = $l->listarLivros();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LerMais</title>
    <link rel="stylesheet" href="../components/style.css">
</head>
<body>
    <?php
        require __DIR__ . "/../view/layout/header.php";      
    ?>
        <form  action="../controllers/alugarLivro.php" method="post">
            <img src="teste" alt="teste">
            <h1>Livro tal</h1>
            <p>Quantidade:10</p>
            <button value="4" name="id_livro">Alugar</button>
        </form>
        
    <?php
    
        require __DIR__ . "/../view/layout/footer.php";
    ?>



       <!-- <select name="teste" id="teste">
                <?php //foreach ($livros as $livro){ ?>
            <option value="<?php //echo $livro['id_categoria']; ?>">
                <?php //echo $livro['nome_categoria']; ?>
            </option>
            <?php //} ?>
        </select>-->
</body>
</html>