<?php
namespace LolAPI\Service\Game\Ver1_3\Recent;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\GameType\GameTypeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\SubType\SubTypeFactory;
use LolAPI\GameConstants\TeamSide\TeamSideFactory;
use LolAPI\Handler\HandlerInterface;

class Service
{
    /**
     * Lol API Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * TeamSide Factory
     * @var TeamSideFactory
     */
    private $teamSideFactory;

    /**
     * GameType Factory
     * @var GameTypeFactory
     */
    private $gameTypeFactory;

    /**
     * GameMode Factory
     * @var GameModeFactory
     */
    private $gameModeFactory;

    /**
     * SubType Factory
     * @var SubTypeFactory
     */
    private $subTypeFactory;

    /**
     * MapId Factory
     * @var MapIdFactory
     */
    private $mapIdFactory;

    public function __construct(
        HandlerInterface $lolAPIHandler,
        TeamSideFactory $teamSideFactory,
        GameTypeFactory $gameTypeFactory,
        GameModeFactory $gameModeFactory,
        SubTypeFactory $subTypeFactory,
        MapIdFactory $mapIdFactory
    ){
        $this->lolAPIHandler = $lolAPIHandler;
        $this->teamSideFactory = $teamSideFactory;
        $this->gameTypeFactory = $gameTypeFactory;
        $this->gameModeFactory = $gameModeFactory;
        $this->subTypeFactory = $subTypeFactory;
        $this->mapIdFactory = $mapIdFactory;
    }

    /**
     * Create and returns a new Game.Recent query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query(
            $this->getLolAPIHandler(),
            $request,
            $this->getTeamSideFactory(),
            $this->getGameTypeFactory(),
            $this->getGameModeFactory(),
            $this->getSubTypeFactory(),
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
     * Returns TeamSide Factory
     * @return TeamSideFactory
     */
    protected function getTeamSideFactory()
    {
        return $this->teamSideFactory;
    }

    /**
     * returns GameType Factory
     * @return GameTypeFactory
     */
    protected function getGameTypeFactory()
    {
        return $this->gameTypeFactory;
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
     * Returns SubType Factory
     * @return SubTypeFactory
     */
    protected function getSubTypeFactory()
    {
        return $this->subTypeFactory;
    }

    /**
     * Returns MapId Factory
     * @return MapIdFactory
     */
    public function getMapIdFactory()
    {
        return $this->mapIdFactory;
    }
}