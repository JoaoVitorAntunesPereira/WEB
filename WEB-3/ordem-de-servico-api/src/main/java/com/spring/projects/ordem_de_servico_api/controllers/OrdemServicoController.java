package com.spring.projects.ordem_de_servico_api.controllers;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.spring.projects.ordem_de_servico_api.exception.ComentarioException;
import com.spring.projects.ordem_de_servico_api.exception.OrdemServicoNotFoundException;
import com.spring.projects.ordem_de_servico_api.models.Comentario;
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

    @PutMapping("/{id}/cancelar")
    public ResponseEntity<Void> cancel(@PathVariable Long id){

        Boolean ordemServicoCancelada = ordemServicoService.cancel(id);

        if(ordemServicoCancelada){
            return ResponseEntity.noContent().build();
        }else{
            return ResponseEntity.notFound().build();
        }
    }

    @PutMapping("/{id}/finalizar")
    public ResponseEntity<Void> finish(@PathVariable Long id){

        Boolean ordemServicoFinalizada = ordemServicoService.finish(id);

        if(ordemServicoFinalizada){
            return ResponseEntity.noContent().build();
        }else{
            return ResponseEntity.notFound().build();
        }

    }

    @PostMapping("/{id}/comentar")
    public ResponseEntity<Comentario> coment(@PathVariable Long id, @RequestBody Comentario comentario){

        return ResponseEntity.ok(ordemServicoService.coment(id, comentario));
    }

}
