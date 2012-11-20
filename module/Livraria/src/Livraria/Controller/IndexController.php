<?php
namespace Livraria\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
        /**
    * @var EntityManager
    */
    protected $_entityManager;

    /** ------------------------------------------------------------------------------------------------------------- */

    public function indexAction()
    {	
    	/** via Zend db*/
    	$categoriaService   = $this->getServiceLocator()->get('Livraria\Model\CategoriaService');
    	$categorias2		= $categoriaService->retornarTodosOsRegistros();
		
		/** via Doctrine */
		$categorias 	= self::getEntityManager()->getRepository('Livraria\Entity\Categorias')->findAll();

        return new ViewModel(array(
            'categorias' => $categorias, 
            'conexao' => '')

        );
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
            $this->_entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_entityManager;
    }

    /** ------------------------------------------------------------------------------------------------------------- */


}
