<?php
namespace LolAPI\Service\Stats\Ver1_3\BySummoner\DTO;

class AggregatedStatsDto
{
    /**
     * Aggregated stats
     * @var array
     */
    private $aggregatedStats;

    /**
     * Aggregated stats
     * @param array $aggregatedStats
     */
    public function __construct(array $aggregatedStats)
    {
        $this->aggregatedStats = $aggregatedStats;
    }

    /**
     * Returns aggregated stats
     * @return array
     */
    public function getAggregatedStats()
    {
        return $this->aggregatedStats;
    }

    /**
     * Returns specified stat
     * @param $starName
     * @return int
     */
    public function getStat($starName)
    {
        if(!(isset($this->aggregatedStats[$starName]))) {
            throw new \OutOfBoundsException(sprintf("Unknown stat `%s`", $starName));
        }

        return $this->aggregatedStats[$starName];
    }

    /**
     * Returns list of stats
     * @return array
     */
    public function getStatsPropertiesList() {
        return array_keys($this->aggregatedStats);
    }
}