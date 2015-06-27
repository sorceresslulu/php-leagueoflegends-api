<?php
namespace LolAPI\GameConstants\LeagueQueueType\Types;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface;

class RankedSolo5x5LQType implements LeagueQueueTypeInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return self::LQT_RANKED_SOLO_5x5;
    }

    /**
     * Returns true if this league queue type for team queue
     * @return bool
     */
    public function forTeam()
    {
        return false;
    }

    /**
     * Returns true if this league queue type for solo queue
     * @return bool
     */
    public function forSolo()
    {
        return true;
    }

}