<?php
/**
 * @author pfinal南丞
 * @date 2021年04月07日 上午10:55
 */

namespace JustAuth\Source;


use GuzzleHttp\Client;

abstract class Common
{
    /**
     * 应用的唯一标识。
     * @var string
     */
    public $appid;

    /**
     * appid对应的密钥.
     * @var string
     */
    public $appSecret;

    /**
     * 登录回调地址
     *
     * @var string
     */
    public $callbackUrl;

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

    public $http = null;

    /**
     * 构造方法.
     * Common constructor.
     * @param null $appid 应用的唯一标识
     * @param null $appSecret
     * @param null $callbackUrl
     */
    public function __construct()
    {
        $this->http_driver();
    }

    /**
     *  获取http 请求客户端
     */
    private function http_driver()
    {
        if (is_null($this->http)) {
            $this->http = new Client();
        }
    }

    /**
     * 获取state值
     * @param null $state
     * @return mixed|string
     */
    protected function getState($state = null)
    {
        if (null === $state) {
            if (null === $this->state) {
                $this->state = md5(uniqid('', true));
            }
        } else {
            $this->state = $state;
        }

        return $this->state;
    }

    /**
     * 获取登录页面跳转url.
     * @param string $callbackUrl 登录回调地址
     * @param string $state 状态值，不传则自动生成，随后可以通过->state获取。用于第三方应用防止CSRF攻击，成功授权后回调时会原样带回。一般为每个用户登录时随机生成state存在session中，登录回调中判断state是否和session中相同
     * @param array $scope 请求用户授权时向用户显示的可进行授权的列表。可空
     *
     * @return string
     */
    abstract public function getAuthUrl($callbackUrl = null, $state = null, $scope = null);

    /**
     *  如果没有配置 跳出登录页面
     */
    public static function displayLoginAgent()
    {
        $ref = new \ReflectionClass(static::class);
        var_dump($ref);exit();
        echo file_get_contents(\dirname($ref->getFileName()) . '/loginAgent.html');
    }
}