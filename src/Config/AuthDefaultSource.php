<?php
/**
 * @author pfinal南丞
 * @date 2021年06月03日 下午7:25
 */

namespace JustAuth\Config;


use pf\config\Config;
use pf\enum\Enum;

class AuthDefaultSource extends AuthSource
{
    public function authorize($driver)
    {
        self::_init_config($driver);
        var_dump($driver);exit();
    }

    public function accessToken($driver)
    {
    }


    public function userInfo($driver)
    {

    }

    public function _init_config($driver)
    {
        Config::loadFiles(__DIR__.'/auth_default_source.php');
        $config = Config::all();
        var_dump($config);exit();
        var_dump($driver);exit();
    }
}