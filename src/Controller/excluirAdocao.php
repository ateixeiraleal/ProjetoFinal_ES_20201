<?php
include_once '..\Persistence\connection.php';
include_once '..\Persistence\adocaoDAO.php';

    $adocao = $_POST['cAdocao'];
    $pet = $_POST['cPet'];
    $adotante = $_POST['cAdotante'];

	// instanciando uma conexão e retornando os dados desta conexão.
	$conexao = new Connection();
	$conexao = $conexao->getConnection();

	// criando a classe que fará as operações no BD.
	$adocaodao = new AdocaoDAO();
	$resultado = $adocaodao->excluir($adocao, $pet, $adotante, $conexao);
	
	if ($resultado == TRUE) {
		echo "Registro deletado com sucesso!";
	} else {
		echo "Erro ao deletar registro: " . $conexao->error;
	}

?> 