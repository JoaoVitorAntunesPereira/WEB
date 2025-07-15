package com.spring.projects.ordem_de_servico_api.controllers;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.spring.projects.ordem_de_servico_api.exception.OrdemServicoException;
import com.spring.projects.ordem_de_servico_api.models.OrdemServico;
import com.spring.projects.ordem_de_servico_api.services.OrdemServicoService;

@RestController
@RequestMapping("/ordens")
public class OrdemServicoController {
    
    @Autowired
    OrdemServicoService ordemServicoService;

    @GetMapping
    public ResponseEntity<List<OrdemServico>> findAll(){
        
        List<OrdemServico> ordens = ordemServicoService.findAll();
        
        if(ordens.size() == 0){
            return ResponseEntity.status(204).body(ordens);
        }

        return ResponseEntity.ok(ordens);
    }

    @PostMapping
    public ResponseEntity<OrdemServico> save(@RequestBody OrdemServico ordemServico){

        OrdemServico ordemServicoSaved = ordemServicoService.save(ordemServico);
        return ResponseEntity.status(201).body(ordemServicoSaved);
    }

}
