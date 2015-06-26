<?php
namespace LolAPI\GameConstants\LeagueQueueType\Types;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface;

class RankedTeam5x5LQType implements LeagueQueueTypeInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return self::LQT_RANKED_TEAM_5x5;
    }
}