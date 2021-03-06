<?php
namespace LolAPI\GameConstants\MatchmakingQueueType\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

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