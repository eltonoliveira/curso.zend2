<?php
namespace Livraria\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    	$dados = array('meuNome' => 'Elton');

        return new ViewModel($dados);
    }
}
