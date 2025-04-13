package br.edu.ifpr.foz.atividade_1;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ResponseBody;


@Controller
@RequestMapping("/hello")
public class HelloWorld {
    
    @GetMapping("")
    @ResponseBody
    public String helloWorld(){
        return "Hello World";
    }
}
