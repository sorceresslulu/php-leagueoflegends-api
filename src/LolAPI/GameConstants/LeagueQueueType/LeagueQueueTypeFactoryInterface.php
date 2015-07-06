<?php
namespace LolAPI\GameConstants\LeagueQueueType;

interface LeagueQueueTypeFactoryInterface
{
    /**
     * Create and returns LeagueQueueType by string code
     * @param string $leagueQueueTypeCode
     * @return LeagueQueueTypeInterface
     */
    public function createLQTypeByStringCode($leagueQueueTypeCode);
}