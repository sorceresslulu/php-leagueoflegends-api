<?php
namespace LolAPI\Service\LolStatus\Ver1_0\Shards;

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
     * Create and returns a new LolStatus.Shards query
     * @return Query
     */
    public function createQuery()
    {
        return new Query($this->getAPIHandler());
    }
}