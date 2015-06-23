<?php
namespace LolAPI\GameConstants\MatchmakingQueue;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

class BotODIN5x5 implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_BOT_ODIN_5x5;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "BOT_ODIN_5x5";
    }


    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Dominion Coop vs AI";
    }
}