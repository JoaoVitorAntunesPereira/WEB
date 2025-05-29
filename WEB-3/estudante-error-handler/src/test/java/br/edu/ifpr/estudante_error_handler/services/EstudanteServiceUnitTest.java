package br.edu.ifpr.estudante_error_handler.services;

import static org.assertj.core.api.Assertions.assertThat;
import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertNotNull;
import static org.junit.jupiter.api.Assertions.assertThrows;
import static org.junit.jupiter.api.Assertions.assertTrue;

import java.time.LocalDate;
import java.util.List;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;

import br.edu.ifpr.estudante_error_handler.exceptions.EstudanteException;
import br.edu.ifpr.estudante_error_handler.models.Estudante;

@SpringBootTest
public class EstudanteServiceUnitTest {

    @Autowired
    private EstudanteService estudanteService;

    @Test
    public void deveCadastrarUmEstudanteComSucesso(){

        //Arrange
        Estudante estudante = new Estudante("John", LocalDate.of(1989, 04, 26), "12181100");

        //Act
        Estudante resultado = estudanteService.cadastrarEstudante(estudante);

        //Assert
        assertThat(resultado).isNotNull();
        assertTrue(resultado.getMatricula().equals("12181100"));

    }

    @Test
    public void deveLancarUmaExcecaoAoCriarEstudantesComMesmaMatricula(){

        //Arrange
        Estudante estudante = new Estudante("Joana", LocalDate.of(1989, 04, 26), "12181117");

        //Act
        estudanteService.cadastrarEstudante(estudante);

        //Assert
        assertThrows(EstudanteException.class, () -> {
            estudanteService.cadastrarEstudante(estudante);
        });
    }

    @Test
    public void deveRetornarUmEstudanteParaUmaMatriculaExistente(){

        //Arrange
        Estudante estudante = new Estudante("Joana", LocalDate.of(1989, 04, 26), "12181119");

        //Act
        estudanteService.cadastrarEstudante(estudante);

        Estudante encontrado = estudanteService.buscarPorMatricula("12181119");

        //Assert
        assertNotNull(encontrado);
        assertEquals("12181119", encontrado.getMatricula());
    }

    @Test
    public void deveLancarUmaExcecaoAoBuscarPorMatriculaInexistente(){

        EstudanteException exception = assertThrows(EstudanteException.class, ()->{
            estudanteService.buscarPorMatricula("9999999");
        });

        assertEquals("estudante não encontrado", exception.getMessage());

    }

    @Test
    public void deveRetornarUmaListaDosEstudantesCadastrados(){
        //Arrange
        Estudante estudante1 = new Estudante("Jean", LocalDate.of(1989, 04, 26), "11122119");
        Estudante estudante2 = new Estudante("Claude", LocalDate.of(1989, 04, 26), "908230813");

        //Act
        estudanteService.cadastrarEstudante(estudante1);
        estudanteService.cadastrarEstudante(estudante2);
        
        List<Estudante> estudantes = estudanteService.buscarTodos();

        //Asserts
        assertTrue(estudantes.contains(estudante1));
        assertTrue(estudantes.contains(estudante2));
        assertThat(estudantes.size()).isGreaterThan(1);

    }



    
}
