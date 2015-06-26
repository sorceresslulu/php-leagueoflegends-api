<?php
namespace LolAPI\GameConstants\LeagueTier;

interface UnknownTierPolicyInterface
{
    /**
     * Returns UnknownTier object
     * You can implement your own policies
     * @param string $leagueTierCode
     * @return LeagueTierInterface
     */
    public function getUnknownTier($leagueTierCode);
}