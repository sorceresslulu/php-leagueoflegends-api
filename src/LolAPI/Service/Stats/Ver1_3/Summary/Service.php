<?php
namespace LolAPI\Service\Stats\Ver1_3\Summary;

use LolAPI\Handler\LolAPIHandlerInterface;

class Service
{
    /**
     * Lol API Handler
     * @var LolAPIHandlerInterface
     */
    private $lolAPIHandler;

    /**
     * Service
     * @param LolAPIHandlerInterface $lolAPIHandler
     */
    function __construct(LolAPIHandlerInterface $lolAPIHandler)
    {
        $this->lolAPIHandler = $lolAPIHandler;
    }

    /**
     * Returns Lol API Handler
     * @return LolAPIHandlerInterface
     */
    protected function getAPIHandler()
    {
        return $this->lolAPIHandler;
    }

    /**
     * Create and returns Stats.Summary query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query($this->getAPIHandler(), $request);
    }
}