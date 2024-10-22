<?php 

$vetor = array(2, 4, 5, 6, 8, 1, 2, 23, 7, 12);
$soma = 0;

foreach ($vetor as $numero) {
    $soma += $numero;
}

echo "A média dos números no array é: ". $soma/count($vetor);