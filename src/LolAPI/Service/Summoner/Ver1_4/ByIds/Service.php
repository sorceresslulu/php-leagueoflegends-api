<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByIds;

use LolAPI\AbstractService;

class Service extends AbstractService
{
    public function createQuery(Request $request) {
        return new Query($this->getAPIHandler(), $request);
    }
}