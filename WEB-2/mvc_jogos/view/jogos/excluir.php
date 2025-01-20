<?php

include_once(__DIR__ . "/../../controller/JogoController.php");
include_once(__DIR__ . "/../../controller/JogoGeneroController.php");
include_once(__DIR__ . "/../../controller/JogoPlataformaController.php");

include_once(__DIR__ . "/../include/header.php");
$jogoCont = new JogoController();
$jogoGeneroCont = new JogoGeneroController();
$jogoPlataformaCont = new JogoPlataformaController();

if(isset($_GET["id"])){
    $id = $_GET["id"];

    if($jogoCont->buscarPorId($id)){
        $jogoGeneroCont->excluir($id);
        $jogoPlataformaCont->excluir($id);
        $jogoCont->excluir($id);
    }
}

header("location: listar.php");
require_once(__DIR__ . "/../include/footer.php");