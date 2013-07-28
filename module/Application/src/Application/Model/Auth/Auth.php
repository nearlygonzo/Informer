<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nearlygonzo
 * Date: 28.07.13
 * Time: 14:59
 * To change this template use File | Settings | File Templates.
 */

namespace Application\Model\Auth;

use Application\Model\Auth\VK_Auth\VKAuth;
use Zend\Json\Json;

class Auth {
    protected $vk_auth;
    private $vk_config = array(
        'app_id'        => '3782878',
        'api_secret'    => 'HfdvmPjUA4J6UidOCbo8',
        'callback_url'  => 'http://localhost/informer/public',
        'api_settings'  => '{ACCESS_RIGHTS_THROUGH_COMMA}'
    );

    public function __construct() {
        $this->vk_auth = new VKAuth($this->vk_config['app_id'], $this->vk_config['api_secret']);
    }

    public function getUserData() {
        if (!isset($_GET['code'])) {
            $link = $this->vk_auth->getAuthorizeUrl(null, $this->vk_config['callback_url'], true);
            $data = '<a href="' . $link . '"> Войти через vk.com </a>';
        } else {
            $access_token = $this->vk_auth->getAccessToken($_REQUEST['code'], $this->vk_config['callback_url']);
            $userData = $this->vk_auth->api('users.get', array(
                'uid'       => $access_token['user_id'],
                'fields'    => 'first_name,last_name',
                'order'     => 'name'
            ));
            $userInfo = $userData["response"]["0"];
            $data = '<img src="' . '"> </img>' .
                '<a href="#" id="username">'. $userInfo["first_name"] . ' ' .
                $userInfo["last_name"] . '</a>' . '<br/> <a href="#" id="logout">Выйти</a>';
        }
        return $data;
    }
}