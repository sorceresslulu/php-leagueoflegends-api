<?php
namespace LolAPI\Service\Match\Ver2_2\ByMatchId;

use LolAPI\Handler\HandlerInterface;

class Service
{
    /**
     * Lol API Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * Match.ByMatchId service
     * @param HandlerInterface $lolAPIHandler
     */
    public function __construct(HandlerInterface $lolAPIHandler)
    {
        $this->lolAPIHandler = $lolAPIHandler;
    }

    /**
     * Returns lol API handler
     * @return HandlerInterface
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