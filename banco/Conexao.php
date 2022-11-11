<?php
$nome_site = 'G-imobliliaria';
$nome_logo = 'G-imobliliaria';
class Conexao
{
	private $server, $user, $pass, $db;
	private $connection;
	
	public function __construct()
	{
		$this->server = 'localhost';
		$this->user = 'root';
		$this->pass = '';
		$this->db = 'gestao_imobiliaria';
	}
	
	public function getConnection()
	{
		return $this->connection;
	}
	
	public function open()
	{
		$this->connection = mysqli_connect($this->server, $this->user, $this->pass);
		mysqli_select_db($this->connection, $this->db);
	}
	
	public function __destruct()
	{
		
		try{
		//	$this->connection->close();
		}catch(Exception $ex){
			print($ex->getMessage());
		}
		
	}
	
	public function __get($attr)
	{
		return $this->$att;
	}
	
	public function doQuery($sqlC)
	{
		return mysqli_query($this->connection, $sqlC);
	}
	
	public function __set($attr, $value)
	{
		if($attr == 'connection'){
			throw new Exception('Valor de connection n�o pode ser alterado externamente',1);
		}else{
			$this->$attr = $value;
		}
	}
	
	public function close()
	{
	}
	
}