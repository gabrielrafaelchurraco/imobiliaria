<?php

class Utilidades
{
	public $MENSAGENS_PADRAO = Array('info'=>'Operação efetuada com sucesso, porém com complicações','success'=>'Operação efetuada com sucesso','danger'=>'Operação não foi concluída, erro no processamento',''=>'Nada aconteceu');
	
	public static function dataParaPtBR($data)
	{
		return substr($data, 8,2).'/'.substr($data, 5,2).'/'.substr($data, 0, 4).' às '.substr($data, 10, 8);
	}
	
	public static function floatParaDinheiroBRL($num)
	{
	  return 'R$ ' . number_format($num, 2, ',', '.');
	}
	
	
	public function mensagem($msg="")
	{
		return $this->MENSAGENS_PADRAO[$msg];
	}
}