<?php

namespace App\Mapper;

use App\Model\Jogo;
use App\Model\ClassificacaoIndicativa;
use App\Mapper\ClassificacaoIndicativaMapper;

class JogoMapper {

    public function mapFromDatabaseArrayToObjectArray($regArray) {
        $arrayObj = array();

        foreach($regArray as $reg) {
            $regObj = $this->mapFromDatabaseToObject($reg);
            array_push($arrayObj, $regObj); 
        }

        return $arrayObj;
    }

    public function mapFromDatabaseToObject($regDatabase) {
        $obj = new Jogo();
    
        if (isset($regDatabase['id'])) {
            $obj->setId($regDatabase['id']);
        }
    
        if (isset($regDatabase['titulo'])) {
            $obj->setTitulo($regDatabase['titulo']);
        }
    
        if (isset($regDatabase['dataLancamento'])) {
            $obj->setDataLancamento($regDatabase['dataLancamento']);
        }
    
        if (isset($regDatabase['desenvolvedor'])) {
            $obj->setDesenvolvedor($regDatabase['desenvolvedor']);
        }
    
        if (isset($regDatabase['distribuidora'])) {
            $obj->setDistribuidora($regDatabase['distribuidora']);
        }
    
        if (isset($regDatabase['id_classificacao'])) {
            $mapper = new ClassificacaoIndicativaMapper();
            $classInd = $mapper->mapFromDatabaseToObject($regDatabase['id_classificacao']);
            $obj->setClassInd($classInd);
        }
        
    
        if (isset($regDatabase['pais_lancamento'])) {
            $obj->setPaisLancamento($regDatabase['pais_lancamento']);
        }
    
        return $obj;
    }
    
    
    public function mapFromJsonToObject($regJson) {
        //Reaproveita o método
        return $this->mapFromDatabaseToObject($regJson);
    }

}