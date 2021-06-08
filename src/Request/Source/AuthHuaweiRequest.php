<?php


namespace JustAuth\Request\Source;


use pf\request\Request;

class AuthHuaweiRequest extends AuthCommonRequest
{
    public function authorization()
    {
        $auth_url = $this->source_url->authorize();
        $query    = array_filter([
            'response_type' => 'code',
            'client_id'     => $this->config['client_id'],
            'redirect_uri'  => $this->config['redirect_uri'],
            'access_type'   => 'offline',
            'scope'         => $this->config['scope'],
            'state'         => $this->config['state'],
        ]);

        $url = $auth_url . '?' . http_build_query($query);

        header('Location:' . $url);
        exit();
    }

    public function getAccessToken()
    {
        $token_Url = $this->source_url->accessToken();
        $query     = array_filter([
            'client_id'     => $this->config['client_id'],
            'code'          => Request::get('code') ?? Request::get('authorization_code'),
            'grant_type'    => 'authorization_code',
            'client_secret' => $this->config['client_secret'],
            'redirect_uri'  => $this->config['redirect_uri'],
        ]);
        $res       = json_decode($this->http->request('post', $token_Url, [
            'form_params' => $query,
        ])->getBody()->getContents());
        return $res->access_token;

    }

    public function getUserInfo($access_token)
    {
        $user_info_url = $this->source_url->userInfo();
        $query         = array_filter([
            'openid' => 'OPENID',

            'access_token' => $access_token,
        ]);
        return json_decode($this->http->request('POST', $user_info_url, [
            'form_params' => $query,
        ])->getBody()->getContents());
    }

}