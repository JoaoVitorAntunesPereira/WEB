<?php

class ClassificacaoIndicativa{
    private ?INT $id;
    private ?string $descricao;

    

    /**
     * Get the value of id
     */
    public function getId(): ?INT
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?INT $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     */
    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }
}