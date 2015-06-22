<?php
namespace LolAPI\Service\Summoner\Ver1_4\Name;

use LolAPI\AbstractService;

class Service extends AbstractService
{
    /**
     * Create and returns a new "summoner.name"  query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request) {
        return new Query($this->getAPIHandler(), $request);
    }
}