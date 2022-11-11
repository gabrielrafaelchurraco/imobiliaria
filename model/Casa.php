<?php

	class Casa
	{
		private $id;
		private $proprietario;
		private $telefone;
		private $email;
		private $endereco;
		private $numero;
		private $bairro;
		private $cidade;
		private $estado;
		private $cep;
		private $valor;
		private $area;
		private $tipo;
		private $num_quartos;
		private $num_wc;
		private $num_suites;
		private $vagas;
		private $titulo;
		private $descricao;
		private $dt_anuncio;

		public function __construct($id, $proprietario, $telefone, $email, $endereco, $numero, $bairro, $cidade, $estado, $cep, $valor, $area, $tipo, $num_quartos, $num_wc, $num_suites, $vagas, $titulo, $descricao, $dt_anuncio)
		{
			$this->id = $id;
			$this->proprietario = $proprietario;
			$this->telefone = $telefone;
			$this->email = $email;
			$this->endereco = $endereco;
			$this->numero = $numero;
			$this->bairro = $bairro;
			$this->cidade = $cidade;
			$this->estado = $estado;
			$this->cep = $cep;
			$this->valor = $valor;
			$this->area = $area;
			$this->tipo = $tipo;
			$this->num_quartos = $num_quartos;
			$this->num_wc = $num_wc;
			$this->num_suites = $num_suites;
			$this->vagas = $vagas;
			$this->titulo =$titulo;
			$this->descricao = $descricao;
			$this->dt_anuncio = $dt_anuncio;

		}

		public function __get($attr)
		{
			return $this->$attr;
		}

		public function __set($attr, $valor)
		{
			$this->$attr = $valor;
		}

		public function __destruct()
		{
			
		}
	}

?>