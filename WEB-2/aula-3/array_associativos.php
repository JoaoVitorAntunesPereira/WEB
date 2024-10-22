<?php

$foz = array("nome" => "Foz do Iguaçu",
             "estado" => "PR",
             "qtd_habit" => 250000);

echo $foz["estado"];

$foz["regiao"] = "Sul";

echo "<br>". $foz["regiao"];
echo "<br><br>";

echo "usando print_r <br>";
print_r($foz);

echo "<br><br>";
echo "usando foreach para printar todos os valores: <br>";

foreach ($foz as $valor){
    echo $valor. "<br>";
}

echo "usando foreach para printar a chave e os valores: <br>";

foreach ($foz as $i => $valor){
    echo $i . " = " . $valor. "<br>";
}
