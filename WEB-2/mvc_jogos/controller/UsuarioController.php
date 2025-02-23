<?php

require_once(__DIR__ . "/../dao/UsuarioDAO.php");
require_once(__DIR__ . "/../service/UsuarioService.php");

class UsuarioController{

    private UsuarioDAO $usuarioDao;
    private UsuarioService $usuarioService;

    public function __construct(){
        $this->usuarioDao = new UsuarioDAO();
        $this->usuarioService = new UsuarioService();
    }

    public function logar(string $login, string $senha){
        $erros = $this->usuarioService->validarDadosLogin($login, $senha);

        if(! empty($erros)){
            return $erros;
        }

        $usuario = $this->usuarioDao->findByLoginSenha($login, $senha);

        if($usuario == null){
            array_push($erros, "Login ou senha inválidos!");
            return $erros;
        }

        $this->usuarioService->salvarUsuarioSessao($usuario);

        return array();
    }

    public function deslogar(){
        $this->usuarioService->removerUsuarioSessao();
    }
}
