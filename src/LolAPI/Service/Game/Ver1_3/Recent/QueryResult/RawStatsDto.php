<?php
namespace LolAPI\Service\Game\Ver1_3\Recent\QueryResult;

class RawStatsDTO
{
    /**
     * Raw stats
     * @var array
     */
    private $rawStats = array();

    public function __construct($rawStats)
    {
        $this->rawStats = $rawStats;
    }

    /**
     * Returns all raw stats
     * @return array
     */
    public function getRawStats()
    {
        return $this->rawStats;
    }

    /**
     * Returns stat by key
     * @param string $statName
     * @return mixed
     */
    public function getRawStat($statName)
    {
        if(!(isset($this->rawStats[$statName]))) {
            throw new \OutOfBoundsException(sprintf("Unknown stat `%s`", $statName));
        }

        return $this->rawStats[$statName];
    }

    /**
     * Returns list of stats keys
     * @return array
     */
    public function getStatsPropertiesList()
    {
        return array_keys($this->rawStats);
    }
}