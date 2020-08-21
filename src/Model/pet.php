<?php
class Pet{
	private $imagem;
	private $codigoPet;
	private $nome;
	private $tipo;
	private $sexo;
	private $idUsuario;

	function __construct($imagem, $nome, $tipo, $sexo, $idUsuario){ 
		$this->imagem = $imagem;
		$this->nome = $nome;
		$this->tipo = $tipo;
		$this->sexo = $sexo;
		$this->idUsuario = $idUsuario;
	}

	function getImagemPet(){
		return $this->imagem;
	}

	function getCodigoPet(){
		return $this->codigoPet;
	}

	function getNome(){
		return $this->nome;
	}

	function getTipo(){
		return $this->tipo;
	}

	function getSexo(){
		return $this->sexo;
	}

	function getIdUsuario(){
		return $this->idUsuario;
	}
}

?>