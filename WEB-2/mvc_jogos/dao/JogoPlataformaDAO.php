<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/JogoPlataforma.php");
include_once(__DIR__ . "/../model/Jogo.php");

class JogoPlataformaDAO{
    public function list(){
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM jogo_Plataforma";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $jogoPlataformas = $this->mapJogoPlataformas($result);
        return $jogoPlataformas;
    }

    private function mapJogoPlataformas($registros){
        $jogoPlataformas = array();

        foreach ($registros as $value) {
            $jogoPlataforma = new JogoPlataforma();
            $jogoPlataforma->setId($value["id"]);
            $jogoPlataforma->setJogo($value["id_jogo"]);
            $jogoPlataforma->setPlataforma($value["id_plataforma"]);

            array_push($jogoPlataformas, $jogoPlataforma);
        }

        return $jogoPlataforma;
    }
}