<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Plataforma.php");
include_once(__DIR__ . "/../model/Jogo.php");
include_once(__DIR__ . "/../model/ClassificacaoIndicativa.php");

class JogoDAO{
    public function list(){
        $conn = Connection::getConnection();

        $sql = "SELECT j.*, c.descricao descricao_classificacao, c.id id_classificacao FROM jogo j JOIN classificacao_indicativa c ON(c.id = j.id_classificacao)";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $jogos = $this->mapJogos($result);
        return $jogos;
    }

    private function mapJogos($registros){
        $jogos = array();

        foreach ($registros as $value) {
            $jogo = new Jogo();
            $classInd = new ClassificacaoIndicativa();

            $jogo->setId($value["id"]);
            $jogo->setTitulo($value["titulo"]);
            $jogo->setDataLancamento($value["data_lancamento"]);
            $jogo->setDesenvolvedor($value["desenvolvedor"]);
            $jogo->setDistribuidora($value["distribuidora"]);
            $classInd->setId($value["id_classificacao"]);
            $classInd->setDescricao($value["descricao_classificacao"]);
            $jogo->setClassInd($classInd);
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

    public function delete(int $id){
        $conn = Connection::getCOnnection();

        $sql = "DELETE FROM jogo WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($id));
    }

    public function searchById(int $id){
        $conn = Connection::getConnection();

        $sql = "SELECT j.*, c.descricao descricao_classificacao, c.id id_classificacao FROM jogo j JOIN classificacao_indicativa c ON(c.id = j.id_classificacao) WHERE j.id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($id));

        $result = $stm->fetchAll();

        $jogo = $this->mapJogos($result);

        return $jogo;
    }
}