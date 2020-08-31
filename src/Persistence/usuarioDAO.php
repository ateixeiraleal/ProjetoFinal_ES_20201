<?php
abstract class UsuarioDAO{
    
    function __construct(){}

    // para salvar deve ser passado como parâmentro um usuario e uma conexão.
    abstract function salvar($usuario, $conn);
    abstract function consultar($conn);
    abstract function consultarCodigo($idUsuario, $conn);
}