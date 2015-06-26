<?php
namespace LolAPI\GameConstants\LeagueQueueType;

interface UnknownLQTypePolicyInterface
{
    /**
     * Returns unknown case for LeagueQueueType
     * @param string $leagueQueueTypeCode
     * @return LeagueQueueTypeInterface
     */
    public function getUnknownLQType($leagueQueueTypeCode);
}