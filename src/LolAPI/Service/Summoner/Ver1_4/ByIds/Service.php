<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByIds;

use LolAPI\Handler\HandlerInterface;

class Service
{
    /**
     * Lol API Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * Service
     * @param HandlerInterface $lolAPIHandler
     */
    function __construct(HandlerInterface $lolAPIHandler)
    {
        $this->lolAPIHandler = $lolAPIHandler;
    }

    /**
     * Returns Lol API Handler
     * @return HandlerInterface
     */
    protected function getAPIHandler()
    {
        return $this->lolAPIHandler;
    }


    /**
     * Create and returns a new Summoner.ByIds query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request) {
        return new Query($this->getAPIHandler(), $request);
    }
}