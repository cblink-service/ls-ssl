<?php

namespace Cblink\Service\Le\Server;

use Cblink\Service\Kennel\AbstractApi;
use Cblink\Service\Le\LeConst;

class Client extends AbstractApi
{
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
}