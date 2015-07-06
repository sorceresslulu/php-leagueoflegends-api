<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Runes;

use LolAPI\Handler\LolAPIHandlerInterface;

class Service
{
    /**
     * Lol API handler
     * @var LolAPIHandlerInterface
     */
    private $lolAPIHandler;

    /**
     * LolStaticData.Runes service
     * @see https://developer.riotgames.com/api/methods#!/968/3315
     * @param LolAPIHandlerInterface $lolAPIHandler
     */
    public function __construct(LolAPIHandlerInterface $lolAPIHandler)
    {
        $this->lolAPIHandler = $lolAPIHandler;
    }

    /**
     * Create and returns a new LolStaticData.Runes service
     * Requests to this API will not be counted in your Rate Limit
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query($this->getLolAPIHandler(), $request);
    }

    /**
     * Returns Lol API handler
     * @return LolAPIHandlerInterface
     */
    protected function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }
}
