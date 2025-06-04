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
        <form  action="../../controllers/alugarLivro.php" method="post">
      <!--<img src="<?php // echo $livro['img_livro'] ?>"> -->
            <p> </p>
        <select name="teste" id="teste">
                <?php foreach ($livros as $livro){ ?>
            <option value="<?php echo $livro['id_categoria']; ?>">
                <?php echo $livro['nome_categoria']; ?>
            </option>
            <?php } ?>
        </select>
        <!--<p> <?php //echo $livro['estoque_livro']?></p>-->
       <!-- <p> <?php //echo $livro['nome_livro']?></p>-->
            <button value="<?php echo $livro['id_categoria'];?>">Alugar</button>
        </form>
        
    <?php
    
        require __DIR__ . "/../view/layout/footer.php";
    ?>
</body>
</html>