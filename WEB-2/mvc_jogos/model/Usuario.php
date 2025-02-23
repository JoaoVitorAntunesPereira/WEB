<?php

class Usuario{
    private ?int $id;
    private ?string $nome;
    private ?string $login;
    private ?string $senha;

    //Construtor da classe
    public function __construct($id, $nome, $login, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
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

    /**
     * Get the value of login
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * Set the value of login
     */
    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha(): ?string
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     */
    public function setSenha(?string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }
}