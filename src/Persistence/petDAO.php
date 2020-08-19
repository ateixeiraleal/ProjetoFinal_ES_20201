<?php
class PetDAO{

	function __construct(){}

	// para salvar deve ser passado como parâmentro um pet e uma conexão.
	function salvar($pet, $conn){

		// inserção dos dados no BD.
		$sql = "INSERT INTO pet(nome, tipo, sexo, idUsuario) VALUES ('".
			$pet->getNome()."','".
			$pet->getTipo()."','".
			$pet->getSexo()."',".
			$pet->getIdUsuario().")";

		// manda a string 'comando sql' para o BD.
		if($conn->query($sql) == true){
			echo "Cliente cadastrado com sucesso!";
		}else {
			echo "Erro no cadastro! <br>" .$conn->error_log(message);
		}
	}
}

?>