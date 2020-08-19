<?php
class Connection{
	// atributos de identificação do BD e usuário.	
	private $serverName = "localhost";
	private $userName = "root";
	private $password = "";
	private $bd = "es_trabalho";
	private $conn = null;

	function __construct(){}

	function getConnection(){
		if($this->conn == null){
			// efetua a conexão com o BD.
			$this->conn = mysqli_connect($this->serverName, $this->userName, $this->password, $this->bd);
		}
		if(!$this->conn){
			// verifica se a conexão falou, mata a conexão e imprime a msg de erro.
			die("Conexão falhou: ".$conn->connect_error);
		}
		return $this->conn;
	}
}

?>