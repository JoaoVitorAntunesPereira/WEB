<?php
namespace App\Model;

use \JsonSerializable;
class Genero implements JsonSerializable{

    private ?int $id;
    private ?string $nome; 
    
    public function jsonSerialize(): array{
        return array("id" => $this->id,
                     "nome" => $this->nome);
    }
    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }
}