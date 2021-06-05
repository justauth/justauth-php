<?php

namespace JustAuth\Tests;

use PHPUnit\Framework\TestCase;

class GiteeTest extends TestCase
{
    public function testInstance()
    {
        $configPath = __DIR__ . '/../config/oauth.php';
        $authRequest = \JustAuth\AuthRequest::OAuth2($configPath, 'gitee');
        $this->assertInstanceOf('JustAuth\Request\AuthApi', $authRequest);
        return $authRequest;
    }

//    /**
//     * @depends testInstance
//     *
//     * @param \JustAuth\Request\AuthApi $github
//     *
//     */
//    public function testRouterAdd(\JustAuth\Request\AuthApi $github)
//    {
//        $github->authorization();
//    }

}