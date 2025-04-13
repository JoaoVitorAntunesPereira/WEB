package br.edu.ifpr.foz.atividade_2;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import jakarta.servlet.http.HttpServletRequest;
import org.springframework.web.bind.annotation.GetMapping;


@Controller
@RequestMapping("")
public class Conexao {
    

    @GetMapping("/requisicao")
    @ResponseBody
    public String requisicao(HttpServletRequest request){
        return String.format("<html><body> "+
                            "<p>Método: %s</p>"+
                            "<p>Uri do Pedido: %s</p>"+
                            "<p>Protocolo: %s</p>"+
                            "</html></body>", 
                            request.getMethod(), request.getRequestURI(), request.getProtocol());
    }
    

    @GetMapping("/cabecalhos")
    @ResponseBody
    public String cabecalhos(HttpServletRequest request){
        return String.format("<html><body>"+
                            "<p>Host: %s</p>"+
                            "<p>User-agent: %s</p>  "+
                            "<p>accept-encoding: %s</p>" +
                            "<p>accept-language: %s</p>" +
                            "</html></body>", 
                            request.getHeader("host"), request.getHeader("user-agent"), request.getHeader("accept-encoding"), request.getHeader("accept-language"));
    }
}
