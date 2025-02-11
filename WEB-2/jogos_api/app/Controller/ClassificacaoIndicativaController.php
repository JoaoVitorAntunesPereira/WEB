<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\ClassificacaoIndicativaDAO;
use App\Mapper\ClubeMapper;
use App\Service\ClubeService;
use App\Util\MensagemErro;

use \PDOException;
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