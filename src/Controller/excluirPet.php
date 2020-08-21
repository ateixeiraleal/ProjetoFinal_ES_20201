<?php
include_once '..\Persistence\connection.php';
include_once '..\Persistence\petDAO.php';

	
	$codigo = $_POST['cCodigo'];

	// instanciando uma conexão e retornando os dados desta conexão.
	$conexao = new Connection();
	$conexao = $conexao->getConnection();

	// criando a classe que fará as operações no BD.
	$petdao = new PetDAO();
	$resultado = $petdao->consultarPETcodigo($codigo, $conexao);

	/* 
		Fomulário (vídeo: 9min)
	*/

	$resultado = $petdao->excluirPETcodigo($codigo, $conexao);

	
	if ($resultado == TRUE) {
		echo "Registro excluído com sucesso!";
	} else {
		echo "Erro ao deletar registro: " . $conexao->error;
	}

?> 