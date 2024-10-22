<?php

function ola(){
    echo "Olá Mundo da FUnção!";
}

ola();

echo "<br>";

/*function soma (int $n1, int $n2, int $n3) : int{ com tipagem
    $soma = $n1 + $n2 + $n3;
    return $soma;
}*/

function soma ($n1, $n2, $n3 = 8){
    $soma = $n1 + $n2 + $n3;
    return $soma;
}


$n3 = 5;
$soma = soma(4, 7);

echo $soma;