<?php
/**
 * @author pfinal南丞
 * @date 2021年04月09日 下午2:14
 */

namespace JustAuth\Request\Source;

use pf\request\Request;

class AuthDouyinRequest extends AuthCommonRequest
{
    public $openid;
    public $unionid;

    /**
     *  获取授权跳转 执行重定向
     */
    public function authorization()
    {
        $auth_url = $this->source_url->authorize();
        $query    = array_filter([
            'response_type' => 'code',
            'client_key'    => $this->config['client_id'],
            'redirect_uri'  => $this->config['redirect_uri'],
            'scope'         => '',
            'state'         => $this->config['state'],
        ]);
        $url      = $auth_url . '?' . http_build_query($query);
        header('Location:' . $url);
        exit();
    }


    public function getAccessToken()
    {
        $token_url     = $this->source_url->accessToken();
        $query         = array_filter([
            'client_key'    => $this->config['client_id'],
            'code'          => Request::get('code'),
            'grant_type'    => 'authorization_code',
            'client_secret' => $this->config['client_secret'],
            'redirect_uri'  => $this->config['redirect_uri'],
        ]);
        $res           = json_decode($this->http->request('GET', $token_url, [
            'query' => $query,
        ])->getBody()->getContents())->data();
        $this->openid  = $res->open_id;
        $this->unionid = $res->unionid;
        return $res->access_token;
    }

    /**
     * 获取用户信息
     * @param $access_token
     * @return mixed
     */
    public function getUserInfo($access_token)
    {
        $query        = array_filter([
            'open_id' => $this->openid,

            'access_token' => $access_token,
        ]);
        $userinfo_url = $this->source_url->userInfo();
        $userinfo     = json_decode($this->http->request('GET', $userinfo_url, [
            'query' => $query,
        ])->getBody()->getContents())->data;

        $userinfo->openid  = $userinfo->open_id;
        $userinfo->unionid = $userinfo->union_id;

        return $userinfo;
    }
}