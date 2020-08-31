<?php
require_once('trabalhoES\src\Persistence\connection.php');
require_once('trabalhoES\src\Model\adocao.php');
require_once('trabalhoES\src\Persistence\adocaoDAO.php');
require_once('trabalhoES\src\Persistence\pessoaFisicaDAO.php');

class TestAdocao extends PHPUnit\Framework\TestCase{

	$conexao = new Connection();
	$conexao = $conexao->getConnection();

    public function testeConstruct() {

		// dados de entrada
		$codigoPet = 26;
		$codigoDoador = 8;
		$codigoAdotante = 10;
		
		$obj = new Adocao($codigoPet, $codigoDoador, $codigoAdotante);
		$this->assertEquals($codigoPet, $obj->getPet());
		$this->assertEquals($codigoDoador, $obj->getDoador());
		$this->assertEquals($codigoAdotante, $obj->getAdotante());
	}

	public function testeCadastrarConsultar() {

		// dados de entrada
		$idAdocao = 4; // nova adoção.
		$codigoPet = 26;
		$codigoDoador = 8;
		$codigoAdotante = 4;

		$adocao = new Adocao($codigoPet, $codigoDoador, $codigoAdotante);

		$adocaodao = new AdocaoDAO();
		$adocaodao->cadastrar($adocao, $conexao);

		$obj = $adocaodao->buscarCodigo($idAdocao, $conexao);
		if($obj->num_rows > 0){
			$obj = $obj->fetch_assoc();
			$this->assertEquals($codigoPet, $obj->getPet());
			$this->assertEquals($codigoDoador, $obj->getDoador());
			$this->assertEquals($codigoAdotante, $obj->getAdotante());

			// verificando dados do pet.
			$petdao = new PetDAO();
			$obj = $petdao->consultarPETcodigo($codigoPet, $conexao);
			$obj = $obj->fetch_assoc();
			$this->assertEquals($codigoAdotante, $obj->getAdotante());
			$this->assertEquals("Indisponível", $obj->getSituacao());

			// verificando dados do doador.
			$pfdao = new PessoaFisicaDAO();
			$obj = $pfdao->consultarCodigo($codigoAdotante, $conn);
			$obj = $obj->fetch_assoc();
			$this->assertEquals($codigoPet, $obj->getAdocao());
		}
	}

	function testeAlterar() {

		// dados de entrada
		$idAdocao = 2;
		$idOldPet = 5;
		$idOldAdotante = 1;
		$idNewPet = 12;
		$idNewAdotante = 5;

		$adocaodao = new AdocaoDAO();
		$adocaodao->alterar($idAdocao, $idOldPet, $idOldAdotante, $idNewPet, $idNewAdotante, $conexao);

		// verificando dados da adoção.		
		$obj = $adocaodao->buscarCodigo($idAdocao, $conexao);
		if($obj->num_rows > 0){
			$obj = $obj->fetch_assoc();
			$this->assertEquals($idAdocao, $obj->getID());
			$this->assertEquals($idNewPet, $obj->getPet());
			$this->assertEquals($idNewAdotante, $obj->getAdotante());

			// verificando dados das entidade
			$petdao = new PetDAO();
			$pfdao = new PessoaFisicaDAO();

			if($idOldPet != $idNewPet){ // qdo os pets forem diferentes.
				// verificando dados do novo pet.
				$obj = $petdao->consultarPETcodigo($idNewPet, $conexao);
				$obj = $obj->fetch_assoc();
				$this->assertEquals($idNewAdotante, $obj->getAdotante());
				$this->assertEquals("Indisponível", $obj->getSituacao());

				// verificando dados do pet antigo.
				$obj = $petdao->consultarPETcodigo($idOldPet, $conexao);
				$obj = $obj->fetch_assoc();
				$this->assertEquals(0, $obj->getAdotante());
				$this->assertEquals("Disponível", $obj->getSituacao());

				if($idNewAdotante != $idOldAdotante){ // qdo os adotantes forem diferentes.
					// verificando dados do novo adotante.
					$obj = $pfdao->consultarCodigo($idNewAdotante, $conexao);
					$obj = $obj->fetch_assoc();
					$this->assertEquals($idNewPet, $obj->getAdocao());

					// verificando dados do adotante antigo.
					$obj = $pfdao->consultarCodigo($idOldAdotante, $conexao);
					$obj = $obj->fetch_assoc();
					$this->assertEquals(0, $obj->getAdocao());

				}else{// qdo os adotantes forem iguais.
					// verificando dados do adotante.
					$obj = $pfdao->consultarCodigo($idOldAdotante, $conexao);
					$obj = $obj->fetch_assoc();
					$this->assertEquals($idNewPet, $obj->getAdocao());
				}
			}else{ // qdo os pets forem iguais.
				// verificando dados do pet antigo.
				$obj = $petdao->consultarPETcodigo($idOldPet, $conexao);
				$obj = $obj->fetch_assoc();
				$this->assertEquals($idNewAdotante, $obj->getAdotante());

				if($idNewAdotante != $idOldAdotante){ // qdo os adotantes forem diferentes.
					// verificando dados do novo adotante.
					$obj = $pfdao->consultarCodigo($idNewAdotante, $conexao);
					$obj = $obj->fetch_assoc();
					$this->assertEquals($idNewPet, $obj->getAdocao());

					// verificando dados do adotante antigo.
					$obj = $pfdao->consultarCodigo($idOldAdotante, $conexao);
					$obj = $obj->fetch_assoc();
					$this->assertEquals(0, $obj->getAdocao());

				}
			}// pets iguais e adotantes iguais não há o que se verificar.
		}
	}

	function testeExclusao(){
		// dados de entrada
		$idAdocao = 3;
		$pet = 13;
		$adotante = 10;

		$adocaodao = new AdocaoDAO();
		$adocaodao->excluir($idAdocao, $pet, $adotante, $conn);

		// verificando dados do pet
		$obj = $petdao->consultarPETcodigo($pet, $conexao);
		$obj = $obj->fetch_assoc();
		$this->assertEquals(0, $obj->getAdotante());
		$this->assertEquals("Disponível", $obj->getSituacao());

		// verificando dados do adotante
		$obj = $pfdao->consultarCodigo($adotante, $conexao);
		$obj = $obj->fetch_assoc();
		$this->assertEquals(0, $obj->getAdocao());
	}
}

?>