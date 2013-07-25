<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nearlygonzo
 * Date: 25.07.13
 * Time: 0:13
 * To change this template use File | Settings | File Templates.
 */

namespace Application\Model;

use Zend\Json\Json;

class VK_Auth {
    private $client_id;
    private $redirect_uri;
    private $client_secret;

    public function __construct() {
        $this->client_id  = '3782878';
        $this->redirect_uri = 'http://localhost/informer/public';
        $this->client_secret = 'HfdvmPjUA4J6UidOCbo8';
    }

    public function authenticationUser() {
        // проверка выполнена ли авторизация
        if (isset($_GET['code'])) {
            $data = $this->vkLogin($_GET['code']);
        } else {
            $data = $this->prepareLink();
        }
        $json = Json::encode($data, true);
        return $json;
    }

    private function prepareLink()
    {
        $url = 'http://oauth.vk.com/authorize';

        $params = array(
            'client_id'     => $this->client_id,
            'redirect_uri'  => $this->redirect_uri,
            'response_type' => 'code'
        );

        $link = array("url" => $url . '?' . urldecode(http_build_query($params)));
        return $link;
    }

    public function vkLogin($code)
    {
        $userInfo = null;
        $params = array(
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'code' => $code,
            'redirect_uri' => $this->redirect_uri
        );
        $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' .
        '?' . urldecode(http_build_query($params))), true);
        if (isset($token['access_token'])) {
            $params = array(
                'uids'         => $token['user_id'],
                'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
                'access_token' => $token['access_token']
            );

            $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' .
            '?' . urldecode(http_build_query($params))), true);
            if (isset($userInfo['response'][0]['uid'])) {
                $userInfo = $userInfo['response'][0];
            }
        }
        return $userInfo;
    }
}