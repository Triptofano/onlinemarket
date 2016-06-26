<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    use ListingsTableTrait;

    public function indexAction()
    {
        $msg = array();

        if ($this->flashMessenger()->hasMessages())
            $msg = $this->flashMessenger()->getMessages();

        $itemRecent = $this->listingsTable->getLatestListings();

        return new ViewModel(array(
            'msg' => $msg,
            'item' => $itemRecent
        ));
    }

}
