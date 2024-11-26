<?php

$produtos = array(
    array('Casa', 10.50, 100),
    array('Carro', 25.00, 50),
    array('Moto', 15.75, 200),
    array('Mochila', 30.00, 0)
);

$valorTotal = 0;

foreach ($produtos as $produto) {
    echo 'Nome: ' . $produto[0] . ' - Preço: R$ ' . $produto[1] . '<br>';
    
    $valorTotal += $produto[1] * $produto[2];
}

echo 'Valor total em estoque: R$ ' . $valorTotal . '<br>';
?>