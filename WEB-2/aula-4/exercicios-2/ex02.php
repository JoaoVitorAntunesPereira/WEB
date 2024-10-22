<?php

function calcularAreaRetangulo($base, $altura){
  return $base * $altura;
}

function calcularPerimetroRetangulo($l1, $l2){
  return (2 * $l1) + (2 * $l2);
}

for($i = 0; $i < 3; $i++){
  $array = gerar2NumerosAleatorios();
  $area = calcularAreaRetangulo($array[0], $array[1]);
  $perimetro = calcularPerimetroRetangulo($array[0], $array[1]);
  echo "Lado 1: ".$array[0].", Lado 2: ".$array[1]."<br> Área: ".$area."<br>";
  echo "Perímetro: ".$perimetro."<br>";
  echo "<br>";
}

function gerar2NumerosAleatorios(){
  $array = [];
  for($i = 0; $i < 2; $i++){
    $array[$i] = mt_rand(5, 20);
  }
  return $array;
}