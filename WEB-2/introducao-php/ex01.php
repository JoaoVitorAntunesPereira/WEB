<?php

$numero = 1;    

echo "<h1>Impressão de números de 1 a 10</h1>";
echo "<h2>Em WHILE</h2>";
while($numero <= 10){
    echo "<br>$numero";
    $numero++;
}

$numero = 1;

echo "<h2>Em DO WHILE</h2>";

do{
    echo "<br>$numero";
    $numero++;
}while($numero <= 10);


echo "<h2>Em DO WHILE</h2>";

for($numero = 1; $numero <= 10; $numero++){
    echo "<br> $numero";
}