<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo;

use LolAPI\AbstractService;

class Service extends AbstractService
{
    /**
     * Create and returns CurrentGame.SpectatorGameInfo query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query($this->getAPIHandler(), $request);
    }
}