<?php
namespace LolAPI\GameConstants\MatchmakingQueueType\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

class Hexakill implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_HEXAKILL;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "HEXAKILL";
    }


    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Twisted Treeline 6x6 Hexakill";
    }
}