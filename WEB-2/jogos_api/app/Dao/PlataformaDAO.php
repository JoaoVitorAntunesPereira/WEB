<?php

namespace App\Dao;

use App\Util\Connection;
use App\Mapper\JogoMapper;
use App\Model\Jogo;
use App\Model\JogoGenero;
use App\Model\Plataforma;

use \Exception;


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