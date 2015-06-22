<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus;

use LolAPI\AbstractService;

class Service extends AbstractService
{
    /**
     * Create and returns a new "status.shard.status" query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query($this->getAPIHandler(), $request);
    }
}