<?php
namespace LolAPI\GameConstants\MatchmakingQueue\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

class Bot5x5Intro implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_BOT_5x5_INTRO;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "BOT_5x5_INTRO";
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Summoner's Rift Coop vs AI Intro Bot";
    }
}