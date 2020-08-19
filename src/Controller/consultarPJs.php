<?php
include_once '..\Persistence\connection.php';
include_once '..\Persistence\pessoaJuridicaDAO.php';

	// instanciando uma conexão e retornando os dados desta conexão.
	$conexao = new Connection();
	$conexao = $conexao->getConnection();

	// criando a classe que fará as operações no BD.
	$usuariodao = new PessoaJuridicaDAO();
	$resultado = $usuariodao->consultarPJs($conexao);

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
						    <th>OPÇÕES</th>
						</tr>";

						// enquanto houverem linhas para serem processadas pega uma a uma, joga na variável registro e imprima os campos respectivos.
						while($registro = $resultado->fetch_assoc()){
							echo "<tr>
								<td>" .$registro['nome']. "</td>
								<td>" .$registro['email']. "</td>
								<td> 
									<a href='Controller\exibirDadosONG.php'><button class='btnSubmit'>EXIBIR</button></a>
									<a href='Controller\exibirVoluntarios.php'><button class='btnSubmit'>VOLUNTARIOS</button></a>
								</td>
							</tr>";
						}
					echo "</table>";
				echo "</div";
			echo "</body>";
		echo "</html>";
	}else{
		echo "Não existem ONGs/Abrigos cadastrados!";
	}

?> 