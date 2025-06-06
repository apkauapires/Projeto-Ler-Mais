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
        if((isset($_GET['verificacao']) && $_GET['verificacao']=== "sim") && !empty($sacola)) {
    ?>    
        <button type='button' onclick='location.href="inicial.php?verificacao=nao"'> sacola </button>
    <?php 
    }else{
        if (empty($sacola)) { 
        echo "<h2> Quantidade 0 </h2>";
        }else if(!empty($sacola)){
            echo "<h2>quantidade sacola $qtdSacola</h2>";
        }
    ?>
        <button type='button' onclick='location.href="inicial.php?verificacao=sim"'> sacola </button> 
    <?php 
    }

        if (!empty($sacola) && $_GET['verificacao'] === "sim") { 
            
    ?>
        <ul>
            <?php foreach ($sacola as $alugado){ ?>
                <li>
                    <?php echo $alugado['titulo'];?>
                    <?php echo $alugado['src_img'];?>
                    <button type="button" onclick="location.href='../controllers/sacolaDeLivros.php?tipo=adicao&id_livro=<?php echo $alugado['id_livro']; ?>'">
                        +
                    </button>
                    Quantidade: <?= $alugado['quantidade'] ?>;
                    <button type="button" onclick="location.href='../controllers/sacolaDeLivros.php?tipo=subtracao&id_livro=<?php echo $alugado['id_livro']; ?>'">
                        -
                    </button>
                </li>
            <?php } ?>
            <button type="button" onclick="location.href='../controllers/alugarLivros.php?id_livro=<?php echo $alugado['id_livro']; ?>'">
                        alugar
            </button>
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