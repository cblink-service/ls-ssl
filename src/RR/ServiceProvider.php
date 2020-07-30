<?php

namespace Cblink\Service\Le\RR;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['rr'] = function ($app) {
            return new Client($app);
        };
    }
}