package br.edu.ifpr.foz.todo_list.exceptions;

public class TaskException extends RuntimeException{
    
    public TaskException(){}

    public TaskException(String message){
        super(message);
    }
}
