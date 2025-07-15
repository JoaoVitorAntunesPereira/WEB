package com.spring.projects.ordem_de_servico_api.services;

import java.time.LocalDate;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.spring.projects.ordem_de_servico_api.models.OrdemServico;
import com.spring.projects.ordem_de_servico_api.repositories.OrdemServicoRepository;

@Service
public class OrdemServicoService {

    @Autowired
    OrdemServicoRepository ordemServicoRepository;

    public List<OrdemServico> findAll() {
        return ordemServicoRepository.findAll();
    }
    public OrdemServico save(OrdemServico ordemServico) {

        if(ordemServico.getDataAbertura() == null){
            ordemServico.setDataAbertura(LocalDate.now());
        }

        return ordemServicoRepository.save(ordemServico);
    }
    
}
