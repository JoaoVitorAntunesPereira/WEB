<?php

include_once(__DIR__ . "/../../model/Jogo.php");
include_once(__DIR__ . "/../../model/ClassificacaoIndicativa.php");
include_once(__DIR__ . "/../../controller/JogoPlataformaController.php");
include_once(__DIR__ . "/../../controller/JogoGeneroController.php");
include_once(__DIR__ . "/../../controller/JogoController.php");
include_once(__DIR__."/form.php");



if(isset($_POST["titulo"])){
    $plataformas = array();
    $generos = array();
    $titulo = trim($_POST["titulo"]) ? trim($_POST["titulo"]) : null;
    $data_lancamento = trim($_POST["data_lancamento"]) ? trim($_POST["data_lancamento"]) : null;
    $desenvolvedor = trim($_POST["desenvolvedor"]) ? trim($_POST["desenvolvedor"]) : null;
    $distribuidora = trim($_POST["distribuidora"]) ? trim($_POST["distribuidora"]) : null;
    $generos = isset($_POST["generos"]) ? $_POST["generos"] : [];
    $plataformas = isset($_POST["plataformas"]) ? $_POST["plataformas"] : [];
    
    $classInd = trim($_POST["class-indicativa"]) ?  trim($_POST["class-indicativa"]) : null;

    echo $titulo . "<br>"; 
    echo $data_lancamento . "<br>"; 
    echo $desenvolvedor . "<br>"; 
    echo $distribuidora . "<br>";
    echo $classInd . "<br>";
    foreach ($generos as $value) {
        echo $value . "<br>"; 
    }
    foreach ($plataformas as $value) {
        echo $value . "<br>"; 
    }

    function converterDataParaBanco($data) {
        $formatosAceitos = ["d/m/Y", "d-m-Y", "Y-m-d", "Y/m/d"];
        
        foreach ($formatosAceitos as $formato) {
            $dateTime = DateTime::createFromFormat($formato, $data);
            if ($dateTime && $dateTime->format($formato) === $data) {
                return $dateTime->format("Y-m-d");
            }
        }
        
        return null;
    }
    $data_lancamento = converterDataParaBanco($data_lancamento);
    
    $jogoObj = new Jogo();
    $jogoObj->setTitulo($titulo);
    $jogoObj->setDataLancamento($data_lancamento);
    $jogoObj->setDesenvolvedor($desenvolvedor);
    $jogoObj->setDistribuidora($distribuidora);
    $classIndObj = new ClassificacaoIndicativa();
    $classIndObj->setId($classInd);
    $jogoObj->setClassInd($classIndObj);

    $jogoCont = new JogoController();
    $jogoCont->inserir($jogoObj);

    $id = $jogoCont->buscarId($jogoObj);

    $jogoPlataformaCont = new JogoPlataformaController();
    foreach ($plataformas as $value) {
        $jogoPlataformaObj = new JogoPlataforma();
    
        // Configurar o objeto Jogo
        $jogoObj = new Jogo();
        $jogoObj->setId($id);
        $jogoPlataformaObj->setJogo($jogoObj);
    
        // Configurar o objeto Plataforma
        $plataformaObj = new Plataforma();
        $plataformaObj->setId($value);
        $jogoPlataformaObj->setPlataforma($plataformaObj);
    
        // Inserir no banco
        $jogoPlataformaCont->inserir($jogoPlataformaObj);
    }
    

    foreach ($generos as $value) {
        // Criar um novo objeto JogoGenero
        $jogoGeneroObj = new JogoGenero();
        
        // Configurar o objeto Jogo
        $jogoObj = new Jogo();
        $jogoObj->setId($id);
        $jogoGeneroObj->setJogo($jogoObj);
        
        // Configurar o gênero
        $generoObj = new Genero();
        $generoObj->setId($value);
        $jogoGeneroObj->setGenero($generoObj);
        
        // Inserir no banco
        $jogoGeneroCont = new JogoGeneroController();
        $jogoGeneroCont->inserir($jogoGeneroObj);
    }
    
    
}