<?php
namespace LolAPI\GameConstants\MatchmakingQueue\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

class BotTT3x3 implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_BOT_TT_3x3;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "BOT_TT_3x3";
    }


    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Twisted Treeline Coop vs AI";
    }
}