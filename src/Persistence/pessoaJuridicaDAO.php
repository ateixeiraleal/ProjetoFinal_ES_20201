<?php

include_once 'usuarioDAO.php';

final class PessoaJuridicaDAO extends UsuarioDAO{

    function __construct(){
        parent::__construct();
    }

    // para salvar deve ser passado como parâmentro um usuario e uma conexão.
    function salvar($usuario, $conn){

        // inserção dos dados no BD.
        $sql = "INSERT INTO usuariopj(cnpj, nome, email, senha, idUsuario) VALUES ('".
        $usuario->getCnpj()."','".
        $usuario->getNome()."','".
        $usuario->getEmail()."','".
        $usuario->getSenha()."',".
        $usuario->getIdUsuario().")";

        $resultado = $conn->query($sql); //executa o comando no BD.
        return $resultado;
    }

    function consultar($conn){
        $sql = "SELECT cnpj, nome, email, idUsuario FROM usuariopj";
        $resultado = $conn->query($sql); //executa o comando no BD.
        return $resultado;
    }

    // exibe os dados de uma ONG específica.
    function consultarCodigo($idUsuario, $conn){
        $sql = "SELECT * FROM usuariopj WHERE idUsuario=".$idUsuario;
        $resultado = $conn->query($sql); //executa o comando no BD.
        return $resultado;
    }
}