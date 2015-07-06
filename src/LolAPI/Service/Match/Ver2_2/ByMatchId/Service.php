<?php
namespace LolAPI\Service\Match\Ver2_2\ByMatchId;

use LolAPI\Handler\LolAPIHandlerInterface;

class Service
{
    /**
     * Lol API Handler
     * @var LolAPIHandlerInterface
     */
    private $lolAPIHandler;

    /**
     * Match.ByMatchId service
     * @param LolAPIHandlerInterface $lolAPIHandler
     */
    public function __construct(LolAPIHandlerInterface $lolAPIHandler)
    {
        $this->lolAPIHandler = $lolAPIHandler;
    }

    /**
     * Returns lol API handler
     * @return LolAPIHandlerInterface
     */
    public function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }

    /**
     * Create and returns a new Match.ByMatchId query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query($this->getLolAPIHandler(), $request);
    }
}