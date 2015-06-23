<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType\UnknownPSSPolicyInterface;

use LolAPI\GameConstants\PlayerStatSummaryType\PlayerStatSummaryTypeInterface;
use LolAPI\GameConstants\PlayerStatSummaryType\UnknownPSSPolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownPSSPolicyInterface
{
    /**
     * Throw OutOfBoundException on unknown PlayStatSummaryType
     * @param $stringCode
     * @return PlayerStatSummaryTypeInterface|void
     */
    public function getUnknownPlayStatSummaryType($stringCode)
    {
        throw new \OutOfBoundsException(sprintf("Unknown PlayerStatSummaryType with code `%s`", $stringCode));
    }
}