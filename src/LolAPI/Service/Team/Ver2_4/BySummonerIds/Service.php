<?php
namespace LolAPI\Service\Team\Ver2_4\BySummonerIds;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\Handler\HandlerInterface;

class Service
{
    /**
     * Lol API Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;


    /**
     * GameMode Factory
     * @var GameModeFactory
     */
    private $gameModeFactory;

    /**
     * MapId Factory
     * @var MapIdFactory
     */
    private $mapIdFactory;

    /**
     * Team.BySummonerIdsIds
     * @param HandlerInterface $lolAPIHandler
     * @param GameModeFactory $gameModeFactory
     * @param MapIdFactory $mapIdFactory
     */
    public function __construct(HandlerInterface $lolAPIHandler, GameModeFactory $gameModeFactory, MapIdFactory $mapIdFactory)
    {
        $this->lolAPIHandler = $lolAPIHandler;
        $this->gameModeFactory = $gameModeFactory;
        $this->mapIdFactory = $mapIdFactory;
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
            $request,
            $this->getGameModeFactory(),
            $this->getMapIdFactory()
        );
    }

    /**
     * Returns Lol API Handler
     * @return HandlerInterface
     */
    protected function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }

    /**
     * Returns GameMode Factory
     * @return GameModeFactory
     */
    protected function getGameModeFactory()
    {
        return $this->gameModeFactory;
    }

    /**
     * Returns MapId Factory
     * @return MapIdFactory
     */
    protected function getMapIdFactory()
    {
        return $this->mapIdFactory;
    }
}