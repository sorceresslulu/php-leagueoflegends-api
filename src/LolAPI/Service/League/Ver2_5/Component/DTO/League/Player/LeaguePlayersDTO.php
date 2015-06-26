<?php
namespace LolAPI\Service\League\Ver2_5\Component\DTO\League\Player;

use LolAPI\Service\League\Ver2_5\Component\DTO\League\AbstractLeagueDTO;

class LeaguePlayersDTO extends AbstractLeagueDTO
{
    /**
     * Returns entries
     * @return LeaguePlayerEntryDTO
     */
    public function getEntries()
    {
        return $this->entries;
    }
}