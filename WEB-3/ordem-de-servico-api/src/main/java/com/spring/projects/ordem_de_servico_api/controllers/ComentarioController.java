package com.spring.projects.ordem_de_servico_api.controllers;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.spring.projects.ordem_de_servico_api.models.Comentario;
import com.spring.projects.ordem_de_servico_api.services.ComentarioService;


@RestController
@RequestMapping("/comentarios")
public class ComentarioController {
    
    @Autowired
    ComentarioService comentarioService;

    @GetMapping
    public ResponseEntity<List<Comentario>> findAll(){

        List<Comentario> comentarios = comentarioService.findAll();

        return ResponseEntity.ok(comentarios);
    }

}
