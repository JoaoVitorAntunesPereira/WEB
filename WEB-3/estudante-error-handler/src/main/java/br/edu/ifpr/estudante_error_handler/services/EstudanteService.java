package br.edu.ifpr.estudante_error_handler.services;

import java.util.ArrayList;
import java.util.List;

import org.springframework.stereotype.Service;

import br.edu.ifpr.estudante_error_handler.exceptions.EstudanteException;
import br.edu.ifpr.estudante_error_handler.models.Estudante;

@Service
public class EstudanteService {

    public static List<Estudante> estudantes = new ArrayList<>();

    public List<Estudante> buscarTodos(){
        return estudantes;
    }

    public Estudante buscarPorMatricula(String matricula){

        for (Estudante estudante : estudantes) {
            if (estudante.getMatricula().equals(matricula)) {
                return estudante;
            }
        }

        throw new EstudanteException("estudante não encontrado");
        
    }

    public Estudante cadastrarEstudante(Estudante estudante){

        for (Estudante e : estudantes) {
            if (e.getMatricula().equals(estudante.getMatricula())) {
                throw new EstudanteException("não é possível cadastrar estudantes com a mesma matrícula.");
            }
        }

        estudantes.add(estudante);

        return estudante;

    }
    
}
