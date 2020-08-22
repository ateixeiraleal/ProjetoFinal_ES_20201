<?php
include_once '..\Persistence\connection.php';
include_once '..\Persistence\petDAO.php';

	
	$codigo = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

	// instanciando uma conexão e retornando os dados desta conexão.
	$conexao = new Connection();
	$conexao = $conexao->getConnection();

	// criando a classe que fará as operações no BD.
	$petdao = new PetDAO();
	$resultado = $petdao->excluirPETcodigo($codigo, $conexao);
	
	if ($resultado == TRUE) {
		echo "Registro deletado com sucesso!";
	} else {
		echo "Erro ao deletar registro: " . $conexao->error;
	}

?> 