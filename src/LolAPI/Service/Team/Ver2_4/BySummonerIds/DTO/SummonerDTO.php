<?php
namespace LolAPI\Service\Team\Ver2_4\BySummonerIds\DTO;

use LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\TeamDTO;

class SummonerDTO
{
    /**
     * Summoner ID
     * @var int
     */
    private $summonerId;


    /**
     * Team DTOs
     * @var TeamDTO[]
     */
    private $teams = array();

    public function __construct($summonerId, array $teams)
    {
        $this->summonerId = $summonerId;
        $this->teams = $teams;
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
     * Returns Team DTOs
     * @return TeamDTO[]
     */
    public function getTeams()
    {
        return $this->teams;
    }
}