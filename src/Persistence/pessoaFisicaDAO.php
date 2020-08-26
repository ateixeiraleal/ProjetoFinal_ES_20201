<?php
class PessoaFisicaDAO{

	function __construct(){}

	// para salvar deve ser passado como parâmentro um usuario e uma conexão.
	function salvar($usuario, $conn){

		// inserção dos dados no BD.
		$sql = "INSERT INTO usuariopf(cpf, nome, email, senha, idUsuario, adocao) VALUES ('".
			$usuario->getCpf()."','".
			$usuario->getNome()."','".
			$usuario->getEmail()."','".
			$usuario->getSenha()."',".
			$usuario->getIdUsuario()."',".
			$usuario->getAdocao().")";

		// manda a string 'comando sql' para o BD.
		if($conn->query($sql) == true){
			echo "Cliente cadastrado com sucesso!";
		}else {
			echo "Erro no cadastro! <br>" .$conn->error;
		}
	}

	function consultarPFs($conn){
		$sql = "SELECT * FROM usuariopf";
		$resultado = $conn->query($sql); //executa o comando no BD.
		return $resultado;
	}
}

?>