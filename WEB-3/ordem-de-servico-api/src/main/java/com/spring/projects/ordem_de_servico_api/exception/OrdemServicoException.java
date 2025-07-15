package com.spring.projects.ordem_de_servico_api.exception;

public class OrdemServicoException extends RuntimeException{
    
    public OrdemServicoException(){}

    public OrdemServicoException(String mensagem){
        super(mensagem);
    }
}
