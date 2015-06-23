<?php
namespace LolAPI\GameConstants\MatchmakingQueue\UnknownDataPolicy;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;
use LolAPI\GameConstants\MatchmakingQueue\QueueTypes\Unknown;
use LolAPI\GameConstants\MatchmakingQueueType\UnknownDataPolicyInterface;

class DefaultPolicy implements UnknownDataPolicyInterface
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