<?php
/**
 * @author pfinal南丞
 * @date 2021年04月07日 上午10:55
 */

namespace JustAuth\Request\Source;


use GuzzleHttp\Client;

abstract class AuthCommonRequest
{

    /**
     * state值，调用getAuthUrl方法后可以获取到.
     *
     * @var string
     */
    public $state;

    /**
     * 授权权限列表.
     *
     * @var array
     */
    public $scope;

    /**
     * 接口调用结果.
     *
     * @var array
     */
    public $result;

    /**
     * AccessToken，调用相应方法后可以获取到.
     *
     * @var string
     */
    public $accessToken;

    /**
     * openid，调用相应方法后可以获取到.
     *
     * @var string
     */
    public $openid;

    /**
     * 登录代理地址，用于解决只能设置一个回调域名/地址的问题.
     *
     * @var string
     */
    public $loginAgentUrl;

    /**
     * 接口地址
     * @var array
     */
    public $source_url = [];

    public $config = [];

    public $http = null;

    public function __construct($config, $source)
    {
        $this->http_driver();
        $this->source_url = $source;
        $this->config = $config;
    }

    /**
     *  获取http 请求客户端
     */
    protected function http_driver()
    {
        if (is_null($this->http)) {
            $this->http = new Client();
        }
    }

    abstract public function authorization();

    abstract public function getAccessToken();

    abstract public function getUserInfo($access_token);

}