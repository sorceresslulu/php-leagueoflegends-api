<?php
namespace LolAPI\GameConstants\TeamSide;

interface UnknownSidePolicyInterface
{
    /**
     * Returns unknown side
     * You can implement and inject your own policy
     * @param int $sideId
     * @return TeamSideInterface
     */
    public function getUnknownSide($sideId);
}