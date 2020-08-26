<?php
class AdocaoDAO{

	function __construct(){}

	// para salvar deve ser passado como parâmentro um pet e uma conexão.
	function registrar($adocao, $pet, $doador, $adotante, $conn){

        // string do comando em sql.
        $sql = "INSERT INTO adocao(data, pet, doador, adotante) VALUES ('".
            $adocao->getData()."','".
            $adocao->getPet()."','".
            $adocao->getDoador()."','".
            $adocao->getAdotante()."'
        )";

		// manda a string 'comando sql' para o BD.
		if($conn->query($sql) == true){
			echo "Adoção registrada com sucesso!";
		}else {
			echo "Erro na adoção! <br>" .$conn->error;
		}
	}

	function consultarDoacao($conn){
		$sql = "SELECT * FROM doacao";
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}
}

?>