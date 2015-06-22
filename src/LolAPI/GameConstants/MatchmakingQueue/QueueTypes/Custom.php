<?php
namespace LolAPI\GameConstants\MatchmakingQueue\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueue\MatchmakingQueueInterface;

class Custom implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_CUSTOM;
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return 'Custom game';
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "CUSTOM";
    }
}