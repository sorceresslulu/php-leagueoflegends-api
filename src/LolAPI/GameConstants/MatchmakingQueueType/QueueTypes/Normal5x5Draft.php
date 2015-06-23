<?php
namespace LolAPI\GameConstants\MatchmakingQueue\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

class Normal5x5Draft implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_NORMAL_5x5_DRAFT;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "NORMAL_5x5_DRAFT";
    }


    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Normal 5v5 Draft Pick";
    }
}