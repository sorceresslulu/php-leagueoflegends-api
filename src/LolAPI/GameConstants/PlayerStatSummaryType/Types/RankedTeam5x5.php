<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType\Types;

use LolAPI\GameConstants\PlayerStatSummaryType\PlayerStatSummaryTypeInterface;

class RankedTeam5x5 implements PlayerStatSummaryTypeInterface
{
    /**
     * Returns string code
     * @return string
     */
    public function getStringCode()
    {
        return self::TYPE_RANKED_TEAM_5X5;
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Summoner's Rift ranked team games";
    }

}