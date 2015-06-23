<?php
namespace LolAPI\GameConstants\MapId\Maps;

use LolAPI\GameConstants\MapId\MapIdInterface;

class TutorialMap implements MapIdInterface
{
    /**
     * Returns ID
     * @return int
     */
    public function getId()
    {
        return self::MAP_ID_3;
    }

    /**
     * Returns name (from API documentation)
     * @return string
     */
    public function getName()
    {
        return "The Proving Grounds";
    }

    /**
     * Returns notes (from API documentation)
     * @return string
     */
    public function getNotes()
    {
        return "Tutorial Map";
    }
}