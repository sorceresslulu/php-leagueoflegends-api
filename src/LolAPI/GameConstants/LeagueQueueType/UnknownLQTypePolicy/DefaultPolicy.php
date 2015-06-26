<?php
namespace LolAPI\GameConstants\LeagueQueueType\UnknownLQTypePolicy;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface;
use LolAPI\GameConstants\LeagueQueueType\Types\UnknownLQType;
use LolAPI\GameConstants\LeagueQueueType\UnknownLQTypePolicyInterface;

class DefaultPolicy implements UnknownLQTypePolicyInterface
{
    /**
     * Returns unknown case for LeagueQueueType
     * @param string $leagueQueueTypeCode
     * @return LeagueQueueTypeInterface
     */
    public function getUnknownLQType($leagueQueueTypeCode)
    {
        return new UnknownLQType($leagueQueueTypeCode);
    }
}