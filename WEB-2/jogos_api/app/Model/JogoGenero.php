<?php

namespace App\Model;

use \JsonSerializable;

class JogoGenero implements JsonSerializable{
    private ?Jogo $jogo;
    private ?Genero $genero;

    public function jsonSerialize(): array{
        return array("jogo" => $this->jogo,
                     "genero" => $this->genero);
    }


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