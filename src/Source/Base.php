<?php
/**
 * @author pfinal南丞
 * @date 2021年04月06日 下午6:50
 */

namespace JustAuth\Source;

class Base
{
    use AuthRequestConfig;

    public function GithubOAuth2(array $arguments = [])
    {
        $this->_init_config();

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