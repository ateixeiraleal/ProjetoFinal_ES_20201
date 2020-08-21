<?php
include_once '..\Persistence\connection.php';
include_once '..\Persistence\pessoaJuridicaDAO.php';

	// instanciando uma conexão e retornando os dados desta conexão.
	$conexao = new Connection();
	$conexao = $conexao->getConnection();

	// criando a classe que fará as operações no BD.
	$usuariodao = new pessoaJuridicaDAO();
	$resultado = $usuariodao->consultarPJs($conexao);

	// se a quantidade de linhas for maior que zero há dados a serem processados.
	if($resultado->num_rows > 0){
		echo "<html>
		    <head>
		        <link href='..\CSS\style.css' rel='stylesheet' type='text/css'/>
		        <title>Pet For Friend</title>
		    </head>
		    <body>
			    <div class='fundoTela'>
		            <h2 class='titulo'>MÓDULO DE CONSULTAS</h2>
		            <h2 class='subtitulo'>ONGs e ABRIGOS</h2>
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
									<a href='buscarPJlink.php?id=".$registro['idUsuario']."'>
										<img id='img_icon' alt='Exibir' src='..\img\icons\icon_view.png'>
									</a>
									<a href='alterarPJ.php?id=".$registro['idUsuario']."'>
										<img id='img_icon' alt='Alterar' src='..\img\icons\icon_edit.png'>
									</a>
									<a href='excluirPJ.php?id=".$registro['idUsuario']."'>
										<img id='img_icon' alt='Excluir' src='..\img\icons\icon_delete.png'>
									</a>
								</td>
							</tr>";
						}
					echo "</table>
				</div>
			</body>
		</html>";
	}else{
		echo "Não existem ONGs/Abrigos cadastrados!";
	}

?> 