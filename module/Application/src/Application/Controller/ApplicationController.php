<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nearlygonzo
 * Date: 22.07.13
 * Time: 20:10
 * To change this template use File | Settings | File Templates.
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceManager;

class ApplicationController extends AbstractActionController {
    private $auth;

    public function indexAction() {
        $this->layout()->header = $this->getAuth()->getUserData();
        return array();
    }


    private function getAuth() {
        if ($this->auth == null) {
            $sm = $this->getServiceLocator();
            $this->auth = $sm->get('Auth');
        }
        return $this->auth;
    }


}