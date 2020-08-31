<?php
include_once '..\Persistence\connection.php';
include_once '..\Persistence\petDAO.php';
include_once '..\Persistence\pessoaFisicaDAO.php';
include_once '..\Persistence\pessoaJuridicaDAO.php';
	
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
							<th>Adotante</th>
						</tr>
						<tr>
							<td>
								<img src='".$diretorio."".$registro['imagem']."' width='200' height='200'> 
							</td>
							<td>
								NOME: ".$registro['tipo']."<br>
								SEXO: ".$registro['sexo']."<br>
								Situação: ";
								if($registro['situacao'] == "Disponível"){
									echo "<font color='#0000FF'><strong>".$registro['situacao']."</strong></font>";
								}else{
									echo "<font color='#FF0000'><strong>".$registro['situacao']."</strong></font>";
								} echo "
							</td>
							<td>";
							$doador= new PessoaJuridicaDAO();
							$r2 = $doador->consultarCodigo($registro['doador'], $conexao);
							if($r2->num_rows > 0){
								$registroPJ = $r2->fetch_assoc();
								echo "
									<u><strong>ID: ".$registroPJ['idUsuario']."</strong></u><br><br>
									CNPJ: ".$registroPJ['cnpj']."<br>
									NOME: ".$registroPJ['nome']."<br>
									E-MAIL: ".$registroPJ['email']."";
							} echo "
							</td>
							<td>";
							$adotante= new PessoaFisicaDAO();
							$r3 = $adotante->consultarCodigo($registro['adotante'], $conexao);
							if($r3->num_rows > 0){
								$registroPF = $r3->fetch_assoc();
								echo "
									<u><strong>ID: ".$registroPF['idUsuario']."</strong></u><br><br>
									CPF: ".$registroPF['cpf']."<br>
									NOME: ".$registroPF['nome']."<br>
									E-MAIL: ".$registroPF['email']."";
							} echo "
							</td>
						</tr>
						<tr>";
							if($registro['situacao'] == "Disponível"){ echo "
								<td><a href='confirmarAlteracaoPet.php?id=".$registro['codigoPet']."'>
									<button class='btnSubmit'>ALTERAR</button></a>
								</td>
								<td><a href='confirmarExclusaoPet.php?id=".$registro['codigoPet']."'>
									<button class='btnSubmit'>EXCLUIR</button></a>
								</td>
								<td><form action='cadastrarAdocao.php' method='POST' name='f1'>
									<input type='text' name='P' value='".$registro['codigoPet']."' hidden>
									<input type='text' name='D' value='".$registro['doador']."' hidden>
									Código Adotante: <input type='text' name='A' maxlength='2' size='3' required>
									<input type='submit' name='LGform1' class='btnSubmit' value='ADOTAR'>
								</td></form>
								<td><a href='url'><button class='btnSubmit'>APADRINHAR</button></a></td>";
							} echo "
						</tr>
					</table>
				</div>
			</body>
		</html>";
	}else{
		echo "Não existem pets cadastrados!";
	}

?> 