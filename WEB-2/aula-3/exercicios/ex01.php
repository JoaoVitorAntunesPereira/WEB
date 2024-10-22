<?php 

$animais = array("Cachorro", "Gato", "Boi", "Cavalo", "Peixe");

$nomes = array("JOão", "VItor", "Antunes","Pereira","nada");

$numeros = array(1, 2, 3, 4, 5);

$tudo = array(1.34, "b", 3.14, "nomes",'a');

echo "<ol>";
foreach($animais as $valor){
    echo "<li>".$valor."</li>";
}
echo "</ol>";

echo "<br>";

echo "<ol>";
foreach($nomes as $valor){
    echo "<li>".$valor."</li>";
}
echo "</ol>";

echo "<br>";

echo "<ol>";
foreach($numeros as $valor){
    echo "<li>".$valor."</li>";
}
echo "</ol>";

echo "<br>";

echo "<ol>";
foreach($tudo as $valor){
    echo "<li>".$valor."</li>";
}
echo "</ol>";
