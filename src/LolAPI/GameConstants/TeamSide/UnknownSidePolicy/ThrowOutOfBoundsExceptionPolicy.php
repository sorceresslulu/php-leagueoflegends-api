<?php
namespace LolAPI\GameConstants\TeamSide\UnknownSidePolicy;

use LolAPI\GameConstants\TeamSide\TeamSideInterface;
use LolAPI\GameConstants\TeamSide\UnknownSidePolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownSidePolicyInterface
{
    /**
     * Throws OutOfBoundsException on unknown side
     * @param int $sideId
     * @return TeamSideInterface
     */
    public function getUnknownSide($sideId)
    {
        throw new \OutOfBoundsException(sprintf("Unknown side with ID `%d`", $sideId));
    }
}