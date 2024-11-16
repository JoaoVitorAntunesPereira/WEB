<?php

define('DIR_ARQUIVOS', "arquivos");

$id = $_GET["id"];

$dados = array();

$caminhoArquivo = DIR_ARQUIVOS."/carros.json";

if(file_exists($caminhoArquivo)){
    $json = file_get_contents($caminhoArquivo);
    $dados = json_decode($json, true);

    $i = 0;
    foreach ($dados as $key => $value) {
        if($value["id"] == $id){
            array_splice($dados, $i, 1);
        }
        $i++;
    }

    $json = json_encode($dados);
    file_put_contents($caminhoArquivo, $json);

}
header("location: carros.php");
