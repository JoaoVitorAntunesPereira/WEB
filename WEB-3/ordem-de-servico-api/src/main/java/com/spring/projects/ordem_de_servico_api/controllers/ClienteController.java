package com.spring.projects.ordem_de_servico_api.controllers;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.spring.projects.ordem_de_servico_api.exception.ClienteException;
import com.spring.projects.ordem_de_servico_api.models.Cliente;
import com.spring.projects.ordem_de_servico_api.services.ClienteService;

@RestController
@RequestMapping("/clientes")
public class ClienteController {
    
    @Autowired
    ClienteService clienteService;

    @GetMapping
    public ResponseEntity<List<Cliente>> findAll(){
        
        List<Cliente> clientes = clienteService.findAll();

        if(clientes.size() == 0){
            return ResponseEntity.status(200).body(clientes);
        }

        return ResponseEntity.ok(clientes);

    }

    @PostMapping
    public ResponseEntity<?> save(@RequestBody Cliente cliente){

        try{
            Cliente clienteSaved = clienteService.save(cliente);
            return ResponseEntity.status(201).body(clienteSaved);
        }catch(ClienteException e){
            return ResponseEntity.status(409).body(e.getMessage());
        }
    }

}
