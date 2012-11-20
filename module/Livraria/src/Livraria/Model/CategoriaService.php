<?php
namespace Livraria\Model;

class CategoriaService
{
	/**
	* @var Livraria\Model\CategoriaTable
	*/
	protected $categoriaTable;

	/** ------------------------------------------------------------------------------------------------------------- */

	/**
	* @name __construct
	* @return void
	*
	*/
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