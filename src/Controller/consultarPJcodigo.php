<?php
include_once '..\Persistence\connection.php';
include_once '..\Persistence\pessoaJuridicaDAO.php';

	
	$idUsuario = $_POST['cIdUsuario'];

	// instanciando uma conexão e retornando os dados desta conexão.
	$conexao = new Connection();
	$conexao = $conexao->getConnection();

	// criando a classe que fará as operações no BD.
	$usuariodao = new PessoaJuridicaDAO();
	$resultado = $usuariodao->consultarPJcodigo($idUsuario, $conexao);

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
		            <h2 id='cadastro'>RELAÇÃO DE ONGs/ABRIGOS</h2>
			    	<table>
						<tr>
						    <th>Razão Social</th>
						    <th>E-mail</th>
						</tr>";

						// enquanto houverem linhas para serem processadas pega uma a uma, joga na variável registro e imprima os campos respectivos.
						while($registro = $resultado->fetch_assoc()){
							echo "<tr>
								<td>" .$registro['nome']. "</td>
								<td>" .$registro['email']. "</td>
							</tr>";
						}
					echo "</table>";
				echo "</div";
			echo "</body>";
		echo "</html>";
	}else{
		echo "<script>alert('O código informado não pertence a uma ONGs/Abrigos')</script>";
	}

?> 