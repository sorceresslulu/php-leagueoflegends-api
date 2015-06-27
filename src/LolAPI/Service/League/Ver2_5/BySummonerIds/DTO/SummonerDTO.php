<?php
namespace LolAPI\Service\League\Ver2_5\BySummonerIds\DTO;

use LolAPI\Service\League\Ver2_5\Component\DTO\League\Player\LeaguePlayersDTO;
use LolAPI\Service\League\Ver2_5\Component\DTO\League\Team\LeagueTeamsDTO;

class SummonerDTO
{
    /**
     * Summoner ID
     * @var int
     */
    private $summonerId;

    /**
     * League DTOs (player)
     * @var LeaguePlayersDTO[]
     */
    private $leaguePlayerDTOs = array();

    /**
     * League DTOs (team)
     * @var LeagueTeamsDTO[]
     */
    private $leagueTeamDTOs = array();

    /**
     * Summoner DTO
     * @param int $summonerId
     * @param array $leaguePlayerDTOs
     * @param array $leagueTeamDTOs
     */
    public function __construct($summonerId, array $leaguePlayerDTOs, array $leagueTeamDTOs)
    {
        $this->summonerId = $summonerId;
        $this->leaguePlayerDTOs = $leaguePlayerDTOs;
        $this->leagueTeamDTOs = $leagueTeamDTOs;
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
     * Returns league player DTOs
     * @return \LolAPI\Service\League\Ver2_5\Component\DTO\League\Player\LeaguePlayersDTO[]
     */
    public function getLeaguePlayerDTOs()
    {
        return $this->leaguePlayerDTOs;
    }

    /**
     * Returns league team DTOs
     * @return \LolAPI\Service\League\Ver2_5\Component\DTO\League\Team\LeagueTeamsDTO[]
     */
    public function getLeagueTeamDTOs()
    {
        return $this->leagueTeamDTOs;
    }
}