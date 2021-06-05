<?php

namespace JustAuth\Tests;

use PHPUnit\Framework\TestCase;

class GithubTest extends TestCase
{
    public function testInstance()
    {
        $config_path = __DIR__ . '/../config/oauth.php';
        $github = \JustAuth\AuthRequest::OAuth2($config_path, 'github');
        $this->assertInstanceOf('JustAuth\Request\AuthApi', $github);
        return $github;
    }


}