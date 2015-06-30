<?php
namespace LolAPI\Service\Stats\Ver1_3\Summary\DTO;

use LolAPI\Service\Stats\Ver1_3\Summary\DTO\PlayerStatsSummaryDto;

class PlayerStatsSummaryListDto
{
    /**
     * Summoner ID
     * @var int
     */
    private $summonerId;

    /**
     * Collection of player stats summaries associated with the summoner.
     * @var PlayerStatsSummaryDto[]
     */
    private $playerStatSummaries;

    function __construct($summonerId, array $playerStatSummaries)
    {
        $this->summonerId = $summonerId;
        $this->playerStatSummaries = $playerStatSummaries;
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
     * Return collection of player stats summaries associated with the summoner.
     * @return PlayerStatsSummaryDto[]
     */
    public function getPlayerStatSummaries()
    {
        return $this->playerStatSummaries;
    }
}