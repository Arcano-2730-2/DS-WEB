<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['login']) || !isset($_SESSION['senha'])) {
    header('Location: index.php'); // Redireciona para a página de login se não estiver logado
    exit();
}

// Exibe informações do usuário
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightblue;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }
        h1 {
            text-align: center;
        }
        h2 {
            margin-top: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['login']); ?>!</h1>
        <p>Você está logado como um usuário padrão.</p>
        
        <h2>Informações da Conta</h2>
        <p>Email: <?php echo htmlspecialchars($_SESSION['login']); ?></p>

        <h2>Ações</h2>
        <ul>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>