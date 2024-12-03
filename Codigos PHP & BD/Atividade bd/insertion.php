<?php
// Inclui a conexão com o banco de dados
include_once("connection.php");

if ($_POST['form_type'] === 'cliente') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO cliente (nome, email) VALUES ('$nome', '$email')";
    if (mysqli_query($conexao, $sql)) {
        header("Location: index.php?status=success");
        exit;
    } else {
        header("Location: index.php?status=error&message=" . urlencode(mysqli_error($conexao)));
        exit;
    }
} elseif ($_POST['form_type'] === 'produto') {
    $nome1 = $_POST['nome1'];
    $valor = $_POST['valor'];
    $estoque = $_POST['estoque'];

    $sql = "INSERT INTO produtos (nome1, valor, estoque) VALUES ('$nome1', '$valor', '$estoque')";
    if (mysqli_query($conexao, $sql)) {
        header("Location: index.php?status=success");
        exit;
    } else {
        header("Location: index.php?status=error&message=" . urlencode(mysqli_error($conexao)));
        exit;
    }
}
?>
