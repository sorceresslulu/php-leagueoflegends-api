<?php
namespace LolAPI\Service\Summoner\Ver1_4\Masteries;

class Service extends \LolAPI\AbstractService
{
    /**
     * Create and returns a new "summoner.masteries" query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query($this->getAPIHandler(), $request);
    }
}