<?php
class AdocaoDAO{

	function __construct(){}

	// para salvar deve ser passado como parâmentro um pet e uma conexão.
	function cadastrarAdocao($adocao, $conn){

		// string do comando em sql.
        $sql = "INSERT INTO adocao(data, pet, doador, adotante) VALUES ('".
			$adocao->getData()."','".
			$adocao->getPet()."','".
			$adocao->getDoador()."','".
			$adocao->getAdotante()."'
		)";
		// manda a string 'comando sql' para o BD.
		if($conn->query($sql) == true){
			echo "Adoção registrada com sucesso! <br>";
			$sql = "UPDATE pet SET adotante='".$adocao->getAdotante()."' WHERE codigoPet=".$adocao->getPet();

			if($conn->query($sql) == true){
				echo "Dados do pet foram atualizado! <br>";

				$sql = "UPDATE usuariopf SET adocao='".$adocao->getPet()."' WHERE idUsuario=".$adocao->getAdotante();
				if($conn->query($sql) == true){
					echo "Dados do usuário foram atualizado! <br>";
				}else {
					echo "Erro na atualização do usuário! <br>" .$conn->error;
				}
			}else {
				echo "Erro na atualização do pet! <br>" .$conn->error;
			}
		}else {
			echo "Erro na adoção! <br>" .$conn->error;
		}

	}

	function consultarAdocoes($conn){
		$sql = "SELECT * FROM adocao";
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}

	// exibe os dados de uma específica.
	function buscarAdocaoLink($codigo, $conn){
		$sql = "SELECT * FROM adocao WHERE id=".$codigo;
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}
}

?>