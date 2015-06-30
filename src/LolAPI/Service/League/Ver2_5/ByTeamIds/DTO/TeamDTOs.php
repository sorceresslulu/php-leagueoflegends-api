<?php
namespace LolAPI\Service\League\Ver2_5\ByTeamIds;

class TeamDTOs
{
    /**
     * Team DTOs
     * @var array
     */
    private $teamDTOs = array();

    /**
     * Team DTOs
     * @param array $teamDTOs
     */
    public function __construct(array $teamDTOs)
    {
        $this->teamDTOs = $teamDTOs;
    }

    /**
     * Returns team DTOs
     * @return array
     */
    public function getTeamDTOs()
    {
        return $this->teamDTOs;
    }
}