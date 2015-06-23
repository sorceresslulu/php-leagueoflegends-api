<?php
namespace LolAPI\GameConstants\MapId\Maps;

use LolAPI\GameConstants\MapId\MapIdInterface;

class TT2012 implements MapIdInterface
{
    /**
     * Returns ID
     * @return int
     */
    public function getId()
    {
        return self::MAP_ID_10;
    }

    /**
     * Returns name (from API documentation)
     * @return string
     */
    public function getName()
    {
        return "Twisted Treeline";
    }

    /**
     * Returns notes (from API documentation)
     * @return string
     */
    public function getNotes()
    {
        return "Current Version";
    }
}