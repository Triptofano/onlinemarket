<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        #$categories = $sm->get('categories');
        #$form = $sm->get('market-post-form');
        
        $indexController = new IndexController();
        #$indexController->setCategories($categories);
        #$indexController->setPostForm($form);
        $indexController->setListingsTable($sm->get('listings-table'));
        
        return $indexController;
    }
}
