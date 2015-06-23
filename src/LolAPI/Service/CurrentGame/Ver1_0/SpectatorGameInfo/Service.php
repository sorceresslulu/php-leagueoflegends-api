<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactory;
use LolAPI\Handler\HandlerInterface;
use LolAPI\Platform\PlatformFactory;

class Service
{
    /**
     * Lol API Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * Platform Factory
     * @var PlatformFactory
     */
    private $platformFactory;

    /**
     * MatchmakingQueueType Factory
     * @var MatchmakingQueueTypeFactory
     */
    private $matchmakingQueueTypeFactory;

    /**
     * Service
     * @param HandlerInterface $lolAPIHandler
     * @param PlatformFactory $platformFactory
     * @param MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory
     */
    function __construct(
        HandlerInterface $lolAPIHandler,
        PlatformFactory $platformFactory,
        MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory)
    {
        $this->lolAPIHandler = $lolAPIHandler;
        $this->platformFactory = $platformFactory;
        $this->matchmakingQueueTypeFactory = $matchmakingQueueTypeFactory;
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
     * Returns platform factory
     * @return PlatformFactory
     */
    protected function getPlatformFactory()
    {
        return $this->platformFactory;
    }

    /**
     * Returns MatchmakingQueueType Factory
     * @return MatchmakingQueueTypeFactory
     */
    public function getMatchmakingQueueTypeFactory()
    {
        return $this->matchmakingQueueTypeFactory;
    }

    /**
     * Create and returns CurrentGame.SpectatorGameInfo query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query(
            $this->getLolAPIHandler(),
            $request,
            $this->getPlatformFactory(),
            $this->getMatchmakingQueueTypeFactory()
        );
    }
}