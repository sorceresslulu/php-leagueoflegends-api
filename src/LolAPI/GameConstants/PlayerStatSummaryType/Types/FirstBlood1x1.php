<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType;

class FirstBlood1x1 implements PlayerStatSummaryTypeInterface
{
    /**
     * Returns string code
     * @return string
     */
    public function getStringCode()
    {
        return self::TYPE_FIRST_BLOOD_1X1;
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Snowdown Showdown 1x1 games";
    }
}