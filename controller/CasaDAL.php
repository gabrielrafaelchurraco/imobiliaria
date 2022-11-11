<?php

require ("banco\Conexao.php");
require ("model\Casa.php");

class CasaDAL
{
	public $conexao;
	private $casas = array();

	public function __construct()
	{
		$this->conexao = new Conexao();
	}

	public function inserir($casa)
	{
		$this->conexao->open();
		$sqlQ = "INSERT INTO imoveis (proprietario, telefone, email,endereco,numero, bairro, cidade, estado, cep, valor, area, tipo, num_quartos, num_wc, num_suites, vagas, titulo, descricao, dt_anuncio)
		         VALUES ('".$casa->proprietario."', '".$casa->telefone."','".$casa->email."','".$casa->endereco."', '".$casa->numero."', '".$casa->bairro."', '".$casa->cidade."','".$casa->estado."','".$casa->cep."', '".$casa->valor."','".$casa->area."','".$casa->tipo."','".$casa->num_quartos."','".$casa->num_wc."', '".$casa->num_suites."', ".$casa->vagas.", '".$casa->titulo."', '".$casa->descricao."', '".date('Y-d-m')."')";
		return $this->conexao->doQuery($sqlQ) or die(mysqli_error($this->conexao->getConnection()));	
	}

	public function alterar($casa)
	{
		$this->conexao->open();
		$sqlQ = "UPDATE imoveis SET".
			" proprietario = '".$casa->proprietario ."',".
			" telefone = '".$casa->telefone ."',".
			" email = '".$casa->email ."',".
			" endereco = '".$casa->endereco ."',".
			" numero = '".$casa->numero ."',".
			" bairro = '".$casa->bairro ."',".
			" cidade = '".$casa->cidade ."',".
			" estado = '".$casa->estado ."',".
			" cep = '".$casa->cep ."',".
			" valor = '".$casa->valor ."',".
			" area = '".$casa->area ."',".
			" tipo = '".$casa->tipo ."',".
			" num_quartos = '".$casa->num_quartos ."',".
			" num_wc = '".$casa->num_wc ."',".
			" num_suites = '".$casa->num_suites ."',".
			" vagas = '".$casa->vagas ."',".
			" titulo = '".$casa->titulo ."',".
			" descricao = '".$casa->descricao ."'".
			" WHERE id=".$casa->id;
		return $this->conexao->doQuery($sqlQ) or die(mysqli_error($this->conexao->getConnection()));	
	}
	
	public function deletar($id)
	{
		$this->conexao->open();
		return $this->conexao->doQuery("DELETE FROM imoveis WHERE id=" .$id);
	}

	public function listar($where = "")
	{
		$sqlQ = ($where == "") ? "SELECT * FROM imoveis" : "SELECT * FROM imoveis WHERE titulo LIKE '%".$where."%'";
		
		$this->conexao->open();
		$this->imoveis = $this->conexao->doQuery($sqlQ);

		while($atual_casa = mysqli_fetch_assoc($this->imoveis)){
			$itemCasa = new Casa($atual_casa['id'], $atual_casa['proprietario'],$atual_casa['telefone'],$atual_casa['email'],$atual_casa['endereco'],$atual_casa['numero'],$atual_casa['bairro'],$atual_casa['cidade'],$atual_casa['estado'],$atual_casa['cep'], $atual_casa['valor'],$atual_casa['area'],$atual_casa['tipo'],$atual_casa['num_quartos'], $atual_casa['num_wc'],$atual_casa['num_suites'],$atual_casa['vagas'], $atual_casa['titulo'], $atual_casa['descricao'], $atual_casa['dt_anuncio']) ;
			array_push($this->casas, $itemCasa);
		}

		return $this->casas;
	}

	public function listarRecente($where = "")
	{
		$sqlQ = ($where == "") ? " SELECT DISTINCT * FROM imoveis order by dt_anuncio desc  limit 4 " : " SELECT DISTINCT * FROM imoveis WHERE titulo LIKE '%".$where."%' order by dt_anuncio desc  limit 5";
		
		$this->conexao->open();
		$this->imoveis = $this->conexao->doQuery($sqlQ);

		while($atual_casa = mysqli_fetch_assoc($this->imoveis)){
			$itemCasa = new Casa($atual_casa['id'], $atual_casa['proprietario'],$atual_casa['telefone'],$atual_casa['email'],$atual_casa['endereco'],$atual_casa['numero'],$atual_casa['bairro'],$atual_casa['cidade'],$atual_casa['estado'],$atual_casa['cep'], $atual_casa['valor'],$atual_casa['area'],$atual_casa['tipo'],$atual_casa['num_quartos'], $atual_casa['num_wc'],$atual_casa['num_suites'],$atual_casa['vagas'], $atual_casa['titulo'], $atual_casa['descricao'], $atual_casa['dt_anuncio']) ;
			array_push($this->casas, $itemCasa);
		}

		return $this->casas;
	}
	
	public function listaPorID($id)
	{
		$this->conexao->open();
		$this->imoveis = $this->conexao->doQuery("SELECT * FROM imoveis WHERE id=" .$id);
		
		if($this->imoveis){
			$atual_casa = mysqli_fetch_assoc($this->imoveis);
			$itemCasa = new Casa($atual_casa['id'], $atual_casa['proprietario'],$atual_casa['telefone'],$atual_casa['email'],$atual_casa['endereco'],$atual_casa['numero'],$atual_casa['bairro'],$atual_casa['cidade'],$atual_casa['estado'],$atual_casa['cep'], $atual_casa['valor'],$atual_casa['area'],$atual_casa['tipo'],$atual_casa['num_quartos'], $atual_casa['num_wc'],$atual_casa['num_suites'],$atual_casa['vagas'], $atual_casa['titulo'], $atual_casa['descricao'], $atual_casa['dt_anuncio']) ;
		}

		return $itemCasa;
	}
	
	public function __destruct()
	{
		try{
			$this->conexao->close();
		}catch(Exception $ex){
			throw Exception("Falha ao fechar conexão com o servidor");
		}
	}
}
