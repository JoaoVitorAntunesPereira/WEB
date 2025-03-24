package br.edu.ifpr.foz.atividade_2;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import jakarta.servlet.http.HttpServletRequest;


@Controller
@RequestMapping("/requisicao")
public class Requisicao {
    

    @GetMapping("")
    @ResponseBody
    public String requisicao(HttpServletRequest request){

        return String.format("<html><body> "+
                "<h1>Requisição</h1>" +
                "<p>Método: %s</p>" +
                "<p>URI do pedido: %s</p>" +
                "<p>Protocolo: %s</p>" +
                "</html></body>", request.getMethod(), request.getRequestURI(), request.getProtocol());
    }
}
