<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['senha'])) {
    header('Location: login_us.php');
    exit();
}
if (isset($_SESSION['erro'])) {
    echo '<p style="color:red">' . $_SESSION['erro'] . '</p><br>';
    unset($_SESSION['erro']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <h1>Formulário Cadastro</h1>
        <form action='insertion.php' method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>
            <br>
            <label for="email">Email: </label>
            <input name="email" type="email" required>
            <br>
            <label for="senha">Senha: </label>
            <input name="senha" type="password" required>
            <br>
            <input type="submit" value="Enviar">
            <input type="reset" value="Limpar">
        </form>
        <br><br><br>
    </div>
</body>
</html>