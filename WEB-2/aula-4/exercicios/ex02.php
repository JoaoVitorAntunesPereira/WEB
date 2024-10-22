<?php 

function calcularArea($raio, $pi = 3.14){
    return $pi * $raio * $raio;
}

function calcularCircunferencia($raio, $pi = 3.14){
    return 2 * $pi * $raio;
}

for ($i = 2; $i < 5 ; $i++) { 
    $area = calcularArea($i);
    $circun = calcularCircunferencia($area);
    echo "Área ".$i.": ".$area."<br>";
    echo "Circunferência ".$i.": ".$circun."<br>";
}