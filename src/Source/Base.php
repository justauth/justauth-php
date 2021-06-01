<?php
/**
 * @author pfinal南丞
 * @date 2021年04月06日 下午6:50
 */

namespace JustAuth\Source;


use JustAuth\Exception\InvalidArgumentException;
use JustAuth\Exception\PlatFormException;

class Base
{
    use AuthRequestConfig;

    private $driver = ['gitee', 'github'];
    protected $config = [];
    protected $api_url = [];

    /**
     * @param $driver
     * @return AuthApi
     * @throws InvalidArgumentException
     * @throws PlatFormException
     */
    public function OAuth2($driver): AuthApi
    {
        $this->_init_config($driver);
        $this->config = $this->platform_params;
        $this->api_url = $this->platform_source;
        try {
            $this->verified($driver);
            return new AuthApi($driver,$this->config,$this->api_url);
        } catch (InvalidArgumentException $e) {
            throw new InvalidArgumentException($e->getMessage(), $e->getCode());
        } catch (PlatFormException $e) {
            throw new PlatFormException($e->getMessage(), $e->getCode());
        }
    }

    private function _init_config($driver)
    {
        if (!$this->platform_params) {
            $this->getPlatFormParamsConfig($driver);
        }
        if (!$this->platform_source) {
            $this->getPlatFormSourceConfig($driver);
        }
    }

    /**
     * @throws InvalidArgumentException
     */
    private function verified($driver): void
    {
        $parameter = ['client_id', 'redirect_uri', 'client_secret'];
        if (!in_array($driver, $this->driver)) {
            throw new InvalidArgumentException('目前不支持该平台');
        }
        if (count($this->config) <= 0) {
            throw new InvalidArgumentException('配置信息错误');
        }
        if ([] != array_diff(array_keys($this->config), $parameter)) {
            throw new InvalidArgumentException('配置信息错误');
        }
    }

}