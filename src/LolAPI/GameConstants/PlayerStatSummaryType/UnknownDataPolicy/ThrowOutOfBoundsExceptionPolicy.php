<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType\UnknownDataPolicy;

use LolAPI\GameConstants\PlayerStatSummaryType\PlayerStatSummaryTypeInterface;
use LolAPI\GameConstants\PlayerStatSummaryType\UnknownDataPolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownDataPolicyInterface
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