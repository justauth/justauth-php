<?php
/**
 * @author pfinal南丞
 * @date 2021年04月09日 下午2:14
 */

namespace JustAuth\Request\Source;

use JustAuth\Exception\AuthException;
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
            'appid'     => $this->config['client_id'],
            'appsecret' => $this->config['client_secret'],
        ]);
        return $this->http->request('GET', $token_url, [
            'query' => $query,
        ])->getBody()->getContents();
    }


    public function getUserInfo($access_token)
    {
        $access_data = json_decode($access_token, true);
        //$permanent_code = $this->getPersistentCode($access_data['access_token'], Request::get('code'));
        $time          = millisecondWay();
        $signature     = $this->_setSignature($time);
        $user_info_url = $this->source_url->userInfo();
        $query         = array_filter([
            'accessKey' => $this->config['client_id'],
            'signature' => $signature,
            'timestamp' => $time,
        ]);
        $result        = json_decode($this->http->request('POST', $user_info_url, [
            'query'   => $query,
            'headers' => ['content-type' => 'application/json'],
            'body'    => json_encode([
                'tmp_auth_code' => Request::get('code')
            ])
        ])->getBody()->getContents(), true);
        if ($result && isset($result['errcode'])) {
            throw new AuthException($result['errcode'], $result['errmsg']);
        }
        return $result;
    }

    private function _setSignature($time)
    {
        $s         = hash_hmac('sha256', $time, $this->config['client_secret'], true);
        $signature = base64_encode($s);
        return $signature;
        //return urlencode($signature);
    }

    public function getUid($access_token)
    {
        $user_id_url = $this->source_url->userId();
        $result      = $this->http->post($user_id_url . $access_token);
        $result      = json_decode($result->getBody()->getContents(), true);
        return $result['uid'];
    }

    private function getPersistentCode($access_token, $tmp_auth_code)
    {
        $get_permanent_code_url = $this->source_url->getPersistentCode();
        $query                  = array_filter([
            'access_token' => $access_token
        ]);
        try {
            $result = $this->http->request('POST', $get_permanent_code_url, [
                'query'   => $query,
                'headers' => ['content-type' => 'application/json'],
                'body'    => json_encode([
                    'tmp_auth_code' => $tmp_auth_code
                ])
            ]);
            return json_decode($result->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return new AuthException(GET_OPENID_ERROR());
        }
    }
}