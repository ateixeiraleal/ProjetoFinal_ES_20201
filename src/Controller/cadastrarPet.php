<?php
include_once '..\Persistence\connection.php';
include_once '..\Model\pet.php';
include_once '..\Persistence\petDAO.php';

	// pegando os dados do formulário.
	$nome = $_POST['cNome'];
	$tipo = $_POST['cTipo'];
	$sexo = $_POST['cSexo'];
	$idUsuario = $_POST['cIdUsuario'];

	// instanciando uma conexão e retornando os dados desta conexão.
	$conexao = new Connection();
	$conexao = $conexao->getConnection();

	// instanciando um pet com os valores recebidos do formulário.
	$pet = new Pet($nome, $tipo, $sexo, $idUsuario);

	// 
	$petdao = new PetDAO();
	$petdao->salvar($pet, $conexao);

?> 