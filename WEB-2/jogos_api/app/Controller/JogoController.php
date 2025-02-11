<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\JogoDAO;
use App\Mapper\JogoMapper;
use App\Service\JogoService;
use App\Util\MensagemErro;
use App\Model\Jogo;
use App\Model\ClassificacaoIndicativa;

use \PDOException;

class JogoController{
    private JogoDAO $jogoDao;
    private JogoService $jogoService;
    private JogoMapper $jogoMapper;

    public function __construct(){
        $this->jogoDao = new JogoDAO();
        $this->jogoService = new JogoService();
        $this->jogoMapper = new JogoMapper;
    }

    public function listar(Request $request, Response $response, array $args) : Response{
        $jogos = $this->jogoDao->list();

		$json = json_encode($jogos, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

		$response->getBody()->write($json);
		
		return $response
					->withStatus(200)
					->withHeader("Content-Type" , "application/json");

        return $jogos;
    }

    public function inserir(Request $request, Response $response, array $args): Response {
		$json = $request->getParsedBody();
		
		$jogo = $this->jogoMapper->mapFromJsonToObject($json);

		$jogo = $this->jogoDao->insert($jogo);
		
		//Gerar a resposta
		$json = json_encode($jogo, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

		$response->getBody()->write($json);
		return $response
						->withStatus(201)
						->withHeader("Content-Type" , "application/json");
    }

    public function excluir(int $id){
        $this->jogoDao->delete($id);
    }

    public function alterar(Jogo $jogoObj, array $erros){
        $erros = $this->jogoService->validar($jogoObj, $erros);
        if($erros){
            return $erros;
        }
        $this->jogoDao->edit($jogoObj);
        return array();
    }
}