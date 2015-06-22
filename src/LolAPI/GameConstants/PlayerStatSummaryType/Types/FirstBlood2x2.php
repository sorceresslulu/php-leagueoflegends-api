<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType;

class FirstBlood2x2 implements PlayerStatSummaryTypeInterface
{
    /**
     * Returns string code
     * @return string
     */
    public function getStringCode()
    {
        return self::TYPE_FIRST_BLOOD_2X2;
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Snowdown Showdown 2x2 games";
    }
}