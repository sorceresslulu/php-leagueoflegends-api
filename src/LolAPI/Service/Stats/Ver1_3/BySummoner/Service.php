<?php
namespace LolAPI\Service\Stats\Ver1_3\BySummoner;

use LolAPI\AbstractService;

class Service extends AbstractService
{
    public function createQuery(Request $request)
    {
        return new Query($this->getAPIHandler(), $request);
    }
}