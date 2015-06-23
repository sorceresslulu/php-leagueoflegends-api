<?php
namespace LolAPI\GameConstants\SubType\SubTypes;

use LolAPI\GameConstants\SubType\SubTypeInterface;

class RankedTeam3x3 implements SubTypeInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return self::SUB_TYPE_RANKED_TEAM_3x3;
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Twisted Treeline ranked team games";
    }
}