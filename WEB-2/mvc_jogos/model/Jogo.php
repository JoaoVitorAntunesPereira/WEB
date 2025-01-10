<?php

include_once(__DIR__ . "/Genero.php");

class Jogo{
    private ?INT $id;
    private ?string $nome;
    private ?string $dataLancamento;
    private ?string $desenvolvedor;
    private ?string $distribuidora;
    private ?Genero $genero;

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

    /**
     * Get the value of dataLancamento
     */
    public function getDataLancamento(): ?string
    {
        return $this->dataLancamento;
    }

    /**
     * Set the value of dataLancamento
     */
    public function setDataLancamento(?string $dataLancamento): self
    {
        $this->dataLancamento = $dataLancamento;

        return $this;
    }

    /**
     * Get the value of desenvolvedor
     */
    public function getDesenvolvedor(): ?string
    {
        return $this->desenvolvedor;
    }

    /**
     * Set the value of desenvolvedor
     */
    public function setDesenvolvedor(?string $desenvolvedor): self
    {
        $this->desenvolvedor = $desenvolvedor;

        return $this;
    }

    /**
     * Get the value of distribuidora
     */
    public function getDistribuidora(): ?string
    {
        return $this->distribuidora;
    }

    /**
     * Set the value of distribuidora
     */
    public function setDistribuidora(?string $distribuidora): self
    {
        $this->distribuidora = $distribuidora;

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