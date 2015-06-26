<?php
namespace LolAPI\GameConstants\LeagueQueueType\Types;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface;

class RankedTeam3x3LQType implements LeagueQueueTypeInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return self::LQT_RANKED_TEAM_3x3;
    }
}