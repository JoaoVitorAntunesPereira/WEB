package com.spring.projects.ordem_de_servico_api.services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.spring.projects.ordem_de_servico_api.models.Comentario;
import com.spring.projects.ordem_de_servico_api.repositories.ComentarioRepository;

@Service
public class ComentarioService {

    @Autowired
    ComentarioRepository comentarioRepository;

    public List<Comentario> findAll() {
        return comentarioRepository.findAll();
    }
    
}
