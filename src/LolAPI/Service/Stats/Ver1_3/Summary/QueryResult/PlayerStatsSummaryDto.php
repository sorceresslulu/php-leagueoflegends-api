<?php
namespace LolAPI\Service\Stats\Ver1_3\Summary\QueryResult;

class PlayerStatsSummaryDto
{
    /**
     * Aggregated stats
     * @var AggregatedStatsDto
     */
    private $aggregatedStats;

    /**
     * Number of losses for this queue type. Returned for ranked queue types only.
     * @var int|null
     */
    private $losses;

    /**
     * Number of wins for this queue type.
     * @var int
     */
    private $wins;

    /**
     * Date stats were last modified specified as epoch milliseconds.
     * @var int
     */
    private $modifyDate;

    /**
     * Player stats summary type.
     * @var string
     */
    private $playerStatSummaryType;

    function __construct($playerStatSummaryType, AggregatedStatsDto $aggregatedStats, $losses, $wins, $modifyDate)
    {
        $this->aggregatedStats = $aggregatedStats;
        $this->losses = $losses;
        $this->wins = $wins;
        $this->modifyDate = $modifyDate;
        $this->playerStatSummaryType = $playerStatSummaryType;
    }

    /**
     * Returns aggregated stats
     * @return AggregatedStatsDto
     */
    public function getAggregatedStats()
    {
        return $this->aggregatedStats;
    }

    /**
     * Returns number of losses for this queue type.
     * @return int|null
     */
    public function getLosses()
    {
        return $this->losses;
    }

    /**
     * Returns true if losses info is specifed
     * @return bool
     */
    public function isLossesSpecified()
    {
        return $this->losses !== null;
    }


    /**
     * Returns number of wins for this queue type.
     * @return int
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * Returns date stats were last modified specified as epoch milliseconds.
     * @return int
     */
    public function getModifyDate()
    {
        return $this->modifyDate;
    }

    /**
     * Returns summary type.
     * @return string
     */
    public function getPlayerStatSummaryType()
    {
        return $this->playerStatSummaryType;
    }
}