<?php
/**
 * @author pfinal南丞
 * @date 2021年04月09日 下午2:14
 */

namespace JustAuth\Request\Source;

use pf\request\Request;

class AuthDingtalkRequest extends AuthCommonRequest
{
    public function authorization()
    {
        $auth_url = $this->source_url->authorize();
        $query    = array_filter([
            'appid'         => $this->config['client_id'],
            'redirect_uri'  => $this->config['redirect_uri'],
            'response_type' => 'code',
            'scope'         => 'snsapi_login',
            'state'         => 'STATE',
        ]);
        $url      = $auth_url . '?' . http_build_query($query);
        header('Location:' . $url);
        exit();
    }


    public function getAccessToken()
    {
        $token_url = $this->source_url->accessToken();
        $query     = array_filter([
            'accessKey'     => $this->config['client_id'],
            'redirect_uri'  => $this->config['redirect_url'],
            'code'          => Request::get('code'),
            'client_secret' => $this->config['client_secret'],
            'grant_type'    => 'authorization_code'
        ]);
        return json_decode($this->http->request('POST', $token_url, [
            'query' => $query,
        ])->getBody()->getContents())->access_token;
    }


    public function getUserInfo($access_token = '')
    {
        $time          = millisecondWay();
        $signature     = $this->_setSignature($time);
        $user_info_url = $this->source_url->userInfo();
        $query         = array_filter([
            'accessKey' => $this->config['client_id'],
            'signature' => $signature,
            'timestamp' => $time,
        ]);
        var_dump($this->http->request('POST', $user_info_url, [
            'query' => $query,
            'form_params'  => [
                'tmp_auth_code' => Request::get('code')
            ]
        ])->getBody()->getContents());exit();
        return json_decode($this->http->request('POST', $user_info_url, [
            'query' => $query,
            'body'  => [
                'tmp_auth_code' => Request::get('code')
            ]
        ])->getBody()->getContents());
    }

    private function _setSignature($time)
    {
        $s         = hash_hmac('sha256', $time, $this->config['client_secret'], true);
        $signature = base64_encode($s);
        return urlencode($signature);
    }

    public function getUid($access_token)
    {
        $user_id_url = $this->source_url->userId();
        $result      = $this->http->post($user_id_url . $access_token);
        $result      = json_decode($result->getBody()->getContents(), true);
        return $result['uid'];
    }
}