<?php 
$id = $_GET["id"];

define('DIR_ARQUIVOS', "arquivos");
$dados = array();

    //Rotina para ler o arquivo JSON
    $caminhoArquivo = DIR_ARQUIVOS . "/livros.json";
    if(file_exists($caminhoArquivo)){
        $json = file_get_contents($caminhoArquivo);
        $dados = json_decode($json, true);
        $i = 0;

        foreach ($dados as $value) {
            if($value["id"] == $id){
                array_splice($dados, $i, 1);
            }
            $i++;
        }

        $json = json_encode($dados);
        file_put_contents($caminhoArquivo, $json);
    }
    header("location: livros.php");
?>
