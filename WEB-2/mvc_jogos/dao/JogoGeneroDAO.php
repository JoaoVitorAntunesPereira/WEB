<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/JogoGenero.php");
include_once(__DIR__ . "/../model/Jogo.php");
include_once(__DIR__ . "/../model/Genero.php");

class JogoGeneroDAO{
    public function list($id){
        $conn = Connection::getConnection();

        $sql = "SELECT jg.*, g.nome FROM jogo_genero jg JOIN genero g ON(g.id = jg.id_genero) WHERE jg.id_jogo = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($id));
        $result = $stm->fetchAll();

        $jogoGeneros = $this->mapJogoGeneros($result);
        return $jogoGeneros;
    }

    private function mapJogoGeneros($registros){
        $jogoGeneros = array();

        foreach ($registros as $value) {
            $jogoGenero = new JogoGenero();
            $jogo = new Jogo();
            $jogo->setId($value["id_jogo"]);
            $genero = new Genero();
            $genero->setId($value["id_genero"]);
            $genero->setNome(($value["nome"]));
            $jogoGenero->setJogo($jogo);
            $jogoGenero->setGenero($genero);

            array_push($jogoGeneros, $jogoGenero);
        }

        return $jogoGeneros;
    }

    public function insert(JogoGenero $jogoGeneroObj){
        $conn = Connection::getConnection();

        $sql = "INSERT INTO jogo_genero (id_jogo, id_genero) VALUES (?, ?)";
        $stm = $conn->prepare($sql);
        $stm->execute([$jogoGeneroObj->getJogo()->getId(), $jogoGeneroObj->getGenero()->getId()]);
    }

    public function delete(int $id){
        $conn = Connection::getConnection();

        $sql = "DELETE FROM jogo_genero WHERE id_jogo = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($id));
    }
}