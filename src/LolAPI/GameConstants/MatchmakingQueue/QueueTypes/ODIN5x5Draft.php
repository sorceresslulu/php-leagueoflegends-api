<?php
namespace LolAPI\GameConstants\MatchmakingQueue\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueue\MatchmakingQueueInterface;

class ODIN5x5Draft implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_ODIN_5x5_DRAFT;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "ODIN_5x5_DRAFT";
    }


    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Dominion 5v5 Draft Pick";
    }
}