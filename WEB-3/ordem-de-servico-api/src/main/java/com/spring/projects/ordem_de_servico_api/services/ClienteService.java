package com.spring.projects.ordem_de_servico_api.services;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.spring.projects.ordem_de_servico_api.exception.ClienteException;
import com.spring.projects.ordem_de_servico_api.models.Cliente;
import com.spring.projects.ordem_de_servico_api.repositories.ClienteRepository;

@Service
public class ClienteService {

    @Autowired
    ClienteRepository clienteRepository;

    public List<Cliente> findAll() {
        return clienteRepository.findAll();
    }

    public Cliente save(Cliente cliente) {

        if(clienteRepository.findByEmail(cliente.getEmail()).isPresent()){
            throw new ClienteException("Email já cadastrado");
        }

        return clienteRepository.save(cliente);
    }
    
}
