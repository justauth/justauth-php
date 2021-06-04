<?php
/**
 * @author pfinal南丞
 * @date 2021年06月02日 上午11:02
 */

namespace JustAuth\Config;


use JustAuth\Enums\AuthResponseStatus;
use JustAuth\Exception\AuthException;

abstract class AuthSource
{

    abstract public function authorize($driver);

    abstract public function accessToken($driver);

    abstract public function userInfo($driver);

    public function revoke()
    {
        throw new AuthException(AuthResponseStatus::UNSUPPORTED());
    }

    public function refresh()
    {
        throw new AuthException(AuthResponseStatus::UNSUPPORTED());
    }

    public function getConfigName()
    {
        return "";
    }
}