<?php
namespace LolAPI\Service\League\Ver2_5\ByTeamIds\DTO;

use LolAPI\Service\League\Ver2_5\Component\DTO\League\Team\LeagueTeamsDTO;

class TeamDTO
{
    /**
     * Team ID
     * @var string
     */
    private $teamId;

    /**
     * League DTO (team)
     * @var LeagueTeamsDTO[]
     */
    private $leagueTeamDTOs;

    /**
     * Team DTO
     * @param string $teamId
     * @param LeagueTeamsDTO[] $leagueTeamDTO
     */
    public function __construct($teamId, array $leagueTeamDTO)
    {
        $this->teamId = $teamId;
        $this->leagueTeamDTOs = $leagueTeamDTO;
    }

    /**
     * Returns team ID
     * @return string
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * Returns league DTO
     * @return LeagueTeamsDTO[]
     */
    public function getLeagueTeamDTOs()
    {
        return $this->leagueTeamDTOs;
    }
}