<?php
/**
 * @author pfinal南丞
 * @date 2021年04月06日 下午7:05
 */

namespace JustAuth\Source;

use pf\config\Config;

trait AuthRequestConfig
{
    protected $platform_params = [];
    protected $platform_source = [];

    public function getPlatFormParamsConfig()
    {
        Config::loadFiles(__DIR__);
        $platform_params = Config::get('auth_config');
        $this->platform_params = $platform_params;
        return $platform_params;
    }

    public function getPlatFormSourceConfig()
    {
        Config::loadFiles(__DIR__);
        $platform_source = Config::get('auth_default_source');
        $this->platform_source = $platform_source;
        return $platform_source;
    }
}