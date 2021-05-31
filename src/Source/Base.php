<?php
/**
 * @author pfinal南丞
 * @date 2021年04月06日 下午6:50
 */

namespace JustAuth\Source;

use http\Exception\InvalidArgumentException;

class Base
{
    use AuthRequestConfig;

    private $driver = ['gitee', 'github'];
    protected $config = [
        'client_id'     => '',
        'redirect_uri'  => '',
        'client_secret' => '',
    ];

    public function OAuth2($driver)
    {
        if (array_key_exists($driver, $this->config)) {
            $this->config = $this->config[$driver];
        }
        try {
            $this->verified($driver);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    private function _init_config()
    {
        if (!$this->platform_params) {
            $this->getPlatFormParamsConfig();
        }
        if (!$this->platform_source) {
            $this->getPlatFormSourceConfig();
        }
    }

    private function verified($driver) :void
    {
        $parameter = ['client_id', 'redirect_uri', 'client_secret'];

        if (!in_array($driver, $this->driver)) {
            throw new InvalidArgumentException('目前不支持该平台');
        }
        if ('microsoft' == $driver) {
            array_push($parameter, 'region');
        }

        if (false == Helpers::intendedEffect(array_keys($this->config), $parameter)) {
            throw new InvalidArgumentException('配置信息错误');
        }
    }

}