<?php
class PessoaJuridica{
	private $cnpj;
	private $nome;
	private $email;
	private $senha;
	private $idUsuario;

	function __construct($cnpj, $nome, $email, $senha, $idUsuario){
		$this->cnpj = $cnpj;
		$this->nome = $nome;
		$this->email = $email;
		$this->senha = $senha;
		$this->idUsuario = $idUsuario;
	}

	function getCnpj(){
		return $this->cnpj;
	}

	function getNome(){
		return $this->nome;
	}

	function getEmail(){
		return $this->email;
	}

	function getSenha(){
		return $this->senha;
	}

	function getIdUsuario(){
		return $this->idUsuario;
	}
}

?>