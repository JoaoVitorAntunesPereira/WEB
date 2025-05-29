package br.edu.ifpr.estudante_error_handler.controllers;

import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.post;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.status;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.view;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.web.servlet.AutoConfigureMockMvc;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.web.servlet.MockMvc;

@SpringBootTest(webEnvironment = SpringBootTest.WebEnvironment.RANDOM_PORT)
@AutoConfigureMockMvc
public class EstudanteIntegrationTest {

    @Autowired
    private MockMvc mockRequest;

    @Test
    public void deRetornarAViewDeCadastroDoEstudate() throws Exception {

        mockRequest.perform(get("/estudante"))
        .andExpect(status().isOk())
        .andExpect(view().name("estudante-cadastro"));
    }

    @Test
    public void deveCadastrarUmEstudanteComSucesso() throws Exception{

        mockRequest.perform(post("/estudante")
        .param("nome", "João")
        .param("matricula", "12345678")
        .param("CPF", "687.539.539-83")
        .param("dataNascimento", "1989-05-12"))
        .andExpect(view().name("sucesso"));
    }

    @Test
    public void deveVoltarParaOCadastroEmCasoDeErro() throws Exception{

        mockRequest.perform(post("/estudante")
        .param("nome", "") //nome inválido
        .param("matricula", "12345678")
        .param("CPF", "687.539.539-83")
        .param("dataNascimento", "1989-05-12"))
        .andExpect(view().name("estudante-cadastro"));
    }
    
}
