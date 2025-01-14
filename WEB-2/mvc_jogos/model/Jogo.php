<?php

include_once(__DIR__ . "/ClassificacaoIndicativa.php");

class Jogo{
    private ?INT $id;
    private ?string $titulo;
    private ?string $dataLancamento;
    private ?string $desenvolvedor;
    private ?string $distribuidora;
    private ?ClassificacaoIndicativa $classInd;
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
     * Get the value of titulo
     */
    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo(?string $titulo): self
    {
        $this->titulo = $titulo;

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
     * Get the value of classInd
     */
    public function getClassInd(): ?ClassificacaoIndicativa
    {
        return $this->classInd;
    }

    /**
     * Set the value of classInd
     */
    public function setClassInd(?ClassificacaoIndicativa $classInd): self
    {
        $this->classInd = $classInd;

        return $this;
    }
}