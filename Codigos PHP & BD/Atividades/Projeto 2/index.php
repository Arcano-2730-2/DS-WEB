<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <form action="" method="get">
        <label class="titulo">Calculadora</label>

        <label for="cal1">Primeiro valor:</label>
        <input type="number" class="medidas" required autofocus name="cal1" id="cal1" placeholder="Digite o primeiro valor" oninput="this.value = this.value.slice(0, 4)"><br>

        <label for="cal2">Segundo Valor:</label>
        <input type="number" class="medidas" required name="cal2" id="cal2" placeholder="Digite o segundo valor" oninput="this.value = this.value.slice(0, 4)"><br>

        <label>Selecione o Operador:</label>
        <select name="obj" required>
            <option value="">Selecione...</option>
            <option value="1">Soma</option>
            <option value="2">Subtração</option>
            <option value="3">Multiplicação</option>
            <option value="4">Divisão</option>
        </select>

        <?php

        function soma($cal1, $cal2) {
            return $cal1 + $cal2;
        }

        function sub($cal1, $cal2) {
            return $cal1 - $cal2;
        }

        function multi($cal1, $cal2) {
            return $cal1 * $cal2; // Correção para multiplicação
        }

        function divi($cal1, $cal2) {
            return $cal1 / $cal2; // Correção para divisão
        }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['enviar'])) {
        $cal1 = $_GET['cal1'];
        $cal2 = $_GET['cal2'];
        $obj = $_GET['obj'];
        $result = null;

        if ($obj == "1") {
            $result = soma($cal1, $cal2);
        } elseif ($obj == "2") {
            $result = sub($cal1, $cal2);
        } elseif ($obj == "3") {
            $result = multi($cal1, $cal2);
        } elseif ($obj == "4") {
            if ($cal2 != 0) {
                $result = divi($cal1, $cal2);
            } else {
                echo "<div id='texto'>Divisão por zero não é permitida.</div>";
            }
        }
    
        if ($result !== null) {
            echo "<div id='texto'>Resultado: $result</div>";
        }
    }
    ?>

        <input type="submit" name="enviar" id="enviar" value="Calcular">
        <input type="reset" name="limpar" id="limpar" value="Limpar">
    </form>

    


</body>
</html>
