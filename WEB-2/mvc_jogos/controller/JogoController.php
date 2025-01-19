<?php

include_once(__DIR__ . "/../dao/JogoDAO.php");
include_once(__DIR__ . "/../service/JogoService.php");

class JogoController{
    private JogoDAO $jogoDao;
    private JogoService $jogoService;

    public function __construct(){
        $this->jogoDao = new JogoDAO();
        $this->jogoService = new JogoService();
    }

    public function listar(){
        $jogos = $this->jogoDao->list();
        return $jogos;
    }

    public function inserir(Jogo $jogoObj){
        $erros = $this->jogoService->validar($jogoObj);
        if($erros){
            return $erros;
        }
        $this->jogoDao->insert($jogoObj);
        return array();
    }

    public function buscarId(Jogo $jogoObj){
        $id = $this->jogoDao->searchId($jogoObj);
        return $id;
    }

    public function buscarPorId(int $id){
        $jogo = new Jogo();
        $jogo = $this->jogoDao->searchById($id);
        return $jogo;
    }

    public function excluir(int $id){
        $this->jogoDao->delete($id);
    }
}