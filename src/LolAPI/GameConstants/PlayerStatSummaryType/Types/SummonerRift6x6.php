<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType\Types;

use LolAPI\GameConstants\PlayerStatSummaryType\PlayerStatSummaryTypeInterface;

class SummonerRift6x6 implements PlayerStatSummaryTypeInterface
{
    /**
     * Returns string code
     * @return string
     */
    public function getStringCode()
    {
        return self::TYPE_SUMMONERS_RIFT_6X6;
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Summoner's Rift 6x6 Hexakill games";
    }
}