<?php

namespace App\Dao;

use App\Util\Connection;
use App\Mapper\JogoMapper;
use App\Model\Jogo;
use App\Model\Genero;

use \Exception;
class GeneroDAO{
    public function list(){
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM genero";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $generos = $this->mapGenero($result);
        return $generos;
    }

    private function mapGenero($registros){
        $generos = array();

        foreach ($registros as $value) {
            $genero = new Genero();
            $genero->setId($value["id"]);
            $genero->setNome($value["nome"]);

            array_push($generos, $genero);
        }

        return $generos;
    }
}