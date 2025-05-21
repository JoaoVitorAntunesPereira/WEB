package br.edu.ifpr.biblioteca_spring.services;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertNotNull;
import static org.junit.jupiter.api.Assertions.assertThrows;
import static org.junit.jupiter.api.Assertions.assertTrue;
import static org.assertj.core.api.Assertions.assertThat;

import java.util.List;
import java.util.Optional;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;

import br.edu.ifpr.biblioteca_spring.exceptions.UsuarioException;
import br.edu.ifpr.biblioteca_spring.models.Usuario;
import br.edu.ifpr.biblioteca_spring.service.UsuariosService;

@SpringBootTest
public class UsuariosServiceUnitTest {

    @Autowired
    private UsuariosService usuariosService;


    @Test
    public void deveRetornarTodosOsUsuarios(){

        List<Usuario> resultado = usuariosService.listarTodos();

        assertNotNull(resultado, "A lista de usuários não deve ser nula.");

        assertTrue(resultado.size() > 0, "A lista de usuários deve conter pelo menos um usuário.");
    }

    @Test
    public void deveRetornarUsuarioExistente(){
        //Arrange

        //Act
        Optional<Usuario> resultado = usuariosService.buscarPorId(1L);

        //Assert
        assertNotNull(resultado);
    }

    @Test
    public void deveRetornarExcecaoPorUsuarioInexistente(){
        //Arrange

        //Act
        UsuarioException exception = assertThrows(UsuarioException.class, () -> {
            usuariosService.buscarPorId(4L);
        });

        //Assert
        assertEquals(exception.getMessage(),"Usuario inexistente.");
    }

    @Test
    public void deveAdicionarUsuario(){
        //Arrange
        Usuario usuario = new Usuario(null, "joao", "11723323985");

        //Act
        Usuario resultado = usuariosService.adicionar(usuario);

        //Assert
        assertThat(resultado).isNotNull();
    }

    @Test
    public void naoDeveAdicionarUsuarioPorNomeInvalido(){

        Usuario usuario = new Usuario(null, "", "11723323985");
        
        assertThrows(UsuarioException.class, () -> {
            usuariosService.adicionar(usuario);
        });
        
    }

    @Test
    public void naoDeveAdicionarUsuarioPorCpfInvalido(){

        Usuario usuario = new Usuario(null, "joao", "123");
        
        
        assertThrows(UsuarioException.class, () -> {
            usuariosService.adicionar(usuario);
        });
    }
}
