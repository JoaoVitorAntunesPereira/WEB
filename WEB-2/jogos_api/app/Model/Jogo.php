<?php
namespace App\Model;

use \JsonSerializable;

class Jogo implements JsonSerializable{
    private ?INT $id;
    private ?string $titulo;
    private ?string $dataLancamento;
    private ?string $desenvolvedor;
    private ?string $distribuidora;
    private ?ClassificacaoIndicativa $classInd;
    private ?string $pais_lancamento;

    public function jsonSerialize(): array{
        return array("id" => $this->id,
                     "titulo" => $this->titulo,
                     "dataLancamento" => $this->dataLancamento,
                     "desenvolvedor" => $this->desenvolvedor,
                     "distribuidora" => $this->distribuidora,
                     "id_classificacao" => $this->classInd,
                     "pais_lancamento" => $this->pais_lancamento);
    }

    public function __construct(
        ?int $id = null,
        ?string $titulo = null,
        ?string $dataLancamento = null,
        ?string $desenvolvedor = null,
        ?string $distribuidora = null,
        ?ClassificacaoIndicativa $classInd = null,
        ?string $pais_lancamento = null
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->dataLancamento = $dataLancamento;
        $this->desenvolvedor = $desenvolvedor;
        $this->distribuidora = $distribuidora;
        $this->classInd = $classInd ?? new ClassificacaoIndicativa(); // Inicializa com novo objeto se for null
        $this->pais_lancamento = $pais_lancamento;
    }
    
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

    /**
     * Get the value of pais_lancamento
     */
    public function getPaisLancamento(): ?string
    {
        return $this->pais_lancamento;
    }

    /**
     * Set the value of pais_lancamento
     */
    public function setPaisLancamento(?string $pais_lancamento): self
    {
        $this->pais_lancamento = $pais_lancamento;

        return $this;
    }
}