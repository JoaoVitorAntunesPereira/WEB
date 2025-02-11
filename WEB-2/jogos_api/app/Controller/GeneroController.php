<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\GeneroDAO;
use App\Mapper\JogoMapper;
use App\Service\JogoService;
use App\Util\MensagemErro;
use App\Model\Jogo;

use \PDOException;

class GeneroController {
    private GeneroDAO $generoDao;

    public function __construct() {
        $this->generoDao = new generoDAO();
    }

    public function listar() {
        $generos = $this->generoDao->list();
        return $generos;
    }

}