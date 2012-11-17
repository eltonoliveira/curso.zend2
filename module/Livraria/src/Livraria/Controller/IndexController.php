<?php
namespace Livraria\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {	
    	/** via Zend DB
    	$categoriaService = $this->getServiceLocator()
    	->get('Livraria\Model\CategoriaService');
		*/

		$entityManager  = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$repositorio	= $entityManager->getRepository('Livraria\Entity\Categoria');
		$categorias 	= $repositorio->findAll();

        return new ViewModel(array('categorias' => $categorias));
    }
}
