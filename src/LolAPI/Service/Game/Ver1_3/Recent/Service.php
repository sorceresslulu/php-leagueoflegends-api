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
     * Game.Recent service
     * @param $lolAPIHandler
     */
    public function __construct($lolAPIHandler)
    {
        $this->lolAPIHandler = $lolAPIHandler;
    }


    /**
     * Create and returns a new Game.Recent query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query($this->getLolAPIHandler(), $request);
    }

    /**
     * Returns Lol API Handler
     * @return HandlerInterface
     */
    protected function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }
}