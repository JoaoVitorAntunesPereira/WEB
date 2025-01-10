<?php

include_once(__DIR__ . "/../dao/GeneroDAO.php");

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