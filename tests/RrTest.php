<?php

namespace Tests;

class RrTest extends TestCase
{

    // 证书列表
    public function testLists()
    {
       $response = $this->app->rr->lists();

       $this->assertTrue($response->success(), $response->errMsg());
    }

    // 创建解析
    public function testCreate()
    {
        $response = $this->app->rr->create([
            'auth_id' => 1,
            'email' => 'test@cblink.net',
            'rr' => '*.test',
            'domain'=> 'cblink.net',
            'renew' => false,
            'server_infos' => [3],
        ]);

        $this->assertTrue($response->success(), $response->errMsg());
    }

    // 手动申请证书，如果 上一步 renew 为 true,无需操作这个步骤
    public function testApply()
    {
        $response = $this->app->rr->apply(1);

        $this->assertTrue($response->success(), $response->errMsg());
    }

    // 手动触发部署，自动任务也许会失败
    public function testDeploy()
    {
        $response = $this->app->rr->deploy(30);

        $this->assertTrue($response->success(), $response->errMsg());
    }

    // 获取域名关联的认证信息
    public function testGetAuth()
    {
        $response = $this->app->rr->auth(30);

        $this->assertTrue($response->success(), $response->errMsg());
    }

    // 获取记录关联的部署
    public function testGetServer()
    {
        $response = $this->app->rr->servers(30);

        $this->assertTrue($response->success(), $response->errMsg());
    }

    // 查看域名下的申请订单列表
    public function testOrders()
    {
        $response = $this->app->rr->orders(29);

        $this->assertTrue($response->success(), $response->errMsg());
    }
}