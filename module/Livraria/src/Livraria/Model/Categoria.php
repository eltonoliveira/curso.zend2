<?php
namespace Livraria\Model;

class Categoria
{
	public $id;
	public $nome;

	/** ------------------------------------------------------------------------------------------------------------- */

	public function exchangeArray($dados)
	{
		$this->id 	= isset($dados['id']) ? $dados['id'] : NULL;
		$this->nome = isset($dados['nome']) ? $dados['nome'] : NULL;
	}

	/** ------------------------------------------------------------------------------------------------------------- */
}