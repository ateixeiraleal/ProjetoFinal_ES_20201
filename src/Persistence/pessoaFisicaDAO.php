<?php
class PessoaFisicaDAO{

	function __construct(){}

	// para salvar deve ser passado como parâmentro um usuario e uma conexão.
	function salvar($usuario, $conn){

		// inserção dos dados no BD.
		$sql = "INSERT INTO usuariopf(cpf, nome, email, senha, idUsuario) VALUES ('".
			$usuario->getCpf()."','".
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
}

?>