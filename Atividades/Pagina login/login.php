<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['nome'];
    $senha = $_POST['senha'];

   
    $usuario_correto = "admin";
    $senha_correta = "1234";

    if ($usuario === $usuario_correto && $senha === $senha_correta) {
        echo "Bem-vindo, " . htmlspecialchars($usuario) . "!";
    } else {
        echo "Usuário ou senha incorretos.";
    }
}
?>
    <button<a href="index.html" style="color:rgb(56, 22, 168)">>Voltar</button>
</body>
</html>