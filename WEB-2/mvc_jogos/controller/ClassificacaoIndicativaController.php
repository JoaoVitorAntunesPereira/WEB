<?php

include_once(__DIR__ . "/../dao/ClassificacaoIndicativaDAO.php");

class ClassificacaoIndicativaController{
    private ClassificacaoIndicativaDAO $classIndDAO;

    public function __construct(){
        $this->classIndDAO = new ClassificacaoIndicativaDAO();
    }
     
    public function listar(){
        $classIndArray = $this->classIndDAO->list();
        return $classIndArray;
    }
    
}