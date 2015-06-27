<?php
namespace LolAPI\GameConstants\LeagueQueueType;

interface LeagueQueueTypeInterface
{
    const LQT_RANKED_SOLO_5x5 = 'RANKED_SOLO_5x5';
    const LQT_RANKED_TEAM_3x3 = 'RANKED_TEAM_3x3';
    const LQT_RANKED_TEAM_5x5 = 'RANKED_TEAM_5x5';

    /**
     * Returns code
     * @return string
     */
    public function getCode();

    /**
     * Returns true if this league queue type for team queue
     * @return bool
     */
    public function forTeam();

    /**
     * Returns true if this league queue type for solo queue
     * @return bool
     */
    public function forSolo();
}