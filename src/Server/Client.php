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
    public function auth($page = 1, $pageSize = 15)
    {
        return $this->get('api/server', [
            'page' => $page,
            'page_size' => $pageSize,
            'platform' => [LeConst::PLATFORM_ALIYUN, LeConst::PLATFORM_SERVER_HOST]
        ]);
    }

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
            'platform' => [LeConst::PLATFORM_SERVER, LeConst::PLATFORM_QINIU, LeConst::PLATFORM_K8S]
        ]);
    }

    /**
     * @param $name
     * @param $config
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function server($name, $config)
    {
        return $this->post('api/server', [
            'platform' => LeConst::PLATFORM_SERVER,
            'name' => $name,
            'config' => $config
        ]);
    }

    /**
     * @param $name
     * @param $config
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function qiniu($name, $config)
    {
        return $this->post('api/server', [
            'platform' => LeConst::PLATFORM_QINIU,
            'name' => $name,
            'config' => $config
        ]);
    }

    /**
     * @param $name
     * @param $config
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function k8s($name, $config)
    {
        return $this->post('api/server', [
            'platform' => LeConst::PLATFORM_K8S,
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