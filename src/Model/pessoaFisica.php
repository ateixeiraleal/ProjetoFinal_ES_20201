<?php
class PessoaFisica{
	private $cpf;
	private $nome;
	private $email;
	private $senha;
	private $idUsuario;
	private $adocao;

	function __construct($cpf, $nome, $email, $senha, $idUsuario){ 
		$this->cpf = $cpf;
		$this->nome = $nome;
		$this->email = $email;
		$this->senha = $senha;
		$this->idUsuario = $idUsuario;
		$this->adocao = null;
	}

	function getCpf(){
		return $this->cpf;
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

	function getAdocao(){
		return $this->adocao;
	}
}

?>