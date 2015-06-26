<?php
namespace LolAPI\GameConstants\LeagueQueueType\UnknownLQTypePolicy;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface;
use LolAPI\GameConstants\LeagueQueueType\UnknownLQTypePolicyInterface;

class ThrowsOutOfBoundsExceptionPolicy implements UnknownLQTypePolicyInterface
{
    /**
     * Throws OutOfBoundsException intead of returning unknown case for LeagueQueueType
     * @param string $leagueQueueTypeCode
     * @return LeagueQueueTypeInterface
     */
    public function getUnknownLQType($leagueQueueTypeCode)
    {
        throw new \OutOfBoundsException(sprintf("Unknown league queue type with code `%s`", $leagueQueueTypeCode));
    }
}