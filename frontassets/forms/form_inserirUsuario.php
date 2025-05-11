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
            // Se a mensagem de erro for sobre "As senhas não conferem" ou "E-mail já cadastrado"
            $messageType = (strpos($_SESSION['message'], 'E-mail já cadastrado') !== false || strpos($_SESSION['message'], 'As senhas não conferem') !== false) ? 'error' : 'success';
            echo "<p class='$messageType'>" . $_SESSION['message'] . "</p>";
            $_SESSION['message'] = null; // Limpa a mensagem após exibir
        }
    ?>
    
    <form action="inserirUsuario_action.php" method="POST">
        <label for="nome">Nome de usuário:</label>
        <input type="text" id="nome_usuario" name="nome_usuario" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email_usuario" name="email_usuario" required><br><br>

        <label for="contato">Contato:</label>
        <input type="text" id="contato_usuario" name="contato_usuario" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha_usuario" name="senha_usuario" required><br><br>

        <label for="repetir_senha">Repetir Senha:</label>
        <input type="password" id="repetir_senha" name="repetir_senha" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>

</body>
</html>