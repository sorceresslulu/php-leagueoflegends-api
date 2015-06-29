<?php
namespace LolAPI\Service\League\Ver2_5\ByTeamIdsEntry\DTO;

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
    private $leagueTeamDTOs = array();

    /**
     * Team DTO
     * @param string $teamId
     * @param LeagueTeamsDTO[] $leagueTeamDTOs
     */
    public function __construct($teamId, array $leagueTeamDTOs)
    {
        $this->teamId = $teamId;
        $this->leagueTeamDTOs = $leagueTeamDTOs;
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