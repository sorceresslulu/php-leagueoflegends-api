<?php
namespace LolAPI\GameConstants\MatchmakingQueueType\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

class Firstblood1x1 implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_FIRSTBLOOD_1x1;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "FIRSTBLOOD_1x1";
    }


    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Snowdown Showdown 1v1";
    }
}