<?php

abstract class Usuario {
    private $idUsuario;
    private $nome;
    private $email;
    private $senha;
    
    function __construct($nome, $email, $senha, $idUsuario) {
        $this->idUsuario = $idUsuario;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }
}

?>