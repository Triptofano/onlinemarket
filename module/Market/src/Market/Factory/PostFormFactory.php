<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostForm;

class PostFormFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $form = new PostForm();
        
        $form->setCategories($sm->get('categories'));
        $form->setExpireDays($sm->get('market-expire-days'));
        $form->setCaptchaOptions($sm->get('market-captcha-options'));
        $form->setInputFilter($sm->get('market-post-filter'));
        $form->buildForm();
        
        return $form;
    }

}
