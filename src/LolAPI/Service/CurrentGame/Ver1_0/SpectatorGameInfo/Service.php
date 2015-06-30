<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo;

use LolAPI\Handler\HandlerInterface;

class Service
{
    /**
     * Lol API Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * CurrentGame.SpectatorGameInfo Service
     * @param HandlerInterface $lolAPIHandler
     */
    function __construct(HandlerInterface $lolAPIHandler)
    {
        $this->lolAPIHandler = $lolAPIHandler;
    }

    /**
     * Create and returns CurrentGame.SpectatorGameInfo query
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