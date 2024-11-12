<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrado</title>
</head>
<body>
    
<?php

ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar todos os campos
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $chamada = isset($_POST['cha']) ? $_POST['cha'] : '';
    $rm = isset($_POST['rm']) ? $_POST['rm'] : '';
    $patrimonio = isset($_POST['patrimonio']) ? $_POST['patrimonio'] : '';
    $numero_maquina = isset($_POST['numero_maquina']) ? $_POST['numero_maquina'] : '';

    // Processar o arquivo enviado
    if (isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];
        $nome_arquivo = $arquivo['name'];
        $caminho_destino = 'uploads/' . basename($nome_arquivo); // Define o caminho de destino

        // Verifica se o arquivo é uma imagem
        $tipo_imagem = getimagesize($arquivo['tmp_name']);
        if ($tipo_imagem !== false) {
            // Move o arquivo para o diretório desejado
            if (move_uploaded_file($arquivo['tmp_name'], $caminho_destino)) {
                echo "Arquivo enviado: " . htmlspecialchars($nome_arquivo) . "<br>";
                // Exibir a imagem
                echo "<img src='" . htmlspecialchars($caminho_destino) . "' alt='Imagem enviada' style='max-width: 300px;'><br>";
            } else {
                echo "Erro ao mover o arquivo.";
            }
        } else {
            echo "O arquivo enviado não é uma imagem.";
        }
    }

    // Exibir os dados recebidos
    echo "<h2>Dados Recebidos:</h2>";
    echo "Nome: " . htmlspecialchars($nome) . "<br>";
    echo "Número da Chamada: " . htmlspecialchars($chamada) . "<br>";
    echo "RM: " . htmlspecialchars($rm) . "<br>";
    echo "Patrimônio: " . htmlspecialchars($patrimonio) . "<br>";
    echo "Número da Máquina: " . htmlspecialchars($numero_maquina) . "<br>";
} else {
    echo "Nenhum dado recebido. Use o formulário para enviar os dados.";
}
?>
</body>
</html>