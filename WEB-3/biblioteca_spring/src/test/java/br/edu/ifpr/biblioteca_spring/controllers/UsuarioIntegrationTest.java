package br.edu.ifpr.biblioteca_spring.controllers;

import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.post;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.status;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.view;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.redirectedUrl;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.model;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.web.servlet.AutoConfigureMockMvc;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.web.servlet.MockMvc;

@SpringBootTest(webEnvironment = SpringBootTest.WebEnvironment.RANDOM_PORT)
@AutoConfigureMockMvc
public class UsuarioIntegrationTest {
    
    @Autowired
    private MockMvc mockRequest;

    @Test
    public void deveRetornarAViewDeListagemDoUsuario() throws Exception {

        mockRequest.perform(get("/usuarios"))
        .andExpect(status().isOk())
        .andExpect(view().name("usuarios/lista"));
    }

    @Test
    public void deveRetornarAViewDeCadastroDeUsuarios() throws Exception {

        mockRequest.perform(get("/usuarios/novo"))
        .andExpect(status().isOk())
        .andExpect(view().name("usuarios/form"));
    }

    @Test
    public void deveRedirecionarParaListagemAposCadastrarUsuarioComSucess() throws Exception {
        mockRequest.perform(post("/usuarios")
                .param("nome", "Carlos"))
            .andExpect(status().is3xxRedirection())
            .andExpect(redirectedUrl("/usuarios"));
    }

    @Test
    public void deveRetornarAViewDeCadastroDeUsuariosPorErroNoCadastro() throws Exception {
        mockRequest.perform(post("/usuarios")
                .param("nome", ""))
            .andExpect(status().isOk())
            .andExpect(view().name("usuarios/form"));
    }
    
}
