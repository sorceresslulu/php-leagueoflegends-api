<?php
namespace LolAPI\Service\Champion\Ver1_2\Champion;

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
     * Create and returns a new Champion.Champion query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request) {
        return new Query($this->getAPIHandler(), $request);
    }
}