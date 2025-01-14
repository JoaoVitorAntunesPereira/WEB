<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Plataforma.php");
include_once(__DIR__ . "/../model/Jogo.php");
include_once(__DIR__ . "/../model/ClassificacaoIndicativa.php");

class JogoDAO{
    public function list(){
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM jogo";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll;

        $jogos = $this->mapJogos($result);
        return $jogos;
    }

    private function mapJogos($registros){
        $jogos = array();

        foreach ($registros as $value) {
            $jogo = new Jogo();

            $jogo->setId($value["id"]);
            $jogo->setTitulo($value["titulo"]);
            $jogo->setDataLancamento($value["data_lancamento"]);
            $jogo->setDesenvolvedor($value["desenvolvedor"]);
            $jogo->setDistribuidora($value["destribuidora"]);
            $jogo->setClassInd($value["classificacao_indicativa"]);
            array_push($jogos, $jogo);
        }
        return $jogos;
    }

    public function insert(Jogo $jogoObj){
        $conn = Connection::getConnection();

        $titulo = $jogoObj->getTitulo();
        $dataLancamento = $jogoObj->getDataLancamento();
        $desenvolvedor = $jogoObj->getDesenvolvedor();
        $distribuidora = $jogoObj->getDistribuidora();
        $classInd = $jogoObj->getclassInd()->getId();

        $sql = "INSERT INTO jogo (titulo, data_lancamento, desenvolvedor, distribuidora, id_classificacao) VALUES (?, ?, ?, ?, ?)";
        $stm = $conn->prepare($sql);
        $stm->execute(array($titulo, $dataLancamento, $desenvolvedor, $distribuidora, $classInd));
    }

    public function searchId(Jogo $jogoObj){
        $conn = Connection::getConnection();

        $nome = $jogoObj->getTitulo();
        $dataLancamento = $jogoObj->getDataLancamento();
        $desenvolvedor = $jogoObj->getDesenvolvedor();
        $distribuidora = $jogoObj->getDistribuidora();
        $classInd = $jogoObj->getclassInd()->getId();

        $sql = "SELECT id  FROM jogo WHERE titulo = ? AND data_lancamento = ? AND desenvolvedor = ? AND distribuidora = ? AND id_classificacao = ?";

        $stm = $conn->prepare($sql);
        $stm->execute(array($nome, $dataLancamento, $desenvolvedor, $distribuidora, $classInd));

        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['id'] : null; 
    }
}