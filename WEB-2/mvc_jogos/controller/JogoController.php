<?php

include_once(__DIR__ . "/../dao/JogoDAO.php");

class JogoController{
    private JogoDAO $jogoDao;

    public function __construct(){
        $this->jogoDao = new JogoDAO();
    }

    public function listar(){
        $jogos = $this->jogoDao->list();
        return $jogos;
    }

    public function inserir(Jogo $jogoObj){
        $this->jogoDao->insert($jogoObj);
    }

    public function buscarId(Jogo $jogoObj){
        $id = $this->jogoDao->searchId($jogoObj);
        return $id;
    }
}