<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection BD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// Inclui a conexão com o banco de dados
include_once("connection.php");

// Mensagens de feedback
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo "<h3>Dados enviados com sucesso!</h3>";
} elseif (isset($_GET['status']) && $_GET['status'] == 'error') {
    echo "<h3>Erro: " . htmlspecialchars($_GET['message']) . "</h3>";
}
?>

<!-- Formulário Cliente -->
<div class="cliente">
    <h2>Cadastro de Cliente</h2>
    <form action="insertion.php" method="POST">
        <input type="hidden" name="form_type" value="cliente">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
</div>

<!-- Formulário Produto -->
<div class="produto">
    <h2>Cadastro de Produto</h2>
    <form action="insertion.php" method="POST">
        <input type="hidden" name="form_type" value="produto">
        <label for="nome1">Produto:</label>
        <input type="text" name="nome1" required>
        <br>
        <label for="valor">Valor:</label>
        <input type="number" step="0.01" name="valor" required>
        <br>
        <label for="estoque">Estoque:</label>
        <input type="number" name="estoque" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
</div>

<!-- Exibição de registros -->
<div class="registros">
    <h2>Clientes Registrados</h2>
    <?php
    // Busca registros de clientes
    $sqlClientes = "SELECT * FROM cliente";
    $resultadoClientes = mysqli_query($conexao, $sqlClientes);

    if ($resultadoClientes && mysqli_num_rows($resultadoClientes) > 0) {
        while ($cliente = mysqli_fetch_assoc($resultadoClientes)) {
            echo "ID: " . htmlspecialchars($cliente['id']) . " - Nome: " . htmlspecialchars($cliente['nome']) . " - Email: " . htmlspecialchars($cliente['email']) . "<br>";
        }
    } else {
        echo "Nenhum cliente registrado.<br>";
    }
    ?>

    <h2>Produtos Registrados</h2>
    <?php
    // Busca registros de produtos
    $sqlProdutos = "SELECT * FROM produtos";
    $resultadoProdutos = mysqli_query($conexao, $sqlProdutos);

    if ($resultadoProdutos && mysqli_num_rows($resultadoProdutos) > 0) {
        while ($produto = mysqli_fetch_assoc($resultadoProdutos)) {
            echo "ID: " . htmlspecialchars($produto['id']) . " - Produto: " . htmlspecialchars($produto['nome1']) . " - Valor: R$ " . htmlspecialchars($produto['valor']) . " - Estoque: " . htmlspecialchars($produto['estoque']) . "<br>";
        }
    } else {
        echo "Nenhum produto registrado.<br>";
    }
    ?>
</div>

</body>
</html>
