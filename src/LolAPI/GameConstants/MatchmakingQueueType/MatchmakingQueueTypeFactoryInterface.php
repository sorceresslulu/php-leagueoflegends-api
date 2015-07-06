<?php
namespace LolAPI\GameConstants\MatchmakingQueueType;

interface MatchmakingQueueTypeFactoryInterface
{
    /**
     * Create and returns MatchmakingQueueType constant from integer code
     * Factory will return a special NULL-case for $intCode (null)
     * @param int|null $intCode
     * @return MatchmakingQueueInterface
     */
    public function createFromIntCode($intCode);
}