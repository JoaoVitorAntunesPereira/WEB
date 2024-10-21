<?php

$vetor1 = array("João", "Vitor", "Antunes", "Pereira", "JoãoDeNovo");

$vetor2 = array();

foreach ($vetor1 as $item) {
    array_push($vetor2, $item);
}


foreach ($vetor2 as $item){
    echo $item;
    echo ",";
}