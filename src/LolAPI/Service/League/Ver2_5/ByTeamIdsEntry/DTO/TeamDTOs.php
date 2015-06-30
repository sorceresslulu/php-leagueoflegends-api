<?php
namespace LolAPI\Service\League\Ver2_5\ByTeamIdsEntry\DTO;

class TeamDTOs
{
    /**
     * Team DTOs
     * @var TeamDTO[]
     */
    private $teamDTOs = array();

    /**
     * Team DTOs
     * @param TeamDTO[] $teamDTOs
     */
    public function __construct(array $teamDTOs)
    {
        $this->teamDTOs = $teamDTOs;
    }

    /**
     * Returns team DTOs
     * @return TeamDTO[]
     */
    public function getTeamDTOs()
    {
        return $this->teamDTOs;
    }
}