<?php 
    
    $produto = array(
        "nome" => "Teclado",
        "preco" => 120.50,
        "estoque" => 15
    );
    echo "<ul>
        <li>Nome: {$produto['nome']}</li>
        <li>Preço: R$ {$produto['preco']}</li>
        <li>Estoque: {$produto['estoque']}</li>

        </ul>";
    
    $produto['preco'] = 100.30;

    $unidades = 5;
    $valortotal = $produto["preco"] * $unidades;

    
    echo "<ul>
        <li>Nome: {$produto['nome']}</li>
        <li>Preço: R$ {$produto['preco']}</li>
        <li>Estoque: {$produto['estoque']}</li>
        <li>Unidades Vendidas: $unidades</li>
        <li>Valor Total da Venda: R$ $valortotal</li>
        </ul>";
?>