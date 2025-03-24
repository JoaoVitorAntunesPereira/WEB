package br.edu.ifpr.foz.atividade_2;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import jakarta.servlet.http.HttpServletRequest;


@Controller
@RequestMapping("/cabecalhos")
public class Cabecalhos {
    
    @GetMapping("")
    @ResponseBody
    public String cabecalhos(HttpServletRequest request) {
        return String.format("<html><body> "+
                "<h1>Cabeçalhos</h1>" +
                "<p>host: %s</p>" +
                "<p>user-agent: %s</p>" +
                "<p>accept-encoding: %s</p>" +
                "<p>accept-language: %s</p>" +
                "</html></body>", request.getHeader("host"), request.getHeader("user-agent"), request.getHeader("accept-encoding"), request.getHeader("accept-language"));
    }
    
}
