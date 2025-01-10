<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Plataforma.php");

class PlataformaDAO{
    public function list(){
        $conn = Connection::getConnection();
        
        $sql = "SELECT * FROM plataforma";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $results = $stm->fetchAll();

        $plataformas = $this->mapPlataformas($results);
        return $plataformas;
    }

    private function mapPlataformas($registros){
        $plataformas = array();

        foreach ($registros as $value) {
            $plataforma = new Plataforma();
            $plataforma->setId($value["id"]);
            $plataforma->setNome($value["nome"]);

            array_push($plataformas, $plataforma);
        }

        return $plataformas;
    }
}