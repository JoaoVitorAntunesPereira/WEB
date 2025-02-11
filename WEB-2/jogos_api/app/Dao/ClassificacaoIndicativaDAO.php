<?php

namespace App\Dao;

use App\Util\Connection;
use App\Model\ClassificacaoIndicativa;

use \Exception;
class ClassificacaoIndicativaDAO{
    public function list(){
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM classificacao_indicativa";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $results = $stm->fetchAll();

        $jogos = $this->mapClass($results);
        return $jogos;
    }

    private function mapClass($registros){
        $classIndArray = array();

        foreach ($registros as $value) {
            $classInd = new ClassificacaoIndicativa();

            $classInd->setId($value["id"]);
            $classInd->setdescricao($value["descricao"]);
            array_push($classIndArray, $classInd);
        }

        return $classIndArray;
    }

}