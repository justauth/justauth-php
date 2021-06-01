<?php
/**
 * @author pfinal南丞
 * @date 2021年06月01日 上午10:40
 */

namespace JustAuth\Source;


use JustAuth\Exception\PlatFormException;

class AuthApi
{
    protected $api;
    protected $driver;
    private $base_api_name_space = 'JustAuth\Source\\';

    /**
     * AuthApi constructor.
     * @param $driver
     * @param array $config
     * @param array $url
     * @throws PlatFormException
     */
    public function __construct($driver, array $config, array $url)
    {
        $this->driver = $driver;
        $platform = ucfirst(strtolower($driver));
        $className = $this->base_api_name_space.$platform.'\OAuth2';
        if(!class_exists($className)) {
            throw new PlatFormException('平台未定义');
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