<?php
session_start();


if (isset($_SESSION['username']) || isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'] ?? $_SESSION['username']; 
    header('Location: dashboard.php'); 
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    if ($username === 'admin' && $password === '1234') {
        $_SESSION['username'] = $username;

        
        if (isset($_POST['remember_me'])) {
            setcookie('username', $username, time() + (86400 * 30), "/");
        }

        header('Location: dashboard.php'); 
        exit();
    } else {
        $error = "Usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" 
               value="<?php echo $_COOKIE['username'] ?? ''; ?>" required><br><br>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label>
            <input type="checkbox" name="lembrar"> Lembrar-me
        </label><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
