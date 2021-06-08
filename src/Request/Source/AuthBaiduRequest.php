<?php
/**
 * @author pfinal南丞
 * @date 2021年06月07日 下午2:56
 */

namespace JustAuth\Request\Source;

use pf\request\Request;

class AuthBaiduRequest extends AuthCommonRequest
{
    /**
     *  获取授权跳转 执行重定向
     */
    public function authorization()
    {
        $auth_url = $this->source_url->authorize();
        $query    = array_filter([
            'response_type' => 'code',
            'client_id'     => $this->config['client_id'],
            'redirect_uri'  => urlencode($this->config['redirect_uri']),
            'scope'         => 'email',
            'display'       => 'popup'
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
            'code'          => Request::get('code'),
            'grant_type'    => 'authorization_code',
            'client_secret' => $this->config['client_secret'],
            'redirect_uri'  => $this->config['redirect_uri'],
        ]);
        return $this->http->request('POST', $token_url, [
            'query' => $query,
        ])->getBody()->getContents();
    }

    public function getUserInfo($access_token)
    {
        $user_info_url = $this->source_url->userInfo();
        $query         = array_filter([
            'access_token' => $access_token,
        ]);
        return json_decode($this->http->request('GET', $user_info_url, [
            'query' => $query,
        ])->getBody()->getContents());
    }
}