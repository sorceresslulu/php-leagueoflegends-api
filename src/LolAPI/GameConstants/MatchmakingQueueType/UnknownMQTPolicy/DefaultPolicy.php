<?php
namespace LolAPI\GameConstants\MatchmakingQueueType\UnknownMQTPolicy;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\Unknown;
use LolAPI\GameConstants\MatchmakingQueueType\UnknownMQTPolicyInterface;

class DefaultPolicy implements UnknownMQTPolicyInterface
{
    /**
     * Returns unknown MatchmakingQueueType
     * You can implement your policy and add some log functions
     * @param int $intCode
     * @return MatchmakingQueueInterface
     */
    public function getUnknownMatchmakingQueueType($intCode)
    {
        return new Unknown($intCode);
    }
}