<?php

function calcularY($x){
  $fx = (5 * $x) + (2 * $x) + 3;
  return $fx;
}

for($i = 5; $i < 11; $i++){
  $x = mt_rand(5, 40);
  $Y = calcularY($x);
  echo "f(x) = 5x + 2x + 3, sendo x = ".$x." : ".$Y."<br>";
}