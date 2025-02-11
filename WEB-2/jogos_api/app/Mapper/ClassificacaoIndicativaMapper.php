<?php

namespace App\Mapper;

use App\Model\Jogo;
use App\Model\ClassificacaoIndicativa;

class ClassificacaoIndicativaMapper {

    public function mapFromDatabaseArrayToObjectArray($regArray) {
        $arrayObj = array();

        foreach($regArray as $reg) {
            $regObj = $this->mapFromDatabaseToObject($reg);
            array_push($arrayObj, $regObj); 
        }

        return $arrayObj;
    }

    public function mapFromDatabaseToObject($regDatabase) {
            $classInd = new ClassificacaoIndicativa();
    
            if (isset($regDatabase['id'])) { 
                $classInd->setId($regDatabase['id']);
            }
    
            if (isset($regDatabase['descricao'])) {
                $classInd->setDescricao($regDatabase['descricao']);
            }
        return $classInd;
    }
    
    
    public function mapFromJsonToObject($regJson) {
        //Reaproveita o método
        return $this->mapFromDatabaseToObject($regJson);
    }

}