<?php
namespace LolAPI\GameConstants\MapId;

interface MapIdInterface
{
    const MAP_ID_1 = 1;
    const MAP_ID_2 = 2;
    const MAP_ID_3 = 3;
    const MAP_ID_4 = 4;
    const MAP_ID_8 = 8;
    const MAP_ID_10 = 10;
    const MAP_ID_11 = 11;
    const MAP_ID_12 = 12;

    /**
     * Returns ID
     * @return int
     */
    public function getId();

    /**
     * Returns name (from API documentation)
     * @return string
     */
    public function getName();

    /**
     * Returns notes (from API documentation)
     * @return string
     */
    public function getNotes();
}