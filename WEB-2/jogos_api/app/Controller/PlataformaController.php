<?php


namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\PlataformaDAO;
use App\Mapper\JogoMapper;
use App\Service\JogoService;
use App\Util\MensagemErro;
use App\Model\JogoPlataforma;

use \PDOException;

class PlataformaController {
    private PlataformaDAO $plataformaDao;

    public function __construct() {
        $this->plataformaDao = new PlataformaDAO();
    }

    public function listar() {
        $plataformas = $this->plataformaDao->list();
        return $plataformas;
    }

}