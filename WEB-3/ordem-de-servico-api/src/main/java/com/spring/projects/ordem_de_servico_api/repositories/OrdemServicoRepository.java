package com.spring.projects.ordem_de_servico_api.repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import com.spring.projects.ordem_de_servico_api.models.OrdemServico;

public interface OrdemServicoRepository extends JpaRepository<OrdemServico, Long> {
    
}
