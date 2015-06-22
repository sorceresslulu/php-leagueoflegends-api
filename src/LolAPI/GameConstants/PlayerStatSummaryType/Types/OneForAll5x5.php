<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType\Types;

use LolAPI\GameConstants\PlayerStatSummaryType\PlayerStatSummaryTypeInterface;

class OneForAll5x5 implements PlayerStatSummaryTypeInterface
{
    /**
     * Returns string code
     * @return string
     */
    public function getStringCode()
    {
        return self::TYPE_ONE_FOR_ALL_5X5;
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "One for All games";
    }
}