<?php
namespace LolAPI\Service\LolStatus\Ver1_0\Shards;

use LolAPI\AbstractService;

class Service extends AbstractService
{
    /**
     * Create and returns a new "status.shards" query
     * @return Query
     */
    public function createQuery()
    {
        return new Query($this->getAPIHandler());
    }
}