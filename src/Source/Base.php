<?php
/**
 * @author pfinal南丞
 * @date 2021年04月06日 下午6:50
 */

namespace JustAuth\Source;

class Base
{
    use AuthRequestConfig;

    /**
     *  github 登录
     * @param array $arguments
     */
    public function GithubOAuth2(array $arguments = [])
    {
        $this->_init_config();
        var_dump($this->platform_params);
    }

    /**
     * @param array $arguments
     * @return Gitee\OAuth2
     */
    public function GiteeOAuth2(array $arguments = []): Gitee\OAuth2
    {
        $this->_init_config();
        return new \JustAuth\Source\Gitee\OAuth2($this->platform_source, $this->platform_params);
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

}