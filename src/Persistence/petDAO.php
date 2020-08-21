<?php
class PetDAO{

	function __construct(){}

	// para salvar deve ser passado como parâmentro um pet e uma conexão.
	function salvar($pet, $conn){

		// string do comando em sql.
		$sql = "INSERT INTO pet(nome, tipo, sexo, idUsuario) VALUES ('".
			$pet->getNome()."','".
			$pet->getTipo()."','".
			$pet->getSexo()."',".
			$pet->getIdUsuario().")";

		// manda a string 'comando sql' para o BD.
		if($conn->query($sql) == true){
			echo "Pet cadastrado com sucesso!";
		}else {
			echo "Erro no cadastro! <br>" .$conn->error_log(message);
		}
	}

	function consultarPets($conn){
		$sql = "SELECT codigoPet, nome, tipo, sexo, idUsuario FROM pet";
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}

	// exibe os dados de uma ONG específica.
	function consultarPETcodigo($codigo, $conn){
		$sql = "SELECT codigoPet, nome, tipo, sexo, idUsuario FROM pet WHERE codigoPet=".$codigo;
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}

	function excluirPETcodigo($codigo, $conn){
		$sql = "DELETE FROM pet WHERE codigoPet=".$codigo;
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}
}

?>