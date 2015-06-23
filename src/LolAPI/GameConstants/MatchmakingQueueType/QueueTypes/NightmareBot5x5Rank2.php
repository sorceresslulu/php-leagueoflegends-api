<?php
namespace LolAPI\GameConstants\MatchmakingQueue\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

class NightmareBot5x5Rank2 implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_NIGHTMARE_BOT_5x5_RANK2;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "NIGHTMARE_BOT_5x5_RANK2";
    }


    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Doom Bots Rank 2";
    }
}