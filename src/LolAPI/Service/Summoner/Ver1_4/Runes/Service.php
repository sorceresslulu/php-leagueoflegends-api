<?php
namespace LolAPI\Service\Summoner\Ver1_4\Runes;

use LolAPI\AbstractService;

class Service extends AbstractService
{
    /**
     * Create and returns a new "summoner.runes" query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query($this->getAPIHandler(), $request);
    }
}