<?php
namespace LolAPI\GameConstants\MapId\Maps;

use LolAPI\GameConstants\MapId\MapIdInterface;

class SR2014 implements MapIdInterface
{
    /**
     * Returns ID
     * @return int
     */
    public function getId()
    {
        return self::MAP_ID_11;
    }

    /**
     * Returns name (from API documentation)
     * @return string
     */
    public function getName()
    {
        return "Summoner's Rift";
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