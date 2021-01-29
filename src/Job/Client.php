<?php

namespace Cblink\Service\Le\Job;

use Cblink\Service\Kennel\AbstractApi;
use Cblink\Service\Le\LeConst;

class Client extends AbstractApi
{
    /**
     * @param int $page
     * @param int $pageSize
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function lists($page = 1, $pageSize = 15)
    {
        return $this->post('api/failed-queue', [
            'page' => $page,
            'page_size' => $pageSize
        ]);
    }

    /**
     * @param $id
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function retry($id)
    {
        return $this->post(sprintf('api/failed-queue/%s/retry', $id));
    }

    public function destroy($id)
    {
        return $this->delete(sprintf('api/failed-queue/%s', $id));
    }
}