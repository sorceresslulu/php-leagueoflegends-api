<?php
namespace LolAPI\GameConstants\LeagueTier\UnknownTierPolicy;

use LolAPI\GameConstants\LeagueTier\LeagueTierInterface;
use LolAPI\GameConstants\LeagueTier\Tiers\UnknownTier;
use LolAPI\GameConstants\LeagueTier\UnknownTierPolicyInterface;

class DefaultPolicy implements UnknownTierPolicyInterface
{
    /**
     * Returns UnknownTier object
     * You can implement your own policies
     * @param string $leagueTierCode
     * @return LeagueTierInterface
     */
    public function getUnknownTier($leagueTierCode)
    {
        return new UnknownTier($leagueTierCode);
    }
}