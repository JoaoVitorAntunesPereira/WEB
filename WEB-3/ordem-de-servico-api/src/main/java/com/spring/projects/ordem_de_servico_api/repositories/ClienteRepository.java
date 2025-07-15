package com.spring.projects.ordem_de_servico_api.repositories;

import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.spring.projects.ordem_de_servico_api.models.Cliente;

public interface ClienteRepository extends JpaRepository<Cliente, Long>{

    @Query("SELECT c FROM Cliente c WHERE c.email = :email")
    Optional<Cliente> findByEmail(String email);
    
}
