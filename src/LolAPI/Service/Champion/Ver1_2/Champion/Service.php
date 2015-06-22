<?php
namespace LolAPI\Service\Champion\Ver1_2\Champion;

use LolAPI\AbstractService;

class Service extends AbstractService
{
    /**
     * Create and returns a new "champion.champion" query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request) {
        return new Query($this->getAPIHandler(), $request);
    }
}