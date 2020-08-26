<?php

	namespace ProjetoFinal_ES_20201\src\Model\pet.php;

	use PHPUnit\Framework\TestCase;
	use ProjetoFinal_ES_20201\src\Model\pet;
	
		class petTest extends TestCase {
			

			 public function testsave(){
			// insere um comentário de status pendente
			$pet=new pet;
			$pet->setAttributes(array(
				'imagem'=>'2.jpg',
				'nome'=>'bolinha',
				'tipo'=>'cachorro',
				'sexo'=>'M',
				'doador'=>'2',
			),false);
			$this->assertTrue($pet->save(false));
			
			// chama o getNome() e verifica se o nome está no BD
			$pet->getNome();
			$this->assertEquals(nome::'bolinha', $pet->nome);
			
		}


?>