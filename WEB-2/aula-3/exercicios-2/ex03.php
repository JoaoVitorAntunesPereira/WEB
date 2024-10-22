<?php

$vetor1 = array("Orquídea", "Margarida", "Petúnia");

$vetor2 = array("Laranja", "Maçã", "Limão");

$vetor3 = array("Foz do Iguaçu", "Cascavel", "Toledo");

$vetor4 = array("Itaipu", "Cataratas", "Parque das Aves");

$matriz = array();

$matriz = array($vetor1, $vetor2, $vetor3, $vetor4);

echo "<table border = 1>";
    for($i = 0; $i < count($matriz); $i++){
        echo "<tr>";
        for ($j = 0; $j < count($vetor1); $j++) { 
            echo "<td>";
            echo $matriz[$i][$j];
            echo "</td>";
        }
        echo "</tr>";
    }
echo "</table>";