<?php

namespace Tests;

class ServerTest extends TestCase
{
    // 服务器部署
    public function testServer()
    {
        $response = $this->app->server->server('服务器', [
            'host' => 'xxxxxxxxxxxxx',
            'user' => 'root',
            'key' => file_get_contents(dirname(__DIR__) . '/config/cert.pem'),
            'cert_path' => '/var/www/test/cert.pem',
            'cert_key_path' => '/var/www/test/cert.key',
        ]);

        $this->assertTrue($response->success(), $response->errMsg());
    }

    // 服务器部署
    public function testK8s()
    {
        $response = $this->app->server->k8s('k8s', [
            'master' => 'https://127.0.0.1:7777',
            'ca' => file_get_contents(dirname(__DIR__) . '/config/ca.pem'),
            'client_pem' => file_get_contents(dirname(__DIR__) . '/config/client.pem'),
            'client_key' => file_get_contents(dirname(__DIR__) . '/config/client.key'),
            'namespace' => 'default'
        ]);

        $this->assertTrue($response->success(), $response->errMsg());
    }

    // 服务器部署
    public function testQiniu()
    {
        $response = $this->app->server->qiniu('七牛', [
            'access_id' => 'xxxxxxxxxx',
            'access_key' => 'xxxxxxxxxxxxxxxxxx',
            'domain' => 'test.test.cblink.net',
            'force_https' => false,
            'http2' => true,
        ]);

        $this->assertTrue($response->success(), $response->errMsg());
    }

    // 获取部署列表
    public function testLists()
    {
        $response = $this->app->server->lists();

        $this->assertTrue($response->success(), $response->errMsg());
    }

    // 获取授权列表
    public function testAuth()
    {
        $response = $this->app->server->auth();

        $this->assertTrue($response->success(), $response->errMsg());
    }

    // 复制部署
    public function testCopy()
    {
        $response = $this->app->server->copy(32);

        $this->assertTrue($response->success(), $response->errMsg());
    }

    // 删除部署
    public function testDestroy()
    {
        $response = $this->app->server->destroy(32);

        $this->assertTrue($response->success(), $response->errMsg());
    }

}