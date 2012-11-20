<?php

namespace Livraria\Service;

use Doctrine\ORM\EntityManager;
use Livraria\Entity\Categorias;

class CategoriaService
{

	/**
	* @var EntityManager
	*/
	protected $_entityManager;

    /** ------------------------------------------------------------------------------------------------------------- */

    /**
	* @name __construct
	* @return void
	*/
	public function __construct(EntityManager $entityManager)
	{
		$this->_entityManager = $entityManager;
	}

    /** ------------------------------------------------------------------------------------------------------------- */

    /**
	* @name cadastrarCategoria
	* @return Livraria\Entity\Categorias
	*/
	public function cadastrarCategoria(array $dadosDaCategoria)
	{
		$entity = new Categorias($dadosDaCategoria);
		$this->_entityManager->persist($entity);
		$this->_entityManager->flush();
		return $entity;
	}
	
	/** ------------------------------------------------------------------------------------------------------------- */

}