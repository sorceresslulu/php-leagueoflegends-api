<?php
namespace LolAPI\GameConstants\LeagueTier\Tiers;

use LolAPI\GameConstants\LeagueTier\LeagueTierInterface;

class UnknownTier implements LeagueTierInterface
{
    /**
     * League Tier Code
     * @var string
     */
    private $leagueTierCode;

    /**
     * Special case - unknown tier
     * @param string $leagueTierCode
     */
    public function __construct($leagueTierCode)
    {
        $this->leagueTierCode = $leagueTierCode;
    }

    /**
     * Returns league tier code
     * @return string
     */
    public function getTierCode()
    {
        return $this->leagueTierCode;
    }
}