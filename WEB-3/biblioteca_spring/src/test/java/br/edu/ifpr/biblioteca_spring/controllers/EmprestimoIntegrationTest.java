package br.edu.ifpr.biblioteca_spring.controllers;

import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.post;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.status;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.view;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.flash;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.model;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.redirectedUrl;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.web.servlet.AutoConfigureMockMvc;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.web.servlet.MockMvc;

@SpringBootTest(webEnvironment = SpringBootTest.WebEnvironment.RANDOM_PORT)
@AutoConfigureMockMvc
public class EmprestimoIntegrationTest {

    @Autowired
    private MockMvc mockRequest;

    @Test
    public void deveRetornarAViewDeListagemDosEnprestimos() throws Exception {

        mockRequest.perform(get("/emprestimos"))
        .andExpect(status().isOk())
        .andExpect(view().name("emprestimos/lista"));
    }

    @Test
    public void devRetornarAViewDeCadastroDeEmprestimo() throws Exception{
        mockRequest.perform(get("/emprestimos/novo"))
        .andExpect(status().isOk())
        .andExpect(view().name("emprestimos/form"));
    }

    @Test
    public void deveRetornarAViewDeListagemDeEmprestimosAposEmprestarComSucesso() throws Exception{
        mockRequest.perform(post("/emprestimos")
        .param("usuarioId", "2")
        .param("livroId", "5"))
        .andExpect(status().is3xxRedirection())
        .andExpect(redirectedUrl("/emprestimos"));
    }

    @Test
    public void deveRetornarAViewDeCriacaoDeEmprestimosAposErroNoEmprestimoPorUsuario() throws Exception{
        mockRequest.perform(post("/emprestimos")
        .param("usuarioId", "4")
        .param("livroId", "5"))
        .andExpect(status().is3xxRedirection())
        .andExpect(redirectedUrl("/emprestimos/novo"));
    }

    @Test
    public void deveRetornarAViewDeCriacaoDeEmprestimosAposErroNoEmprestimoPorLivro() throws Exception{
        mockRequest.perform(post("/emprestimos")
        .param("usuarioId", "2")
        .param("livroId", "10"))
        .andExpect(status().is3xxRedirection())
        .andExpect(redirectedUrl("/emprestimos/novo"));
    }
    
    @Test
    public void deveDevolverLivroComSucesso() throws Exception{
        mockRequest.perform(get("/emprestimos/devolucao?emprestimoId=2"))
        .andExpect(status().is3xxRedirection())
        .andExpect(redirectedUrl("/emprestimos"));
    }

    @Test
    public void naoDeveDevolverLivroComSucesso() throws Exception{
        mockRequest.perform(get("/emprestimos/devolucao?emprestimoId=7"))
        .andExpect(status().is3xxRedirection())
        .andExpect(redirectedUrl("/emprestimos"))
        .andExpect(flash().attribute("erro", "Empréstimo não encontrado."));
    }

}
