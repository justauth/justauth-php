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
    public $github;
    public $weibo;

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
        $this->github = new class extends AuthSource {
            public function authorize(): string
            {
                return "https://github.com/login/oauth/authorize";
            }

            public function accessToken(): string
            {
                return "https://github.com/login/oauth/access_token";
            }

            public function userInfo(): string
            {
                return "https://api.github.com/user";
            }
        };
        $this->weibo = new class extends AuthSource {
            public function authorize(): string
            {
                return "https://api.weibo.com/oauth2/authorize";
            }

            public function accessToken(): string
            {
                return "https://api.weibo.com/oauth2/access_token";
            }

            public function userInfo(): string
            {
                return "https://api.weibo.com/2/users/show.json";
            }

            public function userId(): string
            {
                return "https://api.weibo.com/oauth2/get_token_info?access_token=";
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