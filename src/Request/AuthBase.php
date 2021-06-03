<?php
/**
 * @author pfinal南丞
 * @date 2021年04月06日 下午6:50
 */

namespace JustAuth\Request;


use JustAuth\Enums\AuthResponseStatus;
use JustAuth\Exception\AuthException;

class AuthBase
{
    private $driver = ['gitee', 'github'];
    protected $config = [];
    protected $api_url = [];

    public function OAuth2($driver): AuthApi
    {
        try {
            $this->verified($driver);
        } catch (AuthException $e) {
            var_dump($e->getMessage());exit();
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }


    private function verified($driver): void
    {
        $parameter = ['client_id', 'redirect_uri', 'client_secret'];
        if (!in_array($driver, $this->driver)) {
            throw new AuthException(AuthResponseStatus::NOT_IMPLEMENTED);
        }
        if (count($this->config) <= 0) {
            throw new AuthException(AuthResponseStatus::CONFIG_ERROR);
        }
        if ([] != array_diff(array_keys($this->config), $parameter)) {
            throw new AuthException(AuthResponseStatus::CONFIG_ERROR);
        }
    }

}