<?php
namespace LolAPI\Service\Game\Ver1_3\Recent\QueryResult;

class PlayerDTO
{
    /**
     * Champion Id
     * @var int
     */
    private $championId;

    /**
     * Summoner Id
     * @var int
     */
    private $summonerId;

    /**
     * Team Id
     * @var int
     */
    private $teamId;

    public function __construct($championId, $summonerId, $teamId)
    {
        $this->championId = $championId;
        $this->summonerId = $summonerId;
        $this->teamId = $teamId;
    }

    /**
     * Returns champion ID associated with player.
     * @return int
     */
    public function getChampionId()
    {
        return $this->championId;
    }

    /**
     * Returns summoner ID associated with player.
     * @return int
     */
    public function getSummonerId()
    {
        return $this->summonerId;
    }

    /**
     * Returns team ID associated with player.
     * @return int
     */
    public function getTeamId()
    {
        return $this->teamId;
    }
}