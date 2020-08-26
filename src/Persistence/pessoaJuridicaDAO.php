<?php
class PessoaJuridicaDAO{

	function __construct(){}

	// para salvar deve ser passado como parâmentro um usuario e uma conexão.
	function salvar($usuario, $conn){

		// inserção dos dados no BD.
		$sql = "INSERT INTO usuariopj(cnpj, nome, email, senha, idUsuario) VALUES ('".
			$usuario->getCnpj()."','".
			$usuario->getNome()."','".
			$usuario->getEmail()."','".
			$usuario->getSenha()."',".
			$usuario->getIdUsuario().")";

		// manda a string 'comando sql' para o BD.
		if($conn->query($sql) == true){
			echo "Cliente cadastrado com sucesso!";
		}else {
			echo "Erro no cadastro! <br>" .$conn->error;
		}
	}

	function consultarPJs($conn){
		$sql = "SELECT cnpj, nome, email, idUsuario FROM usuariopj";
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}

	// exibe os dados de uma ONG específica.
	function consultarPJcodigo($idUsuario, $conn){
		$sql = "SELECT cnpj, nome, email FROM usuariopj WHERE idUsuario=".$idUsuario;
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}
}
	
?>