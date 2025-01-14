<?php

include_once(__DIR__ . "/../dao/PlataformaDAO.php");
include_once(__DIR__ . "/../dao/JogoPlataformaDAO.php");
include_once(__DIR__ . "/../dao/JogoDAO.php");

class JogoPlataformaController {
    private JogoPlataformaDAO $jogoPlataformaDao;

    public function __construct() {
        $this->jogoPlataformaDao = new JogoPlataformaDAO();
    }

    public function listar() {
        $plataformas = $this->jogoPlataformaDao->list();
        return $plataformas;
    }
    public function inserir(JogoPlataforma $jogoPlataformaObj) {
        $this->jogoPlataformaDao->insert($jogoPlataformaObj);
    }

}