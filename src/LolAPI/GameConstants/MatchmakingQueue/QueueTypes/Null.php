<?php
namespace LolAPI\GameConstants\MatchmakingQueue\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueue\MatchmakingQueueInterface;

class Null implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return null;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return null;
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return null;
    }
}