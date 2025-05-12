<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Cadastro</title>
    <style>
        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Cadastro de Usuário</h2>

    <?php 
        if (isset($_SESSION['message'])) {
            $mensagem = $_SESSION['message'];
            $mensagemLower = strtolower($mensagem); // Facilita comparação
            $messageType = (strpos($mensagemLower, 'e-mail já cadastrado') !== false || strpos($mensagemLower, 'as senhas não conferem') !== false) 
                ? 'error' 
                : 'success';
            echo "<p class='$messageType'>{$mensagem}</p>";
            $_SESSION['message'] = null; // Limpa a mensagem após exibir
        }
    ?>
    
    <form action="inserirUsuario_action.php" method="POST">
        <label for="nome">Nome de usuário:</label>
        <input type="text" id="nome_usuario" name="nome_usuario" value="<?= $_SESSION['nome'] ?? '' ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email_usuario" name="email_usuario" value="<?= $_SESSION['email'] ?? '' ?>" required><br><br>

        <label for="contato">Contato:</label>
        <input type="text" id="contato_usuario" name="contato_usuario" value="<?= $_SESSION['contato'] ?? '' ?>" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha_usuario" name="senha_usuario" value="<?= $_SESSION['senha'] ?? '' ?>" required><br><br>

        <label for="repetir_senha">Repetir Senha:</label>
        <input type="password" id="repetir_senha" name="repetir_senha" value="<?= $_SESSION['senhaRepeticao'] ?? '' ?>" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>

</body>
</html>