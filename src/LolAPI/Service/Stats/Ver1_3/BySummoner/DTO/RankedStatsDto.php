<?php
namespace LolAPI\Service\Stats\Ver1_3\BySummoner\DTO;

use LolAPI\Service\Stats\Ver1_3\BySummoner\DTO\ChampionStatsDto;

class RankedStatsDto
{
    /**
     * Summoner ID
     * @var int
     */
    private $summonerId;

    /**
     * Collection of aggregated stats summarized by champion
     * @var ChampionStatsDto[]
     */
    private $champions;

    /**
     * Date stats were last modified specified as epoch milliseconds
     * @var int
     */
    private $modifyDate;

    function __construct($summonerId, $modifyDate, array $champions)
    {
        $this->summonerId = $summonerId;
        $this->champions = $champions;
        $this->modifyDate = $modifyDate;
    }


    /**
     * Returns summoner ID
     * @return int
     */
    public function getSummonerId()
    {
        return $this->summonerId;
    }

    /**
     * Returns collection of aggregated stats summarized by champion
     * Note that champion ID 0 represents the combined stats for all champions.
     * @return ChampionStatsDto[]
     */
    public function getChampions()
    {
        return $this->champions;
    }

    /**
     * Returns date stats were last modified specified as epoch milliseconds
     * @return int
     */
    public function getModifyDate()
    {
        return $this->modifyDate;
    }
}