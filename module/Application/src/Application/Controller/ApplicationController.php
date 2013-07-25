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
use Application\Model;

class ApplicationController extends AbstractActionController {
    private $vk;

    public function indexAction() {
        return new ViewModel();
    }

    public function loginAction() {
        $json = $this->getVkAuth()->authenticationUser();
        return $this->getResponse()->setContent($json);
    }

    public function identifyAction() {
        $json = $this->getVkAuth()->authenticationUser();
        return $this->getResponse()->setContent($json);
    }

    private function getVkAuth() {
        if (!$this->vk) {
            $sm = $this->getServiceLocator();
            $this->vk = $sm->get('Application\Model\VK_Auth');
        }
        return $this->vk;
    }


}