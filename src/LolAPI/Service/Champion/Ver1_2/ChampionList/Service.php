<?php
namespace LolAPI\Service\Champion\Ver1_2\ChampionList;

use LolAPI\AbstractService;

class Service extends AbstractService
{
    public function createQuery(Request $request) {
        return new Query($this->getAPIHandler(), $request);
    }
}