<?php

include_once(__DIR__ . "/../dao/PlataformaDAO.php");

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