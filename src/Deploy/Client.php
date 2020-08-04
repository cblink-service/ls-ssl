<?php

namespace Cblink\Service\Le\Deploy;

use Cblink\Service\Kennel\AbstractApi;
use Cblink\Service\Le\LeConst;

class Client extends AbstractApi
{
    /**
     * @param int $page
     * @param int $pageSize
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function getLists($page = 1, $pageSize = 15)
    {
        return $this->get('api/deploy', [
            'page' => $page,
            'page_size' => $pageSize,
        ]);
    }
}