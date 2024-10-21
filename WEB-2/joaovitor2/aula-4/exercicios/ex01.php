<?php

function fatorial($num){
    $fatorado = 1;
    do{
        $fatorado *= $num;
        $num--;
    }while($num != 1);
    return $fatorado;
}

for ($i = 5; $i <= 12; $i++) { 
    $resultado = fatorial($i);
    echo $resultado."<br>";
}

