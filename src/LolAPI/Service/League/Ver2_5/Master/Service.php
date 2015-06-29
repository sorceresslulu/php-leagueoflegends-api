<?php
namespace LolAPI\Service\League\Ver2_5\Master;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeFactory;
use LolAPI\GameConstants\LeagueTier\LeagueTierFactory;
use LolAPI\Handler\HandlerInterface;
use LolAPI\Service\League\Ver2_5\Component\DTOBuilder;

class Service
{
    /**
     * Lol API Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * LeagueQueueType Factory
     * @var LeagueQueueTypeFactory
     */
    private $leagueQueueTypeFactory;

    /**
     * LeagueTier Factory
     * @var LeagueTierFactory
     */
    private $leagueTierFactory;

    /**
     * League.Master service
     * @param HandlerInterface $lolAPIHandler
     * @param LeagueQueueTypeFactory $leagueQueueTypeFactory
     * @param LeagueTierFactory $leagueTierFactory
     */
    public function __construct(
        HandlerInterface $lolAPIHandler,
        LeagueQueueTypeFactory $leagueQueueTypeFactory,
        LeagueTierFactory $leagueTierFactory)
    {
        $this->lolAPIHandler = $lolAPIHandler;
        $this->leagueQueueTypeFactory = $leagueQueueTypeFactory;
        $this->leagueTierFactory = $leagueTierFactory;
    }

    /**
     * Crewate and returns new League.Master query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query(
            $this->getLolAPIHandler(),
            $request,
            new DTOBuilder(
                $this->getLeagueQueueTypeFactory(),
                $this->getLeagueTierFactory()
            )
        );
    }

    /**
     * Returns Lol API handler
     * @return HandlerInterface
     */
    protected function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }

    /**
     * Returns LeagueQueueType Factory
     * @return LeagueQueueTypeFactory
     */
    protected function getLeagueQueueTypeFactory()
    {
        return $this->leagueQueueTypeFactory;
    }

    /**
     * Returns LeagueTier Factory
     * @return LeagueTierFactory
     */
    protected function getLeagueTierFactory()
    {
        return $this->leagueTierFactory;
    }
}