<?php
namespace Livraria\Model;

class CategoriaService
{
	/**
	* @var Livraria\Model\CategoriaTable
	*/
	protected $categoriaTable;

	public function __construct(CategoriaTable $table)
	{
		$this->categoriaTable = $table;
	}

	/** ------------------------------------------------------------------------------------------------------------- */

	/**
	* @name getTodosOsRegistros
	* @return array
	*
	*/
	public function retornarTodosOsRegistros()
	{
		return $this->categoriaTable->select();
	}

	/** ------------------------------------------------------------------------------------------------------------- */
}