<?php
namespace LolAPI\GameConstants\LeagueTier\Tiers;

use LolAPI\GameConstants\LeagueTier\LeagueTierInterface;

class PlatinumTier implements LeagueTierInterface
{
    /**
     * Returns league tier code
     * @return string
     */
    public function getTierCode()
    {
        return self::TIER_PLATINUM;
    }
}