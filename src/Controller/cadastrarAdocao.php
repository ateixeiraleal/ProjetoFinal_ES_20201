<?php
include_once '..\Persistence\connection.php';
include_once '..\Model\adocao.php';
include_once '..\Persistence\adocaoDAO.php';
	
    $codigoPet = $_POST['P'];
    $codigoDoador = $_POST['D'];
    $codigoAdotante = $_POST['A'];

	// instanciando uma conexão e retornando os dados desta conexão.
	$conexao = new Connection();
	$conexao = $conexao->getConnection();

	// instanciando um usuario com os valores recebidos do formulário.
	$adocao = new Adocao($codigoPet, $codigoDoador, $codigoAdotante);

	$adocaodao = new AdocaoDAO();
	$adocaodao->cadastrarAdocao($adocao, $conexao);

?> 