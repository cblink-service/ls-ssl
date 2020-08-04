<?php

namespace Cblink\Service\Le\Deploy;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['deploy'] = function ($app) {
            return new Client($app);
        };
    }
}