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

    public function getPlatFormParamsConfig($driver) :array
    {
        Config::loadFiles(dirname(__DIR__) . '/../config');
        $platform_params = Config::get('oauth');
        $this->platform_params = $platform_params[$driver];
        if (isset($platform_params[$driver])) {
            return $platform_params[$driver];
        }
        return [];
    }

    public function getPlatFormSourceConfig($driver) :array
    {
        Config::loadFiles(__DIR__.'/../Config');
        $platform_source = Config::get('auth_default_source');
        $this->platform_source = $platform_source[$driver];
        if (isset($platform_source[$driver])) {
            return $platform_source[$driver];
        }
        return [];
    }
}