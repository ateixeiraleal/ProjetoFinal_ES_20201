<?php
include_once '..\Persistence\connection.php';
include_once '..\Persistence\petDAO.php';

	// instanciando uma conexão e retornando os dados desta conexão.
	$conexao = new Connection();
	$conexao = $conexao->getConnection();

	// criando a classe que fará as operações no BD.
	$petdao = new PetDAO();
	$resultado = $petdao->consultarPets($conexao);

	// se a quantidade de linhas for maior que zero há dados a serem processados.
	if($resultado->num_rows > 0){
		echo "<html>
		    <head>
		        <link href='..\CSS\style.css' rel='stylesheet' type='text/css'/>
		        <title>Pet For Friend</title>
		    </head>
		    <body>
			    <div class='container register'>
		            <h2 class='modulo'>MÓDULO DE CONSULTAS</h2>
		            <h2 id='cadastro'>RELAÇÃO DE PETs</h2>
			    	<table>
						<tr>
						    <th>Código</th>
						    <th>Nome</th>
						    <th>Espécie</th>
						    <th>Sexo</th>
						    <th>idUsuario</th>
						</tr>";

						// enquanto houverem linhas para serem processadas pega uma a uma, joga na variável registro e imprima os campos respectivos.
						while($registro = $resultado->fetch_assoc()){
							echo "<tr>
								<td>" .$registro['codigoPet']. "</td>
								<td>" .$registro['nome']. "</td>
								<td>" .$registro['tipo']. "</td>
								<td>" .$registro['sexo']. "</td>
								<td>" .$registro['idUsuario']. "</td>
							</tr>";
						}
					echo "</table>";
				echo "</div";
			echo "</body>";
		echo "</html>";
	}else{
		echo "Não existem pets cadastrados!";
	}

?> 