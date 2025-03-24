package br.edu.ifpr.foz.atividade_1;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

@Controller
@RequestMapping("")
public class HelloWorld{
    
    @GetMapping("/hello")
    @ResponseBody
    public String hello(){
        return "Hello World";
    }
}
