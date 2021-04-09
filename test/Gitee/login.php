<?php
/**
 * @author pfinal南丞
 * @date 2021年04月09日 下午2:21
 */
require __DIR__ . '/../common.php';
$gitee = \JustAuth\AuthRequest::GiteeOAuth2();
var_dump($gitee::displayLoginAgent());