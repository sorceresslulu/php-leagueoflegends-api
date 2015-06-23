<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0;

use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactory;
use LolAPI\Handler\HandlerInterface;

class Service
{
    /**
     * Lol API Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * MatchmakingQueueType Factory
     * @var MatchmakingQueueTypeFactory
     */
    private $matchmakingQueueTypeFactory;

    /**
     * MapId Factory
     * @var MapIdFactory
     */
    private $mapIdFactory;

    /**
     * Service
     * @param HandlerInterface $lolAPIHandler
     * @param MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory
     * @param MapIdFactory $mapIdFactory
     */
    function __construct(
        HandlerInterface $lolAPIHandler,
        MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory,
        MapIdFactory $mapIdFactory
    ){
        $this->lolAPIHandler = $lolAPIHandler;
        $this->matchmakingQueueTypeFactory = $matchmakingQueueTypeFactory;
        $this->mapIdFactory = $mapIdFactory;
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
     * @return MatchmakingQueueTypeFactory
     */
    protected function getMatchmakingQueueTypeFactory()
    {
        return $this->matchmakingQueueTypeFactory;
    }

    /**
     * @return MapIdFactory
     */
    protected function getMapIdFactory()
    {
        return $this->mapIdFactory;
    }

    /**
     * Create and returns a new FeaturedGames query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query(
            $this->getLolAPIHandler(),
            $request,
            $this->getMatchmakingQueueTypeFactory(),
            $this->getMapIdFactory()
        );
    }
}