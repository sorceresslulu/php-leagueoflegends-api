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

    /**
     * Returns true if this league queue type for team queue
     * @return bool
     */
    public function forTeam()
    {
        return true;
    }

    /**
     * Returns true if this league queue type for solo queue
     * @return bool
     */
    public function forSolo()
    {
        return false;
    }
}