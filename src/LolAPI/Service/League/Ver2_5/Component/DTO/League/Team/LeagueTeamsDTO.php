<?php
namespace LolAPI\Service\League\Ver2_5\Component\DTO\League\Team;

use LolAPI\Service\League\Ver2_5\Component\DTO\League\AbstractLeagueDTO;

class LeagueTeamsDTO extends AbstractLeagueDTO
{
    /**
     * Returns entries
     * @return LeagueTeamEntryDTO[]
     */
    public function getEntries()
    {
        return $this->entries;
    }
}