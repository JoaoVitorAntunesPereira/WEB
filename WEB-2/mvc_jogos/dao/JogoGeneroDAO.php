<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/JogoGenero.php");
include_once(__DIR__ . "/../model/Jogo.php");

class JogoGeneroDAO{
    public function list(){
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM jogo_genero";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $jogoGeneros = $this->mapJogoGeneros($result);
        return $jogoGeneros;
    }

    private function mapJogoGeneros($registros){
        $jogoGeneros = array();

        foreach ($registros as $value) {
            $jogoGenero = new JogoPlataforma();
            $jogoGenero->setJogo($value["id_jogo"]);
            $jogoGenero->setPlataforma($value["id_plataforma"]);

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
}