<?php
namespace LolAPI\GameConstants\TeamSide\Sides;

use LolAPI\GameConstants\TeamSide\TeamSideInterface;

class UnknownSide implements TeamSideInterface
{
    /**
     * Side ID
     * @var int
     */
    private $id;

    /**
     * Special case - unknown side
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Returns ID (teamId) of side
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns "color" of side
     * @return string
     */
    public function getColor()
    {
        return "Unknown";
    }

}