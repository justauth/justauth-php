<?php
/**
 * @author pfinal南丞
 * @date 2021年04月09日 下午2:21
 */
require __DIR__ . '/../common.php';
try {
    $config_path = __DIR__.'/../../config/oauth.php';
    $github = \JustAuth\AuthRequest::OAuth2($config_path,'github');
    # 授权登录
    $github->authorization();
} catch (\Exception $e) {
    echo $e->getMessage()."\n";
}
