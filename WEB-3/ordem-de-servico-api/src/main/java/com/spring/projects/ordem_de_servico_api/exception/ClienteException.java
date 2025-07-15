package com.spring.projects.ordem_de_servico_api.exception;

public class ClienteException extends RuntimeException {
    
    public ClienteException(){}

    public ClienteException(String mensagem){
        super(mensagem);
    }
}
