<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByNames;

class Service extends \LolAPI\AbstractService
{
    public function createQuery(Request $request) {
        return new Query($this->getAPIHandler(), $request);
    }
}