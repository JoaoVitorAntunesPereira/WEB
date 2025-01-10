<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Plataforma.php");

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
            $jogo->setNome($value["nome"]);
            $jogo->setDataLancamento($value["data_lancamento"]);
            $jogo->setDesenvolvedor($value["desenvolvedor"]);
            $jogo->setDistribuidora($value["destribuidora"]);
            $jogo->setGenero($value["genero"]);
            array_push($jogos, $jogos);
        }
    }
}