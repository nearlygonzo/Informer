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
use Zend\Json\Json;

class ApplicationController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function selectHeaderAction()
    {
        $data = null;
        if (true)
        {
            $data = array(
                "username"      => "kazantip",
                "image_path"    => "http://cs407222.vk.me/v407222980/a1d9/yRRu8eO5Vx0.jpg",
            );
        }

        $json = Json::encode($data, true);
        return $this->getResponse()->setContent($json);
    }

}