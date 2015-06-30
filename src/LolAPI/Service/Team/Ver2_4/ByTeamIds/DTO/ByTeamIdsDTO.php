<?php
namespace LolAPI\Service\Team\Ver2_4\ByTeamIds\DTO;

use LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\TeamDTO;

class ByTeamIdsDTO
{
    /**
     * Team DTOs
     * @var TeamDTO[]
     */
    private $teamDTOs = array();

    /**
     * ByTeamIds DTO
     * @param TeamDTO[] $teamDTOs
     */
    public function __construct(array $teamDTOs)
    {
        $this->teamDTOs = $teamDTOs;
    }

    /**
     * Returns Team DTOs
     * @return TeamDTO[]
     */
    public function getTeamDTOs()
    {
        return $this->teamDTOs;
    }
}