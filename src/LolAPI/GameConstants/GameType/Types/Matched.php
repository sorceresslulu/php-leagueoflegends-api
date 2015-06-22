<?php
namespace LolAPI\GameConstants\GameType\Types;

use LolAPI\GameConstants\GameType\GameTypeInterface;

class Matched implements GameTypeInterface
{
    /**
     * Returns game type code
     * @return string
     */
    public function getCode()
    {
        return self::MATCHED_GAME;
    }
}