<?php

include_once(__DIR__ . "/../../model/Jogo.php");
include_once(__DIR__ . "/../../model/JogoGenero.php");
include_once(__DIR__ . "/../../model/JogoPlataforma.php");
include_once(__DIR__ . "/../../controller/JogoController.php");
include_once(__DIR__ . "/../../controller/JogoGeneroController.php");
include_once(__DIR__ . "/../../controller/JogoPlataformaController.php");

include_once(__DIR__ . "/../include/header.php");
$id = $_GET['id'];

$msgErro = "";
$erros = array();
$jogoObj = null;
$vetJogoGenero = null;
$vetJogoPlataforma = null;

$jogoCont = new JogoController();
$jogoGeneroCont = new JogoGeneroController();
$jogoPlataformaCont = new JogoPlataformaController();

if (isset($_POST['titulo'])) {
    $titulo = trim($_POST['titulo']) ? trim($_POST['titulo']) : null;
    $data_lancamento = trim($_POST['data_lancamento']) ? trim($_POST['data_lancamento']) : null;
    $desenvolvedor = trim($_POST['desenvolvedor']) ? trim($_POST['desenvolvedor']) : null;
    $distribuidora = trim($_POST['distribuidora']) ? trim($_POST['distribuidora']) : null;
    $generos = isset($_POST['generos']) ? $_POST['generos'] : [];
    $plataformas = isset($_POST['plataformas']) ? $_POST['plataformas'] : [];
    $classInd = is_numeric($_POST['class-indicativa']) ? $_POST['class-indicativa'] : null;


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
    if($data_lancamento){
        $data_lancamento = converterDataParaBanco($data_lancamento);
    }

    $jogoObj = new Jogo();
    $jogoObj->setId($id);
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

    if(empty($erros)){
        $erros = $jogoCont->alterar($jogoObj, $erros);

        if(empty($erros)){
            $jogoGeneroCont->excluir($id);
            $jogoPlataformaCont->excluir($id);

            foreach ($generos as $generoId) {
                $jogoGeneroObj = new JogoGenero();
                $jogoGeneroObj->setJogo($jogoObj);

                $generoObj = new Genero();
                $generoObj->setId($generoId);
                $jogoGeneroObj->setGenero($generoObj);

                $jogoGeneroCont->inserir($jogoGeneroObj);
            }

            foreach ($plataformas as $plataformaId) {
                $jogoPlataformaObj = new JogoPlataforma();
                $jogoPlataformaObj->setJogo($jogoObj);

                $plataformaObj = new Plataforma();
                $plataformaObj->setId($plataformaId);
                $jogoPlataformaObj->setPlataforma($plataformaObj);

                $jogoPlataformaCont->inserir($jogoPlataformaObj);
            }

            header("location: listar.php");
            exit;
        } else {
            $msgErro = implode("<br>", $erros);
        }
    }
}else{
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if($id){
        $jogoObj = $jogoCont->buscarPorId($id)[0];

        if(!$jogoObj){
            echo "Jogo não encontrado!<br>";
            echo "<a href='listar.php'>Voltar</a>";
            exit;
        }

        $vetJogoGenero = $jogoGeneroCont->listar($id);
        $vetJogoPlataforma = $jogoPlataformaCont->listar($id);
    }else{
        echo "ID inválido!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}

include_once(__DIR__ . "/form.php");

require_once(__DIR__ . "/../include/footer.php");