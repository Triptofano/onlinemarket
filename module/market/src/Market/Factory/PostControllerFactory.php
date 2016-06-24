<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\PostController;

class PostControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $categories = $sm->get('categories');
        $form = $sm->get('market-post-form');
        
        $postController = new PostController();
        $postController->setCategories($categories);
        $postController->setPostForm($form);
        
        return $postController;
    }
}
