<?php
namespace LolAPI\Service\Stats\Ver1_3\Summary;

use LolAPI\GameConstants\PlayerStatSummaryType\Factory;
use LolAPI\Handler\HandlerInterface;

class Service
{
    /**
     * Lol API Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * PlayerStatSummaryType Factory
     * @var Factory
     */
    private $playerStatSummaryTypeFactory;

    /**
     * Service
     * @param HandlerInterface $lolAPIHandler
     */
    function __construct(HandlerInterface $lolAPIHandler, Factory $playerStatSummaryTypeFactory)
    {
        $this->lolAPIHandler = $lolAPIHandler;
        $this->playerStatSummaryTypeFactory = $playerStatSummaryTypeFactory;
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
     * Returns PlayerStatSummaryType Factory
     * @return Factory
     */
    protected function getPlayerStatSummaryTypeFactory()
    {
        return $this->playerStatSummaryTypeFactory;
    }


    /**
     * Create and returns Stats.Summary query
     * @param Request $request
     * @return Query
     */
    public function createQuery(Request $request)
    {
        return new Query($this->getAPIHandler(), $request, $this->getPlayerStatSummaryTypeFactory());
    }
}