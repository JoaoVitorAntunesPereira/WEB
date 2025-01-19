<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/JogoPlataforma.php");
include_once(__DIR__ . "/../model/Jogo.php");
include_once(__DIR__ . "/../model/Plataforma.php");

class JogoPlataformaDAO{
    public function list($id){
        $conn = Connection::getConnection();

        $sql = "SELECT jp.*, p.nome FROM jogo_plataforma jp JOIN plataforma p ON (p.id = jp.id_plataforma) WHERE jp.id_jogo = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($id));
        $result = $stm->fetchAll();

        $jogoPlataformas = $this->mapJogoPlataformas($result);
        return $jogoPlataformas;
    }

    private function mapJogoPlataformas($registros){
        $jogoPlataformas = array();

        foreach ($registros as $value) {
            $jogoPlataforma = new JogoPlataforma();
            $jogo = new Jogo();
            $jogo->setId($value["id_jogo"]);
            $plataforma = new Plataforma();
            $plataforma->setId($value["id_plataforma"]);
            $plataforma->setNome($value["nome"]);
            $jogoPlataforma->setJogo($jogo);
            $jogoPlataforma->setPlataforma($plataforma);

            array_push($jogoPlataformas, $jogoPlataforma);
        }

        return $jogoPlataformas;
    }

    public function insert(JogoPlataforma $jogoPlataformaObj){
        $conn = Connection::getConnection();

        $sql = "INSERT INTO jogo_plataforma (id_jogo, id_plataforma) VALUES (?, ?)";
        $stm = $conn->prepare($sql);
        $stm->execute(array($jogoPlataformaObj->getJogo()->getId(), $jogoPlataformaObj->getPlataforma()->getId()));
    }

    public function delete(int $id){
        $conn = Connection::getConnection();

        $sql = "DELETE FROM jogo_plataforma WHERE id_jogo = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($id));
    }
}