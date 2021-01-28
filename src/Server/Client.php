<?php

namespace Cblink\Service\Le\Server;

use Cblink\Service\Kennel\AbstractApi;
use Cblink\Service\Le\LeConst;

class Client extends AbstractApi
{
    /**
     * 列表
     *
     * @param int $page
     * @param int $pageSize
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function lists($page = 1, $pageSize = 15)
    {
        return $this->get('api/server', [
            'page' => $page,
            'page_size' => $pageSize,
            'platform' => [
                LeConst::PLATFORM_ALIYUN_CDN,
                LeConst::PLATFORM_ALIYUN_DCDN,
                LeConst::PLATFORM_SERVER,
                LeConst::PLATFORM_QINIU,
                LeConst::PLATFORM_K8S,
                LeConst::PLATFORM_ALIYUN_FC,
            ]
        ]);
    }

    /**
     * 列表
     *
     * @param int $page
     * @param int $pageSize
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function auth($page = 1, $pageSize = 15)
    {
        return $this->get('api/server', [
            'page' => $page,
            'page_size' => $pageSize,
            'platform' => [LeConst::PLATFORM_ALIYUN, LeConst::PLATFORM_SERVER_HOST]
        ]);
    }

    /**
     * 保存
     *
     * @param $platform
     * @param $name
     * @param $config
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function store($platform, $name, $config)
    {
        return $this->post('api/server', [
            'platform' => $platform,
            'name' => $name,
            'config' => $config
        ]);
    }

    /**
     * 复制记录
     *
     * @param $id
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function copy($id)
    {
        return $this->post(sprintf('api/server/%s/copy', $id));
    }

    /**
     * 修改配置项
     *
     * @param $id
     * @param $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function update($id, $payload)
    {
        return $this->put(sprintf('api/server/%s', $id), $payload);
    }

    /**
     * 获取详情
     *
     * @param $id
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function show($id)
    {
        return $this->get(sprintf('api/server/%s', $id));
    }

    /**
     * 删除记录
     *
     * @param $id
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function destroy($id)
    {
        return $this->delete(sprintf('api/server/%s', $id));
    }
}