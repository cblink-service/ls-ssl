<?php

namespace Cblink\Service\Le\Server;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['server'] = function ($app) {
            return new Client($app);
        };
    }
}