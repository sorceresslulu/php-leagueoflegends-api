<?php
namespace LolAPI\Service\League\Ver2_5\Challenger;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeFactory;
use LolAPI\GameConstants\LeagueTier\LeagueTierFactory;
use LolAPI\Handler\HandlerInterface;
use LolAPI\Service\League\Ver2_5\Component\LeagueDTOBuilder;

class Service
{
    /**
     * Lol API Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * League.Challenger service
     * @param HandlerInterface $lolAPIHandler
     */
    public function __construct(HandlerInterface $lolAPIHandler)
    {
        $this->lolAPIHandler = $lolAPIHandler;
    }

    /**
     * Create and returns new League.Challenger query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query($this->getLolAPIHandler(), $request);
    }

    /**
     * Returns Lol API handler
     * @return HandlerInterface
     */
    protected function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }
}