<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        $msg = array();

        if ($this->flashMessenger()->hasMessages())
            $msg = $this->flashMessenger()->getMessages();

        #return array('msg' => $msg);
        return new ViewModel(array('msg' => $msg));
    }

}
