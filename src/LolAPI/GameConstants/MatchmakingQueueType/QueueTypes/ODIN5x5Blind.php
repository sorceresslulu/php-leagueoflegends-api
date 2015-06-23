<?php
namespace LolAPI\GameConstants\MatchmakingQueue\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

class ODIN5x5Blind implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_ODIN_5x5_BLIND;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "ODIN_5x5_BLIND";
    }


    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Dominion 5v5 Blind Pick";
    }
}