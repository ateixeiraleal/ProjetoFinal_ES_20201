<?php
	include_once '..\Persistence\connection.php';
	include_once '..\Model\pessoaFisica.php';
	include_once '..\Persistence\pessoaFisicaDAO.php';

	$cpf = $_POST['cCPF'];
	$nome = $_POST['cNome'];
	$email = $_POST['cEmail'];
	$senha = $_POST['cSenha'];
	$idUsuario = $_POST['cIdUsuario'];

	// instanciando uma conexão e retornando os dados desta conexão.
	$conexao = new Connection();
	$conexao = $conexao->getConnection();

	// instanciando um usuario com os valores recebidos do formulário.
	$usuario = new PessoaFisica($cpf, $nome, $email, $senha, $idUsuario);

	$usuariodao = new PessoaFisicaDAO();
	$usuariodao->salvar($usuario, $conexao);

?>