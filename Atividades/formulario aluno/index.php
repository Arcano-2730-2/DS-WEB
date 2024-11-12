<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrado</title>
</head>
<body>
    
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Início do script PHP<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Formulário enviado via POST<br>";
    
    if(isset($_POST['nome']) && isset($_POST['rm'])) {
        $usuario = $_POST['nome'];
        $senha = $_POST['rm'];

        echo "Nome: " . htmlspecialchars($usuario) . "<br>";
        echo "RM: " . htmlspecialchars($senha) . "<br>";

        if ($usuario && $senha) {
            echo "Bem-vindo, " . htmlspecialchars($usuario) . "!";
        } else {
            echo "Usuário não cadastrado";
        }
    } else {
        echo "Campos 'nome' ou 'rm' não foram enviados<br>";
    }
} else {
    echo "Nenhum dado POST recebido";
}

echo "<br>Fim do script PHP";
?>
</body>
</html>