<?php
/**
 * @author pfinal南丞
 * @date 2021年06月01日 上午10:40
 */

namespace JustAuth\Request;



use JustAuth\Enums\AuthResponseStatus;
use JustAuth\Exception\AuthException;

class AuthApi
{
    protected $api;
    protected $driver;
    private $base_api_name_space = 'JustAuth\Request\Source\\';

    public function __construct($driver, array $config, array $url)
    {
        $this->driver = $driver;
        $platform = ucfirst(strtolower($driver));
        $className = $this->base_api_name_space.'Auth'.$platform.'Request';
        if(!class_exists($className)) {
            throw new AuthException(AuthResponseStatus::NOT_IMPLEMENTED());
        }
        return $this->api = new $className($config,$url);
    }

    public function authorization()
    {
        return $this->api->authorization();
    }

    public function getAccessToken(): string
    {
        return $this->api->getAccessToken();
    }

    public function getUserInfo(): object
    {
        $oauth = $this->getAccessToken();
        return $this->api->getUserInfo($oauth);
    }
}