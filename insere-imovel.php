<?php 

require("controller\CasaDAL.php");

$titulo = $_REQUEST['titulo'];
$descricao = $_REQUEST['descricao'];
$telefone = $_REQUEST['telefone'];
$endereco = $_REQUEST['endereco'];
$numero = $_REQUEST['numero'];
$estado = $_REQUEST['estado'];
$cidade = $_REQUEST['cidade'];
$bairro = $_REQUEST['bairro'];
$cep = $_REQUEST['cep'];
$valor = $_REQUEST['valor'];
$area = $_REQUEST['area'];
$tipo = $_REQUEST['tipo'];
$num_quartos = $_REQUEST['num_quartos'];
$num_wc = $_REQUEST['num_wc'];
$num_suites = $_REQUEST['num_suites'];
$proprietario = $_REQUEST['proprietario'];
$id = $_REQUEST['id'];
$email = $_REQUEST['email'];
$dt_anuncio = NULL;
$vagas = $_REQUEST['vagas'];

$casa = new Casa($id, $proprietario, $telefone, $email, $endereco, $numero, $bairro, $cidade, $estado, $cep, $valor, $area, $tipo, $num_quartos, $num_wc, $num_suites, $vagas, $titulo, $descricao, $dt_anuncio);
$casaDAL = new CasaDAL();

if($id!=null && $id != "")
{
	//atualiza
	$casaDAL->alterar($casa);
}else
{
	//cadastra
	$casaDAL->inserir($casa);
}

header("Location: index.php?post=success");