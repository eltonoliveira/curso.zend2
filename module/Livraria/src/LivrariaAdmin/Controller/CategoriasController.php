<?php

namespace LivrariaAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController,
	Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator,
	Zend\Paginator\Adapter\ArrayAdapter;

use LivrariaAdmin\Form\Categoria as FormularioCategoria;

class CategoriasController extends AbstractActionController
{

	/**
	* @var EntityManager
	*/
	protected $_entityManager;

    /** ------------------------------------------------------------------------------------------------------------- */

    /**
	* @name indexAction
	* @return array
	*/
	public function indexAction()
	{
		$categorias = self::getEntityManager()->getRepository('Livraria\Entity\Categorias')->findAll();
		$pagina 	= self::params()->fromRoute('pagina');
		$paginador  = new Paginator(new ArrayAdapter($categorias));
		$paginador->setCurrentPageNumber($pagina);
		$paginador->setDefaultItemCountPerPage(5);

		return new ViewModel(array(
				'categorias'	=> $paginador,
				'pagina'		=> $pagina
			)
		);
	}

	/** ------------------------------------------------------------------------------------------------------------- */
    /**
	* @name incluirCategoriaAction
	* @return void
	*/
	public function incluirCategoriaAction()
	{
		$formularioCategoria = new FormularioCategoria();

		if(self::getRequest()->isPost())
		{
			$formularioCategoria->setData(self::getRequest()->getPost());

			if($formularioCategoria->isValid())
			{
				$service = self::getServiceLocator()->get('Livraria\Service\Categoria');
				$service->cadastrarCategoria(self::getRequest()->getPost()->toArray());
				return self::redirect()->toRoute('livraria-admin', array('controller' => 'categorias'));
			}
		}

		return new ViewModel(array(
			'formularioCategoria' =>$formularioCategoria
		));
	}

    /** ------------------------------------------------------------------------------------------------------------- */

    /**
	* @name getEntityManager
	* @return EntityManager
	*/
	protected function getEntityManager()
	{
		if($this->_entityManager === NULL)
		{
			$this->_entityManager = self::getServiceLocator()->get('Doctrine\ORM\EntityManager');
		}

		return $this->_entityManager;
	}

    /** ------------------------------------------------------------------------------------------------------------- */
	
}