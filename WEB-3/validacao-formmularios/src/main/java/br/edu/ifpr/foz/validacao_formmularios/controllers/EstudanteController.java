package br.edu.ifpr.foz.validacao_formmularios.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import br.edu.ifpr.foz.validacao_formmularios.models.Estudante;
import jakarta.validation.Valid;



@Controller
public class EstudanteController {
    
    @GetMapping("/estudante")
    public String cadastro(Estudante estudante) {
        return "estudante-cadastro";
    }

    @PostMapping("/estudante")
    public String processarCadastro(@Valid Estudante estudante, BindingResult result, Model model) {
        
        if(result.hasErrors()){
            return "estudante-cadastro";
        }

        model.addAttribute("estudante", estudante);
        return "sucesso";
    }
    
    
}
