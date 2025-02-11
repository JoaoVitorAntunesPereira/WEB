<?php


namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\JogoGeneroDAO;
use App\Mapper\JogoMapper;
use App\Service\JogoService;
use App\Util\MensagemErro;
use App\Model\JogoGenero;

use \PDOException;


class JogoGeneroController {
    private JogoGeneroDAO $jogoGeneroDao;

    public function __construct() {
        $this->jogoGeneroDao = new JogoGeneroDAO();
    }

    public function listar($id) {
        $generos = $this->jogoGeneroDao->list($id);
        return $generos;
    }

    public function inserir(JogoGenero $jogoGeneroObj) {
        $this->jogoGeneroDao->insert($jogoGeneroObj);
    }

    public function excluir(int $id){
        $this->jogoGeneroDao->delete($id);
    }
}