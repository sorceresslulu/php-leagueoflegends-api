<?php
namespace LolAPI\GameConstants\MatchmakingQueue\QueueTypes;

use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

class Unknown implements MatchmakingQueueInterface
{
    /**
     * Code
     * @var int
     */
    private $code;

    /**
     * Special case - unknown matchmaking queue
     * @param int $code
     */
    public function __construct($code)
    {
        $this->code = $code;
    }


    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId()
    {
        return $this->code;
    }

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType()
    {
        return "UNKNOWN";
    }


    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Unknown";
    }
}