<?php
namespace LolAPI\GameConstants\MatchmakingQueue\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueue\MatchmakingQueueInterface;

class RankedPremade3x3 implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_RANKED_PREMADE_3x3;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "RANKED_PREMADE_3x3";
    }


    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Ranked Premade 3v3";
    }
}