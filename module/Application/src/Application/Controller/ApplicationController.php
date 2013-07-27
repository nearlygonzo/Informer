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
use Application\Model\VK_Auth\VKAuth;
use Zend\ServiceManager\ServiceManager;
use Zend\Json\Json;

class ApplicationController extends AbstractActionController {
    private $vk_auth;

    public function indexAction() {
        return new ViewModel();
    }

    public function authAction() {
        if (!isset($_GET['code'])) {
            $link = $this->getVKAuth()->getAuthorizeUrl(null, 'localhost/informer/public/');
            $json = Json::encode(array("url" => $link), true);
        } else {
            $json = null;
        }
        return $this->getResponse()->setContent($json);
    }


    private function getVKAuth() {
        if ($this->vk_auth == null) {
            $sm = $this->getServiceLocator();
            $this->vk_auth = $sm->get('VK_Auth');
        }
        return $this->vk_auth;
    }


}