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

    abstract public function authorize();

    abstract public function accessToken();

    abstract public function userInfo();

    public function revoke()
    {
        throw new AuthException(AuthResponseStatus::UNSUPPORTED);
    }

    public function refresh()
    {
        throw new AuthException(AuthResponseStatus::UNSUPPORTED);
    }

    public function getConfigName()
    {
        return "";
    }
}