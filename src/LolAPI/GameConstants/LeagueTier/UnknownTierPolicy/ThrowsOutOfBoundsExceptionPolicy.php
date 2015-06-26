<?php
namespace LolAPI\GameConstants\LeagueTier\UnknownTierPolicy;

use LolAPI\GameConstants\LeagueTier\LeagueTierInterface;
use LolAPI\GameConstants\LeagueTier\UnknownTierPolicyInterface;

class ThrowsOutOfBoundsExceptionPolicy implements UnknownTierPolicyInterface
{
    /**
     * Throws OutOfBoundsException instead of returning UnknownTier object
     * @param string $leagueTierCode
     * @return LeagueTierInterface
     */
    public function getUnknownTier($leagueTierCode)
    {
        throw new \OutOfBoundsException(sprintf("Uknown league tier with code `%s`", $leagueTierCode));
    }
}