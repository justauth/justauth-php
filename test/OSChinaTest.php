<?php

namespace JustAuth\Tests;

use PHPUnit\Framework\TestCase;

class OSChinaTest extends TestCase
{
    public function testInstance()
    {
        $config_path = __DIR__ . '/../config/oauth.php';
        $github = \JustAuth\AuthRequest::OAuth2($config_path, 'oschina');
        $this->assertInstanceOf('JustAuth\Request\AuthApi', $github);
        return $github;
    }
}