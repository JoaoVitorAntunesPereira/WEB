package br.edu.ifpr.estudante_error_handler.exceptions;

public class EstudanteException extends RuntimeException {
    
    public EstudanteException(){}

    public EstudanteException(String message){
        super(message);
    }

}
