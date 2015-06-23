<?php
namespace LolAPI\GameConstants\MatchmakingQueueType\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

class RankedTeam3x3 implements MatchmakingQueueInterface
{
    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return self::QUEUE_TYPE_RANKED_TEAM_3x3;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "RANKED_TEAM_3x3";
    }


    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Ranked Team 3v3";
    }
}