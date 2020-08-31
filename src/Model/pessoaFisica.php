<?php

require_once 'usuario.php';

class PessoaFisica extends Usuario{
    private $cpf;
    private $adocao;

    function __construct($cpf, $nome, $email, $senha, $idUsuario){
        parent::__construct ($nome, $email, $senha, $idUsuario);
        $this->cpf = $cpf;
        $this->adocao = null;
    }

    function getCpf(){
        return $this->cpf;
    }

    function getAdocao(){
        return $this->adocao;
    }
}