<?php
/**
 * @author pfinal南丞
 * @date 2021年04月09日 下午2:21
 */
require __DIR__ . '/../common.php';
try {
    $gitee = \JustAuth\AuthRequest::OAuth2('gitee');
    var_dump($gitee->authorization());
} catch (\Exception $e) {
    echo $e->getMessage()."\n";
}

