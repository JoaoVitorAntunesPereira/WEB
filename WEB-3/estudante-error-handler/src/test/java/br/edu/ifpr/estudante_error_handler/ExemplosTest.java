package br.edu.ifpr.estudante_error_handler;

import static org.junit.jupiter.api.Assertions.*;
import static org.assertj.core.api.Assertions.*;

import java.time.LocalDate;
import org.junit.jupiter.api.Test;

import br.edu.ifpr.estudante_error_handler.models.Estudante;

public class ExemplosTest {

    @Test
    public void teste(){
        //AAA
        //Arrange (cenário)
        Estudante e1 = new Estudante("Jefferson", LocalDate.of(1989, 04, 26), "12181100");
        Estudante e2 = new Estudante("Jefferson", LocalDate.of(1989, 04, 26), "12181100");

        //Act (ação)

        //Assert (validação)
        assertTrue(e1.equals(e2));
        assertFalse(false);

        assertEquals(5, 5, "O valores deveriam ser iguais");
        assertEquals(Math.PI, 3.14, 0.01, "O valores deveriam ser iguais");
        assertTrue("TADS".equalsIgnoreCase("tads"));

        assertThat(e1.getNome()).startsWith("Jeffer");

        assertThat(e1.getMatricula()).hasSize(8);

    }
    
}
