<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType\Types;

use LolAPI\GameConstants\PlayerStatSummaryType\PlayerStatSummaryTypeInterface;

class URF implements PlayerStatSummaryTypeInterface
{
    /**
     * Returns string code
     * @return string
     */
    public function getStringCode()
    {
        return self::TYPE_URF;
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Ultra Rapid Fire games";
    }
}