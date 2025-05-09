<?php

include_once(__DIR__ . "/Jogo.php");
include_once(__DIR__ . "/Plataforma.php");

class JogoPlataforma{
    private ?Jogo $jogo;
    private ?Plataforma $plataforma;
    
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
     * Get the value of plataforma
     */
    public function getPlataforma(): ?Plataforma
    {
        return $this->plataforma;
    }

    /**
     * Set the value of plataforma
     */
    public function setPlataforma(?Plataforma $plataforma): self
    {
        $this->plataforma = $plataforma;

        return $this;
    }
}