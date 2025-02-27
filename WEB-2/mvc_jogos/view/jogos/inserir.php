<?php

include_once(__DIR__ . "/../../model/Jogo.php");
include_once(__DIR__ . "/../../model/ClassificacaoIndicativa.php");
include_once(__DIR__ . "/../../model/JogoGenero.php");
include_once(__DIR__ . "/../../model/JogoPlataforma.php");
include_once(__DIR__ . "/../../controller/JogoPlataformaController.php");
include_once(__DIR__ . "/../../controller/JogoGeneroController.php");
include_once(__DIR__ . "/../../controller/JogoController.php");

include_once(__DIR__ . "/../include/header.php");
$erros = array();
$jogoObj = null;
$msgErro = "";
$vetJogoGenero = null;
$vetJogoPlataforma = null;

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

    function converterDataParaBanco($data){
        $formatosAceitos = ["d/m/Y", "d-m-Y", "Y-m-d", "Y/m/d"];
        
        foreach($formatosAceitos as $formato){
            $dateTime = DateTime::createFromFormat($formato, $data);
            if($dateTime && $dateTime->format($formato) === $data){
                return $dateTime->format("Y-m-d");
            }
        }
        
        return null;
    }

    if($data_lancamento){
        $data_lancamento = converterDataParaBanco($data_lancamento);
    }

    $jogoObj = new Jogo();
    $jogoObj->setTitulo($titulo);
    $jogoObj->setDataLancamento($data_lancamento);
    $jogoObj->setDesenvolvedor($desenvolvedor);
    $jogoObj->setDistribuidora($distribuidora);

    $classIndObj = new ClassificacaoIndicativa();
    $classIndObj->setId($classInd);
    $jogoObj->setClassInd($classIndObj);

    if($generos == null){
        array_push($erros, "Informe pelo menos 1 gênero.");
    }
    if($plataformas == null){
        array_push($erros, "Informe pelo menos 1 plataforma.");
    }

    $jogoCont = new JogoController();
    $erros = $jogoCont->inserir($jogoObj, $erros);

    if(empty($erros)){
        $id = $jogoCont->buscarId($jogoObj);

        if($id && $generos && $plataformas){
            $jogoPlataformaCont = new JogoPlataformaController();
            $plataformasCheckboxCounter = 0;

            foreach($plataformas as $value){
                if($plataformasCheckboxCounter < 5){
                    $jogoPlataformaObj = new JogoPlataforma();
                    $jogoObj = new Jogo();
                    $jogoObj->setId($id);
                    $jogoPlataformaObj->setJogo($jogoObj);

                    $plataformaObj = new Plataforma();
                    $plataformaObj->setId($value);
                    $jogoPlataformaObj->setPlataforma($plataformaObj);

                    $jogoPlataformaCont->inserir($jogoPlataformaObj);
                    $plataformasCheckboxCounter++;
                }
            }

            $jogoGeneroCont = new JogoGeneroController();
            $generosCheckboxCounter = 0;

            foreach($generos as $value){
                if($generosCheckboxCounter < 5){
                    $jogoGeneroObj = new JogoGenero();
                    $jogoObj = new Jogo();
                    $jogoObj->setId($id);
                    $jogoGeneroObj->setJogo($jogoObj);

                    $generoObj = new Genero();
                    $generoObj->setId($value);
                    $jogoGeneroObj->setGenero($generoObj);

                    $jogoGeneroCont->inserir($jogoGeneroObj);
                    $generosCheckboxCounter++;
                }
            }
        }

        header("location: listar.php");
        exit;
    }else{
        $msgErro = implode("<br>", $erros);
    }
}

include_once(__DIR__ . "/form.php");
require_once(__DIR__ . "/../include/footer.php");
?>
