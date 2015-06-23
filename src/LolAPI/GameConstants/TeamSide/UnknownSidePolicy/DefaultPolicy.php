<?php
namespace LolAPI\GameConstants\TeamSide\UnknownSidePolicy;

use LolAPI\GameConstants\TeamSide\Sides\UnknownSide;
use LolAPI\GameConstants\TeamSide\TeamSideInterface;
use LolAPI\GameConstants\TeamSide\UnknownSidePolicyInterface;

class DefaultPolicy implements UnknownSidePolicyInterface
{
    /**
     * Returns unknown side
     * You can implement and inject your own policy
     * @param int $sideId
     * @return TeamSideInterface
     */
    public function getUnknownSide($sideId)
    {
        return new UnknownSide($sideId);
    }
}