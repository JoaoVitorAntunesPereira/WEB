<?php


namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\JogoPlataformaDAO;
use App\Mapper\JogoMapper;
use App\Service\JogoService;
use App\Util\MensagemErro;
use App\Model\JogoPlataforma;

use \PDOException;


class JogoPlataformaController {
    private JogoPlataformaDAO $jogoPlataformaDao;

    public function __construct() {
        $this->jogoPlataformaDao = new JogoPlataformaDAO();
    }

    public function listar($id) {
        $plataformas = $this->jogoPlataformaDao->list($id);
        return $plataformas;
    }

    public function inserir(JogoPlataforma $jogoPlataformaObj) {
        $this->jogoPlataformaDao->insert($jogoPlataformaObj);
    }

    public function excluir(int $id){
        $this->jogoPlataformaDao->delete($id);
    }
}