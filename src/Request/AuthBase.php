<?php
/**
 * @author pfinal南丞
 * @date 2021年04月06日 下午6:50
 */

namespace JustAuth\Request;


use JustAuth\Config\AuthDefaultSource;
use JustAuth\Enums\AuthResponseStatus;
use JustAuth\Exception\AuthException;
use pf\config\Config;

class AuthBase
{
    private $driver = ['gitee', 'github', 'dingtalk', 'weibo', 'weixin', 'douyin', 'qq', 'huawei', 'google', 'baidu', 'oschina', 'stackoverflow'];
    protected $source_config;
    protected $config = [];

    public function __construct()
    {
        $this->source_config = new AuthDefaultSource();
    }

    public function OAuth2($config, $driver)
    {
        try {
            # 加载配置文件
            $source_config = $this->source_config->getConfig($driver);
            $this->config  = $this->get_config($config, $driver);
            $this->verified($driver);
            return new AuthApi($driver, $this->config, $source_config);
        } catch (AuthException $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }


    protected function get_config($config_path, $driver)
    {
        if (!file_exists($config_path)) {
            throw new AuthException(AuthResponseStatus::CONFIG_ERROR());
        }
        $config = require $config_path;
        if (!isset($config[$driver])) {
            throw new AuthException(AuthResponseStatus::CONFIG_ERROR());
        }
        return $config[$driver];
    }

    private function verified($driver): void
    {
        if (!in_array($driver, $this->driver)) {
            throw new AuthException(AuthResponseStatus::NOT_IMPLEMENTED());
        }
    }

}