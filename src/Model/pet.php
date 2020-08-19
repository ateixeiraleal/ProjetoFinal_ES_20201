<?php
class Pet{
	private $codigoPet;
	private $nome;
	private $tipo;
	private $sexo;
	private $idUsuario;

	function __construct($nome, $tipo, $sexo, $idUsuario){ 
		$this->nome = $nome;
		$this->tipo = $tipo;
		$this->sexo = $sexo;
		$this->idUsuario = $idUsuario;
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