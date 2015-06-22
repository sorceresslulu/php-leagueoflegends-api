<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType\Types;

use LolAPI\GameConstants\PlayerStatSummaryType\PlayerStatSummaryTypeInterface;

class ARAMUnranked5x5 implements PlayerStatSummaryTypeInterface
{
    /**
     * Returns string code
     * @return string
     */
    public function getStringCode()
    {
        return self::TYPE_ARAM_UNRANKED_5X5;
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "ARAM / Howling Abyss games";
    }
}