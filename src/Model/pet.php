<?php

class Pet {
    private $imagem;
    private $codigoPet;
    private $nome;
    private $tipo;
    private $sexo;
	private $doador;
	private $situacao;
	private $adotante;
	private $padrinho;

    function __construct( $imagem, $nome, $tipo, $sexo, $doador) {

        $this->imagem = $imagem;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->sexo = $sexo;
		$this->doador = $doador;
		$this->situacao = 'Disponível';
		$this->adotante = null;
		$this->padrinho = null;
    }

    function getImagemPet() {
        return $this->imagem;
    }

    function getCodigoPet() {
        return $this->codigoPet;
    }

    function getNome() {
        return $this->nome;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getDoador() {
        return $this->doador;
	}
	
	function getSituacao() {
		return $this->situacao;
	}
	 function getAdotante() {
		 return $this->adotante;
	 }

	function getPadrinho() {
		return $this->padrinho;
	}
}

?>