<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Rune;

use LolAPI\Handler\HandlerInterface;

class Service
{
    /**
     * Lol API handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * LolStaticData.Rune service
     * @param HandlerInterface $lolAPIHandler
     */
    public function __construct(HandlerInterface $lolAPIHandler)
    {
        $this->lolAPIHandler = $lolAPIHandler;
    }

    /**
     * Create and returns a new LolStaticData.Rune service
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
     * @return HandlerInterface
     */
    protected function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }
}