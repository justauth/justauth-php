<?php
/**
 * @author pfinal南丞
 * @date 2021年04月09日 下午2:14
 */

namespace JustAuth\Source\Gitee;


use JustAuth\Source\Common;

class OAuth2 extends Common
{
    /**
     * OAuth2 constructor.
     * @param null $platform_source
     * @param null $platform_params
     */
    public function __construct($platform_source = null, $platform_params = null)
    {
        $this->appid = $platform_params['gitee']['AppId'];
        $this->appSecret = $platform_params['gitee']['AppKey'];
        $this->callbackUrl = $platform_params['gitee']['CallBackUrl'];
    }

    public function getAuthUrl($callbackUrl = null, $state = null, $scope = null)
    {
        
    }
}