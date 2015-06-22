<?php
namespace LolAPI\GameConstants\MatchmakingQueue;

class Normal3x3 implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_NORMAL_3x3;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "NORMAL_3x3";
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Normal 3v3";
    }
}