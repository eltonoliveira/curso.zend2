<?php
namespace Livraria;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Livraria\Model\categoriaTable;
use Livraria\Service\CategoriaService;


class Module
{
    
    /** ------------------------------------------------------------------------------------------------------------- */
   
    /**
    * @name getConfig
    * @return file 'module.config.php'
    */
     public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /** ------------------------------------------------------------------------------------------------------------- */

    /**
    * @name getAutoloaderConfig
    * @return array
    */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ . 'Admin' => __DIR__ . '/src/' . __NAMESPACE__ . 'Admin',
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ),
            ),
        );
    }

    /** ------------------------------------------------------------------------------------------------------------- */

    /**
    * @name getServiceConfig
    * @return object 
    */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Livraria\Model\CategoriaService' => function($service){
                    $dbAdapter = $service->get('Zend\Db\Adapter\Adapter');
                    $categoriaTable = new CategoriaTable($dbAdapter);
                    return new Model\CategoriaService($categoriaTable);
                },
                'Livraria\Service\Categoria' => function($service){
                    return new CategoriaService($service->get('Doctrine\ORM\EntityManager'));
                }
            )
        );
    }

    /** ------------------------------------------------------------------------------------------------------------- */
}
