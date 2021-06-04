<?php
/**
 * @author pfinal南丞
 * @date 2021年06月03日 下午7:25
 */

namespace JustAuth\Config;


use JustAuth\Enums\AuthResponseStatus;
use JustAuth\Exception\AuthException;

class AuthDefaultSource
{

    public $gitee;

    public function __construct()
    {
        $this->gitee = new class extends AuthSource {
            public function authorize(): string
            {
                return "https://gitee.com/oauth/authorize";
            }

            public function accessToken(): string
            {
                return "https://gitee.com/oauth/token";
            }

            public function userInfo(): string
            {
                return "https://gitee.com/api/v5/user";
            }
        };
    }

    /**
     * @param $driver
     * @return mixed
     */
    public function getConfig($driver)
    {
        if (!property_exists(self::class, $driver)) {
            throw new AuthException(AuthResponseStatus::CONFIG_SOURCE_ERROR());
        }
        return $this->$driver;
    }
}