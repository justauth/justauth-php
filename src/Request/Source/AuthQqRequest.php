<?php


namespace JustAuth\Request\Source;

use JustAuth\Enums\AuthResponseStatus;
use JustAuth\Exception\AuthException;
use pf\request\Request;

class AuthQqRequest extends AuthCommonRequest
{

    public function authorization()
    {
        $auth_url = $this->source_url->authorize();
        $query    = array_filter([
            'response_type' => 'code',
            'client_id'     => $this->config['client_id'],
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
        if (isset($_GET['access_token'])) {//兼容app授权登陆 dcloud返回access_token;
            return $_GET['access_token'];
        }
        $query     = array_filter([
            'client_id'     => $this->config['client_id'],
            'code'          => Request::get('code'),
            'grant_type'    => 'authorization_code',
            'client_secret' => $this->config['client_secret'],
            'redirect_uri'  => $this->config['redirect_uri'],
            'fmt'           => 'json',
        ]);
        $token_url = $this->source_url->accessToken();
        $res       = $this->http->request('get', $token_url, [
            'query' => $query,
        ])->getBody()->getContents();
        $data      = json_decode($res);
        if (isset($data->access_token)) {
            return $data->access_token;
        } else {
            return new AuthException(AuthResponseStatus::FAILURE());
        }
    }

    public function getUserInfo($access_token)
    {
        $result       = $this->getUid($access_token);
        $userinfo_url = $this->source_url->userInfo();
        $query        = array_filter([
            'openid'             => $result->openid,
            'oauth_consumer_key' => $result->client_id,
            'access_token'       => $access_token,
        ]);
        $userinfo     = json_decode($this->http->request('GET', $userinfo_url, [
            'query' => $query,
        ])->getBody()->getContents());
        if (0 != $userinfo->ret) {
            return new AuthException(AuthResponseStatus::GET_USERINFO_ERROR());
        }
        $userinfo->openid = $this->getUid($access_token)->openid;

        $userinfo->unionid = $this->getUnionid($access_token)->unionid;
        $user              = new \stdClass();
        $user->openid      = $userinfo->openid;
        $user->unionid     = $this->getUnionid($access_token)->unionid ?? '';
        $user->email       = $user->openid . '@open.qq.com';
        $user->nickname    = $userinfo->nickname;
        $user->avatar      = $userinfo->figureurl_2;
        return $user;
    }

    public function getUid($access_token)
    {
        $uid_url = $this->source_url->getUid();
        $str     = $this->http->get($uid_url . $access_token . '&fmt=json')->getBody()->getContents();
        $user    = json_decode($str);
        if (isset($user->openid)) {
            return $user;
        } else {
            return new AuthException(AuthResponseStatus::GET_OPENID_ERROR());
        }
    }

    public function getUnionid($access_token)
    {
        $id_url = $this->source_url->getUnionid();
        $str    = $this->http->get($id_url . $access_token . '&unionid=1&fmt=json')->getBody()->getContents();
        return json_decode($str);
    }
}