package br.edu.ifpr.foz.aula_3;

import org.springframework.ui.Model;

import java.time.LocalDateTime;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

import br.edu.ifpr.foz.aula_3.models.Task;

@Controller
public class ThymeleafController {

    @GetMapping({"","/","/thymeleaf"})
    public String pagina(Model model){

        Task task = new Task(1L, "Ler a doc. do Thymeleaf", LocalDateTime.now());

        model.addAttribute("atributo", "model");
        model.addAttribute("task", task);

        return "pagina";
    }
}
