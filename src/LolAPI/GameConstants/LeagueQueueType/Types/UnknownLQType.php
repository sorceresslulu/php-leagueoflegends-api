<?php
namespace LolAPI\GameConstants\LeagueQueueType\Types;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface;

class UnknownLQType implements LeagueQueueTypeInterface
{
    /**
     * League queue type code
     * @var string
     */
    private $leagueQueueTypeCode;

    /**
     * Special case - unknown league queue type code
     * @param string $leagueQueueTypeCode
     */
    public function __construct($leagueQueueTypeCode)
    {
        $this->leagueQueueTypeCode = $leagueQueueTypeCode;
    }

    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return $this->leagueQueueTypeCode;
    }
}