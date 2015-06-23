<?php
namespace LolAPI\GameConstants\MatchmakingQueueType\UnknownDataPolicy;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;
use LolAPI\GameConstants\MatchmakingQueueType\UnknownDataPolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownDataPolicyInterface
{
    /**
     * Throws OutOfBoundsException on unknown MatchmakingQueueTypes
     * @param int $intCode
     * @return MatchmakingQueueInterface
     */
    public function getUnknownMatchmakingQueueType($intCode)
    {
        throw new \OutOfBoundsException(sprintf("Unknown matchmaking queue type wit code `%d`", $intCode));
    }
}