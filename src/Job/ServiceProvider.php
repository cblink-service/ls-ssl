<?php

namespace Cblink\Service\Le\Job;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['job'] = function ($app) {
            return new Client($app);
        };
    }
}