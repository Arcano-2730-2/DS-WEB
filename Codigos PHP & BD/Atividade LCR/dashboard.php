<?php
session_start();

// Habilita a exibição de erros para depuração
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica se veio do Formulário
if (isset($_POST['login'])) {
    // Verifica se o login está correto
    include_once("connection.php");
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Consulta para verificar o usuário
    $sql = "SELECT * FROM usuario WHERE email = '$login' AND senha = '$senha'";
    $resultado = mysqli_query($conexao, $sql);

    // Verifica se a consulta retornou resultados
    if (mysqli_num_rows($resultado) > 0) {
        // Converte em Array Associativo
        $linha = mysqli_fetch_assoc($resultado);
        // Grava os dados na sessão
        $_SESSION['login'] = $linha["email"];
        $_SESSION['senha'] = $linha["senha"];
        
        // Verifica se o usuário é o admin
        if ($linha["email"] === 'admin@example.com') {
            header('Location: cadastro_pd.php'); 
            exit(); 
        } else {
            header('Location: login_us.php');
            exit();
        }
    } else {
        $_SESSION['erro'] = "Login ou Senha inválida";
        header('Location: index.php'); 
        exit();
    }
}

// Verifica se o usuário está logado
if (isset($_SESSION['login']) && isset($_SESSION['senha'])) {
    // Se o usuário já estiver logado, redireciona para a página normal do usuário
    if ($_SESSION['login'] === 'admin@example.com') {
        header('Location: cadastro_pd.php');
        exit(); 
    } else {
        header('Location: login_us.php');
        exit(); 
    }
} else {
    header('Location: index.php'); 
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            text-align: center;
        }
        p {
            text-align: center;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao Dashboard</h1>
        <p>Por favor, faça login para continuar.</p>
        <form action="" method="POST">
            <input type="text" name="login" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="submit" value="Login">
        </form>
        <?php if (isset($_SESSION['erro'])): ?>
            <p style="color: red;"><?php echo $_SESSION['erro']; unset($_SESSION['erro']); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>