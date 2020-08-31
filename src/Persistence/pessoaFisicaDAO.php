<?php

require_once 'usuarioDAO.php';

final class PessoaFisicaDAO extends UsuarioDAO{

    function __construct(){
        parent::__construct();
    }

    // para salvar deve ser passado como parâmentro um usuario e uma conexão.
    public function salvar($usuario, $conn){

        // inserção dos dados no BD.
        $sql = "INSERT INTO usuariopf(cpf, nome, email, senha, idUsuario, adocao) VALUES ('".
        $usuario->getCpf()."','".
        $usuario->getNome()."','".
        $usuario->getEmail()."','".
        $usuario->getSenha()."','".
        $usuario->getIdUsuario()."','".
        $usuario->getAdocao()."')";

        // manda a string 'comando sql' para o BD.
        if($conn->query($sql) == true){
            echo "Cliente cadastrado com sucesso!";
        }else {
            echo "Erro no cadastro! <br>" .$conn->error;
        }
    }

    function consultar($conn){
        $sql = "SELECT * FROM usuariopf";
        $resultado = $conn->query($sql); //executa o comando no BD.
        return $resultado;
    }

    // exibe os dados de uma PF específica.
    function consultarCodigo($idUsuario, $conn){
        $sql = "SELECT * FROM usuariopf WHERE idUsuario=".$idUsuario;
        $resultado = $conn->query($sql); //executa o comando no BD.
        return $resultado;
    }
}