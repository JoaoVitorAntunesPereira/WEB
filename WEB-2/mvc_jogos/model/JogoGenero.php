<?php

include_once(__DIR__ . "/Jogo.php");
include_once(__DIR__ . "/Genero.php");

class JogoGenero{
    private ?Jogo $jogo;
    private ?Genero $genero;

    /**
     * Get the value of jogo
     */
    public function getJogo(): ?Jogo
    {
        return $this->jogo;
    }

    /**
     * Set the value of jogo
     */
    public function setJogo(?Jogo $jogo): self
    {
        $this->jogo = $jogo;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero(): ?Genero
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero(?Genero $genero): self
    {
        $this->genero = $genero;

        return $this;
    }
}