<?php
include_once '..\Persistence\connection.php';
include_once '..\Persistence\pessoaJuridicaDAO.php';
	
	$idUsuario = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

	// instanciando uma conexão e retornando os dados desta conexão.
	$conexao = new Connection();
	$conexao = $conexao->getConnection();

	// criando a classe que fará as operações no BD.
	$usuariodao = new PessoaJuridicaDAO();
	$resultado = $usuariodao->consultarCodigo($idUsuario, $conexao);

	// se a quantidade de linhas for maior que zero há dados a serem processados.
	if($resultado->num_rows > 0){
		$registro = $resultado->fetch_assoc();
		echo "<html>
		    <head>
		        <link href='..\CSS\style.css' rel='stylesheet' type='text/css'/>
		        <title>Pet For Friend</title>
		    </head>
		    <body>
			    <div class='fundoTela'>
		            <h2 class='titulo'>MÓDULO DE CONSULTAS</h2>
		            <h2 class='subtitulo'>" .$registro['nome']. "</h2>
			    	<table>
						<tr>
						    <th>Razão Social</th>
						    <th>E-mail</th>
						    <th>Opções</th>
						</tr>
						<tr>
							<td>" .$registro['nome']. "</td>
							<td>" .$registro['email']. "</td>
							<td>
								<a href='url'>
									<img id='img_icon' alt='Alterar' src='..\img\icons\icon_edit.png'>
								</a>
								<a href='url'>
									<img id='img_icon' alt='Exibir' src='..\img\icons\icon_delete.png'>
								</a>
							</td>
						</tr>
					</table>
				</div
			</body>
		</html>";
	}else{
		echo "<script>alert('O código informado não pertence a uma ONGs/Abrigos')</script>";
	}

?> 