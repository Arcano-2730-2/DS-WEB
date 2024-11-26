<?php 
    $frutas = array("Banana", "Melancia", "Abacaxi", "Maça", "Melão");
    
    $frutas[] = "Laranja";

    sort($frutas);

    foreach ($frutas as $fruta) {
        echo $fruta . "<br>";
    }
?>