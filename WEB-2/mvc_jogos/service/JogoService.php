<?php

include_once(__DIR__ . "/../model/Jogo.php");

class JogoService{

    public function validar(Jogo $jogo, array $erros){

        if(!$jogo->getTitulo()){
            array_push($erros, "Informe o título.");
        }
        if(!$jogo->getDataLancamento()){
            array_push($erros, "Informe a data de lançamento.");
        }
        if(!$jogo->getDesenvolvedor()){
            array_push($erros, "Informe o desenvolvedor.");
        }
        if(!$jogo->getDistribuidora()){
            array_push($erros, "Informe a distribuidora.");
        }
        if(!$jogo->getClassInd()->getId()){
            array_push($erros, "Informe a classificação indicativa.");
        }
        return $erros;
    }
}