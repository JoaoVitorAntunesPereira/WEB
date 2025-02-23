<?php

class UsuarioService{

    public function validarDadosLogin(string $login, string $senha){
        $erros = array();

        if(! $login){
            array_push($erros, "O campo Login é obrigatório.");
        }

        if(! $senha){
            array_push($erros, "O campo Senha é obrigatório.");
        }

        return $erros;
    }

    public function salvarUsuarioSessao(Usuario $usuario){
        $this->habilitarSessao();

        $_SESSION['USUARIO_ID'] = $usuario->getId();
        $_SESSION['USUARIO_NOME'] = $usuario->getNome();
    }

    private function habilitarSessao(){
        session_start();
    }

    public function removerUsuarioSessao(){
        $this->habilitarSessao();
        session_unset();
        session_destroy();
    }
}