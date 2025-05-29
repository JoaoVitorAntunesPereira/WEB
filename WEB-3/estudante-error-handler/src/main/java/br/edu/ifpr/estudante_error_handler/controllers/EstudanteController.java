package br.edu.ifpr.estudante_error_handler.controllers;

import java.io.IOException;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import jakarta.validation.Valid;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import br.edu.ifpr.estudante_error_handler.exceptions.EstudanteException;
import br.edu.ifpr.estudante_error_handler.models.Estudante;


@Controller
public class EstudanteController {  

    @GetMapping({"", "/", "/estudante"})
    public String cadastro(Estudante estudante) {
        return "estudante-cadastro";
    }

    @PostMapping("/estudante")
    public String processarCadastro(@Valid Estudante estudante, BindingResult fields, Model model, RedirectAttributes redirectAttributes) throws IOException {

        if (fields.hasErrors()) {
            return "estudante-cadastro";
        }

        //processamento (na camada de servico)
        
        redirectAttributes.addFlashAttribute("estudante", estudante);

        return "sucesso";
    }

    @GetMapping("/forcar_erro")
    public String forcarErro(){

        throw new EstudanteException("Um erro aconteceu");

    }
    
}
