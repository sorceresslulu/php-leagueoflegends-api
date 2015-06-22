<?php
namespace LolAPI\Service\Champion\Ver1_2\ChampionList;

use LolAPI\AbstractService;

class Service extends AbstractService
{
    /**
     * Create and returns a new "champion.champions" query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request) {
        return new Query($this->getAPIHandler(), $request);
    }
}