<?php

$inicio;
$razao;
$quantidade;

if(isset($_GET['inicio']) != 1){
  echo "Informe o inicio da progressão![inicio='']";
}else 
  if(isset($_GET['razao']) != 1){
    echo "Informe a razão da progressão![razao='']";
}else
  if(isset($_GET['quantidade']) != 1){
    echo "Informe a quantidade de elementos da progressão![quantidade='']";   
}else{
  $inicio = $_GET['inicio'];
  $razao = $_GET['razao']; 
    $quantidade = $_GET['quantidade'];
    construirProgressao($inicio, $razao, $quantidade);
}

function construirProgressao($inicio, $razao, $quantidade){
  $i = 1;
  
  for($i = 1; $i <= $quantidade; $i++){
    echo $inicio."<br>";
    $inicio = $inicio + $razao;
  }
}