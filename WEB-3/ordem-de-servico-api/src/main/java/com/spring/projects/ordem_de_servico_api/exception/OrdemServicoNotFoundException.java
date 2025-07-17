package com.spring.projects.ordem_de_servico_api.exception;

public class OrdemServicoNotFoundException extends RuntimeException{
    
    public OrdemServicoNotFoundException(){}

    public OrdemServicoNotFoundException(String mensagem){
        super(mensagem);
    }

}
