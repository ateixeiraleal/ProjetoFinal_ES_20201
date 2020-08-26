<?php
include_once '..\Persistence\connection.php';
include_once '..\Persistence\petDAO.php';
	
	$codigoPet = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

	// instanciando uma conexão e retornando os dados desta conexão.
	$conexao = new Connection();
	$conexao = $conexao->getConnection();

	// criando a classe que fará as operações no BD.
	$petdao = new PetDAO();
	$resultado = $petdao->consultarPETcodigo($codigoPet, $conexao);

	// se a quantidade de linhas for maior que zero há dados a serem processados.
	if($resultado->num_rows > 0){
		$diretorio = substr("..\img\pets\#", 0, -1);
		$registro = $resultado->fetch_assoc();
		echo "<html>
		    <head>
		        <link href='..\CSS\style.css' rel='stylesheet' type='text/css'/>
		        <title>Pet For Friend</title>
		    </head>
		    <body>
			    <div class='fundoTela'>
					<h2 class='titulo'>MÓDULO DE CONSULTAS</h2>
					<h2 class='subtitulo'>".$registro['nome']."</h2>
					<table>
						<tr>
							<th>FOTO</th>
							<th>INFORMAÇÕES</th>
							<th>DOADOR</th>
							<th>CONTATOS</th>
						</tr>
						<tr>
							<td>
								<img src='".$diretorio."".$registro['imagem']."' width='200' height='200'> 
							</td>
							<td>
								NOME: ".$registro['tipo']."<br>
								SEXO: ".$registro['sexo']."
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td><a href='alterarPet.php?id=".$registro['codigoPet']."'>
								<button class='btnSubmit'>ALTERAR</button></a>
							</td>
							<td><a href='confirmarExclusao.php?id=".$registro['codigoPet']."'>
								<button class='btnSubmit'>EXCLUIR</button></a>
							</td>
							<td><form action='cadastrarAdocao.php' method='POST' name='f1'>
								<input type='text' name='P' value='".$registro['codigoPet']."' hidden>
								<input type='text' name='D' value='".$registro['doador']."' hidden>
								Código Adotante: <input type='text' name='A' maxlength='2' size='3' required>
								<input type='submit' name='LGform1' class='btnSubmit' value='ADOTAR'>
							</td></form>
							<td><a href='url'><button class='btnSubmit'>APADRINHAR</button></a></td>
						</tr>
					</table>
				</div>
			</body>
		</html>";
	}else{
		echo "Não existem pets cadastrados!";
	}

?> 