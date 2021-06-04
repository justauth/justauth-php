<?php
/**
 * @author pfinal南丞
 * @date 2021年04月09日 下午2:14
 */

namespace JustAuth\Request\Source;

use pf\request\Request;

class AuthWeiboRequest extends AuthCommonRequest
{
    /**
     *  获取授权跳转 执行重定向
     */
    public function authorization()
    {
        $auth_url = $this->source_url->authorize();
        $query    = array_filter([
            'client_id'    => $this->config['client_id'],
            'redirect_uri' => $this->config['redirect_url'],
        ]);
        $url      = $auth_url . '?' . http_build_query($query);
        header('Location:' . $url);
        exit();
    }


    public function getAccessToken()
    {
        if ('token' == Request::get('code')) return Request::get('access_token');
        $token_url = $this->source_url->accessToken();
        $query     = array_filter([
            'client_id'     => $this->config['client_id'],
            'redirect_uri'  => $this->config['redirect_url'],
            'code'          => Request::get('code'),
            'client_secret' => $this->config['client_secret'],
            'grant_type'    => 'authorization_code'
        ]);
        return json_decode($this->http->request('POST', $token_url, [
            'query' => $query,
        ])->getBody()->getContents())->access_token;
    }

    /**
     * 获取用户信息
     * @param $access_token
     * @return mixed
     */
    public function getUserInfo($access_token)
    {
        $user_info_url = $this->source_url->userInfo();
        $query         = array_filter([
            'uid'          => $this->getUid($access_token),
            'access_token' => $access_token,
        ]);
        return json_decode($this->http->request('GET', $user_info_url, [
            'query' => $query,
        ])->getBody()->getContents());
    }

    /**
     * @param $access_token
     * @return mixed
     */
    public function getUid($access_token)
    {
        $user_id_url = $this->source_url->userId();
        $result      = $this->http->post($user_id_url . $access_token);
        $result      = json_decode($result->getBody()->getContents(), true);
        return $result['uid'];
    }
}