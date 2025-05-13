<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Tela de Login</title>
</head>
<body>
  <h2>Login</h2>

  <?php
    if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
    echo $_SESSION['message'];
    $_SESSION['message'] = "";
    }
    
  
  ?>
  <form action="logarUsuario_action.php" method="POST">
    <label for="email">E-mail:</label><br>
    <input type="email" id="email_usuario" name="email_usuario"><br><br>

    <label for="senha">Senha:</label><br>
    <input type="password" id="senha_usuario" name="senha_usuario"><br><br>

    <button type="submit">Entrar</button>

    <p>Ainda não tem uma conta? <a href="form_inserirUsuario.php">Registre-se</a></p>


  </form>
</body>
</html>