<?php

include_once(__DIR__ . "/../../controller/PlataformaController.php");

$plataformaCont = new PlataformaController();
$plataformas = $plataformaCont->listar();

foreach ($plataformas as $value) {
    print_r($value);
    echo "<br>";
}