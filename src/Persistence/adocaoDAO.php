<?php
class AdocaoDAO{

    function __construct(){}

    // para salvar deve ser passado como parâmentro um pet e uma conexão.
    function cadastrar($adocao, $conn){

        // string do comando em sql.
        $sql = "INSERT INTO adocao(data, pet, doador, adotante) VALUES ('".
        date('Y-m-d')."','".
        $adocao->getPet()."','".
        $adocao->getDoador()."','".
        $adocao->getAdotante()."')";

        // manda a string 'comando sql' para o BD.
        if($conn->query($sql) == true){
            echo "Adoção registrada com sucesso! <br>";

            $sql = "UPDATE pet SET situacao='Indisponível', adotante='".$adocao->getAdotante()."' WHERE codigoPet=".$adocao->getPet();
            if($conn->query($sql) == true){
                echo "Dados do pet foram atualizado! <br>";

                $sql = "UPDATE usuariopf SET adocao='".$adocao->getPet()."' WHERE idUsuario=".$adocao->getAdotante();
                if($conn->query($sql) == true){
                    echo "Dados do usuário foram atualizado! <br>";
                }else {
                    echo "Erro na atualização do usuário! <br>" .$conn->error;
                }
            }else {
                echo "Erro na atualização do pet! <br>" .$conn->error;
            }
        }else {
            echo "Erro na adoção! <br>" .$conn->error;
        }
    }

    function consultar($conn){
        $sql = "SELECT * FROM adocao";
        $resultado = $conn->query($sql); //executa o comando no BD.
        return $resultado;
    }

    // exibe os dados de uma específica.
    function buscarCodigo($codigo, $conn){
        $sql = "SELECT * FROM adocao WHERE id=".$codigo;
        $resultado = $conn->query($sql); //executa o comando no BD.
        return $resultado;
    }

    function alterar($adocao, $oldPet, $oldAdotante, $newPet, $newAdotante, $conn){

        if(($oldPet != $newPet) || ($oldAdotante != $newAdotante)){
            // string do comando em sql.
            $sql = "UPDATE adocao SET 
                    data='".date('Y-m-d')."', 
                    pet='".$newPet."', 
                    adotante='".$newAdotante."' 
            WHERE id=".$adocao;

                // manda a string 'comando sql' para o BD e verifica se o resultado é válido.
            if($conn->query($sql) == true){
                echo "Adoção alterada com sucesso! <br>";

                if($oldPet == $newPet){
                    // vincula o novo adotante ao pet antigo.
                    $sql = "UPDATE pet SET adotante='".$newAdotante."' WHERE codigoPet=".$oldPet;
                    $conn->query($sql);
                    // vincula a adocao do pet ao novo Adotante.
                    $sql = "UPDATE usuariopf SET adocao='".$newPet."' WHERE idUsuario=".$newAdotante;
                    $conn->query($sql);
                    // desvincula a adocao do pet do antigo Adotante.
                    $sql = "UPDATE usuariopf SET adocao='0' WHERE idUsuario=".$oldAdotante;
                    $conn->query($sql);

                    echo "O pet antigo foi atribuído ao novo adotante. <br> Adotante antigo desvinculado da adoção.";
                }else{
                    if($oldAdotante == $newAdotante){
                        // vincula o novo pet ao adotante antigo.
                        $sql = "UPDATE usuariopf SET adocao='".$newPet."' WHERE idUsuario=".$oldAdotante;
                        $conn->query($sql);	
                        // vincula o antigo adotante ao novo pet.
                        $sql = "UPDATE pet SET situacao='Indisponível', adotante='".$oldAdotante."' WHERE codigoPet=".$newPet;
                        $conn->query($sql);
                        // desvincula o pet antigo da adoção.
                        $sql = "UPDATE pet SET situacao='Disponível', adotante='0' WHERE codigoPet=".$oldPet;
                        $conn->query($sql);

                        echo "Adotante antigo vinculado ao novo pet. <br> Pet antigo desvinculado da adoção.";
                    }else{
                        // vincula o novo pet ao novo adotante.
                        $sql = "UPDATE usuariopf SET adocao='".$newPet."' WHERE idUsuario=".$newAdotante;
                        $conn->query($sql);	
                        // vincula o novo adotante ao novo pet.
                        $sql = "UPDATE pet SET situacao='Indisponível', adotante='".$newAdotante."' WHERE codigoPet=".$newPet;
                        $conn->query($sql);
                        // desvincula o pet antigo da adoção.
                        $sql = "UPDATE pet SET situacao='Disponível', adotante='0' WHERE codigoPet=".$oldPet;
                        $conn->query($sql);
                        // desvincula o dotante antigo da adoção.
                        $sql = "UPDATE usuariopf SET adocao='0' WHERE idUsuario=".$oldAdotante;
                        $conn->query($sql);

                        echo "Adotante novo vinculado ao novo pet. <br> Adotante antigo e pet antigo desvinculados da adoção.";
                    }
                }
            }else echo "Erro na alteração da adoção! <br>" .$conn->error;
        }else echo "Nenhuma alteração efetuada pois os dados fornecidos são iguais.";
    }

    function excluir($codigo, $pet, $adotante, $conn){
        $sql = "DELETE FROM adocao WHERE id=".$codigo;
        $resultado = $conn->query($sql); //executa o comando no BD.

        // atualiza as tabelas vinculadas.
        $sql = "UPDATE pet SET situacao='Disponível', adotante='0' WHERE codigoPet=".$pet;
        $conn->query($sql);

        $sql = "UPDATE usuariopf SET adocao='0' WHERE idUsuario=".$adotante;
        $conn->query($sql);

        return $resultado;
    }
}