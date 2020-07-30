<?php

namespace Tests;

class AuthTest extends TestCase
{

    // dns验证，阿里云解析
    public function testAliyun()
    {
        $response = $this->app->auth->aliyun('阿里云', [
            'access_id' => 'xxxxxxxxxxxxx',
            'access_key' => 'xxxxxxxxxxxxxxx',
        ]);

        $this->assertTrue($response->success());
    }

    // http验证服务器验证
    public function testHttpServer()
    {
        $response = $this->app->auth->server('服务器http验证', [
            'host' => '127.0.0.1',
            'user' => 'root',
            'password' => '',
            'key' => file_get_contents(dirname(__DIR__) . '/config/cert.pem'),
            'path' => '/var/www/test',
        ]);

        $this->assertTrue($response->success(), $response->errMsg());
    }

}