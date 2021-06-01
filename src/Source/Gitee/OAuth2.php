<?php
/**
 * @author pfinal南丞
 * @date 2021年04月09日 下午2:14
 */

namespace JustAuth\Source\Gitee;


use JustAuth\Source\Common;

class OAuth2 extends Common
{

    public function __construct($platform_config, $platform_source)
    {
        parent::__construct($platform_config,$platform_source);
    }

    public function authorization()
    {
        $auth_url = $this->source_url['authorize'];
        $query = array_filter([
            'client_id' => $this->config['client_id'],
            'redirect_uri' => $this->config['redirect_uri'],
            'response_type' => 'code',
        ]);
        $url = $auth_url.'?'.http_build_query($query);
        header('Location:'.$url);
        exit();
    }

    public function getAccessToken()
    {
        $token_url = $this->source_url['accessToken'];
        $query = array_filter([
            'client_id' => $this->config['client_id'],
            'redirect_uri' => $this->config['redirect_uri'],
            'code' => request('code'),
            'grant_type' => 'authorization_code',
            'client_secret' => $this->config['client_secret'],
        ]);
        return $this->http->request('POST', $token_url, [
            'query' => $query,
        ])->getBody()->getContents();
    }

    /**
     * @return mixed
     */
    public function getUserInfo()
    {
        // TODO: Implement getUserInfo() method.
    }
}