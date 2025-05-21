package br.edu.ifpr.biblioteca_spring.service;
import org.hibernate.validator.internal.constraintvalidators.hv.br.CPFValidator;
import org.springframework.stereotype.Service;

import br.edu.ifpr.biblioteca_spring.exceptions.UsuarioException;
import br.edu.ifpr.biblioteca_spring.models.Usuario;
import jakarta.validation.ConstraintValidatorContext;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.concurrent.atomic.AtomicLong;

@Service
public class UsuariosService {

    private static final List<Usuario> usuarios = new ArrayList<>();
    private static final AtomicLong idGenerator = new AtomicLong();

    public List<Usuario> listarTodos() {
        return new ArrayList<>(usuarios);
    }

    public Optional<Usuario> buscarPorId(Long id) {
        for (Usuario u : usuarios) {
            if (u.getId().equals(id)) {
                return Optional.of(u);
            }
        }
        throw new UsuarioException("Usuario inexistente.");
    }

    public Usuario adicionar(Usuario usuario) {

        CPFValidator cpfValidator = new CPFValidator();
        cpfValidator.initialize(null);

        if (usuario.getNome() == null || usuario.getNome().trim().isEmpty() || usuario.getNome().length() <= 1) {
            throw new UsuarioException("Nome inválido");
        }

        boolean cpfValido = cpfValidator.isValid(usuario.getCpf(), (ConstraintValidatorContext) null);

        if (!cpfValido) {
            throw new UsuarioException("CPF inválido");
        }
        usuario.setId(idGenerator.incrementAndGet());
        usuarios.add(usuario);
        return usuario;
    }
    

    public void limpar() {
        usuarios.clear();
    }
}
