<?php

/**
 * @author pfinal南丞
 * @date 2021年06月07日 下午2:25
 */

use PHPUnit\Framework\TestCase;

class WeiboTest extends TestCase
{
    public function testInstance()
    {
        $config_path = __DIR__ . '/../config/oauth.php';
        $weibo = \JustAuth\AuthRequest::OAuth2($config_path, 'weibo');
        $this->assertInstanceOf('JustAuth\Request\AuthApi', $weibo);
        return $weibo;
    }
}