<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\viewController;

class ViewControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        #$categories = $sm->get('categories');
        #$form = $sm->get('market-post-form');
        
        $viewController = new viewController();
        #$viewController->setCategories($categories);
        #$viewController->setPostForm($form);
        $viewController->setListingsTable($sm->get('listings-table'));
        
        return $viewController;
    }
}
