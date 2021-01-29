<?php

namespace Cblink\Service\Le;

use Cblink\Service\Kennel\ServiceContainer;

/**
 * Class ShortUrl
 * @package Cblink\Service\ShortUrl
 * @property-read Server\Client $server     服务器配置
 * @property-read Auth\Client $auth         认证配置
 * @property-read RR\Client $rr             记录管理
 * @property-read Deploy\Client $deploy     部署记录
 * @property-read Job\Client $job           队列
 */
class LeSsl extends ServiceContainer
{
    /**
     * @var string
     */
    protected $base_url = 'https://api.service.cblink.net/le';

    protected function getCustomProviders(): array
    {
        return [
            Auth\ServiceProvider::class,
            RR\ServiceProvider::class,
            Server\ServiceProvider::class,
            Deploy\ServiceProvider::class,
        ];
    }
}