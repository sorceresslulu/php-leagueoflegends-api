<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo;

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
     * Service
     * @param HandlerInterface $lolAPIHandler
     */
    function __construct(HandlerInterface $lolAPIHandler, PlatformFactory $platformFactory)
    {
        $this->lolAPIHandler = $lolAPIHandler;
        $this->platformFactory = $platformFactory;
    }

    /**
     * Returns Lol API Handler
     * @return HandlerInterface
     */
    private function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }

    /**
     * Returns platform factory
     * @return PlatformFactory
     */
    public function getPlatformFactory()
    {
        return $this->platformFactory;
    }


    /**
     * Create and returns CurrentGame.SpectatorGameInfo query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query($this->getLolAPIHandler(), $request, $this->getPlatformFactory());
    }
}