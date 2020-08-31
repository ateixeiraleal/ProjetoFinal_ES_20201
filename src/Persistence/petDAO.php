<?php
class PetDAO{

	function __construct(){}

	// para salvar deve ser passado como parâmentro um pet e uma conexão.
	function salvar($pet, $conn){

		// string do comando em sql.
		$sql = "INSERT INTO pet(imagem, nome, tipo, sexo, doador, situacao, adotante, padrinho) VALUES ('".
			$pet->getImagemPet()."','".
			$pet->getNome()."','".
			$pet->getTipo()."','".
			$pet->getSexo()."','".
			$pet->getDoador()."','".
			$pet->getSituacao()."','".
			$pet->getAdotante()."','".
			$pet->getPadrinho()."'
		)";
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}

	function consultarPets($conn){
		$sql = "SELECT * FROM pet";
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}

	// exibe os dados de um pet específico.
	function consultarPETcodigo($codigo, $conn){
		$sql = "SELECT * FROM pet WHERE codigoPet=".$codigo;
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}

	function excluirPETcodigo($codigo, $conn){
		$sql = "DELETE FROM pet WHERE codigoPet=".$codigo;
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}

	function alterarPet($codigo, $pet, $conn){
		$sql = "UPDATE pet SET 
			imagem='".$pet->getImagemPet()."', 
			nome='".$pet->getNome()."', 
			tipo='".$pet->getTipo()."', 
			sexo='".$pet->getSexo()."' 
		WHERE codigoPet=".$codigo;
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}
}

?>