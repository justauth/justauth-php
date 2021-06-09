<?php
/**
 * @author pfinal南丞
 * @date 2021年04月09日 下午2:14
 */

namespace JustAuth\Request\Source;

use pf\request\Request;
use JustAuth\Exception\AuthException;
class AuthGithubRequest extends AuthCommonRequest
{
    /**
     *  获取授权跳转 执行重定向
     */
    public function authorization()
    {
        $auth_url = $this->source_url->authorize();
        $query    = array_filter([
            'client_id'    => $this->config['client_id'],
            'redirect_uri' => $this->config['redirect_uri'],
        ]);
        $url      = $auth_url . '?' . http_build_query($query);
        header('Location:' . $url);
        exit();
    }


    public function getAccessToken()
    {
        $token_url = $this->source_url->accessToken();
        $query     = array_filter([
            'client_id'     => $this->config['client_id'],
            'redirect_uri'  => $this->config['redirect_uri'],
            'code'          => Request::get('code'),
            'client_secret' => $this->config['client_secret'],
        ]);
        return $this->http->request('POST', $token_url, [
            'query' => $query,
        ])->getBody()->getContents();
    }

    /**
     * 获取用户信息
     * @param $access_token
     * @return mixed
     */
    public function getUserInfo($access_token)
    {
        $access_data = [];
        parse_str($access_token,$access_data);
        if(count($access_data)<=0 || isset($access_data['error'])) {
            throw new AuthException(401,$access_data['error_description']);
        }
        $user_info_url = $this->source_url->userInfo();
        return json_decode($this->http->request('GET', $user_info_url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $access_data['access_token'],
            ],
        ])->getBody()->getContents(),true);
    }
}