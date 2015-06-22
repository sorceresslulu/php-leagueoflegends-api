<?php
namespace LolAPI\GameConstants\MatchmakingQueue\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueue\MatchmakingQueueInterface;

class Bot5x5Intermediate implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_BOT_5x5_INTERMEDIATE;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "BOT_5x5_INTERMEDIATE";
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Historical Summoner's Rift Coop vs AI Intermediate Bot";
    }
}