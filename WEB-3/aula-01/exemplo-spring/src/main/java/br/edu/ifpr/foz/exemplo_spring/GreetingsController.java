package br.edu.ifpr.foz.exemplo_spring;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;

import org.springframework.web.bind.annotation.RequestParam;




@Controller
@RequestMapping("/greetings")
public class GreetingsController {

    @GetMapping("")
    @ResponseBody
    public String greetings(){
        return "Greetings! Welcome to the Spring Project";
    }

    @GetMapping("/headers") 
    @ResponseBody
    public String getRequestHeaders(HttpServletRequest request){
        String userAgent = request.getHeader("User-Agent");
        return userAgent;
    }

    
}
