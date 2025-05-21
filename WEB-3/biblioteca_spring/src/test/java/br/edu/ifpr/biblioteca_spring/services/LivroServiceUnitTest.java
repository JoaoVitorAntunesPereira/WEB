package br.edu.ifpr.biblioteca_spring.services;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertFalse;
import static org.junit.jupiter.api.Assertions.assertThrows;
import static org.junit.jupiter.api.Assertions.assertTrue;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;

import br.edu.ifpr.biblioteca_spring.exceptions.LivroException;
import br.edu.ifpr.biblioteca_spring.models.Emprestimo;
import br.edu.ifpr.biblioteca_spring.models.Livro;
import br.edu.ifpr.biblioteca_spring.models.Usuario;
import br.edu.ifpr.biblioteca_spring.service.EmprestimoService;
import br.edu.ifpr.biblioteca_spring.service.LivroService;

@SpringBootTest
public class LivroServiceUnitTest {

    @Autowired
    LivroService livroService = new LivroService();

    @Autowired
    EmprestimoService emprestimoService = new EmprestimoService();

    @Test
    public void deveAdicionarLivro() {

        // Arrange
        String titulo = "Titulo do livro";
        String autor = "NInguem";

        // Act
        Livro livro = livroService.adicionar(titulo, autor);

        // Arrange
        assertEquals(livro.getTitulo(), titulo);
        assertEquals(livro.getAutor(), autor);
    }

    @Test
    public void deveRetornarTituloInvalido() {
        // Arrange
        String titulo = "";
        String autor = "NInguem";

        // Act
        LivroException exception = assertThrows(LivroException.class, () -> {
            livroService.adicionar(titulo, autor);
        });

        // Arrange
        assertEquals(exception.getMessage(), "Título inválido");
    }

    @Test
    public void deveRetornarAutorInvalido() {
        // Arrange
        String titulo = "Titulo do livro";
        String autor = "";

        // Act
        LivroException exception = assertThrows(LivroException.class, () -> {
            livroService.adicionar(titulo, autor);
        });

        // Arrange
        assertEquals(exception.getMessage(), "Autor inválido");
    }

    @Test
    public void deveMarcarLivroComoDisponivelAposDevolucao(){
        
        // Arrange
        String titulo = "Titulo do livro";
        String autor = "NInguem";

        Livro livro = livroService.adicionar(titulo, autor);

        Usuario usuario = new Usuario(null, "joao", "117233239985");
        
        Emprestimo emprestimo = emprestimoService.emprestarLivro(usuario, livro);

        assertFalse(livro.isDisponivel());

        //Act
        emprestimoService.devolverLivro(emprestimo.getId());

        //Assert
        assertTrue(livro.isDisponivel());

    }


}
