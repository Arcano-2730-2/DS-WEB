<?php
    $produtos = array("Teclado", "Mouse", "Monitor");
    $valor = array (150.00, 80.00, 1200.00);

    $loja = array_combine($produtos, $valor);
    print_r ($loja);
    ?>