<?php
session_start();


if (!isset($_SESSION['username']) && !isset($_COOKIE['username'])) {
    header('Location: login.php'); 
}

$username = $_SESSION['username'] ?? $_COOKIE['username'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($username); ?>!</h1>
    <form method="POST" action="logout.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
