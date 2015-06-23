<?php
namespace LolAPI\GameConstants\MatchmakingQueueType;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

interface UnknownMQTPolicyInterface
{
    /**
     * Returns unknown MatchmakingQueueType
     * You can implement your policy and add some log functions
     * @param int $intCode
     * @return MatchmakingQueueInterface
     */
    public function getUnknownMatchmakingQueueType($intCode);
}