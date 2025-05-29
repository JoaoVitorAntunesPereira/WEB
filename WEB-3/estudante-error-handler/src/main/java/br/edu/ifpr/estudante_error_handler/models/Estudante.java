package br.edu.ifpr.estudante_error_handler.models;

import java.time.LocalDate;

import org.hibernate.validator.constraints.br.CPF; 

import jakarta.validation.constraints.NotNull;
import jakarta.validation.constraints.Size;

public class Estudante {

    @NotNull(message = "o nome não pode estar vazio")
    @Size(min = 1, max = 25, message = "O nome deve possuir no máximo 25 caracteres")
    private String nome;

    private LocalDate dataNascimento;

    @Size(min = 8, max = 8, message = "o tamanho de matricula deve ser de 8 caracteres")
    private String matricula;

    @CPF
    private String CPF;
    
    public Estudante(){}

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

    public String getCPF() {
        return CPF;
    }

    public void setCPF(String CPF) {
        this.CPF = CPF;
    }

    @Override
    public int hashCode() {
        final int prime = 31;
        int result = 1;
        result = prime * result + ((nome == null) ? 0 : nome.hashCode());
        result = prime * result + ((dataNascimento == null) ? 0 : dataNascimento.hashCode());
        result = prime * result + ((matricula == null) ? 0 : matricula.hashCode());
        result = prime * result + ((CPF == null) ? 0 : CPF.hashCode());
        return result;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj)
            return true;
        if (obj == null)
            return false;
        if (getClass() != obj.getClass())
            return false;
        Estudante other = (Estudante) obj;
        if (nome == null) {
            if (other.nome != null)
                return false;
        } else if (!nome.equals(other.nome))
            return false;
        if (dataNascimento == null) {
            if (other.dataNascimento != null)
                return false;
        } else if (!dataNascimento.equals(other.dataNascimento))
            return false;
        if (matricula == null) {
            if (other.matricula != null)
                return false;
        } else if (!matricula.equals(other.matricula))
            return false;
        if (CPF == null) {
            if (other.CPF != null)
                return false;
        } else if (!CPF.equals(other.CPF))
            return false;
        return true;
    }


    

}
