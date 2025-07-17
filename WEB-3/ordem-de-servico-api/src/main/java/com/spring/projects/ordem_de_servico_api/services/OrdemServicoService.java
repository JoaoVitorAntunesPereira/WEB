package com.spring.projects.ordem_de_servico_api.services;

import java.time.LocalDate;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.spring.projects.ordem_de_servico_api.exception.OrdemServicoException;
import com.spring.projects.ordem_de_servico_api.exception.OrdemServicoNotFoundException;
import com.spring.projects.ordem_de_servico_api.models.Comentario;
import com.spring.projects.ordem_de_servico_api.models.OrdemServico;
import com.spring.projects.ordem_de_servico_api.models.StatusOrdemServico;
import com.spring.projects.ordem_de_servico_api.repositories.ComentarioRepository;
import com.spring.projects.ordem_de_servico_api.repositories.OrdemServicoRepository;

@Service
public class OrdemServicoService {

    private final ComentarioRepository comentarioRepository;

    @Autowired
    OrdemServicoRepository ordemServicoRepository;

    OrdemServicoService(ComentarioRepository comentarioRepository) {
        this.comentarioRepository = comentarioRepository;
    }

    public List<OrdemServico> findAll() {
        return ordemServicoRepository.findAll();
    }

    public OrdemServico save(OrdemServico ordemServico) {

        if(ordemServico.getDataAbertura() == null){
            ordemServico.setDataAbertura(LocalDate.now());
        }

        return ordemServicoRepository.save(ordemServico);
    }

    public OrdemServico findById(Long id) {

        try{
            OrdemServico ordemServico = ordemServicoRepository.findById(id).get();
            return ordemServico;
        }catch(OrdemServicoException e){
            throw new OrdemServicoException("Ordem de Serviço não encontrada");
        }
    }

    public Boolean cancel(Long id) {

        Optional<OrdemServico> ordemServico = ordemServicoRepository.findById(id);

        if(ordemServico.isPresent()){
            ordemServico.get().setStatus(StatusOrdemServico.CANCELADA);
            ordemServicoRepository.save(ordemServico.get());
            return true;
        }else{
            return false;
        }
    }

    public Boolean finish(Long id){
        Optional<OrdemServico> ordemServico = ordemServicoRepository.findById(id);

        if(ordemServico.isPresent()){
            ordemServico.get().setStatus(StatusOrdemServico.FINALIZADA);
            ordemServico.get().setDataFinalizacao(LocalDate.now());
            ordemServicoRepository.save(ordemServico.get());
            return true;
        }else{
            return false;
        }
    }

        
    public Comentario coment(Long id, Comentario comentario) {

        Optional<OrdemServico> ordemServico = ordemServicoRepository.findById(id);

        if(!ordemServico.isPresent()){
            throw new OrdemServicoNotFoundException();
        }

        List<Comentario> comentarios = ordemServico.get().getComentarios();

        comentarios.add(comentario);

        ordemServico.get().setComentarios(comentarios);
        comentario.setDataEnvio(LocalDate.now());
        comentario.setOrdemServico(ordemServico.get());

        return comentarioRepository.save(comentario);
    }
    
}
