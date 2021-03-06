<?php
namespace LolAPI\Service\Team\Ver2_4\ByTeamIds;

use LolAPI\Handler\LolAPIHandlerInterface;

class Service
{
    /**
     * Lol API Handler
     * @var LolAPIHandlerInterface
     */
    private $lolAPIHandler;

    /**
     * Team.BySummonerIdsIds
     * @param LolAPIHandlerInterface $lolAPIHandler
     */
    public function __construct(LolAPIHandlerInterface $lolAPIHandler)
    {
        $this->lolAPIHandler = $lolAPIHandler;
    }

    /**
     * Create and returns a new Team.BySummonerIds query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query(
            $this->getLolAPIHandler(),
            $request
        );
    }

    /**
     * Returns Lol API Handler
     * @return LolAPIHandlerInterface
     */
    protected function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }
}