<?php

namespace Cblink\Service\Le\Auth;

use Cblink\Service\Kennel\AbstractApi;
use Cblink\Service\Le\LeConst;

class Client extends AbstractApi
{
    public function store($platform, $name, $config)
    {
        return $this->post('api/server', [
            'platform' => $platform,
            'name' => $name,
            'config' => $config
        ]);
    }
    /**
     * 阿里云配置信息
     *
     * @param $name
     * @param $config
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function aliyun($name, $config)
    {
        return $this->store(LeConst::PLATFORM_ALIYUN, $name, $config);
    }

    /**
     * 服务器配置信息
     *
     * @param $name
     * @param $config
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function server($name, $config)
    {
        return $this->store(LeConst::PLATFORM_SERVER_HOST, $name, $config);
    }
}