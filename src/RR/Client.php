<?php

namespace Cblink\Service\Le\RR;

use Cblink\Service\Kennel\AbstractApi;

/**
 * Class Client
 * @package Cblink\Service\Le\RR
 */
class Client extends AbstractApi
{
    /**
     * 记录列表
     *
     * @param int $page
     * @param int $pageSize
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function lists($page = 1, $pageSize = 15)
    {
        return $this->get('api/rr', [
            'page' => $page,
            'page_size' => $pageSize
        ]);
    }

    /**
     * 创建记录
     *
     * @param $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function create($payload)
    {
        return $this->post('api/rr', $payload);
    }

    /**
     * 手动申请证书
     *
     * @param $id
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function apply($id)
    {
        $data = [];

        if ($this->app->config('debug')) {
            $data['debug'] = true;
        }

        return $this->post(sprintf('api/rr/%s/apply', $id));
    }

    /**
     * 手动执行部署
     *
     * @param $id
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function deploy($id)
    {
        return $this->post(sprintf('api/rr/%s/deploy', $id));
    }
}