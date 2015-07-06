<?php
namespace LolAPI\GameConstants\TeamSide;

interface TeamSideFactoryInterface
{
    /**
     * Create and returns team side from teamId
     * @param int $teamId
     * @return TeamSideInterface
     */
    public function createFromTeamId($teamId);
}