<?php
/**
 * @author pfinal南丞
 * @date 2021年04月09日 下午2:14
 */

namespace JustAuth\Request\Source;

use pf\request\Request;
use JustAuth\Exception\AuthException;

class AuthStackoverflowRequest extends AuthCommonRequest
{
    /**
     *  获取授权跳转 执行重定向
     */
    public function authorization()
    {
        $auth_url = $this->source_url->authorize();
        $query    = array_filter([
            'client_id'     => $this->config['client_id'],
            'redirect_uri'  => $this->config['redirect_uri'],
            'response_type' => 'code',
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
        try {
            return $this->http->request('POST', $token_url, [
                'query' => $query,
            ])->getBody()->getContents();
        } catch (\Throwable $throwable) {
            throw new AuthException($throwable->getCode(), $throwable->getMessage());
        }
    }

    /**
     * 获取用户信息
     * @param $access_token
     * @return mixed
     */
    public function getUserInfo($access_token)
    {
        $access_data   = json_decode($access_token);
        $user_info_url = $this->source_url->userInfo();
        $query         = array_filter([
            'order'        => 'desc',
            'sort'         => 'reputation',
            'site'         => 'stackoverflow',
            'filter'         => '!6W.6dPDp64PF2',
            'key'         => $this->config['client_key'],
            'access_token' => $access_data->access_token
        ]);
        return json_decode($this->http->request('GET', $user_info_url, [
            'query' => $query
        ])->getBody()->getContents(), true);
    }
}