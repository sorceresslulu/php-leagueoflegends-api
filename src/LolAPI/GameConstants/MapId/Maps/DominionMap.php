<?php
namespace LolAPI\GameConstants\MapId\Maps;

use LolAPI\GameConstants\MapId\MapIdInterface;

class DominionMap implements MapIdInterface
{
    /**
     * Returns ID
     * @return int
     */
    public function getId()
    {
        return self::MAP_ID_8;
    }

    /**
     * Returns name (from API documentation)
     * @return string
     */
    public function getName()
    {
        return "The Crystal Scar";
    }

    /**
     * Returns notes (from API documentation)
     * @return string
     */
    public function getNotes()
    {
        return "Dominion Map";
    }
}