package com.spring.projects.ordem_de_servico_api.exception;

public class ComentarioException extends RuntimeException{

    public ComentarioException(){}

    public ComentarioException(String mensagem){
        super(mensagem);
    }
    
}
