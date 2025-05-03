package br.edu.ifpr.foz.validacao_formmularios.models;

import java.time.LocalDate;

import jakarta.validation.constraints.NotNull;
import jakarta.validation.constraints.Size;

public class Estudante {
    
    @NotNull(message = "O nome não pode estar vazio")
    @Size(min = 1, max = 5, message = "O tamanho deve ser entre 1 e 5")
    private String nome;
    private LocalDate dataNascimento;
    private String matricula;

    public Estudante(){
        
    }

    public Estudante(String nome, LocalDate dataNascimento, String matricula) {
        this.nome = nome;
        this.dataNascimento = dataNascimento;
        this.matricula = matricula;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public LocalDate getDataNascimento() {
        return dataNascimento;
    }

    public void setDataNascimento(LocalDate dataNascimento) {
        this.dataNascimento = dataNascimento;
    }

    public String getMatricula() {
        return matricula;
    }

    public void setMatricula(String matricula) {
        this.matricula = matricula;
    }

    
    
}
