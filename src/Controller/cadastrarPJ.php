<?php
	include_once '..\Persistence\connection.php';
	include_once '..\Model\pessoaJuridica.php';
	include_once '..\Persistence\pessoaJuridicaDAO.php';

	$cnpj = $_POST['cCNPJ'];
	$nome = $_POST['cNome'];
	$email = $_POST['cEmail'];
	$senha = $_POST['cSenha'];
	$idUsuario = $_POST['cIdUsuario'];

	// instanciando uma conexão e retornando os dados desta conexão.
	$conexao = new Connection();
	$conexao = $conexao->getConnection();

	// instanciando um usuario com os valores recebidos do formulário.
	$usuario = new PessoaJuridica($cnpj, $nome, $email, $senha, $idUsuario);

	// 
	$usuariodao = new PessoaJuridicaDAO();
	$resultado = $usuariodao->salvar($usuario, $conexao);

	if($resultado == true){
            echo "Cliente cadastrado com sucesso!";
	}else {
            echo "Erro no cadastro! <br>" .$conexao->error;
	}

?>