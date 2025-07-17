package com.spring.projects.ordem_de_servico_api.exception;

import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.ControllerAdvice;
import org.springframework.web.bind.annotation.ExceptionHandler;

@ControllerAdvice
public class GlobalExceptionHandler {
    
    @ExceptionHandler(ClienteException.class)
    public ResponseEntity<String> handleDataIntegrityViolation(ClienteException exception){
        String mensagem = "Email já cadastrado";

        return ResponseEntity.status(409).body(mensagem);
    }

    @ExceptionHandler(OrdemServicoException.class)
    public ResponseEntity<String> handleInternalError(OrdemServicoException exception){
        return ResponseEntity.status(400).body(exception.getMessage());
    }

    @ExceptionHandler(OrdemServicoNotFoundException.class)
    public ResponseEntity<String> handleOrdemServicoNotFound(OrdemServicoNotFoundException exception){
        return ResponseEntity.status(404).body(exception.getMessage());
    }

}
