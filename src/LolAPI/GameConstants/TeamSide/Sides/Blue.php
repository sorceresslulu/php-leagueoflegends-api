<?php
namespace LolAPI\GameConstants\TeamSide\Sides;

use LolAPI\GameConstants\TeamSide\TeamSideInterface;

class Blue implements TeamSideInterface
{
    /**
     * Returns ID (teamId) of side
     * @return string
     */
    public function getId()
    {
        return self::TEAM_SIDE_BLUE_ID;
    }

    /**
     * Returns "color" of side
     * @return string
     */
    public function getColor()
    {
        return "Blue";
    }
}