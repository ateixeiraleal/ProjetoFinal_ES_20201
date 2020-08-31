<?php

require_once 'usuario.php';

class PessoaJuridica extends Usuario{
    private $cnpj;

    function __construct($cnpj, $nome, $email, $senha, $idUsuario){
        parent::__construct($nome, $email, $senha, $idUsuario);
        $this->cnpj = $cnpj;
    }

    function getCnpj(){
        return $this->cnpj;
    }
}