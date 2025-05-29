package br.edu.ifpr.estudante_error_handler.controllers.errors;

import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.ControllerAdvice;
import org.springframework.web.bind.annotation.ExceptionHandler;

import br.edu.ifpr.estudante_error_handler.exceptions.EstudanteException;

@ControllerAdvice
public class GlobalExceptionHandler {
    
    @ExceptionHandler(EstudanteException.class)
    public String validacaoEstudanteException(EstudanteException ex, Model model){


        model.addAttribute("erro", "Um problema ocorreu");
        model.addAttribute("descricao", ex.getMessage());

        return "error/error";

    }

    @ExceptionHandler(Exception.class)
    public String validacaoGenericaException(Exception ex, Model model){

        model.addAttribute("erro", "Um problema ocorreu");
        model.addAttribute("descricao", ex.getMessage());

        return "error/error";
    }
}
