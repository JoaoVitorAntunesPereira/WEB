package br.edu.ifpr.biblioteca_spring.exceptions;

public class EmprestimoException extends RuntimeException{
    
    public EmprestimoException(){}

    public EmprestimoException(String message){
        super(message);
    }
}
