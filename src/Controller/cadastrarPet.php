<?php
include_once '..\Persistence\connection.php';
include_once '..\Model\pet.php';
include_once '..\Persistence\petDAO.php';

	// verifica se houve upload de arquivo.
	$msg = false;
	if(isset($_FILES['cImagem'])){
		// pega os 4 últimos caracteres do nome do arquivo '.extensao' e já converte para minúsculo.
		$extensao = strtolower(substr($_FILES['cImagem']['name'], -4));
		// cria um nome pela data do sistema criptografada. Ideal para não haver nomes de arquivos repetidos.
		if(substr($extensao, -4, 1) == ".");
		else
			$extensao = ".".$extensao;
		
		$fileName = md5(time()).$extensao;
		$diretorio = substr("..\img\pets\#", 0, -1);


		// acessa o local temporario do arquivo e enviar para o novo local e já com o novo nome.
		move_uploaded_file($_FILES['cImagem']['tmp_name'], $diretorio.$fileName);

		// pegando os dados do formulário.
		$nome = $_POST['cNome'];
		$tipo = $_POST['cTipo'];
		$sexo = $_POST['cSexo'];
		$doador = $_POST['cDoador'];

		// instanciando uma conexão e retornando os dados desta conexão.
		$conexao = new Connection();
		$conexao = $conexao->getConnection();

		// instanciando um pet com os valores recebidos do formulário.
		$pet = new Pet($fileName, $nome, $tipo, $sexo, $doador);

		// instancia novo pet e chama a função que irá adicionar os dados do pet.
		$petdao = new PetDAO();
		$petdao->salvar($pet, $conexao);
	}

?> 