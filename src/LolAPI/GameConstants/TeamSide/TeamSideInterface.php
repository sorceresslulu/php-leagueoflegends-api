<?php
namespace LolAPI\GameConstants\TeamSide;

interface TeamSideInterface
{
    const TEAM_SIDE_BLUE_ID = 100;
    const TEAM_SIDE_PURPLE_ID = 200;

    /**
     * Returns ID (teamId) of side
     * @return int
     */
    public function getId();

    /**
     * Returns "color" of side
     * @return string
     */
    public function getColor();
}