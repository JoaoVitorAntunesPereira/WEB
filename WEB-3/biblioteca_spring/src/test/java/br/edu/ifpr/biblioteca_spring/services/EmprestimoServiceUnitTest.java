package br.edu.ifpr.biblioteca_spring.services;
import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertNotNull;
import static org.junit.jupiter.api.Assertions.assertThrows;

import java.time.LocalDate;
import java.util.List;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;

import br.edu.ifpr.biblioteca_spring.models.Emprestimo;
import br.edu.ifpr.biblioteca_spring.models.Livro;
import br.edu.ifpr.biblioteca_spring.models.Usuario;
import br.edu.ifpr.biblioteca_spring.service.EmprestimoService;
import br.edu.ifpr.biblioteca_spring.service.LivroService;
import br.edu.ifpr.biblioteca_spring.service.UsuariosService;

@SpringBootTest
public class EmprestimoServiceUnitTest {
    
    @Autowired
    private UsuariosService usuarioService;

    @Autowired
    private EmprestimoService emprestimoService;

    @Autowired
    private LivroService livroService;

    @Test
    public void deveEmprestarLivro(){

        //Arrange
        Usuario usuario = usuarioService.buscarPorId(1L).get();
        Livro livro = livroService.buscarPorId(3L).get();

        Emprestimo emprestimo = emprestimoService.emprestarLivro(usuario, livro);
        
        assertNotNull(emprestimo);
    }

    @Test
    public void naoDeveEmprestarLivroPorTerTresEmprestimos(){

        //Arrange
        Usuario usuario = usuarioService.buscarPorId(1L).get();
        Livro livro1 = livroService.buscarPorId(3L).get();
        Livro livro2 = livroService.buscarPorId(4L).get();
        Livro livro3 = livroService.buscarPorId(4L).get();

        //Act
        emprestimoService.emprestarLivro(usuario, livro1);
        emprestimoService.emprestarLivro(usuario, livro2);
        IllegalArgumentException exception = assertThrows(IllegalArgumentException.class, () -> {
            emprestimoService.emprestarLivro(usuario, livro3);
        });
        
        //Assert
        assertEquals(exception.getMessage(), "Usuário bloqueado ou com limite de livros atingido.");
    }


    @Test
    public void naoPodeEmprestarPorEstarBloqueado(){
        //Arrange
        Usuario usuario = usuarioService.buscarPorId(1L).get();
        Livro livro = livroService.buscarPorId(4L).get();

        List<Emprestimo> emprestimos = emprestimoService.Usuario(usuario);

        Emprestimo emprestimo = emprestimos.get(0);

        System.out.println(emprestimo.getDataPrevistaDevolucao());

        emprestimo.setDataPrevistaDevolucao(LocalDate.of(2020, 1, 1));

        //Act
        emprestimoService.devolverLivro(emprestimo.getId());

        IllegalArgumentException exception = assertThrows(IllegalArgumentException.class, () -> {
            emprestimoService.emprestarLivro(usuario, livro);
        });

        //Assert
        assertEquals(exception.getMessage(), "Usuário bloqueado ou com limite de livros atingido.");

    }

    @Test
    public void deveRetornarLivroIndisponivel(){

        //Arrange
        Livro livro = livroService.buscarPorId(1L).get();

        Usuario usuario = usuarioService.buscarPorId(2L).get();

        //Act
        IllegalArgumentException exception = assertThrows(IllegalArgumentException.class, () -> {
            emprestimoService.emprestarLivro(usuario, livro);
        });

        //Assert
        assertEquals(exception.getMessage(), "Livro indisponível ou já emprestado.");
    }

    @Test
    public void deveCalcularDataDeDesbloqueioCorretamente(){

        //Arrange
        Usuario usuario = usuarioService.buscarPorId(1L).get();
        Livro livro1 = livroService.buscarPorId(3L).get();
        Livro livro2 = livroService.buscarPorId(4L).get();

        Emprestimo emprestimo1 = emprestimoService.emprestarLivro(usuario, livro1);
        Emprestimo emprestimo2 = emprestimoService.emprestarLivro(usuario, livro2);

        emprestimo1.setDataPrevistaDevolucao(LocalDate.of(2025, 05, 20));
        emprestimo2.setDataPrevistaDevolucao(LocalDate.of(2025, 05, 20));

        //Act
        emprestimoService.devolverLivro(emprestimo1.getId());
        emprestimoService.devolverLivro(emprestimo2.getId());

        //Assert
        assertEquals(LocalDate.of(2025, 06, 02), usuario.getDataDeDesbloqueio());
        
    }


}
