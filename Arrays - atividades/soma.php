<?php


$numeros = array(10, 20, 30, 40, 50);


$soma = array_sum($numeros);
$media = $soma / count($numeros);


echo "A soma dos números é: " . $soma ."<br>";
echo "A médiados números é: " . $media;
?>