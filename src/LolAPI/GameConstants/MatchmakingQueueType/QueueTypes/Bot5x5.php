<?php
namespace LolAPI\GameConstants\MatchmakingQueueType\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

class Bot5x5 implements  MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_BOT_5x5;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "BOT_5x5";
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Historical Summoner's Rift Coop vs AI";
    }
}