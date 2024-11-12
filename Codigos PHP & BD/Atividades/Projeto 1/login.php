<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
        


</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $usuario = $_GET['nome'];
    $senha = $_GET['senha'];

   
    $usuario_correto = "admin";
    $senha_correta = "1234";

    if ($usuario === $usuario_correto && $senha === $senha_correta) {
        echo "<div id=texto2>Bem-vindo, " . htmlspecialchars($usuario) . "!</div>";
    } else {
        echo "<div id=texto>Usuário ou senha incorretos.</div>";
    }
}
?>
    <br>
    <div style="text-align: center">

    <buttons id="enviar"><a href="index.html" style="color:rgb(56, 22, 168)">Voltar</buttons>
</div>
</body>
</html>