<?php

namespace Livraria\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @tutorial
 * Se a classe que representa a tabela e a classe que representa o repositório
 * estiverem com o mesmo nome da tabela física não é obrigatório usar:
 * 		- ORM\Table(name="categorias")
 * 		- ORM\Entity(repositoryClass="Livraria\Entity\CategoriasRepository")
 * 
 */
class Categorias
{
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue
	* @var int
	*/
	protected $id;
	/**
	* @ORM\Column(type="text")
	* @var string
	*/
	protected $nome;

    /** ------------------------------------------------------------------------------------------------------------- */

    /**
	* @name __construct
	* @return void
	*/
	public function __construct($options = NULL)
	{
		Configurator::configure($this, $options);
	}

   /** ------------------------------------------------------------------------------------------------------------- */

    /**
	* @name getId
	* @return integer
	*/
	public function getId()
	{
		return $this->id;
	}

   /** ------------------------------------------------------------------------------------------------------------- */

    /**
	* @name setId
	* @return void
	*/
	public function setId($id)
	{
		$this->id = $id;
	}

   /** ------------------------------------------------------------------------------------------------------------- */

    /**
	* @name getNome
	* @return string
	*/
	public function getNome()
	{
		return $this->nome;
	}

   /** ------------------------------------------------------------------------------------------------------------- */

    /**
	* @name setNome
	* @return void
	*/
	public function setNome($nome)
	{
		$this->nome = $nome;
	}

   /** ------------------------------------------------------------------------------------------------------------- */

    /**
	* @name __toString
	* @return string $this->nome
	*/
	public function __toString()
	{
		return $this->nome;
	}

   /** ------------------------------------------------------------------------------------------------------------- */

    /**
	* @name toArray
	* @return array
	*/
	public function toArray()
	{
		return array(
			'id' 	=> self::getId(),
			'nome' 	=> self::getNome()
		);
	}

	/** ------------------------------------------------------------------------------------------------------------- */

}