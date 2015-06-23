<?php
namespace LolAPI\GameConstants\MatchmakingQueue\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

class RankedTeam5x5 implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_RANKED_TEAM_5x5;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "RANKED_TEAM_5x5";
    }


    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Ranked Team 5v5";
    }

}