<?php
    session_start();
    //unset($_SESSION['sacola']);
    require __DIR__ .  "/../../src/dao/daoLivro.php";
    $l = new daoLivro($conexao);
    $livros = $l->listarLivros();
    $sacola = $_SESSION['sacola'] ?? [];
    $qtdSacola = count($sacola);
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
        if (!empty($sacola)) { 
            echo "<h2>quantidade sacola $qtdSacola</h2>"; 
    ?>
        <ul>
            <?php foreach ($sacola as $alugado){ ?>
                <li>
                    <?php echo $alugado['titulo'];?>
                    <?php echo $alugado['src_img'];?>
                    Quantidade: <?= $alugado['quantidade'] ?>;
                </li>
            <?php } ?>
        </ul>
    <?php 
        }
        foreach ($livros as $livro){
    ?>
        <form  action="../controllers/sacolaDeLivros.php" method="post">
            <img src="<?php echo $livro['img_livro']; ?>" alt="teste"><input type="hidden" name='img' value="<?php echo $livro['img_livro']; ?>"><br>
            <h1><?php echo $livro['nome_livro'];?></h1><input type="hidden" name="titulo" value="<?php echo $livro['nome_livro'];?>">
            <p>Quantidade:<?php echo $livro['estoque_livro']; ?></p>
            <button type="submit" name="id_livro" value="<?php echo $livro['id_livro'];?>">Alugar</button>
        </form>
    <?php
    }
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