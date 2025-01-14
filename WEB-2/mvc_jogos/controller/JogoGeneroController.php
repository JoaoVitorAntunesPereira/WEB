<?php

include_once(__DIR__ . "/../dao/GeneroDAO.php");
include_once(__DIR__ . "/../dao/JogoGeneroDAO.php");
include_once(__DIR__ . "/../dao/JogoDAO.php");

class JogoGeneroController {
    private JogoGeneroDAO $jogoGeneroDao;

    public function __construct() {
        $this->jogoGeneroDao = new JogoGeneroDAO();
    }
    
    public function inserir(JogoGenero $jogoGeneroObj) {
        $this->jogoGeneroDao->insert($jogoGeneroObj);
    }

}