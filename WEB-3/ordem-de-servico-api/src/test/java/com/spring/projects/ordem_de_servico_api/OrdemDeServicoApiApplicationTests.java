package com.spring.projects.ordem_de_servico_api;

import java.time.LocalDate;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;

import com.spring.projects.ordem_de_servico_api.models.OrdemServico;
import com.spring.projects.ordem_de_servico_api.models.StatusOrdemServico;
import com.spring.projects.ordem_de_servico_api.repositories.ClienteRepository;
import com.spring.projects.ordem_de_servico_api.repositories.OrdemServicoRepository;

@SpringBootTest
class OrdemDeServicoApiApplicationTests {

	@Autowired
	OrdemServicoRepository ordemServicoRepository;

	@Autowired
	ClienteRepository clienteRepository;

	@Test
	void contextLoads() {
	}

	@Test
	public void adicionarOrdem(){
		OrdemServico ordemServico = new OrdemServico();

		ordemServico.setDataAbertura(LocalDate.now());
		ordemServico.setPreco(190.00);
		ordemServico.setDescricao("Testar Ordem de Serviço");
		ordemServico.setCliente(clienteRepository.getById(1L));
		ordemServico.setStatus(StatusOrdemServico.ABERTA);

		ordemServicoRepository.save(ordemServico);

	}

}
