<?php
namespace LolAPI\Service\Stats\Ver1_3\BySummoner\DTO;

use LolAPI\Service\Stats\Ver1_3\BySummoner\DTO\AggregatedStatsDto;

class ChampionStatsDto
{
    /**
     * Champion ID.
     * Note that champion ID 0 represents the combined stats for all champions.
     * For static information correlating to champion IDs, please refer to the LoL Static Data API.
     * @var int
     */
    private $championId;

    /**
     * Aggregated stats associated with the champion.
     * @var AggregatedStatsDto
     */
    private $stats;

    public function __construct($championId, AggregatedStatsDto $stats)
    {
        $this->championId = $championId;
        $this->stats = $stats;
    }

    /**
     * Returns champion ID
     * Note that champion ID 0 represents the combined stats for all champions.
     * @return int
     */
    public function getChampionId()
    {
        return $this->championId;
    }

    /**
     * Return aggregated stats associated with the champion.
     * @return AggregatedStatsDto
     */
    public function getStats()
    {
        return $this->stats;
    }
}