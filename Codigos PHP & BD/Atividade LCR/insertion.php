<?php
// Incluo a minha conexão com o banco de dados
include_once("connection.php");

// Obtém os dados do formulário
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];




// Incluo a inserção dos dados no banco de dados
$sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
if (mysqli_query($conexao, $sql)) {
    echo "Novo registro inserido com sucesso!";
    header("location:index.php");
} else {
    echo "Erro ao inserir: " . mysqli_error($conexao);
}
?>