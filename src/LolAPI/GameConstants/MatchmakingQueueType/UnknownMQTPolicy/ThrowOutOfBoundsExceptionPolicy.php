<?php
namespace LolAPI\GameConstants\MatchmakingQueueType\UnknownMQTPolicy;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;
use LolAPI\GameConstants\MatchmakingQueueType\UnknownMQTPolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownMQTPolicyInterface
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