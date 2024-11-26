<?php


$alunos = array(
    array('nome' => 'Ana', 'matematica' => 8, 'portugues' => 7),
    array('nome' => 'Bruno', 'matematica' => 6, 'portugues' => 9),
    array('nome' => 'Carlos', 'matematica' => 7, 'portugues' => 8)
);


foreach ($alunos as $aluno) {
    echo "Nome: " . $aluno['nome'] . "<br>";
    echo "Matemática: " . $aluno['matematica'] . "<br>";
    echo "Português: " . $aluno['portugues'] . "<br>";
    
    
    $media = ($aluno['matematica'] + $aluno['portugues']) / 2;
    echo "Média: " . $media . "<br><br>";
}

?>