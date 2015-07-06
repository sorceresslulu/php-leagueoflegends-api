<?php
namespace LolAPI\Service\Game\Ver1_3\Recent;

use LolAPI\Handler\LolAPIHandlerInterface;

class Service
{
    /**
     * Lol API Handler
     * @var LolAPIHandlerInterface
     */
    private $lolAPIHandler;

    /**
     * Game.Recent service
     * @param $lolAPIHandler
     */
    public function __construct($lolAPIHandler)
    {
        $this->lolAPIHandler = $lolAPIHandler;
    }


    /**
     * Create and returns a new Game.Recent query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query($this->getLolAPIHandler(), $request);
    }

    /**
     * Returns Lol API Handler
     * @return LolAPIHandlerInterface
     */
    protected function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }
}